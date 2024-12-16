@extends('layout.register')

@section('title', 'Asignar dirección IP')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<h1>Asignar dirección IP al Switch: {{ $switch->nombre }}</h1>

<form action="{{ route('addip.store', $switch->id) }}" method="POST"> 
    @csrf

    <div class="mb-3">
        <label for="puerto_numero" class="form-label">Puerto</label>
        <input type="text" class="form-control" id="puerto_numero" name="puerto_numero" placeholder="Puerto" value="{{ old('puerto_numero') }}">
    </div>

    <div class="mb-3">
        <label for="direccion_ip" class="form-label">Dirección IP</label>
        <input type="text" class="form-control" id="direccion_ip" name="direccion_ip" placeholder="Dirección IP del puerto" value="{{ old('direccion_ip') }}">
    </div>

    <div class="mb-3">
        <label for="estado" class="form-label">Estado:</label>
        <select id="estado" name="estado" class="form-select">
            <option value="Activado">Activado</option>
            <option value="Desactivado" selected>Desactivado</option>
        </select>
    </div>

    <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Enviar</button>
    <a href="{{ route('addip.index', $switch->id) }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Regresar</a>
</form>

@endsection
