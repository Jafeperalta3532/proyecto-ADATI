@extends('layout.register')

@section('title', 'vista switches')

@section('content')

<div class="container">
  <h1>Gestión de switches del site</h1>

      <div class="text-end mb-3">
        <a href=" {{route ('switch.create') }}" class="btn btn-primary"><i class="bi bi-plus-circle-fill"> </i>create </a>
      </div>

            <table class="table">
              <thead>
                <tr>
                  <th scope="col" class="text-start">Nombre</th>
                  <th scope="col" class="text-start">Direccion IP</th>
                  <th scope="col" class="text-start">Modelo</th>
                  <th scope="col" class="text-start">Numero de puertos</th>
                  <th scope="col" class="text-start">Acciones</th>
                  
                </tr>
              </thead>
                  <tbody>
                      @foreach ($switchs as $switches)  {{--Defines la variable $switchs e itera sobre la coleccion de switches--}}

                          <tr>
                            <td>{{ $switches -> nombre }}</td>
                            <td>{{ $switches -> direccion_ip }}</td>
                            <td>{{ $switches -> modelo }}</td>
                            <td>{{ $switches -> cantidad_puertos }}</td>
                            <td class="text-end">
                            <a href="{{route ('addip.index', $switches->id) }}" class="btn btn-primary"><i class="bi bi-eye"></i></a>
                  <form action="{{route ('switch.destroy', $switches->id) }}" method= "POST" class="d-inline">
                    @csrf  {{--Este metodo es muy importante para borrar lo que sea en laravel--}}
                    @method('DELETE')
                      <button type="submit" class="btn btn-danger" onclick="return confirm('¿Estas seguro de borrar este switch?')"><i class= "bi bi-trash"></i></button>
                  </form>

                  </td>
                  </tr>
    
                      @endforeach

                </tbody>
            </table>

</div>
<a href="{{ route('menu') }}" class="btn btn-secondary"><i class="bi bi-arrow-left"></i> Regresar</a>
@endsection