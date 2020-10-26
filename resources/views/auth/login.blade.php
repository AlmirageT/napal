@extends('layouts.login.app')
@section('title')
Login
@endsection
@section('content')
<div class="account-pages my-5 pt-sm-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card overflow-hidden">
                    <div class="bg-soft-primary">
                        <div class="row">
                            <div class="col-7">
                                <div class="text-primary p-4">
                                    <h5 class="text-primary">Accede a tu área privada</h5>
                                    
                                </div>
                            </div>
                            <div class="col-5 align-self-end">
                                <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0"> 
                        <div>
                            <a>
                                <div class="avatar-md profile-user-wid mb-4">
                                    <span class="avatar-title rounded-circle bg-light">
                                        <img src="assets/images/logo.svg" alt="" class="rounded-circle" height="34">
                                    </span>
                                </div>
                            </a>
                        </div>
                        <div class="p-2">
                            <form class="form-horizontal" method="post" action="{{ asset('ingreso-session') }}">
                                @csrf
                                <div class="form-group">
                                    <label>Correo de usuario</label>
                                    {!!Form::email('correo',null,['class'=>"form-control", 'placeholder'=>"Ingrese su correo de usuario" , 'required'])!!}
                                </div>
        
                                <div class="form-group">
                                    <label>Contraseña</label>
                                    <input type="password" class="form-control" name="password" placeholder="Ingrese su contraseña">
                                </div>
                                
                                <div class="mt-3">
                                    <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Ingresar</button>
                                </div>
    
                                <div class="mt-4 text-center">
                                    <a href="" class="text-muted"><i class="mdi mdi-lock mr-1"></i> ¿Olvidaste tu contraseña?</a>
                                </div>
                            </form>
                        </div>
    
                    </div>
                </div>
                <div class="mt-5 text-center">
                    <p>  </p>
                    <p>Si todavía no estas ingresado, ¿a qué estás esperando?<a class="font-weight-medium text-primary" style="cursor: pointer;" data-toggle="modal" data-target="#exampleModal"> Regístrate aquí</a> </p>
                    <p>© 2020 Skote. Crafted with <i class="mdi mdi-heart text-danger"></i> by Themesbrand</p>
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
@include('auth.register')
