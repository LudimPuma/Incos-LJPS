<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TipoModalidad;

class TipoModalidadController extends Controller
{
    public function __construct(){
        $this->middleware('can:crud-index-modalities')->only('index');
        $this->middleware('can:crud-create-modalities')->only('create');
        $this->middleware('can:crud-show-modalities')->only('show');
        $this->middleware('can:crud-edit-modalities')->only('edit');
    }
    public function index()
    {
        $tiposModalidad = TipoModalidad::all();
        return view('tipos_modalidad.index', compact('tiposModalidad'));
    }
    public function create()
    {
        return view('tipos_modalidad.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nombre_modalidad' => 'required|letters_spaces',
            'descripcion' => 'required|letters_dash_spaces_dot',
        ]);

        TipoModalidad::create($request->all());

        return redirect()->route('tipos_modalidad.index')
            ->with('success', 'Tipo de Modalidad creado exitosamente.');
    }
    public function show($id_tipo)
    {
        $tipoModalidad = TipoModalidad::find($id_tipo);
        return view('tipos_modalidad.show', compact('tipoModalidad'));
    }
    public function edit($id_tipo)
    {
        $tipoModalidad = TipoModalidad::find($id_tipo);
        return view('tipos_modalidad.edit', compact('tipoModalidad'));
    }
    public function update(Request $request, $id_tipo)
    {
        $request->validate([
            'nombre_modalidad' => 'required|letters_spaces',
            'descripcion' => 'required|letters_dash_spaces_dot',
            'estado' => 'required|only_zero_one',
            'motivos_estado',
        ]);

        $tipoModalidad = TipoModalidad::find($id_tipo);
        $tipoModalidad->nombre_modalidad = $request->input('nombre_modalidad');
        $tipoModalidad->descripcion = $request->input('descripcion');
        $tipoModalidad->estado = $request->input('estado');
        if ($request->input('estado') == 1 && $tipoModalidad->estado == 0) {
            $tipoModalidad->motivos_estado = ''; // Establecer motivos_estado en blanco
        } else {
            $tipoModalidad->motivos_estado = $request->input('motivos_estado');
        }
        $tipoModalidad->save();

        return redirect()->route('tipos_modalidad.index')->with('success', 'Tipo de Modalidad actualizado exitosamente.');
    }
}
