<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product_measurement extends Model
{
    protected $table="product_measurement";
    protected $fillable=['measurement_type','admin_id'];
}
