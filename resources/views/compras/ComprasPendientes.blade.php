@extends('layouts.app')

@section('titulo','Compras Pendientes')


@section('alert')
<div class="container">
      @if (session('datos'))
  <div class="alert alert-success alert-dismissible fade show" role="alert" align="center">
    {{session('datos')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">  
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif
@endsection

@section('content')
    <div class="input-group-prepend">
      <div class="col-sm-8">
        <input class="form-control mr-sm-2" name="textoCompraP" id="textoCompraP" type="text" placeholder="Buscar Compras" aria-label="Search">
      </div>
      <div class="col-sm-4">
        <select class="custom-select" name='opcBuscadorC' id="opcBuscadorC" autocomplete="off">
          <option value="1"selected>Codigo Compra</option>
          <option value="2">Empleado</option>
          <option value="3">Proveedor</option>
        </select>
      </div>
    </div>

    <br>
      <div class="row" id="ok2">
      @foreach ($pedidoCompras as $pedido)
        <div class="col-sm-4">
            <div class="card">
            <div class="card-body">
                <h5 class="card-title">Special title treatment</h5>
                <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Vendido por: {{App\empleado::find($pedido->cod_empleado_fk)->nombre}} {{App\empleado::find($pedido->cod_empleado_fk)->apellido}}</li>
                    <li class="list-group-item">Proveedor: {{App\proveedor::find($pedido->cod_proveedor_fk)->nombre}}</li>
                    <li class="list-group-item">Total: ${{$pedido->total}}</li>
                </ul>
                <a href="{{route('compras.edit', $pedido->cod_compra)}}" class="btn btn-primary">Editar</a>
            </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection
