<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Business;
use Illuminate\Http\Request;

class BusinessController extends Controller
{
    public function index()
    {
        $index = Business::all();
        return $index;
    }

    public function store(Request $request)
    {
        $business = new Business;
        $business->name = $request->name;
        $business->address = $request->address;
        $business->save();

        return response()->json($business, 201);
    }

    public function show($id)
    {
        $business = Business::find($id);

        if (is_null($business)) {
            return response()->json(['message' => 'Business not found'], 404);
        }

        return response()->json($business);
    }

    public function update(Request $request, $id)
    {
        $business = Business::find($id);

        if (is_null($business)) {
            return response()->json(['message' => 'Business not found'], 404);
        }

        $business->name = $request->name;
        $business->address = $request->address;
        $business->save();

        return response()->json($business);
    }

    public function destroy($id)
    {
        $business = Business::find($id);

        if (is_null($business)) {
            return response()->json(['message' => 'Business not found'], 404);
        }

        $business->delete();

        return response()->json(['message' => 'Business deleted successfully']);
    }
}
