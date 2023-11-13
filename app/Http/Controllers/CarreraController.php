<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Carrera;

class CarreraController extends Controller
{
    public function __construct(){
        $this->middleware('can:crud-index-career')->only('index');
        $this->middleware('can:crud-create-career')->only('create');
        $this->middleware('can:crud-show-career')->only('show');
        $this->middleware('can:crud-edit-career')->only('edit');
    }
    public function index()
    {
        $carreras = Carrera::all();
        return view('carreras.index', compact('carreras'));
    }
    public function create()
    {
        return view('carreras.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|unique:modalidad.carrera,nombre'
        ]);

        Carrera::create($request->all());

        return redirect()->route('carreras.index')->with('success', 'Carrera creada exitosamente.');
    }
    public function show(Carrera $carrera)
    {
        return view('carreras.show', compact('carrera'));
    }
    public function edit(Carrera $carrera)
    {
        return view('carreras.edit', compact('carrera'));
    }
    public function update(Request $request, Carrera $carrera)
    {
        $request->validate([
            'nombre' => 'required|unique:modalidad.carrera,nombre,' . $carrera->id,
            'estado' => 'required|in:0,1',
            'motivos_estado',
        ]);
        if ($request->input('estado') == 1 && $carrera->estado == 0) {
            $request->merge(['motivos_estado' => '']);
        }
        $carrera->update($request->all());

        return redirect()->route('carreras.index')->with('success', 'Carrera actualizada exitosamente.');
    }
}

