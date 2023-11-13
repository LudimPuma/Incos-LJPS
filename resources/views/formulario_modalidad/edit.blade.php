@extends('layout')

@section('content')
<div class="container">
    <h2>Editar Formulario de Modalidad</h2>
    <form method="POST" action="{{ route('formulario_modalidad.update', $formulario->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        {{-- estudiante --}}
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="ci">CI del Estudiante</label>
                    <input type="number" name="ci" class="form-control" value="{{ $estudiante->ci }}" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="id_carrera">Carrera del Estudiante</label>
                    <select id="id_carrera" name="id_carrera" class="form-control" required>
                        <option></option>
                        @foreach($carreras as $carrera)
                            <option value="{{ $carrera->id }}" @if($carrera->id == $estudiante->id_carrera) selected @endif>{{ $carrera->nombre }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="nombre">Nombre del Estudiante</label>
                    <input type="text" name="nombre" class="form-control" value="{{ $estudiante->nombre }}" required>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="a_p">Apellido Paterno del Estudiante</label>
                    <input type="text" name="a_p" class="form-control" value="{{ $estudiante->a_p }}" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="a_m">Apellido Materno del Estudiante</label>
                    <input type="text" name="a_m" class="form-control" value="{{ $estudiante->a_m }}" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="celular">Número de Celular del Estudiante</label>
                    <input type="number" name="celular" class="form-control" value="{{ $estudiante->celular }}" required>
                </div>
            </div>
        </div>

        {{-- Campos del formulario --}}
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="nombre_pro">Nombre del Proyecto</label>
                    <input type="text" name="nombre_pro" class="form-control" value="{{ $formulario->nombre_pro }}" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="institucion">Institución</label>
                    <input type="text" name="institucion" class="form-control" value="{{ $formulario->institucion }}" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="id_tutor">Tutor del Proyecto</label>
                    <select id="id_tutor" name="id_tutor" class="form-control">
                        @foreach($docentes as $docente)
                            <option value="{{ $docente->id }}" @if($docente->id == $formulario->id_tutor ) selected @endif>{{ $docente->nombres }}</option>
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
                            <option value="{{ $tipoMod->id_tipo }}" @if($tipoMod->id_tipo == $formulario->id_tipo_m) selected @endif>{{ $tipoMod->nombre_modalidad }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="anio_graduacion">Año de Graduación</label>
                    <input type="number" name="anio_graduacion" class="form-control" value="{{ $formulario->anio_graduacion }}" required>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="nuevopdf">Subir archivo PDF</label>
                    <input type="file" name="nuevopdf" class="form-control-file" accept=".pdf">
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="nuevaimagen">Subir imagen</label>
                    <input type="file" name="nuevaimagen" class="form-control-file" accept="image/*">
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="estado">Estado:</label>
                    <select class="form-select" id="estado" name="estado" required >
                        <option value="1" {{ $formulario->estado == 1 ? 'selected' : '' }}>Habilitado</option>
                        <option value="0" {{ $formulario->estado == 0 ? 'selected' : '' }}>Deshabilitado</option>
                    </select>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group" id="motivos-group">
                    <label for="motivos_estado">Motivos:</label>
                    <input type="textarea" class="form-control" id="motivos_estado" name="motivos_estado" value="{{ $formulario->motivos_estado }}" >
                </div>
            </div>
        </div>
        <button type="submit" id="actualizar" class="btn btn-primary">Guardar Cambios</button>
    </form>
</div>

<head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<link rel="stylesheet" href="{{asset('css/select2.min.css')}}" />
<link rel="stylesheet" href="{{asset('css/select2-bootstrap-5-theme.rtl.min.css')}}" />
<link rel="stylesheet" href="{{asset('css/select2-bootstrap-5-theme.min.css')}}" />
<script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
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

                    }
                });
            } else {
                $('#id_tutor').empty();
            }
        });
    });
</script>
<script>
    document.getElementById("actualizar").addEventListener("click", function (event) {
        var seleccion = document.getElementById("estado").value;
        var motivos = document.getElementById("motivos_estado").value;

        if (seleccion === "0") {
            if (motivos === "") {
                Swal.fire({
                    icon: 'error',
                    title: 'Error',
                    text: 'Si el estado está deshabilitado, debe proporcionar un motivo',
                });
                event.preventDefault();
            }
        }
    });
</script>
@endsection
