<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <link rel="stylesheet" href="{{ asset('pdf/bootstrap.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('pdf/pdf.css') }}" />
    <title>Reporte Modalidad de graduacion</title>
</head>
<body>
    <h1 class="text-center">Informe Anual - Modalidades de Graduación</h1>
    <h2 class="text-center">Gestión {{ $fecha_select }}</h2>

    <table class="table">
        <thead>
            <tr class="table-header">
                <th>Carrera</th>
                <th>Noobre Proyecto</th>
                <th>Año de Graduación</th>
                <th>Tutor</th>
                <th>Tipo de Modalidad</th>
                {{-- <th>Total de Formularios</th> --}}
            </tr>
        </thead>
        <tbody>
            @foreach ($reporte as $registro)
                <tr>
                    <td>{{ $registro->carrera }}</td>
                    <td>{{ $registro->nombre_pro}}</td>
                    <td>{{ $registro->anio_graduacion }}</td>
                    <td>{{ $registro->nombres }} {{$registro->a_p}} {{$registro->a_m}} </td>
                    <td>{{ $registro->tipo_modalidad }}</td>
                    {{-- <td>{{ $registro->total_formularios }}</td> --}}
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
