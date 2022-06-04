<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\createadmin;
use Auth;
use Hash;
use Session;
use Validator;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Login()
    {
       return view('Login.Login');
    }

    public function Dashboard()
    {
        $user = DB::table('guest')->count();
        $inuser = DB::table('guest')->where('status','0')->count();
        $acuser = DB::table('guest')->where('status','1')->count();
        $seller = DB::table('sellers')->count();
        $inseller = DB::table('sellers')->where('status','0')->count();
        $acseller = DB::table('sellers')->where('status','1')->count();
        $order = DB::table('invoices')->count();
        $order_mrp_price = DB::table('invoices')->join('shopping_carts','shopping_carts.session_id','invoices.session_id')->select('shopping_carts.sale_price')->sum('shopping_carts.sale_price');
        $order_discount_amount = DB::table('invoices')->join('shopping_carts','shopping_carts.session_id','invoices.session_id')->select('shopping_carts.discount_price')->sum('shopping_carts.discount_price');
        $order_grand_total =DB::table('invoices')->join('shopping_carts','shopping_carts.session_id','invoices.session_id')->select('shopping_carts.current_price')->sum('shopping_carts.current_price');
        $porder = DB::table('invoices')->where('status','0')->count();
        $porder_mrp_price = DB::table('invoices')->join('shopping_carts','shopping_carts.session_id','invoices.session_id')->where('invoices.status','0')->select('shopping_carts.sale_price')->sum('shopping_carts.sale_price');
        $porder_discount_amount = DB::table('invoices')->join('shopping_carts','shopping_carts.session_id','invoices.session_id')->where('invoices.status','0')->select('shopping_carts.discount_price')->sum('shopping_carts.discount_price');
        $porder_grand_total =DB::table('invoices')->join('shopping_carts','shopping_carts.session_id','invoices.session_id')->where('invoices.status','0')->select('shopping_carts.current_price')->sum('shopping_carts.current_price');
        $pporder = DB::table('invoices')->where('status','1')->count();
        $pporder_mrp_price = DB::table('invoices')->join('shopping_carts','shopping_carts.session_id','invoices.session_id')->where('invoices.status','1')->select('shopping_carts.sale_price')->sum('shopping_carts.sale_price');
        $pporder_discount_amount = DB::table('invoices')->join('shopping_carts','shopping_carts.session_id','invoices.session_id')->where('invoices.status','1')->select('shopping_carts.discount_price')->sum('shopping_carts.discount_price');
        $pporder_grand_total =DB::table('invoices')->join('shopping_carts','shopping_carts.session_id','invoices.session_id')->where('invoices.status','1')->select('shopping_carts.current_price')->sum('shopping_carts.current_price');
        $onorder = DB::table('invoices')->where('status','2')->count();
        $onorder_mrp_price = DB::table('invoices')->join('shopping_carts','shopping_carts.session_id','invoices.session_id')->where('invoices.status','2')->select('shopping_carts.sale_price')->sum('shopping_carts.sale_price');
        $onorder_discount_amount = DB::table('invoices')->join('shopping_carts','shopping_carts.session_id','invoices.session_id')->where('invoices.status','2')->select('shopping_carts.discount_price')->sum('shopping_carts.discount_price');
        $onorder_grand_total =DB::table('invoices')->join('shopping_carts','shopping_carts.session_id','invoices.session_id')->where('invoices.status','2')->select('shopping_carts.current_price')->sum('shopping_carts.current_price');
        $sorder = DB::table('invoices')->where('status','3')->count();
        $sorder_mrp_price = DB::table('invoices')->join('shopping_carts','shopping_carts.session_id','invoices.session_id')->where('invoices.status','3')->select('shopping_carts.sale_price')->sum('shopping_carts.sale_price');
        $sorder_discount_amount = DB::table('invoices')->join('shopping_carts','shopping_carts.session_id','invoices.session_id')->where('invoices.status','3')->select('shopping_carts.discount_price')->sum('shopping_carts.discount_price');
        $sorder_grand_total =DB::table('invoices')->join('shopping_carts','shopping_carts.session_id','invoices.session_id')->where('invoices.status','3')->select('shopping_carts.current_price')->sum('shopping_carts.current_price');
        $reorder = DB::table('invoices')->where('status','4')->count();
        $reorder_mrp_price = DB::table('invoices')->join('shopping_carts','shopping_carts.session_id','invoices.session_id')->where('invoices.status','4')->select('shopping_carts.sale_price')->sum('shopping_carts.sale_price');
        $reorder_discount_amount = DB::table('invoices')->join('shopping_carts','shopping_carts.session_id','invoices.session_id')->where('invoices.status','4')->select('shopping_carts.discount_price')->sum('shopping_carts.discount_price');
        $reorder_grand_total =DB::table('invoices')->join('shopping_carts','shopping_carts.session_id','invoices.session_id')->where('invoices.status','4')->select('shopping_carts.current_price')->sum('shopping_carts.current_price');
        $shpping = DB::table('invoices')->where('status','5')->count();
        $shpping_mrp_price = DB::table('invoices')->join('shopping_carts','shopping_carts.session_id','invoices.session_id')->where('invoices.status','5')->select('shopping_carts.sale_price')->sum('shopping_carts.sale_price');
        $shpping_discount_amount = DB::table('invoices')->join('shopping_carts','shopping_carts.session_id','invoices.session_id')->where('invoices.status','5')->select('shopping_carts.discount_price')->sum('shopping_carts.discount_price');
        $shpping_grand_total =DB::table('invoices')->join('shopping_carts','shopping_carts.session_id','invoices.session_id')->where('invoices.status','5')->select('shopping_carts.current_price')->sum('shopping_carts.current_price');
        $refund = DB::table('invoices')->where('status','6')->count();
        $refund_mrp_price = DB::table('invoices')->join('shopping_carts','shopping_carts.session_id','invoices.session_id')->where('invoices.status','6')->select('shopping_carts.sale_price')->sum('shopping_carts.sale_price');
        $refund_discount_amount = DB::table('invoices')->join('shopping_carts','shopping_carts.session_id','invoices.session_id')->where('invoices.status','6')->select('shopping_carts.discount_price')->sum('shopping_carts.discount_price');
        $refund_grand_total =DB::table('invoices')->join('shopping_carts','shopping_carts.session_id','invoices.session_id')->where('invoices.status','6')->select('shopping_carts.current_price')->sum('shopping_carts.current_price');

        return view('Admin.index',compact('user','inuser','acuser','seller','inseller','acseller','order','order_mrp_price','order_discount_amount','order_grand_total','porder','porder_mrp_price','porder_discount_amount','porder_grand_total','pporder','pporder_mrp_price','pporder_discount_amount','pporder_grand_total','onorder','onorder_mrp_price','onorder_discount_amount','onorder_grand_total','sorder','sorder_mrp_price','sorder_discount_amount','sorder_grand_total','reorder','reorder_mrp_price','reorder_discount_amount','reorder_grand_total','shpping','shpping_mrp_price','shpping_discount_amount','shpping_grand_total','refund','refund_mrp_price','refund_discount_amount','refund_grand_total'));
    }

    public function index()
    {
    
    $id =   Auth::guard('admin')->user();

    $mainlink = DB::table('linkpiority')
           ->join('adminmainmenu', 'adminmainmenu.id', '=', 'linkpiority.mainlinkid')
                 ->select('linkpiority.*','adminmainmenu.*')
           ->groupBy('linkpiority.mainlinkid')
           ->orderBy('adminmainmenu.serialNo', 'ASC')
               ->where('linkpiority.adminid',$id->id)
          ->get();

     $sublink = DB::table('linkpiority')
           ->join('adminsubmenu', 'adminsubmenu.id', '=', 'linkpiority.sublinkid')
            ->select('linkpiority.*','adminsubmenu.*')
            ->orderBy('adminsubmenu.serialno', 'ASC')
            ->where('linkpiority.adminid',$id->id)
            ->get();


     $Adminminlink = DB::table('adminmainmenu')
           ->orderBy('adminmainmenu.serialNo', 'ASC')
           ->get();

     $adminsublink = DB::table('adminsubmenu')
            ->orderBy('adminsubmenu.serialno', 'ASC')
           
            ->get();


        $mainMenu  = DB::table('adminmainmenu')
                ->orderBy('serialNo', 'asc')
                ->get();
        $submenu= DB::table('adminsubmenu') ->orderBy('serialno', 'ASC')->get();
        
        $adminwiseMain = DB::table('linkpiority')
                ->join('adminmainmenu', 'linkpiority.mainlinkid', '=', 'adminmainmenu.id')
                         ->groupBy('linkpiority.mainlinkid')
                ->where('linkpiority.adminid', $id->id)
                ->get();

        $adminwiseSub = DB::table('linkpiority')
                ->join('adminsubmenu', 'linkpiority.sublinkid', '=', 'adminsubmenu.id')
                 ->groupBy('linkpiority.sublinkid')
                ->where('linkpiority.adminid', $id->id)
                ->get();

        
        return view('Admin.Create_admin.index',compact('mainMenu','submenu','mainlink','id','sublink','Adminminlink','adminsublink','adminwiseMain','adminwiseSub'));
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
          'name' => 'required|max:100',
          'email' => 'required|unique:createadmin|max:100',
          'phone' => 'required',
          'type' => 'required',
          'address' => 'required',
          'password' => 'min:4',
          'confirm_password' => 'required_with:password|same:password|min:4'
        ]);

        if ($validator->fails()) {
          return redirect()->back()
                   ->withErrors($validator)
                   ->withInput();
        }

         $file = $request->file('image');
        if (isset($file)) 
        {
            $path = rand().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/AdminImage/'),$path);
            
        }
        else
        {
            $path='';
        }

        $data = array(
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'status'=>$request->status,
            'address'=>$request->address,
            'type'=>$request->type,
            'password'=>Hash::make($request->password),
            'image'=>$path,
        );

        $insert = createadmin::create($data);

       if ($insert) {
          


            if(count($request->SublinkID) > 0){

                                for($i=0; $i<count($request->SublinkID); $i++){

                                    $expolaid=explode('and',$request->SublinkID[$i]);
                                    $fffff = DB::table('linkpiority')->insert(
                                            [
                                            'adminid' => createadmin::all()->last()->id, 
                                            'mainlinkid' => $expolaid[0], 
                                            'sublinkid' => $expolaid[1] 
                                        ]);

                                }
                        }

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
    public function show()
    {
         $data = createadmin::all();
        return view('Admin.Create_admin.view',compact('data'));
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
          $file = $request->file('image');
        if (isset($file)) 
        {
            $path = rand().'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/AdminImage/'),$path);
            
        }
        else
        {
            $datas = createadmin::find($id);
            $path=$datas->image;
        }

        if ($request->password == "") 
        {
           $data = array(
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'type'=>$request->type,
            'address'=>$request->address,
            'image'=>$path,
            'status'=>$request->status,
        );
        }
        else
        {

        $data = array(
            'name'=>$request->name,
            'email'=>$request->email,
            'phone'=>$request->phone,
            'type'=>$request->type,
            'address'=>$request->address,
            'password'=>Hash::make($request->password),
            'image'=>$path,
            'status'=>$request->status,
        );
        
        }


        $update = createadmin::find($id)->update($data);


    if ($update && $request->SublinkID) {
     if(count($request->SublinkID) > 0){

                            $deleteData= DB::table('linkpiority')->where('adminid', '=', $request->id)->delete();
                                for($i=0; $i<count($request->SublinkID); $i++){
                                    $expolaid=explode('and',$request->SublinkID[$i]);
                                    $search=DB::table('linkpiority')->where('adminid',$request->id)->where('mainlinkid',$expolaid[0])->where('sublinkid',$expolaid[1])->first();
                                    if($search){}else{
                                    $fffff = DB::table('linkpiority')->insert(
                                            ['adminid' => $request->id, 
                                            'mainlinkid' => $expolaid[0], 
                                            'sublinkid' => $expolaid[1] 
                                            ]
                                        );
                                    }

                                }
                        }

           
        }
        $notification=array(
            'messege'   =>'Update Successfull',
            'alert-type'=>'info'
        );

        return redirect()->back()->with($notification);
       

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
         $obj = DB::table('linkpiority')->where('adminid', '=', $request->id)->delete();
        $data = createadmin::find($request->id);

        $delete = createadmin::find($request->id)->delete();
        
        $path= base_path().'/public/AdminImage/'.$data->image;
            if(file_exists($path)){
                unlink($path);
            }
      
    }

    public function LoginAdmin(Request $request)
    {

        $creadintial = ['email'=>$request->email,'password'=>$request->password];
        if (Auth('admin')->attempt($creadintial)) 
        {
            if (Auth('admin')->user()->status === '0') 
            {
                Auth('admin')->logout();

                 $notification=array(
            'messege'   =>'Your Account Access Pending!',
            'alert-type'=>'warning'
        );

        return redirect()->back()->with($notification); 
            }

            else
            {
                $notification=array(
            
            'messege'   =>'Login Successfull',
            'alert-type'=>'success'
        );

        return redirect('/Admin-dashboard')->with($notification); 
            }
        }
        else
        {
            $notification=array(
            'messege'   =>'Password and E-mail Does not match!',
            'alert-type'=>'error'
        );

        return redirect()->back()->with($notification); 
        }
    }

    public function Adminlogout()
    {
        Auth('admin')->logout();

          $notification=array(
            'messege'   =>'Logout Successfull!',
            'alert-type'=>'info'
        );

        return redirect('/login')->with($notification);
    }

    public function inactivestatusadmin(Request $request)
    {
         $inac = DB::table('createadmin')
         ->where('id',$request->id)
         ->update(['status'=>'0']);
    }
    public function activestatusadmin(Request $request)
    {
         $inac = DB::table('createadmin')
         ->where('id',$request->id)
         ->update(['status'=>'1']);
    }

    public function editadminModal($id)
    {



    $mainlink = DB::table('linkpiority')
           ->join('adminmainmenu', 'adminmainmenu.id', '=', 'linkpiority.mainlinkid')
                 ->select('linkpiority.*','adminmainmenu.*')
           ->groupBy('linkpiority.mainlinkid')
           ->orderBy('adminmainmenu.serialNo', 'ASC')
               ->where('linkpiority.adminid',$id)
          ->get();

     $sublink = DB::table('linkpiority')
           ->join('adminsubmenu', 'adminsubmenu.id', '=', 'linkpiority.sublinkid')
            ->select('linkpiority.*','adminsubmenu.*')
            ->orderBy('adminsubmenu.serialno', 'ASC')
            ->where('linkpiority.adminid',$id)
            ->get();


     $Adminminlink = DB::table('adminmainmenu')
           ->orderBy('adminmainmenu.serialNo', 'ASC')
           ->get();

     $adminsublink = DB::table('adminsubmenu')
            ->orderBy('adminsubmenu.serialno', 'ASC')
           
            ->get();


        $mainMenu  = DB::table('adminmainmenu')
                ->orderBy('serialNo', 'asc')
                ->get();
        $submenu= DB::table('adminsubmenu') ->orderBy('serialno', 'ASC')->get();
        
        $adminwiseMain = DB::table('linkpiority')
                ->join('adminmainmenu', 'linkpiority.mainlinkid', '=', 'adminmainmenu.id')
                         ->groupBy('linkpiority.mainlinkid')
                ->where('linkpiority.adminid', $id)
                ->get();

        $adminwiseSub = DB::table('linkpiority')
                ->join('adminsubmenu', 'linkpiority.sublinkid', '=', 'adminsubmenu.id')
                 ->groupBy('linkpiority.sublinkid')
                ->where('linkpiority.adminid', $id)
                ->get();

        $data = createadmin::findOrFail($id);

        return view('Admin.Create_admin.modal',compact('mainMenu','submenu','mainlink','id','sublink','Adminminlink','adminsublink','adminwiseMain','adminwiseSub','data'));
    }
   
}
