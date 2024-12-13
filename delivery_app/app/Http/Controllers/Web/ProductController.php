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
    public function index()
    {

        $category = Category::all();
        $product = Product::all();
        return Inertia::render('Products/Index', [
            'products' => $product,
            'categories' => $category
        ]);
    }

    public function create()
    {

        return Inertia::render('Products/Create');
    }

    public function store(Request $request)
    {

        Product::create($request->all());
        return redirect()->route('products.index');
    }
    public function show() {}

    public function edit(Product $product)
    {

        return Inertia::render('Products/Edit', [
            'products' => $product
        ]);
    }

    public function update(Request $request, Product $product)
    {

        // Validar los datos
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|integer|exists:categories,id',
            'description' => 'nullable|string',
            'image_path' => 'nullable|string|url',
        ]);

        // Actualizar el producto en la base de datos
        $product->update($validatedData);

        return redirect()->route('products.index')->with('success', 'Producto actualizado correctamente');
    }

    public function destroy(Product $product)
    {

        $product->delete();
        return redirect()->route('products.index');
    }
}
