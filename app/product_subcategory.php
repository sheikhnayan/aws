<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product_subcategory extends Model
{
     protected $table="product_subcategory";
    protected $fillable=['item_id','category_id','subcategory_name','sl','admin_id'];
}
