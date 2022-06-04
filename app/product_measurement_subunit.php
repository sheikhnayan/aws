<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product_measurement_subunit extends Model
{
        protected $table="product_measurement_subunit";
    protected $fillable=['measurement_unit_id','sub_unit_name','sub_unit_data','admin_id'];
}
