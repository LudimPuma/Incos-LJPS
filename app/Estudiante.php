<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estudiante extends Model
{
    protected $table = 'modalidad.estudiante'; // Nombre de la tabla en la base de datos
    protected $primaryKey = 'id'; // Clave primaria de la tabla
    public $timestamps = false;
    // Lista de atributos que pueden llenarse masivamente
    protected $fillable = [
        'ci',
        'id_carrera',
        'nombre',
        'a_p',
        'a_m',
        'celular',
        'registro',
        'estado',
        'motivos_estado'
    ];

    // Define las relaciones con otros modelos si es necesario
    // Ejemplo de una relación con la tabla Carrera (puedes ajustarla según tus necesidades):
    public function carrera()
    {
        return $this->belongsTo(Carrera::class, 'id_carrera', 'id');
    }
    public function formularios()
    {
        return $this->hasMany(FormularioModalidad::class, 'id_estudiante', 'id');
    }

    // Resto de las propiedades y métodos de tu modelo
}
