<?php

namespace App\Http\Controllers;

use App\Models\Trabajadore;
use Illuminate\Http\Request;

class TrabajadoreController extends Controller
{
    protected $usuarioController, $entidadgableController;

    public function __construct(UsuarioController $usuarioController, EntidadgableController $entidadgableController)
    {
        $this->usuarioController = $usuarioController;
        $this->entidadgableController = $entidadgableController;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    private function subirArchivo($file) 
    {
        try {
            $fileName = time() . '-' . $file->getClientOriginalName();
            $file->move(public_path('images'), $fileName);
            return response()->json([
                'message' => 'Archivo subido',
                'fileName' => $fileName
            ], 200);
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
            $request->validate([
                'nombre' => 'required',
                'apellidos' => 'required',
                'dni' => 'required|unique:trabajadores|max:9',
                'fechaNacimiento' => 'required',
                'direccion' => 'required',
                'foto' => 'required|file|image|mimes:jpg,bmp,png'
            ]);

            $trabajador = new Trabajadore();
            $trabajador->nombre = $request->nombre;
            $trabajador->apellidos = $request->apellidos;
            $trabajador->dni = $request->dni;
            $trabajador->fecha_nacimiento = $request->fechaNacimiento;
            $trabajador->direccion = $request->direccion;
            
            if ($request->hasFile('foto') && filesize($request->foto) <= 2000000) {
                $file = $request->file('foto');
                $fileName = $this->subirArchivo($file);
                $trabajador->foto = $fileName->original['fileName'];
            } else {
                return response()->json([
                    'message' => 'El tamaño del archivo supera el límite permitido'
                ], 401);
            }

            $usuario = $this->usuarioController->store($request);
            $trabajador->usuario_id = $usuario;
            $request->origen = 'Trabajador';
            $entidadgable = $this->entidadgableController->store($request);

            if ($entidadgable->getStatusCode() == 200) {
                $trabajador->save();
                return response()->json(['message' => 'Trabajador registrado'], 200);
            }
        } catch (\Exception $e) {
            return response()->json([
                'message' => $e->getMessage()
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Trabajadore  $trabajadore
     * @return \Illuminate\Http\Response
     */
    public function show(Trabajadore $trabajadore)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Trabajadore  $trabajadore
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Trabajadore $trabajadore)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Trabajadore  $trabajadore
     * @return \Illuminate\Http\Response
     */
    public function destroy(Trabajadore $trabajadore)
    {
        //
    }
}
