@extends('layouts.app')

@section('titulo','Registro de Clientes')

@section('alert')
<div class="container">
      @if (session('datos'))
  <div class="alert alert-danger alert-dismissible fade show" role="alert" align="center">
    {{session('datos')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">  
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
@endif
@endsection

@section('content')
	<!DOCTYPE html>
		<html>
			<head>
				<title></title>
			</head>
			<body>
				@if ($errors->any())
					<div class="alert alert-danger">
					<center><h5>Hay errores en en formulario, favor revisar</H2></center>
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
					</div>
				@endif
				
        <form method="POST" action="{{route('Productos.store')}}">
					@csrf
				  <div class="form-row">
						<div class="form-group col-md-1">
						<label>ID</label>
						<input type="text" class="form-control" maxlength="4" minlength="4" name="idcliente" id="idcliente" placeholder="Nº" value="{{ old('idcliente') }}">
						<span id="msgidcliente" name="msgidcliente" class="AlertaMsg"></span>
						</div>
						
						<div class="form-group col-md-6">
						<label>Nombre</label>
						<input type="text" class="form-control" id="idnombreC" name="idnombreC" placeholder="Escribe algo..." value="{{ old('idnombreC') }}">
						<span id="msgidnombreC" name="msgidnombreC" class="AlertaMsg"></span>
						</div>
						
						<div class="form-group col-md-5">
						<label>Telefono</label>
						<input type="text" class="form-control" id="idtelefonoC" name="idtelefonoC" placeholder="Escribe algo..." value="{{ old('idtelefonoC') }}">
						<span id="msgidtelefonoC" name="msgidtelefonoC" class="AlertaMsg"></span>
						</div>		
				 </div>

				 <div class="form-row">
				 		<div class="form-group col-md-4">
							<label>Rubro</label>
							<input type="text" class="form-control" id="idrubro" name="idrubro" placeholder="Escribe algo..." value="{{ old('idrubro') }}">
							<span id="msgidnombre" name="msgidnombre" class="AlertaMsg"></span>
						</div>
				 		<div class="form-group col-md-4">
							<label>NIT</label>
							<input type="numeric" class="form-control" id="NIT" name="NIT" placeholder="Escribe algo..." value="{{ old('NIT') }}">
							<span id="msgidnombre" name="msgidnombre" class="AlertaMsg"></span>
						</div>
				<div class="form-group col-md-4">
						<label>Numero Consumidor Final</label>
						<input type="numeric" class="form-control" id="NCF" name="NCF" placeholder="Escribe algo..." value="{{ old('NCF') }}">
						<span id="msgidnombre" name="msgidnombre" class="AlertaMsg"></span>
				</div>

				 </div>

				  <div class="form-row">
				  	<div class="form-group col-md-6">
				      <label>Dirección</label>
				      <input type="textarea" class="form-control" id="DireccionC" name="DireccionC" placeholder="Escribe algo..." value="{{ old('DireccionC') }}">
					  <span id="msgidpresentacion" name="msgidpresentacion" class="AlertaMsg"></span>
					</div>
				 </div> <br>
				  <button type="submit" class="btn btn-primary">Registrar Cliente</button> 
				  <button type="reset" class="btn btn-danger">Limpiar Campos</button>
				</form>
			</body>
		</html>
@endsection



