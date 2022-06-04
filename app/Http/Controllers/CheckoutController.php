<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\shopping_cart;
use App\product_info;
use App\delivery_info;
use App\thana;
use App\delivery_charge;
use App\district;
use App\Zone;
use App\invoice;
use App\payment_details;
use App\coupon;
use App\contact_us;
use App\invoice_balance;
use App\invoice_transaction;
use App\Wishlist;
use App\guest;
use Session;
use DB;
use PDF;
use Illuminate\Support\Facades\Validator;
use App\Lib\Adnsms\lib\AdnSmsNotification;
class CheckoutController extends Controller
{



  public function Checkout_order()
  {
    $deliverycharge = delivery_charge::all();
    $zone = zone::all();
    $zone = Zone::all();

    $session_id = Session::getId();

    $vieworder = shopping_cart::where('session_id',$session_id)->get();
    $control = DB::table('payment_system_control')->where('id','1')->first();


    
    return view('User.checkout',compact('deliverycharge','zone','vieworder','control', 'zone'));
  }




public function buy_now(Request $request)
{


    $session_id = Session::getId();
    $productcheck = product_info::find($request->product_id);


    // $stock = DB::table('productstocks')
    // ->where('product_id',$request->product_id)
    // ->where('size',$request->size)
    // ->where('color',$request->color)
    // ->sum('quentity');


    // $salequntshopping = DB::table('shopping_carts')
    // ->where('size',$request->size)
    // ->where('color',$request->color)
    // ->where('status','1')
    // ->where('product_id',$request->product_id)
    // ->sum('quantity');

     $check = shopping_cart::where('product_id',$request->product_id)->where('session_id',$session_id)->where('color',$request->color)->where('size',$request->size)->first();

     if ($productcheck->min_qunt >= $request->Quantity) 
     {
      if ($check) {

        $quntityup = array(
          'quantity' => $check->quantity+$productcheck->min_qunt, 
        );

        $update = shopping_cart::where('product_id',$request->product_id)->where('session_id',$session_id)->where('size',$request->size)->where('color',$request->color)->update($quntityup);
        if ($update) 
        {
          $deliverycharge = delivery_charge::all();
          $zone = zone::all();

          $session_id = Session::getId();

          $vieworder = shopping_cart::where('session_id',$session_id)->get();
          $control = DB::table('payment_system_control')->where('id','1')->first();
          
          return view('User.checkout',compact('deliverycharge','zone','vieworder','control', 'zone'));
        }
        else
        {
          return 'error';
        }

      }
      else
      {

        $quntityadd = array(
          'product_id' =>$request->product_id, 
          'size' =>$request->size, 
          'color' =>$request->color, 
          'sale_price' =>$productcheck->sale_price, 
          'discount_price' =>$productcheck->discount_price, 
          // 'current_price' =>$productcheck->current_price, 
          'current_price' =>$p_var_price->var_price ?? $productcheck->current_price, 
          'session_id' => $session_id, 
          'quantity' =>$productcheck->min_qunt,
          'status' =>'0', 
        );



        $insert = shopping_cart::create($quntityadd);

        if ($insert) 
        {
          $deliverycharge = delivery_charge::all();
          $zone = zone::all();

          $session_id = Session::getId();

          $vieworder = shopping_cart::where('session_id',$session_id)->get();
          $control = DB::table('payment_system_control')->where('id','1')->first();
          
          return view('User.checkout',compact('deliverycharge','zone','vieworder','control', 'zone'));
        }
        else
        {
          return 'error';
        }


      }
    }
    else
    {
     if ($check) {

      $quntityup = array(
        'quantity' => $check->quantity+$request->Quantity, 
      );

      $update = shopping_cart::where('product_id',$request->product_id)->where('session_id',$session_id)->where('size',$request->size)->where('color',$request->color)->update($quntityup);
      if ($update) 
      {
        $deliverycharge = delivery_charge::all();
        $zone = zone::all();

        $session_id = Session::getId();

        $vieworder = shopping_cart::where('session_id',$session_id)->get();
        $control = DB::table('payment_system_control')->where('id','1')->first();
        
        return view('User.checkout',compact('deliverycharge','zone','vieworder','control', 'zone'));
      }
      else
      {
        return 'error';
      }

    }
    else
    {

      $quntityadd = array(
        'product_id' =>$request->product_id, 
        'session_id' => $session_id, 
        'size' =>$request->size, 
        'color' =>$request->color, 
        'sale_price' =>$productcheck->sale_price, 
        'discount_price' =>$productcheck->discount_price, 
        // 'current_price' =>$productcheck->current_price, 
        'current_price' =>$p_var_price->var_price ?? $productcheck->current_price, 
        'quantity' =>$request->Quantity, 
        'status' =>'0', 
      );


      $insert = shopping_cart::create($quntityadd);

      if ($insert) 
      {

        $deliverycharge = delivery_charge::all();
        $zone = zone::all();

        $session_id = Session::getId();

        $vieworder = shopping_cart::where('session_id',$session_id)->get();
        $control = DB::table('payment_system_control')->where('id','1')->first();

        return view('User.checkout',compact('deliverycharge','zone','vieworder','control', 'zone'));
      }
      else
      {
        return 'error';
      }


    }
  }



}



  public function add_to_cart(Request $request)
  {

    $session_id = Session::getId();
    $productcheck = product_info::find($request->product_id);

    $settings  = DB::table('settings')->first();


    // $stock = DB::table('productstocks')
    // ->where('product_id',$request->product_id)
    // ->where('size',$request->size)
    // ->where('color',$request->color)
    // ->sum('quentity');


    // $salequntshopping = DB::table('shopping_carts')
    // ->where('size',$request->size)
    // ->where('color',$request->color)
    // ->where('status','1')
    // ->where('product_id',$request->product_id)
    // ->sum('quantity');




     $check = shopping_cart::where('product_id',$request->product_id)->where('session_id',$session_id)->where('color',$request->color)->where('size',$request->size)->first();

     if ($productcheck->min_qunt >= $request->Quantity) 
     {
      if ($check) {

        $quntityup = array(
          'quantity' => $check->quantity+$productcheck->min_qunt, 
        );

        $update = shopping_cart::where('product_id',$request->product_id)->where('session_id',$session_id)->where('size',$request->size)->where('color',$request->color)->update($quntityup);
        if ($update) 
        {
          return 'Add to cart successfully';
        }
        else
        {
          return 'error';
        }

      }
      else
      {

        $quntityadd = array(
          'product_id' =>$request->product_id, 
          'size' =>$request->size, 
          'color' =>$request->color, 
          'sale_price' =>$productcheck->sale_price, 
          'discount_price' =>$productcheck->discount_price, 
          'current_price' =>$productcheck->current_price, 
          'session_id' => $session_id, 
          'quantity' =>$productcheck->min_qunt,
          'status' =>'0', 
        );


        $insert = shopping_cart::create($quntityadd);

        if ($insert) 
        {
          return 'Add to cart successfully';
        }
        else
        {
          return 'error';
        }


      }
    }
    else
    {
     if ($check) {

      $quntityup = array(
        'quantity' => $check->quantity+$request->Quantity, 
      );

      $update = shopping_cart::where('product_id',$request->product_id)->where('session_id',$session_id)->where('size',$request->size)->where('color',$request->color)->update($quntityup);
      if ($update) 
      {
        return 'Add to cart successfully';
      }
      else
      {
        return 'error';
      }

    }
    else
    {

      $quntityadd = array(
        'product_id' =>$request->product_id, 
        'session_id' => $session_id, 
        'size' =>$request->size, 
        'color' =>$request->color, 
        'sale_price' =>$productcheck->sale_price, 
        'discount_price' =>$productcheck->discount_price, 
        'current_price' =>$productcheck->current_price, 
        'quantity' =>$request->Quantity, 
        'status' =>'0', 
      );


      $insert = shopping_cart::create($quntityadd);

      if ($insert) 
      {
        return 'Add to cart successfully';
      }
      else
      {
        return 'error';
      }


    }
  }



}




public function shoppingcart_view(Request $request)
{
 $session_id = Session::getId();

    	// $view = shopping_cart::where('session_id',$session_id)->get();
 $view = DB::table('shopping_carts')
 ->join('product_productinfo','product_productinfo.id','shopping_carts.product_id')
 ->where('shopping_carts.session_id',$session_id)
 ->select('shopping_carts.*','product_productinfo.product_id as proID','product_productinfo.product_name','product_productinfo.current_price','product_productinfo.image')
 ->get();
 return view('User.viewCart',compact('view'));

}


public function placeorder_show(Request $request)
{
 $session_id = Session::getId();

    	// $view = shopping_cart::where('session_id',$session_id)->get();
 $view = DB::table('shopping_carts')
 ->join('product_productinfo','product_productinfo.id','shopping_carts.product_id')
 ->where('shopping_carts.session_id',$session_id)
 ->select('shopping_carts.*','product_productinfo.product_id as proID','product_productinfo.product_name','product_productinfo.current_price','product_productinfo.shipping_id','product_productinfo.image')
 ->get();
 return view('User.placeordershow',compact('view'));

}

public function totalprice()
{
 $session_id = Session::getId();

    	// $view = shopping_cart::where('session_id',$session_id)->get();
 $view = DB::table('shopping_carts')
 ->join('product_productinfo','product_productinfo.id','shopping_carts.product_id')
 ->where('shopping_carts.session_id',$session_id)
 ->select('shopping_carts.*','product_productinfo.current_price')
 ->get();
 return view('User.total_price',compact('view'));

}

public function totalcartqunt()
{
 $session_id = Session::getId();

    	// $view = shopping_cart::where('session_id',$session_id)->get();
 return $view = DB::table('shopping_carts')
 ->where('shopping_carts.session_id',$session_id)
 ->count('shopping_carts.id');


}

public function totalcartamount()
{
  $session_id = Session::getId();

  $view = DB::table('shopping_carts')
  ->join('product_productinfo','product_productinfo.id','shopping_carts.product_id')
  ->where('shopping_carts.session_id',$session_id)
  ->select('shopping_carts.*','product_productinfo.current_price')
  ->get();
  return view('User.total_price',compact('view'));


}


public function totalcartamounts()
{
  $session_id = Session::getId();

  $view = DB::table('shopping_carts')
  ->join('product_productinfo','product_productinfo.id','shopping_carts.product_id')
  ->where('shopping_carts.session_id',$session_id)
  ->select('shopping_carts.*','product_productinfo.current_price')
  ->get();
  return view('User.total_price',compact('view'));


}

  public function add_to_wistlist(Request $request)
  {
    $productcheck = product_info::find($request->product_id);

    if (Auth('guest')->user()) {
      $cus_id = Auth('guest')->user()->id;
    }

    $exist = Wishlist::where('user_id', $cus_id)->where('product_id', $request->product_id)->first();
    if(!$exist){
      $data = new Wishlist();
      $data->user_id = $cus_id;
      $data->product_id = $request->product_id;
      $data->save();
    }


    $total_items = Wishlist::where('user_id', $cus_id)->count();

    return $total_items;

  }


public function delete_product(Request $request)
{

 $session_id = Session::getId();

 $delete = shopping_cart::where('id',$request->product_id)->where('session_id',$session_id)->delete();



}

public function thana_info(Request $request)
{

 echo "<option value=''>-- Select thana or Area --</option>";

 $thana = thana::where('zone_id',$request->zone_id)->get();

 foreach ($thana as $key => $value) {
   echo "<option value=".$value->id.">".$value->thana_name."</option>";
 }


}

public function zone_charge(Request $request)
{
       // dd($request->shipping_id);

       // $chargesystem = delivery_charge::whereIn('shipping_id',$request->shipping_id)
       //                 ->where('zone_id',$request->id)
       //                 ->get();

 $chargesystem = DB::table('delivery_charges')
 ->join('zones','zones.id','delivery_charges.zone_id')
 ->where('zones.id',$request->zone_id)
 ->get();

       // dd($chargesystem);
 $totalcharge =0;
 foreach ($chargesystem as $key => $value) 
 {
   $totalcharge += $value->charge;
 }

 return $totalcharge;
}

public function Applypromo_check(Request $request)
{
 $startdate = date('Y-m-d');
 $enddate = date('Y-m-d');


 $couponcheck = DB::table('coupons')
 ->where('coupon_name',$request->code)
 ->get();
 if ($couponcheck) {


   $startcheck = DB::table('coupons')
   ->where('start_date','<=',$startdate)
   ->first();
   if ($startcheck) 
   {
    $endcheck = DB::table('coupons')
    ->where('end_date','>=',$enddate)
    ->first();
    if ($endcheck) 
    {
      $pricecheck =DB::table('coupons')
      ->where('min_price','<=',$request->subamount)
      ->first();

      if ($pricecheck ) 
      {
       $discountprice = DB::table('coupons')
       ->where('coupon_name',$request->code)
       ->where('start_date','<=',$startdate)
       ->where('end_date','>=',$enddate)
       ->where('min_price','<=',$request->subamount)
       ->first();

       if (isset($discountprice)) 
       {

        $sub_total = $request->subamount;
        $discout_per = $discountprice->discout_per;

        $discount = $sub_total * $discout_per / 100;
        return $discount;
      }
      else
      {
        return 'false';
      }
    } 
    else
    {
      return 'min_price';
    }         

  }  
  else
  {
    return 'end_date';
  }   
}
else
{
  return 'date_invalid';
}
}
else
{
  return 'wrong_coupon';
}






}







public function apply_redeem(Request $request)
{
    $startdate = date('Y-m-d');
    $enddate = date('Y-m-d');

    if (Auth('guest')->user()) {
      $cus_id = Auth('guest')->user()->id;
    }
    $settings  = DB::table('settings')->first();
    $rate = $settings->reward_points;

    $guest = guest::where('id', $cus_id)->first();
    $exist_points = $guest->reward_points;
    $exist_point_taka = $guest->reward_points * $rate;

    $sub_total = $request->subamount;
    $need_points = $sub_total/$rate;



    if($exist_points >= $need_points){

      $available_point =  $exist_points - $need_points;
      $remain_taka = $exist_point_taka - $sub_total;
      $guestPoint = guest::where('id', $guest->id)->update(['reward_points' => $available_point]);
      return $sub_total;
      
    }else{
        $due_taka = $sub_total - $exist_point_taka;
        $guestPoint = guest::where('id', $guest->id)->update(['reward_points' => 0]);
        return $exist_point_taka;
    }



}










public function offline_ordersystem(Request $request)
{

  if($request->totalamount>0)
  {
    if($request->delivery_type === 'COD')
    {
     $validator = Validator::make($request->all(), [
      'delivery_type' => 'required',
      'zone_id' => 'required',
    ]);
   }
   else if($request->delivery_type === 'bank')
   {
    $validator = Validator::make($request->all(), [
      'delivery_type' => 'required',
      'zone_id' => 'required',

    ]);
  }
  else
  {
    $validator = Validator::make($request->all(), [
      'delivery_type' => 'required',
      'zone_id' => 'required',
      'trans_id' => 'required|unique:invoices',
    ]);

  }


  if ($validator->fails()) 
  {
    return redirect()->back()
    ->withErrors($validator)
    ->withInput();
  }

  $imageName='';
  $file = $request->file('deposite_file');
  if ($file) {

    $imageName = $this->invoiceAutoId().'.'.$file->getClientOriginalExtension();
    $file->move(public_path('/Bank_Deposite/'),$imageName);
  }





  $session_id = Session::getId();
  $deliveryinfo  = array(
    'first_name' => $request->fname, 
    'last_name' => $request->lname, 
    'email' => $request->email, 
    'address' => $request->address, 
    'phone' => $request->phone, 
    'country' => $request->country, 
    'zone_id' => $request->zone_id, 
    'thana_id' => $request->thana_id, 
    'zone_id' => $request->zone_id, 
    'session_id' => $session_id, 
  );

  $insertdel = delivery_info::create($deliveryinfo);

  $invoice_id = $this->invoiceAutoId();
  if (Auth('guest')->user()) {
    $cus_id = Auth('guest')->user()->id;
  }
  else
  {
    $cus_id='1';
  }

  $datetime = DB::select('SELECT NOW() as dates');
  foreach ($datetime as $key => $value) {

    $newdate =   $value->dates;
  }

  $discount = DB::table('offer_control')
  ->where('discount_start', '<=', $newdate)
  ->where('discount_end', '>=', $newdate)
  ->first();

  $life = DB::table('offer_control')
  ->where('life_start', '<=', $newdate)
  ->where('life_end', '>=', $newdate)
  ->first();

  $gadget = DB::table('offer_control')
  ->where('gadget_start', '<=', $newdate)
  ->where('gadget_end', '>=', $newdate)
  ->first();

  $deshi = DB::table('offer_control')
  ->where('deshi_start', '<=', $newdate)
  ->where('deshi_end', '>=', $newdate)
  ->first();




  if($discount)
  {
   $packageid='5';
   $packageday=$discount->discount_days;
 }
 else if($life)
 {
   $packageid='7';
   $packageday=$discount->lifestyle_days;
 }
 
 else if($gadget)
 {
   $packageid='8';
   $packageday=$discount->gadget_days;
 }
 else if($deshi)
 {
   $packageid='9';
   $packageday=$discount->deshi_days;
 }
 else
 {
   $packageid='0';
   $packageday='7';
 }



 $invoiceinfo  = array(
  'invoice_id'=>$invoice_id,
  'delivery_id'=>$insertdel->id,
  'guest_id'=>$cus_id,
  'coupon_id'=>$request->super_code,
  'delivery_charge'=>$request->deliverycharge,
  'payment_type'=>$request->delivery_type,
  'deposit_date'=>$request->deposit_date,
  'trans_id'=>$request->trans_id,
  'mobile_acc'=>$request->mobile_acc,
  'bank_file'=>$imageName,
  'discount'=>$request->discount,
  'sub_total'=>$request->subamount,
  'grand_total'=>$request->totalamount,
  'session_id'=>$session_id,
  'package_id'=>$packageid,
  'package_days'=>$packageday,
);

 $insertinv = invoice::create($invoiceinfo);


 shopping_cart::where('session_id',$session_id)->update(['status'=>'1']);


 $message = "Your order has been Place,your order ID: ".$invoice_id."from Buynfeel.com";
 $recipient=$request->phone;  
 $requestType = 'SINGLE_SMS';
 $messageType = 'TEXT';         
 $sms = new AdnSmsNotification();
 $sms->sendSms($requestType, $message, $recipient, $messageType);

 $notification=array(
  'messege'   =>'Your Order submitted',
  'alert-type'=>'success'
);



 Session::regenerate();
 return redirect('/invoice-paper/'.$session_id.'')->with($notification);  
}
else
{
  return redirect()->back();
}






}


public function ordesystem(Request $request)
{



  if($request->totalamount>0)
  {
    if (Auth('guest')->user()) {
      $cus_id = Auth('guest')->user()->id;
    }
    else
    {
      $cus_id='1';
    }

    $validator = Validator::make($request->all(), [
      'zone_id' => 'required',
    ]);

    if ($validator->fails()) {
      return redirect()->back()
      ->withErrors($validator)
      ->withInput();
    }


    $session_id = Session::getId();
    $deliveryinfo  = array(
      'first_name' => $request->fname, 
      'last_name' => $request->lname, 
      'email' => $request->email, 
      'address' => $request->address,
      'vessel_name' => $request->vessel_name,
      'rank' => $request->rank,
      'phone' => $request->phone, 
      'country' => $request->country, 
      'zone_id' => $request->zone_id, 
      'thana_id' => $request->thana_id ?? 0, 
      'session_id' => $session_id, 
      'note' => $request->note, 
    );

    $insertdel = delivery_info::create($deliveryinfo);

    $invoice_id = $this->invoiceAutoId();

    $datetime = DB::select('SELECT NOW() as dates');
    foreach ($datetime as $key => $value) {

      $newdate =   $value->dates;
    }

    $discount = DB::table('offer_control')
    ->where('discount_start', '<=', $newdate)
    ->where('discount_end', '>=', $newdate)
    ->first();
    
    $life = DB::table('offer_control')
    ->where('life_start', '<=', $newdate)
    ->where('life_end', '>=', $newdate)
    ->first();

    $gadget = DB::table('offer_control')
    ->where('gadget_start', '<=', $newdate)
    ->where('gadget_end', '>=', $newdate)
    ->first();
    
    $deshi = DB::table('offer_control')
    ->where('deshi_start', '<=', $newdate)
    ->where('deshi_end', '>=', $newdate)
    ->first();

    


    if($discount)
    {
     $packageid='5';
     $packageday=$discount->discount_days;
   }
   else if($life)
   {
     $packageid='7';
     $packageday=$discount->lifestyle_days;
   }

   else if($gadget)
   {
     $packageid='8';
     $packageday=$discount->gadget_days;
   }
   else if($deshi)
   {
     $packageid='9';
     $packageday=$discount->deshi_days;
   }
   else
   {
     $packageid='0';
     $packageday='7';
   }

   $date = date('d-m-Y');


   $invoiceinfo  = array(
    'date' => $date,
    'invoice_id'=>$invoice_id,
    'delivery_id'=>$insertdel->id,
    'guest_id'=>$cus_id,
    'coupon_id'=>$request->super_code,
    'delivery_charge'=>$request->deliverycharge,
    'payment_type'=>$request->delivery_type,
    'trans_id'=>$request->trans_id,
    'deposit_date'=>$request->deposit_date,
    'mobile_acc'=>$request->mobile_acc,
    'discount'=>$request->discount,
    'redeem'=>$request->redeem ?? 0,
    'sub_total'=>$request->subamount,
    'grand_total'=>$request->totalamount,
    'session_id'=>$session_id,
    'package_id'=>$packageid,
    'package_days'=>$packageday,
  );

   $insertinv = invoice::create($invoiceinfo);

   $INVOICEbal = invoice_balance::create([

    'invoice_id'=>$invoice_id,
    'customer_id'=>$cus_id,
    'amount'=>$request->totalamount,
    'payment'=>'0',
    'due'=>$request->totalamount,
    'attempt'=>'0'

  ]);


   shopping_cart::where('session_id',$session_id)->update(['status'=>'1']);
   Session::regenerate();
   return redirect('/make_payment/'.$invoice_id.'');  
 }
 else
 {
  return redirect()->back();
}



}



public function success(Request $request)
{

        // dd( $request->all() );


 $pay =  payment_details::create(array_merge($request->all(), ['session_id' => $request->opt_a,'customer_id'=>$request->opt_b]));
 $data = invoice::where('invoice_id',$request->opt_c)->first();


 $bal = invoice_balance::where('invoice_id',$request->opt_c)->first();
 $INVOICEbal = invoice_balance::where('invoice_id',$request->opt_c)->update([

  'payment'=>$bal->payment+$request->amount,
  'due'=>$bal->due-$request->amount,
  'attempt'=>$bal->attempt+1

]);

 $trand = invoice_transaction::create([

  'invoice_id'=>$request->opt_c,
  'trans_id'=>$request->mer_txnid,
  'customer_id'=>$data->guest_id,
  'date'=>date('Y-m-d'),
  'payment'=>$request->amount,

]);


 $inbal =  invoice_balance::where('invoice_id',$request->opt_c)->first();
 if($inbal->due == 0)
 {
   $update = invoice::where('invoice_id',$request->opt_c)->update(['status'=>'1','payment_status'=>'1','online_pay_id'=>$request->pg_txnid,'online_pay_date'=>$request->pay_time]);
 }







 $message = "Your order has been Place,your order ID: ".$data->invoice_id."from Buynfeel.com";
 $recipient=$data->delivery_infos->phone;  
 $requestType = 'SINGLE_SMS';
 $messageType = 'TEXT';         
 $sms = new AdnSmsNotification();
 $sms->sendSms($requestType, $message, $recipient, $messageType);



 return redirect('/invoice-paper/'.$request->opt_a.'');
}

public function fail(Request $request){


  $pay = payment_details::create(array_merge($request->all(), ['session_id' => $request->opt_a,'customer_id'=>$request->opt_b]));

        //   dd( $request->all() );
  $update = invoice::where('invoice_id',$request->mer_txnid)->update(['status'=>'0','payment_status'=>'0','online_pay_id'=>'','online_pay_date'=>'']);

  return redirect('/invoice-paper/'.$request->opt_a.'');
}
public function cancel()
{


  return redirect('/userdashboard');
}



public function make_payment($invoice_id)
{
  $control = DB::table('payment_system_control',$invoice_id)->where('id','1')->first();
  $check = invoice::where('invoice_id',$invoice_id)->where('status','0')->first();


  if($check)
  {
    $due= invoice_balance::where('invoice_id',$invoice_id)->sum('due');

    return view('User.Guest.make_payment',compact('invoice_id','control','due'));   
  }
  else
  {
   return redirect()->back();
 }

}

public function make_payment_offline(Request $request)
{

  $invoice_id = $request->invoice_id;
  $data = invoice::where('invoice_id',$invoice_id)->first();
  $settings  = DB::table('settings')->first();

  $sub_total = $data->sub_total;
  $rate = $settings->reward_points;

  $reward_points = $sub_total/$rate;



  if($request->delivery_type == 'COD')
  {
    $invoiceinfo  = array(

      'payment_type'=>$request->delivery_type,
      'reward_points'   =>$reward_points ?? 0,
    );

  $guest = guest::where('id', $data->guest_id)->first();
  $guestPoint = guest::where('id', $data->guest_id)->update(['reward_points' => $guest->reward_points + $reward_points]);

  }else{

 
    $validator = Validator::make($request->all(), [
      'delivery_type' => 'required',
      'trans_id' => 'required|unique:invoices',
    ]);

    if ($validator->fails()) 
    {
      return redirect()->back()
      ->withErrors($validator)
      ->withInput();
    }

    $invoiceinfo  = array(
      'payment_type' =>$request->delivery_type,
      'trans_id'     =>$request->trans_id,
      'mobile_acc'   =>$request->mobile_acc,
      'reward_points'   =>$reward_points,
    );

  $guest = guest::where('id', $data->guest_id)->first();
  $guestPoint = guest::where('id', $data->guest_id)->update(['reward_points' => $guest->reward_points + $reward_points]);


  
}

$insertinv = invoice::where('invoice_id',$invoice_id)->update($invoiceinfo);


$notification=array(
  'messege'   =>'Your Order Successfully',
  'alert-type'=>'success'
);

return redirect('/userdashboard/')->with($notification);


}


public function make_payment_online(Request $request)
{

  $invoice_id = $request->invoice_id;
  $data = invoice::where('invoice_id',$invoice_id)->first();

  $rand = rand(0, 99999);

$url = 'https://secure.aamarpay.com/request.php'; // 
$fields = array(
                'store_id' => 'buynfeel', //
                 'amount' => $request->total_amount, //transaction amount
                'payment_type' => 'VISA', //no need to change
                'currency' => 'BDT',  //currenct will be USD/BDT
                'tran_id' => $rand, //transaction id must be unique from your end
                'cus_name' => $data->delivery_infos->first_name,  //customer name
                'cus_email' =>$data->delivery_infos->email, //customer email address
                'cus_add1' => $data->delivery_infos->address,  //customer address
                'cus_add2' => '', //customer address
                'cus_city' => $data->delivery_infos->district->district_name,  //customer city
                'cus_state' => $data->delivery_infos->thana->thana_name,  //state
                'cus_postcode' => '', //postcode or zipcode
                'cus_country' => 'Bangladesh',  //country
                'cus_phone' => $data->delivery_infos->phone, //customer phone number
                'cus_fax' => 'Not¬Applicable',  //fax
                'ship_name' => $data->delivery_infos->first_name, //ship name
                'ship_add1' =>  $data->delivery_infos->address,  //ship address
                'ship_add2' => '',
                'ship_city' => '', 
                'ship_state' => '',
                'ship_postcode' => '', 
                'ship_country' => 'Bangladesh',
                'desc' =>  'product', 
                'success_url' => url('success'), //your success route
                'fail_url' =>  url('fail'), //your fail route
                'cancel_url' =>  url('cancel'), //your cancel url
                'opt_a' => $data->session_id,  //optional paramter
                'opt_b' => $data->guest_id,  //customer id
                'opt_c' => $invoice_id,  //invoice id
                'opt_d' => '',
                'signature_key' => '2a0e21b1688721e52e17feb866a447ac'); //signature key will provided aamarpay, contact integration@aamarpay.com for test/live signature key

$fields_string = http_build_query($fields);
                // dd($fields_string);

$ch = curl_init();
curl_setopt($ch, CURLOPT_VERBOSE, true);
curl_setopt($ch, CURLOPT_URL, $url);  

curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_POSTFIELDS, $fields_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
$url_forward = str_replace('"', '', stripslashes(curl_exec($ch)));  
$response = curl_exec($ch);
curl_close($ch); 

$inv = invoice_balance::where('invoice_id',$invoice_id)->first();



$url="https://secure.aamarpay.com/".$url_forward;
return redirect($url);
}

public function invoicepaper($session)
{
 $viewcart =  DB::table('invoices')
 ->join('delivery_infos','delivery_infos.id','invoices.delivery_id')
 ->join('shopping_carts','shopping_carts.session_id','invoices.session_id')
 ->join('product_productinfo','product_productinfo.id','shopping_carts.product_id')
 ->join('zones','zones.id','delivery_infos.zone_id')
 ->join('guest','guest.id','invoices.guest_id')
 ->where('invoices.session_id',$session)
 ->select('invoices.*','delivery_infos.*','shopping_carts.quantity','shopping_carts.color','shopping_carts.size',
  'product_productinfo.product_id as sku','product_productinfo.product_name',
  'shopping_carts.sale_price','shopping_carts.discount_price','shopping_carts.current_price','zones.zone_name',
  'guest.first_name as guestfirstname','guest.last_name as guestlastname','guest.vessel_name as guestvessel_name','guest.phone as guestphone','guest.rank as guestrank')
 ->get();

 // dd($viewcart);

 $payment = payment_details::where('session_id',$session)->orderby('id','DESC')->first();
            // $viewcart = invoice::where('session_id',$session)->get();
 $contact = contact_us::where('id','1')->first();
                    // dd($viewcart);

 $balance =   invoice_balance::where('invoice_id',$viewcart[0]->invoice_id)->first();
 return view('User.invoicepaper',compact('viewcart','contact','payment','balance'));
}




public function viewinvoice($session)
{
 $viewcart =  DB::table('invoices')
 ->join('delivery_infos','delivery_infos.id','invoices.delivery_id')
 ->join('shopping_carts','shopping_carts.session_id','invoices.session_id')
 ->join('product_productinfo','product_productinfo.id','shopping_carts.product_id')
 ->join('zones','zones.id','delivery_infos.zone_id')
 ->join('guest','guest.id','invoices.guest_id')
 ->where('invoices.session_id',$session)
 ->select('invoices.*','delivery_infos.*','shopping_carts.quantity','shopping_carts.color','shopping_carts.size',
  'product_productinfo.product_id as sku','product_productinfo.product_name',
  'shopping_carts.sale_price','shopping_carts.discount_price','shopping_carts.current_price','zones.zone_name',
  'guest.first_name as guestfirstname','guest.last_name as guestlastname','guest.vessel_name as guestvessel_name','guest.phone as guestphone','guest.rank as guestrank')
 ->get();



 $payment = payment_details::where('session_id',$session)->orderby('id','DESC')->first();
            // $viewcart = invoice::where('session_id',$session)->get();
 $contact = contact_us::where('id','1')->first();
                    // dd($viewcart);

 $balance =   invoice_balance::where('invoice_id',$viewcart[0]->invoice_id)->first();

 $data = DB::table('invoices')
 ->join('delivery_infos','delivery_infos.id','invoices.delivery_id')
 ->join('zones','zones.id','delivery_infos.zone_id')
 ->where('invoices.guest_id',Auth('guest')->user()->id)
 ->select('invoices.*','delivery_infos.*','zones.zone_name')
 ->groupby('invoices.invoice_id')
 ->get();


 return view('User.Guest.viewinvoice',compact('viewcart','contact','payment','balance','data'));
}













public function invoice_ordertrack($session)
{
 $viewcart =  DB::table('invoices')
 ->join('delivery_infos','delivery_infos.id','invoices.delivery_id')
 ->join('shopping_carts','shopping_carts.session_id','invoices.session_id')
 ->join('product_productinfo','product_productinfo.id','shopping_carts.product_id')
 ->join('zones','zones.id','delivery_infos.zone_id')
 ->where('invoices.session_id',$session)
 ->select('invoices.*')
 ->first();


 return view('User.Guest.ordertrack',compact('viewcart'));
}

public function invoicePDF($session)
{


 $viewcart =  DB::table('invoices')
 ->join('delivery_infos','delivery_infos.id','invoices.delivery_id')
 ->join('shopping_carts','shopping_carts.session_id','invoices.session_id')
 ->join('product_productinfo','product_productinfo.id','shopping_carts.product_id')
 ->join('zones','zones.id','delivery_infos.zone_id')
 ->join('guest','guest.id','invoices.guest_id')
 ->where('invoices.session_id',$session)
 ->select('invoices.*','delivery_infos.*','shopping_carts.quantity','shopping_carts.color','shopping_carts.size',
  'product_productinfo.product_id as sku','product_productinfo.product_name',
  'shopping_carts.sale_price','shopping_carts.discount_price','shopping_carts.current_price','zones.zone_name',
  'guest.first_name as guestfirstname','guest.last_name as guestlastname','guest.email as guestemail','guest.phone as guestphone','guest.address as guestaddr')
 ->get();
 $payment = payment_details::where('session_id',$session)->orderby('id','DESC')->first();
 $balance =   invoice_balance::where('invoice_id',$viewcart[0]->invoice_id)->first();

 $pdf = PDF::loadView('User.invoicepaper_print', compact('viewcart','payment','balance'))->setPaper('a4', 'Portrait');

 return $pdf->stream($viewcart[0]->invoice_id.'.pdf');
}



public function wishlist()
{
  if (Auth('guest')->user()) {
    $cus_id = Auth('guest')->user()->id;
    $wishlists = Wishlist::where('user_id', $cus_id)->get();
    return view('User.pages.wishlist', compact('cus_id', 'wishlists'));
  }else{
    return redirect('/user-login');
  }
}

public function remove_from_wishlist(Request $request)
{
 $delete = Wishlist::where('id',$request->product_id)->delete();

}




}


