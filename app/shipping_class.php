<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class shipping_class extends Model
{
    protected $table="shipping_classes";
    protected $fillable=['shipping_name'];
}
