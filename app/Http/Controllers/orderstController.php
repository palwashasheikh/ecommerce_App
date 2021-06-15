<?php

namespace App\Http\Controllers;

use App\Models\orders;
use Illuminate\Http\Request;


class orderstController extends Controller
{
    public function add_orders(Request $request)
    {
        $validatedData = $request->validate([
            'user_id' => 'required',
            'amount' => 'required',
            'status' => 'required',
            'discount' => 'required',
        ]);
        $show = orders::create($validatedData);

        return response()->json( ['Flag' => 1,
            'message' => 'orders Added',
            'data' => $show,
        ], 200);

    }

    public  function orders_update(Request $request){


        $id = $request->id;
        $product = orders::findOrFail($id);
        $product->update();
        return response()->json( ['Flag' => 1,
            'message' => 'Orders Update',
            'data' => ''
        ], 200);
    }



    public function orders_delete(Request $request)
    {
        $id = $request->id;
        $product = orders::findOrFail($id);
        $product->delete();

        return response()->json( ['Flag' => 1,
            'message' => 'orders Deleted',
            'data' => ''
        ], 200);
    }

}
