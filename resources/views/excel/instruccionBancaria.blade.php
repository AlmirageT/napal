<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
    <table>
        <thead>
        <tr>
            <th>FECHA SOLICITUD</th>
            <th>DESCRIPCIÓN</th>
            <th>IMPORTE</th>
            <th>VALIDADA</th>
            <th>CANCELADA</th>
            <th>BANCO</th>
            <th>TIPO CUENTA</th>
            <th>NUMERO DE CUENTA</th>
            <th>CODIGO SWIFT</th>
        </tr>
        </thead>
        <tbody>
        @foreach($instruccionesBancarias as $instruccionBancaria)
            <tr>
                <td >{{ date("d-m-Y", strtotime($instruccionBancaria->fechaSolicitud)) }}</td>
                <td >{{ $instruccionBancaria->concepto }}</td>
                <td >${{ number_format($instruccionBancaria->importe,0,',','.') }}</td>
                <td >
                    @if ($instruccionBancaria->validado == 0)
                        Sin Validar
                    @else
                        Validada
                    @endif
                </td>
                <td >
                    @if ($instruccionBancaria->validado == 0 && $instruccionBancaria->cancelada == 0)
                        <a href="{{ asset('dashboard/cancelar-solicitud') }}/{{ Crypt::encrypt($instruccionBancaria->idIntruccionBancaria) }}" onclick="confirm('¿Desea Cancelar la Solicitud?')" class="btn btn-danger">Cancelar Solicitud</a>
                    @else
                        @if ($instruccionBancaria->validado == 0 && $instruccionBancaria->cancelada == 1)
                            Solicitud Cancelada
                        @endif
                        @if ($instruccionBancaria->validado == 1)
                            Solicitud Aceptada
                        @endif
                    @endif
                </td>
                <td >{{ $instruccionBancaria->nombreBanco }}</td>
                <td >{{ $instruccionBancaria->nombreTipoCuenta }}</td>
                <td >{{ $instruccionBancaria->numeroCuenta }}</td>
                <td >{{ $instruccionBancaria->codigoSwift }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</body>
</html>