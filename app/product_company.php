<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product_company extends Model
{
     protected $table="product_company";
    protected $fillable=['sl','company_name','home_show','status','image','admin_id'];
}
