<?php
namespace App\Http\Controllers;
use App\Models\cart;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;


class CartController extends Controller
{
    public function create_cart(Request $request){

        $validatedData = $request->validate([
            'userId' => 'required',
            'product_id' => 'required',
            'quantity' => 'required',
            'total_price' => 'required',
        ]);

        $Cart_data = cart::create($validatedData);
        return response()->json( ['Flag' => 1,
            'message' => 'Cart Added',
            'data' => $Cart_data,
        ], 200);
    }

    public  function cart(){

        $cart = new cart();
        $fetch_cart = $cart->fetch_cart();
        return response()->json($fetch_cart);

}

    public  function cart_update(Request $request){

        $id = $request->id;
      if($request->exists($id)){
          echo 'is not exist';
      }
        $product = cart::findOrFail($id);
        $product->update();
        return response()->json( ['Flag' => 1,
            'message' => 'Cart Update',
            'data' => ''
        ], 200);

    }

    public function cart_delete(Request $request)
    {
        $id = $request->id;
        $product = cart::findOrFail($id);
        $product->delete();

        return response()->json( ['Flag' => 1,
            'message' => 'cart Deleted',
            'data' => ''
        ], 200);
    }
}
