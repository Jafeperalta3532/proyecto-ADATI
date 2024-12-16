@extends('layout.register')

@section('title', 'Gestión de las refacciones')

@section('content')

<div class="container">
    <h1>Gestión de las refacciones</h1>

    <div class="text-end mb-3">
        <a href="{{ route('refacciones.create', $brands->first()->id) }}" class="btn btn-primary"><i class="bi bi-plus-circle-fill"></i> Crear </a>
    </div>

    <table class="table">
        <thead>
            <tr>
                <th scope="col" class="text-start">Tipo</th>
                <th scope="col" class="text-start">stock</th>
                <th scope="col" class="text-start">descripcion</th>
                <th scope="col" class="text-start">Acciones</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pieza as $piezas)
                <tr>
                    <td>{{ $piezas->tipo }}</td>
                    <td>{{ $piezas->stock }}</td>
                    <td>{{ $piezas->descripcion }}</td>
                    <td class="text-end">
                        <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#edit{{$piezas->id, $brands->id }}"><i class="bi bi-pencil-square"></i>
                        <!-- Formulario de eliminación -->
                        </td>
                        <td>
                        <form action="{{ route('refacciones.destroy', ['id' => $piezas->id, 'marca_id' => $brands->first()->id]) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estás seguro de borrar este switch?')"><i class="bi bi-trash"></i></button>
                        </form>
                    </td>
                </tr>
                @include('refacciones.upgrade')
            @endforeach
        </tbody>
    </table>

</div>
<a href="{{ route('marcas.index') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Regresar</a>
@endsection