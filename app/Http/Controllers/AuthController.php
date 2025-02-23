<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class AuthController extends Controller
{
    // Mostrar el formulario de inicio de sesión
    public function showLoginForm()
    {
        return view('login');
    }

    // Procesar el inicio de sesión
    public function login(Request $request)
    {
        $response = Http::post('http://localhost:3000/apirain/login', [
            'email' => $request->email,
            'password' => $request->password,
        ]);

        if ($response->successful()) {
            $data = $response->json();
            $user = $data['user'];

            
            if ($user['rol'] == 1) { 
                
                $usersResponse = Http::get('http://localhost:3000/apirain/registros');
                $users = $usersResponse->successful() ? $usersResponse->json() : [];

                return view('admin', ['user' => $user, 'users' => $users]);
            } else { 
                return redirect()->route('dashboard')->with(['user' => $user, 'success' => 'Login exitoso']);
            }
        } else {
            $error = $response->json()['error'] ?? 'Credenciales incorrectas';

            if ($error === 'Cuenta bloqueada. Intente de nuevo más tarde.') {
                return back()->with('blocked', $error);
            }

            return back()->withErrors(['error' => $error]);
        }
    }

    // Mostrar el formulario de registro
    public function showRegisterForm()
    {
        return view('register');
    }

    // Realizar el registro
    public function register(Request $request)
    {
        $response = Http::post('http://localhost:3000/apirain/registros', [
            'nombre' => $request->nombre,
            'email' => $request->email,
            'password' => $request->password,
        ]);

        if ($response->successful()) {
            return redirect()->route('login')->with('success', 'Usuario registrado exitosamente');
        } else {
            $error = $response->json()['error'] ?? 'Error en el registro';
            return back()->withErrors(['error' => $error]);
        }
    }

    // Cerrar sesión
    public function logout(Request $request)
    {
        return redirect()->route('login')->with('success', 'Sesión cerrada exitosamente');
    }

    // Mostrar el dashboard del usuario normal
    public function dashboard(Request $request)
    {
        $user = $request->session()->get('user');

        if (!$user) {
            return redirect()->route('login')->with('error');
        }

        return view('dashboard', ['user' => $user]);
    }
}