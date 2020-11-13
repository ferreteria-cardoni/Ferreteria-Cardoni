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
				  	<div class="form-group col-md-5">
				      <label>Nombre</label>
				      <input autocomplete="off" type="text" class="form-control" name="NombreEmpleado" id="NombreEmpleado" placeholder="Escriba el nombre..." value="{{ old('NombreEmpleado') }}" required>
              <span id="msgNombreEmpleado" name="msgNombreEmpleado" class="AlertaMsg"></span>
				    </div>

				    <div class="form-group col-md-5">
						<label>Apellido</label>
						<input type="text" class="form-control" id="ApellidoEmpleado" name="ApellidoEmpleado" placeholder="Escriba el apellido..." value="{{ old('ApellidoEmpleado') }}" required>
						<span id="msgApellidoEmpleado" name="msgApellidoEmpleado" class="AlertaMsg"></span>
					</div>
		<div class="form-group col-md-5">
		<label>DUI</label>
		<input type="numeric" class="form-control" id="DUIE" name="DUIE" maxlength="14" placeholder="Escriba el DUI..."
			value="{{ old('DUIE') }}" required>
		<span id="msgDUIE" name="msgDUIE" class="AlertaMsg"></span>
	</div>

	<div class="form-group col-md-5">
				      <label>Edad</label>
				      <input autocomplete="off" type="text" class="form-control" maxlength="6" minlength="6" name="idEdadE" id="idEdadE" placeholder="Escriba la edad..." value="{{ old('idEdadE') }}" required>
              <span id="msgidEdadE" name="msgidEdadE" class="AlertaMsg"></span>
				    </div>

	<div class="form-group col-md-5">
				      <label>Sexo</label>
      	<select class="browser-default custom-select" id="sexoE" name="sexoE" required>
			<option value="0" selected> Seleccione</option>
			<option value="1">Masculino</option>
			<option value="2">Femenino</option>
			<option value="3">Otro</option>
		</select>
		<span id="msgsexoE" name="msgsexoE" class="AlertaMsg"></span>
	</div>



		<div class="form-group col-md-5">
			<label>Teléfono</label>
			<input type="text" class="form-control" id="idtelefonoE" name="idtelefonoE"
				placeholder="Escribe el teléfono..." maxlength="8" value="{{ old('idtelefonoProve') }}" required>
			<span id="msgidtelefonoE" name="msgidtelefonoE" class="AlertaMsg"></span>
		</div>

		<div class="form-group col-md-5">
			<label>Correo electrónico</label>
			<input type="text" class="form-control" id="idcorreoE" name="idcorreoE" placeholder="Email..."
				value="{{ old('idcorreoE') }}">
			<span id="msgidcorreoE" name="msgidcorreoE" class="AlertaMsg"></span>
		</div>

		<div class="form-group col-md-5">
			<label for="idrol" class="mb-2">Rol</label>
			<select class='mi-selector' name='idrol[]' id="idrol" multiple='multiple' required>
				<option disabled="true">Seleccione el Rol </option>
			</select>
		</div>
		
</div>

<button type="submit" class="btn btn-primary">Registrar Empleado</button>
<button type="reset" class="btn btn-danger">Limpiar Campos</button>

</form>


@endsection