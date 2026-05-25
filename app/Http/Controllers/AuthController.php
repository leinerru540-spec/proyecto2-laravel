<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
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
            'email'    => 'required|email',
            'password' => 'required'
        ]);

        $usuario = Usuario::where('email', $request->email)->first();

        if (!$usuario || !Hash::check($request->password, $usuario->password)) {
            return back()->withErrors([
                'email' => 'Credenciales incorrectas'
            ]);
        }

        $token = $usuario->createToken('token')->plainTextToken;

        session(['token' => $token]);

        Auth::login($usuario);

        $request->session()->regenerateToken();
        $request->session()->regenerate();

        if ($usuario->rol_id == 2) {
            return redirect('/admin');
        }

        return redirect('/solicitudes');
    }

<<<<<<< HEAD
    public function registro(Request $request)
    {
        $request->validate([
            'nombre'   => 'required|string|max:255',
            'email'    => 'required|email|unique:usuarios,email',
            'password' => 'required|min:6',
        ]);

=======
    public function register(Request $request)
    {
        // Validación de datos
        $request->validate([
            'nombre'   => 'required|string|max:255',
            'email'    => 'required|email|unique:usuarios,email',
            'password' => 'required|string|min:6|confirmed',
        ]);

        // Crear nuevo usuario
>>>>>>> 7701a195e6a424e2ed1ac0308c500ced9e6647e3
        $usuario = Usuario::create([
            'nombre'   => $request->nombre,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
<<<<<<< HEAD
            'rol_id'   => 3, // rol cliente
        ]);


        Cliente::create([
            'nombre'   => $request->nombre,
            'correo'   => $request->email,
            'telefono' => 'N/A',
            'empresa'  => 'N/A',
        ]);

        Auth::login($usuario);

        return redirect('/login');
=======
            'rol_id'   => 1, // rol por defecto
        ]);

        // Iniciar sesión automáticamente
        Auth::login($usuario);

        return redirect('/dashboard')->with('success', 'Usuario registrado correctamente');
>>>>>>> 7701a195e6a424e2ed1ac0308c500ced9e6647e3
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}

