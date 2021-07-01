<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function login(Request $request): Response
    {
        $fields = $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $usuario = Usuario::where('email', $fields['email'])->first();

        if (!$usuario || !Hash::check($fields['password'], $usuario->password)) {
            return response([
                'message' => 'El email o la contraseña son incorrectos'
            ], 401);
        }

        $data = [
            'email' => $fields['email'],
            'nombres' => $usuario->nombre,
            'apellidos' => $usuario->apellidos
        ];

        $this->storeSession($request, $usuario);
        
        return response($data, 200);
    }

    public function getSession(Request $request) 
    {
        if ($request->session()->has('usuario')) {
            echo $request->session()->get('id');
        }
    }

    public function storeSession(Request $request, $usuario)
    {
        $session = $request->session()->put(['nombre' => $usuario->nombre, 'id' => $usuario->usuario_id]);
        return $session;
    }

    public function destroySession(Request $request) 
    {
        $request->session()->forget(['usuario', 'id']);
    }

    public function logout(Request $request) 
    {
        $this->destroySession($request);
        return response(null, 200);
    }
}
