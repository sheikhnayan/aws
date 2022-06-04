<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product_category extends Model
{
     protected $table="product_category";
    protected $fillable=['sl','item_id','category_name','image','banner','admin_id','shop_by','paginate'];
}
