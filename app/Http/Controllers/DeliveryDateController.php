<?php

namespace App\Http\Controllers;
use App\holyday;
use DB;
use Illuminate\Http\Request;
class DeliveryDateController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      $data = holyday::all();
    return view('Admin.delivery_date.add_holyday',compact('data'));
  }
  public function add(Request $request){
      
        
        
        holyday::create($request->except('_token'));
        return redirect('add-holyday');
  }
  public function deleteholyday(Request $request){

        holyday::find($request->id)->delete();
        
        
  }
  public function updateholyday($id){
        $data = holyday::find($id);
        return view('Admin.delivery_date.edit_holyday',compact('data'));
        
  }
  public function insertholyday(Request $request){

        $holyday = holyday::find($request->id);
        $holyday->title = $request->title;
        $holyday->date = $request->date;
        $holyday->save();

        return redirect('add-holyday');
        
  }
}
