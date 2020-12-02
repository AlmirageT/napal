
@extends('layouts.public.app')
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
        var urlInvierte = "{{ asset('invierte') }}";
        if(URLactual == urlInvierte || URLactual == urlInvierte+"/financiado" || URLactual == urlInvierte+"/cerrado" || URLactual == urlInvierte+"/no-financiado"){
            if(idEstado != ""){
                if(idEstado == "4"){
                    window.location.href='{{ asset('invierte') }}';
                }

                if(idEstado == "5"){
                    window.location.href='{{ asset('invierte/financiado') }}';
                }
                if(idEstado == "6"){
                    window.location.href='{{ asset('invierte/cerrado') }}';
                }
                if(idEstado == "7"){
                    window.location.href='{{ asset('invierte/no-financiado') }}';
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