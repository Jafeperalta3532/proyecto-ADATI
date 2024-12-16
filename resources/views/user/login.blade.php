@extends('layout.app')

@section('title', 'login User')

@section('content')

<h1>Iniciar sesion</h1>

    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('login') }}" method="POST">
        @csrf


        <!-- Email input -->
        <div class="form-outline mb-4">
            <input type="rpe" id="rpe" name="rpe" placeholder="Ingrese su R.P.E" value="{{ old('rpe') }}" class="form-control" required />
            <label class="form-label" for="rpe">R.P.E</label>
        </div>

        <!-- Password input -->
        <div class="form-outline mb-4">
            <input type="password" id="contrasena" name="contrasena" placeholder="Ingrese su contraseña" class="form-control" required />
            <label class="form-label" for="contrasena">Password</label>
        </div>


        <!-- Submit button -->
        <button type="submit" class="btn btn-primary btn-block mb-3">Iniciar sesión</button>

        <!-- Link to login page -->
        <div class="text-center">
            <a href="{{ route('register') }}">¿No tienes cuenta? Regístrate</a>
        </div>
    </form>
@endsection

