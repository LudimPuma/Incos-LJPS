@extends('layout')

@section('content')
<div class="container">
    <h2>Crear Tipo de Modalidad</h2>
    <form method="POST" action="{{ route('tipos_modalidad.store') }}">
        @csrf
        <div class="form-group">
            <label for="nombre_modalidad">Nombre de Modalidad:</label>
            <input type="text" class="form-control" id="nombre_modalidad" name="nombre_modalidad" required>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
</div>
@endsection
