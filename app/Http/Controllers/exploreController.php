<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\explore_banner;
use Validator;
use DB;
class exploreController extends Controller
{

/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data= explore_banner::all();
          return view('Admin.explore_banner.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.explore_banner.create');
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
          'sl' => 'required',
          'url' => 'required',
          'image' => 'required',
        ]);

        if ($validator->fails()) {
          return redirect()->back()
                   ->withErrors($validator)
                   ->withInput();
        }

       
        $insert = array(
            'sl' => $request->sl, 
            'url' => $request->url, 
            'admin_id' => $request->admin_id, 
                        );


        $data = explore_banner::create($insert);

         $file = $request->file('image');
        if ($file) {

            $imageName =  $data->id.'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/exploreImage/'),$imageName);

            DB::table('explore_banners')->where('id',$data->id)->update(['image'=>$imageName]);
        }
        if ($data) {

          $notification=array(
            'messege'   =>'explore Added Successfull',
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
        $data = explore_banner::find($id);

        return view('Admin.explore_banner.modal',compact('data'));
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
          'url' => 'required',
        ]);

        if ($validator->fails()) {
          return redirect()->back()
                   ->withErrors($validator)
                   ->withInput();
        }

       
        $update = array(
            'sl' => $request->sl, 
            'url' => $request->url, 
            'admin_id' => $request->admin_id, 
                        );


        $data = explore_banner::find($id)->update($update);

         $file = $request->file('image');
        if ($file) {

            $imageName =  $id.'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/exploreImage/'),$imageName);

            DB::table('explore_banners')->where('id',$id)->update(['image'=>$imageName]);
        }
        if ($data) {

          $notification=array(
            'messege'   =>'explore update Successfull',
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
        $data = explore_banner::find($id);

         if ($data->image) {
        $path= base_path().'/public/exploreImage/'.$data->image;
            if(file_exists($path)){
                unlink($path);
            }
}
       $delt = explore_banner::find($id)->delete(); 

          $notification=array(
            'messege'   =>'explore Delete Successfull',
            'alert-type'=>'error'
        );

        return redirect()->back()->with($notification); 
    }
}
