@extends('layouts.app')



@section('titulo','Registro de Proveedores')

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
	@if (session('datosError'))
	<div class="alert alert-danger alert-dismissible fade show" role="alert" align="center">
		{{session('datosError')}}
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


<form method="POST" action="{{route('Proveedores.store')}}">
    @csrf

    <div class="form-row">
		<div class="form-group col-md-5">
			<label>Nombre del proveedor</label>
			<input type="text" class="form-control" id="idnombreProve" name="idnombreProve" placeholder="Escriba el nombre...">
			<span id="msgidnombreProve" name="msgidnombreProve" class="AlertaMsg"></span>
		</div>

		<div class="form-group col-md-5">
			<label>Teléfono</label>
			<input type="text" class="form-control" id="idtelefonoProve" name="idtelefonoProve"
				placeholder="Escribe el teléfono..." maxlength="8" value="{{ old('idtelefonoProve') }}">
			<span id="msgidtelefonoProve" name="msgidtelefonoProve" class="AlertaMsg"></span>
		</div>

		<div class="form-group col-md-5">
			<label>Correo electrónico</label>
			<input type="text" class="form-control" id="idcorreoProve" name="idcorreoProve" placeholder="Email..."
				value="{{ old('idcorreoProve') }}">
			<span id="msgidcorreoProve" name="msgidcorreoProve" class="AlertaMsg"></span>
		</div>
</div>

<button type="submit" class="btn btn-primary">Registrar Proveedor</button>
<button type="reset" class="btn btn-danger">Limpiar Campos</button>

</form>


@endsection