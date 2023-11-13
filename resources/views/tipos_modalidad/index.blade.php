@extends('layout')
@section('content')
<div class="container">
    <h2 class="text-center">Lista de Tipos de Modalidad</h2>
    @can('crud-create-modalities')
        <a class="btn btn-primary mb-3" href="{{ route('tipos_modalidad.create') }}">Agregar Tipo de Modalidad</a>
    @endcan
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif
    <br>
    <br>
    <table id="datatablesSimple"  class="table text-center mt-3 table-light table-hover table-bordered ">
        <thead class="table-secondary">
            <tr>
                <th>Nombre de Modalidad</th>
                <th>Descripción</th>
                <th>Estado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($tiposModalidad as $tipoModalidad)
                <tr>
                    <td>{{ $tipoModalidad->nombre_modalidad }}</td>
                    <td>{{ $tipoModalidad->descripcion }}</td>
                    <td>
                        @if($tipoModalidad->estado)
                            <span class="badge bg-success text-wrap" style="width: 5rem;">Habilitado</span>
                        @else
                            <span class="badge bg-danger text-wrap" style="width: 5rem;">Deshabilitado</span>
                        @endif
                    </td>
                    <td>
                        @can('crud-show-modalities')
                            <a style="text-decoration: none;" href="{{ route('tipos_modalidad.show', $tipoModalidad->id_tipo) }}">
                                <svg width="20" height="20" fill="currentColor" class="bi bi-eye-fill" viewBox="0 0 16 16" style="color: #0074FF; fill: #0074FF;" onmouseover="this.style.fill='#000';" onmouseout="this.style.fill='#0074FF';">
                                    <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z"/>
                                    <path d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z"/>
                                </svg>
                            </a>
                        @endcan
                        @can('crud-edit-modalities')
                            <a style="text-decoration: none;" href="{{ route('tipos_modalidad.edit', $tipoModalidad->id_tipo) }}">
                                <svg width="20" height="20" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16" style="color: #FFC107; fill: #FFC107;" onmouseover="this.style.fill='#000';" onmouseout="this.style.fill='#FFC107';">
                                    <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                    <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                                </svg>
                            </a>
                        @endcan
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
