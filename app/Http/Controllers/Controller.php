<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Auth;
use DB;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

        public function productinfoAutoId()
    {
        $id =   Auth::guard('admin')->user();
        $id_length=10;
        $max_id=DB::table('product_productinfo')->max('product_id');
        $prefix="P-";
        $prefix_length=strlen($prefix);
        $only_id=substr($max_id,$prefix_length);
        $new=(int)($only_id);
        $new++;
        $number_of_zero=$id_length-$prefix_length-strlen($new);
        $zero=str_repeat("0", $number_of_zero);
        $made_id=$prefix.$zero.$new;
        return $made_id;

    }
    
      public function offerAutoId()
    {
        $id =   Auth::guard('admin')->user();
        $id_length=10;
        $max_id=DB::table('offer_setups')->max('id');
        $prefix=date('Y');
        $prefix_length=strlen($prefix);
        $only_id=substr($max_id,$prefix_length);
        $new=(int)($only_id);
        $new++;
        $number_of_zero=$id_length-$prefix_length-strlen($new);
        $zero=str_repeat("0", $number_of_zero);
        $made_id=$prefix.$zero.$new;
        return $made_id;

    }
    
           public function invoiceAutoId()
    {
        $id_length=10;

        $curdate = DB::select('SELECT CURDATE() as dates');
        foreach ($curdate as $key => $value) {
          $newdate=   $value->dates;
                }


        $max_id=DB::table('invoices')->max('invoice_id');
        $checkdate = substr($max_id,4,2);
        $databasedate = substr($newdate,8,2);


        if ($checkdate == $databasedate) 
        {
        //    $curdate = DB::select('SELECT CURDATE() as dates');
        // foreach ($curdate as $key => $value) {
        //   $newdate=   $value->dates;
        //         }

        $ex = explode('-', $newdate);
        $updatedate = $ex[0].$ex[1].$ex[2];
         $updatedate;
        $prefix=substr($updatedate,2,6);
        $prefix_length=strlen($prefix);
        $only_id=substr($max_id,$prefix_length);
        $new=(int)($only_id);
        $new++;
        $number_of_zero=$id_length-$prefix_length-strlen($new);
        $zero=str_repeat("0", $number_of_zero);
        $made_id=$prefix.$zero.$new;
        return $made_id;

        }
        else
        {
        //  $curdate = DB::select('SELECT CURDATE() as dates');
        // foreach ($curdate as $key => $value) {
        //   $newdate=   $value->dates;
        //         }

        $ex = explode('-', $newdate);
        $updatedate = $ex[0].$ex[1].$ex[2];
         $updatedate;
        $prefix=substr($updatedate,2,6);
        $prefix_length=strlen($prefix);
        $only_id=substr(1,$prefix_length);
        $new=(int)($only_id);
        $new++;
        $number_of_zero=$id_length-$prefix_length-strlen($new);
        $zero=str_repeat("0", $number_of_zero);
        $made_id=$prefix.$zero.$new;
        return $made_id;
        }
        

    }
    
     public function send_sms($message,$recipient,$messageType) {
          $url = "http://mysms.linkhostbd.com/smsapi";
           $data = [
            "api_key" => "C200450660a8d21d132071.82397570",
            "type" => $messageType,
            "contacts" => $recipient,
            "senderid" => "BuynFeel",
            "msg" =>$message ,
          ];
          $ch = curl_init();
          curl_setopt($ch, CURLOPT_URL, $url);
          curl_setopt($ch, CURLOPT_POST, 1);
          curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
          curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
          curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
          $response = curl_exec($ch);
          curl_close($ch);
          return $response;
        }
}
