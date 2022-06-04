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
use App\offer_setup;
use App\product_info;
use App\seller;
use Validator;
use DB;
use Auth;

class OfferController extends Controller
{
    public function setupoffer_control()
    {
         $data = DB::table('offer_control')->first();
    	return view('Admin.offer.offer_start_define',compact('data'));
    }
    public function updateoffercontrol(Request $request)
    {
        // if($request->status==1){

        // include("offer_db.connect.php");
        //     //offer on
        //     $db=new database();
            
        //     $sql=$db->link->query("SELECT `product_productinfo`.`id`,`offer_setups`.`sale_price`,`offer_setups`.`discount_price`,`offer_setups`.`discount_per`,`offer_setups`.`current_price` FROM `product_productinfo` INNER JOIN `offer_setups` ON `offer_setups`.`product_id`= `product_productinfo`.`id`  WHERE `offer_setups`.`type`='5'");
            
        //     while($fetch=$sql->fetch_array())
        //     {
                
        //     //print $fetch[0].'->'.$fetch[1].'->'.$fetch[2].'->'.$fetch[3].'->'.$fetch[4].'<br>';
             
        //       $db->link->query("UPDATE `product_productinfo` SET `sale_price`='$fetch[1]',`discount_price`='$fetch[2]',`discount_per`='$fetch[3]',`current_price`='$fetch[4]' WHERE `id`='$fetch[0]'");
            
        //     }
            
        // }
        // elseif($request->status==0){
        //     //offer off
        //     DB::statement("UPDATE `product_productinfo` SET `current_price`=`sale_price`,`discount_price`='0',`discount_per`='0'");
        // }
        $data = DB::table('offer_control')->update($request->except('_token','update'));
    	return back();
    }
    public function index()
    {
         $data = offer_setup::get();
    	return view('Admin.offer.index',compact('data'));
    }

    public function create()
    {
    	$iteminfo = product_item::all();
       
       return view('Admin.offer.create',compact('iteminfo'));
    }

    public function store(Request $request)
    {
    	// return $request->all();
    	date_default_timezone_set('Asia/Dhaka');
    	 $validator = Validator::make($request->all(), [

        'item_id'=>'required',
        'category_id'=>'required',
        'product_id'=>'required',
        'start_date'=>'required',
        'end_date'=>'required',
        'type'=>'required',
       
        ]);

        if ($validator->fails()) {
          return redirect()->back()
                   ->withErrors($validator)
                   ->withInput();
        }
        
        
         for ($i=0; $i < count($request->type); $i++) { 

        $product_id = $this->offerAutoId();
      $admin_id = Auth::guard('admin')->user()->id;
        $insert = array(
            'id'=>$product_id,
            'item_id'=>$request->item_id,
            'category_id'=>$request->category_id,
            'subcategory_id'=>$request->subcategory_id,
            'product_id'=>$request->product_id,
            'start_date_time'=>$request->start_date,
            'end_date_time'=>$request->end_date,
            'sale_price'=>$request->sale_price,
            'discount_price'=>$request->discount_price,
            'discount_per'=>$request->discount_per,
            'current_price'=>$request->current_price,
            'type'=>$request->type[$i],
            'admin_id'=>$admin_id,
            'status'=>'1',
                        );


        $query = offer_setup::create($insert);
        
    
         }
         
        
        // $update = product_info::where('id',$request->product_id)
        // ->update([
        //     'sale_price'=>$request->sale_price,
        //     'discount_price'=>$request->discount_price,
        //     'discount_per'=>$request->discount_per,
        //     'current_price'=>$request->current_price,
        //     ]);


         $notification=array(
            'messege'   =>'offer Added Successfull !',
            'alert-type'=>'success'
        );

        return redirect()->back()->with($notification);
    }


    public function destroy(Request $request)
    {
        if($request->id)
        {
            for($i=0;$i<count($request->id);$i++)
            {
                $query = offer_setup::where('id',$request->id[$i])->delete();  
            }
          
        }
        else
        {
            $notification=array(
            'messege'   =>'Select Offer one!!',
            'alert-type'=>'error'
        );
 
        }
        

         $notification=array(
            'messege'   =>'Offer Delete Successfull',
            'alert-type'=>'error'
        );

        return redirect()->back()->with($notification);
    }


    public function activeoffer($id)
    {
         $query = offer_setup::where('id',$id)->update(['status'=>'1']);

         $notification=array(
            'messege'   =>'Offer active Successfull',
            'alert-type'=>'success'
        );

        return redirect()->back()->with($notification);
    }

    public function inactiveoffer($id)
    {
         $query = offer_setup::where('id',$id)->update(['status'=>'0']);

         $notification=array(
            'messege'   =>'Offer inactive Successfull',
            'alert-type'=>'error'
        );

        return redirect()->back()->with($notification);
    }

    public function offer_banner()
    {
        $data = DB::table('discount_banner')->where('id','1')->first();
        	return view('Admin.offer.banner_setup',compact('data'));
    }
    
    public function updateofferbanner(Request $request)
    {
        
        	 $discount_mela = $request->file('discount_mela');
        if ($discount_mela) {

            $imageName = 'discount_mela.'.$discount_mela->getClientOriginalExtension();
            $discount_mela->move(public_path('/offer_banner_image/'),$imageName);

            DB::table('discount_banner')->where('id','1')->update(['discount_mela'=>$imageName]);
        }
        
        	 $life_style = $request->file('life_style');
        if ($life_style) {

            $imageName =  'life_style.'.$life_style->getClientOriginalExtension();
            $life_style->move(public_path('/offer_banner_image/'),$imageName);

            DB::table('discount_banner')->where('id','1')->update(['life_style'=>$imageName]);
        }
        	 $gadget_mela = $request->file('gadget_mela');
        if ($gadget_mela) {

            $imageName =  'gadget_mela.'.$gadget_mela->getClientOriginalExtension();
            $gadget_mela->move(public_path('/offer_banner_image/'),$imageName);

            DB::table('discount_banner')->where('id','1')->update(['gadget_mela'=>$imageName]);
        }
        	 $deshi_mela = $request->file('deshi_mela');
        if ($deshi_mela) {

            $imageName = 'deshi_mela.'.$deshi_mela->getClientOriginalExtension();
            $deshi_mela->move(public_path('/offer_banner_image/'),$imageName);

            DB::table('discount_banner')->where('id','1')->update(['deshi_mela'=>$imageName]);
        }
        
        $notify=array('messege'=>'update offer banner','alert-type'=>'success');
        return redirect()->back()->with($notify);
        
        
    }
    
    public function offer_setup_discount_mela()
    {
    	return view('Admin.offer.discount_mela');
    }
    public function offer_setup_discount_mela_view()
    {
         $data = offer_setup::where('type','5')->get();
    	return view('Admin.offer.discount_mela_view',compact('data'));
    }
    
    public function offer_setup_life_style()
    {
    	return view('Admin.offer.lifestyle');
    }
    public function offer_setup_life_style_view()
    {
         $data = offer_setup::where('type','7')->get();
    	return view('Admin.offer.lifestyle_view',compact('data'));
    }

    public function offer_setup_gadget_mela()
    {
        
    	return view('Admin.offer.gadget_mela');
    }
    public function offer_setup_gadget_mela_view()
    {
         $data = offer_setup::where('type','8')->get();
    	return view('Admin.offer.gadget_mela_view',compact('data'));
    }

    public function offer_setup_deshi_mela()
    {
        
    	return view('Admin.offer.deshi_mela');
    }
    public function offer_setup_deshi_mela_view()
    {
         $data = offer_setup::where('type','9')->get();
    	return view('Admin.offer.deshi_mela_view',compact('data'));
    }

}
