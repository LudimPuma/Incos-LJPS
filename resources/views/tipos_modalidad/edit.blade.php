@extends('layout')

@section('content')
<div class="container">
    <h2>Editar Tipo de Modalidad</h2>
    <form method="POST" action="{{ route('tipos_modalidad.update', $tipoModalidad->id_tipo) }}">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nombre_modalidad">Nombre de Modalidad:</label>
            <input type="text" class="form-control" id="nombre_modalidad" name="nombre_modalidad" value="{{ $tipoModalidad->nombre_modalidad }}" pattern="^[A-Za-zÀ-ÖØ-öø-ÿ\s]+$" title="Solo se permiten letras y espacios" required>
        </div>
        <div class="form-group">
            <label for="descripcion">Descripción:</label>
            <textarea class="form-control" id="descripcion" name="descripcion" rows="4" pattern="^[A-Za-zÀ-ÖØ-öø-ÿ\s.\-()]+$" required>{{ $tipoModalidad->descripcion }}</textarea>
        </div>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <label for="estado">Estado:</label>
                    <select class="form-select" id="estado" name="estado" pattern="[0-9]+" required >
                        <option value="1" {{ $tipoModalidad->estado == 1 ? 'selected' : '' }}>Habilitado</option>
                        <option value="0" {{ $tipoModalidad->estado == 0 ? 'selected' : '' }}>Deshabilitado</option>
                    </select>
                    <span id="estado_error" class="text-danger"></span>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group" id="motivos-group">
                    <label for="motivos_estado">Motivos:</label>
                    {{-- <input type="textarea" class="form-control" id="motivos_estado" name="motivos_estado" value="{{ $tipoModalidad->motivos_estado }}" > --}}
                    <textarea class="form-control" id="motivos_estado" name="motivos_estado" rows="4" pattern="^[A-Za-zÀ-ÖØ-öø-ÿ0-9\s.\-()]+$" >{{ $tipoModalidad->motivos_estado }}</textarea>
                    <span id="motivos_estado_error" class="text-danger"></span>
                </div>
            </div>
        </div>

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

{{-- <script>
    function validarInput(inputId, regex, mensajeError) {
        var input = document.getElementById(inputId);
        var errorSpan = document.getElementById(inputId + "_error");

        input.addEventListener("input", function() {
            var inputValue = this.value;

            if (!regex.test(inputValue)) {
                var iconoHTML = '<i class="fa fa-times-circle"></i>';
                errorSpan.innerHTML = iconoHTML + mensajeError;
            } else {
                errorSpan.innerHTML = "";
            }
        });
    }
    function validarSelect(selectId, regex, mensajeError) {
        var select = document.getElementById(selectId);
        var errorSpan = document.getElementById(selectId + "_error");

        select.addEventListener("change", function () {
            var selectedOption = select.options[select.selectedIndex].text;

            if (!regex.test(selectedOption)) {
                errorSpan.innerHTML = mensajeError;
            } else {
                errorSpan.innerHTML = "";
            }
        });
    }
</script>
<script>
    validarInput("nombre_modalidad", /^[A-Za-zÀ-ÖØ-öø-ÿ\s]+$/, "<strong>Solo se permiten letras.</strong>");
    validarInput("descripcion", /^[A-Za-zÀ-ÖØ-öø-ÿ\s.\-()]+$/, "<strong>Caracteres no permitidos.</strong>");
    validarSelect("estado", /^[01]$/, "<strong>Solo se permite 0 o 1.</strong>");
    validarInput("motivos_estado", /^[A-Za-zÀ-ÖØ-öø-ÿ\s.\-()]+$/, "<strong>Caracteres no permitidos.</strong>");
</script> --}}







{{-- <script>
    document.getElementById('descripcion').addEventListener('input', function () {
        var descripcionInput = this.value;
        var descripcionError = document.getElementById('descripcion-error');

        var isValid = /^[A-Za-zÀ-ÖØ-öø-ÿ\s.\-()]+$/.test(descripcionInput);

        if (!isValid) {
            descripcionError.innerHTML = '<strong>""Caracteres no permitidos.""</strong>';
        } else {
            descripcionError.innerHTML = '';
        }
    });
</script> --}}


@endsection
