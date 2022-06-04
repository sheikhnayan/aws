<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Str;
use Session;
use Auth;
use Cookie;
use App\guest;
use App\ProductRating;
use App\ProductReviewImage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;
use App\Lib\Adnsms\lib\AdnSmsNotification;
use Image;
use GuzzleHttp\Client;


class guestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
      return view('User.Guest.register');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

      $validator = Validator::make($request->all(), [
        'first_name' => 'required|max:100',
        //   'last_name' => 'required|max:100',
        'phone' => 'required|unique:guest',
        'address' => 'nullable',
        'password' => 'min:8',
        'confirm_password' => 'required_with:password|same:password|min:8'
      ]);

      if ($validator->fails()) {
        return redirect()->back()
        ->withErrors($validator)
        ->withInput();
      }

      if($request->email){
        $exist_data = guest::where('email', $request->email)->first();
        if($exist_data){
         $notification=array(
          'messege'   =>'Email already has been taken',
          'alert-type'=>'error'
          );
             return redirect()->back()->with($notification);   
        }
      }

      $data = array(
        'first_name'=>$request->first_name,
            // 'last_name'=>$request->last_name,
        'email'=>$request->email,
        'phone'=>$request->phone,
        'address'=>$request->address,
        'vessel_name'=>$request->vessel_name,
        'rank'=>$request->rank,
        'password'=>Hash::make($request->password),
        'set_password'=>$request->password,
      );

      $insert = guest::create($data);

      $session_id = Session::getId();
      $session = DB::table('shopping_carts')->where('session_id',$session_id)->first();

      $setcheck =  Auth::guard('guest')->loginUsingId($insert->id);

      if($setcheck)
      {
       $session_id_up = Session::getId();
       if ($session) {
        $sessions = DB::table('shopping_carts')->where('session_id',$session->session_id)->update(['session_id'=>$session_id_up]);
      }

    }

    if(isset($sessions)>0)
    {
     $notification=array(
      'messege'   =>'Registration Successfull',
      'alert-type'=>'success'
    );

     return redirect('Checkout')->with($notification);  
   }
   else
   {
    $notification=array(
      'messege'   =>'Registration Successfull',
      'alert-type'=>'success'
    );

    return redirect()->back()->with($notification);   
  }



}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    public function userLogin()
    {
      return view('User.Guest.signin');
    }

    public function guestLogin(Request $request)
    {
     $session_id = Session::getId();

     $creadential=['email'=>$request->email,'password'=>$request->password];

     $session = DB::table('shopping_carts')->where('session_id',$session_id)->first();


     if (Auth::guard('guest')->attempt($creadential)) 
     {
       if($request->has('remember'))
       {
        Cookie::queue('user',$request->email);
        Cookie::queue('password',$request->password);
      }

      if (Auth::guard('guest')->user()->status == '0') 
      {
        Auth::guard('guest')->logout();


        return redirect()->back()->with('error','Waiting for approval!');

      }

      $session_id_up = Session::getId();
      if ($session) {
        $session = DB::table('shopping_carts')->where('session_id',$session->session_id)->update(['session_id'=>$session_id_up]);
      }

      $notification=array(
        'messege'   =>'Login Successfully Done',
        'alert-type'=>'success'
      );

      return redirect('/userdashboard')->with($notification); 


    }

    $creadentials=['phone'=>$request->email,'password'=>$request->password];

    if (Auth::guard('guest')->attempt($creadentials)) 
    {
     if($request->has('remember'))
     {
      Cookie::queue('user',$request->email);
      Cookie::queue('password',$request->password);
    }

    if (Auth::guard('guest')->user()->status == '0') 
    {
      Auth::guard('guest')->logout();
      return redirect()->back()->with('error','Wating for approval!');
    }



    $session_id_up = Session::getId();
    if ($session) {
      $session = DB::table('shopping_carts')->where('session_id',$session->session_id)->update(['session_id'=>$session_id_up]);
    }

    $notification=array(
      'messege'   =>'Login Successfull',
      'alert-type'=>'success'
    );

    return redirect('/userdashboard')->with($notification); 


  }
  else
  {
    return redirect()->back()->with('error','E-mail/phone or Password Does not match!');
  }
}

public function guestLogin_redirect(Request $request)
{

 $session_id = Session::getId();

 $creadential=['email'=>$request->email,'password'=>$request->password];

 $session = DB::table('shopping_carts')->where('session_id',$session_id)->first();

 if (Auth::guard('guest')->attempt($creadential)) 
 {
   if($request->has('remember'))
   {
    Cookie::queue('user',$request->email);
    Cookie::queue('password',$request->password);
  }

  if (Auth::guard('guest')->user()->status == '0') 
  {
    Auth::guard('guest')->logout();
    $notification=array(
      'messege'   =>'Pending your registration',
      'alert-type'=>'error'
    );

    return redirect()->back()->with($notification);
  }
  $session_id_up = Session::getId();
  $session = DB::table('shopping_carts')->where('session_id',$session->session_id)->update(['session_id'=>$session_id_up]);


  $notification=array(
    'messege'   =>'Login Successfull',
    'alert-type'=>'success'
  );

  return redirect('/Checkout')->with($notification); 


}

$creadentials=['phone'=>$request->email,'password'=>$request->password];

if (Auth::guard('guest')->attempt($creadentials)) 
{
 if($request->has('remember'))
 {
  Cookie::queue('user',$request->email);
  Cookie::queue('password',$request->password);
}

if (Auth::guard('guest')->user()->status == '0') 
{
  Auth::guard('guest')->logout();
  $notification=array(
    'messege'   =>'Pending your registration',
    'alert-type'=>'error'
  );

  return redirect()->back()->with($notification);
}

$session_id_up = Session::getId();
$session = DB::table('shopping_carts')->where('session_id',$session->session_id)->update(['session_id'=>$session_id_up]);


$notification=array(
  'messege'   =>'Login Successfull',
  'alert-type'=>'success'
);

return redirect('/Checkout')->with($notification); 


}
else
{
  $notification=array(
    'messege'   =>'Password and E-mail/Mobile Does not match!',
    'alert-type'=>'error'
  );

  return redirect()->back()->with($notification); 
}
} 

public function userdashboard()
{
  $data = DB::table('invoices')
  ->join('delivery_infos','delivery_infos.id','invoices.delivery_id')
  ->join('zones','zones.id','delivery_infos.zone_id')
  ->where('invoices.guest_id',Auth('guest')->user()->id)
  ->select('invoices.*','delivery_infos.*','zones.zone_name')
  ->groupby('invoices.invoice_id')
  ->get();

  $pending = DB::table('invoices')
  ->join('delivery_infos','delivery_infos.id','invoices.delivery_id')
  ->join('zones','zones.id','delivery_infos.zone_id')
  ->where('invoices.guest_id',Auth('guest')->user()->id)
  ->where('invoices.status',0)
  ->select('invoices.*','delivery_infos.*','zones.zone_name')
  ->groupby('invoices.invoice_id')
  ->get();


  $processing = DB::table('invoices')
  ->join('delivery_infos','delivery_infos.id','invoices.delivery_id')
  ->join('zones','zones.id','delivery_infos.zone_id')
  ->where('invoices.guest_id',Auth('guest')->user()->id)
  ->where('invoices.status',1)
  ->select('invoices.*','delivery_infos.*','zones.zone_name')
  ->groupby('invoices.invoice_id')
  ->get();


  $delivered = DB::table('invoices')
  ->join('delivery_infos','delivery_infos.id','invoices.delivery_id')
  ->join('zones','zones.id','delivery_infos.zone_id')
  ->where('invoices.guest_id',Auth('guest')->user()->id)
  ->where('invoices.status',2)
  ->select('invoices.*','delivery_infos.*','zones.zone_name')
  ->groupby('invoices.invoice_id')
  ->get();




  $product = DB::table('invoices')
  ->join('shopping_carts','shopping_carts.session_id','invoices.session_id')
  ->join('product_productinfo','product_productinfo.id','shopping_carts.product_id')
  ->select('product_productinfo.product_name','product_productinfo.current_price','product_productinfo.product_id','invoices.invoice_id','shopping_carts.quantity')
  ->get();


  return view('User.Guest.dashboard',compact('data','product','pending','processing','delivered'));
}


public function myprofileupdate(Request $request)
{


  if ($request->password !='') 
  {

    $validator = Validator::make($request->all(), [
      'first_name' => 'required|max:100',
      'password' => 'required|min:8',
      'phone' => 'required',
      'address' => 'required',
    ]);

    if ($validator->fails()) {
      return redirect()->back()
      ->withErrors($validator)
      ->withInput();
    }

    $data = array(
      'first_name'=>$request->first_name,
      'last_name'=>$request->last_name,
      'email'=>$request->email,
      'phone'=>$request->phone,
      'address'=>$request->address,
      'password'=>Hash::make($request->password),
      'set_password'=>$request->password,
    );  

  }
  else
  {

    $validator = Validator::make($request->all(), [
      'first_name' => 'required|max:100',
      'phone' => 'required',
      'address' => 'required',
    ]);

    if ($validator->fails()) {
      return redirect()->back()
      ->withErrors($validator)
      ->withInput();
    }

    $data = array(
      'first_name'=>$request->first_name,
      'last_name'=>$request->last_name,
      'email'=>$request->email,
      'phone'=>$request->phone,
      'address'=>$request->address,
    );

  }

  $insert = guest::where('id',Auth('guest')->user()->id)->update($data);

  $file = $request->file('image');
  if ($file) 
  {
    $imagename = Auth('guest')->user()->id.'.'.$file->getClientOriginalExtension();
    $file->move(public_path('/guestImage'),$imagename);
    DB::table('guest')->where('id',Auth('guest')->user()->id)->update(['image'=>$imagename]);
  }

  $notification=array(
    'messege'   =>'Update Successfull',
    'alert-type'=>'success'
  );

  return redirect()->back()->with($notification); 
}


public function guestLogout()
{
  Auth::guard('guest')->logout();
  $notification=array(
    'messege'   =>'Logout Successfull',
    'alert-type'=>'info'
  );

  return redirect('/user-login')->with($notification);
}


    // ================Facebook=============
public function redirectTofacebook()
{
  return Socialite::driver('facebook')->redirect();
}


public function handleFacebookCallback() {
  try {
    $user = Socialite::driver('facebook')->user();
            //   dd($user);
    $finduser = guest::where('provider_id', $user->id)->first();
            // dd($finduser);
    if ($finduser) {

      guest::where('provider_id', $user->id)->update([
        'first_name' => $user->name,
        'email' => $user->email,
        'avatar' =>$user->avatar,
      ]);

      Auth::guard('guest')->loginUsingId($finduser->id);
      return redirect('/userdashboard');
    } else {
      $newUser = guest::create([
        'first_name' => $user->name,
        'email' => $user->email,
        'provider_id' => $user->id,
        'avatar' =>$user->avatar,
      ]);
      Auth::guard('guest')->loginUsingId($newUser->id);
      return redirect('/userdashboard');
    }
  }
  catch(Exception $e) {
    return redirect('/');
  }
}





    // ================Twitter=============
public function redirectToTwitter()
{
  return Socialite::driver('twitter')->redirect();
}


public function handleTwitterCallback() 
{
  try {
    $user = Socialite::driver('twitter')->user();
    $finduser = guest::where('provider_id', $user->id)->first();
    if ($finduser) {
      Auth::guard('guest')->loginUsingId($finduser->id);
                // Auth::login($finduser);
      return redirect('/userdashboard');
    } else {
      $newUser = guest::create(['name' => $user->name, 'email' => $user->email, 'provider_id' => $user->id]);
      Auth::login($newUser);
      return redirect()->back();
    }
  }
  catch(Exception $e) {
    return redirect('/');
  }
}




    // ================Google=============
public function redirectToGoogle()
{
  return Socialite::driver('google')->redirect();
}


public function handleGoogleCallback() 
{
  try {
    $user = Socialite::driver('google')->user();
    $finduser = guest::where('provider_id', $user->id)->first();
    if ($finduser) {
      Auth::guard('guest')->loginUsingId($finduser->id);
                // Auth::login($finduser);
      return redirect('/userdashboard');
    } else {
      $newUser = guest::create(['name' => $user->name, 'email' => $user->email, 'provider_id' => $user->id]);
      Auth::login($newUser);
      return redirect()->back();
    }
  }
  catch(Exception $e) {
    return redirect('/');
  }
}

public function forgot_password()
{
  return view('User.Guest.forget_pass');
}


public function guest_forget(Request $request)
{
  $check = guest::where('phone',$request->phone)->first();
  $api = DB::table('settings')->first();

  if ($check) 
  {

    $getcode = rand(1000,9999);
    $code = guest::where('phone',$request->phone)->update(['code'=>$getcode]);
    $client = new Client();
    $result = $client->request('POST', $api->api_url, [
      'form_params' => [
        'api_key'   => $api->api_key,
        'contacts'  => $request->phone,
        'senderid'  => $api->senderid,
        'msg'       =>  "Password Reset OTP - ".$getcode,
      ]
    ]);
    $response = $result->getBody();

    return redirect('/guest_forget_code/'.$request->phone);
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



public function guest_forget_code($phone)
{
  $check = guest::where('phone',$phone)->first();
  if ($check) 
  {

    return view('User.Guest.forget_pass_code',compact('check'));

  }

}


public function guest_forget_code_check(Request $request)
{
  $check = guest::where('phone',$request->phone)->where('code',$request->code)->first();
  if ($check) 
  {

   $getcode = rand(1000,9999);
   $code = guest::where('phone',$request->phone)->update(['code'=>$getcode]);

   return view('User.Guest.forget_pass_reset',compact('check'));

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

public function guest_forget_reset_done(Request $request)
{
        // return $request->all();
  $check = guest::where('phone',$request->phone)->first();
  if ($check) 
  {



    $validator = Validator::make($request->all(), [
      'password' => 'required',
      'confirm_password' => 'required_with:password|same:password|min:8',
    ]);

    if ($validator->fails()) {
      return redirect()->back()
      ->withErrors($validator)
      ->withInput();
    }

    $data = array(
      'password'=>Hash::make($request->password),
      'set_password'=>$request->password,
    );

    $insert = guest::where('phone',$request->phone)->update($data);

    $getcode = rand(1000,9999);
    $code = guest::where('phone',$request->phone)->update(['code'=>$getcode]);

    $notification=array(
      'messege'   =>'Password Update Successfull',
      'alert-type'=>'success'
    );
    return redirect('/user-login')->with($notification);

  }

}

public function guest_reg_OTP(Request $request)
{
  $checked = guest::where('phone', $request->phone)->first();
  if($checked)
  {
    return '200';
  }
  else
  {
    $getcode = rand(1000,9999);
    $ck = DB::table('guest_verify')->where('phone',$request->phone)->first();

    if($ck)
    {
     $code = DB::table('guest_verify')->where('phone',$request->phone)->update(['code'=>$getcode]); 
   }
   else
   {
    $code = DB::table('guest_verify')->where('phone',$request->phone)->insert(['phone'=>$request->phone,'code'=>$getcode]);
  }
  
  
  $api = DB::table('settings')->first();



  $client = new Client();
  $result = $client->request('POST', $api->api_url, [
    'form_params' => [
      'api_key'   => $api->api_key,
      'contacts'  => $request->phone,
      'senderid'  => $api->senderid,
      'msg'       =>  "Register Account OTP ".$getcode,
    ]
  ]);
  $response = $result->getBody();



  return 'OTP Send Your Phone';
}

}

public function guest_reg_OTP_check(Request $request)
{

 $ck = DB::table('guest_verify')->where('phone',$request->phone)->where('code',$request->otp)->first();

 if($ck)
 {
  return 'matching';
}
else
{
  return '404';
}
}

public function allorder(){
  $data = DB::table('invoices')
  ->orderBy('invoices.id','DESC')
  ->join('delivery_infos','delivery_infos.id','invoices.delivery_id')
  ->join('zones','zones.id','delivery_infos.zone_id')
  ->where('invoices.guest_id',Auth('guest')->user()->id)
  ->select('invoices.*','delivery_infos.*','zones.zone_name')
  ->groupby('invoices.invoice_id')
  ->get();


  return view('User.Guest.allorder',compact('data'));

}


public function trackorder(){

  return view('User.Guest.trackorder');

}

public function tracking(Request $request){

  $invoice_id = $request->invoice_id;

  $showdata = DB::table('invoices')
  ->orderBy('invoices.id','DESC')
  ->join('delivery_infos','delivery_infos.id','invoices.delivery_id')
  ->join('zones','zones.id','delivery_infos.zone_id')
  ->where('invoices.invoice_id', $invoice_id)
  ->where('invoices.guest_id',Auth('guest')->user()->id)
  ->select('invoices.*','delivery_infos.*','zones.zone_name')
  ->groupby('invoices.invoice_id')
  ->first();
  
  return view('User.Guest.single_order_tracking',compact('showdata'));

}

public function updateinformation(){
  return view('User.Guest.updateinformation');
}


public function profileupdate(Request $request){

  $data = array();
  $data['first_name'] = $request->first_name;
  $data['email'] = $request->email;
  $data['phone'] = $request->phone;
  $data['address'] = $request->address;
  $data['rank'] = $request->rank;
  $data['vessel_name'] = $request->vessel_name;

  DB::table('guest')->where('id',Auth('guest')->user()->id)->update($data);

}


public function changepassword(){

  return view('User.Guest.changepassword');

}



public function updatepassword(Request $request){

  $dbpassword       = Auth('guest')->user()->password;
  $old_password     = $request->old_password;
  $new_password     = $request->new_password;
  $confirm_password = $request->confirm_password;

  if (Hash::check($old_password, $dbpassword)) {

    if ($new_password === $confirm_password) {
      DB::table('guest')->where('id',Auth('guest')->user()->id)->update(['password'=>Hash::make($new_password)]);
      Auth('guest')->logout();
    }
    else{
     $notification=array(
      'messege'   =>'New Password & Confirm Password Not Match',
      'alert-type'=>'error'
    );
     return redirect()->back()->with($notification);
   }

 }
 else{
   $notification=array(
    'messege'   =>'Old Password does Not Match',
    'alert-type'=>'error',

  );
   return redirect()->back()->with($notification);
 }


 return redirect()->back();


}


public function profilechange(Request $request){


  $data = array();
  $newsimage          = $request->file('image');
  $old_image          = Auth('guest')->user()->image;

  if ($old_image) {

    // unlink($old_image);


    $image_one_name= hexdec(uniqid()).'.'.$newsimage->getClientOriginalExtension();
    Image::make($newsimage)->save('public/guestImage/'.$image_one_name,50);
    $data['image']='public/guestImage/'.$image_one_name;
    DB::table('guest')->where('id', Auth("guest")->user()->id)->update($data); 

  }

  else{
    $image_one_name= hexdec(uniqid()).'.'.$newsimage->getClientOriginalExtension();
    Image::make($newsimage)->save('public/guestImage/'.$image_one_name,50);
    $data['image']='public/guestImage/'.$image_one_name;
    DB::table('guest')->where('id', Auth("guest")->user()->id)->update($data);  
  }

}


  public function submit_feedback(Request $request)
  {

    $validator = Validator::make($request->all(), [
      'guest_rating' => 'required',
      'comment' => 'required',
    ]);

    if ($validator->fails()) {
      return redirect()->back()
               ->withErrors($validator)
               ->withInput();
    }

    $product_id = $request->product_id;
    $guest_id = $request->guest_id;
    $guest_rating = $request->guest_rating;
    $comment = $request->comment;

    $images = $request->file('image');
    if($images && count($images)>3){
      $notification=array(
          'messege'   => 'Maximum 3 Images',
          'alert-type'=>'error'
      );
      return redirect()->back()->with($notification); 
    }else{
      if ($images) {
        $data = new ProductRating();
        $data->product_id = $product_id;
        $data->guest_id = $guest_id;
        $data->guest_rating = $guest_rating;
        $data->comment = $comment;
        $data->status = 1;
        $data->save();

        foreach ($images as $key => $value ){
            $product_review_image = new ProductReviewImage();
            $image_name=str::random(5);
            $original_extension = $value->getClientOriginalExtension();
            $image_full_name = $image_name.'.'.$original_extension;
            $upload_path = 'images/product_review_image/';
            $image_url = $upload_path.$image_full_name;
            $success = $value->move($upload_path, $image_full_name);
            $product_review_image->product_rating_id = $data->id;
            $product_review_image->image = $image_url;

            // create thumbnail of productimages
            $product_review_image_path = base_path() . '/images/product_review_image/';
            $image = Image::make($product_review_image_path . $image_full_name);
            $image->widen(160);
            $image_name = 'thumb_' . $image_full_name;
            $image->save($product_review_image_path . $image_name);
            $product_review_image->image_thumb = $upload_path . $image_name;
            // end create thumbnail

            $product_review_image->save();
        }
      }else{
        $data = new ProductRating();
        $data->product_id = $product_id;
        $data->guest_id = $guest_id;
        $data->guest_rating = $guest_rating;
        $data->comment = $comment;
        $data->status = 1;
        $data->save();
      }
    }

    $notification=array(
        'messege'   => 'Review Submitted',
        'alert-type'=>'success'
    );

    return redirect()->back()->with($notification); 


  }



}
