<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\delivery_charge;
use App\shipping_class;
use App\district;
use App\zone_district;
use App\Zone;
use Validator;
class deliverychargeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       
        $data= delivery_charge::all();
        return view('Admin.Deliverycharge.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $ship = shipping_class::all();
        $zone = Zone::all();
        return view('Admin.Deliverycharge.create',compact('ship','zone'));
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
          'zone_id' => 'required',
          // 'shipping_id' => 'required',
          'charge' => 'required',
        

        ]);

        if ($validator->fails()) {
          return redirect()->back()
                   ->withErrors($validator)
                   ->withInput();
        }
        $arrayName = array('charge' => $request->charge);

        $check = delivery_charge::where('zone_id',$request->zone_id)->where('shipping_id',$request->shipping_id)->first();

        if ($check) 
        {
            $update = delivery_charge::where('zone_id',$request->zone_id)->where('shipping_id',$request->shipping_id)->update($arrayName);
        }
        else
        {

        $insert = delivery_charge::create($request->all());

        }
          $notification=array(
            'messege'   =>'Delivery Charge Created',
            'alert-type'=>'success'
        );

        return redirect()->back()->with($notification); 
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
        
        $data= delivery_charge::find($id);
        $ship= shipping_class::get();
        $zone= Zone::get();
        return view('Admin.Deliverycharge.modal',compact('data','ship','zone'));
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
         $validator = Validator::make($request->all(), [
          'zone_id' => 'required',
          'charge' => 'required',
        

        ]);

        if ($validator->fails()) {
          return redirect()->back()
                   ->withErrors($validator)
                   ->withInput();
        }
        $insert = delivery_charge::find($id)->update($request->all());
          $notification=array(
            'messege'   =>'Delivery Charge Updated',
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
    public function destroy($id)
    {
         $insert = delivery_charge::find($id)->delete();
          $notification=array(
            'messege'   =>'Delivery Charge Deleted',
            'alert-type'=>'error'
        );

        return redirect()->back()->with($notification); 
    }

 // ===================Shipping  class ==============
    public function shippingclass()
    {
       
        $data= shipping_class::all();
        return view('Admin.shippingclass.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function shippingclasscreate()
    {
        return view('Admin.shippingclass.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function shippingclassstore(Request $request)
    {
        $validator = Validator::make($request->all(), [
          'shipping_name' => 'required',
        

        ]);

        if ($validator->fails()) {
          return redirect()->back()
                   ->withErrors($validator)
                   ->withInput();
        }

        $arrayName = array('shipping_name' => $request->shipping_name);

        $insert = shipping_class::create($request->all());

          $notification=array(
            'messege'   =>'Shipping class Created',
            'alert-type'=>'success'
        );

        return redirect()->back()->with($notification); 
    }

   
    public function shippingclassedit($id)
    {
        
        $data= shipping_class::find($id);
        return view('Admin.shippingclass.modal',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function shippingclassupdate(Request $request, $id)
    {
         $validator = Validator::make($request->all(), [
          'shipping_name' => 'required',
        

        ]);

        if ($validator->fails()) {
          return redirect()->back()
                   ->withErrors($validator)
                   ->withInput();
        }
        $insert = shipping_class::find($id)->update($request->all());
          $notification=array(
            'messege'   =>'shipping class Updated',
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
    public function shippingclassdestroy($id)
    {
        
        try{
            $insert = shipping_class::find($id)->delete();
          $notification=array(
            'messege'   =>'shipping class Deleted',
            'alert-type'=>'error'
        );

        return redirect()->back()->with($notification); 
         
        }
        
             catch (\Illuminate\Database\QueryException $e) {
            
            $notification=array(
                    'messege'   =>'This shippin class cannot be deleted! because it contains the product',
                    'alert-type'=>'warning'
                );
        
                return redirect()->back()->with($notification); 
        }
    }






 // ===================Zone  add ==============
    public function Zone()
    {
       
        $data= Zone::all();
        return view('Admin.Deliverycharge.Zone.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Zonecreate()
    {
        return view('Admin.Deliverycharge.Zone.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function Zonestore(Request $request)
    {
        $validator = Validator::make($request->all(), [
          'zone_name' => 'required',
        

        ]);

        if ($validator->fails()) {
          return redirect()->back()
                   ->withErrors($validator)
                   ->withInput();
        }

        $arrayName = array('zone_name' => $request->zone_name);

        $insert = Zone::create($request->all());

          $notification=array(
            'messege'   =>'Zone Created',
            'alert-type'=>'success'
        );

        return redirect()->back()->with($notification); 
    }

   
    public function Zoneedit($id)
    {
        
        $data= Zone::find($id);
        return view('Admin.Deliverycharge.Zone.modal',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function Zoneupdate(Request $request, $id)
    {
         $validator = Validator::make($request->all(), [
          'zone_name' => 'required',
        

        ]);

        if ($validator->fails()) {
          return redirect()->back()
                   ->withErrors($validator)
                   ->withInput();
        }
        $insert = Zone::find($id)->update($request->all());
          $notification=array(
            'messege'   =>'Zone Updated',
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
    public function Zonedestroy($id)
    {
         $insert = Zone::find($id)->delete();
          $notification=array(
            'messege'   =>'Zone Deleted',
            'alert-type'=>'error'
        );

        return redirect()->back()->with($notification); 
    }






 // ===================Zone Wise District  add ==============
    public function Zonedistrict()
    {
       
        $data= zone_district::all();
        return view('Admin.Deliverycharge.zonedistrict.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function Zonedistrictcreate()
    {
        $zone= zone::all();
        $district= district::all();
        return view('Admin.Deliverycharge.zonedistrict.create',compact('zone','district'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function Zonedistrictstore(Request $request)
    {
        $validator = Validator::make($request->all(), [
          'zone_id' => 'required',
          'thana_id' => 'required',
        

        ]);

        if ($validator->fails()) {
          return redirect()->back()
                   ->withErrors($validator)
                   ->withInput();
        }

        for ($i=0; $i < count($request->thana_id) ; $i++) 
        { 
           
        $insert = zone_district::create([
            'zone_id' => $request->zone_id,
            'thana_id' => $request->thana_id[$i]
        ]);

        }



          $notification=array(
            'messege'   =>'Zone Created',
            'alert-type'=>'success'
        );

        return redirect()->back()->with($notification); 
    }

   
    public function Zonedistrictedit($id)
    {
        
        $data= zone_district::find($id);
        return view('Admin.Deliverycharge.zonedistrict.modal',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function Zonedistrictupdate(Request $request, $id)
    {
         $validator = Validator::make($request->all(), [
           'zone_id' => 'required',
          'thana_id' => 'required',
        

        ]);

        if ($validator->fails()) {
          return redirect()->back()
                   ->withErrors($validator)
                   ->withInput();
        }
        $insert = zone_district::find($id)->update($request->all());
          $notification=array(
            'messege'   =>'Zone Updated',
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
    public function Zonedistrictdestroy($id)
    {
         $insert = zone_district::find($id)->delete();
          $notification=array(
            'messege'   =>'Zone Deleted',
            'alert-type'=>'error'
        );

        return redirect()->back()->with($notification); 
    }

}
