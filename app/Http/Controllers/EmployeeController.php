<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Employee;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::get();
        return view('Admin.employee.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.employee.create');
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
            'name' => 'required',
            'designation' => 'required',
            'phone' => 'required | unique:employees',
            'email' => 'required | unique:employees',
            'address' => 'required',
            'status' => 'required',
        ]);

        $data = new Employee();
        $data->name = $request->name;
        $data->designation = $request->designation;
        $data->phone = $request->phone;
        $data->email = $request->email;
        $data->address = $request->address;
        $data->status = $request->status;
        $data->save();

        $notification = array(
            'messege'   => 'Save Successfull',
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
        $data = Employee::findOrFail($id);
        return view('Admin.employee.edit', compact('data'));
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
        $data = Employee::findOrFail($id);
        $data->name = $request->name;
        $data->designation = $request->designation;
        $data->phone = $request->phone;
        $data->email = $request->email;
        $data->address = $request->address;
        $data->status = $request->status;
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
        $data = Employee::findOrFail($id);
        $data->delete();

        $notification = array(
            'messege'   => 'Deleted Successfull',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}
