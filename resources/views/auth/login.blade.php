@extends('layouts.login.app')
@section('title')
Login
@endsection
@section('content')
<div class="contact-section overview-bgi" style="background-image: url('{{ asset('img_public/paginaesmidaspantalla-02.jpg') }}');">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Form content box start -->
                <div class="form-content-box">
                    <!-- Logo -->
                    <a href="{{ asset('/') }}">
                        <img src="{{ asset('img_public/logo midas-02.png') }}" class="cm-logo" alt="black-logo">
                    </a>
                    <!-- details -->
                    <div class="details">
                        <!-- Name -->
                        <h3>Ingresa a tu cuenta</h3>
                        <!-- Form start -->
                        <form action="{{ asset('ingreso-session') }}" method="POST">
                        	@csrf
                            <div class="form-group">
                                <input type="email" name="correo" class="input-text" placeholder="Correo">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="input-text" placeholder="Contraseña">
                            </div>
                            <div class="checkbox">
                                <div class="ez-checkbox pull-left">
                                    <label>
                                        <input type="checkbox" class="ez-hide">
                                        Recuerdame
                                    </label>
                                </div>
                                <a href="" class="link-not-important pull-right">¿Olvidaste tu contraseña?</a>
                                <div class="clearfix"></div>
                            </div>
                            <div class="form-group mb-0">
                                <button type="submit" class="btn-md button-theme btn-block">login</button>
                            </div>
                        </form>
                        <!-- Form end -->
                    </div>
                    <!-- Footer -->
                    <div class="footer">
                    <span>
                        ¿No tienes cuenta? <a href="{{ asset('registro') }}">Registrate aqui</a>
                    </span>
                    </div>
                </div>
                <!-- Form content box end -->
            </div>
        </div>
    </div>
</div>
@endsection
