@extends('layouts.app')

@section('titulo','Proveedores')



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
<div class="container">
<!-- html agregado-->
<!-- <form> -->
  {{-- <div class="input-group-prepend">
    <input class="form-control mr-sm-2" name="texto" id="texto" type="text" placeholder="Buscar Productos" aria-label="Search">
    <!-- <button class="btn btn-secondary my-2 my-sm-0" type="submit">Buscar</button> -->
  </div> --}}
  <!-- </form> -->
  <br>
<!-- fin del html agregado-->
  <table class="table table-hover" >
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Correo Electrónico</th>
            <th scope="col">Teléfono</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody id="ok">
        @foreach ($proveedores as $proveedor)
            <tr>
                <td>{{$proveedor->cod_proveedor}}</td>
                <td>{{$proveedor->nombre}}</td>
                <td>{{$proveedor->correo}}</td>
                <td>{{$proveedor->telefono}}</td>
                <td><a href="{{route('Proveedores.edit', $proveedor->cod_proveedor)}}"><button type="button" class="btn btn-success">Editar</button></a></td>
            </tr>
        @endforeach
      </tbody>
  </table>            
</div>
<div class="row">
    <div class="mx-auto">
        {{$proveedores}}
    </div>
</div>
@endsection