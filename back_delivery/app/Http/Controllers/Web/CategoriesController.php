<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Menu;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    //
    public function index()
    {
        $categories = Category::all();
        return view('categories.index',[
            'categories'=>$categories
        ]);
    }

    public function create()
    {
        $menus = Menu::all();
        return view('categories.create', compact('menus'));
    }

    public function store(Request $request)
    {
        $input = $request->all();
        print_r($input);
        
        $category = new Category();
        $category->name = $input['nombre'];
        $category->menu_id = $input['menu'];

        $category->save();
        //return response()->json([$category,201]);
        return redirect()->route('categories.index');
    }

    public function show()
    {

    }

    public function edit(Category $category)
    {
        $categories = Category::all();
        return view('categories.edit',[
            'category' => $category,
            'categories' => $categories
        ]);
    }

    public function update(Request $request, Category $categories)
    {
        $input = $request->all();
        print_r($input);
        $categories->update($input);
        return view('categories.show',[
            'categories' => $categories
        ]);
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index');
    }
}
