 {{------------------------------- MODAL -------------------------------------}}
 <div class="modal fade exampleModal" id="exampleModal-{{$pedido->cod_venta}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
            <label for="recipient-name" class="col-form-label">Cliente:</label>
              <input type="text" class="form-control lol"  name="lol" readonly >
              <label for="recipient-name" class="col-form-label">Total:</label>
              <input type="text" class="form-control lel" name="lel" readonly>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <form action="{{route('Ventas.destroy', $pedido->cod_venta)}}" method="post" name="formEliminarVenta">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-primary">Confirmar</button>
          </form>
        </div>
      </div>
    </div>
  </div>