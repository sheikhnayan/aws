<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product_item;
use App\product_category;
use App\product_subcategory;
use Auth;
use DB;
use Validator;
class subcategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $data=DB::table('product_subcategory')
        ->join('product_item', 'product_subcategory.item_id', 'product_item.id')
        ->join('product_category', 'product_subcategory.category_id', 'product_category.id')
        ->select('product_subcategory.*','product_category.category_name','product_item.item_name')->get();
       return view('Admin.subCategory.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $item= product_item::all();
        return view('Admin.subCategory.create',compact('item'));
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
          'item_id' => 'required',
          'category_id' => 'required',
          'subcategory_name' => 'required',
        ]);

        if ($validator->fails()) {
          return redirect()->back()
                   ->withErrors($validator)
                   ->withInput();
        }

       
        $insert = array(
            'item_id' => $request->item_id, 
            'category_id' => $request->category_id, 
            'sl' => $request->sl, 
            'subcategory_name' => $request->subcategory_name, 
            'admin_id' => Auth('admin')->user()->id, 
                        );


        $data = product_subcategory::create($insert);
        
        
                $file = $request->file('image');
         $banner = $request->file('banner');
        if ($file) {

            $imageName =  $data->id.'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/categoryImage/'),$imageName);

            DB::table('product_subcategory')->where('id',$data->id)->update(['image'=>$imageName]);
        }
 
        
      if($banner){
          
            $imageName =  $data->id.'banner.'.$banner->getClientOriginalExtension();
            $banner->move(public_path('/categoryImage/'),$imageName);

            DB::table('product_subcategory')->where('id',$data->id)->update(['banner'=>$imageName]);
          
      }

 
        if ($data) {

          $notification=array(
            'messege'   =>'Sub Category Added Successfull',
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
          $data = DB::table('product_subcategory')
          ->where('product_subcategory.id',$id) 
        ->join('product_item', 'product_subcategory.item_id', 'product_item.id')
        ->join('product_category', 'product_subcategory.category_id', 'product_category.id')
        ->select('product_subcategory.*','product_category.category_name','product_item.item_name')
        ->first();

        $item = product_item::all();

        return view('Admin.subCategory.modal',compact('data','item'));
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
          'item_id' => 'required',
          'category_id' => 'required',
          'subcategory_name' => 'required',
        ]);

        if ($validator->fails()) {
          return redirect()->back()
                   ->withErrors($validator)
                   ->withInput();
        }

       
        $insert = array(
            'item_id' => $request->item_id, 
            'category_id' => $request->category_id, 
            'sl' => $request->sl, 
            'subcategory_name' => $request->subcategory_name, 
            'admin_id' => Auth('admin')->user()->id, 
                        );


        $data = product_subcategory::find($id)->update($insert);
        
        
         $file = $request->file('image');
         $banner = $request->file('banner');
        if ($file) {

            $imageName =  $id.'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/categoryImage/'),$imageName);

            DB::table('product_subcategory')->where('id',$id)->update(['image'=>$imageName]);
        }
        
        
              if($banner){
          
            $imageName =  $id.'banner.'.$banner->getClientOriginalExtension();
            $banner->move(public_path('/categoryImage/'),$imageName);

            DB::table('product_subcategory')->where('id',$id)->update(['banner'=>$imageName]);
          
      }
        



 
        if ($data) {

          $notification=array(
            'messege'   =>'Sub Category Update Successfull',
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
       $delt = product_subcategory::find($id)->delete(); 

          $notification=array(
            'messege'   =>'subCategory Delete Successfull',
            'alert-type'=>'error'
        );

        return redirect()->back()->with($notification); 
    }
    
}
