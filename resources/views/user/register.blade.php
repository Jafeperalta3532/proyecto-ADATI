@extends('layout.register')

@section('title', 'Registro de Usuario')

@section('content')
<div class="container text-center py-5">
    <div class="row">
        <div class="col-12 text-start mb-3">
            <a href="{{ route('login') }}" class="btn btn-secondary">
                <i class="bi bi-arrow-left"></i> Regresar
            </a>
        </div>
        <div class="col-12">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <h1>Registro</h1>
            <p>Date de alta llenando el siguiente formulario</p>

            <form action="{{ route('register') }}" method="POST">
                @csrf

                <!-- Nombre -->
                <div class="form-outline mb-4">
                    <input type="text" id="nombre" name="nombre" class="form-control" placeholder="Ingrese su nombre" value="{{ old('nombre') }}" required />
                    <label class="form-label" for="nombre">Nombre</label>
                </div>

                <!-- Apellido -->
                <div class="form-outline mb-4">
                    <input type="text" id="apellidos" name="apellidos" class="form-control" value="{{ old('apellidos') }}" placeholder="Ingrese su apellido" required />
                    <label class="form-label" for="apellidos">Apellidos</label>
                </div>

                <!-- R.P.E -->
                <div class="form-outline mb-4">
                    <input type="text" id="rpe" name="rpe" class="form-control" placeholder="Ingrese su R.P.E" value="{{ old('rpe') }}" />
                    <label class="form-label" for="rpe">R.P.E</label>
                </div>

                <!-- Correo -->
                <div class="form-outline mb-4">
                    <input type="email" id="correo" name="correo" class="form-control" placeholder="Ingrese su correo" value="{{ old('correo') }}" required />
                    <label class="form-label" for="correo">Correo</label>
                </div>

                <!-- Contraseña -->
                <div class="form-outline mb-4">
                    <input type="password" id="contrasena" name="contrasena" class="form-control" placeholder="Ingrese su contraseña" required />
                    <label class="form-label" for="contrasena">Contraseña</label>
                </div>

                <!-- Confirmar contraseña -->
                <div class="form-outline mb-4">
                    <input type="password" id="contrasena_confirmation" name="contrasena_confirmation" class="form-control" placeholder="Confirme su contraseña" required />
                    <label class="form-label" for="contrasena_confirmation">Confirmar contraseña</label>
                </div>

                <!-- Mostrar mensaje de éxito si existe -->
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                <!-- Botón de registro -->
                <button type="submit" class="btn btn-primary btn-block mb-3">Registrarse</button>

                <!-- Enlace a login -->
                <div class="text-center">
                    <a href="{{ route('login') }}">¿Ya tienes cuenta? Inicia sesión</a>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection