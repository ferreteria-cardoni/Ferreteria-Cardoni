@extends('layouts.app')

@section('titulo','Ventas Pendientes')

@section('content')
    <div class="input-group-prepend">
            <input class="form-control mr-sm-2" name="textoVentaP" id="textoVentaP" type="text" placeholder="Buscar Ventas" aria-label="Search">
    </div>
    <br>
  <div class="row">
  @foreach ($pedidoVentas as $pedido)
    <div class="col-sm-4">
        <div class="card">
        <div class="card-body">
            <h5 class="card-title">Special title treatment</h5>
            <p class="card-text">With supporting text below as a natural lead-in to additional content.</p>
            <ul class="list-group list-group-flush">
                <li class="list-group-item">Vendido por: {{App\empleado::find($pedido->cod_empleado_fk)->nombre}} {{App\empleado::find($pedido->cod_empleado_fk)->apellido}}</li>
                <li class="list-group-item">Cliente: {{App\cliente::find($pedido->cod_cliente_fk)->nombre}} {{App\cliente::find($pedido->cod_cliente_fk)->apellido}}</li>
                <li class="list-group-item">Direccion: {{$pedido->direccion}}</li>
                <li class="list-group-item">Total: ${{$pedido->total}}</li>
            </ul>
            <a href="#" class="btn btn-primary">Ver</a>
        </div>
        </div>
    </div>         
    @endforeach
  </div>
@endsection