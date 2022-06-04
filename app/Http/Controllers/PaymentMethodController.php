<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PaymentMethod;
use Str;
use Image;

class PaymentMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $methods = PaymentMethod::get();
        return view('Admin.paymentmethod.index', compact('methods'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.paymentmethod.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required| unique:payment_methods',
            'account_holder_name' => 'required',
            'account_number' => 'required',
            'account_type' => 'required',
            'image' => 'required',
            'status' => 'required',
        ]);
        $data = new PaymentMethod();
        $data->name = $request->name;
        $data->account_holder_name = $request->account_holder_name;
        $data->account_number = $request->account_number;
        $data->account_type = $request->account_type;
        $data->status = $request->status;
        $image = $request->file('image');
        if($image)
        {
            $image_name= str::random(10);
            $orginalExtension = $image->getClientOriginalExtension();
            $image_full_name = $image_name.'.'.$orginalExtension;
            $upload_path = public_path('/PaymentMethodImage/');
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            $img = Image::make($image_url)->resize(50, 50)->save();
            if($success)
            {
                $data->image = $image_full_name;
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
        $data = PaymentMethod::findOrFail($id);

        return view('Admin.paymentmethod.edit', compact('data'));
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
        $data = PaymentMethod::findOrFail($id);
        $data->name = $request->name;
        $data->account_holder_name = $request->account_holder_name;
        $data->account_number = $request->account_number;
        $data->account_type = $request->account_type;
        $data->status = $request->status;
        $image = $request->file('image');
        if($image)
        {
            $image_name= str::random(10);
            $orginalExtension = $image->getClientOriginalExtension();
            $image_full_name = $image_name.'.'.$orginalExtension;
            $upload_path = public_path('/PaymentMethodImage/');
            $image_url = $upload_path.$image_full_name;
            $success = $image->move($upload_path, $image_full_name);
            $img = Image::make($image_url)->resize(50, 50)->save();
            if($success)
            {
                $data->image = $image_full_name;
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
        $data = PaymentMethod::findOrFail($id);
        $data->delete();
        $notification = array(
            'messege'   => 'Deleted Successfull',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}
