<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleHasPermission extends Model
{
    protected $table = 'role_has_permissions';
    public function role()
    {
        return $this->belongsTo(Roles::class, 'role_id');
    }
    public function permission()
    {
        return $this->belongsTo(Permissions::class, 'permission_id');
    }
}

