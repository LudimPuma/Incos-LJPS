<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipoModalidad extends Model
{
    protected $table = 'modalidad.tipo_modalidad';
    protected $primaryKey = 'id_tipo';
    protected $fillable = ['nombre_modalidad', 'descripcion','estado','motivos_estado'];
    public $timestamps = false;
}
