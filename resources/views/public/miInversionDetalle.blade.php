@extends('layouts.public.app')
@section('title')
Detalle Mi Inversión
@endsection
@section('css')
<style type="text/css">
	.slick-slider-area{
		margin-right: 15px;
		margin-left: 10px;
	}
</style>
@endsection
@section('content')
<div class="main-title">
    <h1>Santina Resort & Spa</h1>
</div>
<div class="slick-slider-area" >
    <div class="row slick-carousel" data-slick='{"autoplay":true,"slidesToShow": 3, "responsive":[{"breakpoint": 1024,"settings":{"slidesToShow": 2}}, {"breakpoint": 768,"settings":{"slidesToShow": 1}}]}'>
        <div class="slick-slide-item">
            <div class="property-box">
                <div class="property-thumbnail">
                    <img class="d-block w-100" src="http://placehold.it/350x233" alt="properties">
                </div>
            </div>
        </div>
        <div class="slick-slide-item">
            <div class="property-box">
                <div class="property-thumbnail">
                    <img class="d-block w-100" src="http://placehold.it/350x233" alt="properties">
                </div>
            </div>
        </div>
        <div class="slick-slide-item">
            <div class="property-box">
                <div class="property-thumbnail">
                    <img class="d-block w-100" src="http://placehold.it/350x233" alt="properties">
                </div>
            </div>
        </div>
        <div class="slick-slide-item">
            <div class="property-box">
                <div class="property-thumbnail">
                    <img class="d-block w-100" src="http://placehold.it/350x233" alt="properties">
                </div>
            </div>
        </div>
        <div class="slick-slide-item">
            <div class="property-box">
                <div class="property-thumbnail">
                    <img class="d-block w-100" src="http://placehold.it/350x233" alt="properties">
                </div>
            </div>
        </div>
        <div class="slick-slide-item">
            <div class="property-box">
                <div class="property-thumbnail">
                    <img class="d-block w-100" src="http://placehold.it/350x233" alt="properties">
                </div>
            </div>
        </div>
    </div>
    
</div>
@endsection