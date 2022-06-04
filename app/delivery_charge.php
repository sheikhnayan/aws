<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class delivery_charge extends Model
{
   protected $table = 'delivery_charges';
    protected $fillable=[
    	  'district_id' , 
          'zone_id' , 
    	  'shipping_id' , 
            'charge' , 
    ];

    public function zone()
    {
    	return $this->belongsTo(Zone::class,'zone_id','id');
    }

    public function shipping()
    {
        return $this->belongsTo(shipping_class::class,'shipping_id','id');
    }
    
}
