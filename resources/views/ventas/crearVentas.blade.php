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
				      <input type="text" class="form-control"  name="idcodventa" id="idcodventa" placeholder="Nº" value="{{ old('idproducto') }}">
              <span id="" name="" class=""></span>
				    </div>
				    
				    <div class="form-group col-md-4">
    				<label class="mb-2">Nombre Cliente</label>
    					<select class="custom-select" name='nombreventa' id="nombreventa" >
						    <option disabled="true">Seleccione el cliente</option>
						    @foreach($cliente as $clienteiten)
						    <option value='{{$clienteiten->cod_cliente}}'>{{$clienteiten->nombre}}</option>
						    @endforeach
						</select>
						<span id="" name="" class=""></span>
    				</div>

				    <div class="form-group col-md-7">
				      <label>Direccion</label>
					  <input type="text" class="form-control" id="iddireccion" name="iddireccion" placeholder="La Campanera, Soyapango, San Salvador" value="{{ old('idnombre') }}">
					  <span id="" name="" class=""></span>
				    </div>
          		

    			
				 </div>

				
				   <!-- 	<div class="form-group col-md-2">
				      <label>Telefono</label>
				      <input type="text" class="form-control" id="idtelefono" name="idtelefono" placeholder="2222-0000" value="{{ old('idpresentacion') }}">
					  <span id="" name="" class=""></span>
					</div> -->
                     <div class="form-row">
					  <div class="form-group col-md-4">
    				<label class="mb-2">Nombre Producto</label>
    					<select class='mi-selector' name='nombreproducto[]' id="nombreproducto" multiple='multiple'>
						    <option disabled="true">Seleccione el producto</option>
						    @foreach($producto as $productoiten)
						    
						    <option value='{{$productoiten->cod_producto}}'>
						    	{{$productoiten->nombre}} ${{$productoiten->precio}}
						    </option>
						    @endforeach
						</select>
						<span id="" name="" class=""></span>
    				</div>

				<!-- 	<div class="form-group col-md-3">
				      <label>Precio Unitario</label>
				      <input type="number" class="form-control" id="idpreciounitario" name="idpreciounitario" placeholder="0.00" value="{{ old('idpresentacion') }}">
					  <span id="" name="" class=""></span>
					</div> -->

					<div class="form-group col-md-3">
				      <label>Cantidad</label>
				      <input type="number" class="form-control" id="idcantidad" name="idcantidad" placeholder="0" value="{{ old('idpresentacion') }}">
					  <span id="" name="" class="AlertaMsg"></span>
					</div>

					<div class="form-group col-md-3">
				    <label>Total</label>
					  <input type="number" class="form-control" id="idtotal" name="idtotal" placeholder="0.00" value="{{ old('iddescripcion') }}"></intput>
					  <span id="" name="" class=""></span>
				  </div>


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

