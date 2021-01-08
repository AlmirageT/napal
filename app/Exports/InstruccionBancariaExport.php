<?php

namespace App\Exports;

use App\InstruccionBancaria;
//use Maatwebsite\Excel\Concerns\FromCollection;
//use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithEvents;
use Session;

class InstruccionBancariaExport implements FromView, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    
    public function headings(): array
    {
        return [
            'NOMBRE PROPIEDAD',
            'TIPO PROPIEDAD',
            'PROYECTO ASIGNADO',
            'DIRECCION',
            'NUMERO',
            'DEPARTAMENTO',
            'VALOR ARRIENDO',
            'ESTADO',
            'NOMBRE PROPIETARIO',
            'APELLIDO PROPIETARIO',
            'CORREO PROPIETARIO',
            'RUT PROPIETARIO',
            'ESTADO'
        ];
    }
    
    public function collection()
    {
        $instruccionesBancarias = InstruccionBancaria::select('*')
        ->join('cuentas_bancarias_usuarios','instrucciones_bancarias.idCuentaBancariaUsuario','=','cuentas_bancarias_usuarios.idCuentaBancariaUsuario')
        ->join('usuarios','cuentas_bancarias_usuarios.idUsuario','=','usuarios.idUsuario')
        ->where('cuentas_bancarias_usuarios.idUsuario',Session::get('idUsuario'))
        ->orderBy('instrucciones_bancarias.idIntruccionBancaria','DESC')
        ->get();

        return $instruccionBancaria;
    }
    */
    public function view(): View
    {
        $instruccionesBancarias = InstruccionBancaria::select('*')
        ->join('cuentas_bancarias_usuarios','instrucciones_bancarias.idCuentaBancariaUsuario','=','cuentas_bancarias_usuarios.idCuentaBancariaUsuario')
        ->join('usuarios','cuentas_bancarias_usuarios.idUsuario','=','usuarios.idUsuario')
        ->join('bancos','cuentas_bancarias_usuarios.idBanco','=','bancos.idBanco')
        ->join('tipos_cuentas','cuentas_bancarias_usuarios.idTipoCuenta','=','tipos_cuentas.idTipoCuenta')
        ->where('cuentas_bancarias_usuarios.idUsuario',Session::get('idUsuario'))
        ->orderBy('instrucciones_bancarias.idIntruccionBancaria','DESC')
        ->get();
        return view('excel.instruccionBancaria', [
            'instruccionesBancarias' => $instruccionesBancarias
        ]);
    }
}
