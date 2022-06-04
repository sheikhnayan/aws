<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class thana extends Model
{
    protected $table="thanas";
    protected $fillable=['thana_name','district_id'];

      public function district()
    {
    	return $this->belongsTo(district::class,'district_id','id');
    }
     
}
