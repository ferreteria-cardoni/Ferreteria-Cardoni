@extends('layouts.app')

@section('titulo','Modificar Producto')

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
				
		<form method="POST" action="{{route('Productos.update', $producto->cod_producto)}}">
					@method('PUT')
					@csrf
				  <div class="form-row">
				  	<div class="form-group col-md-1">
				      <label>ID</label>
				      <input type="text" disabled="true" class="form-control" maxlength="6" minlength="6" name="idproducto" id="idproducto" placeholder="Nº" value="{{$producto->cod_producto}}">
              <span id="msgidproducto" name="msgidproducto" class="AlertaMsg"></span>
				    </div>
				    
				    <div class="form-group col-md-6">
				      <label>Nombre</label>
					  <input type="text" class="form-control" id="idnombre" name="idnombre" placeholder="Escribe algo..." value="{{$producto->nombre}}">
					  <span id="msgidnombre" name="msgidnombre" class="AlertaMsg"></span>
				    </div>

          		 <div class="form-group col-md-5">
      					<label>Proveedor</label>
      						<select name="idproveedor" id="idproveedor" class="custom-select">
	        					<option value="" selected disabled>No seleccionado</option>
								@foreach($proveedores as $pro)
								<option 
									@if ($producto->proveedores->cod_proveedor == $pro->cod_proveedor )
										selected
									@endif
							  		value="{{$pro->cod_proveedor}}"
								>{{$pro->nombre}}</option>
	        					@endforeach
     						</select>
               				 <span id="msgidproveedor" name="msgidproveedor" class="AlertaMsg"></span>
    			</div>

    			
				 </div>

				  <div class="form-row">
				  	<div class="form-group col-md-6">
				      <label>Presentación</label>
				      <input type="textarea" class="form-control" id="idpresentacion" name="idpresentacion" placeholder="Escribe algo..." value="{{$producto->presentacion}}">
					  <span id="msgidpresentacion" name="msgidpresentacion" class="AlertaMsg"></span>
					</div>

					<center>{{$productos->nombre_marca}}</center>
				    <div class="form-group col-md-2">
						<label class="mb-2">Marca</label>
							<select class='mi-selector' name='idmarca[]' id="idmarca" multiple='multiple'>
								<option disabled="true">Seleccione la marca</option>
								{{-- Recorriendo las marcas desde la tabla marcas --}}
								@foreach($marcas as $marcaiten)
									
								<option
								{{-- Recorriendo las marcas que estan relacionadas con el producto --}}
									@foreach ($producto->marcas as $marcaProducto)
										@if ($marcaProducto->nombre_marca == $marcaiten->nombre_marca)
											selected
										@endif
									@endforeach
									value="{{$marcaiten->cod_marca}}"
								>{{$marcaiten->nombre_marca}}</option>
								@endforeach
							</select>
							<span id="msgidmarca" name="msgidmarca" class="AlertaMsg"></span>
					</div>
					
<!-- 					<div class="form-group col-md-2">
						<label>Stock</label>
						<input type="number" min="0"  class="form-control" id="idcantidad" name="idcantidad" placeholder="0" value="{{$producto->cantidad}}">
						<span id="msgidcantidad" name="msgidcantidad" class="AlertaMsg"></span>
					</div>

					<div class="form-group col-md-2">
						<label>Precio</label>
						<input type="number" step="any" class="form-control" id="idprecio" name="idprecio" min="0" placeholder="0.0" value="{{$producto->precio}}">
						<span id="msgidprecio" name="msgidprecio" class="AlertaMsg"></span>
					</div> -->

				 </div> <br>
				  <div class="form-group">
				    <label>Descripción</label>
					  <textarea type="text" class="form-control" id="iddescripcion" name="iddescripcion" placeholder="Escribe algo..." value="{{$producto->descripcion}}">{{$producto->descripcion}}</textarea>
					  <span id="msgiddescripcion" name="msgiddescripcion" class="AlertaMsg"></span>
				  </div>
				  <button type="submit" class="btn btn-primary">Modificar Producto</button> 
				  <button type="reset" class="btn btn-danger">Limpiar Campos</button>
				</form>
			</body>
		</html>
@endsection



