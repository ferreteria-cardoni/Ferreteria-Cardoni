<div class="modal fade exampleModalEmpleado" id="exampleModal-{{$empleado->cod_empleado}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        </div>
        <div class="modal-body">
          <form>
            <div class="form-group">
            <label for="recipient-name" class="col-form-label">Empleado:</label>
              <input type="text" class="form-control lol"  name="lol" readonly >
              <label for="recipient-name" class="col-form-label">Rol:</label>
              <input type="text" class="form-control lel" name="lel" readonly>
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
          <form action="{{route('Empleados.destroy', $empleado->cod_empleado)}}" method="post" name="formEliminarVenta">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-primary">Confirmar</button>
          </form>
        </div>
      </div>
    </div>
  </div>