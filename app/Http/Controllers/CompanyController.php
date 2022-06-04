<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\product_company;
use Validator;
use DB;
class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $data=product_company::all();
       return view('Admin.company.index',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.company.create');
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
          'brand_name' => 'required',
        ]);

        if ($validator->fails()) {
          return redirect()->back()
                   ->withErrors($validator)
                   ->withInput();
        }

       
        $insert = array(
            'sl' => $request->sl, 
            'company_name' => $request->brand_name, 
            'home_show' => $request->home_show, 
            'status' => $request->status, 
            'admin_id' => $request->admin_id, 
                        );


        $data = product_company::create($insert);

         $file = $request->file('image');
        if ($file) {

            $imageName =  $data->id.'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/companyImage/'),$imageName);

            DB::table('product_company')->where('id',$data->id)->update(['image'=>$imageName]);
        }
        if ($data) {

          $notification=array(
            'messege'   =>'Company Added Successfull',
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
        $data = product_company::find($id);

        return view('Admin.company.modal',compact('data'));
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
          'brand_name' => 'required',
        ]);

        if ($validator->fails()) {
          return redirect()->back()
                   ->withErrors($validator)
                   ->withInput();
        }

       
        $update = array(
            'sl' => $request->sl, 
            'company_name' => $request->brand_name, 
            'home_show' => $request->home_show, 
            'status' => $request->status,  
            'admin_id' => $request->admin_id, 
                        );


        $data = product_company::find($id)->update($update);

         $file = $request->file('image');
        if ($file) {

            $imageName =  $id.'.'.$file->getClientOriginalExtension();
            $file->move(public_path('/companyImage/'),$imageName);

            DB::table('product_company')->where('id',$id)->update(['image'=>$imageName]);
        }
        if ($data) {

          $notification=array(
            'messege'   =>'Company update Successfull',
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
         

        try {
             $data = product_company::find($id);
          
          if ($data->image) {
        $path= base_path().'/public/companyImage/'.$data->image;
            if(file_exists($path)){
                unlink($path);
            }
          }
          $delt = product_company::find($id)->delete(); 
        
                  $notification=array(
                    'messege'   =>'Company Delete Successfull',
                    'alert-type'=>'error'
                );
        
                return redirect()->back()->with($notification); 
        
        } catch (\Illuminate\Database\QueryException $e) {
            
            $notification=array(
                    'messege'   =>'This brand cannot be deleted! because it contains the product',
                    'alert-type'=>'warning'
                );
        
                return redirect()->back()->with($notification); 
        }
       
    }
}
