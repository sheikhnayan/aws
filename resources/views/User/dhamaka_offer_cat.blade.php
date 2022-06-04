@extends('User.layouts.master')

@section('body')


<div class="col-sm-12 col-12 mt-4 mb-4">
	<div class="container">
		<div class="row">

			<div class="col-lg-12 col-md-12 col-sm-12 col-12">

				<div>
 	@php
      	$banner = DB::table('discount_banner')->where('id','1')->first();
      	@endphp
					 @if($type === '1')
                    	<img src="{{asset('public/offer_banner_image')}}/{{$banner->discount_mela}}" class="img-fluid" style="width:100%"><br>
                    @elseif($type === '2')
                    	<img src="{{asset('public/offer_banner_image')}}/{{$banner->life_style}}" class="img-fluid" style="width:100%"><br>
                    @elseif($type === '3')
                    	<img src="{{asset('public/offer_banner_image')}}/{{$banner->gadget_mela}}" class="img-fluid" style="width:100%"><br>
                    @elseif($type === '4')
                    	<img src="{{asset('public/offer_banner_image')}}/{{$banner->deshi_mela}}" class="img-fluid" style="width:100%"><br>
                    @endif
					<ul class="uk-breadcrumb">
						<li><a href="{{ url('/') }}">
						    @if($type === '1')
                    	Discount Mela
                    @elseif($type === '2')
                    Lifestyle Mela
                    @elseif($type === '3')
                    	Gadget Mela
                    @elseif($type === '4')
                    	Deshi Mela
                    @endif Offer</a></li>
						<li><span>{{$shop[0]->category->category_name}}</span></li>
					</ul>
				</div>



               
@if($brand)
@foreach($brand as $branddata)
    <div class="col-sm-12 col-12 text-md-left text-center bg-dark text-light p-2" style="">
      <center><span class="headingsection">{{$branddata->company_name}}</span></center>
    </div>
				<div class="col-sm-12 col-12 pa">
					<div class="row" >


						@if(isset($shop))
						@foreach($shop as $offer)
						@if($offer->product->brand_id == $branddata->brand_id)
						@php 
						$productname=str_replace(["%","/"," "],"-",$offer->product->product_name)
						@endphp
						<div class="col-lg-2 cl-md-2 col-sm-6 col-6 mt-4">
						    
						    			    
						        @if($offer->product->discount_per>0)
          
          <div class="overlay p-2">
           <span>{{ -intval($offer->product->discount_per) }} %</span>
         </div>
         
         @endif
						    
						    
						    
							 <div class="homeproducts border">
								<center>
									<a href="{{url('product')}}/{{$productname}}/{{$offer->product->product_id}}"><img src="{{asset('public/productImage')}}/{{$offer->product->image}}" class="img-fluid" style=""></a>
								</center>




								<div>
									<a href="{{url('product')}}/{{$productname}}/{{$offer->product->product_id}}"><center>{{ $offer->product->product_name }}<br>
										<span>@if($offer->product->discount_price>0)<del>TK.{{number_format($offer->product->sale_price,0)}}</del>@endif&nbsp;&nbsp;TK.{{number_format($offer->product->current_price,0)}}</span></center></a>
									</div>
								</div>
							</div>



							@endif
							@endforeach
							@endif

						</div>
					</div>

							@endforeach
							@endif

				</div>
			</div>
		</div>
	</div>




	@endsection

