<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Client;
use Illuminate\Http\Request;
use Inertia\Inertia;

use function Termwind\render;

class ClientController extends Controller
{
    //
    public function index(){
        $client = Client::all();
        return Inertia::render('Clients/Index',['clients'=>$client]);
    }

    public function store(Request $request){
        Client::create($request->all());
        return redirect(route('clients.index'));
    }

    public function update(Request $request, Client $client){
        $client->update($request->all());
        return redirect(route('clients.index'));
    }

    public function destroy(Client $client){
        $$client->delete();
        return redirect(route('clients.index'));
    }
}
