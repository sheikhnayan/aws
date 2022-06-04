<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product_item;
use App\product_category;
use App\product_subcategory;
use App\product_company;
use App\product_measurement;
use App\product_color_info;
use App\product_color;
use App\product_size;
use App\product_size_info;
use App\product_info;
use App\shipping_class;
use App\offer_setup;
use App\product_image;
use App\seller;
use Validator;
use DB;
use Auth;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {


     $data = DB::table('product_productinfo')
     ->leftJoin('product_item','product_item.id','product_productinfo.item_id')
     ->leftJoin('product_category','product_category.id','product_productinfo.category_id')
     ->leftJoin('product_company','product_company.id','product_productinfo.brand_id')
     ->leftJoin('shipping_classes','shipping_classes.id','product_productinfo.shipping_id')
     ->leftJoin('product_measurement','product_measurement.id','product_productinfo.measurement_type')
     ->select('product_productinfo.*','product_item.item_name','product_category.category_name','product_company.company_name','shipping_classes.shipping_name', 'product_measurement.measurement_type')
     ->get();


     return view('Admin.product.index',compact('data'));
   }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $iteminfo = product_item::all();
      $company = product_company::all();
      $measurementinfo = product_measurement::all();
      $sizes = product_size_info::all();
      $colors = product_color_info::all();
      $seller = seller::all();
      $shipping = shipping_class::get();
      return view('Admin.product.create',compact('company','iteminfo','measurementinfo','colors','sizes','seller','shipping'));
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
       'product_id'=>'required|unique:product_productinfo',
       'item_id'=>'required',
       'category_id'=>'required',
       'product_name'=>'required',
       'measurement_type'=>'required',
       'sale_price'=>'required',
       'current_price'=>'required',
       'min_qunt'=>'required',
     ]);

      if ($validator->fails()) 
      {
        return redirect()->back()
        ->withErrors($validator)
        ->withInput();
      }

      $product_id = $this->productinfoAutoId();
      $admin_id = Auth::guard('admin')->user()->id;
      $insert = array(
        'product_id'=>$request->product_id,
        'item_id'=>$request->item_id,
        'category_id'=>$request->category_id,
        'subcategory_id'=>$request->subcategory_id,
        'brand_id'=>$request->brand_id,
        'product_name'=>$request->product_name,
        'product_name_bangla'=>$request->product_name_bangla,
        'measurement_type'=>$request->measurement_type,
        'purchase_price'=>$request->purchase_price,
        'sale_price'=>$request->sale_price,
        'discount_price'=>$request->discount_price,
        'discount_per'=>$request->discount_per,
        'current_price'=>$request->current_price,
        'min_qunt'=>$request->min_qunt,
        'product_us'=>$request->product_us,
        'product_details'=>$request->product_details,
        'condition'=>$request->condition,
        'admin_id'=>$admin_id,
        'shipping_id'=>$request->shipping_id,
        'status'=>$request->status,
        'stock_status'=>$request->stock_status,
        'home_item_show'=>$request->home_item_show,
        'seller_id'=>$request->seller_id,
        'offer_id'=>$request->offer_id,
        
      );


      $data = product_info::create($insert);

    if($request->size_title){
          for ($i=0; $i <count($request->size_title) ; $i++) 
          { 
            $insertsize =DB::table('product_size')
            ->insert([
                'product_id'=>$data->id,
                'size'=>$request->size_title[$i],
                'status'=>'1',
            ]);
          }
    }


    if($request->color_title){
        for ($j=0; $j <count($request->color_title) ; $j++) 
        { 
            $insertcolor =DB::table('product_color')
            ->insert([
                'product_id'=>$data->id,
                'color'=>$request->color_title[$j],
                'status'=>'1',
            ]);
        } 
    }

//     if($request->type)
//     {
//      for ($i=0; $i < count($request->type); $i++) { 

//         $typ_id = $this->offerAutoId();
//         $insert = array(
//             'id'=>$typ_id,
//             'item_id'=>$request->item_id,
//             'category_id'=>$request->category_id,
//             'subcategory_id'=>$request->subcategory_id,
//             'product_id'=>$data->id,
//             'type'=>$request->type[$i],
//             'admin_id'=>$admin_id,
//             'status'=>'1',
//         );


//         $query = offer_setup::create($insert);

//     } 
// }





    $feature_image = $request->file('feature_image');
    if($feature_image)
    {
        $name = rand().'.'.$feature_image->getClientOriginalExtension();
        $feature_image->move(public_path().'/productImage/', $name);  
        DB::table('product_productinfo')->where('product_id',$request->product_id)->update([
          'image'=>$name,
        ]);

    }


      $file = $request->file('image');
      if($file)
      {

        foreach ($file as $key => $value) {
            
            $name = rand().'.'.$value->getClientOriginalExtension();
            $value->move(public_path().'/productImage/', $name);  

            DB::table('product_images')->insert([
              'product_id'=>$data->id,
              'image'=>$name,
            ]);
        }

    }


    if ($data) {

      $notification=array(
        'messege'   =>'Product Added Successfull',
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
     $data = DB::table('product_productinfo')
     ->join('product_item','product_item.id','product_productinfo.item_id')
     ->join('product_category','product_category.id','product_productinfo.category_id')
     ->leftJoin('product_measurement','product_measurement.id','product_productinfo.measurement_type')
     ->leftjoin('product_company','product_company.id','product_productinfo.brand_id')
     ->select('product_productinfo.*','product_item.item_name','product_category.category_name','product_measurement.measurement_type as measurementName','product_company.company_name')
     ->where('product_productinfo.id',$id)
     ->first();

     $subcategory = product_subcategory::where('id', $data->subcategory_id)->first();

     $iteminfo = product_item::all();
   
     $company = product_company::all();
     $measurementinfo = product_measurement::all();

     $sizes = product_size_info::all();
     $colors = product_color_info::all();
     
     $seller = seller::all();
     $shipping = shipping_class::all();
     $offer = offer_setup::where('product_id',$id)->get();

     $product_sizes = product_size::where('product_id',$id)->get();
 
     $product_colors = product_color::where('product_id',$id)->get();

     $images = product_image::where('product_id', $id)->get();

     return view('Admin.product.modal',compact('offer','data','iteminfo','company','measurementinfo','sizes','product_sizes','colors','product_colors','seller','shipping', 'images', 'subcategory'));
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


        'product_id'=>'required',
        'item_id'=>'required',
        'category_id'=>'required',
        'product_name'=>'required',
        'sale_price'=>'required',
        'current_price'=>'required',
        'min_qunt'=>'required',
      ]);

      if ($validator->fails()) {
        return redirect()->back()
        ->withErrors($validator)
        ->withInput();
      }

      $admin_id = Auth::guard('admin')->user()->id;
      $insert = array(
        'product_id'=>$request->product_id,
        'item_id'=>$request->item_id,
        'category_id'=>$request->category_id,
        'brand_id'=>$request->brand_id,
        'product_name'=>$request->product_name,
        'product_name_bangla'=>$request->product_name_bangla,
        'measurement_type'=>$request->measurement_type,
        'purchase_price'=>$request->purchase_price,
        'sale_price'=>$request->sale_price,
        'discount_price'=>$request->discount_price,
        'discount_per'=>$request->discount_per,
        'current_price'=>$request->current_price,
        'min_qunt'=>$request->min_qunt,
        'product_us'=>$request->product_us,
        'product_details'=>$request->product_details,
        'shipping_id'=>$request->shipping_id,
        'condition'=>$request->condition,
        'status'=>$request->status,
        'stock_status'=>$request->stock_status,
        'home_item_show'=>$request->home_item_show,
        'admin_id'=>$admin_id,
        'seller_id'=>$request->seller_id,
        'offer_id'=>$request->offer_id,
      );

      $data = product_info::find($id)->update($insert);

    $feature_image = $request->file('feature_image');
    if($feature_image)
    {
        $name = rand().'.'.$feature_image->getClientOriginalExtension();
        $feature_image->move(public_path().'/productImage/', $name);  
        DB::table('product_productinfo')->where('product_id',$request->product_id)->update([
          'image'=>$name,
        ]);

    }


      $d =DB::table('product_size')->where('product_id',$id)->delete();
      $d= DB::table('product_color')->where('product_id',$id)->delete();
      if($request->size_title)
      {
           for ($i=0; $i <count($request->size_title); $i++) 
           { 
              $insertsize =DB::table('product_size')
              ->insert([
                  'product_id'=>$id,
                  'size'=>$request->size_title[$i],
                  'status'=>'1',
              ]);
          }
      }

      if($request->color_title)
      {
       for ($j=0; $j <count($request->color_title) ; $j++) 
       { 

           $insertcolor =DB::table('product_color')
           ->insert([
            'product_id'=>$id,
            'color'=>$request->color_title[$j],
            'status'=>'1',
        ]);
       }
      }


//  if($request->type)
//  {
//      for ($i=0; $i < count($request->type); $i++) 
//      { 

//         $del  = offer_setup::where('type',$request->type)->where('product_id',$id)->delete();

//         $typ_id = $this->offerAutoId();
//         $insert = array(
//             'id'=>$typ_id,
//             'item_id'=>$request->item_id,
//             'category_id'=>$request->category_id,
//             'subcategory_id'=>$request->subcategory_id,
//             'product_id'=>$id,
//             'type'=>$request->type[$i],
//             'admin_id'=>$admin_id,
//             'status'=>'1',
//         );


//         $query = offer_setup::create($insert);

//     }

// }



    //   $file = $request->file('image');
    //   if($file)
    //   {
    //    $datadel=  DB::table('product_images')->where('product_id',$id)->get();
    //    if ($datadel) {
    //      foreach($datadel as $dele)
    //      {
    //       $path= base_path().'/public/productImage/'.$dele->image;
    //       if(file_exists($path)){
    //         unlink($path);
    //       }  
    //     }

    //   }
    //   $delete =  DB::table('product_images')->where('product_id',$id)->delete();

    //   for ($i=0; $i < count($file) ; $i++) 
    //   {
    //     $name[$i] = rand().'.'.$file[$i]->getClientOriginalExtension();
    //     $file[$i]->move(public_path().'/productImage/', $name[$i]);  

    //     DB::table('product_productinfo')->where('id',$id)->update([
    //       'image'=>$name[0],
    //     ]);

    //     DB::table('product_images')->insert([
    //       'product_id'=>$id,
    //       'image'=>$name[$i],
    //     ]);
    //   }
    // }


    if ($data) {

      $notification=array(
        'messege'   =>'Product update Successfull',
        'alert-type'=>'success'
      );

      return redirect()->back()->with($notification); 
    }

  }



    public function update_multi_image(Request $request)
    {

        $id = $request->id;

          $file = $request->file('image');
          if($file)
          {
           $datadel=  DB::table('product_images')->where('product_id',$id)->get();

           if ($datadel) {
             foreach($datadel as $dele)
             {
              $path= base_path().'/public/productImage/'.$dele->image;
              if(file_exists($path)){
                unlink($path);
              }  
            }

          }
          $delete =  DB::table('product_images')->where('product_id',$id)->delete();

            foreach ($file as $key => $value ){
                    $product_image = new product_image();
                    $image_name=rand().'.'.$value->getClientOriginalExtension();
                    $image_full_name = $image_name;
                    $upload_path = public_path().'/productImage/';
                    $image_url = $upload_path.$image_full_name;
                    $success = $value->move($upload_path, $image_full_name);
                    $product_image->product_id = $id;
                    $product_image->image = $image_full_name;
        
                    $product_image->save();
            }

   
        }

        $notification=array(
            'message' => 'Product Saved Successfully !!',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($notification);


    }


    public function delete_multi_image($id)
    {
        $p_image = product_image::where('id', $id)->first();

        if (file_exists($p_image->image)) {
            unlink($p_image->image);
        }
     
        product_image::where('id', $id)->delete();

        $notification=array(
            'messege'   =>'Product Image Deleted Successfully!!',
            'alert-type'=>'error'
        );

      
        return redirect()->back()->with($notification);

    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {

      if($request->product_id)
      {
       for($i=0;$i<count($request->product_id);$i++)
       {
         $datadel=  DB::table('product_images')->where('product_id',$request->product_id[$i])->get();

         if ($datadel) {
           foreach($datadel as $dele)
           {
            $path= base_path().'/public/productImage/'.$dele->image;
            if(file_exists($path)){
              unlink($path);
            }  
          }

        }
        $delt = offer_setup::where('product_id',$request->product_id[$i])->delete(); 
        $delt = product_size::where('product_id',$request->product_id[$i])->delete(); 
        $delt = product_color::where('product_id',$request->product_id[$i])->delete();
        $del=  DB::table('product_images')->where('product_id',$request->product_id[$i])->delete(); 
        $delt = product_info::find($request->product_id[$i])->delete(); 

      }

      $notification=array(
        'messege'   =>'Product Delete Successfull',
        'alert-type'=>'error'
      );
    }
    else
    {

      $notification=array(
        'messege'   =>'Select Minimum one Product!!',
        'alert-type'=>'warning'
      );
    }


    return redirect()->back()->with($notification); 
  } 

  public function categorylist(Request $request)
  {
    echo "<option>Select Category</option>";

    $search = DB::table('product_category')->where('item_id',$request->id)->get();
    foreach ($search as $data) 
    {
      echo "<option value=".$data->id.">".$data->category_name."</option>";
    }



  }

  public function subcategorylist(Request $request)
  {
    echo "<option>Select subCategory</option>";

    $search = DB::table('product_subcategory')->where('category_id',$request->id)->get();
    foreach ($search as $data) 
    {
      echo "<option value=".$data->id.">".$data->subcategory_name."</option>";
    }



  }

  public function Search_product(Request $request)
  {



    $search = DB::table('product_productinfo')
    ->join('product_item','product_item.id','product_productinfo.item_id')
    ->join('product_category','product_category.id','product_productinfo.category_id')
    ->join('product_company','product_company.id','product_productinfo.brand_id')
    ->where('product_productinfo.product_name','LIKE','%'.$request->search.'%')
    ->Orwhere('product_productinfo.product_id', 'like', '%' . $request->search . '%')
    ->Orwhere('product_company.company_name', 'like', '%' . $request->search . '%')
    ->Orwhere('product_item.item_name', 'like', '%' . $request->search . '%')
    ->Orwhere('product_category.category_name', 'like', '%' . $request->search . '%')
    ->where('product_productinfo.status','1')
    ->select('product_productinfo.*')
    ->paginate(5);

    return view('User.searchresult',compact('search'));

  }

  public function brandwisesearch(Request $request)
  {

    $brand_id=$request->id;
    for ($i=0; $i <count($brand_id) ; $i++) { 

      $search = DB::table('product_productinfo')
      ->where('brand_id',$brand_id[$i])
      ->get();

    }

    return view('User.Searchview',compact('search'));

  }
  public function pricewisesearch(Request $request)
  {
    $c = $request->id;

    if ($c == '1') 
    {
      $search = DB::table('product_productinfo')
      ->where('current_price','<','1000')
      ->get();

    }
    else if($c == '2')

    {

     $search = DB::table('product_productinfo')
     ->where('current_price','>','1000')
     ->get();
   }


   return view('User.Searchview',compact('search'));

 }
 public function sizewisesearch(Request $request)
 {

  $t=$request->id;
  for ($i=0; $i <count($t) ; $i++) { 
    $search = DB::table('product_productinfo')
    ->join('product_size','product_size.product_id','product_productinfo.id')
    ->where('product_size.size',$t[$i])
    ->select('product_productinfo.*')
    ->get();
  }

  return view('User.Searchview',compact('search'));

}
public function colorwisesearch(Request $request)
{

  $t=$request->id;
  for ($i=0; $i <count($t) ; $i++) { 
    $search = DB::table('product_productinfo')
    ->join('product_color','product_color.product_id','product_productinfo.id')
    ->where('product_color.color',$t[$i])
    ->select('product_productinfo.*')
    ->get();
  }


  return view('User.Searchview',compact('search'));

}


     // Item

public function brandwisesearch_item(Request $request)
{

  $brand_id=$request->id;
  for ($i=0; $i <count($brand_id) ; $i++) { 

    $search = DB::table('product_productinfo')
    ->where('brand_id',$brand_id[$i])
    ->where('item_id',$request->item_id)
    ->select('product_productinfo.*')
    ->get();

  }

  return view('User.Searchview',compact('search'));

}


public function pricewisesearch_item(Request $request)
{
  $c = $request->id;

  if ($c == '1') 
  {
    $search = DB::table('product_productinfo')
    ->where('current_price','<','1000')
    ->where('item_id',$request->category_id)
    ->select('product_productinfo.*')
    ->get();
    
  }
  else if($c == '2')

  {

   $search = DB::table('product_productinfo')
   ->where('current_price','>=','1000')
   ->where('item_id',$request->item_id)
   ->get();
 }


 return view('User.Searchview',compact('search'));

}

public function sizewisesearch_item(Request $request)
{

  $t=$request->id;
  for ($i=0; $i <count($t) ; $i++) { 
    $search = DB::table('product_productinfo')
    ->join('product_size','product_size.product_id','product_productinfo.id')
    ->where('product_size.size',$t[$i])
    ->where('item_id',$request->item_id)
    ->select('product_productinfo.*')
    ->get();
  }

  return view('User.Searchview',compact('search'));

}

public function colorwisesearch_item(Request $request)
{

  $t=$request->id;
  for ($i=0; $i <count($t) ; $i++) 
  { 
    $search = DB::table('product_productinfo')
    ->join('product_color','product_color.product_id','product_productinfo.id')
    ->where('product_color.color',$t[$i])
    ->where('item_id',$request->item_id)
    ->select('product_productinfo.*')
    ->get();
  }


  return view('User.Searchview',compact('search'));

}

 // Category

public function brandwisesearch_category(Request $request)
{

  $brand_id=$request->id;
  for ($i=0; $i <count($brand_id) ; $i++) { 

    $search = DB::table('product_productinfo')
    ->where('brand_id',$brand_id[$i])
    ->where('category_id',$request->category_id)
    ->select('product_productinfo.*')
    ->get();

  }

  return view('User.Searchview',compact('search'));

}


public function brandwisesearch_categorys(Request $request)
{

  $brand_id=$request->id;
  for ($i=0; $i <count($brand_id) ; $i++) { 

    $search = DB::table('product_productinfo')
    ->where('product_productinfo.discount_per','>',0)
    ->where('brand_id',$brand_id[$i])
    ->where('category_id',$request->category_id)
    ->select('product_productinfo.*')
    ->get();

  }

  return view('User.Searchview',compact('search'));

}


public function pricewisesearch_category(Request $request)
{
  $c = $request->id;

  if ($c == '1') 
  {
    $search = DB::table('product_productinfo')
    ->where('current_price','<','1000')
    ->where('category_id',$request->category_id)
    ->select('product_productinfo.*')
    ->get();
    
  }
  else if($c == '2')

  {

   $search = DB::table('product_productinfo')
   ->where('current_price','>=','1000')
   ->where('category_id',$request->category_id)
   ->get();
 }


 return view('User.Searchview',compact('search'));

}

public function sizewisesearch_category(Request $request)
{

  $t=$request->id;
  for ($i=0; $i <count($t) ; $i++) { 
    $search = DB::table('product_productinfo')
    ->join('product_size','product_size.product_id','product_productinfo.id')
    ->where('product_size.size',$t[$i])
    ->where('category_id',$request->category_id)
    ->select('product_productinfo.*')
    ->get();
  }

  return view('User.Searchview',compact('search'));

}

public function colorwisesearch_category(Request $request)
{

  $t=$request->id;
  for ($i=0; $i <count($t) ; $i++) 
  { 
    $search = DB::table('product_productinfo')
    ->join('product_color','product_color.product_id','product_productinfo.id')
    ->where('product_color.color',$t[$i])
    ->where('category_id',$request->category_id)
    ->select('product_productinfo.*')
    ->get();
  }


  return view('User.Searchview',compact('search'));

}



// Sub Category

public function brandwisesearch_subcategory(Request $request)
{

  $brand_id=$request->id;
  for ($i=0; $i <count($brand_id) ; $i++) { 

    $search = DB::table('product_productinfo')
    ->where('brand_id',$brand_id[$i])
    ->where('subcategory_id',$request->subcategory_id)
    ->get();

  }

  return view('User.Searchview',compact('search'));

}


public function pricewisesearch_subcategory(Request $request)
{
  $c = $request->id;

  if ($c == '1') 
  {
    $search = DB::table('product_productinfo')
    ->where('current_price','<','1000')
    ->where('subcategory_id',$request->subcategory_id)
    ->get();
    
  }
  else if($c == '2')

  {

   $search = DB::table('product_productinfo')
   ->where('current_price','>=','1000')
   ->where('subcategory_id',$request->subcategory_id)
   ->get();
 }


 return view('User.Searchview',compact('search'));

}

public function sizewisesearch_subcategory(Request $request)
{

  $t=$request->id;
  for ($i=0; $i <count($t) ; $i++) { 
    $search = DB::table('product_productinfo')
    ->join('product_size','product_size.product_id','product_productinfo.id')
    ->where('product_size.size',$t[$i])
    ->where('subcategory_id',$request->subcategory_id)
    ->select('product_productinfo.*')
    ->get();
  }

  return view('User.Searchview',compact('search'));

}

public function colorwisesearch_subcategory(Request $request)
{

  $t=$request->id;
  for ($i=0; $i <count($t) ; $i++) 
  { 
    $search = DB::table('product_productinfo')
    ->join('product_color','product_color.product_id','product_productinfo.id')
    ->where('product_color.color',$t[$i])
    ->where('subcategory_id',$request->subcategory_id)
    ->select('product_productinfo.*')
    ->get();
  }


  return view('User.Searchview',compact('search'));

}



// Brand Wise

public function brandwisesearch_brand(Request $request)
{

  $brand_id=$request->id;
  for ($i=0; $i <count($brand_id) ; $i++) { 

    $search = DB::table('product_productinfo')
    ->where('brand_id',$brand_id[$i])
    ->get();

  }

  return view('User.Searchview',compact('search'));

}


public function pricewisesearch_brand(Request $request)
{
  $c = $request->id;

  if ($c == '1') 
  {
    $search = DB::table('product_productinfo')
    ->where('current_price','<','1000')
    ->where('brand_id',$request->brand_id)
    ->get();
    
  }
  else if($c == '2')

  {

   $search = DB::table('product_productinfo')
   ->where('current_price','>=','1000')
   ->where('brand_id',$request->brand_id)
   ->get();
 }


 return view('User.Searchview',compact('search'));

}

public function sizewisesearch_brand(Request $request)
{

  $t=$request->id;
  for ($i=0; $i <count($t) ; $i++) { 
    $search = DB::table('product_productinfo')
    ->join('product_size','product_size.product_id','product_productinfo.id')
    ->where('product_size.size',$t[$i])
    ->where('brand_id',$request->brand_id)
    ->select('product_productinfo.*')
    ->get();
  }

  return view('User.Searchview',compact('search'));

}

public function colorwisesearch_brand(Request $request)
{

  $t=$request->id;
  for ($i=0; $i <count($t) ; $i++) 
  { 
    $search = DB::table('product_productinfo')
    ->join('product_color','product_color.product_id','product_productinfo.id')
    ->where('product_color.color',$t[$i])
    ->where('brand_id',$request->brand_id)
    ->select('product_productinfo.*')
    ->get();
  }


  return view('User.Searchview',compact('search'));

}





public function product_image()
{
  $product = product_info::all();
  return view('Admin.product.image',compact('product'));
}

public function multiimage(Request $request)
{

  if ($request->product_id !="") 
  {
       // dd($request->file());
    $this->validate($request, [
      'filenames' => 'required',
    ]);
    $file = $request->file('filenames');
    if($file)
    {
     for ($i=0; $i < count($file) ; $i++) 
     {
      $name[$i] = rand().'.'.$file[$i]->extension();
      $file[$i]->move(public_path().'/productImage/', $name[$i]);  


      DB::table('product_images')->insert([
        'product_id'=>$request->product_id,
        'image'=>$name[$i],
      ]);
    }
  }




  return back()->with('success', 'Data Your files has been successfully added');
}


}


public function productstatusactive($id)
{
  DB::table('product_productinfo')->where('id',$id)->update(['status'=>'1']);
  return back()->with('success', 'product approval');
}
public function productstatusinactive($id)
{
  DB::table('product_productinfo')->where('id',$id)->update(['status'=>'0']);
  return back()->with('success', 'product pending');
}


public function getProduct(Request $request)
{
  echo "<option>Select Product</option>";

  $search = DB::table('product_productinfo')->where('subcategory_id',$request->id)->get();
  foreach ($search as $data) 
  {
    echo "<option value=".$data->id.">".$data->product_name."(".$data->product_id.")</option>";
  }



}

public function productdetails(Request $request)
{
 $search = product_info::where('product_id',$request->product_code)->first();
 $product_item = product_item::where('id',$search->item_id)->first();

 return response()->json([
   'item_name'=>$search->item->item_name,
   'item_id'=>$search->item_id,
   'product_item'=>$product_item->item_name,
   'category_name'=>$search->category->category_name,
   'category_id'=>$search->category_id,
   'subcategory_id'=>$search->subcategory_id,
   'product_name'=>$search->product_name,
   'product_id'=>$search->id,
   'image'=>'https://buynfeel.com/public/productImage/'.$search->image,
   'sale_price'=>$search->sale_price,
   'discount_per'=>$search->discount_per,
   'discount_price'=>$search->discount_price,
   'current_price'=>$search->current_price
 ]);
}


public function productstock(){

  $iteminfo = product_item::all();
  $size = product_size_info::all();
  $color = product_color_info::all();
  return view('Admin.product.productstock',compact('iteminfo','size','color'));
}



public function addproductstock(Request $request){
        // return count($request->color);
  if($request->qun !='' && $request->color !='' && $request->size !='')
  {

   if($request->color)
   {
    for ($j=0; $j <count($request->color) ; $j++) 
    { 

     DB::table('productstocks')->insert([
      'product_id'  =>$request->product_id,
      'size'  =>$request->size[$j],
      'color'  =>$request->color[$j],
      'quentity'    =>$request->qun[$j],
      'date'        =>date('d/m/Y'),
    ]);


     $insertcolor =DB::table('product_color')
     ->insert([
      'product_id'=>$request->product_id,
      'color'=>$request->color[$j],
      'status'=>'1',
    ]);
   }

   for ($i=0; $i <count($request->size) ; $i++) 
   { 
    $insertsize =DB::table('product_size')
    ->insert([
      'product_id'=>$request->product_id,
      'size'=>$request->size[$i],
      'status'=>'1',
    ]);




  }
}


//             for($i=0;$i<count($request->color);$i++)
//             {
//                 $check = DB::table('productstocks')
//         ->where('product_id',$request->product_code)
//         ->where('size',$request->size)
//         ->where('color',$request->color[$i])
//         ->sum('quentity');

//         if($check)
//         {
//             $data = array();
// 		$data['product_id']             = $request->product_id	;
// 		$data['size']                   = $request->size;
// 		$data['color']                  = $request->color[$i];
// 		$data['quentity']               = $request->quentity;
// 		$data['date']                   = date('d/m/Y');

// 		$update = DB::table('productstocks')
//         ->where('product_id',$request->product_id)
//         ->where('size',$request->size)
//         ->where('color',$request->color[$i])
//         ->update(['quentity'=>$check+$request->quentity]);

// 			$notification=array(
// 			'messege'   =>'Stock update Successfull',
// 			'alert-type'=>'warning'
// 		);
// // 		return redirect()->back()->with($notification);
//         }
//         else
//         {
//         $data = array();
// 		$data['product_id']             = $request->product_id	;
// 		$data['size']                   = $request->size;
// 		$data['color']                  = $request->color[$i];
// 		$data['quentity']               = $request->quentity;
// 		$data['date']                   = date('d/m/Y');


// 		DB::table('productstocks')->insert($data);
//         }



$notification=array(
 'messege'   =>'Stock Added Successfull',
 'alert-type'=>'success'
);

//             }
return redirect()->back()->with($notification);
}
else
{
 $notification=array(
   'messege'   =>'select size,color.quantity',
   'alert-type'=>'success'
 );
 return redirect()->back()->with($notification);
}


}


public function viewproductstock()
{

  $view = DB::table('productstocks')
  ->join('product_productinfo','product_productinfo.id','productstocks.product_id')
  ->select('productstocks.*','product_productinfo.product_name')
  ->get();
  return view('Admin.product.viewproductstock',compact('view'));
}





public function deletestock($id){

  DB::table('productstocks')->where('id',$id)->delete();
  $notification=array(
   'messege'   =>'Stock Delete Successfull',
   'alert-type'=>'info'
 );
  return Redirect()->back()->with($notification);	

}

public function editstock($id){

 $view = DB::table('productstocks')->where('id',$id)->first();
 return view('Admin.product.editproductstock',compact('view'));

}


public function updateproductstock(Request $request,$id){

  $data = array();
  $data['product_id']             = $request->product_id	;
  $data['size']                   = $request->size	;
  $data['color']                  = $request->color	;
  $data['quentity']               = $request->quentity;
  $data['date']                   = date('d/m/Y');


  DB::table('productstocks')->where('id',$id)->update($data);
  $notification=array(
   'messege'   =>'Stock Update Successfull',
   'alert-type'=>'success'
 );
  return Redirect()->back()->with($notification);	

}



public function stockreport()
{



 $view = DB::table('productstocks')
 ->join('product_productinfo','product_productinfo.id','productstocks.product_id')
 ->select(DB::raw('sum(productstocks.quentity) as stockqunt'),'productstocks.*','product_productinfo.product_name','product_productinfo.id as pro_id','product_productinfo.current_price','product_productinfo.item_id')
 ->groupBy('productstocks.product_id')
 ->get();



 return view('Admin.product.stockreport',compact('view'));
}





public function Measurementadd()
{
  return view('Admin.measurement.create');
}
public function Measurementview()
{
  $data = DB::table('product_measurement')->get();
  return view('Admin.measurement.index',compact('data'));
}

public function Measurementedit($id)
{
  $data = DB::table('product_measurement')->where('id',$id)->first();
  return view('Admin.measurement.modal',compact('data'));
}
public function Measurementdelete($id)
{

  try{
   $data = DB::table('product_measurement')->where('id',$id)->delete();

   $notification=array(
    'messege'   =>'Measurement Delete Successfull',
    'alert-type'=>'error'
  );

   return redirect()->back()->with($notification); 
 }

 catch (\Illuminate\Database\QueryException $e) {

  $notification=array(
    'messege'   =>'This Measurment cannot be deleted! because it contains the product',
    'alert-type'=>'warning'
  );

  return redirect()->back()->with($notification); 
}


}

public function Measurementinsert(Request $request)
{
 $validator = Validator::make($request->all(), [
   'measurement_type'=>'required',
 ]);

 if ($validator->fails()) 
 {
  return redirect()->back()
  ->withErrors($validator)
  ->withInput();
}

$admin_id = Auth::guard('admin')->user()->id;

DB::table('product_measurement')->insert(['measurement_type'=>$request->measurement_type,'admin_id'=>$admin_id]);

$notification=array(
  'messege'   =>'Measurement Added Successfull',
  'alert-type'=>'success'
);

return redirect()->back()->with($notification); 

}
public function Measurementupdate(Request $request,$id)
{
 $validator = Validator::make($request->all(), [
   'measurement_type'=>'required',
 ]);

 if ($validator->fails()) 
 {
  return redirect()->back()
  ->withErrors($validator)
  ->withInput();
}


DB::table('product_measurement')->where('id',$id)->update(['measurement_type'=>$request->measurement_type]);

$notification=array(
  'messege'   =>'Measurement update Successfull',
  'alert-type'=>'warning'
);

return redirect()->back()->with($notification); 

}


public function getsize(Request $request)
{
 $viewproduct = product_info::where('product_id',$request->product_code)->first(); 
 $product_size = product_size::where('product_id',$viewproduct->id)->get(); 

 foreach($product_size as $size)
 {
  echo "<li> $size->size  </li>";
}
}

public function getcolor(Request $request)
{
  $viewproduct = product_info::where('product_id',$request->product_code)->first(); 
  $product_color = product_color::where('product_id',$viewproduct->id)->get(); 

  foreach($product_color as $color)
  {
    echo "<li> $color->color  </li> ";
  }
}

public function view_review()
{
  $review = DB::table('reviews')
  ->join('product_productinfo','product_productinfo.id','reviews.product_id')
  ->join('guest','guest.id','reviews.customer_id')
  ->select('reviews.*','guest.image','product_productinfo.product_name','product_productinfo.product_id as product_code')
  ->get();

  return view('Admin.Review.index',compact('review'));
}

public function activereview($id)
{
  $review = DB::table('reviews')
  ->where('reviews.id',$id)
  ->update(['status'=>'1']);

  $notification=array(
    'messege'   =>'Active review Successfull',
    'alert-type'=>'success'
  );

  return redirect()->back()->with($notification); 
}


public function inactivereview($id)
{
  $review = DB::table('reviews')
  ->where('reviews.id',$id)
  ->update(['status'=>'0']);

  $notification=array(
    'messege'   =>'Inactive review Successfull',
    'alert-type'=>'warning'
  );

  return redirect()->back()->with($notification); 
}



public function deletereview($id)
{
  $review = DB::table('reviews')
  ->where('reviews.id',$id)
  ->delete();

  $notification=array(
    'messege'   =>'Delete review Successfull',
    'alert-type'=>'error'
  );

  return redirect()->back()->with($notification); 
}

public function all_product_report()
{

  $size = product_size::all();
  $color = product_color::all();

  $data = DB::table('product_productinfo')
  ->leftjoin('product_item','product_item.id','product_productinfo.item_id')
  ->leftjoin('product_category','product_category.id','product_productinfo.category_id')
  ->leftjoin('product_measurement','product_measurement.id','product_productinfo.measurement_type')
  ->leftjoin('product_company','product_company.id','product_productinfo.brand_id')
  ->select('product_productinfo.*','product_item.item_name','product_category.category_name','product_measurement.measurement_type as measurementName','product_company.company_name')
  ->get();


  return view('Admin.Order_system.report-all-product',compact('data','size','color'));
}

public function proload_product(Request $request)
{
  $size = product_size::all();
  $color = product_color::all();


  $seller = seller::all();

  if($request->item_id !='' && $request->category_id !='')
  {
    $data = product_info::where('item_id',$request->item_id)->where('category_id',$request->category_id)->get();
  }
  else if($request->item_id !='')
  {
    $data = product_info::where('item_id',$request->item_id)->get();
  }
  else if($request->category_id !='')
  {
    $data = product_info::where('category_id',$request->category_id)->get();
  }
  else
  {
    $data = product_info::all();
  }





  return view('Admin.product.proloadproduct',compact('data','color','size','seller'));

}
public function adminsearchproduct(Request $request){
  $size = product_size::all();
  $color = product_color::all();
  $seller = seller::all();
  $data = product_info::where('product_id',$request->product_code)->get();
  $item = product_item::all();
  $cat = product_category::all();
  return view('Admin.product.product_search_list',compact('data','color','size','seller','item','cat'));

}


public function deleteadminproduct($id){

  DB::table('product_productinfo')->where('id',$id)->delete();
  $notification=array(
    'messege'   =>'Delete Successfull',
    'alert-type'=>'error'
  );

  return redirect()->back()->with($notification); 

}




}
