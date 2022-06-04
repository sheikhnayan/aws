<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PageCategory;
use Str;

class PageCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = PageCategory::get();
        return view('Admin.pagecategory.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Admin.pagecategory.create');
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
            'name' => 'required | unique:page_categories',
            'status' => 'required',
        ]);

        $data = new PageCategory();
        $data->name = $request->name;
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
        $data = PageCategory::findOrFail($id);
        return view('Admin.pagecategory.edit', compact('data'));
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
        $data = PageCategory::findOrFail($id);
        $data->name = $request->name;
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
        $data = PageCategory::findOrFail($id);
        $data->delete();

        $notification = array(
            'messege'   => 'Deleted Successfull',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}
