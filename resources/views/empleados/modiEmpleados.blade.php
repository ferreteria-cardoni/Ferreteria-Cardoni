@extends('layouts.app')



@section('titulo','Modificar Empleado')

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



        <form method="POST" action="{{route('Empleados.update', $id)}}">
            @csrf
            @method('PATCH')

			<div class="form-row">
				<div class="form-group col-md-5">
					<label>Nombre</label>
					<input autocomplete="off" type="text" class="form-control" name="NombreEmpleado" id="NombreEmpleado"
						placeholder="Escriba el nombre..." maxlength="25" value="{{ $empleado->nombre }}" required>
					<span id="msgNombreEmpleado" name="msgNombreEmpleado" class="AlertaMsg"></span>
				</div>

				<div class="form-group col-md-5">
					<label>Apellido</label>
					<input type="text" class="form-control" id="ApellidoEmpleado" name="ApellidoEmpleado"
						placeholder="Escriba el apellido..." maxlength="25" value="{{ $empleado->apellido }}" required>
					<span id="msgApellidoEmpleado" name="msgApellidoEmpleado" class="AlertaMsg"></span>
				</div>
				<div class="form-group col-md-5">
					<label>DUI</label>
					<input type="numeric" class="form-control" id="DUIE" name="DUIE" maxlength="9"
						placeholder="Escriba el DUI..." value="{{ $empleado->dui }}" required>
					<span id="msgDUIE" name="msgDUIE" class="AlertaMsg"></span>
				</div>

				<div class="form-group col-md-5">
					<label>Edad</label>
					<input autocomplete="off" type="number" min="18" class="form-control"
						name="idEdadE" id="idEdadE" maxlength="2" placeholder="Escriba la edad..." value="{{ $empleado->edad }}"
						required>
					<span id="msgidEdadE" name="msgidEdadE" class="AlertaMsg"></span>
				</div>

				<div class="form-group col-md-5">
					<label>Sexo</label>
					<select class="browser-default custom-select" id="sexoE" name="sexoE" required>
                        <option value="{{$empleado->sexo}}" selected> {{$empleado->sexo}}</option>
						<option value="Masculino">Masculino</option>
						<option value="Femenino">Femenino</option>
						<option value="Otro">Otro</option>
					</select>
					<span id="msgsexoE" name="msgsexoE" class="AlertaMsg"></span>
				</div>



				<div class="form-group col-md-5">
					<label>Teléfono</label>
					<input type="text" class="form-control" id="idtelefonoE" name="idtelefonoE"
						placeholder="Escribe el teléfono..." maxlength="8" value="{{ $empleado->telefono }}"
						required>
					<span id="msgidtelefonoE" name="msgidtelefonoE" class="AlertaMsg"></span>
				</div>

                <div class="form-group col-md-5">
					<label>Rol</label>
					<select class="browser-default custom-select" id="idrol" name="idrol" required>
                        <option value="{{$rolUsuario->id}}" selected>{{$rolUsuario->nombre}}</option>
						@foreach ($roles as $rol)
						<option value="{{$rol->id}}">{{$rol->nombre}}</option>
						@endforeach
					</select>
					<span id="msgsexoE" name="msgsexoE" class="AlertaMsg"></span>
                </div>

            </div>

                <button type="submit" class="btn btn-primary mb-4">Modificar</button>
                <a href="{{route('Empleados.index')}}"><button type="button" class="btn btn-danger mb-4">Cancelar</button></a>
    
            </form>
    
    
@endsection