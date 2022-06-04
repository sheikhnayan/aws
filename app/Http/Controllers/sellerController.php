<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\seller;
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
use App\shipping_class;
use App\offer_setup;
use DB;
use Auth;
use Validator;
use Hash;
use App\Lib\Adnsms\lib\AdnSmsNotification;
class sellerController extends Controller
{

        public function seller_dashboard()
    {
        $product = product_info::where('seller_id',Auth('seller')->user()->id)->count();
        $sms = DB::table('announcement')->orderby('id','DESC')->first();

        $order = DB::table('invoices')
                    ->join('delivery_infos','delivery_infos.id','invoices.delivery_id')
                    ->join('shopping_carts','shopping_carts.session_id','invoices.session_id')
                    ->join('product_productinfo','product_productinfo.id','shopping_carts.product_id')
                    ->join('delivery_charges','delivery_charges.id','delivery_infos.district_id')
                    ->where('product_productinfo.seller_id',Auth('seller')->user()->id)
                    ->where('shopping_carts.status','1')
                    ->select('invoices.*','delivery_infos.*','shopping_carts.quantity','product_productinfo.product_name','product_productinfo.current_price','delivery_charges.district_id')
                    ->count();

        return view('User.Seller.index',compact('product','order','sms'));
    }


    public function sellerLogin()
    {
    	return view('User.Seller.signin');
    }

    public function sellerRegister()
    {
    	return view('User.Seller.register');
    	
    }


    public function sellerReg(Request $request)
    {


        $validator = Validator::make($request->all(), [
          'first_name' => 'required|max:100',
          'last_name' => 'required|max:100',
          'business_name' => 'required|max:100',
          'email' => 'required|unique:sellers|max:100',
          'phone' => 'required|min:11|max:11',
          'address' => 'required',
          'password' => 'min:4',
          'confirm_password' => 'required_with:password|same:password|min:4'
        ]);

        if ($validator->fails()) {
          return redirect()->back()
                   ->withErrors($validator)
                   ->withInput();
        }

        $data = array(
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'business_name'=>$request->business_name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'password'=>Hash::make($request->password),
            'set_password'=>$request->password,
        );

        $insert = seller::create($data);
		if ($insert) {
		      //  Auth::guard('seller')->login($insert);


		        $notification=array(
		            'messege'   =>'Registration  successfully . please wait for approve.',
		            'alert-type'=>'success'
		        );

		        return redirect()->back()->with($notification); 
		}
    }

      public function sellerSignin(Request $request)
    {
    	$creadential=['email'=>$request->email,'password'=>$request->password];

        if (Auth::guard('seller')->attempt($creadential)) 
        {
            if (Auth::guard('seller')->user()->status == '0') 
            {
                Auth::guard('seller')->logout();
                return redirect()->back()->with('error','Waiting For Approval');
                
                 
            }
           
                 $notification=array(
            'messege'   =>'Login Successfull',
            'alert-type'=>'success'
        );

        return redirect('/seller-dashboard')->with($notification); 
            

        }

        $creadentials=['phone'=>$request->email,'password'=>$request->password];
        if (Auth::guard('seller')->attempt($creadentials)) 
        {
            if (Auth::guard('seller')->user()->status == '0') 
            {
                Auth::guard('seller')->logout();
                return redirect()->back()->with('error','Waiting For Approval');
                 
            }
           
                 $notification=array(
            'messege'   =>'Login Successfull',
            'alert-type'=>'success'
        );

        return redirect('/seller-dashboard')->with($notification); 
            

        }
        else
        {
      
        return redirect()->back()->with('error','E-mail/phone or Password Does not match!');
        }
    }



    public function sellerproductadd()
    {
         $iteminfo = product_item::all();
        $company = product_company::all();
        $measurementinfo = product_measurement::all();
        $size = product_size_info::all();
        $color = product_color_info::all();
        $seller = seller::where('id',Auth('seller')->user()->id)->get();
        $shipping = shipping_class::get();
       return view('User.Seller.product.create',compact('company','iteminfo','measurementinfo','color','size','seller','shipping'));
    }

    public function store(Request $request)
    {
    
          $validator = Validator::make($request->all(), [
         'product_id'=>'required|unique:product_productinfo',
        'item_id'=>'required',
        'category_id'=>'required',
        'subcategory_id'=>'required',
        'brand_id'=>'required',
        'product_name'=>'required',
        'measurement_type'=>'required',
        'size_title'=>'required',
        'color_title'=>'required',
        'sale_price'=>'required',
        'discount_price'=>'required',
        'discount_per'=>'required',
        'current_price'=>'required',
        'shipping_id'=>'required',
        'min_qunt'=>'required',
        ]);

        if ($validator->fails()) 
        {
          return redirect()->back()
                   ->withErrors($validator)
                   ->withInput();
        }

        $product_id = $this->productinfoAutoId();
      $admin_id = Auth::guard('admin')->user()->id;
        $insert = array(
            'product_id'=>$request->product_id,
            'item_id'=>$request->item_id,
            'category_id'=>$request->category_id,
            'subcategory_id'=>$request->subcategory_id,
            'brand_id'=>$request->brand_id,
            'product_name'=>$request->product_name,
            'product_name_bangla'=>$request->product_name_bangla,
            'measurement_type'=>$request->measurement_type,
            'purchase_price'=>$request->purchase_price,
            'sale_price'=>$request->sale_price,
            'discount_price'=>$request->discount_price,
            'discount_per'=>$request->discount_per,
            'current_price'=>$request->current_price,
            'min_qunt'=>$request->min_qunt,
            'product_us'=>$request->product_us,
            'product_details'=>$request->product_details,
            'condition'=>$request->condition,
            'admin_id'=>$admin_id,
            'shipping_id'=>$request->shipping_id,
            'status'=>$request->status,
            'stock_status'=>$request->stock_status,
            'seller_id'=>$request->seller_id,
                        );


        $data = product_info::create($insert);

        for ($i=0; $i <count($request->size_title) ; $i++) 
        { 
            $insertsize =DB::table('product_size')
                    ->insert([
                        'product_id'=>$data->id,
                        'size'=>$request->size_title[$i],
                        'status'=>'1',
                    ]);
        }

        for ($j=0; $j <count($request->color_title) ; $j++) 
        { 
            $insertcolor =DB::table('product_color')
                    ->insert([
                        'product_id'=>$data->id,
                        'color'=>$request->color_title[$j],
                        'status'=>'1',
                    ]);
        }
        
        
         for ($i=0; $i < count($request->type); $i++) { 

        $typ_id = $this->offerAutoId();
        $insert = array(
            'id'=>$typ_id,
            'item_id'=>$request->item_id,
            'category_id'=>$request->category_id,
            'subcategory_id'=>$request->subcategory_id,
            'product_id'=>$data->id,
            'type'=>$request->type[$i],
            'admin_id'=>$admin_id,
            'status'=>'1',
                        );


        $query = offer_setup::create($insert);
        
         }
        
        
        $file = $request->file('image');
        if($file)
         {
           for ($i=0; $i < count($file) ; $i++) 
            {
                $name[$i] = rand().'.'.$file[$i]->getClientOriginalExtension();
                $file[$i]->move(public_path().'/productImage/', $name[$i]);  
                
                 DB::table('product_productinfo')->where('product_id',$request->product_id)->update([
                'image'=>$name[0],
            ]);
                

                DB::table('product_images')->insert([
                'product_id'=>$data->id,
                'image'=>$name[$i],
            ]);
            }
         }


        if ($data) {

          $notification=array(
            'messege'   =>'Product Added Successfull',
            'alert-type'=>'success'
        );

        return redirect()->back()->with($notification); 
        }
    }


     public function viewproduct()
    {
        
        $size = product_size::all();
        $color = product_color::all();

        $data = DB::table('product_productinfo')
                ->join('product_item','product_item.id','product_productinfo.item_id')
                ->join('product_category','product_category.id','product_productinfo.category_id')
                ->join('product_subcategory','product_subcategory.id','product_productinfo.subcategory_id')
                ->join('product_measurement','product_measurement.id','product_productinfo.measurement_type')
                ->join('product_company','product_company.id','product_productinfo.brand_id')
                ->select('product_productinfo.*','product_item.item_name','product_category.category_name','product_measurement.measurement_type as measurementName','product_company.company_name','product_subcategory.subcategory_name')
                ->where('product_productinfo.seller_id',Auth('seller')->user()->id)
                // ->where('product_productinfo.status','0')
                ->get();
         $seller = seller::find(Auth('seller')->user()->id);

       return view('User.Seller.product.index',compact('data','color','size','seller'));
    }

     public function sub_productedit($id)
    {

       $data = DB::table('product_productinfo')
                ->join('product_item','product_item.id','product_productinfo.item_id')
                ->join('product_category','product_category.id','product_productinfo.category_id')
                ->join('product_subcategory','product_subcategory.id','product_productinfo.subcategory_id')
                ->join('product_measurement','product_measurement.id','product_productinfo.measurement_type')
                ->join('product_company','product_company.id','product_productinfo.brand_id')
                 ->join('shipping_classes','shipping_classes.id','product_productinfo.shipping_id')
                ->select('product_productinfo.*','product_item.item_name','product_category.category_name','product_subcategory.subcategory_name','product_measurement.measurement_type as measurementName','product_company.company_name','shipping_classes.shipping_name')
                ->where('product_productinfo.id',$id)
                ->first();
        
        $iteminfo = product_item::all();
        $company = product_company::all();
        $measurementinfo = product_measurement::all();

        $size = product_size_info::all();
        $color = product_color_info::all();
        $seller = seller::where('id',Auth('seller')->user()->id)->get();
        $shipping = shipping_class::all();
        
           $offer = offer_setup::where('product_id',$id)->get();
          $sizes = product_size::where('product_id',$id)->get();
        $colors = product_color::where('product_id',$id)->get();


        return view('User.Seller.product.modal',compact('offer','data','iteminfo','company','measurementinfo','size','sizes','color','colors','seller','shipping'));

    }


    public function subproductupdate(Request $request, $id)
    {
        
          
          $validator = Validator::make($request->all(), [

       
        'item_id'=>'required',
        'category_id'=>'required',
        'subcategory_id'=>'required',
        'brand_id'=>'required',
        'product_name'=>'required',
        'measurement_type'=>'required',
        'size_title'=>'required',
        'color_title'=>'required',
        'sale_price'=>'required',
        'discount_price'=>'required',
        'discount_per'=>'required',
        'current_price'=>'required',
        'min_qunt'=>'required',
        'shipping_id'=>'required',
        ]);

        if ($validator->fails()) {
          return redirect()->back()
                   ->withErrors($validator)
                   ->withInput();
        }

      $admin_id = Auth::guard('admin')->user()->id;
        $insert = array(
            'item_id'=>$request->item_id,
            'category_id'=>$request->category_id,
            'subcategory_id'=>$request->subcategory_id,
            'brand_id'=>$request->brand_id,
            'product_name'=>$request->product_name,
            'product_name_bangla'=>$request->product_name_bangla,
            'measurement_type'=>$request->measurement_type,
            'purchase_price'=>$request->purchase_price,
            'sale_price'=>$request->sale_price,
            'discount_price'=>$request->discount_price,
            'discount_per'=>$request->discount_per,
            'current_price'=>$request->current_price,
            'min_qunt'=>$request->min_qunt,
            'product_us'=>$request->product_us,
            'product_details'=>$request->product_details,
            'shipping_id'=>$request->shipping_id,
            'condition'=>$request->condition,
            'status'=>$request->status,
            'stock_status'=>$request->stock_status,
            'admin_id'=>$admin_id,
            'seller_id'=>$request->seller_id,
                        );


        $data = product_info::find($id)->update($insert);

            $d =DB::table('product_size')->where('product_id',$id)->delete();
            $d= DB::table('product_color')->where('product_id',$id)->delete();
        for ($i=0; $i <count($request->size_title); $i++) 
        { 

            $insertsize =DB::table('product_size')
                          ->insert([
                        'product_id'=>$id,
                        'size'=>$request->size_title[$i],
                        'status'=>'1',
                    ]);
        }

        for ($j=0; $j <count($request->color_title) ; $j++) 
        { 

                   $insertcolor =DB::table('product_color')
                    ->insert([
                      'product_id'=>$id,
                        'color'=>$request->color_title[$j],
                        'status'=>'1',
                    ]);
        }
        
        for ($i=0; $i < count($request->type); $i++) 
        { 
            
        $del  = offer_setup::where('type',$request->type)->where('product_id',$id)->delete();
        
        $typ_id = $this->offerAutoId();
        $insert = array(
            'id'=>$typ_id,
            'item_id'=>$request->item_id,
            'category_id'=>$request->category_id,
            'subcategory_id'=>$request->subcategory_id,
            'product_id'=>$id,
            'type'=>$request->type[$i],
            'admin_id'=>$admin_id,
            'status'=>'1',
                        );


        $query = offer_setup::create($insert);
        
         }
         
         
          $file = $request->file('image');
        if($file)
         {
             $datadel=  DB::table('product_images')->where('product_id',$id)->get();
         if ($datadel) {
             foreach($datadel as $dele)
             {
                $path= base_path().'/public/productImage/'.$dele->image;
            if(file_exists($path)){
                unlink($path);
            }  
             }
       
      }
             $delete =  DB::table('product_images')->where('product_id',$id)->delete();
             
             
           for ($i=0; $i < count($file) ; $i++) 
            {
                $name[$i] = rand().'.'.$file[$i]->getClientOriginalExtension();
                $file[$i]->move(public_path().'/productImage/', $name[$i]);  
                
                 DB::table('product_productinfo')->where('id',$id)->update([
                'image'=>$name[0],
            ]);
                

                DB::table('product_images')->insert([
                'product_id'=>$id,
                'image'=>$name[$i],
            ]);
            }
         }


        if ($data) {

          $notification=array(
            'messege'   =>'Product update Successfull',
            'alert-type'=>'success'
        );

        return redirect()->back()->with($notification); 
        }

    }



public function destroy($id)
    {
        $datadel=  DB::table('product_images')->where('product_id',$id)->get();

         if ($datadel) {
             foreach($datadel as $dele)
             {
                $path= base_path().'/public/productImage/'.$dele->image;
            if(file_exists($path)){
                unlink($path);
            }  
             }
       
      }
       $delt = product_size::where('product_id',$id)->delete(); 
       $delt = product_color::where('product_id',$id)->delete();
        $del=  DB::table('product_images')->where('product_id',$id)->delete(); 
       $delt = product_info::find($id)->delete(); 

          $notification=array(
            'messege'   =>'Product Delete Successfull',
            'alert-type'=>'error'
        );

        return redirect()->back()->with($notification);  
    }


    public function totalorder ()
    {
          $order = DB::table('product_productinfo')
                    ->join('shopping_carts','shopping_carts.product_id','product_productinfo.id')
                     ->join('product_item','product_item.id','product_productinfo.item_id')
                    ->join('product_category','product_category.id','product_productinfo.category_id')
                    ->join('product_subcategory','product_subcategory.id','product_productinfo.subcategory_id')
                    ->join('product_measurement','product_measurement.id','product_productinfo.measurement_type')
                    ->join('product_company','product_company.id','product_productinfo.brand_id')
                    ->where('product_productinfo.seller_id',Auth('seller')->user()->id)
                    ->where('shopping_carts.status','1')
                    ->groupBy('shopping_carts.product_id')
                    ->select(DB::Raw('sum(shopping_carts.quantity)as totalqunt'),'product_productinfo.*','product_item.item_name','product_category.category_name','product_subcategory.subcategory_name','product_measurement.measurement_type as measurementName','product_company.company_name')
                    ->get();
         $size = product_size::all();
        $color = product_color::all();

        return view("User.Seller.TotalOrder.totalorder",compact('order','size','color'));
    } 
    
    
    public function profile_setting()
    {
        return view('User.Seller.profile');
    }

    
    public function profile_setting_update(Request $request)
    {
    
         $validator = Validator::make($request->all(), [
          'first_name' => 'required|max:100',
          'last_name' => 'required|max:100',
          'business_name' => 'required|max:100',
          'phone' => 'required',
          'address' => 'required',
        ]);

        if ($validator->fails()) {
          return redirect()->back()
                   ->withErrors($validator)
                   ->withInput();
        }
        
        if($request->password !='')
        {
                 $data = array(
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'business_name'=>$request->business_name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'password'=>Hash::make($request->password),
            'set_password'=>$request->password,
                );
        }
        else
        {
              $data = array(
            'first_name'=>$request->first_name,
            'last_name'=>$request->last_name,
            'business_name'=>$request->business_name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'address'=>$request->address,
                );
        }

   

        $insert = seller::where('id',Auth('seller')->user()->id)->update($data);
        
        $image = $request->file('image');
        if($image)
        {

            $path =Auth('seller')->user()->id.'.'.$image->getClientOriginalExtension();
            $image->move(public_path('/seller/'),$path);
            seller::where('id',Auth('seller')->user()->id)->update(['image'=>$path]);
        }     
        
        $logo = $request->file('logo');
        if($logo)
        {

            $paths =Auth('seller')->user()->id.'logo.'.$logo->getClientOriginalExtension();
            $logo->move(public_path('/seller/'),$paths);
            seller::where('id',Auth('seller')->user()->id)->update(['avatar'=>$paths]);
        }
        
		if ($insert) {
		        $notification=array(
		            'messege'   =>'Registration Successfull',
		            'alert-type'=>'success'
		        );

		        return redirect()->back()->with($notification); 
		}
    }



    public function sellerLogout()
    {

    	Auth('seller')->Logout();
    	
    	 $notification=array(
            'messege'   =>'Logout Successfull!',
            'alert-type'=>'info'
        );

        return redirect('/')->with($notification); 
    }
    
        public function forgot_password_seller()
    {
      return view('User.Seller.forget_pass');
    }
    public function seller_forget(Request $request)
    {
      $check = seller::where('phone',$request->phone)->first();
      if ($check) 
      {

        $getcode = rand(1000,9999);
        $code = seller::where('phone',$request->phone)->update(['code'=>$getcode]);
      
        $message = "Buynfeel password Reset OTP: ".$getcode.".";
        $recipient=$request->phone;  
        $requestType = 'OTP';
        $messageType = 'TEXT';         
        $sms = new AdnSmsNotification();
        $sms->sendSms($requestType, $message, $recipient, $messageType);

         return redirect('/seller_forget_code/'.$request->phone);
         
      }
      else
      {

        $notification=array(
            'messege'   =>'Does not match Phone Number',
            'alert-type'=>'error'
        );

        return redirect()->back()->with($notification); 
      }
    }



    public function seller_forget_code($phone)
    {
      $check = seller::where('phone',$phone)->first();
      if ($check) 
      {
        
      return view('User.Seller.forget_pass_code',compact('check'));

      }
      
    }


    public function seller_forget_code_check(Request $request)
    {
      $check = seller::where('phone',$request->phone)->where('code',$request->code)->first();
      if ($check) 
      {
        
      return view('User.Seller.forget_pass_reset',compact('check'));

      }
      else
      {
        $notification=array(
            'messege'   =>'Does not match Code',
            'alert-type'=>'error'
        );

        return redirect()->back()->with($notification); 
      }
    }

    public function seller_forget_reset_done(Request $request)
    {
      $check = seller::where('phone',$request->phone)->first();
      if ($check) 
      {
        
     
        $data = array(
            'password'=>Hash::make($request->password),
            'set_password'=>$request->password,
        );

        $insert = seller::where('phone',$request->phone)->update($data);


        $notification=array(
            'messege'   =>'Update Successfull',
            'alert-type'=>'success'
        );
        return redirect('/seller-login')->with($notification);

      }
      
    }
    
}
