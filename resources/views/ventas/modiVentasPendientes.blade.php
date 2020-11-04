@extends('layouts.app')

@section('titulo','Modificando Venta')

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
	<form method="POST" action="{{ route('Ventas.update', $id) }}">
		
		@method('PATCH')
		@csrf
		<section>
			<div class="panel panel-header">
				<div class="row">
					<div class="col-md-6">
                        <select class="custom-select" name='nombreventa' id="nombreventa" autocomplete="off">
                            <option value='{{$codCliente}}' disabled selected>{{$nombreCliente}} {{$apellidoCliente}}</option>
                            @foreach($clientes as $clienteiten)
                                <option value='{{$clienteiten->cod_cliente}}'>{{$clienteiten->nombre}} {{$clienteiten->apellido}}</option>
                            @endforeach
                        </select>
                        <span id="msgnombreventa" name="msgnombreventa" class="AlertaMsg"></span>
					</div>

					<div class="col-md-6">
						<div class="form-group">
                            <input type="text" class="form-control" id="iddireccion" name="iddireccion" placeholder="Dirección..." value='{{$direccion}}'>
                      		<span id="msgiddireccion" name="msgiddireccion" class="AlertaMsg"></span>
						</div>
					</div>
				</div>
			</div>
			<div class="panel panel-footer">
				<table id="Venta" class="table table-border">
					<thead>
						<tr>
							<th>Nombre del producto
							<span id="msgnombreproductoV" name="msgnombreproductoV" class="AlertaMsg"></span>
							</th>
							<th>Cantidad
							<span id="msgidcantidadV" name="msgidcantidadV" class="AlertaMsg"></span>
							</th>
							<th><button type="button" id="btmVentasTab" class="addRow btn btn-success">Agregar</button></th>
							
						</tr>
					</thead>
					<tbody>

                        @foreach ($productosVenta as $productoVenta)
                            <tr>
                                <td>
                                    <input id="nombreproducto" name="nombreproducto[]" list="productos" value='{{App\producto::find($productoVenta->cod_producto_fk)->nombre}} ${{App\producto::find($productoVenta->cod_producto_fk)->precioVenta}}'  class="a form-control" autocomplete="off" required>
                                    <datalist id="productos">
                                       @foreach ($productosIventario as $producto)
                                        <option value="{{$producto->nombre}} ${{$producto->precioVenta}}"></option>
                                       @endforeach
                                    </datalist>
                                </td>

                                <td>
                                    <input type="number" min="0" id="idcantidad" name="idcantidad[]" class="b form-control" required value='{{$productoVenta->cantidad}}'>
									<input type="number" min="0" class="m form-control" value='{{$productoVenta->cantidad}}' hidden>
                                </td>
                                <td>
                                    <button type="button" id="btmVentasTabDel" class="btn btn-danger remove">Eliminar</button>						
                                </td>
                            </tr>
                        @endforeach

						{{-- <tr>
							<td>
								<input id="nombreproducto" name="nombreproducto[]" list="productos" class="a form-control" autocomplete="off" required>
								<datalist id="productos">
									@foreach ($producto as $productoiten)
									<option value="{{$productoiten->nombre}} ${{$productoiten->precioVenta}}"></option>
									@endforeach
								</datalist>  
							</td>
							<td>
								<input type="number" min="0" id="idcantidad" name="idcantidad[]" class="b form-control" required disabled>
								
							</td>
							<td>
								<button type="button" id="btmVentasTabDel" class="btn btn-danger remove">Eliminar</button>						
							</td>
						</tr> --}}
					</tbody>
					<tfoot>
						<tr>
							<td>
								Total
                                <input readonly type="text" class="form-control" id="idtotal" name="idtotal" placeholder="Total" value='${{$total}}'>
							</td>
						</tr>
					</tfoot> 
				</table>
			</div>
		</section>
        <button id="btmsubmitV" type="submit" class="btn btn-primary">Modificar Venta</button>
        <a href="{{route('Pendiente')}}"><button type="button" class="btn btn-danger">Cancelar</button></a> 
		@foreach ($productosIventario as $producto)
			<span class="s" hidden>{{$producto->nombre}} ${{$producto->cantidad}}</span>
    	@endforeach
	</form>
	
</div>

@endsection