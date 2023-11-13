@extends('layout')

@section('content')
    <div class="container">
        <h2>Editar Información de Persona</h2>
        <form method="POST" action="{{ route('usuarios.update', $user->id) }}">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="ci">CI:</label>
                        <input type="number" name="ci" class="form-control" required value="{{ $user->persona->ci }}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="extencion">Extensión de CI:</label>
                        <select class="form-select" id="extencion" name="extencion" required data-placeholder="Seleccione un departamento">
                            <option></option>
                            <option value="PT" @if ($user->persona->extencion == 'PT') selected @endif>Potosi</option>
                            <option value="OR" @if ($user->persona->extencion == 'OR') selected @endif>Oruro</option>
                            <option value="CB" @if ($user->persona->extencion == 'CB') selected @endif>Cochabamba</option>
                            <option value="LP" @if ($user->persona->extencion == 'LP') selected @endif>La Paz</option>
                            <option value="TJ" @if ($user->persona->extencion == 'TJ') selected @endif>Tarija</option>
                            <option value="SC" @if ($user->persona->extencion == 'SC') selected @endif>Santa Cruz</option>
                            <option value="BN" @if ($user->persona->extencion == 'BN') selected @endif>Beni</option>
                            <option value="PA" @if ($user->persona->extencion == 'PA') selected @endif>Pando</option>
                            <option value="CH" @if ($user->persona->extencion == 'CH') selected @endif>Chuquisaca</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="fecha_nac">Fecha de Nacimiento:</label>
                        <input type="date" name="fecha_nac" class="form-control" required value="{{ $user->persona->fecha_nac }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="nombres">Nombres:</label>
                        <input type="text" name="nombres" class="form-control" required value="{{ $user->persona->nombres }}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="apellido_p">Apellido Paterno:</label>
                        <input type="text" name="apellido_p" class="form-control" value="{{ $user->persona->apellido_p }}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="apellido_m">Apellido Materno:</label>
                        <input type="text" name="apellido_m" class="form-control" required value="{{ $user->persona->apellido_m }}">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="genero">Género:</label>
                        <select class="form-select" id="genero" name="genero" required data-placeholder="Seleccione el Género">
                            <option></option>
                            <option value="M" @if ($user->persona->genero == 'M') selected @endif>Masculino</option>
                            <option value="F" @if ($user->persona->genero == 'F') selected @endif>Femenino</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="estado_civil">Estado Civil:</label>
                        <select class="form-select" id="estado_civil" name="estado_civil" required data-placeholder="Seleccione un Estado Civil">
                            <option></option>
                            <option value="Soltero(a)" @if ($user->persona->estado_civil == 'Soltero(a)') selected @endif>Soltero(a)</option>
                            <option value="Casado(a)" @if ($user->persona->estado_civil == 'Casado(a)') selected @endif>Casado(a)</option>
                            <option value="Divorcido(a)" @if ($user->persona->estado_civil == 'Divorcido(a)') selected @endif>Divorcido(a)</option>
                            <option value="Viudo(a)" @if ($user->persona->estado_civil == 'Viudo(a)') selected @endif>Viudo(a)</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="profesion">Grado Academico:</label>
                        <select class="form-select" id="profesion" name="profesion" required data-placeholder="Seleccione un Grado Academico">
                            <option></option>
                            <option value="Bachiller" @if ($user->persona->profesion == 'Bachiller') selected @endif>Bachiller</option>
                            <option value="Lic" @if ($user->persona->profesion == 'Lic') selected @endif>Licenciado(a)</option>
                            <option value="Ing" @if ($user->persona->profesion == 'Ing') selected @endif>Ingeniero(a)</option>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="direccion">Direccion:</label>
                        <input type="text" name="direccion" class="form-control" required value="{{ $user->persona->direccion }}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="telefono">Telefono:</label>
                        <input type="text" name="telefono" class="form-control" value="{{ $user->persona->telefono }}">
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="celular">Celular:</label>
                        <input type="text" name="celular" class="form-control" required value="{{ $user->persona->celular }}">
                    </div>
                </div>
            </div>
            <h2>Editar Información de Usuario</h2>
            <div class="row">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="text" name="email" class="form-control" required value="{{ $user->email }}">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="roles">Roles:</label>
                    <select name="roles[]" class="form-control" id="roles" data-placeholder="Seleccione el Rol del Usuario">
                        <option></option>
                        @foreach ($roles as $role)
                            <option value="{{ $role->name }}" @if ($user->hasRole($role->name)) selected @endif>{{ $role->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <input type="hidden" name="model_type" value="App\User">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>

    <script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{ asset('js/select2.min.js') }}"></script>
    <link rel="stylesheet" href="{{asset('css/select2.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/select2-bootstrap-5-theme.rtl.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/select2-bootstrap-5-theme.min.css')}}" />

    <script>
        $( '#roles' ).select2( {
            theme: "bootstrap-5",
            width: '100%',
            placeholder: "Seleccione el Rol del Usuario",
        } );

        $( '#estado_civil' ).select2( {
            theme: "bootstrap-5",
            width: '100%',
            placeholder: "Seleccione un Estado Civil",
        } );

        $( '#genero' ).select2( {
            theme: "bootstrap-5",
            width: '100%',
            placeholder: "Seleccione el Género",
        } );

        $( '#extencion' ).select2( {
            theme: "bootstrap-5",
            width: '100%',
            placeholder: "Seleccione un departamento",
        } );

        $( '#profesion' ).select2( {
            theme: "bootstrap-5",
            width: '100%',
            placeholder: "Seleccione un Grado Academico",
        } );
    </script>
@endsection


{{-- @extends('layout')

@section('content')
    <div class="container">
        <h1>User Edit</h1>

        <form method="POST" action="{{ route('usuarios.update', $user->id) }}">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="text" name="email" class="form-control" value="{{ $user->email }}" required>
            </div>
            <div class="form-group">
                <label for="roles">Roles:</label>
                <select name="roles[]" id="rol" class="form-select">
                    <option value="" disabled selected>Seleccione un rol</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->name }}" {{ $user->hasRole($role->name) ? 'selected' : '' }}>
                            {{ $role->name }}
                        </option>
                    @endforeach
                </select>
            </div>
            <input type="hidden" name="model_type" value="App\User">

            <button type="submit" class="btn btn-primary">Save</button>
        </form>
    </div>
    <link rel="stylesheet" href="{{asset('css/select2.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/select2-bootstrap-5-theme.rtl.min.css')}}" />
    <link rel="stylesheet" href="{{asset('css/select2-bootstrap-5-theme.min.css')}}" />
    <script src="{{asset('js/jquery-3.6.0.min.js')}}"></script>
    <script src="{{ asset('js/select2.min.js') }}"></script>

    <script>
        $( '#rol' ).select2( {
            theme: "bootstrap-5",
            width: $( this ).data( 'width' ) ? $( this ).data( 'width' ) : $( this ).hasClass( 'w-100' ) ? '100%' : 'style',
            placeholder: $( this ).data( 'placeholder' ),
            closeOnSelect: false,
        } );
    </script>
@endsection --}}
