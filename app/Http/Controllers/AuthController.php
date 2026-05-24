<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $usuario = Usuario::where('email', $request->email)->first();

        if (!$usuario || !Hash::check($request->password, $usuario->password)) {

            return back()->withErrors([
                'email' => 'Credenciales incorrectas'
            ]);
        }

        $token = $usuario->createToken('token')->plainTextToken;

        session([
            'token' => $token
        ]);

        Auth::login($usuario);

        $request->session()->regenerateToken();
        $request->session()->regenerate();


        if ($usuario->rol_id == 2) {
            return redirect('/admin');
        }

        return redirect('/solicitudes');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
