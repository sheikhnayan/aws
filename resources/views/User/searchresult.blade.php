
{{-- 
<div class="d-lg-none d-sm-block">
	@if(isset($search)>0)
	<ul class="dropdown-menu"  id="tt" style="display: block;position: absolute; overflow-x: hidden;max-height:400px; overflow: scroll; width: auto; border-radius: 0px;">
		@foreach($search as $product)
		@php 
		$productname=str_replace(["%","/"," "],"-",$product->product_name)
		@endphp
		<li class="search-item" style="padding: 20px; border-bottom: 1px solid #f1f1f1;">
			<a href="{{url('product')}}/{{$productname}}/{{$product->product_id}}" style="text-decoration: none; color: #000;">
				<div class="image">
					<img src="{{asset('public/productImage')}}/{{$product->image}}" style="height:100px">
				</div><br>
				<div class="name">{{$product->product_name}}</div>
				<div class="price">{{$product->current_price}}৳</div>
			</a>
		</li>
		@endforeach
		@else
		@endif
	</div> --}}


		<div class="col-md-12 scrolling-pagination">
			@if(isset($search)>0)
			<ul class="dropdown-menu" style="display: block; position: absolute; overflow-x: hidden; max-height:350px;min-width: 39%; max-width: 100%; margin: 0 auto;">
				@foreach($search as $product)
				@php 
				$productname=str_replace(["%","/"," "],"-",$product->product_name)
				@endphp

				<div class="p-4 border-bottom">
					<div class="row">
						<div class="col-xl-auto col-lg-auto col-md-auto col-sm-auto col-2">
							<a href="{{url('product')}}/{{$productname}}/{{$product->product_id}}"><img src="{{asset('public/productImage')}}/{{$product->image}}"></a>
						</div>

						<div class="col-xl-10 col-lg-10 col-md-10 col-sm-10 col-10">
							<div class="name" style="font-size: 14px;"><a href="{{url('product')}}/{{$productname}}/{{$product->product_id}}" class="text-dark">{{$product->product_name}}</a></div>
							<div class="price font-weight-bold">{{$product->current_price}} ৳</div>
						</div>

					</div>
				</div>

				@endforeach

				@else
				@endif
			</ul>


		</div>
	

