<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function create()
    {
        if (Auth::check()) {
            return redirect()->route('inicio');
        }

        return view('auth.login');
    }

    public function store(Request $request)
    {
        $datos = $request->validate([
            'usuario' => ['required', 'string', 'max:50'],
            'password' => ['required', 'string'],
        ], [
            'usuario.required' => 'Escribe tu nombre de usuario.',
            'usuario.max' => 'El usuario debe tener como máximo 50 caracteres.',
            'password.required' => 'Escribe tu contraseña.',
        ]);

        if (Auth::attempt($datos)) {
            $request->session()->regenerate();

            return redirect()->intended(route('inicio'));
        }

        return back()
            ->withErrors(['usuario' => 'Usuario o contraseña incorrectos.'])
            ->onlyInput('usuario');
    }

    public function destroy(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}