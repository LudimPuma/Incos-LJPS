@extends('layout')

@section('content')
<h4 class="text-center">Crear Permiso</h4>

<div class="container">
    <form method="POST" action="{{ route('permissions.store') }}">
        @csrf

        <div class="form-group">
            <label for="name">Nombre del Permiso:</label>
            <input type="text" name="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="details">Detalles del Permiso:</label>
            <textarea name="details" class="form-control" rows="3" required></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Crear Permiso</button>
    </form>
</div>
@endsection
