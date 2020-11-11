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
    <div class="input-group-prepend">
            <input class="form-control mr-sm-2" name="textoVentaP" id="textoVentaP" type="text" placeholder="Buscar Ventas" aria-label="Search">
    </div>
    <br>
  <div class="row">
      <div class="col-sm-4" id="ok1">

        </div>
  </div>


  <table class="table table-hover" >
        <thead>
          <tr>
            <th scope="col">ID Pedido Venta</th>
            <th scope="col">Cod Venta</th>
            <th scope="col">Cod Producto</th>
            <th scope="col">Cantidad</th>
            <th scope="col">Fecha Venta</th>
            <!-- @canany(['bodega'])
            <th scope="col">Acciones</th>
            @endcanany -->
          </tr>
        </thead>
        <tbody >
        <tr>
          <td align="center" colspan="5">Ingrese el nombre o codigo de producto que desea ver </td>
        </tr>
      </tbody>
  </table>
</div>
@endsection
