<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Muestra la lista de usuarios.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $users = User::all();
        return view('admin.usuarios.index', compact('users'));
    }

    /**
     * Actualiza el rol de un usuario.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function updateRole(Request $request, $id)
    {
        $user = User::findOrFail($id);
        
        // Verificar si el usuario autenticado tiene permiso para actualizar roles (administrador)
        // Esto puede hacerse utilizando políticas de autorización.

        $request->validate([
            'rol' => 'required|numeric|between:1,3', // Ajusta las reglas según tus necesidades
        ]);

        $user->update(['rol' => $request->rol]);

        return redirect()->back()->with('success', 'El rol del usuario se ha actualizado correctamente.');
    }
}