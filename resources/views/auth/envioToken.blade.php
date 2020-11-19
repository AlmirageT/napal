@extends('layouts.login.app')

@section('title', 'Activar Usuario')

@section('meta')
    <meta name="description" content="Con Isbast conoce la evolución del corretaje en Chile. No comisión. Vendemos en 60 Días. Te asignamos experto inmobiliario, publicidad de vivienda en destacado, informes 24 hrs.">
@endsection

@section('css')

@endsection

@section('content')
    @php(setlocale(LC_TIME, 'spanish'))
    <!--Buscador starts-->
    <div class="hero v1 section-padding">
        <div class="overlay op-1"></div>
        <!--Listing filter starts-->
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h4>Activa tu cuenta</h4>
                    <p>Te enviamos un SMS con un link para activar tu cuenta</p>
                    <br>
                    <p>¿No lo haz recibido? <a id="volverEnviar" href="javascript:volverEnviar()">Volver a enviar</a></p>
                    <br>
                </div>
            </div>
        </div>
        <!--Listing filter ends-->
    </div>

    <!-- Scroll to top starts-->
    <span class="scrolltotop"><i class="lnr lnr-arrow-up"></i></span>
    <!-- Scroll to top ends-->
@endsection

@section('modals')

@endsection

@section('scripts')
    <script>
        $(document).ready(function() {

        });

        function volverEnviar() {

            $('#volverEnviar').hide();

            $.ajax({
                url: '/vaes',
                method:   'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                dataType: 'json',
                data:     { numero: '{{ Crypt::encrypt($request->numero) }}' },
                success:  function (respuesta) {
                    console.log(respuesta);
                    toastr.success('SMS reenviado correctamente');
                    setTimeout (function() {
                        $('#volverEnviar').show();
                    }, 10000);
                },
                error: function(err) {
                    toastr.error('No es posible enviar el SMS');
                    console.log(respuesta);
                },
                timeout: 60000
            });
        }
    </script>
@endsection
