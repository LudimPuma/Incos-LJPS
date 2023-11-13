@extends('layout')

@section('content')
@php
    date_default_timezone_set('America/La_Paz');
    $hora_actual = date('H');
    $mensaje = '';

    if ($hora_actual >= 5 && $hora_actual < 12) {
        $mensaje = 'Buenos días';
    } elseif ($hora_actual >= 12 && $hora_actual < 18) {
        $mensaje = 'Buenas tardes';
    } else {
        $mensaje = 'Buenas noches';
    }
@endphp
<h1 style="text-align: center">
    {{ $mensaje }} {{ Auth::user()->persona->nombres }}
</h1>

@endsection
