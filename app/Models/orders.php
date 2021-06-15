<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class orders extends Model
{
    use HasFactory;
  protected $fillable = ['user_id','amount','status','discount'];

}
