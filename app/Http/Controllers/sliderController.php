<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\slider;
use Validator;
use DB;
class sliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data= slider::all();
          return view('Admin.slider.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.slider.create');
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
          'sl' => 'nullable',

          'image' => 'required',
          'place' => 'required',
        ]);

        if ($validator->fails()) {
          return redirect()->back()
                   ->withErrors($validator)
                   ->withInput();
        }

       
        $insert = array(
            'sl' => $request->sl, 
            'url' => $request->url, 
            'place' => $request->place, 
            'status' => '1',
            'admin_id' => $request->admin_id, 
                        );


        $data = slider::create($insert);

         $file = $request->file('image');
        if ($file) {

            $imageName =  $data->id.'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/sliderImage/'),$imageName);

            DB::table('sliders')->where('id',$data->id)->update(['image'=>$imageName]);
        }
        if ($data) {

          $notification=array(
            'messege'   =>'Slider Added Successfull',
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
        $data = slider::find($id);

        return view('Admin.slider.modal',compact('data'));
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
          'sl' => 'required',

        ]);

        if ($validator->fails()) {
          return redirect()->back()
                   ->withErrors($validator)
                   ->withInput();
        }

       
        $update = array(
            'sl' => $request->sl, 
            'url' => $request->url ?? '', 
            'place' => $request->place ?? '', 
            'status' => '1', 
            'admin_id' => $request->admin_id, 
                        );


        $data = slider::find($id)->update($update);

         $file = $request->file('image');
        if ($file) {

            $imageName =  $id.'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/sliderImage/'),$imageName);

            DB::table('sliders')->where('id',$id)->update(['image'=>$imageName]);
        }
        if ($data) {

          $notification=array(
            'messege'   =>'slider update Successfull',
            'alert-type'=>'success'
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
        $data = slider::find($id);

         if ($data->image) {
        $path= base_path().'/public/sliderImage/'.$data->image;
            if(file_exists($path)){
                unlink($path);
            }
}
       $delt = slider::find($id)->delete(); 

          $notification=array(
            'messege'   =>'slider Delete Successfull',
            'alert-type'=>'error'
        );

        return redirect()->back()->with($notification); 
    }
}
