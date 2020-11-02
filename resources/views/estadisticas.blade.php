@extends('layouts.public.app')
@section('content')
<div class="counters overview-bgi">
    <div class="container">
        <div class="row">
        	<div class="col-lg-12 col-md-12 col-sm-12" align="center">
        		<h3>Apostamos por la total transparencia</h3>
        	<br>
        	<br>
        	</div>
            <div class="col-lg-3 col-md-3 col-sm-6 wow fadeInLeft delay-00s">
                <div class="media counter-box">
                    <div class="media-left">
                        <i class="flaticon-tag"></i>
                    </div>
                    <div class="media-body">
                        <h1 class="counter">967</h1>
                        <p>TIR MEDIA PLATAFORMA</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 wow fadeInLeft delay-00s">
                <div class="media counter-box">
                    <div class="media-left">
                        <i class="flaticon-business"></i>
                    </div>
                    <div class="media-body">
                        <h1 class="counter">1276</h1>
                        <p>CIFRA DE INVERSIÓN ACUMULADA</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 wow fadeInRight delay-00s">
                <div class="media counter-box">
                    <div class="media-left">
                        <i class="flaticon-people"></i>
                    </div>
                    <div class="media-body">
                        <h1 class="counter">396</h1>
                        <p>RENDIMIENTO REPARTIDOS + DEVOLUCIÓN + DE CAPITAL + CCD</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 wow fadeInRight delay-00s">
                <div class="media counter-box">
                    <div class="media-left">
                        <i class="flaticon-people-1"></i>
                    </div>
                    <div class="media-body">
                        <h1 class="counter">177</h1>
                        <p>N° DE USUARIOS REGISTRADOS</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container">
	<div class="row">
		<div class="col-lg-12" align="center">
			<br>
			<br>
			<h3>TIR media de la plataforma</h3>
			<br>
			<br>
		</div>
		<div class="col-lg-9 col-md-9 col-xs-12">
			<div id="chart_div"></div>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-12 wow fadeInCenter delay-00s">
            <div class="media counter-box">
                <div class="media-left">
                    <i class="flaticon-tag"></i>
                </div>
                <div class="media-body">
                    <h1 class="counter" style="color: black">967</h1>
                    <p style="color: black">TIR MEDIA PLATAFORMA</p>
                </div>
            </div>
        </div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-lg-12" align="center">
			<br>
			<br>
			<h3>Evolución cifra de inversión</h3>
			<br>
			<br>
		</div>
		<div class="col-lg-9 col-md-9 col-xs-12">
			<div id="cifra_acumulada"></div>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-12 wow fadeInCenter delay-00s">
            <div class="media counter-box">
                <div class="media-left">
                    <i class="flaticon-business"></i>
                </div>
                <div class="media-body">
                    <h1 class="counter" style="color: black">1276</h1>
                    <p style="color: black">CIFRA DE INVERSIÓN ACUMULADA</p>
                </div>
            </div>
        </div>

	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-lg-12" align="center">
			<br>
			<br>
			<h3>Rendimientos repartidos y capital devuelto a los inversores</h3>
			<br>
			<br>
		</div>
		<div class="col-lg-9 col-md-9 col-xs-12">
			<div id="rendimiento_repartido"></div>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-12 wow fadeInCenter delay-00s">
            <div class="media counter-box">
                <div class="media-left">
                    <i class="flaticon-people"></i>
                </div>
                <div class="media-body">
                    <h1 class="counter" style="color: black">396</h1>
                    <p style="color: black">RENDIMIENTO REPARTIDOS + DEVOLUCIÓN + DE CAPITAL + CCD</p>
                </div>
            </div>
        </div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-lg-12" align="center">
			<br>
			<br>
			<h3>Número de proyectos cerrados por país</h3>
			<br>
			<br>
		</div>
		<div class="col-lg-9 col-md-9 col-xs-12">
			<div id="proyectos_cerrados"></div>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-12 wow fadeInCenter delay-00s">
            <div class="media counter-box">
                <div class="media-left">
                    <i class="flaticon-people"></i>
                </div>
                <div class="media-body">
                    <h1 class="counter" style="color: black">396</h1>
                    <p style="color: black">otra cosa</p>
                </div>
            </div>
        </div>
	</div>
</div>
<div class="container">
	<div class="row">
		<div class="col-lg-12" align="center">
			<br>
			<br>
			<h3>Evolución del nº de usuarios registrados</h3>
			<br>
			<br>
		</div>
		<div class="col-lg-9 col-md-9 col-xs-12">
			<div id="usuarios_registrados"></div>
		</div>
		<div class="col-lg-3 col-md-3 col-sm-12 wow fadeInCenter delay-00s">
            <div class="media counter-box">
                <div class="media-left">
                    <i class="flaticon-people-1"></i>
                </div>
                <div class="media-body">
                    <h1 class="counter" style="color: black">177</h1>
                    <p style="color: black">N° DE USUARIOS REGISTRADOS</p>
                </div>
            </div>
        </div>
	</div>
	<br>
	<br>
	<br>
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-12 text-center">
            <h4>TIR media <strong>ahorro</strong>* <img src="https://static.housers.com/assets/images/icons/icon-info.png" class="info-icon" data-toggle="modal" data-target="#rentModal"></h4>
            <br>
            <div class="table-responsive">
                <table class="table table-bordered custom">
                    <tr class="blue-head">
                        <th>Nº de<br>proyectos</th>
                        <th>Proyectos<br>cerrados</th>
                        <th>Inversión<br>acumulada</th>
                        <th>Tir media objetivo</th>
                        <th>Tir media conseguida</th>
                        <th>Rendimientos repartidos, capital devuelto y ccd</th>
                    </tr>
                    <tr>
                        <td>29</td>
                        <td>9</td>
                        <td>17.596.590 &euro;</td>
                        <td>4,97 %</td>
                        <td>4,33 %</td>
                        <td>10.797.281,99 &euro;</td>
                    </tr>
                </table>
            </div>
            <div class="text-left"><span style="font-size: 13px;">*La TIR Media objetivo y la TIR media conseguida incluyen los proyectos de préstamo participativo modalidad ahorro cerrados.</span></div>
            <br>
            <br>
            <h4>TIR media <strong>inversión</strong>* <img src="https://static.housers.com/assets/images/icons/icon-info.png" class="info-icon" data-toggle="modal" data-target="#saleModal"></h4>
            <br>
            <div class="table-responsive">
                <table class="table table-bordered custom">
                    <tr class="blue-head">
                        <th>Nº de<br>proyectos</th>
                        <th>Proyectos<br>cerrados</th>
                        <th>Inversión<br>acumulada</th>
                        <th>Tir media objetivo</th>
                        <th>Tir media conseguida</th>
                        <th>Rendimientos repartidos, capital devuelto y ccd</th>
                    </tr>
                    <tr>
                        <td>52</td>
                        <td>30</td>
                        <td>17.545.224,75 &euro;</td>
                        <td>7,8 %</td>
                        <td>7,93 %</td>
                        <td>9.615.288,18 &euro;</td>
                    </tr>
                </table>
            </div>
            <div class="text-left"><span style="font-size: 13px;">*La TIR Media objetivo y la TIR media conseguida incluyen los proyectos de préstamo participativo modalidad inversión cerrados.</span></div>
            <br>
            <br>

            <h4>TIR media <strong>tipo fijo</strong>* <img src="https://static.housers.com/assets/images/icons/icon-info.png" class="info-icon" data-toggle="modal" data-target="#fixedModal"></h4>
            <br>
            <div class="table-responsive">
                <table class="table table-bordered custom">
                    <tr class="blue-head">
                        <th>Nº de<br>proyectos</th>
                        <th>Proyectos<br>cerrados</th>
                        <th>Inversión<br>acumulada</th>
                        <th>Tir media objetivo</th>
                        <th>Tir media conseguida</th>
                        <th>Rendimientos repartidos, capital devuelto y ccd</th>
                    </tr>
                    <tr>
                        <td>144</td>
                        <td>28</td>
                        <td>64.066.572 &euro;</td>
                        <td>9,21 %</td>
                        <td>9,9 %</td>
                        <td>25.920.815,93 &euro;</td>
                    </tr>
                </table>
            </div>
            <div class="text-left"><span style="font-size: 13px;">*La TIR Media objetivo y la TIR media conseguida incluyen los proyectos de préstamo de Tipo Fijo cerrados.</span></div>
            <br>
            <br>

            <h4>TIR media <strong>tipo fijo (Alquiler)</strong>* <img src="https://static.housers.com/assets/images/icons/icon-info.png" class="info-icon" data-toggle="modal" data-target="#fixedSavingModal"></h4>
            <br>
            <div class="table-responsive">
                <table class="table table-bordered custom">
                    <tr class="blue-head">
                        <th>Nº de<br>proyectos</th>
                        <th>Proyectos<br>cerrados</th>
                        <th>Inversión<br>acumulada</th>
                        <th>Tir media objetivo</th>
                        <th>Tir media conseguida</th>
                        <th>Rendimientos repartidos, capital devuelto y ccd</th>
                    </tr>
                    <tr>
                        <td>7</td>
                        <td>0</td>
                        <td>2.943.639,62 &euro;</td>
                        <td> - </td>
                        <td> - </td>
                        <td>806.358,58 &euro;</td>
                    </tr>
                </table>
            </div>
            <div class="text-left"><span style="font-size: 13px;">*La TIR Media objetivo y la TIR media conseguida incluyen los proyectos de préstamo de tipo fijo (alquiler) cerrados.</span></div>
            <br>
            <br>

            <h4>TIR media <strong>tipo fijo (inversión)</strong>* <img src="https://static.housers.com/assets/images/icons/icon-info.png" class="info-icon" data-toggle="modal" data-target="#fixedInvestmentModal"></h4>
            <br>
            <div class="table-responsive">
                <table class="table table-bordered custom">
                    <tr class="blue-head">
                        <th>Nº de<br>proyectos</th>
                        <th>Proyectos<br>cerrados</th>
                        <th>Inversión<br>acumulada</th>
                        <th>Tir media objetivo</th>
                        <th>Tir media conseguida</th>
                        <th>Rendimientos repartidos, capital devuelto y ccd</th>
                    </tr>
                    <tr>
                        <td>6</td>
                        <td>4</td>
                        <td>2.203.442,84 &euro;</td>
                        <td>7,46 %</td>
                        <td>7,82 %</td>
                        <td>1.783.363,15 &euro;</td>
                    </tr>
                </table>
            </div>
            <div class="text-left"><span style="font-size: 13px;">*La TIR Media objetivo y la TIR media conseguida incluyen los proyectos de préstamo de tipo fijo (inversión) cerrados.</span></div>
            <br>
            <br>

            <h4>TIR media <strong>Equity</strong>* <img src="https://static.housers.com/assets/images/icons/icon-info.png" class="info-icon" data-toggle="modal" data-target="#equityModal"></h4>
            <br>
            <div class="table-responsive">
                <table class="table table-bordered custom">
                    <tr class="blue-head">
                        <th>Nº de<br>proyectos</th>
                        <th>Proyectos<br>cerrados</th>
                        <th>Inversión<br>acumulada</th>
                        <th>Tir media objetivo</th>
                        <th>Tir media conseguida</th>
                        <th>Rendimientos repartidos, capital devuelto y ccd</th>
                    </tr>
                    <tr>
                        <td>59</td>
                        <td>25</td>
                        <td>23.324.920 &euro;</td>
                        <td>8,41 %</td>
                        <td>8,77 %</td>
                        <td>10.267.981,39 &euro;</td>
                    </tr>
                </table>
            </div>
            <div class="text-left"><span style="font-size: 13px;">*La TIR Media objetivo y la TIR media conseguida incluyen los proyectos de Equity cerrados.</span></div>
        </div>
    </div>
    <br>
</div>
@endsection
<div class="modal fade" id="rentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center" id="exampleModalLabel">TIR media <strong>ahorro</strong></h4>
                <button type="button" class="close" data-dismiss="modal">×</button>
            </div>
            <div class="modal-body">
                <div class="info-container">
                    <p><b>Nº de proyectos:</b> contiene el número total de proyectos de esta modalidad financiados en la plataforma.</p>
                    <p><b>Nº de proyectos cerrados:</b> Préstamos devueltos por el promotor.</p>
                    <p><b>Inversión acumulada:</b> representa el importe total invertido en el conjunto de los proyectos de ahorro financiados en la plataforma.</p>
                    <p><b>Tir media objetivo:</b> Es la tasa interna de rentabilidad media prevista para los proyectos cerrados de esta modalidad en el momento de su publicación en la plataforma. Tiene en cuenta los rendimientos previstos y la duración prevista del proyecto. Se utiliza para evaluar, desde una perspectiva financiera, la rentabilidad de un proyecto y compararlo con otros tipos de inversión que hay en el mercado; viene siempre expresada en tanto por ciento.</p>
                    <p><b>Tir media conseguida:</b> Es la tasa interna de rentabilidad media de los proyectos de esta modalidad una vez cerrados. Tiene en cuenta los rendimientos entregados así como la duración final del proyecto. Se utiliza para evaluar, desde una perspectiva financiera, la rentabilidad de un proyecto y compararlo con otros tipos de inversión que hay en el mercado; viene siempre expresada en tanto por ciento.</p>
                    <p><b>Rendimientos y capital devuelto:</b> Los rendimientos son los intereses devengados por el préstamo y satisfechos por el promotor al inversor. El capital devuelto es el principal del préstamo devuelto por el promotor al inversor. Además, se incluye el volumen de fracciones de préstamo intercambiadas entre los inversores a través del CCD de esta modalidad.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="saleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center" id="exampleModalLabel">TIR media <strong>inversión</strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="info-container">
                    <p><b>Nº de proyectos:</b> contiene el número total de proyectos de esta modalidad financiados en la plataforma.</p>
                    <p><b>Nº de proyectos cerrados:</b> Préstamos devueltos por el promotor.</p>
                    <p><b>Inversión acumulada:</b> representa el importe total invertido en el conjunto de los proyectos de inversión financiados en la plataforma.</p>
                    <p><b>Tir Media Objetivo:</b> Es la tasa interna de rentabilidad media prevista para los proyectos cerrados de esta modalidad en el momento de su publicación en la plataforma. Tiene en cuenta los rendimientos previstos y la duración prevista del proyecto. Se utiliza para evaluar, desde una perspectiva financiera, la rentabilidad de un proyecto y compararlo con otros tipos de inversión que hay en el mercado; viene siempre expresada en tanto por ciento.</p>
                    <p><b>Tir Media Conseguida:</b> Es la tasa interna de rentabilidad media de los proyectos de esta modalidad una vez cerrados. Tiene en cuenta los rendimientos entregados así como la duración final del proyecto. Se utiliza para evaluar, desde una perspectiva financiera, la rentabilidad de un proyecto y compararlo con otros tipos de inversión que hay en el mercado; viene siempre expresada en tanto por ciento.</p>
                    <p><b>Rendimientos y capital devuelto:</b> Los rendimientos son los intereses devengados por el préstamo y satisfechos por el promotor al inversor. El capital devuelto es el principal del préstamo devuelto por el promotor al inversor. Además, se incluye el volumen de fracciones de préstamo intercambiadas entre los inversores a través del CCD de esta modalidad.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="fixedModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center" id="exampleModalLabel">TIR media <strong>tipo fijo</strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="info-container">
                    <p><b>Nº de proyectos:</b> Contiene el número total de proyectos de esta modalidad financiados en la plataforma.</p>
                    <p><b>Nº de proyectos cerrados:</b> Préstamos devueltos por el promotor.</p>
                    <p><b>Inversión acumulada:</b> Representa el importe total invertido en el conjunto de los proyectos de tipo fijo financiados en la plataforma..</p>
                    <p><b>Tir media objetivo:</b> Es la tasa interna de rentabilidad media prevista para los proyectos cerrados de esta modalidad en el momento de su publicación en la plataforma. Tiene en cuenta los rendimientos previstos y la duración prevista del proyecto. Se utiliza para evaluar, desde una perspectiva financiera, la rentabilidad de un proyecto y compararlo con otros tipos de inversión que hay en el mercado; viene siempre expresada en tanto por ciento.</p>
                    <p><b>Tir media conseguida:</b> Es la tasa interna de rentabilidad media de los proyectos de esta modalidad una vez cerrados. Tiene en cuenta los rendimientos entregados así como la duración final del proyecto. Se utiliza para evaluar, desde una perspectiva financiera, la rentabilidad de un proyecto y compararlo con otros tipos de inversión que hay en el mercado; viene siempre expresada en tanto por ciento.</p>
                    <p><b>Rendimientos y capital devuelto:</b> Los rendimientos son los intereses devengados por el préstamo y satisfechos por el promotor al inversor. El capital devuelto es el principal del préstamo devuelto por el promotor al inversor. Además, se incluye el volumen de fracciones de préstamo intercambiadas entre los inversores a través del CCD de esta modalidad.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="fixedSavingModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center" id="exampleModalLabel">TIR media <strong>tipo fijo (Alquiler)</strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="info-container">
                    <p><b>Nº de proyectos:</b> contiene el número total de proyectos de esta modalidad financiados en la plataforma.</p>
                    <p><b>Nº de proyectos cerrados:</b> Préstamos devueltos por el promotor.</p>
                    <p><b>Inversión acumulada:</b> representa el importe total invertido en el conjunto de los proyectos de tipo fijo financiados en la plataforma.</p>
                    <p><b>Tir media objetivo:</b> Es la tasa interna de rentabilidad media prevista para los proyectos cerrados de esta modalidad en el momento de su publicación en la plataforma. Tiene en cuenta los rendimientos previstos y la duración prevista del proyecto. Se utiliza para evaluar, desde una perspectiva financiera, la rentabilidad de un proyecto y compararlo con otros tipos de inversión que hay en el mercado; viene siempre expresada en tanto por ciento.</p>
                    <p><b>Tir media conseguida:</b> Es la tasa interna de rentabilidad media de los proyectos de esta modalidad una vez cerrados. Tiene en cuenta los rendimientos entregados así como la duración final del proyecto. Se utiliza para evaluar, desde una perspectiva financiera, la rentabilidad de un proyecto y compararlo con otros tipos de inversión que hay en el mercado; viene siempre expresada en tanto por ciento.</p>
                    <p><b>Rendimientos y capital devuelto:</b> Los rendimientos son los intereses devengados por el préstamo y satisfechos por el promotor al inversor. El capital devuelto es el principal del préstamo devuelto por el promotor al inversor. Además, se incluye el volumen de fracciones de préstamo intercambiadas entre los inversores a través del CCD de esta modalidad.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="fixedInvestmentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center" id="exampleModalLabel">TIR media <strong>tipo fijo (inversión)</strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="info-container">
                    <p><b>Nº de proyectos:</b> Contiene el número total de proyectos de esta modalidad financiados en la plataforma.</p>
                    <p><b>Nº de proyectos cerrados:</b> Préstamos devueltos por el promotor.</p>
                    <p><b>Inversión acumulada:</b> Representa el importe total invertido en el conjunto de los proyectos de tipo fijo financiados en la plataforma.</p>
                    <p><b>Tir media objetivo:</b> Es la tasa interna de rentabilidad media prevista para los proyectos cerrados de esta modalidad en el momento de su publicación en la plataforma. Tiene en cuenta los rendimientos previstos y la duración prevista del proyecto. Se utiliza para evaluar, desde una perspectiva financiera, la rentabilidad de un proyecto y compararlo con otros tipos de inversión que hay en el mercado; viene siempre expresada en tanto por ciento.</p>
                    <p><b>Tir media conseguida:</b> Es la tasa interna de rentabilidad media de los proyectos de esta modalidad una vez cerrados. Tiene en cuenta los rendimientos entregados así como la duración final del proyecto. Se utiliza para evaluar, desde una perspectiva financiera, la rentabilidad de un proyecto y compararlo con otros tipos de inversión que hay en el mercado; viene siempre expresada en tanto por ciento.</p>
                    <p><b>Rendimientos y capital devuelto:</b> Los rendimientos son los intereses devengados por el préstamo y satisfechos por el promotor al inversor. El capital devuelto es el principal del préstamo devuelto por el promotor al inversor. Además, se incluye el volumen de fracciones de préstamo intercambiadas entre los inversores a través del CCD de esta modalidad.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="equityModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title text-center" id="exampleModalLabel">TIR media <strong>Equity</strong></h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="info-container">
                    <p><b>Nº de proyectos:</b> Contiene el número total de proyectos de esta modalidad financiados en la plataforma.</p>
                    <p><b>Nº de proyectos cerrados:</b> Sociedades liquidadas y que han devuelto capital.</p>
                    <p><b>Inversión acumulada:</b> representa el importe total invertido en el conjunto de los proyectos de equity financiados en la plataforma.</p>
                    <p><b>Tir media objetivo:</b> Es la tasa interna de rentabilidad media prevista para los proyectos cerrados de esta modalidad en el momento de su publicación en la plataforma. Tiene en cuenta los rendimientos previstos y la duración prevista del proyecto. Se utiliza para evaluar, desde una perspectiva financiera, la rentabilidad de un proyecto y compararlo con otros tipos de inversión que hay en el mercado; viene siempre expresada en tanto por ciento.</p>
                    <p><b>Tir media conseguida:</b> Es la tasa interna de rentabilidad media de los proyectos de esta modalidad una vez cerrados. Tiene en cuenta los rendimientos entregados así como la duración final del proyecto. Se utiliza para evaluar, desde una perspectiva financiera, la rentabilidad de un proyecto y compararlo con otros tipos de inversión que hay en el mercado; viene siempre expresada en tanto por ciento.</p>
                    <p><b>Rendimientos y capital devuelto:</b> Los rendimientos son los dividendos devengados por la inversión y satisfechos por el promotor al inversor. El capital devuelto son las aportaciones devueltas por el promotor (sociedad) al inversor (socio).</p>
                </div>
            </div>
        </div>
    </div>
</div>
@section('scripts')
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script>
google.charts.load('current', {packages: ['corechart', 'bar']});
google.charts.setOnLoadCallback(drawBasic);
google.charts.setOnLoadCallback(graficoDos);
google.charts.setOnLoadCallback(graficoTres);
google.charts.setOnLoadCallback(graficoCuatro);
google.charts.setOnLoadCallback(graficoCinco);

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
function graficoDos() {
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
    document.getElementById('cifra_acumulada'));

  chart.draw(data, options);
}
function graficoTres() {
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
    document.getElementById('rendimiento_repartido'));

  chart.draw(data, options);
}
function graficoCuatro() {
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
    document.getElementById('proyectos_cerrados'));

  chart.draw(data, options);
}
function graficoCinco() {
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
    document.getElementById('usuarios_registrados'));

  chart.draw(data, options);
}
</script>
@endsection