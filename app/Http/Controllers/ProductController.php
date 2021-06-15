<?php

namespace App\Http\Controllers;
use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use function PHPUnit\Framework\isEmpty;

class ProductController extends Controller
{
    public function index()
    {
        $product = products::all();
        return response()->json($product);
    }


    public function add_products(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'quantity' => 'required',
        ]);
        $show = products::create($validatedData);

        return response()->json( ['Flag' => 1,
            'message' => 'Products Added',
            'data' => $show,
        ], 200);

    }


    public  function product_update(Request $request){


       $id = $request->id;
        $validatedData = $request->validate([
            'name' => 'required',
            'description' => 'required',
            'price' => 'required',
            'quantity' => 'required',
        ]);
         $products_update    =  products::whereId($id)->update($validatedData);

        return response()->json( ['Flag' => 1,
            'message' => 'Product Update',
            'data' => $products_update
        ], 200);
    }



    public function product_delete(Request $request)
    {
        $id = $request->id;
        $product = products::findOrFail($id);
        $product->delete();

        return response()->json( ['Flag' => 1,
            'message' => 'Product Deleted',
            'data' => ''
        ], 200);
    }
}
