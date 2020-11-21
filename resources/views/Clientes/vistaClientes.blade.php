@extends('layouts.app')

@section('titulo','Clientes')



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
   <div class="input-group-prepend">
    <input class="form-control mr-sm-2" name="textoClientes" id="textoClientes" type="text" placeholder="Buscar Clientes (Codigo, Nombre o Apellido)" aria-label="Search">
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
            <th scope="col">Apellido</th>
            <th scope="col">Dirección</th>
            <th scope="col">Teléfono</th>
            <th scope="col">Rubro</th>
            <th scope="col">NIT</th>
            <th scope="col">Número de consumidor</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody id="okC">
        @foreach ($clientes as $cliente)
            <tr>
                <td>{{$cliente->cod_cliente}}</td>
                <td>{{$cliente->nombre}}</td>
                <td>{{$cliente->apellido}}</td>
                <td>{{$cliente->direccion}}</td>
                <td>{{$cliente->telefono}}</td>
                <td>{{$cliente->rubro}}</td>
                <td>{{$cliente->nit}}</td>
                <td>{{$cliente->num_consumidor}}</td>
                <td><a href="{{route('Clientes.edit', $cliente->cod_cliente)}}"><button type="button" class="btn btn-success">Editar</button></a></td>
            </tr>
        @endforeach
      </tbody>
  </table>            
</div>
<div class="row">
    <div class="mx-auto">
        {{$clientes}}
    </div>
</div>
@endsection