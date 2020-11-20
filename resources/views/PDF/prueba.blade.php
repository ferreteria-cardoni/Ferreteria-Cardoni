<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tabla de Productos</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
</head>
<body>
    <div class="container">
    <table class="table">
  <thead class="thead-dark">
  <tr>
      <th scope="col">Codigo</th>
      <th scope="col">Producto</th>
      <th scope="col">Stock</th>
      <th scope="col">Precio Compra</th>
      <th scope="col">Precio Venta</th>
    </tr>
  </thead>
  <tbody>
      @foreach($productos as $producto)
    <tr>
      <th scope="row">{{$producto->cod_producto}}</th>
      <td>{{$producto->nombre}}</td>
      <td>{{$producto->cantidad}}</td>
      <td>${{$producto->precioCompra}}</td>
      <td>${{$producto->precioVenta}}</td>
    </tr>
    @endforeach
  </tbody>
</table>
    
    </div>
</body>
</html>