@extends('layout.register')

@section('title', 'Create switch')

@section('content')

<div class="container">

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif

        <h1>Crear switch</h1>

    <form action="{{route ('switch.store') }}" method="POST">
            @csrf

        <div class="mb-3">
            <label for="nombre" class="form-label">nombre</label>
            <input type="text" class="form-control" id="nombre" name="nombre" placeholder="nombre" value="{{ old('nombre') }}">
        </div>
        <div class="mb-3">
            <label for="modelo" class="form-label">Modelo</label>
            <input type="text"  class="form-control" id="modelo" name="modelo" placeholder="modelo" value="{{ old('modelo') }}" rows="3">
        </div>
        <div class="mb-3">
            <label for="direccion_ip" class="form-label">direccion IP</label>
            <input type="text" class="form-control" id="direccion_ip" name="direccion_ip" placeholder="direccion ip" value="{{ old ('direccion_ip') }}">
        </div>
        <div class="mb-3">
            <label for="cantidad_puertos" class="form-label">Cantidad de puertos</label>
            <input type="text" class="form-control" id="cantidad_puertos" name="cantidad_puertos" placeholder="direccion ip" value="{{ old ('cantidad_puertos') }}">
        </div>

        <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Enviar</button>
        <a href="{{ route ('switch.index') }}" class="btn btn-secondary"><i class= "bi bi-arrow-left"> Regresar</i></a>
        
        
        
    </form>


</div>

@endsection