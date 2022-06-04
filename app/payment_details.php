<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class payment_details extends Model
{
     protected $table="online_payment_details";

      protected $fillable=['mer_txnid','customer_id','cus_name','cus_phone','cus_email','pg_service_charge_bdt','amount_original','gateway_fee','pg_card_bank_name','pg_card_bank_country','card_number','card_holder','desc','currency_merchant','convertion_rate','ip_address','other_currency','pay_status','pg_txnid','currency','store_amount','pay_time','amount','bank_txn','card_type','reason','pg_card_risklevel','pg_error_code_details','session_id'];
   
}
