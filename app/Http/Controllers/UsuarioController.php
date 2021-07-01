<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    private function checkEmailExists($data) 
    {
        try {
            $nombre = $data['nombre'];
            $apellido = $data['apellido'];
            $longApellido = strlen($apellido);
            $chars = $data['chars'];
            $email = $email = $nombre . substr($apellido, 0, $chars) . '@test.com';
            $usuarios = Usuario::where('email', $email)->first();

            if (!empty($usuarios) && $chars <= $longApellido) {
                $chars++;
                $email = $nombre . substr($apellido, 0, $chars) . '@test.com';
                $data['email'] = $email;
                $data['chars'] = $chars;
                $email = $this->checkEmailExists($data);
            } 

            return $email;
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $usuario = new Usuario();
            $usuario->nombre = $request->nombre;
            $usuario->apellidos = $request->apellidos;
            $nombres = explode(" ", $usuario->nombre);
            $nombre = strtolower($nombres[0]);
            $apellidos = explode(" ", $usuario->apellidos);
            $apellido = strtolower($apellidos[0]);
            $chars = 1;
            $data = array(
                'nombre' => $nombre,
                'apellido' => $apellido,
                'chars' => $chars
            );
            $email = $this->checkEmailExists($data);
            $usuario->email = $email;
            $usuario->password = Hash::make($request->dni);
            $usuario->save();
            return $usuario->id;
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function destroy(Usuario $usuario)
    {
        //
    }
}
