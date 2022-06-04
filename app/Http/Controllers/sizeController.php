<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product_size_info;
use Validator;
use DB;
class sizeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = product_size_info::all();
        return view('Admin.size.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('Admin.size.create');
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
          'size_title' => 'required',
        ]);

        if ($validator->fails()) {
          return redirect()->back()
                   ->withErrors($validator)
                   ->withInput();
        }

       
        $insert = array(
            'size_title' => $request->size_title, 
                        );


        $data = product_size_info::create($insert);

if ($data) {

          $notification=array(
            'messege'   =>'size Added Successfull',
            'alert-type'=>'success'
        );

        return redirect()->back()->with($notification); 
        }
        else
        {
             $notification=array(
            'messege'   =>'Somthing Wrong',
            'alert-type'=>'error'
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
        $data = product_size_info::find($id);
        return view('Admin.size.modal',compact('data'));
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
          'size_title' => 'required',
        ]);

        if ($validator->fails()) {
          return redirect()->back()
                   ->withErrors($validator)
                   ->withInput();
        }

       
        $insert = array(
            'size_title' => $request->size_title, 
                        );


        $data = product_size_info::where('id',$id)->update($insert);

if ($data) {

          $notification=array(
            'messege'   =>'size update Successfull',
            'alert-type'=>'success'
        );

        return redirect()->back()->with($notification); 
        }
        else
        {
             $notification=array(
            'messege'   =>'Somthing Wrong',
            'alert-type'=>'error'
        );

        return redirect()->back()->with($notification); 
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $del = product_size_info::where('id',$id)->delete();

           $notification=array(
            'messege'   =>'Delete Successfull',
            'alert-type'=>'error'
        );

        return redirect()->back()->with($notification);
    }
}
