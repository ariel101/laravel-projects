<?php

namespace App\Http\Controllers;

use App\Models\Mascotas;
use Illuminate\Http\Request;

class MascotaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return Mascotas::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $input = $request->all();
        $store = Mascotas::create($input);
        return $store;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $mascota = Mascotas::find($id);
        if($mascota == null){

            return response()->json([
                'mensaje'=>'mascota no encontrado',
            ], 404);

        }
        else{
            return $mascota;
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $mascota = Mascotas::find($id);
        if($mascota == null){
            response()->json([
                'mensaje'=>'no existe la mascota '
            ],404);

        }
        else{
            $mas = $request->all();
            $mascota->update($mas);
            return $mas;
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $mascota = Mascotas::find($id);
        if($mascota == null){

            response()->json([
                'mensaje'=>'no se enconro la mascota'
            ],404);

        }
        else{
            $mascota->delete();
            return $mascota;
        }
    }
}
