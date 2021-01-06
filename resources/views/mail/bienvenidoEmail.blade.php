@extends('layouts.email.app')
@section('content')
    <tr>
        <td bgcolor="#FFFFFF" align="center">
            <table width="620" cellspacing="0" cellpadding="0" border="0">
                <tbody>
                    <tr>
                        <td>&nbsp;</td>
                    </tr>
                    <tr>
                        <td>
                            <p style="font-family: Arial,Helvetica,sans-serif; font-size: 15px; color: #483b3e; text-align: justify">Hola {{ $nombre }}</p>
                            <p style="font-family: Arial,Helvetica,sans-serif; font-size: 15px; color: #483b3e; text-align: justify">Felicidades! haz activado tu cuenta. {{-- <a href="https://mailtrack.io/trace/link/dc94e5ba810cf3c97f08a1c2b760e7fb51a1f3c3?url=https%3A%2F%2Fwww.housers.com%2Fes%2Fproyectos&amp;userId=5850591&amp;signature=6ae2ef48231e5f6f" style="color: #91ccc9; font-weight: bold" target="_blank" rel="noreferrer">otras distintas</a> --}}.</p>
                             <p style="font-family: Arial,Helvetica,sans-serif; font-size: 15px; color: #483b3e; text-align: justify">Ahora puedes ingresar y comenzar a invertir con nosotros.</p>
                              
                            <p style="font-family: Arial,Helvetica,sans-serif; font-size: 15px; color: #483b3e; text-align: justify"><a href="{{ $url }}">Click aqui para ingresar a NAPALM.</a></p>
                            
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <br>
                            <p style="font-family: Arial,Helvetica,sans-serif; font-size: 15px; color: #483b3e; text-align: justify"><br>Un saludo,<br><strong>El equipo de Napalm</strong>.</p>
                        </td>
                    </tr>
                </tbody>
            </table>
        </td>
    </tr>
@endsection
