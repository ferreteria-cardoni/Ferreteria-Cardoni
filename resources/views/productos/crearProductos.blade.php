@extends('layouts.app')

@section('content')
	<!DOCTYPE html>
		<html>
			<head>
				<title></title>
			</head>

			<body>
				<center><h3>Registro de Productos</h3></center><br>
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
				    <div class="form-group col-md-6">
				      <label>Nombre</label>
					  <input type="text" class="form-control" id="idnombre" name="idnombre" placeholder="Martillo" value="{{ old('idnombre') }}">
					  <span id="msgidnombre" name="msgidnombre" class="AlertaMsg"></span>
				    </div>
				    <div class="form-group col-md-6">
				      <label>Marca</label>
					  <input type="text" class="form-control" id="idmarca" name="idmarca" placeholder="DeWalt" value="{{ old('idmarca') }}">
					  <span id="msgidmarca" name="msgidmarca" class="AlertaMsg"></span>
				    </div>
				  </div>
				  <div class="form-group">
				    <label>Descripción</label>
					<textarea type="text" class="form-control" id="iddescripcion" name="iddescripcion" placeholder="Martillo doble con mango de goma" value="{{ old('iddescripcion') }}"></textarea>
					<span id="msgiddescripcion" name="msgiddescripcion" class="AlertaMsg"></span>
				  </div>

				  <div class="form-row">

				  	<div class="form-group col-md-6">
				      <label>Presentación</label>
				      <input type="textarea" class="form-control" id="idpresentacion" name="idpresentacion" placeholder="Martillo de Acero" value="{{ old('idpresentacion') }}">
					  <span id="msgidpresentacion" name="msgidpresentacion" class="AlertaMsg"></span>
					</div>
				    

				    <div class="form-group col-md-2">
				      <label>Cantidad</label>
					  <input type="number" min="0" class="form-control" id="idcantidad" name="idcantidad" placeholder="1,2,3..." value="{{ old('idcantidad') }}">
					  <span id="msgidcantidad" name="msgidcantidad" class="AlertaMsg"></span>
				    </div>

				    <div class="form-group col-md-2">
				      <label>Precio</label>
					  <input type="number" step="0.01" min="0.01" class="form-control" id="idprecio" name="idprecio" placeholder="$" value="{{ old('idprecio') }}">
					  <span id="msgidprecio" name="msgidprecio" class="AlertaMsg"></span>
				    </div>

				     <div class="form-group col-md-2">
      					<label>Proveedor</label>
      						<select id="idproveedor" name="idproveedor" class="form-control" value="{{ old('idproveedor') }}">
	        					<option value="" selected>No seleccionado</option>
	        					<option value="Freund">Freund</option>
	        					<option value="Vidri">Vidri</option>
	        					<option value="EPA">EPA</option>
	        					<option value="Casa de la Herramienta">Casa de la Herramienta</option>
							 </select>
							 <span id="msgidproveedor" name="msgidproveedor" class="AlertaMsg"></span>
    				</div>
				  </div><br>

				  <button type="submit" class="btn btn-primary">Registrar Producto</button>
				</form>
			</body>
		</html>
@endsection