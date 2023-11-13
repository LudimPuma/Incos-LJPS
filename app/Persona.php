<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
    protected $table = 'personas';
    public $timestamps = false;
    protected $fillable = [
        'ci',
        'extencion',
        'nombres',
        'apellido_p',
        'apellido_m',
        'genero',
        'direccion',
        'telefono',
        'celular',
        'fecha_nac',
        'estado_civil',
        'profesion',
        'registro',
    ];
    public function user()
    {
        return $this->hasOne(User::class, 'persona_id');
    }
}
