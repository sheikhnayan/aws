<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product_item;
use Validator;
use DB;
class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         
        $data=product_item::all();
       return view('Admin.item.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         return view('Admin.item.create');
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
          'item_name' => 'required',
        ]);

        if ($validator->fails()) {
          return redirect()->back()
                   ->withErrors($validator)
                   ->withInput();
        }

       
        $insert = array(
            'sl' => $request->sl, 
            'left_menu' => $request->left_menu, 
            'shop_by' => $request->shop_by, 
            'show_home' => $request->show_home, 
            'paginate' => $request->paginate, 
            'item_name' => $request->item_name, 
            'admin_id' => $request->admin_id, 
                        );


        $data = product_item::create($insert);

         $file = $request->file('image');
        if ($file) {

            $imageName =  $data->id.'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/itemImage/'),$imageName);

            DB::table('product_item')->where('id',$data->id)->update(['image'=>$imageName]);
        }
        
         $banner = $request->file('banner');
        if ($banner) {

            $bannerName =  $data->id.'banner.'.$banner->getClientOriginalExtension();
            $banner->move(public_path('/itemImage/'),$bannerName);

            DB::table('product_item')->where('id',$data->id)->update(['banner'=>$bannerName]);
        }
        if ($data) {

          $notification=array(
            'messege'   =>'Item Added Successfull',
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
        $data = product_item::find($id);

        return view('Admin.item.modal',compact('data'));
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
          'item_name' => 'required',
        ]);

        if ($validator->fails()) {
          return redirect()->back()
                   ->withErrors($validator)
                   ->withInput();
        }

       
        $update = array(
            'sl' => $request->sl, 
             'left_menu' => $request->left_menu, 
            'shop_by' => $request->shop_by, 
            'show_home' => $request->show_home, 
            'paginate' => $request->paginate, 
            'item_name' => $request->item_name, 
            'admin_id' => $request->admin_id, 
                        );


        $data = product_item::find($id)->update($update);

         $file = $request->file('image');
        if ($file) {

            $imageName =  $id.'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/itemImage/'),$imageName);

            DB::table('product_item')->where('id',$id)->update(['image'=>$imageName]);
        }
         $banner = $request->file('banner');
        if ($banner) {

            $bannerName =  $id.'banner.'.$banner->getClientOriginalExtension();
            $banner->move(public_path('/itemImage/'),$bannerName);

            DB::table('product_item')->where('id',$id)->update(['banner'=>$bannerName]);
        }
        if ($data) {

          $notification=array(
            'messege'   =>'Item update Successfull',
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
        try{
            $data = product_item::find($id);

         if ($data->image) {
        $path= base_path().'/public/itemImage/'.$data->image;
            if(file_exists($path)){
                unlink($path);
            }
}
         if ($data->banner) {
        $path= base_path().'/public/itemImage/'.$data->banner;
            if(file_exists($path)){
                unlink($path);
            }
}
       $delt = product_item::find($id)->delete(); 

          $notification=array(
            'messege'   =>'Item Delete Successfull',
            'alert-type'=>'error'
        );

        return redirect()->back()->with($notification); 
        
        }
        
        
         catch (\Illuminate\Database\QueryException $e) {
            
            $notification=array(
                    'messege'   =>'This item cannot be deleted! because it contains the product',
                    'alert-type'=>'warning'
                );
        
                return redirect()->back()->with($notification); 
        }
       
   }
}
