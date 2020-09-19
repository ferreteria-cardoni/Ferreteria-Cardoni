
@extends('layouts.app')

@section('content')
<div class="container">
<!-- html agregado-->
    <div class="col-8">
        <div class="input-group">
            <input type="text" class="form-control" id="texto" placeholder="Ingrese nombre">
            <div class="input-group-append"><span class="input-group-text">Buscar</span></div>
        </div>
        <div id="resultados" class="bg-light border"></div>
    </div>
<!-- fin del html agregado-->
  

@if (count($productos))
    @foreach ($productos as $item)          
        <p class="p-2 border-bottom">{{$item->cod_producto .' - '. $item->nombre}}</p>
    @endforeach             
@endif


@endsection