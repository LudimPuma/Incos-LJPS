<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

class ModelHasRoles extends Model
{
    use HasRoles;
    protected $table = 'model_has_roles';
    protected $primaryKey = null;
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = ['role_id', 'model_id', 'model_type'];

    public function user()
    {
        return $this->belongsTo(Users::class, 'model_id');
    }

    public function role()
    {
        return $this->belongsTo(Roles::class, 'role_id');
    }
}
