@extends('layouts.app')

@section('titulo','Ventas')

@section('content')
    <table class="table table-hover table-condensed">
    <div class="input-group-prepend">
        <input class="form-control mr-sm-2" name="textoVenta" id="textoVenta" type="text" placeholder="Buscar Productos" aria-label="Search">
    </div>
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Unidades Vendidas</th>
                <th scope="col">Fecha de Venta</th>
                <th scope="col">Vendido por</th>
                <th scope="col">Estado</th>
            </tr>
        </thead>
        <tbody id="VistaVenta">
        <tr>
          <td align="center" colspan="5">Ingrese el nombre o codigo de producto que desea ver </td>
        </tr>
      </tbody>
       <!--  <tbody>
            @foreach ($pedidoVentas as $pedido)
            <tr>
            <th scope="row">{{$pedido->cod_producto_fk}}</th>
                {{-- Recuperando el nombre del producto --}}
                <td>{{App\producto::find($pedido->cod_producto_fk)->nombre}}</td>
                <td>{{$pedido->cantidad}}</td>
                {{-- Mostrando la fecha en el formato dia-mes-año --}}
                <td>{{\Carbon\Carbon::parse($pedido->created_at)->format('d/m/Y')}}</td>
            </tr>
            @endforeach
        </tbody> -->
    </table>
    <!-- <div class="row">
        <div class="mx-auto">
            {{$pedidoVentas}}
        </div>
    </div> -->
@endsection
