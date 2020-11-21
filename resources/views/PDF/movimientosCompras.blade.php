<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <title>Movimientos Compras</title>
    <style>
        @page {
            margin: 0cm 0cm;
            font-family: Arial;
        }

        body {
            margin: 3cm 2cm 2cm;
        }

        header {
            position: fixed;
            top: 0cm;
            left: 0cm;
            right: 0cm;
            height: 2cm;
            background-color: #8d93ab;
            color: white;
            text-align: center;
            line-height: 30px;
        }
    </style>
</head>
<body>
    <header>
        <h1>Ferretería Cardoni</h1>
    </header>
    <div class="container">

        @if ($existe == "no")
            <h3>NO SE ENCONTRARON REGISTROS EN LAS FECHAS ESPECIFICADAS</h3>

                
        @else
            @foreach ($comprasRecibidas as $compra)
                <table class="table table-hover table-dark">
                    <thead>
                        <tr>
                            <th colspan="7" style="text-align: center">Código de la compra: {{$compra->cod_compra}}</th>
                        </tr>
                        <tr>
                            <th scope="col">Código</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Cantidad comprada</th>
                            <th scope="col">Proveedor</th>
                            <th scope="col">Precio compra</th>
                            <th scope="col">Fecha de recibido</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pedidosCompras as $pedido)
                            @if ($pedido->cod_compra_fk == $compra->cod_compra)
                                <tr>
                                    <th scope="row">{{$pedido->cod_producto_fk}}</th>
                                    <td>{{App\producto::find($pedido->cod_producto_fk)->nombre}}</td>
                                    <td>{{$pedido->cantidad}}</td>
                                    <td>{{App\proveedor::find($compra->cod_proveedor_fk)->nombre}}</td>
                                    <td>${{$pedido->preciocompra}}</td>
                                    <td>{{\Carbon\Carbon::parse($compra->updated_at)->format('d/m/Y')}}</td>
                                </tr>
                            @endif
                        @endforeach  
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="7" style="text-align: right"><strong>Total:</strong> ${{$compra->total}}</td>
                        </tr>
                    </tfoot>
                </table>
            @endforeach   
        @endif
    </div>
</body>
</html>