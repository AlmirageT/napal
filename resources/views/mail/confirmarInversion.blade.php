@extends('layouts.email.app')
@section('content')
    <tr>
        <td bgcolor="#FFFFFF" align="center">
            <table width="620" cellspacing="0" cellpadding="0" border="0">
                <tbody>
                    <tr>
                        <td>&nbsp;</td>
                        <td>
                            <p style="font-family: Arial,Helvetica,sans-serif; font-size: 15px; color: #483b3e; text-align: justify">Hola {{ Session::get('nombre') }} {{ Session::get('apellido') }}</p>
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <br>
                        <td>
                            <table style="font-family: Arial,Helvetica,sans-serif; font-size: 15px; color: #483b3e" width="660" cellspacing="0" cellpadding="0" border="0">
                                <thead>
                                    <tr>
                                        <td>Nombre Propiedad</td>
                                        <td></td>
                                        <td>Total Invertido</td>
                                    </tr>
                                </thead>
                                <br>
                                <tbody>
                                    <tr>
                                        <td>{{ $propiedad->nombrePropiedad }}</td>
                                        <td></td>
                                        <td>${{ number_format($sinCaracteres,0,',','.') }}</td>
                                    </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td>&nbsp;</td>
                        <br>
                        <td>
                            <p style="font-family: Arial,Helvetica,sans-serif; font-size: 15px; color: #483b3e; text-align: justify"><br>Un saludo,<br><strong>El equipo de Napalm</strong>.</p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </td>
    </tr>
@endsection