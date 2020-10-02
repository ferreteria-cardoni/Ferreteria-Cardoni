@extends('layouts.app')

@section('titulo','Compras')

@section('content')
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Unidades compradas</th>
                <th scope="col">Fecha de compra</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <th scope="row">1</th>
                <td>Mark</td>
                <td>10</td>
                <td>2/10/2020</td>
            </tr>
            <tr>
                <th scope="row">2</th>
                <td>Jacob</td>
                <td>5</td>
                <td>2/10/2020</td>
            </tr>
            <tr>
                <th scope="row">3</th>
                <td>Larry the Bird</td>
                <td>15</td>
                <td>2/10/2020</td>
            </tr>
        </tbody>
    </table>
@endsection
