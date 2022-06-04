<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class shopping_cart extends Model
{
    
    protected $table="shopping_carts";
    protected $fillable=['product_id','session_id','quantity','status','sale_price','discount_price','current_price','size','color'];
}
  