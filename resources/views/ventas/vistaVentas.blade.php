@extends('layouts.app')

@section('titulo','Ventas')

@section('content')
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Unidades Vendidas</th>
                <th scope="col">Fecha de Venta</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($pedidoVentas as $pedido)
            <tr>
            <th scope="row">{{$pedido->cod_producto_fk}}</th>
                {{-- Recuperando el nombre del producto --}}
                <td>{{App\producto::find($pedido->cod_producto_fk)->nombre}}</td>
                <td>{{$pedido->cantidad}}</td>
                {{-- Mostrando la fecha en el formato dia-mes-año --}}
                <td>{{\Carbon\Carbon::parse($pedido->fecha_venta)->format('d/m/Y')}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div class="row">
        <div class="mx-auto">
            {{$pedidoVentas}}
        </div>
    </div>
@endsection
