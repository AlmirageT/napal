<div class="separador-60" style="padding: 30px;width: 10px;"></div>
    <style type="text/css">
        #smartphone-display{
            height: 720px;
        }
        #ipad-content{
            width: 477px;
            position: absolute;
            right: 41px;
            top: 68px;
            height: 639px;
            overflow: hidden;
        }
        #div-iphone{
            top: 135px; 
            position: absolute; 
            z-index: 2; 
            left: 76px; 
            width: 100%;
        }
        #iphone-content{
            width: 189px;
            position: absolute;
            right: 40px;
            top: 236px;
            height: 424px;
            overflow: hidden;
        }
        .imagen-ipad-estatica{
            position: absolute;
            z-index: 1;
            width: 585px;
            display: block;
            max-width: 100%;
            height: auto;
            border: 0;
            vertical-align: middle;
        }
        .img-responsive-content{
            display: block; 
            max-width: 100%; 
            height: auto;
            border: 0; 
            vertical-align: middle;
            width: 100%;
            margin-top: 22px; 

        }
        .img-responsive-iphone{
            display: block; 
            max-width: 100%; 
            height: auto;
            position: absolute;
            top: 225px;
            z-index: 2;
            width: 460px;
            right: -90px;
            border: 0; 
            vertical-align: middle;
        }
        .img-iphone-responsive-content{
            display: block; 
            max-width: 100%; 
            height: auto;
            border: 0; 
            vertical-align: middle; 
            width: 189px; 
            margin-top: 18px;
        }

        .aux {
            width: 466px;
            margin-top: 932px;
            margin-left: 12px;
        }
        .aux-iphone{
            margin-top: 1185px;
            width: 192px;
        }
        @media only screen and (max-width: 1199px) {
            #ipad-content{
                width: 477px;
                position: absolute;
                right: 41px;
                top: 68px;
                height: 554px;
                overflow: hidden;
            }
            .aux{
                width: 414px;
                margin-top: 550px;
                margin-left: 96px;
            }
            .aux-iphone{
                margin-top: 840px;
                width: 192px;
            }
        }
    </style>
    <div class="container" id="prueba-scroll">
        <div class="row">
            <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
            <div class="col-md-6 col-lg-6 col-xl-6 d-none d-sm-none d-md-none d-lg-block d-xl-block" id="smartphone-display">
                <div>
                    <img class="imagen-ipad-estatica" src="{{ asset('img_public/ipad.png') }}">
                    <div class="ipad-content" id="ipad-content">
                        <img class="aux" src="{{ asset('img_public/ipad_content_es.png') }}" style="transform: matrix(1, 0, 0, 1, 0, 0);">
                    </div>
                </div>
                <div id="div-iphone">
                    <img class="lazy img-responsive-iphone" src="{{ asset('img_public/iphone.png') }}">
                    <div class="iphone-content" id="iphone-content">
                        <img class="aux-iphone" src="{{ asset('img_public/iphone_content_es.png') }}" style="transform: matrix(1, 0, 0, 1, 0, 0);">
                    </div>
                </div>
            </div>
            <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>

            <script type="text/javascript">
                $(window).scroll(function() {
                    var scroll = $(window).scrollTop();
                    $(".aux").css({
                        transform: 'translate(0%, -'+((scroll/10)/5)+'%) translate3d(0px, 0px, 0px)',
                    });
                    $(".aux-iphone").css({
                        transform: 'translate(0%, -'+((scroll/10)/5)+'%) translate3d(0px, 0px, 0px)',
                    });
                  });
            </script>
            <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6 col-md-offset-2 title-tech">
                        <h2>Tecnología</h2>
                        <p>Invierte en minutos y no en meses</p>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6 col-md-offset-2 content-investment-tech">
                        <div class="background-polygon polygon-triangle"></div>
                        <div class="investment-title">Date de alta ahora</div>
                        <div class="investment-text">Es gratis y sencillo.</div>
                    </div>

                    <div class="col-xs-12 col-sm-6 col-md-6 col-md-offset-1 content-investment-tech">
                        <div class="background-polygon polygon-triangle"></div>
                        <div class="investment-title ">Invierte de forma fácil y flexible</div>
                        <div class="investment-text">Lo hacemos sencillo para ti, 100% online.</div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-6 col-md-6 col-md-offset-2 content-investment-tech">
                        <div class="background-polygon polygon-triangle"></div>
                        <div class="investment-title">Gestiona desde tu área privada</div>
                        <div class="investment-text">Sigue en tiempo real la evolución de tus inversiones.</div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-6 col-md-offset-1 content-investment-tech">
                        <div class="background-polygon polygon-triangle"></div>
                        <div class="investment-title">Diversifica sin límite</div>
                        <div class="investment-text">Invierte donde quieras, como los grandes inversores.</div>
                    </div>
                </div>
                    <br>
                    <br>
                <div class="row">

                    <div class="col-md-12 text-center">
                        <a href="{{ asset('como-funciona') }}" class="btn btn-primary">¿Cómo funciona?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>