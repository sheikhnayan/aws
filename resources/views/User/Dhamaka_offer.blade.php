@extends('User.layouts.master')

@section('body')

@php

use App\offer_setup;
@endphp

<div class="col-sm-12 col-12">
<div class="container">
    
    <div class="pt-2">
			<ul class="uk-breadcrumb">
				<li><a href="{{ url('/') }}">Home</a></li>
				<li><span>
				     @if($type === '1')
				    Discount Mela
				    @elseif($type === '2')
				     Lifestyle Mela
				    @elseif($type === '3')
				     Gadget Mela
				    @elseif($type === '4')
				     Deshi Mela
				    @endif
				    </span></li>
			</ul>
		</div>
    
</div>
</div>

<div class="col-sm-12 col-12 bg-light pb-5">
  <div class="container">
      
      	@php
      	$banner = DB::table('discount_banner')->where('id','1')->first();
      	@endphp

    
                <div style="position: relative">
                    @if($type === '1')
                 
                    	<img src="{{asset('public/offer_banner_image')}}/{{$banner->discount_mela}}" class="img-fluid" style="width:100%"><br>
                    @elseif($type === '2')
                    	<img src="{{asset('public/offer_banner_image')}}/{{$banner->life_style}}" class="img-fluid" style="width:100%"><br>
                    @elseif($type === '3')
                    	<img src="{{asset('public/offer_banner_image')}}/{{$banner->gadget_mela}}" class="img-fluid" style="width:100%"><br>
                    @elseif($type === '4')
                    	<img src="{{asset('public/offer_banner_image')}}/{{$banner->deshi_mela}}" class="img-fluid" style="width:100%"><br>
                    @endif
					@if($group_cat)
					
					@else
                    <input type="submit" value="Expired" class="btn btn-danger" style="position: absolute;top: 50%;left: 50%;">
                    @endif
				</div>
    
</div>
</div>

@if($group_cat)
@foreach($group_cat as $catdata)


<div class="col-sm-12 col-12 bg-light pb-5">
  <div class="container">
      
      	

    
               

    <div class="col-sm-12 col-12 text-md-left text-center bg-dark text-light p-2" style="">
      <center><span class="headingsection">{{$catdata->category->category_name}}</span></center>
    </div>



  <div class="col-sm-12 col-12 p-0">
    <div class="row" id="showproduct-{{$catdata->category->id}}">
    
    
                    @if($type === '1')
                 
                  @php
     
      $offer = offer_setup::orderBy('id', 'DESC')
      ->where('type', '5')
      ->where('status', '1')
      ->where('category_id',$catdata->category->id)
      ->take(6)
      ->get();
      @endphp
                    	
                    @elseif($type === '2')
                    
                     @php
     
      $offer = offer_setup::orderBy('id', 'DESC')
      ->where('type', '7')
      ->where('status', '1')
      ->where('category_id',$catdata->category->id)
      ->take(6)
      ->get();
      @endphp
                    
                    	
                    @elseif($type === '3')
                    
                     @php
     
      $offer = offer_setup::orderBy('id', 'DESC')
      ->where('type', '8')
      ->where('status', '1')
      ->where('category_id',$catdata->category->id)
      ->take(6)
      ->get();
      @endphp
                    
                    @elseif($type === '4')
                    	
                     @php
     
      $offer = offer_setup::orderBy('id', 'DESC')
      ->where('type', '9')
      ->where('status', '1')
      ->where('category_id',$catdata->category->id)
      ->take(6)
      ->get();
      @endphp	
                    	
                    @endif
      
     
      
      
      
      
      
  
        @if(isset($offer))
      @foreach($offer as $data)
      
       @php
      $productname = str_replace(["%","/"," "],"-",$data->product->product_name);
      
      @endphp
      <div class="col-lg-2 cl-md-4 col-sm-6 col-6 mt-4">
          

          <div class="overlay p-2">
           <span>{{ -intval($data->product->discount_per) }} %</span>
         </div>
        
        <div class="homeproducts">
          <center>
            <a href="{{url('product')}}/{{$productname}}/{{$data->product->product_id}}"><img src="{{asset('public/productImage')}}/{{$data->product->image}}" class="img-fluid" style="z-index:1;"></a>
          </center>

          <div>
            <a href="{{url('product')}}/{{$productname}}/{{$data->product->product_id}}">{{ substr($data->product->product_name, 0,20) }}<br>
              @if($data->product->discount_price>0)<del>TK.{{number_format($data->product->sale_price,0)}}</del>@endif&nbsp;&nbsp;<span>TK.{{number_format($data->product->current_price,0)}}</span></a>
            </div>
          </div>
        </div>
        
 
        
  
        @endforeach
        @endif



      </div>
      
      <br>
      
      <center><a href="{{ url('/offer-category') }}/{{str_replace(['%','/',' '],'-',$catdata->category->category_name)}}/{{$catdata->category->id}}/{{$type}}" class="btn btn-outline-warning" style="background:#fd5d10; color:#fff;">Show More</a></center>
    </div>

  </div>
</div><!----------End Product Slider--------->
@endforeach
@endif






@endsection
