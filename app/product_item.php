<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product_item extends Model
{
    protected $table="product_item";
    protected $fillable=['sl','item_name','banner','admin_id','left_menu','shop_by','show_home','paginate'];
}
