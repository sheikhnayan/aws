<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\coupon;
use Validator;
class couponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = coupon::all();

        return view('Admin.coupon.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.coupon.create');
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
          'coupon_name' => 'required',
          'start_date' => 'required',
          'min_price' => 'required',
          'discout_per' => 'required',
          'end_date' => 'required',
          'apply_coupon' => 'required',

        ]);

        if ($validator->fails()) {
          return redirect()->back()
                   ->withErrors($validator)
                   ->withInput();
        }
        $insert = coupon::create($request->all());
          $notification=array(
            'messege'   =>'Coupon Created',
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
        $data = coupon::find($id);
        return view('Admin.coupon.modal',compact('data'));
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
          'coupon_name' => 'required',
          'start_date' => 'required',
          'min_price' => 'required',
          'discout_per' => 'required',
          'end_date' => 'required',
          'apply_coupon' => 'required',

        ]);

        if ($validator->fails()) {
          return redirect()->back()
                   ->withErrors($validator)
                   ->withInput();
        }
        $insert = coupon::find($id)->update($request->all());
          $notification=array(
            'messege'   =>'Coupon updated',
            'alert-type'=>'success'
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
       $del = coupon::find($id)->delete();
          $notification=array(
            'messege'   =>'Coupon Deleted',
            'alert-type'=>'error'
        );

        return redirect()->back()->with($notification); 
    }

    public function activecoupon($id)
    {
      $update = array(
           'status'=>'1'
                      );
       $a = coupon::where('id',$id)->update($update);
          $notification=array(
            'messege'   =>'Coupon Activated',
            'alert-type'=>'success'
        );

        return redirect()->back()->with($notification); 
    }

    public function inactivecoupon($id)
    {
         $update = array(
            'status'=>'0'
                        );

        $data = coupon::where('id',$id)->update($update);

          $notification=array(
            'messege'   =>'Coupon Inactive',
            'alert-type'=>'error'
        );

        return redirect()->back()->with($notification); 
    }
}
