<div class="sidemenu p-0 bg-white mt-2">
	<ul class="uk-nav-parent-icon" uk-nav duration='800'>

		@php
		$item = DB::table('product_item')->orderBy('sl','ASC')->get();
		$category = DB::table('product_category')->get();
		@endphp

		@if(isset($item))
		@foreach($item as $i)
		@php 
		$item_name=str_replace(" ","-",$i->item_name)
		@endphp

		<li class="uk-parent">
			<a href="{{url('item')}}/{{$item_name}}/{{$i->id}}"><img src="{{ asset('public/itemImage') }}/{{ $i->image }}" class="img-fluid">&nbsp;&nbsp;{{ $i->item_name }}</a>
			<ul class="uk-nav-sub" hidden>
				@if(isset($category))
				@foreach($category as $cat)
				@if($cat->item_id == $i->id)
				@php 
				$category_name=str_replace(" ","-",$cat->category_name)
				@endphp
				<li><a href="{{url('category')}}/{{$category_name}}/{{$cat->id}}">{{ $cat->category_name }}</a></li>
				@endif
				@endforeach
				@endif
			</ul>
		</li>

		@endforeach
		@endif


		<!--<li><a href="{{ url('hugesaving') }}"><img src="{{ asset('public/fontdev/') }}/img/i1.webp" class="img-fluid">&nbsp;&nbsp;Huge Saving</a></li>-->
		<!--<li><a href="{{ url('ordersavemore') }}"><img src="{{ asset('public/fontdev/') }}/img/i2.webp" class="img-fluid">&nbsp;&nbsp;Order more save more</a></li>-->
		<!--<li><a href="{{ url('dicountoffer') }}"><img src="{{ asset('public/fontdev/') }}/img/i3.webp" class="img-fluid">&nbsp;&nbsp;Special Discount </a></li>-->
		<!--<li><a href="{{ url('buyget') }}"><img src="{{ asset('public/fontdev/') }}/img/i4.webp" class="img-fluid">&nbsp;&nbsp;Buy 1 get 1 offers</a></li>-->
		<!--<li><a href="{{ url('specialservices') }}"><img src="{{ asset('public/fontdev/') }}/img/i10.webp" class="img-fluid">&nbsp;&nbsp;Our special discount  offers</a></li>-->

	</ul>
</div>
