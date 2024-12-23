<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Inertia\Inertia;

class OrderController extends Controller
{
    //
    public function index(){
        $order = Order::all();
        return Inertia::render('Orders/Index',['orders'=>$order]);
    }

    // public function create(){
    //     return Inertia::render('Order/update');
    // }

    // public function store(Request $request){
    //     Order::create($request->all());
    //     return redirect()->route('order.index');
    // }

    // public function edit(Order $order){
    //     return Inertia::render('Order/Update',['order'=>$order]);
    // }

    // public function update(Request $request, Order $order){
    //     $order->update($request->all());
    //     return redirect()->route('order.index');
    // }

    // public function destroy(Order $order){
    //     $order->delete();
    //     return redirect()->route('order.index');
    // }
}
