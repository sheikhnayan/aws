<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\district;
use Validator;
class districtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
          $data= district::all();
        return view('Admin.district.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.district.create');
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
          'district_name' => 'required',
        

        ]);

        if ($validator->fails()) {
          return redirect()->back()
                   ->withErrors($validator)
                   ->withInput();
        }

        $arrayName = array('district_name' => $request->district_name);

       

        $insert = district::create($request->all());

        
          $notification=array(
            'messege'   =>'Delivery District Created',
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
         $data= district::find($id);
        return view('Admin.district.modal',compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $data= district::find($id);
        return view('Admin.district.modal',compact('data'));
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
          'district_name' => 'required',
        

        ]);

        if ($validator->fails()) {
          return redirect()->back()
                   ->withErrors($validator)
                   ->withInput();
        }
        $insert = district::find($id)->update($request->all());
          $notification=array(
            'messege'   =>'Delivery District Updated',
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
         $insert = district::find($id)->delete();
          $notification=array(
            'messege'   =>'Delivery district Deleted',
            'alert-type'=>'error'
        );

        return redirect()->back()->with($notification); 
    }
}
