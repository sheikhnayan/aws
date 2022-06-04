<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class invoice_transaction extends Model
{
	
    protected $table="invoice_transaction";

    protected $fillable=['invoice_id','trans_id','customer_id','date','payment'];

       public function guest()
    {
      return $this->belongsTo(guest::class,'customer_id','id');
    }
      public function delivery_infos()
    {
    	return $this->belongsTo(invoice::class,'invoice_id','invoice_id');
    }

    

}