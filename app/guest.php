<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
class guest extends Authenticatable
{
	 use Notifiable;

	 
    protected $table="guest";
    protected $fillable=['first_name','last_name','vessel_name','rank','email','email_verified_at','phone','address','password','set_password','image',
     'avatar', 'provider_id', 'provider',
     'access_token', 'reward_points'];

     protected $guarded = ['*'];
}
