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
				  	<div class="form-group col-md-1">
				      <label>ID</label>
				      <input type="text" class="form-control" maxlength="6" minlength="6" name="idproducto" id="idproducto" placeholder="Nº" value="{{ old('idnombre') }}">
              <span id="msgidproducto" name="msgidproducto" class="AlertaMsg"></span>
				    </div>
				    
				    <div class="form-group col-md-6">
				      <label>Nombre</label>
					  <input type="text" class="form-control" id="idnombre" name="idnombre" placeholder="Martillo" value="{{ old('idnombre') }}">
					  <span id="msgidnombre" name="msgidnombre" class="AlertaMsg"></span>
				    </div>
            
				      <div class="form-group col-md-5">
      					<label>Marca</label>
      						<select name="idmarca" id="idmarca" class="form-control">
	        					<option selected>No seleccionado</option>
	        					@foreach($marca as $marcaiten)
	        					<option value="{{$marcaiten->nombre_marca}}">{{$marcaiten->nombre_marca}}</option>
	        					@endforeach
     						</select>
                <span id="msgidmarca" name="msgidmarca" class="AlertaMsg"></span>
    				</div>
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
      						<select name="idproveedor" id="idproveedor" class="form-control">
	        					<option selected>No seleccionado</option>
	        					@foreach($proveedor as $pro)
	        					<option value="{{$pro->cod_proveedor}}">{{$pro->nombre}}</option>
	        					@endforeach
     						</select>
                <span id="msgidproveedor" name="msgidproveedor" class="AlertaMsg"></span>
    				</div>
				  </div><br>
				  <div class="form-group">
				    <label>Descripción</label>
					  <textarea type="text" class="form-control" id="iddescripcion" name="iddescripcion" placeholder="Martillo doble con mango de goma" value="{{ old('iddescripcion') }}"></textarea>
					  <span id="msgiddescripcion" name="msgiddescripcion" class="AlertaMsg"></span>
				  </div>
				  <button type="submit" class="btn btn-primary">Registrar Producto</button>
				</form>
			</body>
		</html>
@endsection