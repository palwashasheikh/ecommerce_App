<?php

namespace App\Models;

use Carbon\Traits\Timestamp;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class cart extends Model
{
    use HasFactory;
    use timestamp;
    protected  $fillable = ['product_id','quantity','userId','total_price'];

    public function  fetch_cart(){

       $query   = DB::table('users')
            ->join('products', 'users.id', '=', 'products.id')
            ->join('carts', 'users.id', '=', 'carts.id')
            ->select('users.id', 'products.name','products.quantity', 'carts.total_price','carts.userId')
            ->get();

       return  $query;

    }

}
