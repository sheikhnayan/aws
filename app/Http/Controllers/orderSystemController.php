<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product_item;
use App\product_category;
use App\product_subcategory;
use App\product_company;
use App\product_measurement;
use App\product_color_info;
use App\product_color;
use App\product_size;
use App\product_size_info;
use App\product_info;
use App\invoice_balance;
use App\invoice_transaction;
use App\ExchangeRequest;
use App\seller;
use Validator;
use DB;
use Auth;
use App\Lib\Adnsms\lib\AdnSmsNotification;
class orderSystemController extends Controller
{
    public function allorderstatus()
    {
          $data = DB::table('invoices')
                    ->join('guest','guest.id','invoices.guest_id')
                    ->join('delivery_infos','delivery_infos.id','invoices.delivery_id')
                    ->join('shopping_carts','shopping_carts.session_id','invoices.session_id')
                    ->join('product_productinfo','product_productinfo.id','shopping_carts.product_id')
                    ->join('districts','districts.id','delivery_infos.district_id')
                    ->groupby('invoices.id')
                    ->select('invoices.*','delivery_infos.*','shopping_carts.sale_price','shopping_carts.discount_price','shopping_carts.current_price','product_productinfo.product_name','guest.first_name as billing_name','guest.address as billing_address','guest.phone as billing_phone','districts.district_name')
                    ->get();
    


        return view('Admin.Order_system.only_order_status',compact('data'));
    }
    
    public function totalOrder()
    {
          $data = DB::table('invoices')->get();


          // $data = DB::table('invoices')
          //           ->join('guest','guest.id','invoices.guest_id')
          //           ->join('delivery_infos','delivery_infos.id','invoices.delivery_id')
          //           ->join('shopping_carts','shopping_carts.session_id','invoices.session_id')
          //           ->join('product_productinfo','product_productinfo.id','shopping_carts.product_id')
          //           ->join('districts','districts.id','delivery_infos.district_id')
          //           ->groupby('invoices.id')
          //           ->select('invoices.*','delivery_infos.first_name','delivery_infos.last_name', 'delivery_infos.email', 'delivery_infos.address', 'delivery_infos.phone', 'delivery_infos.country', 'delivery_infos.district_id', 'delivery_infos.zone_id',  'delivery_infos.session_id',  'shopping_carts.sale_price','shopping_carts.discount_price','shopping_carts.current_price','product_productinfo.product_name','guest.first_name as billing_name','guest.address as billing_address','guest.phone as billing_phone','districts.district_name')
          //           ->get();


        return view('Admin.Order_system.totalorder',compact('data'));
    }
    
    public function fosterpayorder()
    {
          $data = DB::table('online_payment_details')
                    ->join('invoices','invoices.session_id','online_payment_details.session_id')
                    ->select('online_payment_details.*','invoices.status')
                    ->get();
                    
    


        return view('Admin.Order_system.fosterpay',compact('data'));
    }
    
    public function online_pay_order()
    {
          $data = DB::table('online_payment_details')
                    ->join('invoices','invoices.session_id','online_payment_details.session_id')
                    ->where('pay_status','Successful')
                    ->select('online_payment_details.*','invoices.status')
                    ->get();
                    
    


        return view('Admin.Order_system.online_pay_order',compact('data'));
    }

    public function pendingOrder()
    {
          $data = DB::table('invoices')->where('invoices.status','0')->get();

         // $data = DB::table('invoices')
      //               ->join('guest','guest.id','invoices.guest_id')
      //               ->join('delivery_infos','delivery_infos.id','invoices.delivery_id')
      //               ->join('shopping_carts','shopping_carts.session_id','invoices.session_id')
      //               ->join('product_productinfo','product_productinfo.id','shopping_carts.product_id')
      //               ->join('districts','districts.id','delivery_infos.district_id')
      //               ->where('invoices.status','0')
      //               ->groupby('invoices.id')
      //               ->select('invoices.*','delivery_infos.*','shopping_carts.sale_price','shopping_carts.discount_price','shopping_carts.current_price','product_productinfo.product_name','guest.first_name as billing_name','guest.address as billing_address','guest.phone as billing_phone','districts.district_name')
      //               ->get();
                    
        
        return view('Admin.Order_system.pending',compact('data'));
    }


    public function ProcessOrder()
    {
          $data = DB::table('invoices')->where('invoices.status','1')->get();

     // $data = DB::table('invoices')
     //                ->join('guest','guest.id','invoices.guest_id')
     //                ->join('delivery_infos','delivery_infos.id','invoices.delivery_id')
     //                ->join('shopping_carts','shopping_carts.session_id','invoices.session_id')
     //                ->join('product_productinfo','product_productinfo.id','shopping_carts.product_id')
     //                ->join('districts','districts.id','delivery_infos.district_id')
     //                ->where('invoices.status','1')
     //                ->groupby('invoices.id')
     //                ->select('invoices.*','delivery_infos.*','shopping_carts.sale_price','shopping_carts.discount_price','shopping_carts.current_price','product_productinfo.product_name','guest.first_name as billing_name','guest.address as billing_address','guest.phone as billing_phone','districts.district_name')
     //                ->get();
                    
    


        return view('Admin.Order_system.process',compact('data'));
    }
    public function shippingorder()
    {
          $data = DB::table('invoices')->where('invoices.status','5')->get();

          // $data = DB::table('invoices')
       //              ->join('guest','guest.id','invoices.guest_id')
       //              ->join('delivery_infos','delivery_infos.id','invoices.delivery_id')
       //              ->join('shopping_carts','shopping_carts.session_id','invoices.session_id')
       //              ->join('product_productinfo','product_productinfo.id','shopping_carts.product_id')
       //              ->join('districts','districts.id','delivery_infos.district_id')
       //              ->where('invoices.status','5')
       //              ->groupby('invoices.id')
       //              ->select('invoices.*','delivery_infos.*','shopping_carts.sale_price','shopping_carts.discount_price','shopping_carts.current_price','product_productinfo.product_name','guest.first_name as billing_name','guest.address as billing_address','guest.phone as billing_phone','districts.district_name')
       //              ->get();
                    
        



        return view('Admin.Order_system.shipping',compact('data'));
    }


    public function onthewayOrder()
    {
          $data = DB::table('invoices')->where('invoices.status','2')->get();

          // $data = DB::table('invoices')
       //              ->join('guest','guest.id','invoices.guest_id')
       //              ->join('delivery_infos','delivery_infos.id','invoices.delivery_id')
       //              ->join('shopping_carts','shopping_carts.session_id','invoices.session_id')
       //              ->join('product_productinfo','product_productinfo.id','shopping_carts.product_id')
       //              ->join('districts','districts.id','delivery_infos.district_id')
       //              ->where('invoices.status','2')
       //              ->groupby('invoices.id')
       //              ->select('invoices.*','delivery_infos.*','shopping_carts.sale_price','shopping_carts.discount_price','shopping_carts.current_price','product_productinfo.product_name','guest.first_name as billing_name','guest.address as billing_address','guest.phone as billing_phone','districts.district_name')
       //              ->get();
                    
        


                    
                    

        return view('Admin.Order_system.ontheway',compact('data'));
    }

    public function RefoundOrder()
    {
          $data = DB::table('invoices')->where('invoices.status','6')->get();

          // $data = DB::table('invoices')
       //              ->join('guest','guest.id','invoices.guest_id')
       //              ->join('delivery_infos','delivery_infos.id','invoices.delivery_id')
       //              ->join('shopping_carts','shopping_carts.session_id','invoices.session_id')
       //              ->join('product_productinfo','product_productinfo.id','shopping_carts.product_id')
       //              ->join('districts','districts.id','delivery_infos.district_id')
       //              ->where('invoices.status','6')
       //              ->groupby('invoices.id')
       //              ->select('invoices.*','delivery_infos.*','shopping_carts.sale_price','shopping_carts.discount_price','shopping_carts.current_price','product_productinfo.product_name','guest.first_name as billing_name','guest.address as billing_address','guest.phone as billing_phone','districts.district_name')
       //              ->get();
                    
        

                    
                    

        return view('Admin.Order_system.refound',compact('data'));
    }


    public function CompleteOrder()
    {
          $data = DB::table('invoices')->where('invoices.status','3')->get();

         // $data = DB::table('invoices')
      //               ->join('guest','guest.id','invoices.guest_id')
      //               ->join('delivery_infos','delivery_infos.id','invoices.delivery_id')
      //               ->join('shopping_carts','shopping_carts.session_id','invoices.session_id')
      //               ->join('product_productinfo','product_productinfo.id','shopping_carts.product_id')
      //               ->join('districts','districts.id','delivery_infos.district_id')
      //               ->where('invoices.status','3')
      //               ->groupby('invoices.id')
      //               ->select('invoices.*','delivery_infos.*','shopping_carts.sale_price','shopping_carts.discount_price','shopping_carts.current_price','product_productinfo.product_name','product_productinfo.current_price','guest.first_name as billing_name','guest.address as billing_address','guest.phone as billing_phone','districts.district_name')
      //               ->get();
                    
    


        return view('Admin.Order_system.complete',compact('data'));
    }

    public function RejectOrder()
    {
          $data = DB::table('invoices')->where('invoices.status','4')->get();

          // $data = DB::table('invoices')
       //              ->join('guest','guest.id','invoices.guest_id')
       //              ->join('delivery_infos','delivery_infos.id','invoices.delivery_id')
       //              ->join('shopping_carts','shopping_carts.session_id','invoices.session_id')
       //              ->join('product_productinfo','product_productinfo.id','shopping_carts.product_id')
       //              ->join('districts','districts.id','delivery_infos.district_id')
       //              ->where('invoices.status','4')
       //              ->groupby('invoices.id')
       //              ->select('invoices.*','delivery_infos.*','shopping_carts.sale_price','shopping_carts.discount_price','shopping_carts.current_price','product_productinfo.product_name','guest.first_name as billing_name','guest.address as billing_address','guest.phone as billing_phone','districts.district_name')
       //              ->get();
                    
        


        return view('Admin.Order_system.reject',compact('data'));
    }

    public function processorder_note($id)
    {
        return view('Admin.Order_system.note',compact('id'));
    }
    public function rejectorder_note($id)
    {
        return view('Admin.Order_system.reject_note',compact('id'));
    }
    public function shipping_address($id)
    {
                
                
        $data = DB::table('delivery_infos')
                ->join('invoices','invoices.delivery_id','delivery_infos.id')
                ->where('invoices.invoice_id',$id)
                ->select('delivery_infos.*')
                ->first();
                
        $district = DB::table('districts')->get();
        $thana = DB::table('thanas')->get();
        return view('Admin.Order_system.shipping_address_edit',compact('data','district','thana','id'));
    }
    public function change_shipping(Request $request)
    {
        
        $chk = DB::table('invoices')
                ->join('shopping_carts','shopping_carts.session_id','invoices.session_id')
                ->join('product_productinfo','shopping_carts.product_id','product_productinfo.id')
                ->where('invoices.invoice_id',$request->invoice_id)
                ->select('product_productinfo.shipping_id')
                ->get();
                
        
         

       // dd($chargesystem);
       $totalcharge =0;
       foreach ($chk as $key => $value) 
       {
           
           $chargesystem = DB::table('delivery_charges')
                        ->join('zone_districts','zone_districts.zone_id','delivery_charges.zone_id')
                        ->where('delivery_charges.shipping_id',$value->shipping_id)
                        ->where('zone_districts.thana_id',$request->thana_id)
                        ->first();
                        
           $totalcharge += $chargesystem->charge;
       }

     
        
        
        $data = DB::table('delivery_infos')
                ->where('id',$request->id)
                ->update(['first_name'=>$request->first_name,'email'=>$request->email,'address'=>$request->address,
                'phone'=>$request->phone,'district_id'=>$request->district_id,'thana_id'=>$request->thana_id]);
                
        $upch = DB::table('invoices')->where('invoice_id',$request->invoice_id)->first();
        
        $up = DB::table('invoices')->where('invoice_id',$request->invoice_id)->update(['delivery_charge'=>$totalcharge,'grand_total'=>$upch->sub_total+$totalcharge]);
                
        $notify = array('messege'=>'Shipping address change','alert-type'=>'success');
                
        return redirect()->back()->with($notify);
    }
    
    public function penToProOrder(Request $request)
    {
        $update = DB::table('invoices')->where('invoice_id',$request->id)->update(['status'=>'1','note'=>$request->note,'payment_status'=>'1','updated_at'=>date('Y-m-d H:i:s')]);
    }

    public function proToontheOrder(Request $request)
    {
        $update = DB::table('invoices')->where('invoice_id',$request->id)->update(['status'=>'2','payment_status'=>'1','updated_at'=>date('Y-m-d H:i:s')]);
    }

    public function protoShipping(Request $request)
    {
        $update = DB::table('invoices')->where('invoice_id',$request->id)->update(['status'=>'5','payment_status'=>'1','updated_at'=>date('Y-m-d H:i:s')]);
    }

    public function ontheTosuccOrder(Request $request)
    {
        
        $chk = DB::table('invoices')->where('invoice_id',$request->id)->first();
        $update = DB::table('invoices')->where('invoice_id',$request->id)->update(['status'=>'3','payment_status'=>'1','updated_at'=>date('Y-m-d H:i:s')]);
        $data = DB::table('delivery_infos')->where('id',$chk->delivery_id)->first();
        
         $message = "Dear ".$data->first_name." ,Your order has been Completed,your order ID#: ".$invoice_id."from Buynfeel.com";
        $recipient=$data->phone;  
        $requestType = 'SINGLE_SMS';
        $messageType = 'TEXT';         
        $sms = new AdnSmsNotification();
        $sms->sendSms($requestType, $message, $recipient, $messageType);

        
    }

    public function penTorejectOrder(Request $request)
    {
        $update = DB::table('invoices')->where('invoice_id',$request->id)->update(['status'=>'4','reject_note'=>$request->note,'payment_status'=>'0','updated_at'=>date('Y-m-d H:i:s')]);
    }
    public function rejecttorefundOrder(Request $request)
    {
        $update = DB::table('invoices')->where('invoice_id',$request->id)->update(['status'=>'6','updated_at'=>date('Y-m-d H:i:s')]);
    }
       public function clearshopping()
    {
        $update = DB::table('shopping_carts')->where('status','0')->where('created_at','<',date('Y-m-d H:i:s'))->delete();
    
            $notify=array(
            'messege'   =>'Clear Previous Shopping Data Successfull',
            'alert-type'=>'warning'
        );
        return redirect()->back()->with($notify);
    }
    
    
        public function datetodateorder()
    {
        $product = product_info::all();
        return view('Admin.Order_system.date_to_date_order',compact('product'));
    }
        public function datetodateorderlist(Request $request)
    {
        
        $date1=$request->date1." 00:00:00";
        $date2=$request->date2." 23:59:59";

        
        
        if($request->product_id =='' && $request->status =='' && $request->payment_type =='')
        {
         
         $data = DB::table('invoices')
                    ->join('guest','guest.id','invoices.guest_id')
                    ->join('delivery_infos','delivery_infos.id','invoices.delivery_id')
                    ->join('shopping_carts','shopping_carts.session_id','invoices.session_id')
                    ->join('product_productinfo','product_productinfo.id','shopping_carts.product_id')
                    ->join('districts','districts.id','delivery_infos.district_id')
                    ->whereBetween('invoices.created_at',[$date1,$date2])
                    ->groupby('invoices.id')
                    ->select('invoices.*','delivery_infos.*','shopping_carts.sale_price','shopping_carts.discount_price','shopping_carts.current_price','product_productinfo.product_name','guest.first_name as billing_name','guest.address as billing_address','guest.phone as billing_phone','districts.district_name')
                    ->get();
                    
         $product = DB::table('invoices')
                    ->join('shopping_carts','shopping_carts.session_id','invoices.session_id')
                    ->join('product_productinfo','product_productinfo.id','shopping_carts.product_id')
                    ->select('product_productinfo.product_name','product_productinfo.current_price','product_productinfo.product_id','invoices.invoice_id','shopping_carts.quantity')
                    ->get();
                    
        }
        
       else if($request->product_id !='' && $request->status !='' && $request->payment_type !='' )
        {
          $data = DB::table('invoices')
                    ->join('guest','guest.id','invoices.guest_id')
                    ->join('delivery_infos','delivery_infos.id','invoices.delivery_id')
                    ->join('shopping_carts','shopping_carts.session_id','invoices.session_id')
                    ->join('product_productinfo','product_productinfo.id','shopping_carts.product_id')
                    ->join('districts','districts.id','delivery_infos.district_id')
                    ->where('invoices.status',$request->status)
                    ->where('shopping_carts.product_id',$request->product_id)
                    ->where('invoices.payment_type',$request->payment_type)
                    ->whereBetween('invoices.created_at',[$date1,$date2])
                    ->groupby('invoices.id')
                    ->select('invoices.*','delivery_infos.*','shopping_carts.sale_price','shopping_carts.discount_price','shopping_carts.current_price','product_productinfo.product_name','guest.first_name as billing_name','guest.address as billing_address','guest.phone as billing_phone','districts.district_name')
                    ->get();
                    
         $product = DB::table('invoices')
                    ->join('shopping_carts','shopping_carts.session_id','invoices.session_id')
                    ->join('product_productinfo','product_productinfo.id','shopping_carts.product_id')
                    ->select('product_productinfo.product_name','product_productinfo.current_price','product_productinfo.product_id','invoices.invoice_id','shopping_carts.quantity')
                    ->get();
        }
        
       else if($request->product_id !='' && $request->status =='' && $request->payment_type =='')
        {
          $data = DB::table('invoices')
                    ->join('guest','guest.id','invoices.guest_id')
                    ->join('delivery_infos','delivery_infos.id','invoices.delivery_id')
                    ->join('shopping_carts','shopping_carts.session_id','invoices.session_id')
                    ->join('product_productinfo','product_productinfo.id','shopping_carts.product_id')
                    ->join('districts','districts.id','delivery_infos.district_id')
                    ->where('shopping_carts.product_id',$request->product_id)
                    ->whereBetween('invoices.created_at',[$date1,$date2])
                    ->groupby('invoices.id')
                    ->select('invoices.*','delivery_infos.*','shopping_carts.sale_price','shopping_carts.discount_price','shopping_carts.current_price','product_productinfo.product_name','guest.first_name as billing_name','guest.address as billing_address','guest.phone as billing_phone','districts.district_name')
                    ->get();
                    
         $product = DB::table('invoices')
                    ->join('shopping_carts','shopping_carts.session_id','invoices.session_id')
                    ->join('product_productinfo','product_productinfo.id','shopping_carts.product_id')
                    ->select('product_productinfo.product_name','product_productinfo.current_price','product_productinfo.product_id','invoices.invoice_id','shopping_carts.quantity')
                    ->get();
        }
        
       else if($request->product_id =='' && $request->status !='' && $request->payment_type !='')
        {
           $data = DB::table('invoices')
                    ->join('guest','guest.id','invoices.guest_id')
                    ->join('delivery_infos','delivery_infos.id','invoices.delivery_id')
                    ->join('shopping_carts','shopping_carts.session_id','invoices.session_id')
                    ->join('product_productinfo','product_productinfo.id','shopping_carts.product_id')
                    ->join('districts','districts.id','delivery_infos.district_id')
                    ->where('invoices.payment_type',$request->payment_type)
                    ->where('invoices.status',$request->status)
                    
                    ->whereBetween('invoices.created_at',[$date1,$date2])
                    ->groupby('invoices.id')
                    ->select('invoices.*','delivery_infos.*','shopping_carts.sale_price','shopping_carts.discount_price','shopping_carts.current_price','product_productinfo.product_name','guest.first_name as billing_name','guest.address as billing_address','guest.phone as billing_phone','districts.district_name')
                    ->get();
                    
         $product = DB::table('invoices')
                    ->join('shopping_carts','shopping_carts.session_id','invoices.session_id')
                    ->join('product_productinfo','product_productinfo.id','shopping_carts.product_id')
                    ->select('product_productinfo.product_name','product_productinfo.current_price','product_productinfo.product_id','invoices.invoice_id','shopping_carts.quantity')
                    ->get();
        }
        
        else if($request->product_id =='' && $request->status =='' && $request->payment_type !='')
        {
           $data = DB::table('invoices')
                    ->join('guest','guest.id','invoices.guest_id')
                    ->join('delivery_infos','delivery_infos.id','invoices.delivery_id')
                    ->join('shopping_carts','shopping_carts.session_id','invoices.session_id')
                    ->join('product_productinfo','product_productinfo.id','shopping_carts.product_id')
                    ->join('districts','districts.id','delivery_infos.district_id')
                    ->where('invoices.payment_type',$request->payment_type)
                    ->whereBetween('invoices.created_at',[$date1,$date2])
                    ->groupby('invoices.id')
                    ->select('invoices.*','delivery_infos.*','shopping_carts.sale_price','shopping_carts.discount_price','shopping_carts.current_price','product_productinfo.product_name','guest.first_name as billing_name','guest.address as billing_address','guest.phone as billing_phone','districts.district_name')
                    ->get();
                    
         $product = DB::table('invoices')
                    ->join('shopping_carts','shopping_carts.session_id','invoices.session_id')
                    ->join('product_productinfo','product_productinfo.id','shopping_carts.product_id')
                    ->select('product_productinfo.product_name','product_productinfo.current_price','product_productinfo.product_id','invoices.invoice_id','shopping_carts.quantity')
                    ->get();
        }
        
        else if($request->product_id =='' && $request->status !='' && $request->payment_type =='')
        {
           $data = DB::table('invoices')
                    ->join('guest','guest.id','invoices.guest_id')
                    ->join('delivery_infos','delivery_infos.id','invoices.delivery_id')
                    ->join('shopping_carts','shopping_carts.session_id','invoices.session_id')
                    ->join('product_productinfo','product_productinfo.id','shopping_carts.product_id')
                    ->join('districts','districts.id','delivery_infos.district_id')
                    ->where('invoices.status',$request->status)
                    ->whereBetween('invoices.created_at',[$date1,$date2])
                    ->groupby('invoices.id')
                    ->select('invoices.*','delivery_infos.*','shopping_carts.sale_price','shopping_carts.discount_price','shopping_carts.current_price','product_productinfo.product_name','guest.first_name as billing_name','guest.address as billing_address','guest.phone as billing_phone','districts.district_name')
                    ->get();
                    
         $product = DB::table('invoices')
                    ->join('shopping_carts','shopping_carts.session_id','invoices.session_id')
                    ->join('product_productinfo','product_productinfo.id','shopping_carts.product_id')
                    ->select('product_productinfo.product_name','product_productinfo.current_price','product_productinfo.product_id','invoices.invoice_id','shopping_carts.quantity')
                    ->get();
        }
        
       
        


        return view('Admin.Order_system.date_to_date_order_list',compact('data','product','date1','date2'));
    }
    
    
    public function search_order(Request $request)
    {
        
          $data = DB::table('invoices')
                    ->join('guest','guest.id','invoices.guest_id')
                    ->join('delivery_infos','delivery_infos.id','invoices.delivery_id')
                    ->join('shopping_carts','shopping_carts.session_id','invoices.session_id')
                    ->join('product_productinfo','product_productinfo.id','shopping_carts.product_id')
                    ->join('districts','districts.id','delivery_infos.district_id')
                    ->groupby('invoices.id')
                     ->where('invoices.invoice_id',$request->order_id)
                    ->select('invoices.*','delivery_infos.*','shopping_carts.sale_price','shopping_carts.discount_price','shopping_carts.current_price','product_productinfo.product_name','product_productinfo.current_price','guest.first_name as billing_name','guest.address as billing_address','guest.phone as billing_phone','districts.district_name')
                    ->get();
                    
         $product = DB::table('invoices')
                    ->join('shopping_carts','shopping_carts.session_id','invoices.session_id')
                    ->join('product_productinfo','product_productinfo.id','shopping_carts.product_id')
                     ->where('invoices.invoice_id',$request->order_id)
                    ->select('product_productinfo.product_name','product_productinfo.current_price','product_productinfo.product_id','invoices.invoice_id','shopping_carts.quantity')
                    ->get();


        return view('Admin.Order_system.totalorder',compact('data','product'));
    }
    
    public function payment_control()
    {
        return view('Admin.other.pay_control');
    }
    public function updatecontrol(Request $request)
    {
        if($request->control == '1')
        {
               
        $chk = DB::table('payment_system_control')->where('cash','1')->first();
        if($chk)
        {
            $update = DB::table('payment_system_control')->where('cash','1')->update(['cash'=>'0']);
        }
        else
        {
           $update = DB::table('payment_system_control')->where('cash','0')->update(['cash'=>'1']); 
        }
        
        
        
        }
        else if($request->control == '2')
        {
            $chk = DB::table('payment_system_control')->where('online','1')->first();
             if($chk)
        {
            $update = DB::table('payment_system_control')->where('online','1')->update(['online'=>'0']);
        }
        else
        {
             $update = DB::table('payment_system_control')->where('online','0')->update(['online'=>'1']);
        }
            
        
          
      
        }
        else if($request->control == '3')
        {
            
            $chk = DB::table('payment_system_control')->where('bkash','1')->first();
             if($chk)
        {
            $update = DB::table('payment_system_control')->where('bkash','1')->update(['bkash'=>'0']);
        }
        else
        {
             $update = DB::table('payment_system_control')->where('bkash','0')->update(['bkash'=>'1']);
        }
        
      
        }
        else if($request->control == '4')
        {
            
             $chk = DB::table('payment_system_control')->where('rocket','1')->first();
             if($chk)
        {
            $update = DB::table('payment_system_control')->where('rocket','1')->update(['rocket'=>'0']);
        }
        else
        {
             $update = DB::table('payment_system_control')->where('rocket','0')->update(['rocket'=>'1']);
        }
        
        
        
      
        }
        else if($request->control == '5')
        {
             $chk = DB::table('payment_system_control')->where('nagad','1')->first();
             if($chk)
        {
            $update = DB::table('payment_system_control')->where('nagad','1')->update(['nagad'=>'0']);
        }
        else
        {
             $update = DB::table('payment_system_control')->where('nagad','0')->update(['nagad'=>'1']);
        }
        
          
      
        }
        else if($request->control == '6')
        {
           $chk = DB::table('payment_system_control')->where('bank','1')->first();
             if($chk)
        {
            $update = DB::table('payment_system_control')->where('bank','1')->update(['bank'=>'0']);
        }
        else
        {
             $update = DB::table('payment_system_control')->where('bank','0')->update(['bank'=>'1']);
        }
        
      
        }
        
        
            $notify=array(
            'messege'   =>'Payment Method Change Successfull',
            'alert-type'=>'warning'
        );
        return redirect()->back()->with($notify);
        
       
     
    }
    
    public function order_report()
    {
        return view('Admin.Order_system.report');
    }
    
    public function order_reporttab(Request $request)
    {
          
        $date1=$request->date1." 00:00:00";
        $date2=$request->date2." 23:59:59";
        $status=$request->status;
        
        if($status == 'all')
        {
            $data = DB::table('invoices')
                    ->join('guest','guest.id','invoices.guest_id')
                    ->join('delivery_infos','delivery_infos.id','invoices.delivery_id')
                    ->join('shopping_carts','shopping_carts.session_id','invoices.session_id')
                    ->join('product_productinfo','product_productinfo.id','shopping_carts.product_id')
                    ->join('districts','districts.id','delivery_infos.district_id')
                    ->join('product_category','product_category.id','product_productinfo.category_id')
                    ->whereBetween('invoices.created_at',[$date1,$date2])
                    ->groupby('shopping_carts.product_id')
                    ->orderby('product_category.category_name')
                    ->select('invoices.*','shopping_carts.current_price','shopping_carts.discount_price','shopping_carts.sale_price','product_productinfo.product_name','product_productinfo.product_id',
                    DB::raw('sum(invoices.delivery_charge) as total_delivery_charge'),
                    DB::raw('sum(shopping_carts.quantity) as quantity'))
                    ->get();
                    
        }
        else
        {
              $data = DB::table('invoices')
                    ->join('guest','guest.id','invoices.guest_id')
                    ->join('delivery_infos','delivery_infos.id','invoices.delivery_id')
                    ->join('shopping_carts','shopping_carts.session_id','invoices.session_id')
                    ->join('product_productinfo','product_productinfo.id','shopping_carts.product_id')
                    ->join('districts','districts.id','delivery_infos.district_id')
                    ->join('product_category','product_category.id','product_productinfo.category_id')
                    ->where('invoices.status',$status)
                    ->whereBetween('invoices.created_at',[$date1,$date2])
                    ->groupby('shopping_carts.product_id')
                    ->orderby('product_category.category_name')
                    ->select('invoices.*','shopping_carts.current_price','shopping_carts.discount_price','shopping_carts.sale_price','product_productinfo.product_name','product_productinfo.product_id',
                    DB::raw('sum(invoices.delivery_charge) as total_delivery_charge'),
                    DB::raw('sum(shopping_carts.quantity) as quantity'))
                    ->get();
        }
        
        return view('Admin.Order_system.reporttab',compact('data','date1','date2','status'));
    }
    
        public function amarpayorderreport()
    {
        return view('Admin.Order_system.amarpay-order-report');
    }
    
    public function amarpayreportlist(Request $request)
    {
          
        $date1=$request->date1." 00:00:00";
        $date2=$request->date2." 23:59:59";

         $data = DB::table('online_payment_details')
                    ->join('invoices','invoices.session_id','online_payment_details.session_id')
                    ->where('pay_status','Successful')
                    ->whereBetween('invoices.created_at',[$date1,$date2])
                    ->select('online_payment_details.*','invoices.status')
                    ->get();
     
     
     
            // $data = DB::table('invoices')
            //         ->join('guest','guest.id','invoices.guest_id')
            //         ->join('delivery_infos','delivery_infos.id','invoices.delivery_id')
            //         ->join('shopping_carts','shopping_carts.session_id','invoices.session_id')
            //         ->join('product_productinfo','product_productinfo.id','shopping_carts.product_id')
            //         ->join('districts','districts.id','delivery_infos.district_id')
            //          ->join('online_payment_details','online_payment_details.session_id','invoices.session_id')
            //         ->where('pay_status','Successful')
            //         ->whereBetween('invoices.date',[$request->date1,$request->date2])
            //         ->groupby('invoices.id')
            //         ->select('invoices.*','delivery_infos.*','shopping_carts.sale_price','shopping_carts.discount_price','shopping_carts.current_price','product_productinfo.product_name','guest.first_name as billing_name','guest.address as billing_address','guest.phone as billing_phone','districts.district_name')
            //         ->get();
                    

        return view('Admin.Order_system.amarpay-order-report-list',compact('data','date1','date2'));
    }
    
    public function invoice_balance_sheet($invoice)
    {
       $data=  invoice_balance::where('invoice_id',$invoice)->first();
       
       return view('Admin.Order_system.invoice_balance',compact('data'));
    }
    
    public function invoice_trans_sheet($invoice)
    {
       $data=  invoice_transaction::where('invoice_id',$invoice)->get();
       $bal=  invoice_balance::where('invoice_id',$invoice)->first();
       return view('Admin.Order_system.invoice_transaction',compact('data','bal'));
    }

    public function exchange_request()
    {
        $exchange_requests = ExchangeRequest::get();
        return view('Admin.exchange.exchange_request',compact('exchange_requests'));
    }

    public function exchange_request_details($id)
    {
        $exchange_request = ExchangeRequest::find($id);
        return view('Admin.exchange.exchange_request_details',compact('exchange_request'));
    }


    public function update_exchange_request(Request $request, $id)
    {
        $data = ExchangeRequest::findOrFail($id);
        $data->name = $request->name;
        $data->phone_number = $request->phone_number;
        $data->email = $request->email;
        $data->order_number = $request->order_number;
        $data->reason = $request->reason;
        $data->return_product_style_number = $request->return_product_style_number;
        $data->return_product_color = $request->return_product_color;
        $data->return_product_size = $request->return_product_size;
        $data->exchange_product_style_number = $request->exchange_product_style_number;
        $data->exchange_product_size = $request->exchange_product_size;
        $data->exchange_product_color = $request->exchange_product_color;
        $data->message = $request->message;
        $data->status = $request->status;
        $data->save();

        $notification = array(
          'messege'   => 'Request submited successfully',
          'alert-type' => 'success'
        );

        return redirect()->back()->with($notification);

    }

    public function delete_exchange_request($id)
    {
        $exchange_request = ExchangeRequest::find($id);
        $exchange_request->delete();

        $notification = array(
          'messege'   => 'Request Deleted successfully',
          'alert-type' => 'error'
        );

        return redirect()->back()->with($notification);
    }


}
