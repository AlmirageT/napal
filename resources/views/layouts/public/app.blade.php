<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="{{ asset('css_public/bootstrap.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css_public/animate.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css_public/bootstrap-submenu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css_public/bootstrap-select.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css_public/leaflet.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css_public/map.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts_public/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts_public/flaticon/font/flaticon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts_public/linearicons/style.css') }}">
    <link rel="stylesheet" type="text/css"  href="{{ asset('css_public/jquery.mCustomScrollbar.css') }}">
    <link rel="stylesheet" type="text/css"  href="{{ asset('css_public/dropzone.css') }}">
    <link rel="stylesheet" type="text/css"  href="{{ asset('css_public/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css_public/style.css') }}">
    <link rel="stylesheet" type="text/css" id="style_sheet" href="{{ asset('css_public/skins/default.css') }}">
    <link rel="shortcut icon" href="{{ asset('img_public/favicon.ico') }}" type="image/x-icon" >
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800%7CPlayfair+Display:400,700%7CRoboto:100,300,400,400i,500,700">
    <link rel="stylesheet" type="text/css" href="{{ asset('css_public/ie10-viewport-bug-workaround.css') }}">
    <script  src="{{ asset('js_public/ie-emulation-modes-warning.js') }}"></script>
    <script src="https://kit.fontawesome.com/9987974c2b.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css_public/btn.css') }}">
    <link rel="stylesheet" href="{{ asset('css_public/btn-tablets.css') }}">
    <link rel="stylesheet" href="{{ asset('css_public/btn-mobile.css') }}">
    <style type="text/css">
        .loader-page {
            position: fixed;
            z-index: 25000;
            background: rgb(255, 255, 255);
            left: 0px;
            top: 0px;
            height: 100%;
            width: 100%;
            display: flex;
            align-items: center;
            justify-content: center;
            transition:all .3s ease;
          }
          .loader-page::before {
            content: "";
            position: absolute;
            border: 2px solid rgb(50, 150, 176);
            width: 60px;
            height: 60px;
            border-radius: 50%;
            box-sizing: border-box;
            border-left: 2px solid rgba(50, 150, 176,0);
            border-top: 2px solid rgba(50, 150, 176,0);
            animation: rotarload 1s linear infinite;
            transform: rotate(0deg);
          }
          @keyframes rotarload {
              0%   {transform: rotate(0deg)}
              100% {transform: rotate(360deg)}
          }
          .loader-page::after {
            content: "";
            position: absolute;
            border: 2px solid rgba(50, 150, 176,.5);
            width: 60px;
            height: 60px;
            border-radius: 50%;
            box-sizing: border-box;
            border-left: 2px solid rgba(50, 150, 176, 0);
            border-top: 2px solid rgba(50, 150, 176, 0);
            animation: rotarload 1s ease-out infinite;
            transform: rotate(0deg);
          }
    </style>
    @yield('css')
    @toastr_css
</head>
<body >
    <div class="loader-page"></div>
    <!-- BOTÓN RRSS -->
    <div class="contenedor">
        <input type="checkbox" id="btn-share">
        <div class="rrss">
           <a href="#"><i class="fab fa-facebook-f"></i></a>
           <a href="#"><i class="fab fa-youtube"></i></a>
           <a href="#"><i class="fab fa-instagram"></i></a>
           <a href="#"><i class="fab fa-linkedin-in"></i></a>
        </div>
        <div class="btn-share">
           <label for="btn-share">   <i class="fas fa-share-alt icon-share"></i></label>
        </div>
    </div>
    
    
     <!-- BOTÓN CONTACTO -->
    <div class="contenedor-contacto">
        <div class="btn-contact">
           <label for="btn-contact"><i class="far fa-comment-dots icon-contact"></i></label>
        </div>
        <input type="checkbox" id="btn-contact">
        <div class="contact">
           <a target="_blank" href="#"><i class="fas fa-video"></i></a>
           <a target="_blank" href="#"><i class="far fa-calendar-alt"></i></a>
           <a target="_blank" href="#"><i class="fab fa-whatsapp"></i></a>
           <a target="_blank" href="#"><i class="far fa-comment-alt"></i></a>
        </div>
    </div>
    
    @include('layouts.public.header')
    @yield('content')
    @include('layouts.public.footer')
    <div id="full-page-search">
        <button type="button" class="close">×</button>
        <form action="">
            <input type="search" value="" placeholder="type keyword(s) here" />
            <button type="submit" class="btn btn-sm button-theme">Search</button>
        </form>
    </div>
    <script src="{{ asset('js_public/jquery-2.2.0.min.js')}}"></script>
    <script src="{{ asset('js_public/popper.min.js')}}"></script>
    <script src="{{ asset('js_public/bootstrap.min.js')}}"></script>
    <script  src="{{ asset('js_public/bootstrap-submenu.js')}}"></script>
    <script  src="{{ asset('js_public/rangeslider.js')}}"></script>
    <script  src="{{ asset('js_public/jquery.mb.YTPlayer.js')}}"></script>
    <script  src="{{ asset('js_public/wow.min.js')}}"></script>
    <script  src="{{ asset('js_public/bootstrap-select.min.js')}}"></script>
    <script  src="{{ asset('js_public/jquery.easing.1.3.js')}}"></script>
    <script  src="{{ asset('js_public/jquery.scrollUp.js')}}"></script>
    <script  src="{{ asset('js_public/jquery.mCustomScrollbar.concat.min.js')}}"></script>
    <script  src="{{ asset('js_public/leaflet.js')}}"></script>
    <script  src="{{ asset('js_public/leaflet-providers.js')}}"></script>
    <script  src="{{ asset('js_public/leaflet.markercluster.js')}}"></script>
    <script  src="{{ asset('js_public/dropzone.js')}}"></script>
    <script  src="{{ asset('js_public/slick.min.js')}}"></script>
    <script  src="{{ asset('js_public/jquery.filterizr.js')}}"></script>
    <script  src="{{ asset('js_public/jquery.magnific-popup.min.js')}}"></script>
    <script  src="{{ asset('js_public/jquery.countdown.js')}}"></script>
    <script  src="{{ asset('js_public/maps.js')}}"></script>
    <script  src="{{ asset('js_public/app.js')}}"></script>
    <script  src="{{ asset('js_public/ie10-viewport-bug-workaround.js') }}"></script>
    <script  src="{{ asset('js_public/ie10-viewport-bug-workaround.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jscroll/2.4.1/jquery.jscroll.min.js"></script>
    <script type="text/javascript">
        $(window).on('load', function () {
              setTimeout(function () {
            $(".loader-page").css({visibility:"hidden",opacity:"0"})
          }, 2000);
        });
    </script>
    @toastr_js
    @toastr_render
    @yield('scripts')
</body>
</html>