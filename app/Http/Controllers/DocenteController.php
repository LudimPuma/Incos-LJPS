<?php

namespace App\Http\Controllers;
use App\Docente;
use App\Carrera;
use Illuminate\Http\Request;

class DocenteController extends Controller
{
    public function __construct(){
        $this->middleware('can:crud-index-teacher')->only('index');
        $this->middleware('can:crud-create-teacher')->only('create');
        $this->middleware('can:crud-show-teacher')->only('show');
        $this->middleware('can:crud-edit-teacher')->only('edit');
    }
    public function index()
    {
        $docentes = Docente::all();
        return view('docentes.index', compact('docentes'));
    }
    public function create()
    {
        $carreras = Carrera::all();
        return view('docentes.create', compact('carreras'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'ci' => 'required',
            'extencion_ci' => 'required',
            'nombres' => 'required',
            'a_p',
            'a_m' => 'required',
            'genero' => 'required',
            'direccion' => 'required',
            'telefono',
            'celular' => 'required',
            'fecha_nac' => 'required',
            'estado_civil' => 'required',
            'profesion' => 'required',
        ]);
        $request->merge(['estado' => true]);
        $docente = Docente::create($request->all());
        $docente->carreras()->attach($request->carreras);
        return redirect()->route('docentes.index')
            ->with('success', 'Docente creado exitosamente.');
    }
    public function show(Docente $docente)
    {
        return view('docentes.show', compact('docente'));
    }
    public function edit(Docente $docente)
    {
        $carreras = Carrera::all();
        $carreraIds = $docente->carreras->pluck('id')->toArray();

        return view('docentes.edit', compact('docente', 'carreras', 'carreraIds'));
    }
    public function update(Request $request, Docente $docente)
    {
        $request->validate([
            'ci' => 'required|letters_dash_spaces_dot',
            'extencion_ci' => 'required|letters_spaces',
            'nombres' => 'required|letters_spaces',
            'a_p ',
            'a_m' => 'required|letters_spaces',
            'genero' => 'required|letters_spaces',
            'direccion' => 'required',
            'telefono' => 'required',
            'celular' => 'required',
            'fecha_nac' => 'required',
            'estado_civil' => 'required',
            'profesion' => 'required',
            'estado' => 'required|in:0,1',
            'motivos',
        ]);
        if ($request->input('estado') == 1 && $docente->estado == 0) {
            $request->merge(['motivos' => '']);
        }
        $request->merge(['estado' => (bool) $request->estado]);

        $docente->update($request->except('carreras'));

        $docente->carreras()->sync($request->input('carreras', []));

        return redirect()->route('docentes.index')
            ->with('success', 'Docente actualizado exitosamente.');
    }
}
