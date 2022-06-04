<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class invoice_balance extends Model
{
	
    protected $table="invoice_balance_sheet";

    protected $fillable=['invoice_id','customer_id','amount','payment','due','attempt'];

       public function guest()
    {
      return $this->belongsTo(guest::class,'customer_id','id');
    }
      public function delivery_infos()
    {
    	return $this->belongsTo(invoice::class,'invoice_id','invoice_id');
    }

    

}