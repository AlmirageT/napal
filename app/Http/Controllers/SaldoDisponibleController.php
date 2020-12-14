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
use Redirect;
use Session;
use URL;

class SaldoDisponibleController extends Controller
{
    public function index()
    {
    	if (!Session::has('idUsuario') && !Session::has('idTipoUsuario') && !Session::has('nombre') && !Session::has('apellido') && !Session::has('correo') && !Session::has('rut')) {
            toastr()->info('Debe estar ingresado para poder entrar a esta pagina');
           return abort(401);
        }
    	return view('public.ingresos');
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
    	$ingresoSaldo = TrxIngreso::create([
    		'monto' => 1,
	    	'webClient' => $request->userAgent(),
	    	'idUsuario' => Session::get('idUsuario'),
	    	'idMoneda' => 4,
	    	'idEstado' => 1,
	    	'idTipoMedioPago' => 2,
	        'valorComision' => 1.06
    	]);
    	Session::put('idTrxIngreso',$ingresoSaldo->idTrxIngreso);
        $payer = new Payer();
        $payer->setPaymentMethod('paypal');

        //crear "boleta"
        $item_1 = new Item();
        $item_1->setName('Item 1')
            ->setCurrency('USD')
            ->setQuantity(1)
            ->setSku(2)
            ->setPrice(1);

        //crear item de la boleta
        $item_list = new ItemList();
        $item_list->setItems(array($item_1));

        //crear monto final
        $amount = new Amount();
        $amount->setCurrency('USD')
            ->setTotal(1);

        //transaccion
        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($item_list)
            ->setDescription('Your transaction description')
            ->setInvoiceNumber(uniqid());

        //redireccion
        $redirect_urls = new RedirectUrls();
        $redirect_urls->setReturnUrl(URL::to('dashboard/exito'))
            ->setCancelUrl(URL::to('dashboard/fallo'));

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
                return Redirect::to('dashboard/fallo');
            }
            else
            {
                \Session::put('error', 'Some error occur, sorry for inconvenient');
                return Redirect::to('dashboard/fallo');
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
            return Redirect::away($redirect_url);
        }
        \Session::put('error', 'Unknown error occurred');
        return Redirect::to('dashboard/fallo');
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
        $pay = new  \stdClass();
        $pay->transaccion = $result->id;
        $pay->total = $result->transactions[0]->amount->total;
        $pay->descripcion = $result->transactions[0]->description;
        $pay->factura = $result->transactions[0]->invoice_number;
        $pay->idEstadoPago = $result->transactions[0]->item_list->items[0]->sku;

        toastr()->success('Pago total realizado con exito');
        return Redirect::to('dashboard/exito');
    }

}
