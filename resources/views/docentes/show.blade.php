@extends('layout')

@section('content')
    <div class="container">
        <h2>Detalles del Docente</h2>
        <p><strong>CI:</strong> {{ $docente->ci }}</p>
        <p><strong>Extensión de CI:</strong> {{ $docente->extencion_ci }}</p>
        <p><strong>Nombres:</strong> {{ $docente->nombres }}</p>
        <p><strong>Apellido Paterno:</strong> {{ $docente->a_p }}</p>
        <p><strong>Apellido Materno:</strong> {{ $docente->a_m }}</p>
        <p><strong>Género:</strong> {{ $docente->genero === 'M' ? 'Masculino' : 'Femenino' }}</p>
        <p><strong>Dirección:</strong> {{ $docente->direccion }}</p>
        <p><strong>Teléfono:</strong> {{ $docente->telefono }}</p>
        <p><strong>Celular:</strong> {{ $docente->celular }}</p>
        <p><strong>Fecha de Nacimiento:</strong> {{ $docente->fecha_nac }}</p>
        <p><strong>Estado Civil:</strong> {{ $docente->estado_civil }}</p>
        <p><strong>Profesión:</strong> {{ $docente->profesion === 'Lic' ? 'Licenciado(a)' : 'Ingeniero(a)' }}</p>
        <p><strong>Carreras:</strong>
        @foreach($docente->carreras as $carrera)
            {{ $carrera->nombre }}@if(!$loop->last), @endif
        @endforeach
        </p>
        <p><strong>Estado:</strong> {{ $docente->estado == 1 ? 'Habilitado' : 'Deshabilitado' }}</p>
        @if (!$docente->estado)
            <p><strong>Motivos:</strong> {{ $docente->motivos }}</p>
        @endif
        @role('admin')
        <a class="btn btn-primary" href="{{ route('docentes.edit', $docente->id) }}">Editar</a>
        @endrole
    </div>
@endsection
