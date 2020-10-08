@extends('layouts.app')

@section('titulo','Registro de Ventas')

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
				
        <form method="POST" action="{{route('Ventas.store')}}">
					@csrf
				  <div class="form-row">
				  	<div class="form-group col-md-1">
				      <label>Cod Pedido</label>
				      <input type="text" class="form-control" maxlength="6" minlength="6" name="idproducto" id="idproducto" placeholder="Nº" value="{{ old('idproducto') }}">
              <span id="msgidproducto" name="msgidproducto" class="AlertaMsg"></span>
				    </div>
				    
				    <div class="form-group col-md-4">
				      <label>Nombre Cliente</label>
					  <input type="text" class="form-control" id="idnombre" name="idnombre" placeholder="Juan Perez" value="{{ old('idnombre') }}">
					  <span id="msgidnombre" name="msgidnombre" class="AlertaMsg"></span>
				    </div>

				    <div class="form-group col-md-7">
				      <label>Direccion</label>
					  <input type="text" class="form-control" id="idnombre" name="idnombre" placeholder="La Campanera, Soyapango, San Salvador" value="{{ old('idnombre') }}">
					  <span id="msgidnombre" name="msgidnombre" class="AlertaMsg"></span>
				    </div>
          		

    			
				 </div>

				  <div class="form-row">
				  	<div class="form-group col-md-2">
				      <label>Telefono</label>
				      <input type="text" class="form-control" id="idtelefono" name="idtelefono" placeholder="2222-0000" value="{{ old('idpresentacion') }}">
					  <span id="msgidpresentacion" name="msgidpresentacion" class="AlertaMsg"></span>
					</div>

					<div class="form-group col-md-4">
				      <label>Nombre Producto</label>
				      <input type="text" class="form-control" id="idpresentacion" name="idpresentacion" placeholder="Martillo" value="{{ old('idpresentacion') }}">
					  <span id="msgidpresentacion" name="msgidpresentacion" class="AlertaMsg"></span>
					</div>

					<div class="form-group col-md-3">
				      <label>Precio Unitario</label>
				      <input type="number" class="form-control" id="idpresentacion" name="idpresentacion" placeholder="0.00" value="{{ old('idpresentacion') }}">
					  <span id="msgidpresentacion" name="msgidpresentacion" class="AlertaMsg"></span>
					</div>

					<div class="form-group col-md-3">
				      <label>Cantidad</label>
				      <input type="number" class="form-control" id="idpresentacion" name="idpresentacion" placeholder="0" value="{{ old('idpresentacion') }}">
					  <span id="msgidpresentacion" name="msgidpresentacion" class="AlertaMsg"></span>
					</div>
				 </div> 
				 <div class="form-row">
				  <div class="form-group col-md-3">
				    <label>Total</label>
					  <input type="number" class="form-control" id="iddescripcion" name="iddescripcion" placeholder="0.00" value="{{ old('iddescripcion') }}"></intput>
					  <span id="msgiddescripcion" name="msgiddescripcion" class="AlertaMsg"></span>
				  </div>
				 </div>
				  <button type="submit" class="btn btn-primary">Registrar Venta</button> 
				  <button type="reset" class="btn btn-danger">Limpiar Campos</button>
				</form>
			</body>
		</html>
@endsection


