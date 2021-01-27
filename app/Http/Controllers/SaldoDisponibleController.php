<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
/** All Paypal Details class **/
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;
use App\TrxIngreso;
use App\CambioDolar;
use App\TrxPaypal;
use App\TipoMedioPago;
use App\BoletaOtroPago;
use Redirect;
use DateTime;
use Session;
use URL;
use Log;

class SaldoDisponibleController extends Controller
{
    public function index()
    {
    	if (!Session::has('idUsuario') && !Session::has('idTipoUsuario') && !Session::has('nombre') && !Session::has('apellido') && !Session::has('correo') && !Session::has('rut')) {
           return abort(401);
        }
        $cambioDolar = CambioDolar::first();
        $tiposMediosPagos = TipoMedioPago::all();
    	return view('public.ingresos',compact('cambioDolar','tiposMediosPagos'));
    }
    //paypal
    public function __construct()
    {
        /** PayPal api context **/
        $paypal_conf = \Config::get('paypal');
        $this->_api_context = new ApiContext(new OAuthTokenCredential(
            $paypal_conf['client_id'],
            $paypal_conf['secret'])
        );
        $this->_api_context->setConfig($paypal_conf['settings']);
    }
    public function payWithpaypal(Request $request)
    {
        if(Session::has('idTrxPaypal')){
            Session::forget('idTrxPaypal');
        }
        if(Session::has('clp')){
            Session::forget('clp');
        }
    	$ingresoSaldo = TrxPaypal::create([
    		
    	]);
    	Session::put('idTrxPaypal',$ingresoSaldo->idTrxPaypal);
        Session::put('clp',$request->monto);
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        //crear "boleta"
        $item_1 = new Item();
        $item_1->setName('Item 1')
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setSku(2)
            ->setPrice($request->montoDolar);

        //crear item de la boleta
        $item_list = new ItemList();
        $item_list->setItems(array($item_1));

        //crear monto final
        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal($request->montoDolar);

        //transaccion
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Ingreso de dinero a mi billetera')
            ->setInvoiceNumber(uniqid());

        //redireccion
        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::to('dashboard/status'))
            ->setCancelUrl(URL::to('dashboard/status'));

        //pago
        $payment = new Payment();
        $payment->setIntent('Sale')
            ->setPayer($payer)
            ->setRedirectUrls($redirect_urls)
            ->setTransactions(array($transaction));
        try
        {
            $payment->create($this->_api_context);
        }
        catch (\PayPal\Exception\PPConnectionException $ex)
        {
            if (\Config::get('app.debug'))
            {
                \Session::put('error', 'Connection timeout');
                return Redirect::to('dashboard/status');
            }
            else
            {
                \Session::put('error', 'Some error occur, sorry for inconvenient');
                return Redirect::to('dashboard/status');
            }
        }

        foreach ($payment->getLinks() as $link)
        {
            if($link->getRel() == 'approval_url')
            {
                $redirect_url = $link->getHref();
                break;
            }
        }
        Session::put('paypal_payment_id', $payment->getId());
        if(isset($redirect_url))
        {
            Log::info("llego1");
            return Redirect::away($redirect_url);
        }
        \Session::put('error', 'Unknown error occurred');
        return Redirect::to('dashboard/status');
    }

    public function getPaymentStatus(Request $request)
    {
        $payment_id = Session::get('paypal_payment_id');

        Session::forget('paypal_payment_id');
        if (empty($request->get('PayerID')) || empty($request->get('token'))) {

            \Session::put('error', 'Payment failed');
            return Redirect::to('dashboard/fallo');

        }
        $payment = Payment::get($payment_id, $this->_api_context);
        $execution = new PaymentExecution();
        $execution->setPayerId($request->get('PayerID'));

        $result = $payment->execute($execution, $this->_api_context);
        $idTxr = Session::get('idTrxPaypal');
        TrxPaypal::find($idTxr)->update([
            'transaccionPaypal'=> $result->id,
            'totalPaypal' => $result->transactions[0]->amount->total,
            'descripcionPaypal' => $result->transactions[0]->description,
            'facturaPaypal' => $result->transactions[0]->invoice_number,
            'idEstadoPago' => $result->transactions[0]->item_list->items[0]->sku,
            'idUsuario' => Session::get('idUsuario')
        ]);
        Session::forget('idTrxPaypal');
        $cambioDolar = CambioDolar::first();
        $ingresoSaldo = TrxIngreso::create([
            'monto' => ($result->transactions[0]->amount->total)*($cambioDolar->valorCambioDolar),
            'webClient' => $request->userAgent(),
            'idUsuario' => Session::get('idUsuario'),
            'idMoneda' => 1,
            'idEstado' => 1,
            'idTipoMedioPago' => 2,
            'numeroTransaccion' => $result->id
        ]);
        Session::flash('usd',$result->transactions[0]->amount->total);
        toastr()->success('Pago total realizado con exito');
        return Redirect::to('dashboard/exito');
    }

    //otros pagos
    public function otrosPagos(Request $request)
    {
        if (!Session::has('idUsuario') && !Session::has('idTipoUsuario') && !Session::has('nombre') && !Session::has('apellido') && !Session::has('correo') && !Session::has('rut')) {
            return abort(401);
        }
        //caracteres especiales cantidad a invertir
        $valorCaracteresEspeciales = array("@", ".", "-", "_", ";", ":", "?", "¿", "¡", "!", "$", "#", ",", "%", "&", "/", "+");
        $cantidadSinCaracteres = str_replace($valorCaracteresEspeciales, "", $request->valorAIngresar);
        //caracteres especiales para rut
        $caracteresEspeciales = array(".","-");
        $rutSinGuion = str_replace($caracteresEspeciales, "", Session::get('rut'));
        $date = new DateTime();
        $date->modify('+48 hours');

        BoletaOtroPago::create([
            'cantidadBoletaOtroPago' => $cantidadSinCaracteres,
            'fechaVencimiento' => $date->format('Y-m-d H:i:s'),
            'idUsuario' => Session::get('idUsuario'),
            'idEstado' => 11,
        ]);

        return redirect()->to('http://pre.otrospagos.com/publico/portal/enlace?id='.getenv('OTROS_PAGOS_COVENIO').'&idcli='.$rutSinGuion.'&tiidc=01');
    }

}
