<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class holyday extends Model
{
    protected $table ="holyday";
    protected $fillable = ['title','date'];
    
}