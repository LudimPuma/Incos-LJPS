@extends('layout')

@section('content')
    <div class="container">
        <h2>Crear Carrera</h2>

        <form method="POST" action="{{ route('carreras.store') }}">
            @csrf

            <div class="form-group">
                <label for="nombre">Nombre de la Carrera:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" required>
                <small id="nombreHelp" class="form-text text-muted">Ingrese un nombre de carrera válido.</small>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
@endsection
