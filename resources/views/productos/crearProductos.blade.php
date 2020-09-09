@extends('layouts.app')

@section('content')
	<!DOCTYPE html>
		<html>
			<head>
				<title></title>
			</head>

			<body>
				<center><h3>Registro de Productos</h3></center><br>
				<form method="POST" action="{{route('Productos.store')}}">
					@csrf

				  <div class="form-row">
				  	<div class="form-group col-md-1">
				      <label>ID</label>
				      <input type="text" class="form-control" name="idproducto" placeholder="Nº">
				    </div>
				    <div class="form-group col-md-6">
				      <label>Nombre</label>
				      <input type="text" class="form-control" name="idnombre" placeholder="Martillo">
				    </div>
				   
				      <div class="form-group col-md-5">
      					<label>Proveedor</label>
      						<select name="idmarca" class="form-control">
	        					<option selected>No seleccionado</option>
	        					@foreach($marca as $marcaiten)
	        					<option value="{{$marcaiten->nombre_marca}}">{{$marcaiten->nombre_marca}}</option>
	        					@endforeach
     						</select>
    				</div>

			

				  </div>
				  <div class="form-group">
				    <label>Descripción</label>
				    <textarea type="text" class="form-control" name="iddescripcion" placeholder="Martillo doble con mango de goma"></textarea>
				  </div>

				  <div class="form-row">

				  	<div class="form-group col-md-6">
				      <label>Presentación</label>
				      <input type="textarea" class="form-control" name="idpresentacion" placeholder="Martillo de Acero">
				    </div>
				    

				    <div class="form-group col-md-2">
				      <label>Cantidad</label>
				      <input type="text" class="form-control" name="idcantidad" placeholder="1,2,3...">
				    </div>

				    <div class="form-group col-md-2">
				      <label>Precio</label>
				      <input type="text" class="form-control" name="idprecio" placeholder="$">
				    </div>

				     <div class="form-group col-md-2">
      					<label>Proveedor</label>
      						<select name="idproveedor" class="form-control">
	        					<option selected>No seleccionado</option>
	        					@foreach($proveedor as $pro)
	        					<option value="{{$pro->cod_proveedor}}">{{$pro->nombre}}</option>
	        					@endforeach
     						</select>
    				</div>
				  </div><br>

				  <button type="submit" class="btn btn-primary">Registrar Producto</button>
				</form>
			</body>
		</html>
@endsection