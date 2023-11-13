@extends('layout')

@section('content')
    <div class="container">
        <h2 class="text-center">Lista de Formularios de Modalidad</h2>
        <br>
        <table id="datatablesSimple"  class="table text-center mt-3 table-light table-hover table-bordered ">
            <thead class="table-secondary">
                <tr>
                    <th>Carrera</th>
                    <th>Estudiante</th>
                    <th>Título del Proyecto</th>
                    <th>Institución</th>
                    <th>Año de Graduación</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($formularios as $formulario)
                    <tr>
                        <td>{{ $formulario->carrera->nombre }}</td>
                        <td>{{ $formulario->estudiante->nombre }} {{ $formulario->estudiante->a_p }} {{ $formulario->estudiante->a_m }}</td>
                        <td>{{ $formulario->nombre_pro }}</td>
                        <td>{{ $formulario->institucion }}</td>
                        <td>{{ $formulario->anio_graduacion }}</td>
                        <td>
                            @if ($formulario->estado)
                                <div class="badge bg-success text-wrap" style="width: 5rem;">Habilitado</div>
                            @else
                                <div class="badge bg-danger text-wrap" style="width: 5rem;">Deshabilitado</div>
                            @endif
                        </td>
                        <td>
                            <a style="text-decoration: none;" href="{{ asset('storage/' . $formulario->pdf) }}" target="_blank">
                                <svg width="20" height="20" fill="currentColor" class="bi bi-filetype-pdf" viewBox="0 0 16 16" style="color: red; fill: red; opacity: 1;" onmouseover="this.style.fill='black'; this.style.opacity=1;" onmouseout="this.style.fill='red'; this.style.opacity=1;">
                                    <path fill-rule="evenodd" d="M14 4.5V14a2 2 0 0 1-2 2h-1v-1h1a1 1 0 0 0 1-1V4.5h-2A1.5 1.5 0 0 1 9.5 3V1H4a1 1 0 0 0-1 1v9H2V2a2 2 0 0 1 2-2h5.5L14 4.5ZM1.6 11.85H0v3.999h.791v-1.342h.803c.287 0 .531-.057.732-.173.203-.117.358-.275.463-.474a1.42 1.42 0 0 0 .161-.677c0-.25-.053-.476-.158-.677a1.176 1.176 0 0 0-.46-.477c-.2-.12-.443-.179-.732-.179Zm.545 1.333a.795.795 0 0 1-.085.380.574.574 0 0 1-.238.241.794.794 0 0 1-.375.082H.788V12.48h.66c.218 0 .389.06.512.181.123.122.185.296.185.522Zm1.217-1.333v3.999h1.46c.401 0 .734-.08.998-.237a1.45 1.45 0 0 0 .595-.689c.13-.3.196-.662.196-1.084 0-.42-.065-.778-.196-1.075a1.426 1.426 0 0 0-.589-.68c-.264-.156-.599-.234-1.005-.234H3.362Zm.791.645h.563c.248 0 .45.05.609.152a.89.89 0 0 1 .354.454c.079.201.118.452.118.753a2.3 2.3 0 0 1-.068.592 1.14 1.14 0 0 1-.196.422.8.8 0 0 1-.334.252 1.298 1.298 0 0 1-.483.082h-.563v-2.707Zm3.743 1.763v1.591h-.79V11.85h2.548v.653H7.896v1.117h1.606v.638H7.896Z"/>
                                </svg>
                            </a>

                            <a style="text-decoration: none;" href="{{ asset('storage/' . $formulario->imagen) }}" target="_blank">
                                <svg width="20" height="20" fill="currentColor" class="bi bi-image" viewBox="0 0 16 16" style="color: #4CAF50; fill: #4CAF50;" onmouseover="this.style.fill='#000';" onmouseout="this.style.fill='#4CAF50';">
                                    <path d="M6.002 5.5a1.5 1.5 0 1 1-3 0 1.5 1.5 0 0 1 3 0z"/>
                                    <path d="M2.002 1a2 2 0 0 0-2 2v10a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V3a2 2 0 0 0-2-2h-12zm12 1a1 1 0 0 1 1 1v6.5l-3.777-1.947a.5.5 0 0 0-.577.093l-3.71 3.71-2.66-1.772a.5.5 0 0 0-.63.062L1.002 12V3a1 1 0 0 1 1-1h12z"/>
                                </svg>
                            </a>
                            @can('formulario-edit-modality')
                                <a style="text-decoration: none;" href="{{ route('formulario_modalidad.edit', $formulario->id)}}">
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
    <script src="js/datatable/simple-datatables.min.js"></script>
    <script src="js/datatables-simple-demo.js"></script>
@endsection
