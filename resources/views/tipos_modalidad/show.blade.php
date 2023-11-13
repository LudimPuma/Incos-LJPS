@extends('layout')

@section('content')
<div class="container">
    <h2>Detalles del Tipo de Modalidad</h2>
    <p><strong>ID:</strong> {{ $tipoModalidad->id_tipo }}</p>
    <p><strong>Nombre de Modalidad:</strong> {{ $tipoModalidad->nombre_modalidad }}</p>
    <p><strong>Descripción:</strong> {{ $tipoModalidad->descripcion }}</p>
    {{-- @role('admin') --}}
    <a class="btn btn-primary" href="{{ route('tipos_modalidad.edit', $tipoModalidad->id_tipo) }}">Editar</a>
    {{-- @endrole --}}
</div>
@endsection
