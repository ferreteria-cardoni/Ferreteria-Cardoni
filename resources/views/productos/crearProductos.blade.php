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
				    <div class="form-group col-md-6">
				      <label>Nombre</label>
				      <input type="text" class="form-control" id="idnombre" placeholder="Martillo">
				    </div>
				    <div class="form-group col-md-6">
				      <label>Marca</label>
				      <input type="text" class="form-control" id="idmarca" placeholder="DeWalt">
				    </div>
				  </div>
				  <div class="form-group">
				    <label>Descripción</label>
				    <textarea type="text" class="form-control" id="iddescripcion" placeholder="Martillo doble con mango de goma"></textarea>
				  </div>

				  <div class="form-row">

				  	<div class="form-group col-md-6">
				      <label>Presentación</label>
				      <input type="textarea" class="form-control" id="idpresentacion" placeholder="Martillo de Acero">
				    </div>
				    

				    <div class="form-group col-md-2">
				      <label>Cantidad</label>
				      <input type="text" class="form-control" id="idcantidad" placeholder="1,2,3...">
				    </div>

				    <div class="form-group col-md-2">
				      <label>Precio</label>
				      <input type="text" class="form-control" id="idprecio" placeholder="$">
				    </div>

				     <div class="form-group col-md-2">
      					<label>Proveedor</label>
      						<select id="idproveedor" class="form-control">
	        					<option selected>No seleccionado</option>
	        					<option>Freund</option>
	        					<option>Vidri</option>
	        					<option>EPA</option>
	        					<option>Casa de la Herramienta</option>
     						</select>
    				</div>
				  </div><br>

				  <button type="submit" class="btn btn-primary">Registrar Producto</button>
				</form>
			</body>
		</html>
@endsection