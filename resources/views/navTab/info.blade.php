<style>
    .contenedor-datos {
        width: 100%;
    }
    
    .box{
        width: 100%;
        height: 150px;
        border: 1px solid grey;
        display: flex;
        justify-content: space-between;
    }
    
   .datos{
        margin: auto;
        width: 32%;
        height: 120px;
        border: 1px solid grey;
        border-bottom: none;
        border-top: none;
        border-right: none;
        text-align: center;
        color: grey;
    }
    
    .datos1{
        margin: auto;
        width: 32%;
        height: 120px;
        border: 1px solid grey;
        border-bottom: none;
        border-top: none;
        border-right: none;
        border-left: none;
        text-align: center;
        color: grey;
    }
    
</style>
<div class="card-body pt-8 p-md-12 p-5">
    <div class="contenedor-datos">
        <div class="box">
           <div class="datos1">
               <p>Rentabilidad Anual</p>
               <h3>{{ $propiedad->rentabilidadAnual }}%</h3>
           </div>
           
            <div class="datos">
               <p>Rentabilidad Total</p>
               <h3>{{ $propiedad->rentabilidadTotal }}%</h3>
            </div>
            @php
	            $date1 = new DateTime($propiedad->fechaInicio);
	            $date2 = new DateTime($propiedad->fechaFinalizacion);
	            $diff = $date1->diff($date2);
	        @endphp
            <div class="datos">
               <p>Plazo</p>
               <h3>{!! $diff->days !!} Días</h3>
             </div>
        </div>
    </div>
    	<br>
    <div class="row">

    	<div class="col-lg-6">
    		<table class="table">
		    	<thead>
		    		<tr>
		    			<th><small>DATOS DE LA OPERACIÓN</small></th>
		    			<th></th>
		    		</tr>
		    	</thead>
		    	<tbody>
		    		<tr>
		    			<th><small>Objetivo de financiación</small></th>
		    			<th><small>${{ number_format($propiedad->precio,0,',','.') }}</small></th>
		    		</tr>
		    	</tbody>
		    </table>
    	</div>
    	@php
    		$totalDescuento = ($propiedad->rentabilidadTotal * $propiedad->precio)/100;
    	@endphp
    	<div class="col-lg-6">
    		<table class="table">
		    	<thead>
		    		<tr>
		    			<th><small>Análisis de la operación</small></th>
		    			<th></th>
		    		</tr>
		    	</thead>
		    	<tbody>
		    		<tr>
		    			<th><small>Beneficio de la operación</small></th>
		    			<th><small>${{ number_format($totalDescuento,0,',','.') }}</small></th>
		    		</tr>
		    	</tbody>
		    </table>
    	</div>
    	<br>
    </div>
    	<br>
    
    <h3 class="heading-2">
    	Número de inversiones diarias
    </h3>
    <div class="row">
      <div class="col-lg-12">
        <div id="chart_div"></div>

      </div>
    </div>
    @if (count($infoFinanciera)>0)
    <br>
    <br>
    <br>
        {!! $infoFinanciera->first()->textoMisionEmpresa !!}
    @endif
</div>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load('current', {packages: ['corechart', 'bar']});
  google.charts.setOnLoadCallback(drawBasic);

  function drawBasic() {

    var data = google.visualization.arrayToDataTable([
      ['Days', 'Total', { role: 'style' } ],
      ['Lunes', {{ $lunes }}, 'color: blue'],
      ['Martes', {{ $martes }}, 'color: blue'],
      ['Miercoles', {{ $miercoles }}, 'color: blue'],
      ['Jueves', {{ $jueves }}, 'color: blue'],
      ['Viernes', {{ $viernes }}, 'color: blue'],
      ['Sabado', {{ $sabado }}, 'color: blue'],
      ['Domingo', {{ $domingo }}, 'color: blue']
    ]);
    var chart = new google.visualization.ColumnChart(
      document.getElementById('chart_div')
    );
    chart.draw(data);
  }
</script>