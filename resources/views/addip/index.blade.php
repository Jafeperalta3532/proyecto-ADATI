@extends('layout.register')

@section('title', 'Gestión de Puertos del Switch')

@section('content')

<h1>Gestión de Puertos del Switch: {{ $switch->nombre }}</h1>

<div class="text-end mb-3">
    <a href="{{ route('addip.create', $switch->id) }}" class="btn btn-primary">
        <i class="bi bi-plus-circle-fill"> </i> Crear
    </a>
</div>

@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<table class="table">
    <thead>
        <tr>
            <th scope="col" class="text-start">Numero de puerto</th>
            <th scope="col" class="text-start">Direccion IP</th>
            <th scope="col" class="text-start">Estado</th>
            <th scope="col" class="text-start">Fecha de asignación</th>
            <th scope="col" class="text-start">Acciones</th>
            
        </tr>
    </thead>
    <tbody>
        @foreach ($direcciones_ip as $direccionesIp)
            <tr>
                <td class="text-start">{{ $direccionesIp->puerto_numero }}</td>
                <td class="text-start">{{ $direccionesIp->direccion_ip }}</td>
                <td class="text-start">{{ $direccionesIp->estado }}</td>
                <td class="text-start">{{ $direccionesIp->created_at->format('d/m/Y') }}</td>
                <td class="text-end">

             
                    <form action="{{ route('addip.destroy', [$switch->id, $direccionesIp->id]) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de eliminar esta dirección IP?')">
                            <i class="bi bi-trash"></i>
                        </button>
                    </form>
                    
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<a href="{{ route('switch.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Regresar</a>

@endsection
