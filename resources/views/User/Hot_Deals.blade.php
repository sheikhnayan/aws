@extends('User.layouts.master')
@section('body')


<div class="col-md-12 pt-4 pb-4 bg-white border-bottom">
	<div class="container padd">
		<div class="row">
			<div class="col-xl-9 col-lg-9 col-md-6 col-sm-6 col-12 text-sm-left text-center catheader2">
				<span>Hot Deals</span>
			</div>

			<div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 text-sm-left text-center catsearch">
				
				<form method="get" action="{{ url('/searchallproduct') }}">
			
					<div class="input-group">
						<input type="text" class="form-control" id="searchallproduct" placeholder="Search..." name="searchallproduct"  autocomplete="off" required="">
						<div class="input-group-append">
							<button class="btn" type="submit" ><i class="fa fa-search"></i></button>
						</div>
					</div>
				</form>
				
			</div>

		</div>
	</div>
</div>




<div class="col-md-12">
	<div class="container padd">

		<div class="scrolling-pagination">
			<div class="row">

				@if(isset($product_cat))
				@foreach($product_cat as $s)
				@php 
				$productname=str_replace(["%","/"," "],"-",$s->product_name)
				@endphp


				<div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6 mt-4">
					@if($s->discount_per>0)
					<div class="overlay p-2">
						<span>{{ -intval($s->discount_per) }} %</span>
					</div>

					@endif
					<div class="products2">
						<a href="{{url('product')}}/{{$productname}}/{{$s->product_id}}">
							<center><img class="img-fluid" src="{{asset('public/productImage')}}/{{$s->image}}"></center>
							<br>
							{{ substr($s->product_name, 0,45) }}...<br>
							<strong>&#2547;&nbsp;{{$s->current_price}}</strong>
							&nbsp;
							@if($s->discount_price>0)
							<del>&#2547;&nbsp;{{$s->sale_price}}</del>
							@endif
						</a>
					</div>
				</div>


				@endforeach
				@endif


			</div>

			{{ $product_cat->links() }}
		</div>
	</div>
</div><!------------End sellers-------------->




@endsection