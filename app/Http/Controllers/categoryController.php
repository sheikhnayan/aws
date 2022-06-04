<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product_item;
use App\product_category;
use Validator;
use DB;
class categoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data=DB::table('product_category')
        ->join('product_item', 'product_category.item_id', 'product_item.id')
        ->select('product_category.*','product_item.item_name')->get();
       return view('Admin.category.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item = product_item::all();
        return view('Admin.category.create',compact('item'));
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
          'item_id' => 'required',
          'category_name' => 'required',
        ]);

        if ($validator->fails()) {
          return redirect()->back()
                   ->withErrors($validator)
                   ->withInput();
        }

       
        $insert = array(
            'sl' => $request->sl, 
            'item_id' => $request->item_id, 
            'category_name' => $request->category_name, 
            'admin_id' => $request->admin_id, 
            'shop_by' => $request->shop_by, 
            'paginate' => $request->paginate, 
                        );


        $data = product_category::create($insert);

         $file = $request->file('image');
         $banner = $request->file('banner');
        if ($file) {

            $imageName =  $data->id.'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/categoryImage/'),$imageName);

            DB::table('product_category')->where('id',$data->id)->update(['image'=>$imageName]);
        }
 
        
      if($banner){
          
            $imageName =  $data->id.'banner.'.$banner->getClientOriginalExtension();
            $banner->move(public_path('/categoryImage/'),$imageName);

            DB::table('product_category')->where('id',$data->id)->update(['banner'=>$imageName]);
          
      }
      
         if ($data) {

          $notification=array(
            'messege'   =>'Category Added Successfull',
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
        $data = DB::table('product_category')
        ->join('product_item', 'product_category.item_id', 'product_item.id')
        ->where('product_category.id',$id) 
        ->select('product_category.*','product_item.item_name')
        ->first();

        $item = product_item::all();

        return view('Admin.category.modal',compact('data','item'));
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
          'item_id' => 'required',
          'category_name' => 'required',
        ]);

        if ($validator->fails()) {
          return redirect()->back()
                   ->withErrors($validator)
                   ->withInput();
        }

       
        $insert = array(
            'sl' => $request->sl, 
            'item_id' => $request->item_id, 
            'category_name' => $request->category_name, 
            'shop_by' => $request->shop_by, 
            'paginate' => $request->paginate, 
            'admin_id' => $request->admin_id, 
                        );


        $data = product_category::find($id)->update($insert);

         $file = $request->file('image');
         $banner = $request->file('banner');
        if ($file) {

            $imageName =  $id.'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/categoryImage/'),$imageName);

            DB::table('product_category')->where('id',$id)->update(['image'=>$imageName]);
        }
        
        
              if($banner){
          
            $imageName =  $id.'banner.'.$banner->getClientOriginalExtension();
            $banner->move(public_path('/categoryImage/'),$imageName);

            DB::table('product_category')->where('id',$id)->update(['banner'=>$imageName]);
          
      }
        
        if ($data) {

          $notification=array(
            'messege'   =>'Category Update Successfull',
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
        
        try
        {
            $data = product_category::find($id);

         if ($data->image) {
        $path= base_path().'/public/categoryImage/'.$data->image;
            if(file_exists($path)){
                unlink($path);
            }
        }
         if ($data->banner) {
        $path= base_path().'/public/categoryImage/'.$data->banner;
            if(file_exists($path)){
                unlink($path);
            }
        }
        
          $delt = product_category::find($id)->delete(); 

          $notification=array(
            'messege'   =>'Category Delete Successfull',
            'alert-type'=>'error'
        );

        return redirect()->back()->with($notification); 
        
        }
        catch (\Illuminate\Database\QueryException $e) {
            
            $notification=array(
                    'messege'   =>'This Category cannot be deleted! because it contains the product',
                    'alert-type'=>'warning'
                );
        
                return redirect()->back()->with($notification); 
        }
       
    }
}
