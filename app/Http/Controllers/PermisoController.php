<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;

class PermisoController extends Controller
{
    public function index()
    {
        $permissions = Permission::all();

        return view('admin.permissions.index', compact('permissions'));
    }
    public function show($id)
    {
        $permission = Permission::findOrFail($id);

        return view('admin.permissions.show', compact('permission'));
    }
    public function create()
    {
        return view('admin.permissions.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:permissions',
            'details' => 'required',
        ]);
        Permission::create([
            'name' => $request->input('name'),
            'details' => $request->input('details'),
            'guard_name' => 'web',
        ]);
        return redirect()->route('permissions.index')->with('success', 'Permiso creado exitosamente.');
    }
}
