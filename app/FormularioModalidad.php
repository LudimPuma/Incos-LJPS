<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormularioModalidad extends Model
{
    protected $table = 'modalidad.formulario_modalidad';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'id_estudiante',
        'id_carrera_form',
        'nombre_pro',
        'institucion',
        'id_tutor',
        'anio_graduacion',
        'fecha_registro',
        'registro_id',
        'imagen',
        'pdf',
        'estado',
        'motivos_estado'
    ];

    public function estudiante()
    {
        return $this->belongsTo(Estudiante::class, 'id_estudiante', 'id');
    }

    public function tutor()
    {
        return $this->belongsTo(Docente::class, 'id_tutor', 'id');
    }

    public function carrera()
    {
        return $this->belongsTo(Carrera::class, 'id_carrera_form', 'id');
    }
}
