<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class explore_banner extends Model
{
       protected $table="explore_banners";
    protected $fillable=['sl','url','image','admin_id'];
}
