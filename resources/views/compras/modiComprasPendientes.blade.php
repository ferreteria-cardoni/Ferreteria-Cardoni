@extends('layouts.app')

@section('titulo','Modificando Compra')

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
	<form method="POST" action="{{ route('compras.update', $id) }}">
		
		@method('PATCH')
		@csrf
		<section>
			<div class="panel panel-header">
				<div class="row">
				<div class="col-md-6 mb-4">
							<label for="idproveedor">Proveedor</label>
							<select name="idproveedor" id="idproveedor" class="custom-select selectproveedor" disabled>
							<option value='{{$codProveedor}}'  selected>{{$nombreproveedor}}</option>
								@foreach($proveedores as $pro)
								<option value="{{$pro->cod_proveedor}}">{{$pro->nombre}}</option>
								@endforeach
							</select>
							<span id="msgidproveedor" name="msgidproveedor" class="AlertaMsg"></span>
						</div>
				</div>
			</div>
			<div class="panel panel-footer">

				@foreach ($productoscompra as $productoCompra)
					<datalist id="productos">
						@foreach ($productosIventario as $producto)
						<option value="{{$producto->nombre}}"></option>
						@endforeach
					</datalist>
				@endforeach


				<table id="Compra" class="table table-border">
						<thead>
							<tr>
								<th>Nombre del producto
								<span id="msgnombreproducto" name="msgnombreproducto" class="AlertaMsg"></span>
								</th>
								<th>Cantidad
								<span id="msgidcantidad" name="msgidcantidad" class="AlertaMsg"></span>
								</th>
								<th>Precio Compra
								<span id="msgidprecioC" name="msgidprecioC" class="AlertaMsg"></span>
								</th>
								{{-- <th><a href="#" class="addRow btn btn-success">Agregar</a></th> --}}
								<td><button type="button" id="btmComprasTab" class="addRow btn btn-success">Agregar</button></td>
							</tr>
						</thead>
						<tbody id="tbody">
						@foreach ($productoscompra as $productoCompra)
							<tr>
								<td>
									<input id="nombreproducto"  name="nombreproducto[]" list="productos" value='{{App\producto::find($productoCompra->cod_producto_fk)->nombre}}' class="a form-control" autocomplete="off" required>
								</td>

								<td>
									<input type="number" min="0"  name="idcantidad[]" id="idcantidad" value='{{$productoCompra->cantidad}}'class="b form-control" required>
								</td>
								<td>
									<input type="number" min="0" step="any" name="idprecioC[]" value='{{$productoCompra->preciocompra}}' class="c form-control" required>
								</td>
								
								<!-- {{-- <td><a href="#" class="btn btn-danger remove">Eliminar</a></td> --}} -->
								<td><button type="button" id="btnEliminar" class="btn btn-danger remove">Eliminar</button></td>
							</tr>
						@endforeach
						</tbody>
					<tfoot>

						<tr>
							<td>
								<label for="iddescripcion" >Descripción</label>
								<textarea type="text" class="form-control" id="iddescripcion" name="iddescripcion"
									placeholder="Descripción..." >{{App\compra::find($productoCompra->cod_compra_fk)->descripcion }}</textarea>
								<span id="msgiddescripcion" name="msgiddescripcion" class="AlertaMsg"></span>
							</td>
						</tr>

						<tr>
							<td>
								<label for="totalc" >Total</label>
                                <input readonly type="text" class="form-control" id="totalc" name="totalc" placeholder="Total" value='${{$total}}'>
							</td>
						</tr>
					</tfoot> 
				</table>
			</div>
		</section>
        <button id="btmsubmitC" type="submit" class="btn btn-primary">Modificar Compra</button>
        <a href="{{route('PendienteC')}}"><button type="button" class="btn btn-danger">Cancelar</button></a> 
		@foreach ($productosIventario as $producto)
			<span class="s" hidden>{{$producto->nombre}} ${{$producto->cantidad}}</span>
    	@endforeach
	</form>
	
</div>

@endsection