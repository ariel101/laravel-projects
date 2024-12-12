<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Driver;
use Illuminate\Http\Request;
use Inertia\Inertia;

class DriverController extends Controller
{
    //
    public function index(){
        $driver = Driver::all();
        return Inertia::render('Drivers/Index',['drivers'=>$driver]);
    }

    public function create(){
        return Inertia::render('Drivers/create');
    }

    public function store(Request $request){

    }

    public function edit(Driver $driver){

    }

    public function update(Request $request, Driver $driver){

    }

    public function destroy(Driver $driver){

    }
}
