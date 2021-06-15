<?php

namespace App\Http\Controllers;

use App\Models\order_details;
use Illuminate\Http\Request;

class orders_detailstController extends Controller
{

    public function order_details(Request $request){

        $validatedData = $request->validate([
            'order_id' => 'required',
            'product_id' => 'required',
            'product_name' => 'required',
            'qty' => 'required',
            'price' => 'required',
            'tax' => 'required',
            'discount' => 'required',
        ]);
        $show = order_details::create($validatedData);

        return response()->json( ['Flag' => 1,
            'message' => 'orders details Added',
            'data' => $show,
        ], 200);
    }
    public function update_order_details(Request $request){

        $id = $request->id;
        $product = order_details::findOrFail($id);
        $product->update();
        return response()->json( ['Flag' => 1,
            'message' => 'Orders  details Update',
            'data' => ''
        ], 200);
    }
    public function delete_order_details(Request $request){

        $id = $request->id;
        $product = order_details::findOrFail($id);
        $product->delete();

        return response()->json( ['Flag' => 1,
            'message' => 'orders  details Deleted',
            'data' => ''
        ], 200);

    }
}
