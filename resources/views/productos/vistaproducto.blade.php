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
<div class="container">
<!-- html agregado-->
<!-- <form> -->
  <div class="input-group-prepend">
    <input class="form-control mr-sm-2" name="texto" id="texto" type="text" placeholder="Buscar Productos" aria-label="Search">
    <!-- <button class="btn btn-secondary my-2 my-sm-0" type="submit">Buscar</button> -->
  </div>
  <!-- </form> -->
  <br>
<!-- fin del html agregado-->
  <table class="table table-hover" >
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Stock</th>
            @canany(['bodega'])
            <th scope="col">Acciones</th>
            @endcanany
          </tr>
        </thead>
        <tbody id="ok">
        <tr>
          <td align="center" colspan="5">Ingrese el nombre o codigo de producto que desea ver </td>
        </tr>
      </tbody>
  </table>            
</div>  
@endsection