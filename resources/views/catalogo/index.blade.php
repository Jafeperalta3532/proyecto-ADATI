@extends('layout.register')

@section('title', 'Gestión de las marcas')

@section('content')


<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create">
Nuevo
</button>

<div
    class="table-responsive">
    <br>
    <table class="table">
        <thead class= "bg-white text-dark" >
            <tr>
                <th scope="col">NOMBRE</th>
                <th scope="col">DESCRICPION</th>
                <th scope="col">ACCIONES</th>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($brands as $marcas)
            <tr class="">

                <td>{{$marcas->nombre}}</td>
                <td>{{$marcas->descripcion}}</td>
                <td class= "text-end">
                <a href="{{route ('refacciones.index', $marcas->id) }}" class="btn btn-primary"><i class="bi bi-eye"></i></a>
                </td>
                <td>
                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#edit{{$marcas->id}}"><i class="bi bi-pencil-square"></i>
                </td>
                <td>
                <form action="{{route ('marcas.destroy', $marcas->id) }}" method=POST >
                    @csrf
                    @method('DELETE')
                <button type="button" class="btn btn-danger" data-bs-toggle="modal"  data-bs-target="#delete{{$marcas->id}}"><i class= "bi bi-trash"></i>
                </form>
                </td>
            </tr>

            @include('catalogo.upgrade')
            @endforeach
            
        </tbody>
    </table>
</div>

@include('catalogo.create')

<a href="{{ route('menu') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Regresar</a>
@endsection
