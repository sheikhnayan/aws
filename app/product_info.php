<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product_info extends Model
{
    protected $table="product_productinfo";
    protected $fillable=['product_id','item_id','category_id','subcategory_id','brand_id','product_name','product_name_bangla','measurement_type','purchase_price','sale_price','discount_price','discount_per','current_price','min_qunt','product_us','product_details','condition','image','admin_id','seller_id','shipping_id','home_item_show','offer_id', 'stock_status', 'call_for_order'];

      public function measurment()
    {
    	return $this->belongsTo(product_measurement::class,'measurement_type','id');
    }
      public function shipping()
    {
    	return $this->belongsTo(shipping_class::class,'shipping_id','id');
    }
      public function seller()
    {
    	return $this->belongsTo(seller::class,'seller_id','id');
    }
      public function brand()
    {
    	return $this->belongsTo(product_company::class,'brand_id','id');
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
