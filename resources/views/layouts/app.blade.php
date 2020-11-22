<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Ferreteria Cardoni</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{asset('https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js')}}"></script>
    <script src="{{asset('dist/js/adminlte.js')}}"></script>



    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{asset('plugins/fontawesome-free/css/all.min.css')}}">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('dist/css/adminlte.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">


    <!--- Prueba -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/css/select2.min.css" rel="stylesheet" />

    <script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.6-rc.0/js/select2.min.js"></script>


    </script>

    {{-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7/jquery.min.js"></script> --}}

    <style>
        .AlertaMsg {
            font-weight: bold;
            color: red;
            font-size: 12px;
            /* visibility: hidden; */
            display: none;
        }

        #menu {
            float: left;
            position: relative;
            left: 35%;
        }


    </style>
</head>




<body class="hold-transition sidebar-mini layout-fixed">
    <div id="app">
        <div class="wrapper">

            <!-- Navbar -->
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <!-- Left navbar links -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" data-widget="pushmenu" href="#"><i class="fas fa-bars"></i></a>
                    </li>
                </ul>

                <ul id="menu" class="navbar-nav">
                    <li class="nav-item">
                        <h2>@yield('titulo','Titulo')</h2>
                    </li>
                </ul>





                <!-- SEARCH FORM -->
                <!-- <form class="form-inline ml-3">
                    <div class="input-group input-group-sm">
                        <input class="form-control form-control-navbar" type="search" placeholder="Search"
                            aria-label="Search">
                        <div class="input-group-append">
                            <button class="btn btn-navbar" type="submit">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </form> -->

                <!-- Right navbar links -->

            </nav>
            <!-- /.navbar -->

            <!-- Main Sidebar Container -->
            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <!-- Brand Logo -->

                <a href="{{ url('/') }}" class="brand-link">
                    <img src="{{asset('dist/img/logoFFF.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
                    <span class="brand-text font-weight-light">Ferreteria Cardoni</span>
                </a>

                <!-- Sidebar -->
                <div class="sidebar">
                    <!-- Sidebar user panel (optional) -->
                    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                        <div class="image">
                            <img src="{{asset('dist/img/avatar5.png')}}" class="img-circle elevation-2" alt="User Image">
                        </div>
                        <div class="info">
                            <a href="#" class="d-block">
                                @guest
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Iniciar Sesión') }}</a>
                                @else
                                {{ Auth::user()->name }}
                                <a class="dropdown-item active rounded" style="color: white;" href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                    Cerrar Sesión
                                </a>
                                <br>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>

                                @endguest
                            </a>
                        </div>
                    </div>

                    <!-- Sidebar Menu -->
                    <nav class="mt-2">
                        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

                            <li class="nav-item">
                                <a href="/" class="{{ Request::path() === '/' ? 'nav-link active' : 'nav-link' }}">
                                    <i class="nav-icon fas fa-home"></i>
                                    <p>Inicio</p>
                                </a>
                            </li>
                            {{-- Usuarios --}}
                            @canany(['administrador'])
                            <li class="nav-item">
                                <a href="usuarios" class="{{ Request::path() === 'usuarios' ? 'nav-link active' : 'nav-link' }}">
                                    <i class="nav-icon fas fa-users"></i>
                                    <p>
                                        Usuarios
                                        <?php $users_count = DB::table('users')->count(); ?>
                                        <span class="right badge badge-danger">{{ $users_count ?? '0' }}</span>
                                    </p>
                                </a>
                            </li>
                            @endcanany

                            {{-- Productos --}}

                            <li class="nav-item has-treeview">
                                @canany(['gerente', 'ventas', 'bodega'])
                                <a href="#" class="nav-link">
                                    <i class="nav-icon far fa-sticky-note"></i>
                                    <p>Productos<i class="fas fa-angle-left right"></i></p>
                                </a>
                                @endcanany
                                <ul class="nav nav-treeview">
                                    @canany(['bodega'])
                                    <li class="nav-item">
                                        <a href="{{route('Productos.create')}}" class="{{ Request::path() === '/' ? 'nav-link active' : 'nav-link' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Crear</p>
                                        </a>
                                    </li>
                                    @endcanany

                                    @canany(['gerente', 'ventas', 'bodega'])
                                    <li class="nav-item">
                                        <a href="/Productos" class="{{ Request::path() === 'notas/favoritas' ? 'nav-link active' : 'nav-link' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Ver</p>
                                        </a>
                                    </li>
                                    @endcanany




                                    {{-- @canany(['bodega'])

                                    <li class="nav-item">
                                        <a href="/modificar" class="{{ Request::path() === '/' ? 'nav-link active' : 'nav-link' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Modificar</p>
                                        </a>
                                    </li>


                                    @endcanany --}}

                                </ul>
                            </li>

                            {{-- Ventas --}}

                            <li class="nav-item has-treeview">
                                @canany(['ventas'])
                                <a href="#" class="nav-link">
                                    <i class="nav-icon far fa-sticky-note"></i>
                                    <p>Ventas<i class="fas fa-angle-left right"></i></p>
                                </a>

                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{route('Ventas.create')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Crear Venta</p>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="/PendienteVenta" class="{{ Request::path() === 'notas/favoritas' ? 'nav-link active' : 'nav-link' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Ventas Pendientes</p>
                                        </a>
                                    </li>
                                </ul>
                                @endcanany
                            </li>

                            {{-- Compras --}}
                            <li class="nav-item has-treeview">
                                @canany(['compras'])
                                <a href="#" class="nav-link">
                                    <i class="nav-icon far fa-sticky-note"></i>
                                    <p>Compras<i class="fas fa-angle-left right"></i></p>
                                </a>

                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{route('compras.create')}}" class="nav-link">
                                        <i class="far fa-circle nav-icon"></i>
                                        <p>Crear Compra</p>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="/PendienteCompra" class="{{ Request::path() === 'notas/favoritas' ? 'nav-link active' : 'nav-link' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Compras Pendientes</p>
                                        </a>
                                    </li>
                                </ul>
                                @endcanany
                            </li>
                            {{-- Movimientos --}}
                            @canany(['bodega'])
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon far fa-sticky-note"></i>
                                    <p>Movimientos<i class="fas fa-angle-left right"></i></p>
                                </a>
                                <ul class="nav nav-treeview">

                                    <li class="nav-item">
                                        <a href="{{route('compras.index')}}"
                                            class="{{ Request::path() === '/' ? 'nav-link active' : 'nav-link' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Compras</p>
                                        </a>
                                    </li>

                                 <li class="nav-item">
                                        <a href="{{route('Ventas.index')}}"
                                            class="{{ Request::path() === '/' ? 'nav-link active' : 'nav-link' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Ventas</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            @endcanany

                            {{-- Clientes --}}
                            @canany(['secretaria'])
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon far fa-sticky-note"></i>
                                    <p>Clientes<i class="fas fa-angle-left right"></i></p>
                                </a>
                                <ul class="nav nav-treeview">

                                    <li class="nav-item">
                                        <a href="{{route('Clientes.index')}}"
                                            class="{{ Request::path() === '/' ? 'nav-link active' : 'nav-link' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Ver clientes</p>
                                        </a>
                                    </li>


                                    <li class="nav-item">
                                        <a href="{{route('Clientes.create')}}"
                                            class="{{ Request::path() === '/' ? 'nav-link active' : 'nav-link' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Agregar</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            @endcanany

                            @canany(['compras'])
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon far fa-sticky-note"></i>
                                    <p>Proveedores<i class="fas fa-angle-left right"></i></p>
                                </a>
                                <ul class="nav nav-treeview">
                                    <li class="nav-item">
                                        <a href="{{route('Proveedores.index')}}"
                                            class="{{ Request::path() === '/' ? 'nav-link active' : 'nav-link' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Ver proveedores</p>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{route('Proveedores.create')}}"
                                            class="{{ Request::path() === '/' ? 'nav-link active' : 'nav-link' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Agregar proveedor</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            @endcanany

                                   {{-- Empleados --}}
                            @canany(['secretaria'])
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon far fa-sticky-note"></i>
                                    <p>Empleados<i class="fas fa-angle-left right"></i></p>
                                </a>
                                <ul class="nav nav-treeview">

                                    <li class="nav-item">
                                        <a href="{{route('Empleados.index')}}"
                                            class="{{ Request::path() === '/' ? 'nav-link active' : 'nav-link' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Ver Empleados</p>
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a href="{{route('Empleados.create')}}"
                                            class="{{ Request::path() === '/' ? 'nav-link active' : 'nav-link' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Agregar Empleados</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            @endcanany


                            @canany(['compras'])
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon far fa-sticky-note"></i>
                                    <p>Reportes Productos<i class="fas fa-angle-left right"></i></p>
                                </a>
                                <ul class="nav nav-treeview">

                                    <li class="nav-item">
                                        <a href="{{route('generarpdf')}}"
                                            class="{{ Request::path() === '/' ? 'nav-link active' : 'nav-link' }}" target="_blank">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Stock</p>
                                        </a>
                                    </li>
                                </ul>
                            </li>
                            @endcanany


                            @canany(['bodega', 'gerente', 'ventas', 'compras'])
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon far fa-sticky-note"></i>
                                    <p>Reportes movimientos<i class="fas fa-angle-left right"></i></p>
                                </a>
                                <ul class="nav nav-treeview">
                                    @canany(['bodega', 'gerente', 'ventas'])
                                    <li class="nav-item">
                                        <a href="{{route('ventasReporte')}}"
                                            class="{{ Request::path() === '/' ? 'nav-link active' : 'nav-link' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Ventas</p>
                                        </a>
                                    </li>
                                    @endcanany

                                    @canany(['bodega', 'gerente', 'compras'])
                                    <li class="nav-item">
                                        <a href="{{route('comprasReporte')}}"
                                            class="{{ Request::path() === '/' ? 'nav-link active' : 'nav-link' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>Compras</p>
                                        </a>
                                    </li>
                                    @endcanany
                                </ul>
                            </li>
                            @endcanany

                            <br><br><br><br><br><br><br><br><br><br><br><br>

                            <li class="nav-item">
                                <a href="{{url('ayuda/download')}}" class="{{ Request::path() === '/' ? 'nav-link active' : 'nav-link' }}">
                                    <i class="nav-icon fa fa-exclamation-circle"></i>
                                    <p>Manual Ayuda</p>
                                </a>
                            </li>

                            {{-- <li class="nav-item has-treeview">
                                <a class="dropdown-item active" href="{{ url('ayuda/download') }}">
                                    Manual Ayuda
                                </a>
                            </li> --}}

                        </ul>
                    </nav>
                    <!-- /.sidebar-menu -->
                </div>
                <!-- /.sidebar -->
            </aside>

            <!-- Content Wrapper. Contains page content -->
            <div class="content-wrapper">
                <!-- Content Header (Page header) -->
                <div class="content-header">

                </div>
                <!-- /.content-header -->

                <!-- Main content -->
                <section class="content">
                    @yield('alert')
                    @yield('alert2')
                    @yield('content')
                    @yield('listado')
                </section>
                <!-- /.content -->
            </div>
            <!-- /.content-wrapper -->
            <footer class="main-footer">
                <!-- NO QUITAR -->
                <strong>Ferreteria Cardoni
                    <div class="float-right d-none d-sm-inline-block">
                        <b></b> 1.0
                    </div>

            </footer>

            <!-- Control Sidebar -->
            <aside class="control-sidebar control-sidebar-dark">
                <!-- Control sidebar content goes here -->
            </aside>
            <!-- /.control-sidebar -->
        </div>
    </div>
</body>


<script src="{{ asset('js/validaciones.js') }}" defer></script>




<script type="text/javascript">
   jQuery(document).ready(function($) {
        $(document).ready(function() {
            $('.mi-selector').select2();
        });
    });
</script>



{{-- Se carga en la vista de modificar ventas --}}
@if (Request::is('Ventas/*/edit'))

<script type="text/javascript">

    $(document).on('click', '.addRow', function(){
        addRow();
    });

    // Agregando filas de ventas
    function addRow()
    {
        var tr = '<tr>'+
        '<td><input name="nombreproducto[]" list="productos" class="a form-control" required><datalist id="productos">@foreach ($productosIventario as $producto)<option value="{{$producto->nombre}} ${{$producto->precio}}"></option>@endforeach</datalist></td>'+
		'<td><input type="number" min="0" name="idcantidad[]" class="b form-control" required disabled  autocomplete="off"></td>'+
        '<td><button type="button" id="btmVentasTabDel" class="btn btn-danger remove">Eliminar</button></td>'
        '<tr>';
        $('tbody').append(tr);
    };

    // Eliminado filas de ventas
    $(document).on('click', '.remove', function(){
        var ultimaFila = $('tbody tr').length;
        if (ultimaFila == 1) {
            alert('Lo siento, no se puede eliminar la ultima fila');
        }else{
            $(this).parent().parent().remove();
        }
    });
</script>
@endif



{{-- Solo se cargara el script cuando se encuentre en la vista de crear ventas --}}
@if (Request::is('Ventas/create'))

<script type="text/javascript">

    $(document).on('click', '.addRow', function(){
        addRow();
    });

    // Agregando filas de ventas
    function addRow()
    {
        var tr = '<tr>'+
        '<td><input name="nombreproducto[]" list="productos" class="a form-control" required><datalist id="productos">@foreach ($producto as $productoiten)<option value="{{$productoiten->nombre}} ${{$productoiten->precio}}"></option>@endforeach</datalist></td>'+
		'<td><input type="number" min="0" name="idcantidad[]" class="b form-control" required disabled></td>'+
        '<td><button type="button" id="btmVentasTabDel" class="btn btn-danger remove">Eliminar</button></td>'
        '<tr>';
        $('tbody').append(tr);
    };

    // Eliminado filas de ventas
    $(document).on('click', '.remove', function(){
        var ultimaFila = $('tbody tr').length;
        if (ultimaFila == 1) {
            alert('Lo siento, no se puede eliminar la ultima fila');
        }else{
            $(this).parent().parent().remove();
        }
    });
</script>
@endif


{{-- Solo se cargara para la vista de modificar compras  --}}
@if (Request::is('compras/*/edit'))

<script type="text/javascript">


    $(document).on('click', '.addRow', function(){
        addRow();
    });

    // Agregando filas de compras
    function addRow()
    {
        // Recuperando el select de productos
        // var selectProducto = document.querySelector('#nombreproducto');

        // console.log(selectProducto);

        // console.log(selectProducto);
        var tr = '<tr>';

        tr += '<td><input id="nombreproducto"  name="nombreproducto[]" list="productos" class="a form-control" autocomplete="off" required>@foreach ($productoscompra as $productoCompra)<datalist id="productos">@foreach ($productosIventario as $producto)<option value="{{$producto->nombre}}"></option>@endforeach</datalist>@endforeach</td>'+
        '<td><input type="number" min="0" name="idcantidad[]" class="b form-control" required></td>'+
        '<td><input type="number" min="0" step="any" name="idprecioC[]" class="c form-control" required></td>'+
        '<td><a href="#" class="btn btn-danger remove">Eliminar</a></td>'
        '<tr>';;
        $('tbody').append(tr);

    };

    // Eliminando filas de compras
    $(document).on('click', '.remove', function(){
        var ultimaFila = $('tbody tr').length;
        if (ultimaFila == 1) {
            alert('Lo siento, no se puede eliminar la ultima fila');
        }else{
            $(this).parent().parent().remove();
        }
    });
</script>
@endif






{{-- Solo se cargara para la vista de compras  --}}
@if (Request::is('compras/create'))

<script type="text/javascript">

    $(function(){

        $('#idproveedor').on('change', onSelectProveedor);
    });

    // Rellenenando el select de productos en la vista de compras
        function onSelectProveedor(){
            var codProveedor = $(this).val();

            // Deshabilitando el select de proveedores
            $(this).prop('disabled',true);

            $('#nombreproducto').prop('disabled',false);
            $('#idcantidad').prop('disabled',false);
            $('#iddescripcion').prop('disabled',false);
            $('#btnEliminar').prop('disabled',false);


            // Habilitando el select despues de que se envian los datos del formulario
            $('#formulario').submit(function(event){
                $('#idproveedor').prop('disabled', false);
            })

            //Habilitando el boton de agregar
            $('.addRow').prop('disabled', false);

            // Enviando los productos segun proveedor
            $.get('/api/proveedor/'+codProveedor+'/productos', function(data){
                var htmlSelectProducto = '<option disabled selected>Seleccione el producto</option>';
                for (let i = 0; i < data.length; i++) {

                    // htmlSelectProducto += '<option value="'+data[i].cod_producto+'">'+data[i].nombre+' $'+data[i].precio+'</option>'

                    htmlSelectProducto += '<option value="'+data[i].nombre+'"></option>'


                    // $('#productos').html(htmlSelectProducto);

                    $('#productos').html(htmlSelectProducto);

                }
            })
        }

    $(document).on('click', '.addRow', function(){
        addRow();
    });

    // Agregando filas de compras
    function addRow()
    {
        // Recuperando el select de productos
        var selectProducto = document.querySelector('#nombreproducto');

        console.log(selectProducto);

        // console.log(selectProducto);
        var tr = '<tr>';

        tr += '<td>'+selectProducto.outerHTML+'</td>'+
        '<td><input type="number" min="0" name="idcantidad[]" class="b form-control" required></td>'+
        '<td><input type="number" min="0" step="any" disabled name="idprecioC[]" class="c form-control" required></td>'+
        '<td><a href="#" class="btn btn-danger remove">Eliminar</a></td>'
        '<tr>';;
        $('tbody').append(tr);

    };

    // Eliminando filas de compras
    $(document).on('click', '.remove', function(){
        var ultimaFila = $('tbody tr').length;
        if (ultimaFila == 1) {
            alert('Lo siento, no se puede eliminar la ultima fila');
        }else{
            $(this).parent().parent().remove();
        }
    });
</script>
@endif



<!-- buscadores -->
<script type="text/javascript">
//productos
    window.addEventListener("load", function() {
        function busca(query = '') {
            $.ajax({
                url: "{{ route('buscador') }}",
                method: 'GET',
                data: {
                    query: query
                },
                dataType: 'json',
                success: function(data) {
                    //console.log(data);
                    $('#ok').html(data);
                }
            })
        }
        $(document).on('keyup', '#texto', function() {
            var query = $(this).val();
            //console.log(query);
            busca(query);
        })
    })


//Buscar pedidos 
        window.addEventListener("load", function() {
            var opc= document.querySelector('#opcBuscador');
            console.log(opc.value);
            function busca(query = '') {
                $.ajax({
                    url: "{{ route('buscadorPedidos') }}",
                    method: 'GET',
                    data: {
                        query: query, opc: opc.value
                    },
                    dataType: 'json',
                    success: function(data) {

                        //console.log(data);
                        $('#ok1').html(data);
                    }
                })
            }

            $(document).on('keyup', '#textoVentaP', function() {
                var query = $(this).val();
                //console.log(query);
                busca(query);
            })

        })
        //buscar compras
        window.addEventListener("load", function() {
            var opc= document.querySelector('#opcBuscadorC');
            console.log(opc.value);
            function buscaC(query = '') {
                $.ajax({
                    url: "{{ route('buscadorCompras') }}",
                    method: 'GET',
                    data: {
                        query: query, opc: opc.value
                    },
                    dataType: 'json',
                    success: function(data) {

                        //console.log(data);
                        $('#ok2').html(data);
                    }
                })
            }

            $(document).on('keyup', '#textoCompraP', function() {
                var query = $(this).val();
                //console.log(query);
                buscaC(query);
            })

        })
        //busca empleados
        window.addEventListener("load", function() {
            var opc= document.querySelector('#opcBuscadorE');
            console.log(opc.value);
            function buscaE(query = '') {
                $.ajax({
                    url: "{{ route('buscadorEmpleados') }}",
                    method: 'GET',
                    data: {
                        query: query, opc: opc.value
                    },
                    dataType: 'json',
                    success: function(data) {

                        //console.log(data);
                        $('#ok4').html(data);
                    }
                })
            }

            $(document).on('keyup', '#textoempleado', function() {
                var query = $(this).val();
                //console.log(query);
                buscaE(query);
            })
            $(document).on('change', '#opcBuscadorE', function() {
                var query = document.querySelector('#textoempleado');
                //console.log(query);
                $('#textoempleado').prop('disabled',false);
                buscaE(query.value);
            })

        })

        //buscador clientes
        window.addEventListener("load", function() {
        function buscaClientes(query = '') {
            $.ajax({
                url: "{{ route('buscadorClientes') }}",
                method: 'GET',
                data: {
                    query: query
                },
                dataType: 'json',
                success: function(data) {
                    //console.log(data);
                    $('#okC').html(data);
                }
            })
        }
        $(document).on('keyup', '#textoClientes', function() {
            var query = $(this).val();
            //console.log(query);
            buscaClientes(query);
        })
    })



</script>

<script type="text/javascript">
    window.addEventListener("load", function() {
        function buscaCompras(query = '') {
            $.ajax({
                url: "{{ route('buscadorCompra') }}",
                method: 'GET',
                data: {
                    query: query
                },
                dataType: 'json',
                success: function(data) {
                    //console.log(data);
                    $('#VistaCompra').html(data);
                }
            })
        }
        $(document).on('keyup', '#textoCompra', function() {
            var query = $(this).val();
            //console.log(query);
            buscaCompras(query);
        })

        function buscaVentas(query = '') {
            $.ajax({
                url: "{{ route('buscadorVenta') }}",
                method: 'GET',
                data: {
                    query: query
                },
                dataType: 'json',
                success: function(data) {
                    //console.log(data);
                    $('#VistaVenta').html(data);
                }
            })
        }
        $(document).on('keyup', '#textoVenta', function() {
            var query = $(this).val();
            //console.log(query);
            buscaVentas(query);
        })
    })
</script>


<script type="text/javascript">
    function Disponibilidad(query=''){
                //let ventas= 'prueba';
                $.ajax({
                    url:"{{ route('cantidad') }}",
                    method: 'GET',
                    data: {
                        query: query
                    },
                    dataType: "json",
                    error: function (jqXHR, exception){
                        console.log('neles');
                    },
                    success: function(data) {
                        //console.log();
                        dispo(data);
                        //$('#ok').html(data);
                        //resp= data;
                        //return 'pasa';

                    }
                })

            }
</script>


