<?php

namespace App\Http\Controllers;

use App\Models\PuestosLaborale;
use Illuminate\Http\Request;

class PuestosLaboraleController extends Controller
{
    protected $entidadgableController;

    public function __construct(EntidadgableController $entidadgableController)
    {
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $puestoLaboral = new PuestosLaborale();
            $puestoLaboral->nombre = $request->nombre;
            $puestoLaboral->importancia = $request->importancia;
            $puestoLaboral->es_jefe = $request->es_jefe;
            $puestoLaboral->categoria_id = $request->categoria_id;

            $request->origen = 'PuestoLaboral';
            $entidadgable = $this->entidadgableController->store($request);

            if ($entidadgable->getStatusCode() == 200) {
                $puestoLaboral->save();
                return response()->json(['message' => 'Puesto laboral registrado'], 200);
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
     * @param  \App\Models\PuestosLaborale  $puestosLaborale
     * @return \Illuminate\Http\Response
     */
    public function show(PuestosLaborale $puestosLaborale)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PuestosLaborale  $puestosLaborale
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PuestosLaborale $puestosLaborale)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PuestosLaborale  $puestosLaborale
     * @return \Illuminate\Http\Response
     */
    public function destroy(PuestosLaborale $puestosLaborale)
    {
        //
    }
}
