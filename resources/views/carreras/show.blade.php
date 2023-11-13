@extends('layout')

@section('content')
    <div class="container">
        <h2>Detalles de Carrera</h2>
        <p><strong>ID:</strong> {{ $carrera->id }}</p>
        <p><strong>Nombre:</strong> {{ $carrera->nombre }}</p>
        <p><strong>Estado:</strong>
            @if ($carrera->estado)
                Habilitado
            @else
            Deshabilitado
            @endif
        </p>
        {{-- @role('admin') --}}
        <a class="btn btn-primary" href="{{ route('carreras.edit', $carrera->id) }}">Editar</a>
        {{-- @endrole --}}
    </div>

@endsection
