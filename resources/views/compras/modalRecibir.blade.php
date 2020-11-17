
<div class="modal fade ModalC" id="ModalC-{{$pedido->cod_compra}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
            <label for="recipient-name" class="col-form-label">Proveedor:</label>
              <input type="text" class="form-control lol"  name="lol" readonly >
              <label for="recipient-name" class="col-form-label">Total:</label>
              <input type="text" class="form-control lel" name="lel" readonly>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <form action="{{route('confirmarC', $pedido->cod_compra)}}" method="get" name="formEliminarVenta">
              <button type="submit" class="btn btn-primary">Confirmar</button>
          </form>
        </div>
      </div>
    </div>
  </div>