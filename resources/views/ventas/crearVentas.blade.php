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
                        <select class="custom-select" name='nombreventa' id="nombreventa" autocomplete="off">
                            <option value="0" disabled selected>Seleccione el cliente</option>
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
									<option value="{{$productoiten->nombre}} ${{$productoiten->precio}}"></option>
									@endforeach
								</datalist>  
							</td>
							<td>
								<input type="number" min="0" id="idcantidad" name="idcantidad[]" class="b form-control" required></td>
							</td>
							<td>
								<button type="button" id="btmVentasTabDel" class="btn btn-danger remove">Eliminar</button>						
							</td>
						</tr>
					</tbody>
					<tfoot>
						<tr>
							<td>
								Total
								<input readonly type="text" class="form-control" id="idtotal" name="idtotal" placeholder="Total">
							</td>
						</tr>
					</tfoot> 
				</table>
			</div>
		</section>
		<button id="btmsubmitV" type="submit" class="btn btn-primary" >Registrar Venta</button> 
		<button type="reset" class="btn btn-danger">Limpiar Campos</button>
	</form>
</div>
@endsection

