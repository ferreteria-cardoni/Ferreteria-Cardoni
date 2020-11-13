@extends('layouts.app')



@section('titulo','Registro de Empleados')

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




	  <div class="form-row">
				  	<div class="form-group col-md-2">
				      <label>Cod Empleado</label>
				      <input autocomplete="off" type="text" class="form-control" maxlength="6" minlength="6" name="idEmpleado" id="idEmpleado" placeholder="Nº" value="{{ old('idproducto') }}">
              <span id="msgidproducto" name="msgidproducto" class="AlertaMsg"></span>
				    </div>

				    <div class="form-group col-md-5">
						<label>Nombre del Empleado</label>
						<input type="text" class="form-control" id="idnombreempleado" name="idnombreempleado" placeholder="Escriba el nombre..." value="{{ old('idnombreProve') }}">
						<span id="msgidnombreProve" name="msgidnombreProve" class="AlertaMsg"></span>
		</div>

		<div class="form-group col-md-5">
		<label>DUI</label>
		<input type="numeric" class="form-control" id="DUI" name="DUI" maxlength="14" placeholder="Escribe tu DUI..."
			value="{{ old('NIT') }}">
		<span id="msgNIT" name="msgNIT" class="AlertaMsg"></span>
	</div>

	<div class="form-group col-md-1">
				      <label>Edad</label>
				      <input autocomplete="off" type="text" class="form-control" maxlength="6" minlength="6" name="idEdad" id="idEdad" placeholder="" value="{{ old('idproducto') }}">
              <span id="msgidproducto" name="msgidproducto" class="AlertaMsg"></span>
				    </div>


	<div class="form-group col-md-2">
				      <label>Sexo</label>
      <select class="browser-default custom-select">
  <option selected> Seleccione</option>
  <option value="1">Masculino</option>
  <option value="2">Femenino</option>
  <option value="3">Otro</option>
</select>
				    </div>



		<div class="form-group col-md-3">
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

		     <div class="form-group col-md-2">
    				<label class="mb-2">Rol</label>
    					<select class='mi-selector' name='idrol[]' id="idrol" multiple='multiple'>
						    <option disabled="true">Seleccione el Rol </option>
						</select>
						
    				</div>


<button type="submit" class="btn btn-primary">Registrar Empleado</button>
<button type="reset" class="btn btn-danger">Limpiar Campos</button>

</form>


@endsection