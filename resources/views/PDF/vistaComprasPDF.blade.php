@extends('layouts.app')

@section('titulo','Generar PDF de Compras')


@section('content')
<form action="{{route('pdfcompras')}}" method="POST" target="_blank">
    @csrf
    <div class="form-row">
        <div class="form-group col-md-5">
            <label for="example-date-input">Fecha de inicio</label>
            <input name="finicio" class="form-control" type="date" id="example-date-input" required>
        </div>

        <div class="form-group col-md-5">
            <label for="example-date-input">Fecha final</label>
            <input name="ffinal" class="form-control" type="date" id="example-date-input" required>
        </div>
    </div>

    <button class="btn btn-primary" type="submit">Generar PDF</button>
</form>
@endsection