<?php

namespace App\Http\Controllers;
use SnappyPDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\FormularioModalidad;
use App\TipoModalidad;
use App\Docente;
use App\Carrera;
use Carbon\Carbon;
use App\Estudiante;
use PDF;
class FormularioModalidadController extends Controller
{
    public function __construct(){
        $this->middleware('can:create-form-modality')->only('create');
        $this->middleware('can:form-index-modality')->only('index');
        $this->middleware('can:formulario-edit-modality')->only('edit');
        $this->middleware('can:report-form-modality')->only('reporte_anual');
    }
    public function index()
    {
        $formularios = FormularioModalidad::orderBy('id', 'desc')->get();
        return view('formulario_modalidad.index', compact('formularios'));
    }
    public function create(Request $request)
    {
        $tipoMods = TipoModalidad::all();
        $carreras = Carrera::all();
        $docentes = Docente::all();

        return view('formulario_modalidad.create', compact('tipoMods', 'docentes', 'carreras'));
    }
    public function store(Request $request)
    {
        $fechaActual = Carbon::now('America/La_Paz')->format('Y-m-d');
        $estudiante = new Estudiante();
        $estudiante->ci=$request->input('ci');
        $estudiante->id_carrera=$request->input('id_carrera');
        $estudiante->nombre=$request->input('nombre');
        $estudiante->a_p=$request->input('a_p');
        $estudiante->a_m=$request->input('a_m');
        $estudiante->celular=$request->input('celular');
        $estudiante->save();
        $idEstudiante = $estudiante->id;
        $carreraEstudiante = $estudiante->id_carrera;
        // PDF
        $pdfPath = null;
        if ($request->hasFile('pdf')) {
            $pdfPath = $request->file('pdf')->store('pdfs', 'public');
        }
        // imagen
        $imagenPath = null;
        if ($request->hasFile('imagen')) {
            $imagenPath = $request->file('imagen')->store('images', 'public');
        }
        $formulario = new FormularioModalidad();
        $formulario->id_estudiante = $idEstudiante;
        $formulario->id_carrera_form = $carreraEstudiante;
        $formulario->nombre_pro = $request->input('nombre_pro');
        $formulario->institucion = $request->input('institucion');
        $formulario->id_tutor = $request->input('id_tutor');
        $formulario->anio_graduacion = $request->input('anio_graduacion');
        $formulario->id_tipo_m = $request->input('id_tipo_m');
        $formulario->fecha_registro = $fechaActual;
        $formulario->pdf=$pdfPath;
        $formulario->imagen=$imagenPath;
        $formulario->save();

        return redirect()->route('principal')->with('success', 'Formulario guardado exitosamente.');
    }
    public function obtenerDocentes($carreraId)
    {
        $docentes = DB::table('modalidad.docente_carrera as dc')
            ->join('modalidad.docente as d', 'dc.fk_docente', '=', 'd.id')
            ->where('dc.fk_carrera', $carreraId)
            ->where('d.estado', true)
            ->select('d.*')
            ->get();
        return response()->json(['docentes' => $docentes]);

    }
    public function edit($id)
    {
        $formulario = FormularioModalidad::find($id);
        $estudiante = Estudiante::find($formulario->id_estudiante);
        $tipoMods = TipoModalidad::all();
        $carreras = Carrera::all();
        $docentes = Docente::all();

        return view('formulario_modalidad.edit', compact('formulario', 'estudiante', 'tipoMods', 'docentes', 'carreras'));
    }
    public function update(Request $request, $id)
    {
        $formulario = FormularioModalidad::find($id);

        $estudiante = Estudiante::find($formulario->id_estudiante);
        $estudiante->ci = $request->input('ci');
        $estudiante->id_carrera = $request->input('id_carrera');
        $estudiante->nombre = $request->input('nombre');
        $estudiante->a_p = $request->input('a_p');
        $estudiante->a_m = $request->input('a_m');
        $estudiante->celular = $request->input('celular');
        $estudiante->save();

        $formulario->id_carrera_form = $request->input('id_carrera');
        $formulario->nombre_pro = $request->input('nombre_pro');
        $formulario->institucion = $request->input('institucion');
        $formulario->id_tutor = $request->input('id_tutor');
        $formulario->anio_graduacion = $request->input('anio_graduacion');
        $formulario->id_tipo_m = $request->input('id_tipo_m');
        $formulario->estado = $request->input('estado');
        $formulario->motivos_estado = $request->input('motivos_estado');
        if ($request->hasFile('nuevaimagen')) {
            if ($formulario->imagen) {
                Storage::disk('public')->delete($formulario->imagen);
            }
            $imagenPath = $request->file('nuevaimagen')->store('images', 'public');
            $formulario->imagen = $imagenPath;
        }

        if ($request->hasFile('nuevopdf')) {
            if ($formulario->pdf) {
                Storage::disk('public')->delete($formulario->pdf);
            }
            $pdfPath = $request->file('nuevopdf')->store('pdfs', 'public');
            $formulario->pdf = $pdfPath;
        }

        $formulario->save();

        return redirect()->route('formulario_modalidad.index')->with('success', 'Formulario actualizado exitosamente.');
    }
    public function reporte_anual(Request $request)
    {
        $fechaSeleccionada = $request->a;
        $reporte = DB::table('modalidad.carrera as c')
            ->join('modalidad.formulario_modalidad as f', 'c.id', '=', 'f.id_carrera_form')
            ->join('modalidad.tipo_modalidad as t', 'f.id_tipo_m', '=', 't.id_tipo')
            ->join('modalidad.docente as d', 'f.id_tutor', '=', 'd.id')
            ->select(
                DB::raw('LOWER(c.nombre) as carrera'),
                'f.anio_graduacion',
                'f.nombre_pro',
                'd.nombres',
                'd.a_p',
                'd.a_m',
                't.nombre_modalidad as tipo_modalidad',
                DB::raw('COUNT(*) as total_formularios')
            )
            ->where('f.estado', true)
            ->where('f.anio_graduacion', $fechaSeleccionada)
            ->groupBy('carrera', 'anio_graduacion', 'tipo_modalidad','nombre_pro','nombres','a_p','a_m') // Agrupacion por tipo de modalidad
            ->orderBy('carrera')
            ->orderBy('anio_graduacion')
            ->orderBy('tipo_modalidad')
            ->get();


        $data = [
            'fecha_select' => $fechaSeleccionada,
            'reporte' => $reporte,
        ];
        $pdf = PDF::loadView('formulario_modalidad.PDF.reporte_anual', $data);

        $footerPath = base_path('resources/views/pdf/footer.html');
        $headerPath = base_path('resources/views/pdf/header.html');

        $pdf->setOptions([
            'orientation' => 'portrait',
            'footer-spacing' => 10,
            'margin-top' => 30,
            'header-spacing' => 10,
            'margin-bottom' => 20,
            'footer-font-size'=> 12,
            'footer-html' => $footerPath,
            'header-html' => $headerPath,
        ]);
        $nombreArchivo = 'Reporte_ANUAL_Modalidad_Graduacion_' . $fechaSeleccionada . '.pdf';
        return response($pdf->output(), 200, [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="' . $nombreArchivo . '"'
        ]);
    }
}
