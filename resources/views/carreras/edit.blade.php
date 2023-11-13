@extends('layout')

@section('content')
    <div class="container">
        <h2>Editar Carrera</h2>

        <form method="POST" action="{{ route('carreras.update', $carrera->id) }}">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="nombre">Nombre de la Carrera:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $carrera->nombre }}" required>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group">
                        <label for="estado">Estado:</label>
                        <select class="form-select" id="estado" name="estado" required >
                            <option value="1" {{ $carrera->estado == 1 ? 'selected' : '' }}>Habilitado</option>
                            <option value="0" {{ $carrera->estado == 0 ? 'selected' : '' }}>Deshabilitado</option>
                        </select>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="form-group" id="motivos-group">
                        <label for="motivos_estado">Motivos:</label>
                        <input type="textarea" class="form-control" id="motivos_estado" name="motivos_estado" value="{{ $carrera->motivos_estado }}" >
                    </div>
                </div>
            </div>
            <br>
            <button type="submit" id="actualizar" class="btn btn-primary">Actualizar</button>
        </form>
    </div>
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
