<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class slider extends Model
{
   
    protected $table="sliders";
    protected $fillable=['sl','url','image','admin_id', 'place'];
}
