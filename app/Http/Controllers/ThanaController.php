<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\thana;
use App\district;
use Validator;
class ThanaController extends Controller
{
    
    public function index()
    {
          $data= thana::all();
        return view('Admin.district.thana.index',compact('data'));
    }


    public function create()
    { 
      $district= district::all();
        return view('Admin.district.thana.create',compact('district'));
    }


    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
          'district_id' => 'required',
          'thana_name' => 'required',
        

        ]);

        if ($validator->fails()) {
          return redirect()->back()
                   ->withErrors($validator)
                   ->withInput();
        }

        $arrayName = array('district_id' => $request->district_id,'thana_name' => $request->thana_name,);

       

        $insert = thana::create($request->all());

        
          $notification=array(
            'messege'   =>'Delivery Thana/area Created',
            'alert-type'=>'success'
        );

        return redirect()->back()->with($notification); 
    }


    public function show($id)
    {
         $data= thana::find($id);
        return view('Admin.district.thana.modal',compact('data'));
    }


    public function edit($id)
    {
         $district= district::all();
         $data= thana::find($id);
        return view('Admin.district.thana.modal',compact('data','district'));
    }


    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
          'district_id' => 'required',
          'thana_name' => 'required',
        

        ]);

        if ($validator->fails()) {
          return redirect()->back()
                   ->withErrors($validator)
                   ->withInput();
        }
        $insert = thana::find($id)->update($request->all());
          $notification=array(
            'messege'   =>'Delivery Thana Updated',
            'alert-type'=>'info'
        );

        return redirect()->back()->with($notification); 
    }


    public function destroy($id)
    {
         $insert = thana::find($id)->delete();
          $notification=array(
            'messege'   =>'Delivery Thana Deleted',
            'alert-type'=>'error'
        );

        return redirect()->back()->with($notification); 
    }
}
