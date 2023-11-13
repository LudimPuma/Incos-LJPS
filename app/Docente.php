<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Docente extends Model
{
    protected $table = 'modalidad.docente';

    protected $primaryKey = 'id';

    protected $fillable = [
        'ci',
        'extencion_ci',
        'nombres',
        'a_p',
        'a_m',
        'genero',
        'direccion',
        'telefono',
        'celular',
        'fecha_nac',
        'estado_civil',
        'profesion',
        'registro',
        'estado',
        'motivos'
    ];
    public $timestamps = false;
    public function carreras()
    {
        return $this->belongsToMany(Carrera::class, 'modalidad.docente_carrera', 'fk_docente' ,'fk_carrera');
    }
    public function formularios()
    {
        return $this->hasMany(FormularioModalidad::class, 'id_tutor', 'id');
    }

}
