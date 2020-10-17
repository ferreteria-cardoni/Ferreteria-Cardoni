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
                                <a class="dropdown-item active" href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                    Cerrar Sesión
                                </a>

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
                            @canany(['administrador', 'ventas'])
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
                                <a href="#" class="nav-link">
                                    <i class="nav-icon far fa-sticky-note"></i>
                                    <p>Productos<i class="fas fa-angle-left right"></i></p>
                                </a>
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
                                <a href="#" class="nav-link">
                                    <i class="nav-icon far fa-sticky-note"></i>
                                    <p>Ventas<i class="fas fa-angle-left right"></i></p>
                                </a>
                                <ul class="nav nav-treeview">
                                    @canany(['bodega'])
                                    <li class="nav-item">
                                        <a href="{{route('Ventas.create')}}" class="{{ Request::path() === '/' ? 'nav-link active' : 'nav-link' }}">
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

                            {{-- Compras --}}
                            <li class="nav-item has-treeview">
                                <a href="#" class="nav-link">
                                    <i class="nav-icon far fa-sticky-note"></i>
                                    <p>Compras<i class="fas fa-angle-left right"></i></p>
                                </a>
                                <ul class="nav nav-treeview">
                                    @canany(['bodega'])
                                    <li class="nav-item">
                                        <a href="{{route('compras.create')}}" class="{{ Request::path() === '/' ? 'nav-link active' : 'nav-link' }}">
                                            <i class="far fa-circle nav-icon"></i>
                                            <p>crear</p>
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

</html>
<script src="{{ asset('js/validaciones.js') }}" defer></script>




<script type="text/javascript">
   jQuery(document).ready(function($) {
        $(document).ready(function() {
            $('.mi-selector').select2();
        });
    });
</script>



<script type="text/javascript">
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
</script>

