<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    //
    public function index(){

        $category = Category::all();
        $product = Product::all();
        return Inertia::render('Products/Index',[
            'products'=>$product,
            'categories'=>$category
        ]);
    }

    public function create(){

        return Inertia::render('Products/Create');

    }

    public function store(Request $request){

        Product::create($request->all());
        return redirect()->route('products.index');

    }
    public function show(){
        
    }

    public function edit(Product $product){

        return Inertia::render('Products/Edit',[
            'products'=> $product
        ]);

    }

    public function update(Request $request, Product $product){

        dd('La solicitud ha llegado al controlador');
        Log::info('Datos recibidos en update:', $request->all()); 
        Log::info('Encabezados de la solicitud:', $request->headers->all());

        $contentType = $request->header('Content-Type'); Log::info('Tipo de contenido:', ['Content-Type' => $contentType]);
        dd($request->all(), $request->getContentType(), $request->headers->all());
        try {
            // Actualizar el producto
            $product->update($request->all());
    
            //return redirect()->route('products.index')->with('success', 'Producto actualizado correctamente');
        } catch (\Exception $e) {
            // Manejar el error
            return back()->withErrors('Error al actualizar el producto: ' . $e->getMessage());
        }
    }

    public function destroy(Product $product){

        $product->delete();
        return redirect()->route('products.index');
    }
}
