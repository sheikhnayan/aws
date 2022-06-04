<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class offer_setup extends Model
{
     protected $table="offer_setups";
    protected $fillable=['id','product_id','item_id','category_id','subcategory_id','type','sale_price','discount_price','discount_per','current_price','start_date_time','end_date_time','status','admin_id'];

     public function product()
    {
    	return $this->belongsTo(product_info::class,'product_id','id');
    }
     public function subcategory()
    {
    	return $this->belongsTo(product_subcategory::class,'subcategory_id','id');
    }

     public function category()
    {
    	return $this->belongsTo(product_category::class,'category_id','id');
    }

    public function item()
    {
    	return $this->belongsTo(product_item::class,'item_id','id');
    }
}
