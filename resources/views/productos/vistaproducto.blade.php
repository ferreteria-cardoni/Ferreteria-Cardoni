@extends('layouts.app')

@section('titulo','Vista Inventario')

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

@if ($errors->any())
<div class="alert alert-danger">
<center><h5>Hay errores en el buscador</H2></center>
<ul>
  @foreach ($errors->all() as $error)
    <li>{{ $error }}</li>
  @endforeach
</ul>
</div>
@endif

<form>
  @csrf
  <div class="input-group-prepend">
    <input class="form-control mr-sm-2" name="buscador" id="buscador" type="text" placeholder="Buscar Productos" aria-label="Search">
    <button class="btn btn-secondary my-2 my-sm-0" type="submit">Buscar</button>
  </div>
  </form><br>


    <table class="table table-hover" >
      <thead>
        <tr>
          <th scope="col">ID</th>
          <th scope="col">Nombre</th>
          <th scope="col">Stock</th>  
        </tr>
      </thead>
      <tbody id="myTable">
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