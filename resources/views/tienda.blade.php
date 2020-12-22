
@extends('layouts.public.app')
@section('title','Tienda')
@section('css')
<style type="text/css">
    .circulo {
        width: 80px;
        height: 80px;
        -moz-border-radius: 50%;
        -webkit-border-radius: 50%;
        border-radius: 50%;
        background-color: rgba(255, 0, 0, 0.5);
        margin-top: -180px;
        position: absolute;
        margin-left: 264px;
    }
    .flex{
        margin-left: 15px;
        margin-top: 26px;
        font-size: 25px;
        color: white;
    }
    .rectangulo {
        width: 150px; 
        height: 70px;
        background-color: rgba(0, 40, 255, 0.5);
        position: absolute;
        margin-top: -140px;
    }
    .tituloRentabilidad{
        color: white;
        font-size: 16px;
        font-weight: bold;
        margin-left: 5px;
    }
    .valorRentabilidad{
        color: white;
        font-size: 36px;
        font-weight: bold;
        margin-top: -10px;
        margin-left: 12px;
    }
    .cuadrado {
        width: 40px; 
        height: 40px; 
        background: #1abc9c;
        position: absolute;
        z-index: 1;
        margin-left: 110px;
        cursor: pointer;
    }
    .cruz {
        position: absolute;
        z-index: 1;
        margin-left: 310px;
        cursor: pointer;
    }
    @media only screen and (min-width:360px) and (max-width: 374px) {
            .cuadrado{
                margin-left: 90px;
            }
            .circulo{
                margin-left: 235px;
            }
        }
        @media only screen and (min-width:375px) and (max-width: 413px) {
            .cuadrado{
                margin-left: 105px;
            }
            .circulo{
                margin-left: 255px;
            }
        }
        @media only screen and (min-width:414px) and (max-width: 767px) {
            .cuadrado{
                margin-left: 144px;
            }
            .circulo{
                margin-left: 288px;
            }
        }
        @media only screen and (min-width:768px) and (max-width: 991px) {
            .cuadrado{
                margin-left: 450px;
            }
            .circulo{
                margin-left: 582px;
            }
        }
        @media only screen and (min-width:992px) and (max-width: 1199px) {
            .cuadrado{
                margin-left: 50px;
            }
            .circulo{
                margin-left: 199px;
            }
        }
</style>
@endsection
@section('content')
<div class="properties-section-body content-area">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-xs-12">
                <!-- Option bar start -->
                <div class="option-bar d-none d-xl-block d-lg-block d-md-block d-sm-block">
                    <div class="row">
                        <div class="col-lg-6 col-md-5 col-sm-5 col-xs-2">
                            <div class="sorting-options">
                               
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-7 col-sm-7 col-xs-10 cod-pad">
                            <div class="sorting-options2">
                                <span>Ordenar por:</span>
                                @if(!isset($idEstado))
                                {!! Form::select('idEstado', $estados,null,['class'=>"sorting",'onchange'=>"orderBy(this.value)"]) !!}
                                @else
                                {!! Form::select('idEstado', $estados,$idEstado,['class'=>"sorting",'onchange'=>"orderBy(this.value)"]) !!}
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Option bar end -->

                <!-- grid properties start -->
                <div>
                    <div class="infinite-scroll" >
                        <div class="row" id="contenedor">
                            @include('paginas')
                        </div>
                        {{ $propiedadesTienda->links() }}
                    </div>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
                    <script type="text/javascript">
                        $('ul.pagination').hide();
                        $(function() {
                            $('.infinite-scroll').jscroll({
                                autoTrigger: true,
                                debug: true,
                                loadingHtml: '<div align="center"><img src="{{ asset('img/loading.gif') }}" alt="Loading..." /></div>',
                                padding: 0,
                                nextSelector: '.pagination li.active + li a',
                                contentSelector: '.infinite-scroll',
                                callback: function() {
                                    $('ul.pagination').remove();
                                }
                            });
                        });
                    </script>
                </div>
                <!-- grid properties end -->

                <!-- Page navigation start -->
                <div class="pagination-box hidden-mb-45 text-center">
                    <nav aria-label="Page navigation example">
                    </nav>
                </div>
                <!-- Page navigation end-->
            </div>
        </div>
    </div>
</div>
<script>
    function orderBy(idEstado) {
        var URLactual = window.location;
        var urlInvierte = "{{ asset('invierte/chile/propiedad') }}";
        if(URLactual == urlInvierte || URLactual == urlInvierte+"/financiado" || URLactual == urlInvierte+"/cerrado" || URLactual == urlInvierte+"/no-financiado"){
            if(idEstado != ""){
                if(idEstado == "4"){
                    window.location.href='{{ asset('invierte/chile/propiedad') }}';
                }

                if(idEstado == "5"){
                    window.location.href='{{ asset('invierte/chile/propiedad/financiado') }}';
                }
                if(idEstado == "6"){
                    window.location.href='{{ asset('invierte/chile/propiedad/cerrado') }}';
                }
                if(idEstado == "7"){
                    window.location.href='{{ asset('invierte/chile/propiedad/no-financiado') }}';
                }
            }
        }else{
            if(idEstado != ""){
                if(idEstado == "4"){
                    window.location.href='{{ asset('dashboard/oportunidades') }}';
                }
                if(idEstado == "5"){
                    window.location.href='{{ asset('dashboard/oportunidades/financiado') }}';
                }
                if(idEstado == "6"){
                    window.location.href='{{ asset('dashboard/oportunidades/cerrado') }}';
                }
                if(idEstado == "7"){
                    window.location.href='{{ asset('dashboard/oportunidades/no-financiado') }}';
                }
                {{-- fetch('{{ asset('ordenar-propiedades') }}/'+idEstado,{
                        method:'get'
                    })
                    .then(response => response.text() )
                    .then(html => {
                        document.getElementById('contenedor').innerHTML = '';
                        document.getElementById("contenedor").innerHTML += html
                    })
                    .catch(error => console.log(error)) --}}
            }
        }
    }
</script>

@endsection