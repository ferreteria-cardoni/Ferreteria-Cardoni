@extends('layouts.app')

@section('titulo', 'Ferreteria Cardoni')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Ferreteria Cardoni</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                  
                  {{ Auth::user()->name }} has iniciado sesion correctamente !
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
