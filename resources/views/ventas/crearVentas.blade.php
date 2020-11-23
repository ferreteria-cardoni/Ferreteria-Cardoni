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
						<label for="nombreventa">Cliente</label>
                        <select class="custom-select" name='nombreventa' id="nombreventa" autocomplete="off">
                            <option value="0" disabled selected>Seleccione el cliente</option>
                            @foreach($cliente as $clienteiten)
							<option value='{{$clienteiten->cod_cliente}}'>{{$clienteiten->nombre}} {{$clienteiten->apellido}}</option>
                            @endforeach
                        </select>
                        <span id="msgnombreventa" name="msgnombreventa" class="AlertaMsg"></span>
					</div>

					<div class="col-md-6">
						<div class="form-group">
							<label for="iddireccion">Dirección</label>
							<input type="text" class="form-control" id="iddireccion" name="iddireccion" maxlength="100" placeholder="Dirección..." value="{{ old('idnombre') }}">
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
							<th><button type="button" id="btmVentasTab" class="addRow btn btn-success" disabled >Agregar</button></th>

						</tr>
					</thead>
					<tbody>
						<tr>
							<td>
								<input id="nombreproducto" name="nombreproducto[]" list="productos" class="a form-control" autocomplete="off" required>
								<datalist id="productos">
									@foreach ($producto as $productoiten)
									<option value="{{$productoiten->nombre}} ${{$productoiten->precioVenta}}">Disponibilidad: {{$productoiten->cantidad}}</option>
									@endforeach
								</datalist>
							</td>
							<td>
								<input type="number" min="0" id="idcantidad" name="idcantidad[]" class="b form-control" required disabled>
							</td>
							<td>
								<button type="button" id="btmVentasTabDel" class="btn btn-danger remove">Eliminar</button>
							</td>
						</tr>
					</tbody>
					<tfoot>
						<tr>
							<td>
								<label for="idtotal">Total</label>
								<input readonly type="text" class="form-control" id="idtotal" name="idtotal" placeholder="Total">
							</td>
						</tr>
					</tfoot>
				</table>
			</div>
		</section>
		<button id="btmsubmitV" type="submit" class="btn btn-primary" >Registrar Venta</button>
		<a href="{{route('Ventas.create')}}"><button type="button" class="btn btn-danger">Limpiar Campos</button></a>
	</form>
	@foreach ($producto as $productoiten)
			<span class="s" hidden>{{$productoiten->nombre}} ${{$productoiten->cantidad}}</span>
	@endforeach
</div>

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
