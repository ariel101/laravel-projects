<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return Category::all();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $usuario = $request->attributes->get('usuario');
        $rol = collect($usuario->user->roles)->first();
        //$rol = $usuario->user->roles;
        $name = $rol->name;
        //return response()->json($name);
        return $name;

        if ($name === 'admin') {
            $input = $request->all();
            $agenda = Category::create($input);
            return response()->json([
                'messgg' => 'exito'.$agenda
            ]);
        }
        else{
            return response()->json([
                'messagge' => 'error, usted no esta autorizado para realizar esta accion'
            ]);
        }

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $category = Category::find($id);
        if($category == null){

            return response()->json([
                'mensaje'=> 'no se encontro la categoria'
            ]);
        }
        return $category;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $usuario = $request->attributes->get('usuario');
        $rol = collect($usuario->user->roles)->first();
        $name = $rol->name;
        if($name == 'admin'){
            $input = $request->all();
            $category = Category::find($id);
            if($category == null){

                return response()->json([
                    'mensaje' => 'error, no se encontro la categoria'
                ]);
            }
            else{

                $category->update($input);
                return $category;
            }
        }
        else{
            return response()->json([
                'mssg' => 'usted no esta autorizado para relizar esta accion'
            ]);
        }
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, string $id)
    {
        //
        $usuario = $request->attributes->get('usuario');
        $rol = collect($usuario->user->roles)->first();
        $name = $rol->name;
        if($name == 'admin'){
            $category = Category::find($id);
            if($category == null){

                return response()->json([
                    'mensaje' => 'no existe el id'
                ],404);
            }
            else{
                $category->delete();
                return response()->json([
                    'exit' => 'categoria eliminada correctamente'
                ]);
            }
        }
        else{
            return response()->json([
                'mssge' => 'no autorizado para esta accion'
            ],403);
        }
        
    }
}
