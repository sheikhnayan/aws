<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class coupon extends Model
{
    protected $table="coupons";
    protected $fillable=['coupon_name','start_date','min_price','discout_per','discout_price','end_date','apply_coupon','admin_id'];
}
