@extends('layouts.app')

@section('titulo','Registro de Compras')

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
				
        <form method="POST" action="{{route('compras.store')}}">
					@csrf
				  <div class="form-row">
				  	<div class="form-group col-md-3">
				      <label>Nombre Producto</label>
				      <input type="text" class="form-control"  name="idnombreProducto" id="idnombreProducto" placeholder="Nombre del Producto" value="{{ old('idproducto') }}">
              <span id="" name="" class=""></span>
				    </div>
				 

				    <div class="form-group col-md-3">
				      <label>Proveedor</label>
					  <input type="text" class="form-control" id="idproveedor" name="idproveedor" placeholder="Proveedor" value="{{ old('idnombre') }}">
					  <span id="" name="" class=""></span>
				    </div>
          		
                    <div class="form-group col-md-3">
				      <label>Cantidad Solicitada</label>
				      <input type="number" class="form-control" id="idcantidadSolicitada" name="idcantidadSolicitada" placeholder="Cantidad Solicitada" value="{{ old('idpresentacion') }}">
					  <span id="" name="" class="AlertaMsg"></span>
					</div>
                    <div class="form-group col-md-7">
				    <label>Observaciones</label>
					  <textarea type="text" class="form-control" id="idobservaciones" name="idobservaciones" placeholder="Escribe algo..." value="{{ old('iddescripcion') }}"></textarea>
					  <span id="msgiddescripcion" name="msgiddescripcion" class="AlertaMsg"></span>
				  </div>
				 </div>

				
				   <!-- 	<div class="form-group col-md-2">
				      <label>Telefono</label>
				      <input type="text" class="form-control" id="idtelefono" name="idtelefono" placeholder="2222-0000" value="{{ old('idpresentacion') }}">
					  <span id="" name="" class=""></span>
					</div> -->
                   

				<!-- 	<div class="form-group col-md-3">
				      <label>Precio Unitario</label>
				      <input type="number" class="form-control" id="idpreciounitario" name="idpreciounitario" placeholder="0.00" value="{{ old('idpresentacion') }}">
					  <span id="" name="" class=""></span>
					</div> -->

				 </div> 

				 <div class="form-row">
				  
				 </div>
				  <button type="submit" class="btn btn-primary">Registrar Venta</button> 
				  <button type="reset" class="btn btn-danger">Limpiar Campos</button>
				</form>
				<br>




			</body>
		</html>
@endsection

