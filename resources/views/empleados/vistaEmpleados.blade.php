@extends('layouts.app')

@section('titulo','Empleados')



@section('alert')
<div class="container">
	@if (session('datos'))
	<div class="alert alert-success alert-dismissible fade show" role="alert" align="center">
		{{session('datos')}}
		<button type="button" class="close" data-dismiss="alert" aria-label="Close">
			<span aria-hidden="true">&times;</span>
		</button>
  </div>
  @elseif (session('datos2'))
		<div class="alert alert-danger alert-dismissible fade show" role="alert" align="center">
			{{session('datos2')}}
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
      <div class="col-sm-8">
        <input class="form-control mr-sm-2" name="textoempleado" disabled id="textoempleado" type="text" placeholder="Buscar empleados" aria-label="Search">
      </div>
      <div class="col-sm-4">
        <select class="custom-select" name='opcBuscadorE' id="opcBuscadorE" autocomplete="off">
          <option value="0" disabled selected>Seleccione un rol</option>
          <option value="2">Bodega</option>
          <option value="3">Ventas</option>
          <option value="4">Compras</option>
          <option value="5">Secretaria</option>
          <option value="6">Gerente</option>
        </select>
      </div>
    </div>
    <br>
<!-- fin del html agregado-->
@foreach ($empleados as $empleado)
@include('empleados.modalEliminar')
@endforeach
  <table class="table table-hover" >
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Edad</th>
            <th scope="col">DUI</th>
            <th scope="col">Correo Electrónico</th>
            <th scope="col">Teléfono</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody id="ok4">
        @foreach ($empleados as $empleado)
          @if ($empleado->estado == 'activo')
              <tr>
                  <td>{{$empleado->cod_empleado}}</td>
                  <td>{{$empleado->nombre}}</td>
                  <td>{{$empleado->apellido}}</td>
                  <td>{{$empleado->edad}}</td>
                  <td>{{$empleado->dui}}</td>

                  @foreach (App\User::where('cod_empleado_fk', $empleado->cod_empleado)->cursor() as $usuario)
                      <td>{{$usuario->email}}</td>
                      <td>{{$empleado->telefono}}</td>

                      @if ($usuario->tieneRol()->first() == "ventas")

                          @include('empleados.modalEliminar')
                          
                          <td>
                            <a href="{{route('Empleados.edit', $empleado->cod_empleado)}}"><button type="button" class="btn btn-success">Editar</button></a>
                            <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal-{{$empleado->cod_empleado}}" data-codigo="{{$empleado->cod_empleado}}" data-total="{{$usuario->tieneRol()->first()}}" data-cliente="{{$empleado->nombre}} {{$empleado->apellido}}">Eliminar</button>
                          </td>
                      @endif
                  @endforeach
              </tr>
            @endif
        @endforeach
      </tbody>
  </table>            
</div>
<div class="row">
    <div class="mx-auto">
        {{$empleados}}
    </div>
</div>
@endsection