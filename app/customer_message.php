<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class customer_message extends Model
{
   protected $table="customer_messages";
   protected $fillable=['name','email','description'];
}
