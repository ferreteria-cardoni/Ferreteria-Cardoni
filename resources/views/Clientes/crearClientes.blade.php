@extends('layouts.app')

@section('titulo','Registro de Clientes')

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


	@section('alert2')
	<div class="container">
		@if (session('datosE'))
		<div class="alert alert-danger alert-dismissible fade show" role="alert" align="center">
			{{session('datosE')}}
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
		</div>
		@endif
		@endsection

	@section('content')
	@if ($errors->any())
	<div class="alert alert-danger">
		<center>
			<h5>Hay errores en en formulario, favor revisar</H2>
		</center>
		<ul>
			@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
			@endforeach
		</ul>
	</div>
	@endif

	<form method="POST" action="{{route('Clientes.store')}}">
		@csrf
		<div class="form-row">
		<div class="form-group col-md-5">
			<label>Nombre</label>
			<input type="text" class="form-control" id="idnombreC" name="idnombreC" placeholder="Escribe tu nombre..."
				value="{{ old('idnombreC') }}">
			<span id="msgidnombreC" name="msgidnombreC" class="AlertaMsg"></span>
		</div>

		<div class="form-group col-md-5">
			<label>Apellido</label>
			<input type="text" class="form-control" id="idapellidoC" name="idapellidoC" placeholder="Escribe tu apellido..."
				value="{{ old('idapellidoC') }}">
			<span id="msgidapellidoC" name="msgidapellidoC" class="AlertaMsg"></span>
		</div>

		<div class="form-group col-md-5">
			<label>Telefono</label>
			<input type="text" class="form-control" id="idtelefonoC" name="idtelefonoC"
				placeholder="Escribe tu telefono..." maxlength="8" value="{{ old('idtelefonoC') }}">
			<span id="msgidtelefonoC" name="msgidtelefonoC" class="AlertaMsg"></span>
		</div>

		<div class="form-group col-md-5">
			<label>Rubro</label>
			<input type="text" class="form-control" id="idrubro" name="idrubro" placeholder="Rubro..."
				value="{{ old('idrubro') }}">
			<span id="msgidrubro" name="msgidrubro" class="AlertaMsg"></span>
		</div>
</div>

<div class="form-row">
	<div class="form-group col-md-5">
		<label>NIT</label>
		<input type="numeric" class="form-control" id="NIT" name="NIT" maxlength="14" placeholder="Escribe tu NIT..."
			value="{{ old('NIT') }}">
		<span id="msgNIT" name="msgNIT" class="AlertaMsg"></span>
	</div>
	<div class="form-group col-md-5">
		<label>Numero Consumidor Final</label>
		<input type="numeric" class="form-control" id="NCF" name="NCF" maxlength="11" placeholder="N° consumidor final..."
			value="{{ old('NCF') }}">
		<span id="msgNCF" name="msgNCF" class="AlertaMsg"></span>
	</div>

</div>

<div class="form-row">
	<div class="form-group col-md-6">
		<label>Dirección</label>
		<input type="textarea" class="form-control" id="DireccionC" name="DireccionC" placeholder="Direccion..."
			value="{{ old('DireccionC') }}">
		<span id="msgDireccionC" name="msgDireccionC" class="AlertaMsg"></span>
	</div>
</div> <br>
<button type="submit" class="btn btn-primary">Registrar Cliente</button>
<button type="reset" class="btn btn-danger">Limpiar Campos</button>
</form>
@endsection