<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
   public function createOrder(){
    $client = Auth::user();
    $cart = Cart::where('client_id', $client->id)->get();

    if($cart->empty()){
        return response()->json(['message'=> 'el carrito esta vacio'], 404);
    }

    

   }

}
