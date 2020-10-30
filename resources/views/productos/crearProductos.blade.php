@extends('layouts.app')

@section('titulo','Registro de Productos')

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
				      <input autocomplete="off" type="text" class="form-control" maxlength="6" minlength="6" name="idproducto" id="idproducto" placeholder="Nº" value="{{ old('idproducto') }}">
              <span id="msgidproducto" name="msgidproducto" class="AlertaMsg"></span>
				    </div>
				    
				    <div class="form-group col-md-6">
				      <label>Nombre</label>
					  <input autocomplete="off" type="text" class="form-control" id="idnombre" name="idnombre" placeholder="Escribe el nombre..." value="{{ old('idnombre') }}">
					  <span id="msgidnombre" name="msgidnombre" class="AlertaMsg"></span>
				    </div>

          		 <div class="form-group col-md-5">
      					<label>Proveedor</label>
      						<select name="idproveedor" id="idproveedor" class="custom-select">
	        					<option value="" selected>No seleccionado</option>
	        					@foreach($proveedor as $pro)
	        					<option value="{{$pro->cod_proveedor}}">{{$pro->nombre}}</option>
	        					@endforeach
     						</select>
               				<span id="msgidproveedor" name="msgidproveedor" class="AlertaMsg"></span>
    			</div>

    			
				 </div>

				  <div class="form-row">
				  	<div class="form-group col-md-6">
				      <label>Presentación</label>
				      <input autocomplete="off" type="textarea" class="form-control" id="idpresentacion" name="idpresentacion" placeholder="Escribe algo..." value="{{ old('idpresentacion') }}">
					  <span id="msgidpresentacion" name="msgidpresentacion" class="AlertaMsg"></span>
					</div>


				    <div class="form-group col-md-2">
    				<label class="mb-2">Marca</label>
    					<select class='mi-selector' name='idmarca[]' id="idmarca" multiple='multiple'>
						    <option disabled="true">Seleccione la marca</option>
						    @foreach($marca as $marcaiten)
						    <option value='{{$marcaiten->cod_marca}}'>{{$marcaiten->nombre_marca}}</option>
						    @endforeach
						</select>
						<span id="msgidmarca" name="msgidmarca" class="AlertaMsg"></span>
    				</div>

				 </div> <br>
				  <div class="form-group">
				    <label>Descripción</label>
					  <textarea type="text" class="form-control" id="iddescripcion" name="iddescripcion" placeholder="Escribe algo..." value="{{ old('iddescripcion') }}"></textarea>
					  <span id="msgiddescripcion" name="msgiddescripcion" class="AlertaMsg"></span>
				  </div>
				  <button type="submit" class="btn btn-primary">Registrar Producto</button> 
				  <button type="reset" class="btn btn-danger">Limpiar Campos</button>
				</form>
@endsection



