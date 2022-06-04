<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class seller extends Authenticatable
{
       protected $table="sellers";
    protected $fillable=['first_name','last_name','business_name','email','email_verified_at','phone','address','password','set_password','image',
     'avatar', 'provider_id', 'provider',
     'access_token'];

}
