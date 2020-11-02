@extends('layouts.app')

@section('titulo','Ventas Pendientes')


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
<<<<<<< HEAD
<div class="input-group-prepend">
  <input class="form-control mr-sm-2" name="textoVentaP" id="textoVentaP" type="text" placeholder="Buscar Ventas" aria-label="Search">
</div>
<br>
<div class="row">
@foreach ($pedidoVentas as $pedido)
<div class="col-sm-4" id="ok1">
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
  <a href="{{route('Ventas.edit', $pedido->cod_venta)}}" class="btn btn-primary">Editar</a>
</div>
</div>
</div>
@endforeach
=======
    <div class="input-group-prepend">
            <input class="form-control mr-sm-2" name="textoVentaP" id="textoVentaP" type="text" placeholder="Buscar Ventas" aria-label="Search">
    </div>
    <br>
      <div class="row" id="ok1">
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
                <a href="{{route('Ventas.edit', $pedido->cod_venta)}}" class="btn btn-primary">Editar</a>
            </div>
            </div>
        </div>
        @endforeach
    </div>
  


  <!-- <table class="table table-hover" >
        <thead>
          <tr>
            <th scope="col">ID Pedido Venta</th>
            <th scope="col">Cod Venta</th>
            <th scope="col">Cod Producto</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Fecha Venta</th> -->
            <!-- @canany(['bodega'])
            <th scope="col">Acciones</th>
            @endcanany -->
     <!--      </tr>
        </thead>
        <tbody id="ok1">
        <tr>
          <td align="center" colspan="5">Ingrese el nombre o codigo de producto que desea ver </td>
        </tr>
      </tbody>
  </table> -->
>>>>>>> 21ac99d436716d267207108cd154d54c9aacd086
</div>
@endsection
