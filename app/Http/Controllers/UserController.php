<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Persona;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
class UserController extends Controller
{
    public function index()
    {
        $users = User::orderBy('id', 'asc')->get();;
        return view('admin.users.index', compact('users'));
    }
    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
    }
    public function store(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|unique:users',
            'password' => 'required|min:8',
            'ci' => 'required',
            'extencion' => 'required',
            'nombres' => 'required',
            'apellido_m' => 'required',
            'genero' => 'required|in:M,F',
            'direccion' => 'required',
            'celular' => 'required',
            'fecha_nac' => 'required|date',
            'estado_civil' => 'required',
            'profesion' => 'required',
        ]);
        $persona = new Persona;
        $persona->ci = $request->input('ci');
        $persona->extencion = $request->input('extencion');
        $persona->nombres = $request->input('nombres');
        $persona->apellido_p = $request->input('apellido_p');
        $persona->apellido_m = $request->input('apellido_m');
        $persona->genero = $request->input('genero');
        $persona->direccion = $request->input('direccion');
        $persona->telefono = $request->input('telefono');
        $persona->celular = $request->input('celular');
        $persona->fecha_nac = $request->input('fecha_nac');
        $persona->estado_civil = $request->input('estado_civil');
        $persona->profesion = $request->input('profesion');
        $persona->save();

        $nombre = $persona->nombres . ' ' . $persona->apellido_p . ' ' . $persona->apellido_m;

        $user = new User;
        $user->username = $nombre;
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));

        $user->persona()->associate($persona);
        $user->save();
        $user->assignRole($request->input('roles'));
        return redirect()->route('usuarios.index')->with('success', 'Usuario creado exitosamente');
    }
    public function show($id)
    {
        $user = User::findOrFail($id);
        $roles = Role::all();

        return view('admin.users.show', compact('user', 'roles'));
    }

    // public function show($id)
    // {
    //     $user = User::find($id);
    //     $roles = $user->roles;
    //     $rolePermissions = [];

    //     foreach ($roles as $role) {
    //         $permissions = $role->permissions;
    //         $rolePermissions[$role->name] = $permissions;
    //     }
    //     return view('admin.users.show', compact('user', 'roles', 'rolePermissions'));
    // }
    public function edit($id)
    {
        $user = User::findOrFail($id);
        $persona = $user->persona;
        $roles = Role::all();
        return view('admin.users.edit', compact('user', 'persona', 'roles'));
    }
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $this->validate($request, [
            'email' => 'required|unique:users,email,' . $user->id,
            'password' => 'nullable|min:8',
            'ci' => 'required',
            'extencion' => 'required',
            'nombres' => 'required',
            'apellido_p' => 'required',
            'apellido_m' => 'required',
            'genero' => 'required|in:M,F',
            'direccion' => 'required',
            'celular' => 'required',
            'fecha_nac' => 'required|date',
            'estado_civil' => 'required',
            'profesion' => 'required',
        ]);
        $persona = $user->persona;
        $persona->ci = $request->input('ci');
        $persona->extencion = $request->input('extencion');
        $persona->nombres = $request->input('nombres');
        $persona->apellido_p = $request->input('apellido_p');
        $persona->apellido_m = $request->input('apellido_m');
        $persona->genero = $request->input('genero');
        $persona->direccion = $request->input('direccion');
        $persona->telefono = $request->input('telefono');
        $persona->celular = $request->input('celular');
        $persona->fecha_nac = $request->input('fecha_nac');
        $persona->estado_civil = $request->input('estado_civil');
        $persona->profesion = $request->input('profesion');
        $persona->save();

        $user->email = $request->input('email');

        // Actualiza la contraseña si se proporcionó
        if (!empty($request->input('password'))) {
            $user->password = bcrypt($request->input('password'));
        }
        $user->save();
        $user->syncRoles($request->input('roles'));

        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado exitosamente');
    }

}
