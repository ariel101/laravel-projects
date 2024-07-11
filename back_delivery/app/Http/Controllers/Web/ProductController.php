<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index()
    {
        $product = Product::all();
        return view('products.index',[
            'product'=>$product
        ]);
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $product = new Product();
        $product->name = $request->input('name');

        $product->save();
        return response()->json([$product,201]);
        redirect()->route('products.index');
    }

    public function show()
    {

    }

    public function edit(Product $product)
    {
        return view('products.edit',[
            'product' => $product
        ]);
    }

    public function update(Request $request, Product $product)
    {
        $input = $request->all();
        $product->update($input);
        return view('products.show',[
            'product' => $product
        ]);
    }

    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index');
    }
}
