<!-- footer begin -->
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <img src="images/logo.png" class="logo-small" alt="" style="width: 120px"><br>
                Descubre que HAY QUÍMICA en la inversión inmobiliaria
            </div>

            <div class="col-md-4">
                <div class="widget widget_recent_post">
                    <h3>Últimas noticias</h3>
                    <ul>
                        @foreach ($noticiasRecientes as $noticiaReciente)
                            <li><a href="#section-fun-facts">{{ $noticiaReciente->titulo }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>

            <div class="col-md-4">
                <h3>Conversemos</h3>
                <div class="widget widget-address">
                    <address>
                        <span>Av. Providencia 1650 OF 601 - Providencia</span>
                        <span><strong>Teléfono: </strong> 600 656 0250</span>
                        <span><strong>Móvil:</strong> {{ substr(substr($telefonoWhatsapp->valorParametro, 0, 2) . ' ' . substr($telefonoWhatsapp->valorParametro, 2), 0, 7) . ' ' . substr(substr($telefonoWhatsapp->valorParametro, 0, 2) . ' ' . substr($telefonoWhatsapp->valorParametro, 2), 7) }}</span>
                        <!--<span><strong>Email:</strong><a href="mailto:contact@archi-interior.com">contact@archi-interior.com</a></span>-->
                        <span><strong>Web:</strong><a href="http://www.iquimica.cl"> www.iquimica.cl</a></span>
                    </address>
                </div>
            </div>
        </div>
    </div>

    <div class="subfooter">
        <div class="container">
            <div class="row">
                <!--
                <div class="col-md-6">
                    &copy; Copyright 2019 - Archi Interior Design Template by <span class="id-color">Designesia</span>
                </div>
                -->
                <div class="col-md-6 text-right">
                    <div class="social-icons">
                        <a href="#"><i class="fa fa-facebook fa-lg"></i></a>
                        <a href="#"><i class="fa fa-instagram fa-lg"></i></a>
                        <!--<a href="#"><i class="fa fa-twitter fa-lg"></i></a>-->
                        <!--<a href="#"><i class="fa fa-rss fa-lg"></i></a>-->
                        <!--<a href="#"><i class="fa fa-google-plus fa-lg"></i></a>-->
                        <!--<a href="#"><i class="fa fa-skype fa-lg"></i></a>-->
                        <!--<a href="#"><i class="fa fa-dribbble fa-lg"></i></a>-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <a href="#" id="back-to-top"></a>
</footer>
<!-- footer close -->
