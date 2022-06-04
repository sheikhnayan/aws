<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FlashDeal;
use App\FlashDealProduct;
use DB;
use Validator;
use Str;

class FlashDealController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas=FlashDeal::get();
        return view('Admin.flashdeal.index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = DB::table('product_productinfo')->where('status', 1)->get();
        return view('Admin.flashdeal.create',compact('products'));
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
          'title' => 'required',
          'background_color' => 'required',
          'text_color' => 'required',
          'start_date' => 'required',
          'end_date' => 'required',
          'product_id.*' => 'required',
          'status' => 'required',
        ]);

        if ($validator->fails()) {
          return redirect()->back()
                   ->withErrors($validator)
                   ->withInput();
        }

        $data = new FlashDeal();
        $data->sl = $request->sl;
        $data->title = $request->title;
        $data->background_color = $request->background_color;
        $data->text_color = $request->text_color;
        $data->start_date = $request->start_date;
        $data->end_date = $request->end_date;
        $data->page_link = $request->page_link;
        $data->featured = $request->featured;
        $data->status = $request->status;

        $banner = $request->file('banner');
        if($banner)
        {
            $image_name= str::random(10);
            $orginalExtension = $banner->getClientOriginalExtension();
            $image_full_name = $image_name.'.'.$orginalExtension;
            $upload_path = public_path('/flashdealImage/');
            $image_url = $upload_path.$image_full_name;
            $success = $banner->move($upload_path, $image_full_name);
            if($success)
            {
                $data['banner'] = $image_full_name;
            }
        }
        $data->save();

        $product_id = $request->product_id;
        foreach ($product_id as $key => $value) {
            $product = new FlashDealProduct();
            $product->flashdeal_id = $data->id;
            $product->product_id = $value;
            $product->save();
        }

        $notification=array(
            'messege'   =>'Flash Deal Added Successfull',
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
        $data = FlashDeal::find($id);
        $products = DB::table('product_productinfo')->where('status', 1)->get();
        $flashdeal_products = FlashDealProduct::where('flashdeal_id', $id)->get();
        return view('Admin.flashdeal.edit',compact('products', 'data', 'flashdeal_products'));
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
        $data = FlashDeal::find($id);
        $data->sl = $request->sl;
        $data->title = $request->title;
        $data->background_color = $request->background_color;
        $data->text_color = $request->text_color;
        $data->start_date = $request->start_date;
        $data->end_date = $request->end_date;
        $data->page_link = $request->page_link;
        $data->featured = $request->featured;
        $data->status = $request->status;

        $banner = $request->file('banner');
        if($banner)
        {
            $image_name= str::random(10);
            $orginalExtension = $banner->getClientOriginalExtension();
            $image_full_name = $image_name.'.'.$orginalExtension;
            $upload_path = public_path('/flashdealImage/');
            $image_url = $upload_path.$image_full_name;
            $success = $banner->move($upload_path, $image_full_name);
            if($success)
            {
                $path= base_path().'/public/flashdealImage/'.$data->banner;
                  if(file_exists($path)){
                    unlink($path);
                  }
                $data['banner'] = $image_full_name;
            }
        }
        $data->save();

        $delete =  FlashDealProduct::where('flashdeal_id',$id)->delete();
        $product_id = $request->product_id;
        foreach ($product_id as $key => $value) {
            $product = new FlashDealProduct();
            $product->flashdeal_id = $data->id;
            $product->product_id = $value;
            $product->save();
        }

        $notification=array(
            'messege'   =>'Flash Deal Added Successfull',
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
        $data = FlashDeal::find($id);

        if ($data->banner) {
        $path= base_path().'/public/flashdealImage/'.$data->banner;
            if(file_exists($path)){
                unlink($path);
            }
        }
        FlashDeal::find($id)->delete(); 
        FlashDealProduct::where('flashdeal_id', $id)->delete(); 
        $notification=array(
            'messege'   =>'Flash Deal Delete Successfull',
            'alert-type'=>'error'
        );

        return redirect()->back()->with($notification); 
    }
}
