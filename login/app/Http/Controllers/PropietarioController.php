<?php

namespace App\Http\Controllers;

use App\Models\Propietario;
use Illuminate\Http\Request;

class PropietarioController extends Controller
{
    //
    public function index(){
        return Propietario::all();
    }

    public function store(Request $request){

        $input = $request->all();
        $listo = Propietario::create($input);
        return $listo;

    }

    public function show($id){

        $find = Propietario::find($id);
        if($id == null){
            return response()->json(
                [
                    'message'=>'propietario no encontrado'
                ],
                404
            );
        }
        else{
            return $find;
        }

    }

    public function update(Request $request, $id){
        $pro = Propietario::find($id);
        if($pro == null){
            return response()->json([
                'message'=>'no se encontro el propietario'
            ],404);
        }
        else{
            $propietario = $request->all();
            return $pro->update($propietario);
        }
    }

    public function destroy($id){
        $pro = Propietario::find($id);
        if($pro == null){
            return response()->json([
                'message'=>'no se encontro el propietario'
            ],404);
        }
        else{
            return $pro->delete();
        }
    }
}
