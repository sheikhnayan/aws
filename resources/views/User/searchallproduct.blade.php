@if(isset($product_cat))
@foreach($product_cat as $s)
@php 
$productname=str_replace(["%","/"," "],"-",$s->product_name)
@endphp


<div class="col-xl-2 col-lg-3 col-md-4 col-sm-6 col-6 mt-4">
	@if($s->discount_per<0)
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
			@if($s->discount_price>0)
			<del>&#2547;&nbsp;{{$s->sale_price}}</del>
			@endif
		</a>
	</div>
</div>


@endforeach
@endif

{{ $product_cat->links() }}