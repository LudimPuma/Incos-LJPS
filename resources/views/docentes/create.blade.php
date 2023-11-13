@extends('layout')

@section('content')
    <div class="container">
        <h2>Agregar Docente</h2>
        <form method="POST" action="{{ route('docentes.store') }}">
            @csrf
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="ci">CI:</label>
                        <input type="text" class="form-control" id="ci" name="ci" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="extencion_ci">Extensión de CI:</label>
                        <select class="form-select" id="extencion_ci" name="extencion_ci" required data-placeholder="Seleccione un departamento">
                            <option></option>
                            <option value="PT">Potosi</option>
                            <option value="OR">Oruro</option>
                            <option value="CB">Cochabamba</option>
                            <option value="LP">La Paz</option>
                            <option value="TJ">Tarija</option>
                            <option value="SC">Santa Cruz</option>
                            <option value="BN">Beni</option>
                            <option value="PA">Pando</option>
                            <option value="CH">Chuquisaca</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="nombres">Nombres:</label>
                        <input type="text" class="form-control" id="nombres" name="nombres" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="a_p">Apellido Paterno:</label>
                        <input type="text" class="form-control" id="a_p" name="a_p" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="a_m">Apellido Materno:</label>
                        <input type="text" class="form-control" id="a_m" name="a_m" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="genero">Género:</label>
                        <select class="form-select" id="genero" name="genero" required data-placeholder="Seleccione el Género">
                            <option></option>
                            <option value="M">Masculino</option>
                            <option value="F">Femenino</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="direccion">Dirección:</label>
                        <input type="text" class="form-control" id="direccion" name="direccion" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="telefono">Teléfono:</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="celular">Celular:</label>
                        <input type="text" class="form-control" id="celular" name="celular" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="fecha_nac">Fecha de Nacimiento:</label>
                        <input type="date" class="form-control" id="fecha_nac" name="fecha_nac" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="estado_civil">Estado Civil:</label>
                        <select class="form-select" id="estado_civil" name="estado_civil" required data-placeholder="Seleccione un Estado Civil">
                            <option></option>
                            <option value="Soltero(a)">Soltero(a)</option>
                            <option value="Casado(a)">Casado(a)</option>
                            <option value="Divorcido(a)">Divorcido(a)</option>
                            <option value="Viudo(a)">Viudo(a)</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="profesion">Grado Academico:</label>
                        <select class="form-select " id="profesion" name="profesion" required data-placeholder="Seleccione un Grado Academico">
                            <option></option>
                            <option value="Lic">Licenciado(a)</option>
                            <option value="Ing">Ingeniero(a)</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="carreras">Carreras:</label>
                        <select class="form-select" id="carreras" name="carreras[]" multiple required data-placeholder="Seleccione una o mas carreras">
                            <option></option>
                            @foreach($carreras as $carrera)
                                <option value="{{ $carrera->id }}">{{ $carrera->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <input type="hidden" name="registro" value="{{ Auth::id() }}">
            <button type="submit" class="btn btn-primary">Agregar</button>
        </form>
    </div>
    <link rel="stylesheet" href="{{asset('css/select2.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/select2-bootstrap-5-theme.rtl.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/select2-bootstrap-5-theme.min.css')}}" />
    <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('js/select2.min.js') }}"></script>

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
    </script>


@endsection
