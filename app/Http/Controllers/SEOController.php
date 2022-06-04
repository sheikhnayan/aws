<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SEO;
use Image;
use Str;
use DB;
use File;


class SEOController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $seo = SEO::first();
        return view('Admin.seo.index', compact('seo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // return view('Admin.seo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new SEO();
        $data->meta_title = $request->meta_title;
        $data->meta_des = $request->meta_des;
        $data->meta_keywords = $request->meta_keywords;
        $data->robots = $request->robots;
        $data->canonical = $request->canonical;
        $data->google_analytics = $request->google_analytics;

        $meta_image = $request->file('meta_image');
        if($meta_image)
        {
            $image_name= str::random(10);
            $orginalExtension = $meta_image->getClientOriginalExtension();
            $image_full_name = $image_name.'.'.$orginalExtension;
            $upload_path = public_path('/seoImage/');
            $image_url = $upload_path.$image_full_name;
            $success = $meta_image->move($upload_path, $image_full_name);
            $img = Image::make($image_url)->resize(1200, 627)->save();
            if($success)
            {
               $data->meta_image = $image_full_name;
            }
        }
        $data->save();

        $notification = array(
            'messege'   => 'Saved Successfull',
            'alert-type' => 'success'
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
        $data = SEO::findOrFail($id);
        $data->meta_title = $request->meta_title;
        $data->meta_des = $request->meta_des;
        $data->meta_keywords = $request->meta_keywords;
        $data->robots = $request->robots;
        $data->canonical = $request->canonical;
        $data->google_analytics = $request->google_analytics;

        $meta_image = $request->file('meta_image');
        if($meta_image)
        {
            $image_name= str::random(10);
            $orginalExtension = $meta_image->getClientOriginalExtension();
            $image_full_name = $image_name.'.'.$orginalExtension;
            $upload_path = public_path('/seoImage/');
            $image_url = $upload_path.$image_full_name;
            $success = $meta_image->move($upload_path, $image_full_name);
            $img = Image::make($image_url)->resize(1200, 627)->save();
            if($success)
            {
               $data->meta_image = $image_full_name;
            }
        }
        $data->save();

        $notification = array(
            'messege'   => 'Update Successfull',
            'alert-type' => 'success'
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
        //
    }
}
