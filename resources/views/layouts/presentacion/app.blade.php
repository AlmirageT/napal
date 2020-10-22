<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
    new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
    j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
    'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
    })(window,document,'script','dataLayer','GTM-MMWF2W5');</script>
    <!-- End Google Tag Manager -->

    <!-- Smartsupp Live Chat script -->
    <script type="text/javascript">
    var _smartsupp = _smartsupp || {};
    _smartsupp.key = '19a9f23b9a112c455cdffa66f4fba19a387bc2aa';
    window.smartsupp||(function(d) {
      var s,c,o=smartsupp=function(){ o._.push(arguments)};o._=[];
      s=d.getElementsByTagName('script')[0];c=d.createElement('script');
      c.type='text/javascript';c.charset='utf-8';c.async=true;
      c.src='https://www.smartsuppchat.com/loader.js?';s.parentNode.insertBefore(c,s);
    })(document);
    </script>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}"> 
    <meta name="author" content="Paulo Berrios">

    <title>@yield('title')</title>

    <link rel="stylesheet" href="{{ asset('css/app.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/jpreloader.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/animate.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/plugin.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/owl.carousel.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/owl.theme.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/owl.transitions.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/magnific-popup.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/bg.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/color.css') }}" type="text/css" id="colors">
    <link rel="stylesheet" href="{{ asset('fonts/font-awesome/css/font-awesome.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('fonts/elegant_font/HTML_CSS/style.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('fonts/et-line-font/style.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('rs-plugin/css/settings.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/rev-settings.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset ('css/whatsapp.css') }}" type="text/css">
    <link rel="stylesheet" href="{{ asset('css/toast/toastr.css') }}" type="text/css">
    @yield('css')
    <!--@toastr_css-->
</head>

<body id="@yield('bodyClass')">
  
    <!-- Google Tag Manager (noscript) -->
    <noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-MMWF2W5"
    height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
    <!-- End Google Tag Manager (noscript) -->

    <div id="wrapper">

        <a href="https://wa.me/{{ $telefonoWhatsapp->valorParametro }}"><div class="plus-button"></div></a>
        
        <header class="@yield('headerClass')">
          <div class="info">
              <div class="container">
                  <div class="row">
                      <div class="col-md-12">
                          <div class="col">Working Hours Monday - Friday <span class="id-color"><strong>08:00-16:00</strong></span></div>
                          <div class="col">Toll Free <span class="id-color"><strong>1800.899.900</strong></span></div>
                          <!-- social icons -->
                          <div class="col social">
                              <a href="#"><i class="fa fa-facebook"></i></a>
                              <a href="#"><i class="fa fa-twitter"></i></a>
                              <a href="#"><i class="fa fa-rss"></i></a>
                              <a href="#"><i class="fa fa-google-plus"></i></a>
                              <a href="#"><i class="fa fa-envelope-o"></i></a>
                          </div>
                          <!-- social icons close -->
                      </div>
                  </div>
              </div>
          </div>

          <div class="container">
              <div class="row">
                  <div class="col-md-12">
                      <!-- logo begin -->
                      <div id="logo">
                          <a href="/">
                              <img class="logo" src="images/logo.png" alt="" style="width: 120px">
                          </a>
                      </div>
                      <!-- logo close -->

                      <!-- small button begin -->
                      <span id="menu-btn"></span>
                      <!-- small button close -->

                      <!-- mainmenu begin -->
                      <nav>
                          <ul id="mainmenu">
                            <li><a href="/">Home<span></span></a></li>
                            <li><a href="/#section-services">Proposito</a></li>
                            <li><a href="/#section-why-choose-us-3">Departamentos</a></li>
                            <li><a href="/parsimonia" target="_blank2">Sitios</a></li>
                            <li><a href="/#section-testimonial-2">Testimonios</a></li>
                            <li><a href="/verNoticias">Prensa</a></li>
                            <li><a href="/#section-blog">Contacto</a></li>
                          </ul>
                      </nav>

                  </div>
                  <!-- mainmenu close -->

              </div>
          </div>
        </header>

        @yield('subheader')

        <div id="content" class="@yield('contentClass')">
          @yield('content')
        </div>

        @include('layouts.presentacion.footer')
    </div>
    @yield('modals')

    <script src="{{ asset('js/jquery.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/jpreLoader.js') }}"></script>
    <script src="{{ asset('js/jquery.isotope.min.js') }}"></script>
    <script src="{{ asset('js/easing.js') }}"></script>
    <script src="{{ asset('js/jquery.flexslider-min.js') }}"></script>
    <script src="{{ asset('js/jquery.scrollto.js') }}"></script>
    <script src="{{ asset('js/owl.carousel.js') }}"></script>
    <script src="{{ asset('js/jquery.countTo.js') }}"></script>
    <script src="{{ asset('js/classie.js') }}"></script>
    <script src="{{ asset('js/video.resize.js') }}"></script>
    <script src="{{ asset('js/validation.js') }}"></script>
    <script src="{{ asset('js/wow.min.js') }}"></script>
    <script src="{{ asset('js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('js/jquery.stellar.min.js') }}"></script>
    <script src="{{ asset('js/enquire.min.js') }}"></script>
    <script src="{{ asset('js/designesia.js') }}"></script>

    <script type="text/javascript" src="{{ asset('rs-plugin/js/jquery.themepunch.plugins.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('rs-plugin/js/jquery.themepunch.revolution.min.js') }}"></script>
    @toastr_js
    @toastr_render
    
    @yield('scripts')
</body>

</html>