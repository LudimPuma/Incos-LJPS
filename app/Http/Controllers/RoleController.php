<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('admin.roles.index', compact('roles'));
    }

    public function create()
    {
        return view('admin.roles.create');
    }

    public function store(Request $request)
    {
        $role = new Role();
        $role->name = $request->input('name');
        $role->guard_name = 'web';
        $role->details = $request->input('details');
        $role->save();

        return redirect()->route('roles.index')->with('success', 'Rol creado exitosamente');
    }

    public function edit($id)
    {
        $rol = Role::find($id);
        $permissions = Permission::all();
        // dd($permissions);
        return view('admin.roles.edit', compact('rol', 'permissions'));
    }

    public function update(Request $request, $id)
    {
        $rol = Role::find($id);

        $rol->permissions()->sync($request->input('permissions', []));

        return redirect()->route('roles.index', $rol)->with('success', 'Rol actualizado exitosamente');
    }
}
