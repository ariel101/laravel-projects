<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $order = Order::all();
        return response()->json(
            [
                'status' => 'success',
                'data' => $order
            ]
            );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $input = $request->all();
        $order = Order::create($input);
        return response()->json(
            [
                'status' => 'success',
                'data' => $order
            ]
            );
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $order = Order::find($id);
        if($order){
            return response()->json(
                [
                    'status' => 'success',
                    'data' => $order
                ]
                );
        }else{
            return response()->json(
                [
                    'status' => 'error',
                    'message' => 'No se encontró la orden'
                ]
                );
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $input = $request->all();
        $order = Order::find($id);
        if($order){
            $order->update($input);
            return response()->json(
                [
                    'status' => 'success',
                    'data' => $order
                ]
                );
        }else{
            return response()->json(
                [
                    'status' => 'error',
                    'message' => 'No se encontró la orden'
                ]
                );
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $order = Order::find($id);
        if(! $order){
            return response()->json(
                [
                    'status' => 'error',
                    'message' => 'No se encontró la orden'
                ]
                );
        }
        $order->delete();
    }
}
