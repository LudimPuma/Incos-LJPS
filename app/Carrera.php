<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrera extends Model
{
    protected $connection = 'modalidad';
    protected $schema = 'modalidad';
    protected $table = 'modalidad.carrera';

    protected $primaryKey = 'id';

    protected $fillable = [
        'nombre',
        'estado',
        'motivos_estado'
    ];
    public $timestamps = false;
    public function docentes()
    {
        return $this->belongsToMany(Docente::class, 'modalidad.docente_carrera', 'fk_carrera', 'fk_docente');
    }
    public function formularios()
    {
        return $this->hasMany(FormularioModalidad::class, 'id_carrera_form', 'id');
    }

}
