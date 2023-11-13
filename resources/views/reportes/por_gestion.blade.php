@extends('layout')
@section('content')
<div class="tables-wrapper">
    <br><br><br><br>
    <form id="miFormulario" action="#" method="POST" target="_blank">
        @csrf
        <div class="card-style mb-30">
            <h1 style="text-align: center">Reporte por Gestión</h1>
            <br>
            <select id="seleccion" name="seleccion">
                <option value="">Seleccione</option>
                <option value="Modalidad">Modalidades de Graduacion</option>
            </select>
            <div class="modal-body">
                <div class="form-group">
                    <label for="a">Año:</label>
                    <input type="number" id="a" name="a" value="{{ date("Y") }}" class="form-control" required>
                </div>
            </div>
            <br>
            <button type="button" id="generar-btn" class="btn btn-primary">Generar</button>
        </div>
    </form>

    <p id="seleccionado"></p>
    <p id="anho"></p>
</div>

<script>
    document.getElementById("generar-btn").addEventListener("click", function (event) {
        var seleccion = document.getElementById("seleccion").value;
        var year = document.getElementById("a").value;

        if (seleccion === "Modalidad") {
            // Si se selecciona "IAAS", cambiar el action del formulario a la ruta correspondiente
            document.getElementById("miFormulario").action = "{{ route('reporte.anual.modalidad') }}";
         }else if (seleccion === "") {
            console.log("vacio");
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Seleccione una opción',
            });
            return; // Salir de la función sin hacer nada
        }

        // Mostrar la selección y el año en los elementos <p>
        document.getElementById("seleccionado").innerText = "Selección: " + seleccion;
        document.getElementById("anho").innerText = "Año: " + year;

        // Enviar el formulario
        document.getElementById("miFormulario").submit();
    });
</script>

@endsection
