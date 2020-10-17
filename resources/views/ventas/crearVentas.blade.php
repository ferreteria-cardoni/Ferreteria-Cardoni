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
				
				</form>


			


        <form method="POST" action="{{route('Ventas.store')}}">
					@csrf

				  <div class="form-row">
				  	<div class="form-group col-md-2">
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
						<span id="msgnombreventa" name="msgnombreventa" class="AlertaMsg"></span>
    				</div>

				    <div class="form-group col-md-6">
				      <label>Direccion</label>
					  <input type="text" class="form-control" id="iddireccion" name="iddireccion" placeholder="La Campanera, Soyapango, San Salvador" value="{{ old('idnombre') }}">
					  <span id="msgiddireccion" name="msgiddireccion" class="AlertaMsg"></span>
				    </div>
          		

    			
				 </div>

				
				   <!-- 	<div class="form-group col-md-2">
				      <label>Telefono</label>
				      <input type="text" class="form-control" id="idtelefono" name="idtelefono" placeholder="2222-0000" value="{{ old('idpresentacion') }}">
					  <span id="" name="" class=""></span>
					</div> -->
					
                     <div class="form-row">
					  <div class="form-group col-md-3">
    				<label class="mb-2">Nombre Producto</label>
    					<select class='mi-selector'  name='nombreproducto[]' id="nombreproducto" >
						    <option disabled="true">Seleccione el producto</option>
						    @foreach($producto as $productoiten)
						    
						    <option value='{{$productoiten->cod_producto}}'>
						    	{{$productoiten->nombre}} ${{$productoiten->precio}}
						    </option>
						    @endforeach
						</select>
						<span id="msgnombreproducto" name="msgnombreproducto" class="AlertaMsg"></span>
    				</div>


    					 <div class="form-group col-md-2">
    				<label class="mb-2">Cantidad</label>
    					<select class="mi-selector" name='idcantidad1[]' id="idcantidad1" multiple>
						    <option disabled="true">Seleccione la cantidad</option>
						    <option value='1'>1 Unidad</option>
						   <option value='2'>2 Unidades</option>
						   <option value='3'>3 Unidades</option>
						   <option value='4'>4 Unidades</option>
						   <option value='5'>5 Unidades</option>
						</select>
						<span id="" name="" class=""></span>
    				</div>

    				<div class="form-group col-md-3">
				    <label>Total</label>
					  <input type="number" class="form-control" id="idtotal" name="idtotal" placeholder="0.00" value="{{ old('iddescripcion') }}"></intput>
					  <span id="" name="" class=""></span>
				  </div>
					</div>


				

					

					 <div class="form-row">
					<!--<div class="form-group col-md-3">
				      <label class="mb-2">Cantidad</label>
				      <input type="number" class="form-control" id="idcantidad" name="idcantidad" placeholder="0" value="{{ old('idpresentacion') }}">
					  <span id="" name="" class="AlertaMsg"></span>
					</div> -->

					


				 </div> 






				 <div class="form-row">
				  
				 </div>
				  <button type="submit" class="btn btn-primary">Registrar Venta</button> 
				  <button type="reset" class="btn btn-danger">Limpiar Campos</button>
				  
				
				
				<br><br><br>

	  <button href="{{route('Ventas.update', 'asd')}}" type="submit" class="btn btn-primary" >  
  Agregar Productos
</button>


			</body>
		</html>
@endsection


@section('listado')
<div class="container">
      @if (session('nombre'))
<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Producto</th>
      <th scope="col">Cantidad</th>
      <th scope="col">Precio</th>
    </tr>
  </thead>
  <tbody>

  	@foreach(session('nombre') as $key)
    <tr>
      <th scope="row">1</th>
      <td> {{$key}}</td>
      <td>{{session('cantidad')}}</td>
      <td>@mdo</td>
    </tr>
     @endforeach
  </tbody>
</table>
@endif
@endsection

