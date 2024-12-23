<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Inertia\Inertia;

class CategoryController extends Controller
{
    //
    public function index(){
        $category = Category::all();
        return Inertia::render('Categories/Index',['categories'=> $category]);
    }

    public function create(){
        return Inertia::render('category/create');
    }

    public function store(Request $request){
        Category::create($request->all());
        return redirect()->route('categories.index');
    }

    public function edit(Category $category){
        return Inertia::render('Categoria/Update', ['category'=>$category]);
    }

    public function update(Request $request, Category $category){
        $category->update($request->all());
        return redirect()->route('categories.index');
    }

    public function destroy(Category $category){
        $category->delete();
        return redirect()->route('categories.index');
    }
}
