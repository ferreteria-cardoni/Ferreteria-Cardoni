@extends('layouts.app')

@section('titulo','Registro de Ventas')

@section('alert')
<div class="container">
      @if (session('datos'))
  <div class="alert alert-success alert-dismissible fade show" role="alert" align="center">
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
	<center>
		<h5>Hay errores en en formulario, favor revisar</H2>
	</center>
	<ul>
		@foreach ($errors->all() as $error)
		<li>{{ $error }}</li>
		@endforeach
	</ul>
</div>
@endif
<div class="container">
	<form method="POST" action="{{ route('Ventas.store') }}">
		@csrf
		<section>
			<div class="panel panel-header">
				<div class="row">
					<div class="col-md-6">
                        <select class="custom-select" name='nombreventa' id="nombreventa" >
                            <option disabled selected>Seleccione el cliente</option>
                            @foreach($cliente as $clienteiten)
                            <option value='{{$clienteiten->cod_cliente}}'>{{$clienteiten->nombre}}</option>
                            @endforeach
                        </select>
                        <span id="msgnombreventa" name="msgnombreventa" class="AlertaMsg"></span>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<input type="text" class="form-control" id="iddireccion" name="iddireccion" placeholder="Dirección..." value="{{ old('idnombre') }}">
                      		<span id="msgiddireccion" name="msgiddireccion" class="AlertaMsg"></span>
						</div>
					</div>
				</div>
			</div>
			<div class="panel panel-footer">
				<table class="table table-border">
					<thead>
						<tr>
							<th>Nombre del producto</th>
							<th>Cantidad</th>
							<th><a href="#" class="addRow btn btn-success">Agregar</a></th>
						</tr>
					</thead>
					<tbody>
						<tr>
							<td><select class='form-control' name='nombreproducto[]' id="nombreproducto" >
								<option disabled selected>Seleccione el producto</option>
								@foreach($producto as $productoiten)
								<option value='{{$productoiten->cod_producto}}'>
								{{$productoiten->nombre}} ${{$productoiten->precio}}
								</option>
								@endforeach
								</select>
								<span id="msgnombreproducto" name="msgnombreproducto" class="AlertaMsg"></span>
							</td>
							
							<td><input type="number" min="0" name="idcantidad[]" class="form-control"></td>
							<td><a href="#" class="btn btn-danger remove">Eliminar</a></td>
						</tr>
					</tbody>
					<tfoot>
						<tr>
							<td><input readonly type="number" class="form-control" placeholder="Total"></td>
						</tr>
					</tfoot>
				</table>
			</div>
		</section>
		<button type="submit" class="btn btn-primary">Registrar Venta</button> 
		<button type="reset" class="btn btn-danger">Limpiar Campos</button>
	</form>
</div>
@endsection

