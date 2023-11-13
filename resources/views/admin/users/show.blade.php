@extends('layout')

@section('content')
@php
    $grados = [
        'Bachiller' => 'Bachiller',
        'Lic.' => 'Licenciatura',
        'Ing.' => 'Ingeniería',
    ];
    $generos=[
        'M' => 'Masculino',
        'F' => 'Femenino',
    ]
@endphp
    <div class="container">
        <h2>Información del Usuario</h2>

        <h3>Información de Persona:</h3>
        <ul>
            <li><strong>CI:</strong> {{ $user->persona->ci }}</li>
            <li><strong>Extensión de CI:</strong> {{ $user->persona->extencion }}</li>
            <li><strong>Fecha de Nacimiento:</strong> {{ \Carbon\Carbon::parse($user->persona->fecha_nac)->format('d/m/Y') }}</li>
            <li><strong>Edad:</strong> {{ \Carbon\Carbon::parse($user->persona->fecha_nac)->age }} años</li>
            <li><strong>Nombres:</strong> {{ $user->persona->nombres }}</li>
            <li><strong>Apellido Paterno:</strong> {{ $user->persona->apellido_p }}</li>
            <li><strong>Apellido Materno:</strong> {{ $user->persona->apellido_m }}</li>
            <li><strong>Género:</strong> {{ $generos[$user->persona->genero] }}</li>
            <li><strong>Estado Civil:</strong> {{ $user->persona->estado_civil }}</li>
            <li><strong>Grado Académico:</strong> {{ $grados[$user->persona->profesion] }}</li>

            <li><strong>Dirección:</strong> {{ $user->persona->direccion }}</li>
            <li><strong>Teléfono:</strong> {{ $user->persona->telefono }}</li>
            <li><strong>Celular:</strong> {{ $user->persona->celular }}</li>
        </ul>

        <h3>Información de Usuario:</h3>
        <ul>
            <li><strong>Email:</strong> {{ $user->email }}</li>
            <li><strong>Roles:</strong>
                <ul>
                    @foreach($user->roles as $role)
                        <li>{{ $role->name }}</li>
                    @endforeach
                </ul>
            </li>
        </ul>
    </div>
@endsection



{{-- @extends('layout')

@section('content')
    <div class="container">
        <h1 class="text-center">User Details</h1>

        <p><strong>Username:</strong> {{ $user->username }}</p>
        <p><strong>Email:</strong> {{ $user->email }}</p>
        <h2 class="text-center">Roles Users</h2>
        @if ($roles->count() > 0)
            <ul>
                @foreach ($rolePermissions as $role => $permissions)
                    <h4>Rol: {{ $role }}</h4>
                    <ul>
                        @foreach ($permissions as $permission)
                            <li>{{ $permission->details }}</li>
                        @endforeach
                    </ul>
                @endforeach

            </ul>
        @else
            <p>El usuario no tiene roles asignados.</p>

        @endif
    </div>
@endsection --}}
