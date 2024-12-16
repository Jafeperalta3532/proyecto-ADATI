
<!-- Modal -->
<div class="modal fade" id="edit{{$marcas->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar categoria</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{route ('marcas.update', $marcas->id) }}"method="post">
        @csrf
        @method('PUT')
      <div class="modal-body">

        <div class="mb-3">
            <label for="nombre" class="form-label">Nombre</label>
            <input
                type="text"
                class="form-control"
                name="nombre"
                id="nombre"
                aria-describedby="helpId"
                placeholder=""
                value="{{$marcas->nombre}}"
            />
        </div>
        
        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripcion</label>
            <input
                type="text"
                class="form-control"
                name="descripcion"
                id="descripcion"
                aria-describedby="helpId"
                placeholder=""
                value="{{$marcas->descripcion}}"
            />
        </div>
    

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit" class="btn btn-primary">Actualizar</button>
      </div>
    </div>
    </form>
  </div>
</div>


<!-- Modal Eliminar-->
<div class="modal fade" id="delete{{$marcas->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Eliminar categoria</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{route ('marcas.destroy', $marcas->id) }}"method="post">
        @csrf
        @method('DELETE')
      <div class="modal-body">

      ¿Estas seguro de eliminar a <strong> {{$marcas->nombre}}? </strong>
    
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary"  data-bs-dismiss="modal"> Cerrar</button>
        <button type="submit" class="btn btn-primary">Eliminar</button>
      </div>
    </div>
    </form>
  </div>
</div>