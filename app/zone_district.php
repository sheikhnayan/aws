<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class zone_district extends Model
{
    protected $table="zone_districts";
    protected $fillable=['zone_id','thana_id'];

      public function thana()
    {
    	return $this->belongsTo(thana::class,'thana_id','id');
    }
      public function zone()
    {
    	return $this->belongsTo(Zone::class,'zone_id','id');
    }
}
