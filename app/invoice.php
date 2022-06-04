<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class invoice extends Model
{
	
    protected $table="invoices";

    protected $fillable=['package_days','package_id','invoice_id','delivery_id','guest_id','coupon_id','delivery_charge','payment_type','mobile_acc','trans_id','bank_file','discount','sub_total','grand_total','session_id', 'date', 'reward_points', 'redeem'];

       public function guest()
    {
      return $this->belongsTo(guest::class,'guest_id','id');
    }
      public function delivery_infos()
    {
    	return $this->belongsTo(delivery_info::class,'delivery_id','id');
    }

    //    public function district()
    // {
    //   return $this->belongsTo(delivery_charge::class,$this->district_id,'id');
    // }

      public function coupon()
    {
    	return $this->belongsTo(coupon::class,'coupon_id','id');
    }

      public function shopping_cart()
    {
    	return $this->belongsTo(shopping_cart::class,'session_id','session_id');
    }
    

}
