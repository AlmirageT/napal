<div class="card-body pt-8 p-md-10 p-5">
    @if($propiedad->idTipoFlexibilidad == 1)
    {!! $propiedad->contratoFlex !!}
    @endif
    <h3 class="heading-2">
        DESCRIPCIÓN
    </h3>
    {!! $propiedad->descripcion !!}
    <br>
    <h3 class="heading-2">
        LA OPORTUNIDAD
    </h3>
    {!! $propiedad->oportunidad !!}
    <br>
    <h3 class="heading-2">
        ¿POR QUÉ INVERTIR EN {{ strtoupper($propiedad->nombrePropiedad) }}?
    </h3>
    {!! $propiedad->invertir !!}
    <br>
    <h3 class="heading-2">
        UBICACIÓN
    </h3>
    {!! $propiedad->ubicacion !!}
    <br>
    <h3 class="heading-2">
        EL PROYECTO
    </h3>
    {!! $propiedad->proyecto !!}
    <br>
    <h3 class="heading-2">
        EL PROMOTOR
    </h3>
    {!! $propiedad->promotor !!}
    <br>
    <hr>
   @if (count($riesgoAdvertencia)>0)
       {!! $riesgoAdvertencia->first()->textoMisionEmpresa !!}
   @endif
    <h3 class="heading-2">
        <br>
        Caracteristicas
    </h3>
    <div class="table-responsive">
        <table class="table table-border">
            <tbody><tr>
                <td><strong>mConstruido</strong></td>
                <td><strong>mSuperifice</strong></td>
                <td><strong>mTerraza</strong></td>
                <td><strong>habitaciones</strong></td>
                <td><strong>baños</strong></td>
            </tr>
            <tr>
                <td>{{ $propiedad->mConstruido }}</td>
                <td>{{ $propiedad->mSuperficie }}</td>
                <td>{{ $propiedad->mTerraza }}</td>
                <td>{{ $propiedad->habitaciones }}</td>
                <td>{{ $propiedad->baños }}</td>
            </tr>
            </tbody>
        </table>
    </div>
    
    @if(count($imagenesPlanos)>0)
    @php
        $imagenUno = $imagenesPlanos->shift();
    @endphp
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
          @if (count($imagenesPlanos)>0)
            @for ($i = 0; $i < count($imagenesPlanos); $i++)
                <li data-target="#carouselExampleIndicators" data-slide-to="{{ $i+1 }}"></li>
            @endfor
          @endif
          
        </ol>
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img class="d-block w-100" src="{{ asset($imagenUno->fotoPlano) }}" alt="First slide">
          </div>
          @if (count($imagenesPlanos)>0)
            @for ($i = 0; $i < count($imagenesPlanos); $i++)
                <div class="carousel-item">
                    <img class="d-block w-100" src="{{ asset($imagenesPlanos[$i]->fotoPlano) }}" alt="Second slide">
                </div>
            @endfor
          @endif
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>
    </div>

    @endif
    @if($propiedad->urlVideo != null)

    <h3 class="heading-2">
    <br>

        Video
    </h3>
    <iframe src="https://www.youtube.com/embed/{{ $propiedad->urlVideo }}"  frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    @endif
    <input type="hidden" id="paises" value="{{ $propiedad->nombrePais }}">
    <input type="hidden" id="select_regiones" value="{{ $propiedad->nombreRegion }}">
    <input type="hidden" id="select_provincias" value="{{ $propiedad->nombreProvincia }}">
    <input type="hidden" id="select_comunas" value="{{ $propiedad->nombreComuna }}">
    <input type="hidden" id="txtDireccion" value="{{ $propiedad->direccion1 }}">
    <input type="hidden" id="txtNumero" value="{{ $propiedad->direccion2 }}">
    <div class="map">
    <br>

        <h3 class="heading-2">
            Localización
        </h3>
        <div class="col-lg-12">
            <div id="map" style="width: 100%; height: 300px"></div>
            <br>
        </div>
    </div>
</div>