<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function login(Request $request)
    {
        $credentials = [
            "email" => $request->email,
            "password" => $request->password,
        ];
        // dd($credentials);
        // Intenta autenticar al usuario por su email y contraseña
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('principal');
        } else {
            // dd("Las credenciales no coinciden");
            return redirect()->back()->withErrors(['error' => 'Credenciales incorrectas. Por favor, inténtalo de nuevo.'])->withInput($request->except('password'));
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect(route('login'));
    }
}

