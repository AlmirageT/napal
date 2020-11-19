<div class="card-body pt-8 p-md-10 p-5">
    @if($propiedad->idTipoFlexibilidad == 1)
    <p><strong>CONTRATO FLEX </strong>- Tipología de contrato de 12 meses con una posible prórroga con una única duración de 6 meses adicionales. Para más información haz clic aquí.</p>
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
    <p><strong>Riesgos y advertencias:</strong> Housers no es una entidad de crédito ni una empresa de servicios de inversión. La inversión en proyectos publicados por HOUSERS no está cubierta por ningún fondo de inversión. Este proyecto no ha sido objeto de supervisión por la CNMV ni por el Banco de España ni por ningún otro regulador, español o extranjero. La información facilitada por el promotor no ha sido revisada por la CNMV ni constituye un folleto aprobado por esta. Housers no proporciona asesoramiento financiero, por lo que nada en esta web debe interpretarse como tal. La inversión en este proyecto implica los siguientes riesgos: riesgo de pérdida total o parcial del capital invertido, riesgo de no obtener el rendimiento dinerario esperado y riesgo de iliquidez para recuperar la inversión. El promotor acumula 1 proyecto en la plataforma el cual se financió con éxito (Sardinia Beach). Este préstamo de 100.000 € es el segundo tramo de un total de 3 tramos de 300.000 €, lo que podría conllevar un riesgo adicional de concentración. El promotor del proyecto es responsable frente a los inversores de la información que ha proporcionado a la plataforma de financiación participativa para su publicación dentro del proyecto en la página web. El promotor tiene un capital social a 31/12/2019 de 10.200 € y unos Fondos Propios a 31/12/2019 de 154.952 € de forma que su responsabilidad en el proyecto queda limitada a esta cantidad. Debido a los recursos propios limitados de la sociedad, la comisión de Housers se financia dentro del proyecto. De esta manera, es el inversor quién soporta la comisión de Housers. Se establecen como garantías adicionales un inmueble en Comune di Valledoria, Vía Ampurias (Lotti C, Sezione B, Foglio 7, Particella 608). Tanto el objetivo de financiación como plazo máximo para invertir en esta oportunidad podrá ampliarse un 25% adicional al inicialmente previsto, conforme a la Ley de Fomento de la Financiación Empresarial. Así mismo, HOUSERS podrá dar por cerrada la financiación de esta oportunidad/proyecto cuando se haya financiado en un 90%. Estas posibilidades que la legislación ofrece a la plataforma, se utilizarán cuando la tipología y características del proyecto lo aconseje de forma que se pueda llevar a cabo con una financiación inferior o superior a la solicitada y los plazos de ejecución no se vean perjudicados. Esta información la tienes ampliada aquí.</p>
    <p><strong>1) Tipo Fijo:</strong> Préstamo a tipo fijo a 12 meses al promotor inmobiliario donde los intereses se reparten mensualmente y el principal se amortiza al final del proyecto. El interés no está garantizado pero el promotor presenta garantía adicional.</p>
    <p><strong>2) Contrato Flex: </strong>La Sociedad Promotora podrá activar una prórroga de una duración única de 6 meses a la fecha de vencimiento del contrato, comunicándolo a Housers con al menos un mes de antelación. Esta prórroga llevará aparejada un incremento sobre la tasa de interés acordada en la devolución de capital, resultando para este proyecto, un interés anual del 9,5% durante la prórroga. Esta información se encuentra más detallada en el artículo 3.3.1 del Contrato de Préstamo.</p>
    <p><strong>3) </strong>Es la rentabilidad total de la inversión. Tiene en cuenta el plazo total de 12 meses y el interés fijo anual pactado por el promotor. Para más detalle ver el Informe del Promotor.</p>
    <p><strong>4)</strong> Según el artículo 68.2 de la Ley 5/2015 de Fomento de la financiación empresarial, "El importe máximo de captación de fondos por proyecto de financiación participativa a través de cada una de las plataformas de financiación participativa no podrá ser superior a 2.000.000 de euros, siendo posible la realización de sucesivas rondas de financiación que no superen el citado importe en cómputo anual. Cuando los proyectos se dirijan exclusivamente a inversores acreditados, el importe máximo anterior podrá alcanzar los 5.000.000 de euros". La no financiación de uno de los tramos del proyecto supone la devolución del resto de tramos financiados, al tratarse de un proyecto único.</p>
    <h3 class="heading-2">
        <br>
        Planos
    </h3>
    <table class="table table-border">
        <tbody><tr>
            <td><strong>Size</strong></td>
            <td><strong>Rooms</strong></td>
            <td><strong>Bathrooms</strong></td>
            <td><strong>Garage</strong></td>
        </tr>
        <tr>
            <td>1600</td>
            <td>3</td>
            <td>2</td>
            <td>1</td>
        </tr>
        </tbody>
    </table>
    @if(isset($imagenesPlanos))
    <img src="{{ asset($imagenesPlanos->fotoPlano) }}" alt="floor-plans" class="img-fluid">
    <br>

    @else
    No tiene imagenes de planos
    <br>
    @endif
    <h3 class="heading-2">
    <br>

        Video
    </h3>
    @if($propiedad->urlVideo != null)
    <iframe src="{{ $propiedad->urlVideo }}" allowfullscreen=""></iframe>
    <br>

    @else
    No tiene video asociado
    <br>
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