<div class="modal fade" id="edit{{$piezas->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Editar categoria</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form action="{{ route('refacciones.upgrade', ['id' => $piezas->id, 'marca_id' => $marca_id]) }}" method="post">
        @csrf
        @method('PUT')
      <div class="modal-body">

      <div class="mb-3">
            <label for="nombre" class="form-label">Tipo de pieza</label>
            <input
                type="text"
                class="form-control"
                name="tipo"
                id="tipo"
                aria-describedby="helpId"
                placeholder=""
                value="{{$piezas->tipo}}"
            />
        </div>

        <div class="mb-3">
            <label for="tipo" class="form-label">Stock</label>
            <input
                type="text"
                class="form-control"
                name="stock"
                id="stock"
                aria-describedby="helpId"
                placeholder=""
                value="{{$piezas->stock}}"
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
                value="{{$piezas->descripcion}}"
            />
        </div>
    

      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary">Actualizar</button>
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
    </form>
  </div>
</div>