<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ModelHasPermissions extends Model
{
    protected $table = 'model_has_permissions';
    protected $primaryKey = null; // Indicamos que no se utiliza una clave primaria incrementable.
    public $incrementing = false; // Desactivamos la auto-incrementación.
    public $timestamps = false; // Desactivamos la gestión de timestamps (created_at y updated_at).

    protected $fillable = [
        'permission_id',
        'model_type',
        'model_id',
    ];

    public function permission()
    {
        return $this->belongsTo(Permission::class, 'permission_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'model_id')->where('model_type', 'App\User');
    }
    public function role()
    {
        return $this->belongsTo(Roles::class, 'model_id')->where('model_type', 'App\Role');
    }

}
