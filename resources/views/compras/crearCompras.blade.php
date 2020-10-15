@extends('layouts.app')

@section('titulo','Registro de Compras')

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
		<form method="POST" action="{{ route('compras.store') }}" id="formulario">
			@csrf
			<section>
				<div class="panel panel-header">
					<div class="row">
						<div class="col-md-6 mb-4">
							<select name="idproveedor" id="idproveedor" class="custom-select selectproveedor">
								<option selected disabled>Seleccione un proveedor</option>
								@foreach($proveedor as $pro)
								<option value="{{$pro->cod_proveedor}}">{{$pro->nombre}}</option>
								@endforeach
							</select>
							<span id="msgidproveedor" name="msgidproveedor" class="AlertaMsg"></span>
						</div>
					</div>
				</div>
				<div class="panel panel-footer">
					<table class="table table-border" id="tabla">
						<thead>
							<tr>
								<th>Nombre del producto</th>
								<th>Cantidad</th>
								{{-- <th><a href="#" class="addRow btn btn-success">Agregar</a></th> --}}
								<td><button type="button" disabled class="addRow btn btn-success">Agregar</button></td>
							</tr>
						</thead>
						<tbody id="tbody">
							<tr>
								<td>
									<select class='form-control' disabled name='nombreproducto[]' id="nombreproducto">
										<option disabled selected>Seleccione el producto</option>
									</select>
									<span id="msgnombreproducto" name="msgnombreproducto" class="AlertaMsg"></span>
								</td>

								<td><input type="number" min="0" disabled name="idcantidad[]" id="idcantidad" class="form-control"></td>
								{{-- <td><a href="#" class="btn btn-danger remove">Eliminar</a></td> --}}
								<td><button type="button" id="btnEliminar" disabled class="btn btn-danger remove">Eliminar</button></td>
							</tr>
						</tbody>
						<tfoot>
							<tr>
								<td>
									<textarea type="text" disabled class="form-control" id="iddescripcion" name="iddescripcion"
										placeholder="Escribe algo..." value="{{ old('iddescripcion') }}"></textarea>
									<span id="msgiddescripcion" name="msgiddescripcion" class="AlertaMsg"></span>
								</td>

								{{-- <td><input readonly type="number" class="form-control" placeholder="Total"></td> --}}

							</tr>
						</tfoot>
					</table>
				</div>
			</section>
			<button type="submit" class="btn btn-primary">Registrar Compra</button>
			<a href="{{route('compras.create')}}"><button type="button" id="btnLimpiar" class="btn btn-danger">Limpiar Campos</button></a>
		</form>
	</div>

@endsection


