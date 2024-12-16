@extends('layout.register')

@section('title', 'Crear nueva refacción')

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

        <h1>Crear nueva refacción</h1>

    <form action="{{route ('refacciones.store', $brands->id) }}" method="POST">
            @csrf

        <div class="mb-3">
            <label for="tipo" class="form-label">tipo de pieza</label>
            <input type="text" class="form-control" id="tipo" name="tipo" placeholder="tipo" value="{{ old('tipo') }}">
        </div>
        <div class="mb-3">
            <label for="stock" class="form-label">stock</label>
            <input type="text"  class="form-control" id="stock" name="stock" placeholder="stock" value="{{ old('stock') }}" rows="3">
        </div>
        <div class="mb-3">
            <label for="descripcion" class="form-label"> descripcion</label>
            <input type="text" class="form-control" id="descripcion" name="descripcion" placeholder="descripcion" value="{{ old ('descripcion') }}">
        </div>
        

        <button type="submit" class="btn btn-primary"><i class="bi bi-save"></i> Enviar</button>
        <a href="{{ route ('refacciones.index', $brands -> id) }}" class="btn btn-secondary"><i class= "bi bi-arrow-left"> Regresar</i></a>
        
        
        
    </form>


</div>

@endsection