<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Business;
use Illuminate\Http\Request;
use Inertia\Inertia;

class BusinessController extends Controller
{
    public function index(){
        $business = Business::all();
        return Inertia::render('Businesses/Index', ['businesses'=>$business]);
    }

    public function create(){
        return Inertia::render('Businesses/create');
    }

    public function store(Request $request){
        Business::create($request->all());
        return redirect()->route('Businesses.index');
    }

    public function edit(){
        return Inertia::render('Businesses/update');
    }

    public function update(Request $request, Business $business){
        $business->update($request->all());
        return redirect()->route('business.index');
    }

    public function destroy(Business $business){
        $business->delete();
        return redirect()->route('business.index');
    }
}
