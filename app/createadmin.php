<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
class createadmin extends Authenticatable
{
    protected $table="createadmin";
    protected $fillable=['name','email','email_verified_at','phone','address','password','image','type','status'];
}
