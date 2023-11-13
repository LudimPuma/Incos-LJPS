@extends('layout')

@section('content')
    <div class="container">
        <h2>Editar Docente</h2>
        <form method="POST" action="{{ route('docentes.update', $docente->id) }}">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="ci">CI:</label>
                        <input type="number" class="form-control" id="ci" name="ci" value="{{ $docente->ci }}" required >
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="extencion_ci">Extensión de CI:</label>
                        <select class="form-select" id="extencion_ci" name="extencion_ci" required data-placeholder="Seleccione un departamento">
                            <option></option>
                            <option value="PT" {{ $docente->extencion_ci === 'PT' ? 'selected' : '' }}>Potosi</option>
                            <option value="OR" {{ $docente->extencion_ci === 'OR' ? 'selected' : '' }}>Oruro</option>
                            <option value="CB" {{ $docente->extencion_ci === 'CB' ? 'selected' : '' }}>Cochabamba</option>
                            <option value="LP" {{ $docente->extencion_ci === 'LP' ? 'selected' : '' }}>La Paz</option>
                            <option value="TJ" {{ $docente->extencion_ci === 'TJ' ? 'selected' : '' }}>Tarija</option>
                            <option value="SC" {{ $docente->extencion_ci === 'SC' ? 'selected' : '' }}>Santa Cruz</option>
                            <option value="BN" {{ $docente->extencion_ci === 'BN' ? 'selected' : '' }}>Beni</option>
                            <option value="PA" {{ $docente->extencion_ci === 'PA' ? 'selected' : '' }}>Pando</option>
                            <option value="CH" {{ $docente->extencion_ci === 'CH' ? 'selected' : '' }}>Chuquisaca</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="nombres">Nombres:</label>
                        <input type="text" class="form-control" id="nombres" name="nombres" value="{{ $docente->nombres }}" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="a_p">Apellido Paterno:</label>
                        <input type="text" class="form-control" id="a_p" name="a_p" value="{{ $docente->a_p }}" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="a_m">Apellido Materno:</label>
                        <input type="text" class="form-control" id="a_m" name="a_m" value="{{ $docente->a_m }}" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="genero">Género:</label>
                        <select class="form-select" id="genero" name="genero" required data-placeholder="Seleccione el Género">
                            <option></option>
                            <option value="M" {{ $docente->genero === 'M' ? 'selected' : '' }}>Masculino</option>
                            <option value="F" {{ $docente->genero === 'F' ? 'selected' : '' }}>Femenino</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="direccion">Dirección:</label>
                        <input type="text" class="form-control" id="direccion" name="direccion" value="{{ $docente->direccion }}"  required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="telefono">Teléfono:</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" value="{{ $docente->telefono }}" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="celular">Celular:</label>
                        <input type="text" class="form-control" id="celular" name="celular" value="{{ $docente->celular }}" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="fecha_nac">Fecha de Nacimiento:</label>
                        <input type="date" class="form-control" id="fecha_nac" name="fecha_nac" value="{{ $docente->fecha_nac }}" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="estado_civil">Estado Civil:</label>
                        <select class="form-select" id="estado_civil" name="estado_civil" required data-placeholder="Seleccione un Estado Civil">
                            <option></option>
                            <option value="Soltero(a)" {{ $docente->estado_civil === 'Soltero(a)' ? 'selected' : '' }}>Soltero(a)</option>
                            <option value="Casado(a)" {{ $docente->estado_civil === 'Casado(a)' ? 'selected' : '' }}>Casado(a)</option>
                            <option value="Divorcido(a)" {{ $docente->estado_civil === 'Divorcido(a)' ? 'selected' : '' }}>Divorcido(a)</option>
                            <option value="Viudo(a)" {{ $docente->estado_civil === 'Viudo(a)' ? 'selected' : '' }}>Viudo(a)</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="profesion">Profesión:</label>
                        <select class="form-select " id="profesion" name="profesion"  required data-placeholder="Seleccione una profesion">
                            <option></option>
                            <option value="Lic" {{ $docente->profesion === 'Lic' ? 'selected' : '' }}>Licenciado(a)</option>
                            <option value="Ing" {{ $docente->profesion === 'Ing' ? 'selected' : '' }}>Ingeniero(a)</option>
                        </select>

                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="carreras">Carreras:</label>
                        <select class="form-select" id="carreras" name="carreras[]" multiple required data-placeholder="Seleccione una o más carreras">
                            <option></option>
                            @foreach($carreras as $carrera)
                                <option value="{{ $carrera->id }}" {{ in_array($carrera->id, $carreraIds) ? 'selected' : '' }}>
                                    {{ $carrera->nombre }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="form-group">
                        <label for="estado">Estado:</label>
                        <select class="form-select" id="estado" name="estado" required >
                            <option value="1" {{ $docente->estado == 1 ? 'selected' : '' }}>Habilitado</option>
                            <option value="0" {{ $docente->estado == 0 ? 'selected' : '' }}>Deshabilitado</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group" id="motivos-group">
                        <label for="motivos">Motivos:</label>
                        <input type="text" class="form-control" id="motivos" name="motivos" value="{{ $docente->motivos }}" >
                    </div>
                </div>

            </div>
            <button type="submit" id="actualizar" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
    <link rel="stylesheet" href="{{asset('css/select2.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/select2-bootstrap-5-theme.rtl.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/select2-bootstrap-5-theme.min.css')}}" />
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/select2.min.js') }}"></script>
    {{-- select2 --}}
    <script>
        $( '#carreras' ).select2( {
            theme: "bootstrap-5",
            width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
            placeholder: $( this ).data( 'placeholder' ),
            closeOnSelect: false,
        } );
        $( '#profesion' ).select2( {
            theme: "bootstrap-5",
            width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
            placeholder: $( this ).data( 'placeholder' ),
        } );

        $( '#estado_civil' ).select2( {
            theme: "bootstrap-5",
            width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
            placeholder: $( this ).data( 'placeholder' ),
        } );
        $( '#genero' ).select2( {
            theme: "bootstrap-5",
            width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
            placeholder: $( this ).data( 'placeholder' ),
        } );
        $( '#extencion_ci' ).select2( {
            theme: "bootstrap-5",
            width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
            placeholder: $( this ).data( 'placeholder' ),
        } );
        // $( '#estado' ).select2( {
        //     theme: "bootstrap-5",
        //     width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
        //     placeholder: $( this ).data( 'placeholder' ),
        // } );
    </script>
    {{-- alerta --}}

    <script>
        document.getElementById("actualizar").addEventListener("click", function (event) {
            var seleccion = document.getElementById("estado").value;
            var motivos = document.getElementById("motivos").value;

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
