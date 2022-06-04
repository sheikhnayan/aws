<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product_size extends Model
{
    
    protected $table="product_size";
    protected $fillable=['product_id','size','status','admin_id'];
}
