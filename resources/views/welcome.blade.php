@extends('layouts.public.app')
@section('content')
<!-- Main header end -->

<!-- Banner start -->
<div class="banner" id="banner">
    @if(count($imagenesWeb) > 0)
        <div id="bannerCarousole" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item banner-max-height active">
                    <img class="d-block w-100" src="{{ asset($imagenesWeb->shift()->rutaImagenCarrusel) }}" alt="banner-1">
                    <div class="carousel-caption banner-slider-inner d-flex h-100 text-center">
                        <div class="carousel-content container">
                            <div class="text-center">
                                <h3 class="text-uppercase" data-animation="animated fadeInDown delay-05s">Find Your Dream House</h3>
                                <p data-animation="animated fadeInUp delay-10s">
                                    This is real estate website template based on Bootstrap 4 framework.
                                </p>
                                <a href="index.html" class="btn btn-white">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                @foreach($imagenesWeb as $imagenWeb)
                    <div class="carousel-item banner-max-height">
                        <img class="d-block w-100" src="{{ asset($imagenWeb->rutaImagenCarrusel) }}" alt="banner-1">
                        <div class="carousel-caption banner-slider-inner d-flex h-100 text-center">
                            <div class="carousel-content container">
                                <div class="text-right">
                                    <h3 class="text-uppercase" data-animation="animated fadeInDown delay-05s">Find Your Dream House</h3>
                                    <p data-animation="animated fadeInUp delay-10s">
                                        This is real estate website template based on Bootstrap 4 framework.
                                    </p>
                                    <a href="index.html" class="btn btn-white">Read More</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#bannerCarousole" role="button" data-slide="prev">
                <span class="slider-mover-left" aria-hidden="true">
                    <i class="fa fa-angle-left"></i>
                </span>
            </a>
            <a class="carousel-control-next" href="#bannerCarousole" role="button" data-slide="next">
                <span class="slider-mover-right" aria-hidden="true">
                    <i class="fa fa-angle-right"></i>
                </span>
            </a>
        </div>
    @else
        <div id="bannerCarousole" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item banner-max-height active">
                    <img class="d-block w-100" src="http://placehold.it/1992x1040" alt="banner-1">
                    <div class="carousel-caption banner-slider-inner d-flex h-100 text-center">
                        <div class="carousel-content container">
                            <div class="text-center">
                                <h3 class="text-uppercase" data-animation="animated fadeInDown delay-05s">Find Your Dream House</h3>
                                <p data-animation="animated fadeInUp delay-10s">
                                    This is real estate website template based on Bootstrap 4 framework.
                                </p>
                                <a href="index.html" class="btn btn-white">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item banner-max-height">
                    <img class="d-block w-100" src="http://placehold.it/1992x1040" alt="banner-1">
                    <div class="carousel-caption banner-slider-inner d-flex h-100 text-center">
                        <div class="carousel-content container">
                            <div class="text-right">
                                <h3 class="text-uppercase" data-animation="animated fadeInDown delay-05s">Find Your Dream House</h3>
                                <p data-animation="animated fadeInUp delay-10s">
                                    This is real estate website template based on Bootstrap 4 framework.
                                </p>
                                <a href="index.html" class="btn btn-white">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-item banner-max-height">
                    <img class="d-block w-100" src="http://placehold.it/1992x1040" alt="banner-1">
                    <div class="carousel-caption banner-slider-inner d-flex h-100 text-center">
                        <div class="carousel-content container">
                            <div class="text-left">
                                <h3 class="text-uppercase" data-animation="animated fadeInDown delay-05s">Find Your Dream House</h3>
                                <p data-animation="animated fadeInUp delay-10s">
                                    This is real estate website template based on Bootstrap 4 framework.
                                </p>
                                <a href="index.html" class="btn btn-white">Read More</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <a class="carousel-control-prev" href="#bannerCarousole" role="button" data-slide="prev">
                <span class="slider-mover-left" aria-hidden="true">
                    <i class="fa fa-angle-left"></i>
                </span>
            </a>
            <a class="carousel-control-next" href="#bannerCarousole" role="button" data-slide="next">
                <span class="slider-mover-right" aria-hidden="true">
                    <i class="fa fa-angle-right"></i>
                </span>
            </a>
        </div>
    @endif
    <!-- Search Section start -->

    <!-- Search Section end -->
</div>
<!-- banner end -->

<!-- Search Section start -->

<!-- Search Section end -->

<!-- Featured Properties start -->
<div class="featured-properties content-area-9">
    <div class="container">
        <!-- Main title -->
        <div class="main-title">
            <h1>Diversifica todo lo que quieras desde solo $10.000</h1>
            <p>Construye tu cartera de inversión basada en activos inmobiliarios</p>
        </div>

        <div class="slick-slider-area">
            <div class="row slick-carousel" data-slick='{"slidesToShow": 3, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>
                @foreach($propiedades as $propiedad)
                    @php
                        $date1 = new DateTime($propiedad->fechaInicio);
                        $date2 = new DateTime($propiedad->fechaFinalizacion);
                        $diff = $date1->diff($date2);
                    @endphp
                    <div class="slick-slide-item">
                        <div class="property-box">
                            <div class="property-thumbnail">
                                <div class="listing-badges">
                                    @if($propiedad->idTipoFlexibilidad == 1)
                                        <span class="featured">
                                            Flexible
                                        </span>
                                    @endif
                                </div>
                                <div class="price-ratings-box">
                                    <p class="price">
                                        ${{ number_format($propiedad->precio,0,',','.') }}
                                    </p>
                                </div>

                                <div id="carouselExampleIndicators1" class="carousel slide" data-ride="carousel">
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img class="d-block w-100" src="{{ asset($propiedad->fotoPrincipal) }}" alt="properties">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="detail">
                                <h1 class="title">
                                    <a>{{ $propiedad->nombrePropiedad }}</a>
                                </h1>
                                <div class="location">
                                    <a href="properties-details.html">
                                        <i class="fa fa-map-marker"></i>{{ $propiedad->direccion1 }}, {{ $propiedad->nombreRegion }}
                                    </a>
                                </div>
                                <ul class="facilities-list clearfix">
                                    <li>
                                        <i class="flaticon-furniture"></i> 
                                        @if($propiedad->habitaciones > 1)
                                            {{ $propiedad->habitaciones }} Habitaciones
                                        @else
                                            {{ $propiedad->habitaciones }} Habitación
                                        @endif

                                    </li>
                                    <li>
                                        <i class="flaticon-holidays"></i>
                                        @if($propiedad->baños > 1)
                                            {{ $propiedad->baños }} Baños
                                        @else
                                            {{ $propiedad->baños }} Baño
                                        @endif
                                    </li>
                                </ul>
                                <hr>
                                    <div class="row">
                                        <div class="col-lg-6" align="center">
                                            <h4>%{{ $propiedad->rentabilidadAnual }}</h4>
                                            <p>Rentabilidad Anual</p>
                                        </div>
                                        <div class="col-lg-6" align="center">
                                            <h4>%{{ $propiedad->rentabilidadTotal }}</h4>
                                            <p>Rentabilidad Total</p>
                                        </div>
                                    </div> 
                                <hr>  
                            </div>
                            <div class="footer clearfix">
                                <div class="pull-left days" align="center">
                                    <p><i class="flaticon-time"></i>Plazo: {!! $diff->days !!} dias </p>
                                </div>
                                <ul class="pull-right">
                                    <li><a href="#"><i class="flaticon-favorite"></i></a></li>
                                    <li><a href="#"><i class="flaticon-multimedia"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="slick-prev slick-arrow-buton">
                <i class="fa fa-angle-left"></i>
            </div>
            <div class="slick-next slick-arrow-buton">
                <i class="fa fa-angle-right"></i>
            </div>
        </div>
    </div>
</div>
<!-- Featured Properties end -->

<!-- Services 2 start -->
<div class="services-2 content-area-5 bg-grea-3">
    <div class="container">
        <!-- Main title -->
        <div class="main-title">
            <h1>What are you looking for?</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aenean ac tortor.</p>
        </div>
        <div class="row wow">
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 wow fadeInLeft delay-04s">
                <div class="service-info-5">
                    <i class="flaticon-apartment"></i>
                    <h4>Apartments</h4>
                    <p>Lorem ipsum dolor sit amet, consectur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 wow fadeInLeft delay-04s">
                <div class="service-info-5">
                    <i class="flaticon-internet"></i>
                    <h4>Houses</h4>
                    <p>Lorem ipsum dolor sit amet, consectur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 wow fadeInRight delay-04s">
                <div class="service-info-5">
                    <i class="flaticon-vehicle"></i>
                    <h4>Garages</h4>
                    <p>Lorem ipsum dolor sit amet, consectur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12 wow fadeInRight delay-04s">
                <div class="service-info-5">
                    <i class="flaticon-coins"></i>
                    <h4>Commercial</h4>
                    <p>Lorem ipsum dolor sit amet, consectur adipisicing elit, sed do eiusmod tempor incididunt ut labore</p>
                </div>
            </div>
        </div>
        <div class="text-center read-more-2">
            <a href="services-1.html" class="btn-white">Read More</a>
        </div>
    </div>
</div>
<!-- Services 2 end -->

<!-- Categories strat -->
<div class="categories content-area-8">
    <div class="container">
        <!-- Main title -->
        <div class="main-title">
            <h1>Most Popular Places</h1>
            <p>Find Property In Your City</p>
        </div>

        <div class="row wow">
            <div class="col-lg-7 col-md-12 col-sm-12">
                <div class="row">
                    <div class="col-sm-6 wow fadeInLeft delay-04s col-pad">
                        <div class="category">
                            <div class="category_bg_box cat-1-bg">
                                <div class="category-overlay">
                                    <div class="category-content">
                                        <h3 class="category-title">
                                            <a href="#">Apartment</a>
                                        </h3>
                                        <a href="properties-list-rightside.html" class="category-subtitle">14 Properties</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-6 wow fadeInLeft delay-04s col-pad">
                        <div class="category">
                            <div class="category_bg_box cat-2-bg">
                                <div class="category-overlay">
                                    <div class="category-content">
                                        <h3 class="category-title">
                                            <a href="#">House</a>
                                        </h3>
                                        <a href="properties-list-rightside.html" class="category-subtitle">98 Properties</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-12 wow fadeInUp delay-04s col-pad">
                        <div class="category">
                            <div class="category_bg_box cat-3-bg">
                                <div class="category-overlay">
                                    <div class="category-content">
                                        <h3 class="category-title">
                                            <a href="#">Villa</a>
                                        </h3>
                                        <a href="properties-list-rightside.html" class="category-subtitle">98 Properties</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-5 col-md-12 col-sm-12 wow fadeInRight delay-04s col-pad d-none d-xl-block d-lg-block">
                <div class="category">
                    <div class="category_bg_box category_long_bg cat-4-bg">
                        <div class="category-overlay">
                            <div class="category-content">
                                <h3 class="category-title">
                                    <a href="#">Farm</a>
                                </h3>
                                <a href="properties-list-rightside.html" class="category-subtitle">12 Properties</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Categories end-->

<!-- Counters strat -->
<div class="counters overview-bgi">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-3 col-sm-6 wow fadeInLeft delay-04s">
                <div class="media counter-box">
                    <div class="media-left">
                        <i class="flaticon-tag"></i>
                    </div>
                    <div class="media-body">
                        <h1 class="counter">967</h1>
                        <p>Listings For Sale</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 wow fadeInLeft delay-04s">
                <div class="media counter-box">
                    <div class="media-left">
                        <i class="flaticon-business"></i>
                    </div>
                    <div class="media-body">
                        <h1 class="counter">1276</h1>
                        <p>Listings For Rent</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 wow fadeInRight delay-04s">
                <div class="media counter-box">
                    <div class="media-left">
                        <i class="flaticon-people"></i>
                    </div>
                    <div class="media-body">
                        <h1 class="counter">396</h1>
                        <p>Agents</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-3 col-sm-6 wow fadeInRight delay-04s">
                <div class="media counter-box">
                    <div class="media-left">
                        <i class="flaticon-people-1"></i>
                    </div>
                    <div class="media-body">
                        <h1 class="counter">177</h1>
                        <p>Brokers</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Counters end -->

<!-- Our team 2 start -->
<div class="our-team-2 content-area">
    <div class="container">
        <!-- Main title -->
        <div class="main-title">
            <h1>Our Agent</h1>
            <p>Meet out small team that make those great products.</p>
        </div>
        <div class="row">
            <div class="col-lg-3 col-md-6 col-sm-6 wow fadeInLeft delay-04s">
                <div class="team-1">
                    <div class="team-photo">
                        <a href="#">
                            <img src="http://placehold.it/255x212" alt="agent-2" class="img-fluid">
                        </a>
                    </div>
                    <div class="team-details">
                        <h5><a href="#">Martin Smith</a></h5>
                        <h6>Web Developer</h6>
                        <ul class="social-list clearfix">
                            <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" class="instagram"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 wow fadeInLeft delay-04s">
                <div class="team-1">
                    <div class="team-photo">
                        <a href="#">
                            <img src="http://placehold.it/255x212" alt="agent-2" class="img-fluid">
                        </a>
                    </div>
                    <div class="team-details">
                        <h5><a href="#">John Pitarshon</a></h5>
                        <h6>Creative Director</h6>
                        <ul class="social-list clearfix">
                            <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" class="instagram"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 d-none d-xl-block d-lg-block wow fadeInRight delay-04s">
                <div class="team-1">
                    <div class="team-photo">
                        <a href="#">
                            <img src="http://placehold.it/255x212" alt="agent-2" class="img-fluid">
                        </a>
                    </div>
                    <div class="team-details">
                        <h5><a href="#">Maria Blank</a></h5>
                        <h6>Office Manager</h6>
                        <ul class="social-list clearfix">
                            <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" class="instagram"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 col-sm-6 d-none d-xl-block d-lg-block wow fadeInRight delay-04s">
                <div class="team-1">
                    <div class="team-photo">
                        <a href="#">
                            <img src="http://placehold.it/255x212" alt="agent-2" class="img-fluid">
                        </a>
                    </div>
                    <div class="team-details">
                        <h5><a href="#">Karen Paran</a></h5>
                        <h6>Support Manager</h6>
                        <ul class="social-list clearfix">
                            <li><a href="#" class="facebook"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#" class="twitter"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#" class="instagram"><i class="fa fa-instagram"></i></a></li>
                            <li><a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Our team 2 end -->

<!-- Testimonial 3 start -->
<div class="testimonial-3">
    <div class="container">
        <div class="main-title">
            <h1>Our Testimonial</h1>
        </div>
        <div class="slick-slider-area">
            <div class="row slick-carousel" data-slick='{"slidesToShow": 2, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>
                <div class="slick-slide-item">
                    <div class="testimonial-inner">
                        <div class="content-box">
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-half-full"></i>
                            </div>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever</p>
                        </div>
                        <div class="media">
                            <a href="#">
                                <img src="http://placehold.it/50x50" alt="testimonial-avatar" class="img-fluid">
                            </a>
                            <div class="media-body align-self-center">
                                <h5>
                                    Eliane Perei
                                </h5>
                                <h6>Web Developer</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slick-slide-item">
                    <div class="testimonial-inner">
                        <div class="content-box">
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-half-full"></i>
                            </div>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever</p>
                        </div>
                        <div class="media">
                            <a href="#">
                                <img src="http://placehold.it/50x50" alt="testimonial-avatar" class="img-fluid">
                            </a>
                            <div class="media-body align-self-center">
                                <h5>
                                    Maria Blank
                                </h5>
                                <h6>Office Manager</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slick-slide-item">
                    <div class="testimonial-inner">
                        <div class="content-box">
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-half-full"></i>
                            </div>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever</p>
                        </div>
                        <div class="media">
                            <a href="#">
                                <img src="http://placehold.it/50x50" alt="testimonial-avatar" class="img-fluid">
                            </a>
                            <div class="media-body align-self-center">
                                <h5>
                                    Karen Paran
                                </h5>
                                <h6>Support Manager</h6>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="slick-slide-item">
                    <div class="testimonial-inner">
                        <div class="content-box">
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star-half-full"></i>
                            </div>
                            <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever</p>
                        </div>
                        <div class="media">
                            <a href="#">
                                <img src="http://placehold.it/50x50" alt="testimonial-avatar" class="img-fluid">
                            </a>
                            <div class="media-body align-self-center">
                                <h5>
                                    John Pitarshon
                                </h5>
                                <h6>Creative Director</h6>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Testimonial 3 end -->

<!-- Blog start -->
<div class="blog content-area">
    <div class="container">
        <!-- Main title -->
        <div class="main-title">
            <h1>Latest news</h1>
            <p>Check out some recent news posts.</p>
        </div>
        <div class="row wow fadeInUp delay-04s">
            <div class="col-lg-4 col-md-6">
                <div class="blog-1">
                    <div class="blog-photo">
                        <img src="http://placehold.it/350x194" alt="blog" class="img-fluid">
                        <div class="profile-user">
                            <img src="http://placehold.it/45x45" alt="user">
                        </div>
                    </div>
                    <div class="detail">
                        <div class="post-meta clearfix">
                            <ul>
                                <li>
                                    <strong><a href="#">Antony</a></strong>
                                </li>
                                <li class="mr-0"><span>Feb 31, 2018</span></li>
                                <li class="float-right mr-0"><a href="#"><i class="flaticon-interface"></i></a>15</li>
                                <li class="float-right"><a href="#"><i class="flaticon-time"></i></a>5k</li>
                            </ul>
                        </div>
                        <h3>
                            <a href="blog-single-sidebar-right.html">Buying a Best House</a>
                        </h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="blog-1">
                    <div class="blog-photo">
                        <img src="http://placehold.it/350x194" alt="blog" class="img-fluid">
                        <div class="profile-user">
                            <img src="http://placehold.it/45x45" alt="user">
                        </div>
                    </div>
                    <div class="detail">
                        <div class="post-meta clearfix">
                            <ul>
                                <li>
                                    <strong><a href="#">Teseira</a></strong>
                                </li>
                                <li class="mr-0"><span>May 31, 2017</span></li>
                                <li class="float-right mr-0"><a href="#"><i class="flaticon-interface"></i></a>15</li>
                                <li class="float-right"><a href="#"><i class="flaticon-time"></i></a>5k</li>
                            </ul>
                        </div>
                        <h3>
                            <a href="blog-single-sidebar-right.html">Selling Your Real House</a>
                        </h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 d-none d-xl-block d-lg-block">
                <div class="blog-1">
                    <div class="blog-photo">
                        <img src="http://placehold.it/350x194" alt="blog" class="img-fluid">
                        <div class="profile-user">
                            <img src="http://placehold.it/45x45" alt="user">
                        </div>
                    </div>
                    <div class="detail">
                        <div class="post-meta clearfix">
                            <ul>
                                <li>
                                    <strong><a href="#">John Doe</a></strong>
                                </li>
                                <li class="mr-0"><span>May 31, 2017</span></li>
                                <li class="float-right mr-0"><a href="#"><i class="flaticon-interface"></i></a>15</li>
                                <li class="float-right"><a href="#"><i class="flaticon-time"></i></a>5k</li>
                            </ul>
                        </div>
                        <h3>
                            <a href="blog-single-sidebar-right.html">Find Your Dream Real Estate</a>
                        </h3>
                        <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Blog end -->

<!-- Partners strat -->
<div class="partners">
    <div class="container">
        <h4>Brands $ Partners</h4>
        <div class="slick-slider-area">
            <div class="row slick-carousel" data-slick='{"slidesToShow": 5, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 3}}, {"breakpoint": 768,"settings":{"slidesToShow": 2}}]}'>
                <div class="slick-slide-item"><img src="http://placehold.it/180x80" alt="brand" class="img-fluid"></div>
                <div class="slick-slide-item"><img src="http://placehold.it/180x80" alt="brand" class="img-fluid"></div>
                <div class="slick-slide-item"><img src="http://placehold.it/180x80" alt="brand" class="img-fluid"></div>
                <div class="slick-slide-item"><img src="http://placehold.it/180x80" alt="brand" class="img-fluid"></div>
                <div class="slick-slide-item"><img src="http://placehold.it/180x80" alt="brand" class="img-fluid"></div>
                <div class="slick-slide-item"><img src="http://placehold.it/180x80" alt="brand" class="img-fluid"></div>
                <div class="slick-slide-item"><img src="http://placehold.it/180x80" alt="brand" class="img-fluid"></div>
                <div class="slick-slide-item"><img src="http://placehold.it/180x80" alt="brand" class="img-fluid"></div>
            </div>
            <div class="slick-prev slick-arrow-buton">
                <i class="fa fa-angle-left"></i>
            </div>
            <div class="slick-next slick-arrow-buton">
                <i class="fa fa-angle-right"></i>
            </div>
        </div>
    </div>
</div>
<!-- Partners end -->

<!-- Footer start -->
@endsection
