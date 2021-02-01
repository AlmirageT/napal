<!DOCTYPE html>
<html lang="zxx">
<head>
    <title>@yield('title')</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="{{ asset('css_public/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css_public/animate.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css_public/bootstrap-submenu.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css_public/bootstrap-select.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css_public/leaflet.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css_public/map.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts_public/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts_public/flaticon/font/flaticon.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('fonts_public/linearicons/style.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css_public/jquery.mCustomScrollbar.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css_public/dropzone.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css_public/slick.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css_public/style.css') }}">
    <link rel="stylesheet" type="text/css" id="style_sheet" href="{{ asset('css_public/skins/default.css') }}">
    <link rel="shortcut icon" href="{{ asset('img_public/logomidas-02.png') }}" type="image/x-icon" >
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800%7CPlayfair+Display:400,700%7CRoboto:100,300,400,400i,500,700">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/ie10-viewport-bug-workaround.css') }}">
    <script  src="{{ asset('js_public/ie-emulation-modes-warning.js') }}"></script>
    {!! $tipografia->linkTipografia !!}
    <style>
        *{
            font-family: '{{ $tipografia->nombreTipografia }}',cursive;
        }
    </style>
    @yield('css')
    @toastr_css
</head>
<body>
<div class="page_loader"></div>

<!-- Contact section start -->
@yield('content')

<script src="{{ asset('js_public/jquery-2.2.0.min.js') }}"></script>
<script src="{{ asset('js_public/popper.min.js') }}"></script>
<script src="{{ asset('js_public/bootstrap.min.js') }}"></script>
<script  src="{{ asset('js_public/bootstrap-submenu.js') }}"></script>
<script  src="{{ asset('js_public/rangeslider.js') }}"></script>
<script  src="{{ asset('js_public/jquery.mb.YTPlayer.js') }}"></script>
<script  src="{{ asset('js_public/wow.min.js') }}"></script>
<script  src="{{ asset('js_public/bootstrap-select.min.js') }}"></script>
<script  src="{{ asset('js_public/jquery.easing.1.3.js') }}"></script>
<script  src="{{ asset('js_public/jquery.scrollUp.js') }}"></script>
<script  src="{{ asset('js_public/jquery.mCustomScrollbar.concat.min.js') }}"></script>
<script  src="{{ asset('js_public/leaflet.js') }}"></script>
<script  src="{{ asset('js_public/leaflet-providers.js') }}"></script>
<script  src="{{ asset('js_public/leaflet.markercluster.js') }}"></script>
<script  src="{{ asset('js_public/dropzone.js') }}"></script>
<script  src="{{ asset('js_public/slick.min.js') }}"></script>
<script  src="{{ asset('js_public/jquery.filterizr.js') }}"></script>
<script  src="{{ asset('js_public/jquery.magnific-popup.min.js')}}"></script>
<script  src="{{ asset('js_public/jquery.countdown.js') }}"></script>
<script  src="{{ asset('js_public/maps.js') }}"></script>
<script  src="{{ asset('js_public/app.js') }}"></script>
<script  src="{{ asset('js_public/ie10-viewport-bug-workaround.js') }}"></script>
<script  src="{{ asset('js_public/ie10-viewport-bug-workaround.js') }}"></script>
@toastr_js
@toastr_render
@yield('scripts')

</body>
</html>