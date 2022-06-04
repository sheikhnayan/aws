<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class delivery_info extends Model
{
    protected $table = 'delivery_infos';
    protected $fillable=[
    	  'first_name' , 
            'last_name' , 
            'email' , 
            'address' , 
            'phone' , 
            'country' , 
            'thana_id' , 
            'district_id' , 
            'zone_id' , 
            'session_id',
            'vessel_name' , 
            'rank',
            'note'
    ];
    
       public function district()
    {
      return $this->belongsTo(district::class,'district_id','id');
    }
    
    public function thana()
    {
      return $this->belongsTo(thana::class,'thana_id','id');
    }
}
