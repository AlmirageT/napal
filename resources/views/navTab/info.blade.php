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
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
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
    	Inversión Diaria
    </h3>
    <div class="row">
    	<div class="col-lg-12">
    		<div id="chart_div"></div>
    	</div>
    </div>
</div>
<script type="text/javascript">
google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawBasic);

function drawBasic() {

      var data = new google.visualization.DataTable();
      data.addColumn('timeofday', 'Time of Day');
      data.addColumn('number', 'Motivation Level');

      data.addRows([
        [{v: [8, 0, 0], f: '8 am'}, 1],
        [{v: [9, 0, 0], f: '9 am'}, 2],
        [{v: [10, 0, 0], f:'10 am'}, 3],
        [{v: [11, 0, 0], f: '11 am'}, 4],
        [{v: [12, 0, 0], f: '12 pm'}, 5],
        [{v: [13, 0, 0], f: '1 pm'}, 6],
        [{v: [14, 0, 0], f: '2 pm'}, 7],
        [{v: [15, 0, 0], f: '3 pm'}, 8],
        [{v: [16, 0, 0], f: '4 pm'}, 9],
        [{v: [17, 0, 0], f: '5 pm'}, 10],
      ]);

      var options = {
        title: 'Motivation Level Throughout the Day',
        hAxis: {
          title: 'Time of Day',
          format: 'h:mm a',
          viewWindow: {
            min: [7, 30, 0],
            max: [17, 30, 0]
          }
        },
        vAxis: {
          title: 'Rating (scale of 1-10)'
        }
      };

      var chart = new google.visualization.ColumnChart(
        document.getElementById('chart_div'));

      chart.draw(data, options);
    }
</script>