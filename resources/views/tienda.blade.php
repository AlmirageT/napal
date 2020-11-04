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
                                {!! Form::select('idEstado', $estados,null,['class'=>"sorting",'placeholder'=>"Seleccione",'onchange'=>"orderBy(this.value)"]) !!}
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Option bar end -->

                <!-- grid properties start -->
                <div class="row" id="contenedor">
                    @include('paginas')
                </div>
                <!-- grid properties end -->

                <!-- Page navigation start -->
                <div class="pagination-box hidden-mb-45 text-center">
                    <nav aria-label="Page navigation example">
                        {{ $propiedadesTienda->links() }}
                    </nav>
                </div>
                <!-- Page navigation end-->
            </div>
        </div>
    </div>
</div>
@endsection
<script>
    function orderBy(idEstado) {
        fetch('{{ asset('ordenar-propiedades') }}/'+idEstado,{
            method:'get'
        })
        .then(response => response.text() )
        .then(html => {
            document.getElementById('contenedor').innerHTML = '';
            document.getElementById("contenedor").innerHTML += html
        })
        .catch(error => console.log(error))
    }
</script>