<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product_color extends Model
{   
	protected $table="product_color";
    protected $fillable=['product_id','color','status','admin_id'];
}
