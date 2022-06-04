@extends('User.layouts.master')
@section('body')

<div class="col-sm-12 col-12 mt-3 pb-3">
  <div class="container p-0 bg-white p-3 border">
    <h3 class="headproducttitle">All Category</h3><hr>
    
    <div class="row">

         @if(isset($allcategory))
         @foreach($allcategory as $p)
          <div class="col-lg-3 col-md-4 col-sm-6 col-6 mt-4">
              <div class="col-sm-12 border p-3">
               <center>
                   <a href="{{url('item')}}/{{$p->item_name}}/{{$p->id}}" class="text-dark">{{ $p->item_name }}</a>
               </center>
               </div>
           </div>
         
         @endforeach
         @endif


        
    </div>



    </div>
  </div><!----------End Product Slider--------->









@endsection