@extends('User.layouts.master')
@section('body')




<div class="col-md-12 pt-3 pb-2 bg-white">
	<div class="container">

		<div>
			<ul class="uk-breadcrumb">
				<li><a href="{{ url('/') }}">Home</a></li>
				<li><span>{{$brandinfo->company_name}}</span></li>
			</ul>
		</div>


	</div>
</div>





<div class="col-md-12">
	<div class="container">
		<div class="row">

			<div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-12 mt-4">
				<div class="list-group">
					<a href="" class="list-group-item list-group-item-action active bg-dark border-0 text-uppercase">
						All Brands
					</a>
					<div style="height: 100vh; overflow: auto; background: #fff;">
						@if($brand)
						@foreach($brand as $brandinfo)
						<a href="{{ url('brand-product-info') }}/{{ str_replace(' ', '', $brandinfo->company_name) }}/{{ $brandinfo->id }}" class="list-group-item list-group-item-action">{{ $brandinfo->company_name }}</a>
						@endforeach
						@endif

					</div>

				</div>
			</div>



			@if(count($product_cat)>0)
			<div class="col-xl-9 col-lg-9 col-md-8 col-sm-12 col-12">
				<div class="scrolling-pagination">
					<div class="row">

						
						@foreach($product_cat as $s)
						@php 
						$productname=str_replace(["%","/"," "],"-",$s->product_name)
						@endphp

						<div class="col-xl-3 col-lg-4 col-md-6 col-sm-4 col-6 mt-4">
							
							@if($s->discount_per>0)
							<div class="overlay p-2">
								<span>{{ -intval($s->discount_per) }} %</span>
							</div>
							@endif


							<div class="products2">
								<a href="{{url('product')}}/{{$productname}}/{{$s->product_id}}">
									<center><img class="img-fluid" src="{{asset('public/productImage')}}/{{$s->image}}"></center>
									<br>
									{{ substr($s->product_name, 0,50) }}...<br>
									<strong>&#2547;&nbsp;{{$s->current_price}}</strong>
									&nbsp;
									<del>&#2547;&nbsp;{{$s->sale_price}}</del>
								</a>
							</div>
						</div>


						@endforeach
						

					</div>

					{{ $product_cat->links() }}
				</div>


			</div>

			@else

			<div class="col-xl-9 col-lg-9 col-md-8 col-sm-12 col-12 pt-5">
				<div class="container padd">

					<center><img src="{{ asset('public/Frontend/img/no-order.svg') }}" class="img-fluid"><br>
						<strong class="text-dark">Product Not Found</strong>
					</center>

				</div>
			</div>


			@endif




		</div><!--------------End Sellers Product's--------------------->

	</div>
</div>





@endsection