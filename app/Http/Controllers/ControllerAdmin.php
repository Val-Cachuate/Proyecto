<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ControllerAdmin extends Controller
{
    // Listar todos los administradores
    public function admin()
    {
        $response = Http::get('http://localhost:3000/apirain/administradores');

        if ($response->successful()) {
            $data = $response->json();
            return view('admin', compact('data'));
        } else {
            return response()->json(['error' => 'Error al consultar la API'], 500);
        }
    }

    // Mostrar detalles de un administrador específico
    public function detalleAdmin($id)
    {
        $response = Http::get("http://localhost:3000/apirain/administradores/{$id}");

        if ($response->successful()) {
            $administrador = $response->json();
            return view('detalleAdmin', compact('administrador'));
        } else {
            return response()->json(['error' => 'Error al consultar la API'], 500);
        }
    }

    // Mostrar formulario para crear un nuevo administrador
    public function altaAdmin()
    {
        return view('altaAdmin');
    }

    // Registrar un nuevo administrador
    public function registrarAdmin(Request $request)
    {
        $response = Http::post('http://localhost:3000/apirain/administradores', [
            'nombre' => $request->nombre,
            'appat' => $request->appat,
            'apmat' => $request->apmat,
            'fn' => $request->fn,
            'genero' => $request->genero,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Encriptar la contraseña
            'id_rol' => $request->id_rol ?? 1, // Valor por defecto si no se proporciona
            'activo' => $request->activo,
            'intentos_fallidos' => $request->intentos_fallidos ?? 0, // Valor por defecto si no se proporciona
            'bloqueado_hasta' => $request->bloqueado_hasta,
        ]);

        if ($response->successful()) {
            return redirect()->route('admin')->with('success', 'Administrador registrado correctamente');
        } else {
            return response()->json(['error' => 'Error al registrar el administrador'], 500);
        }
    }

    // Mostrar formulario para editar un administrador existente
    public function editarAdmin($id)
    {
        $response = Http::get("http://localhost:3000/apirain/administradores/{$id}");

        if ($response->successful()) {
            $administrador = $response->json();
            return view('editarAdmin', compact('administrador'));
        } else {
            return redirect()->route('admin')->with('error', 'No se pudo obtener la información del administrador');
        }
    }

    // Actualizar un administrador existente
    public function salvarAdmin(Request $request, $id)
    {
        $data = [
            'nombre' => $request->nombre,
            'appat' => $request->appat,
            'apmat' => $request->apmat,
            'fn' => $request->fn,
            'genero' => $request->genero,
            'email' => $request->email,
            'id_rol' => $request->id_rol,
            'intentos_fallidos' => $request->intentos_fallidos,
            'bloqueado_hasta' => $request->bloqueado_hasta,
            'updated_at' => now(),
        ];

        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password); // Encriptar la contraseña si se proporciona
        }

        $response = Http::put("http://localhost:3000/apirain/administradores/{$id}", $data);

        if ($response->successful()) {
            return redirect()->route('admin')->with('success', 'Administrador actualizado correctamente');
        } else {
            return back()->with('error', 'Error al actualizar los datos');
        }
    }

    // Eliminar un administrador
    public function eliminarAdmin($id)
    {
        $response = Http::delete("http://localhost:3000/apirain/administradores/{$id}");

        if ($response->successful()) {
            return redirect()->route('admin')->with('success', 'Administrador eliminado correctamente');
        } else {
            return redirect()->route('admin')->with('error', 'Error al eliminar el administrador');
        }
    }
}