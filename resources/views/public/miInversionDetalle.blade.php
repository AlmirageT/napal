@extends('layouts.public.app')
@section('title')
Detalle Mi Inversión
@endsection
@section('css')
<style type="text/css">
	.slick-slider-area{
		margin-right: 15px;
		margin-left: 10px;
	}
    .contenedor-barra{
        width: 95%;
        justify-content: flex-end;
        margin: 60px 0;
        
    }
    
    .lista-botones{
        list-style: none;
        display: flex;
        justify-content: flex-end;
        width: 95%;
        
    }
    
    .lista-botones li a{
        text-decoration: none;
        color: #333;
        margin: 10px;
        text-align: center;
    }
    
    .lista-botones li a:hover{
        color: gray;
    }
    .contenedor-tabla {
        background-color: #FAFAFA;
    }
    table {
        background-color: #fff;
        font-family: sans-serif;
        margin: auto;
        margin-top: 50px;
        border-collapse: collapse;
    }
    
    td {
        color: #8E8A8A;
    }
    .bb {
     background-color: #F59C1E;
        color: #333;
   
        border-radius: 5px;
        padding: 3px;
    }
    
    td, th {
        border: 1px solid #CCCBCB;
        padding: 65px;
    }
</style>
@endsection
@section('content')
<div class="main-title">
    <h1>Santina Resort & Spa</h1>
</div>
<div class="slick-slider-area" >
    <div class="row slick-carousel" data-slick='{"autoplay":true,"slidesToShow": 3, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>
        <div class="slick-slide-item">
            <div class="property-box">
                <div class="property-thumbnail">
                    <img class="d-block w-100" src="http://placehold.it/350x233" alt="properties">
                </div>
            </div>
        </div>
        <div class="slick-slide-item">
            <div class="property-box">
                <div class="property-thumbnail">
                    <img class="d-block w-100" src="http://placehold.it/350x233" alt="properties">
                </div>
            </div>
        </div>
        <div class="slick-slide-item">
            <div class="property-box">
                <div class="property-thumbnail">
                    <img class="d-block w-100" src="http://placehold.it/350x233" alt="properties">
                </div>
            </div>
        </div>
        <div class="slick-slide-item">
            <div class="property-box">
                <div class="property-thumbnail">
                    <img class="d-block w-100" src="http://placehold.it/350x233" alt="properties">
                </div>
            </div>
        </div>
        <div class="slick-slide-item">
            <div class="property-box">
                <div class="property-thumbnail">
                    <img class="d-block w-100" src="http://placehold.it/350x233" alt="properties">
                </div>
            </div>
        </div>
        <div class="slick-slide-item">
            <div class="property-box">
                <div class="property-thumbnail">
                    <img class="d-block w-100" src="http://placehold.it/350x233" alt="properties">
                </div>
            </div>
        </div>
        
    </div>
    <nav class="contenedor-barra">
        <ul class="lista-botones">
           <li> <a href="#">DETALLES FINANCIACIÓN</a> </li>
           <span>|</span>
           <li> <a href="#">EVOLUCIÓN PROYECTO</a> </li>
            <span>|</span>
           <li> <a href="#">TU POSICIÓN</a> </li>
            <span>|</span>
           <li> <a href="#">INGRESOS</a> </li>
            <span>|</span>
           <li> <a href="#">PROMOCIONES</a> </li>
            <span>|</span>
           <li> <a href="#">MOVIMIENTOS</a> </li>
            <span>|</span>
           <li> <a href="#">DOCUMENTOS</a> </li>
        </ul>
    </nav>
</div>
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-6" align="left">
                    <h4>Detalles financiación</h4>
                </div>
                <div class="col-lg-6" align="right">
                    <h6>Tipo de oportunidad</h6>
                    <a>
                        <img src="https://static.housers.com/assets/images/icons/projects/project-ico-fixed_green.svg" alt="Tipo fijo" title="Tipo fijo">
                        Tipo Fijo
                    </a>
                </div>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="table-responsive">
                <div class="contenedor-tabla">
                    <br>
                    <table>
                        <tr>
                        <td>ESTADO<br><strong>FINANCIADO</strong></td>
                        <td>FORMA JURÍDICA<br><strong>PRÉSTAMO</strong></td>
                        <td>NIVEL DE RIESGO<br><br><strong class="bb">BB</strong></td>
                        <td>FECHA INICIO INVERSIÓN<br><strong>18-09-2020</strong></td>
                        </tr>
                     <tr>
                        <td>FECHA FIN INVERSIÓN<br><strong>F03-11-2020</strong></td>
                        <td>DÍAS EN FINANCIACIÓN<br><strong>45</strong></td>
                        <td>N DE INVERSORES<br><strong>462</strong></td>
                        <td>INVERSIÓN MEDIA X INVERSOR<br><strong>$143.-</strong></td>
                        </tr>

                          <tr>
                        <td>CANTIDAD FINANCIADA<br><strong>200.000</strong></td>
                        <td>VALOR INICIAL<br><strong>1,000/</strong></td>
                        <td>RENTABILIDAD ANUAL/TOTAL<br><strong>10,00/10,00%</strong></td>
                        <td>PLAZO<br><strong>12 MESES</strong></td>
                        </tr> 
                    </table>
                <br>
                </div>
            </div>
        </div>
        <div class="col-lg-12" align="left">
            <br>
            <h4>Evolución del proyecto</h4>
        </div>
        <div class="col-lg-12">
            <div class="table-responsive">
                <table>
                    <tr>
                        <td>3 de Noviembre de 2020<br><strong>Cierre financiación</strong></td>
                        <td>22 de septiembre de 2020<br><strong>Inicio Financiación</strong></td>
                    </tr>
                </table>
            </div>
            <br>
        </div>
        <div class="col-lg-12" align="left">
            <br>
           <h4>Tu posición en la oportunidad</h4> 
        </div>
        <div class="col-lg-12">
            <div class="table-responsive">
                <table>
                    <tr>
                        <td>INVERSIÓN ACTUAL<br><strong>80,00 EUROS</strong></td>
                        <td>N° DE TÍTULOS<br><strong>80,00</strong></td>
                               <td>PRECIO MEDIO ADQUISICIÓN<br><strong>1,00 EURO</strong></td>
                        <td>RENTABILIDAD ANUAL<br><strong>10,00%</strong></td>
                    </tr>
                </table>
            </div>
            <br>
        </div>
        <div class="col-lg-12">
            <div class="row">
                <div class="col-lg-8">
                    <div id="chart_div"></div>
                </div>
                <div class="col-lg-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-12">
                                    <h4>Mis beneficios</h4>
                                </div>
                                <div class="col-lg-6" align="left">
                                    <p>Rendimientos</p>
                                </div>
                                <div class="col-lg-6" align="right">
                                    <p> 0,00 €</p>
                                </div>
                                <div class="col-lg-6" align="left">
                                    <p>Operaciones CCD</p>
                                </div>
                                <div class="col-lg-6" align="right">
                                    <p> 0,00 €</p>
                                </div>
                                <div class="col-lg-6" align="left">
                                    <p>Comisión Housers</p>
                                </div>
                                <div class="col-lg-6" align="right">
                                    <p> 0,00 €</p>
                                </div>
                                <div class="col-lg-6" align="left">
                                    <p>Beneficio neto</p>
                                </div>
                                <div class="col-lg-6" align="right">
                                    <p> 0,00 €</p>
                                </div>
                                <div class="col-lg-6" align="left">
                                    <p>Impuestos</p>
                                </div>
                                <div class="col-lg-6" align="right">
                                    <p> 0,00 €</p>
                                </div>
                                <div class="col-lg-6" align="left">
                                    <p><strong>Ingresos obtenidos</strong></p>
                                </div>
                                <div class="col-lg-6" align="right">
                                    <p><strong>0,00 €</strong></p>
                                </div>
                                <div class="col-lg-12" align="left">
                                    <img src="https://static.housers.com/assets/images/dashboard/housers-ico-euros.svg" class="euros">
                                </div>
                            </div>
                        </div>
                    </div>
                    <br>
                </div>
            </div>
        </div>
        <div class="col-lg-12" align="left">
            <br>
            <h4>Promociones asociadas</h4>
        </div>
        <div class="col-lg-12">
            <div class="card" style="box-shadow: 0 0 10px 0 rgba(0,0,0,0.2);">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><small>PROMOCIÓN</small></th>
                                    <th><small>CÓDIGO</small></th>
                                    <th><small>FECHA INICIO</small></th>
                                    <th><small>FECHA FIN</small></th>
                                    <th><small>ESTADO</small></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="5" style="text-align: center !important;">No hay resultados</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
                <br>
        <br>
        </div>
        <div class="col-lg-12" align="left">
            <br>
            <h4>Últimos movimientos</h4>
        </div>
        <div class="col-lg-12">
            <div class="card" style="box-shadow: 0 0 10px 0 rgba(0,0,0,0.2);">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th><small>MES EFECTO</small></th>
                                    <th><small>AÑO EFECTO</small></th>
                                    <th><small>FECHA</small></th>
                                    <th><small>DESCRIPCIÓN</small></th>
                                    <th><small>IMPORTE</small></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td colspan="5" style="text-align: center !important;">No hay resultados</td>
                                </tr>
                            </tbody>
                        </table>
                        <div align="center">
                            <a href="" class="btn btn-primary"><small>VER TODOS</small></a>
                        </div>
                    </div>
                </div>
            </div>
                <br>
        </div>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
    google.charts.load('current', {packages: ['corechart', 'line']});
    google.charts.setOnLoadCallback(drawLineColors);

function drawLineColors() {
    var data = new google.visualization.DataTable();
    data.addColumn('number', 'X');
    data.addColumn('number', 'Dogs');
    data.addColumn('number', 'Cats');

    data.addRows([
        [0, 0, 0],    [1, 10, 5],   [2, 23, 15],  [3, 17, 9],   [4, 18, 10],  [5, 9, 5],
        [6, 11, 3],   [7, 27, 19],  [8, 33, 25],  [9, 40, 32],  [10, 32, 24], [11, 35, 27],
        [12, 30, 22], [13, 40, 32], [14, 42, 34], [15, 47, 39], [16, 44, 36], [17, 48, 40],
        [18, 52, 44], [19, 54, 46], [20, 42, 34], [21, 55, 47], [22, 56, 48], [23, 57, 49],
        [24, 60, 52], [25, 50, 42], [26, 52, 44], [27, 51, 43], [28, 49, 41], [29, 53, 45],
        [30, 55, 47], [31, 60, 52], [32, 61, 53], [33, 59, 51], [34, 62, 54], [35, 65, 57],
        [36, 62, 54], [37, 58, 50], [38, 55, 47], [39, 61, 53], [40, 64, 56], [41, 65, 57],
        [42, 63, 55], [43, 66, 58], [44, 67, 59], [45, 69, 61], [46, 69, 61], [47, 70, 62],
        [48, 72, 64], [49, 68, 60], [50, 66, 58], [51, 65, 57], [52, 67, 59], [53, 70, 62],
        [54, 71, 63], [55, 72, 64], [56, 73, 65], [57, 75, 67], [58, 70, 62], [59, 68, 60],
        [60, 64, 56], [61, 60, 52], [62, 65, 57], [63, 67, 59], [64, 68, 60], [65, 69, 61],
        [66, 70, 62], [67, 72, 64], [68, 75, 67], [69, 80, 72]
    ]);

    var options = {
        hAxis: {
          title: 'Time'
        },
        vAxis: {
          title: 'Popularity'
        },
        colors: ['#a52714', '#097138']
    };

    var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
    chart.draw(data, options);
}
</script>
@endsection