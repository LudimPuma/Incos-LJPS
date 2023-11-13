@extends('layout')

@section('content')
{{-- <div class="container">
    <h2 class="mt-5 text-center">Llenar Formulario de Modalidad</h2>
    <form method="POST" action="{{ route('formulario_modalidad.store') }}" enctype="multipart/form-data" class="mt-3">
        @csrf
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="ci">CI del Estudiante</label>
                    <input type="number" name="ci" class="form-control" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="id_carrera">Carrera del Estudiante</label>
                    <select id="id_carrera" name="id_carrera" class="form-control" required>
                        <option value="">Seleccione una carrera</option>
                        @foreach($carreras as $carrera)
                            <option value="{{ $carrera->id }}">{{ $carrera->nombre }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="nombre">Nombre del Estudiante</label>
                    <input type="text" name="nombre" class="form-control" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="a_p">Apellido Paterno del Estudiante</label>
                    <input type="text" name="a_p" class="form-control" >
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="a_m">Apellido Materno del Estudiante</label>
                    <input type="text" name="a_m" class="form-control" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="celular">Número de Celular del Estudiante</label>
                    <input type="number" name="celular" class="form-control" required>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="nombre_pro">Nombre del Proyecto</label>
                    <input type="text" name="nombre_pro" class="form-control" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="institucion">Institución</label>
                    <input type="text" name="institucion" class="form-control" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="id_tutor">Tutor del Proyecto</label>
                    <select id="id_tutor" name="id_tutor" class="form-control" required>
                        <option value="">Seleccione un Tutor</option>
                        @foreach($docentes as $docente)
                            <option value="{{ $docente->id }}">{{ $docente->nombre }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="id_tipo_m">Tipo de Modalidad</label>
                    <select id="id_tipo_m" name="id_tipo_m" class="form-control" required data-placeholder="Seleccione una modalidad">
                        <option value="">Seleccione una modalidad</option>
                        @foreach($tipoMods as $tipoMod)
                            <option value="{{ $tipoMod->id_tipo }}">{{ $tipoMod->nombre_modalidad }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="anio_graduacion">Año de Graduación</label>
                    <input type="number" name="anio_graduacion" class="form-control" value="{{ date("Y") }}" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="pdf">Subir archivo PDF</label>
                    <input type="file" name="pdf" class="form-control-file" accept=".pdf">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="imagen">Subir imagen</label>
                    <input type="file" name="imagen" class="form-control-file" accept="image/*">
                </div>
            </div>
        </div>
        <br>

        <button type="submit" class="btn btn-primary">Guardar Formulario</button>
    </form>
</div> --}}

    <div class="container">
        <h2>Llenar Formulario de Modalidad</h2>
        <form method="POST" action="{{ route('formulario_modalidad.store') }}" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="ci">CI del Estudiante</label>
                        <input type="text" name="ci" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="id_carrera">Carrera del Estudiante</label>
                        <select id="id_carrera" name="id_carrera" class="form-control" required >
                            <option></option>
                            @foreach($carreras as $carrera)
                                <option value="{{ $carrera->id }}">{{ $carrera->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="nombre">Nombre del Estudiante</label>
                        <input type="text" name="nombre" class="form-control" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="a_p">Apellido Paterno del Estudiante</label>
                        <input type="text" name="a_p" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="a_m">Apellido Materno del Estudiante</label>
                        <input type="text" name="a_m" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="celular">Número de Celular del Estudiante</label>
                        <input type="number" name="celular" class="form-control" required>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="nombre_pro">Nombre del Proyecto</label>
                        <input type="text" name="nombre_pro" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="institucion">Institución</label>
                        <input type="text" name="institucion" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="id_tutor">Tutor del Proyecto</label>
                        <select id="id_tutor" name="id_tutor" class="form-control" >
                            <option> Seleccione un Tutor</option>
                            @foreach($docentes as $docente)
                                <option value="{{ $docente->id }}">{{ $docente->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="id_tipo_m">Tipo de Modalidad</label>

                        <select id="id_tipo_m" name="id_tipo_m" class="form-control" required data-placeholder="Seleccione una modalidad">
                            <option></option>
                            @foreach($tipoMods as $tipoMod)
                                <option value="{{ $tipoMod->id_tipo }}">{{ $tipoMod->nombre_modalidad }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="anio_graduacion">Año de Graduación</label>
                        <input type="number" name="anio_graduacion" class="form-control" value="{{ date("Y") }}" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="pdf">Subir archivo PDF</label>
                        <input type="file" name="pdf" class="form-control-file" accept=".pdf">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="imagen">Subir imagen</label>
                        <input type="file" name="imagen" class="form-control-file" accept="image/*">
                    </div>
                </div>
            </div>
            <br>

            <button type="submit" class="btn btn-primary">Guardar Formulario</button>
        </form>
    </div>
    <head>
        <meta name="csrf-token" content="{{ csrf_token() }}">
    </head>
    <link rel="stylesheet" href="{{asset('css/select2.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/select2-bootstrap-5-theme.rtl.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/select2-bootstrap-5-theme.min.css')}}" />
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>

    {{-- <script src="{{ asset('js/select2.min.js') }}"></script> --}}
    <script>
        $(document).ready(function() {
            $('#id_carrera').change(function() {
                var carreraId = $(this).val();
                console.log("Valor de id_carrera:", carreraId);
                var csrfToken = $('meta[name="csrf-token"]').attr('content');
                if (carreraId) {
                    $.ajax({
                        url: "{{url('obtener-docentes')}}/" + carreraId,

                        type: 'POST',
                        data: {
                                _token: csrfToken

                        },
                        success: function(data) {
                            var select = $('#id_tutor');
                            select.empty();
                            $.each(data.docentes, function(index, docente) {
                                select.append(new Option(docente.nombres, docente.id));
                            });
                            // $('#id_tutor').html(data);
                        }
                    });
                } else {
                    $('#id_tutor').empty();
                }
            });
        });
    </script>

@endsection
