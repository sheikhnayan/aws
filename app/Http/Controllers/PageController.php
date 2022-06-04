<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\PageCategory;
use App\Page;
use Str;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = Page::get();
        return view('Admin.page.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = PageCategory::where('status', 1)->get();
        return view('Admin.page.create', compact('categories'));
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
            'title' => 'required | unique:pages',
            'page_category_id' => 'required',
            'description' => 'required',
            'status' => 'required',
        ]);

        $data = new Page();
        $data->page_category_id = $request->page_category_id;
        $data->title = $request->title;
        $data->slug = Str::slug($request->title);
        $data->description = $request->description;
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
        $page = Page::findOrFail($id);
        $categories = PageCategory::where('status', 1)->get();
        return view('Admin.page.edit', compact('categories', 'page'));
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
        $data = Page::findOrFail($id);
        $data->page_category_id = $request->page_category_id;
        $data->title = $request->title;
        $data->slug = Str::slug($request->title);
        $data->description = $request->description;
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
        $data = Page::findOrFail($id);
        $data->delete();

        $notification = array(
            'messege'   => 'Delete Successfull',
            'alert-type' => 'error'
        );
        return redirect()->back()->with($notification);
    }
}
