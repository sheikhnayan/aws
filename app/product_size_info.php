<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class product_size_info extends Model
{
    protected $table="product_size_infos";
    protected $fillable=['size_title'];
}
