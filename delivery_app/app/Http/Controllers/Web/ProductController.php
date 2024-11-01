<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Http\Request;
use Inertia\Inertia;

class ProductController extends Controller
{
    //
    public function index(){

        $product = Product::all();
        return Inertia::render('Products/Index',['products'=>$product]);
    }

    public function create(){

        return Inertia::render('products/Create');

    }

    public function store(Request $request){

        Product::create($request->all());
        return redirect()->route('Products.index');

    }

    public function edit(Product $product){

        return Inertia::render('products/Edit',[
            'product'=> $product
        ]);

    }

    public function update(Request $request, Product $product){

        $product->update($request->all());
        return redirect()->route('product.index');
    }

    public function destroy(Product $product){

        $product->delete();
        return redirect()->route('product.index');
    }
}
