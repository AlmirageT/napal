@extends('layouts.public.app')
@section('content')
<!-- Main header end -->

<!-- Banner start -->
<div class="banner" id="banner">
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
    <!-- Search Section start -->
    <div class="search-section search-area-3 d-none d-xl-block d-lg-block" id="search-area-3">
        <div class="container">
            <div class="search-section-area ssa">
                <div class="search-area-inner">
                    <div class="search-contents">
                        <form method="GET">
                            <div class="row">
                                <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                                    <div class="form-group">
                                        <select class="selectpicker search-fields" name="area">
                                            <option>Area</option>
                                            <option>3000</option>
                                            <option>2600</option>
                                            <option>2200</option>
                                            <option>1800</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                                    <div class="form-group">
                                        <select class="selectpicker search-fields" name="property-status">
                                            <option>Property Status</option>
                                            <option>For Sale</option>
                                            <option>For Rent</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                                    <div class="form-group">
                                        <select class="selectpicker search-fields" name="property-types">
                                            <option>Property Types</option>
                                            <option>Apartments</option>
                                            <option>Houses</option>
                                            <option>Commercial</option>
                                            <option>Garages</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                                    <div class="form-group">
                                        <select class="selectpicker search-fields" name="location">
                                            <option>Location</option>
                                            <option>United States</option>
                                            <option>United Kingdom</option>
                                            <option>American Samoa</option>
                                            <option>Belgium</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                                    <div class="form-group">
                                        <select class="selectpicker search-fields" name="max-area">
                                            <option>Max Area (Sq Ff)</option>
                                            <option>2400</option>
                                            <option>2800</option>
                                            <option>3200</option>
                                            <option>3600</option>
                                            <option>4000</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                                    <div class="form-group">
                                        <select class="selectpicker search-fields" name="min-area">
                                            <option>Min Area (Sq Ff)</option>
                                            <option>2400</option>
                                            <option>2800</option>
                                            <option>3200</option>
                                            <option>3600</option>
                                            <option>4000</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                                    <div class="range-slider">
                                        <div data-min="0" data-max="150000" data-unit="USD" data-min-name="min_price" data-max-name="max_price" class="range-slider-ui ui-slider" aria-disabled="false"></div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                                    <div class="form-group">
                                        <button class="search-button">Search</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Search Section end -->
</div>
<!-- banner end -->

<!-- Search Section start -->
<div class="search-section search-area-2 bg-grea d-lg-none d-xl-none">
    <div class="container">
        <div class="search-section-area">
            <div class="search-area-inner">
                <div class="search-contents">
                    <form method="GET">
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                                <div class="form-group">
                                    <select class="selectpicker search-fields" name="area">
                                        <option>Area</option>
                                        <option>3000</option>
                                        <option>2600</option>
                                        <option>2200</option>
                                        <option>1800</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                                <div class="form-group">
                                    <select class="selectpicker search-fields" name="property-status">
                                        <option>Property Status</option>
                                        <option>For Sale</option>
                                        <option>For Rent</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                                <div class="form-group">
                                    <select class="selectpicker search-fields" name="property-types">
                                        <option>Property Types</option>
                                        <option>Apartments</option>
                                        <option>Houses</option>
                                        <option>Commercial</option>
                                        <option>Garages</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                                <div class="form-group">
                                    <select class="selectpicker search-fields" name="location">
                                        <option>Location</option>
                                        <option>United States</option>
                                        <option>United Kingdom</option>
                                        <option>American Samoa</option>
                                        <option>Belgium</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                                <div class="form-group">
                                    <select class="selectpicker search-fields" name="max-area">
                                        <option>Max Area (Sq Ff)</option>
                                        <option>2400</option>
                                        <option>2800</option>
                                        <option>3200</option>
                                        <option>3600</option>
                                        <option>4000</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                                <div class="form-group">
                                    <select class="selectpicker search-fields" name="min-area">
                                        <option>Min Area (Sq Ff)</option>
                                        <option>2400</option>
                                        <option>2800</option>
                                        <option>3200</option>
                                        <option>3600</option>
                                        <option>4000</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                                <div class="range-slider">
                                    <div data-min="0" data-max="150000" data-unit="USD" data-min-name="min_price" data-max-name="max_price" class="range-slider-ui ui-slider" aria-disabled="false"></div>
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6 col-sm-6 col-6">
                                <div class="form-group">
                                    <button class="search-button">Search</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Search Section end -->

<!-- Featured Properties start -->
<div class="featured-properties content-area-9">
    <div class="container">
        <!-- Main title -->
        <div class="main-title">
            <h1>Featured Properties</h1>
            <p>Find Your Properties In Your City</p>
        </div>

        <div class="slick-slider-area">
            <div class="row slick-carousel" data-slick='{"slidesToShow": 3, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>
                <div class="slick-slide-item">
                    <div class="property-box">
                        <div class="property-thumbnail">
                            <a href="properties-details.html" class="property-img">
                                <div class="listing-badges">
                                    <span class="featured">Featured</span>
                                </div>
                                <div class="price-ratings-box">
                                    <p class="price">
                                        $178,000
                                    </p>
                                    <div class="ratings">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                </div>

                                <div id="carouselExampleIndicators1" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <li data-target="#carouselExampleIndicators1" data-slide-to="0" class="active"></li>
                                        <li data-target="#carouselExampleIndicators1" data-slide-to="1"></li>
                                        <li data-target="#carouselExampleIndicators1" data-slide-to="2"></li>
                                    </ol>
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img class="d-block w-100" src="http://placehold.it/350x233" alt="properties">
                                        </div>
                                        <div class="carousel-item">
                                            <img class="d-block w-100" src="http://placehold.it/350x233" alt="properties">
                                        </div>
                                        <div class="carousel-item">
                                            <img class="d-block w-100" src="http://placehold.it/350x233" alt="properties">
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="detail">
                            <h1 class="title">
                                <a href="properties-details.html">Modern Family Home</a>
                            </h1>
                            <div class="location">
                                <a href="properties-details.html">
                                    <i class="fa fa-map-marker"></i>123 Kathal St. Tampa City,
                                </a>
                            </div>
                            <ul class="facilities-list clearfix">
                                <li>
                                    <i class="flaticon-furniture"></i> 3 Bedrooms
                                </li>
                                <li>
                                    <i class="flaticon-holidays"></i> 2 Bathrooms
                                </li>
                                <li>
                                    <i class="flaticon-square"></i> Sq Ft:3400
                                </li>
                                <li>
                                    <i class="flaticon-vehicle"></i> 1 Garage
                                </li>
                            </ul>
                        </div>
                        <div class="footer clearfix">
                            <div class="pull-left days">
                                <p><i class="flaticon-time"></i> 5 Days ago</p>
                            </div>
                            <ul class="pull-right">
                                <li><a href="#"><i class="flaticon-favorite"></i></a></li>
                                <li><a href="#"><i class="flaticon-multimedia"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="slick-slide-item">
                    <div class="property-box">
                        <div class="property-thumbnail">
                            <a href="properties-details.html" class="property-img">
                                <div class="listing-badges">
                                    <span class="featured">Featured</span>
                                </div>
                                <div class="price-ratings-box">
                                    <p class="price">
                                        $178,000
                                    </p>
                                    <div class="ratings">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                </div>
                                <img class="d-block w-100" src="http://placehold.it/350x233" alt="properties">
                            </a>
                        </div>
                        <div class="detail">
                            <h1 class="title">
                                <a href="properties-details.html">Relaxing Apartment</a>
                            </h1>
                            <div class="location">
                                <a href="properties-details.html">
                                    <i class="fa fa-map-marker"></i>123 Kathal St. Tampa City,
                                </a>
                            </div>
                            <ul class="facilities-list clearfix">
                                <li>
                                    <i class="flaticon-furniture"></i> 3 Bedrooms
                                </li>
                                <li>
                                    <i class="flaticon-holidays"></i> 2 Bathrooms
                                </li>
                                <li>
                                    <i class="flaticon-square"></i> Sq Ft:3400
                                </li>
                                <li>
                                    <i class="flaticon-vehicle"></i> 1 Garage
                                </li>
                            </ul>
                        </div>
                        <div class="footer clearfix">
                            <div class="pull-left days">
                                <p><i class="flaticon-time"></i> 5 Days ago</p>
                            </div>
                            <ul class="pull-right">
                                <li><a href="#"><i class="flaticon-favorite"></i></a></li>
                                <li><a href="#"><i class="flaticon-multimedia"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="slick-slide-item">
                    <div class="property-box">
                        <div class="property-thumbnail">
                            <a href="properties-details.html" class="property-img">
                                <div class="listing-time opening">For Sale</div>
                                <div class="price-ratings-box">
                                    <p class="price">
                                        $178,000
                                    </p>
                                    <div class="ratings">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                </div>
                                <img class="d-block w-100" src="http://placehold.it/350x233" alt="properties">
                            </a>
                        </div>
                        <div class="detail">
                            <h1 class="title">
                                <a href="properties-details.html">Park Avenue</a>
                            </h1>
                            <div class="location">
                                <a href="properties-details.html">
                                    <i class="fa fa-map-marker"></i>123 Kathal St. Tampa City,
                                </a>
                            </div>
                            <ul class="facilities-list clearfix">
                                <li>
                                    <i class="flaticon-furniture"></i> 3 Bedrooms
                                </li>
                                <li>
                                    <i class="flaticon-holidays"></i> 2 Bathrooms
                                </li>
                                <li>
                                    <i class="flaticon-square"></i> Sq Ft:3400
                                </li>
                                <li>
                                    <i class="flaticon-vehicle"></i> 1 Garage
                                </li>
                            </ul>
                        </div>
                        <div class="footer clearfix">
                            <div class="pull-left days">
                                <p><i class="flaticon-time"></i> 5 Days ago</p>
                            </div>
                            <ul class="pull-right">
                                <li><a href="#"><i class="flaticon-favorite"></i></a></li>
                                <li><a href="#"><i class="flaticon-multimedia"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="slick-slide-item">
                    <div class="property-box">
                        <div class="property-thumbnail">
                            <a href="properties-details.html" class="property-img">
                                <div class="listing-badges">
                                    <span class="featured">Featured</span>
                                </div>
                                <div class="price-ratings-box">
                                    <p class="price">
                                        $178,000
                                    </p>
                                    <div class="ratings">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                </div>

                                <div id="carouselExampleIndicators2" class="carousel slide" data-ride="carousel">
                                    <ol class="carousel-indicators">
                                        <li data-target="#carouselExampleIndicators2" data-slide-to="0" class="active"></li>
                                        <li data-target="#carouselExampleIndicators2" data-slide-to="1"></li>
                                        <li data-target="#carouselExampleIndicators2" data-slide-to="2"></li>
                                    </ol>
                                    <div class="carousel-inner">
                                        <div class="carousel-item active">
                                            <img class="d-block w-100" src="http://placehold.it/350x233" alt="properties">
                                        </div>
                                        <div class="carousel-item">
                                            <img class="d-block w-100" src="http://placehold.it/350x233" alt="properties">
                                        </div>
                                        <div class="carousel-item">
                                            <img class="d-block w-100" src="http://placehold.it/350x233" alt="properties">
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="detail">
                            <h1 class="title">
                                <a href="properties-details.html">Modern Family Home</a>
                            </h1>
                            <div class="location">
                                <a href="properties-details.html">
                                    <i class="fa fa-map-marker"></i>123 Kathal St. Tampa City,
                                </a>
                            </div>
                            <ul class="facilities-list clearfix">
                                <li>
                                    <i class="flaticon-furniture"></i> 3 Bedrooms
                                </li>
                                <li>
                                    <i class="flaticon-holidays"></i> 2 Bathrooms
                                </li>
                                <li>
                                    <i class="flaticon-square"></i> Sq Ft:3400
                                </li>
                                <li>
                                    <i class="flaticon-vehicle"></i> 1 Garage
                                </li>
                            </ul>
                        </div>
                        <div class="footer clearfix">
                            <div class="pull-left days">
                                <p><i class="flaticon-time"></i> 5 Days ago</p>
                            </div>
                            <ul class="pull-right">
                                <li><a href="#"><i class="flaticon-favorite"></i></a></li>
                                <li><a href="#"><i class="flaticon-multimedia"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="slick-slide-item">
                    <div class="property-box">
                        <div class="property-thumbnail">
                            <a href="properties-details.html" class="property-img">
                                <div class="listing-badges">
                                    <span class="featured">Featured</span>
                                </div>
                                <div class="price-ratings-box">
                                    <p class="price">
                                        $178,000
                                    </p>
                                    <div class="ratings">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                </div>
                                <img class="d-block w-100" src="http://placehold.it/350x233" alt="properties">
                            </a>
                        </div>
                        <div class="detail">
                            <h1 class="title">
                                <a href="properties-details.html">Relaxing Apartment</a>
                            </h1>
                            <div class="location">
                                <a href="properties-details.html">
                                    <i class="fa fa-map-marker"></i>123 Kathal St. Tampa City,
                                </a>
                            </div>
                            <ul class="facilities-list clearfix">
                                <li>
                                    <i class="flaticon-furniture"></i> 3 Bedrooms
                                </li>
                                <li>
                                    <i class="flaticon-holidays"></i> 2 Bathrooms
                                </li>
                                <li>
                                    <i class="flaticon-square"></i> Sq Ft:3400
                                </li>
                                <li>
                                    <i class="flaticon-vehicle"></i> 1 Garage
                                </li>
                            </ul>
                        </div>
                        <div class="footer clearfix">
                            <div class="pull-left days">
                                <p><i class="flaticon-time"></i> 5 Days ago</p>
                            </div>
                            <ul class="pull-right">
                                <li><a href="#"><i class="flaticon-favorite"></i></a></li>
                                <li><a href="#"><i class="flaticon-multimedia"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="slick-slide-item">
                    <div class="property-box">
                        <div class="property-thumbnail">
                            <a href="properties-details.html" class="property-img">
                                <div class="listing-time opening">For Sale</div>
                                <div class="price-ratings-box">
                                    <p class="price">
                                        $178,000
                                    </p>
                                    <div class="ratings">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star-o"></i>
                                    </div>
                                </div>
                                <img class="d-block w-100" src="http://placehold.it/350x233" alt="properties">
                            </a>
                        </div>
                        <div class="detail">
                            <h1 class="title">
                                <a href="properties-details.html">Park Avenue</a>
                            </h1>
                            <div class="location">
                                <a href="properties-details.html">
                                    <i class="fa fa-map-marker"></i>123 Kathal St. Tampa City,
                                </a>
                            </div>
                            <ul class="facilities-list clearfix">
                                <li>
                                    <i class="flaticon-furniture"></i> 3 Bedrooms
                                </li>
                                <li>
                                    <i class="flaticon-holidays"></i> 2 Bathrooms
                                </li>
                                <li>
                                    <i class="flaticon-square"></i> Sq Ft:3400
                                </li>
                                <li>
                                    <i class="flaticon-vehicle"></i> 1 Garage
                                </li>
                            </ul>
                        </div>
                        <div class="footer clearfix">
                            <div class="pull-left days">
                                <p><i class="flaticon-time"></i> 5 Days ago</p>
                            </div>
                            <ul class="pull-right">
                                <li><a href="#"><i class="flaticon-favorite"></i></a></li>
                                <li><a href="#"><i class="flaticon-multimedia"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
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
