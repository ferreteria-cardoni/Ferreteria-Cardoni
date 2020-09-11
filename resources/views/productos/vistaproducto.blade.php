@extends('layouts.app')

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

	<center><h3>Vista de Inventario</h3></center><br>
			
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">Nombre</th>
      <th scope="col">Stock</th>
      
    </tr>
  </thead>
  <tbody>
    @foreach($productos as $ItemP)
    <tr>
      <th scope="row">{{$ItemP->cod_producto}}</th>
      <td>{{$ItemP->nombre}}</td>
      <td>{{$ItemP->cantidad}}</td>
    </tr>
     @endforeach
  </tbody>
  
</table>
<div class="row"><div class="mx-auto">{{$productos->links()}}</div></div>		
@endsection