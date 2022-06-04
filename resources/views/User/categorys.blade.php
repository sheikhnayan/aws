@extends('User.layouts.master')

@section('body')


<div class="col-sm-12 col-12 mt-4 mb-4">
	<div class="container">
		<div class="row">

			<div class="col-lg-2 col-md-12 col-sm-12 col-12 d-none d-sm-block p-0">



				<div class="categorysidemenu bg-dark p-3">


					<h5 class="head">Subcategory&nbsp;<span uk-icon="icon:  chevron-down; ratio: 1"></span></h5>
					@if($subcategory)
					@foreach($subcategory as $cat)
					<li>
						<a href="{{url('subcategorys')}}/{{ str_replace(' ','-',$cat->subcategory_name) }}/{{$cat->id}}" class="text-light"><span uk-icon="icon: chevron-right; ratio: 1"></span>&nbsp;{{ $cat->subcategory_name }}</a>
					</li>
					@endforeach
					@endif




					<h5 class="head">SHOP BY BRAND&nbsp;<span uk-icon="icon:  chevron-down; ratio: 1"></span></h5>
					@if($brand)
					@foreach($brand as $brandinfo)
					<li><input type="radio" name="brand_id[]" id="brand_id" value="{{$brandinfo->id}}" onclick="brand_search()">&nbsp;&nbsp;{{$brandinfo->company_name}} 
					</li>
					@endforeach
					@endif

					<h5 class="head">SHOP BY PRICE&nbsp;<span uk-icon="icon:  chevron-down; ratio: 1"></span></h5>
					<li><input type="Radio" name="price"  id="price" value="1" onclick="price_search()">&nbsp;&nbsp;Tk. 0 - Tk. 1,000</li>
					<li><input type="Radio" name="price" id="price" value="2" onclick="price_search()">&nbsp;&nbsp;Tk. 1,000 and above</li>

					<h5 class="head">SHOP BY SIZE FILTER&nbsp;<span uk-icon="icon:  chevron-down; ratio: 1"></span></h5>
					@if($size)
					@foreach($size as $sizeinfo)
					<li><input type="radio" name="size[]" id="size" value="{{$sizeinfo->size}}" onclick="size_search()">&nbsp;&nbsp;{{$sizeinfo->size}}</li>
					@endforeach
					@endif
					<h5 class="head">SHOP BY COLOR FILTER&nbsp;<span uk-icon="icon:  chevron-down; ratio: 1"></span></h5>
					@if($color)
					@foreach($color as $colorinfo)
					<li><input type="radio" name="color[]" id="color" value="{{$colorinfo->color}}" onclick="color_search()">&nbsp;&nbsp;{{$colorinfo->color}}</li>
					@endforeach
					@endif
				</div>
			</div>







			<div class="col-lg-10 col-md-12 col-sm-12 col-12">

				<div>
					@if(isset($seller))
					<img src="{{asset('/public/seller')}}/{{$seller->image}}" class="img-fluid"><br>
					<ul class="uk-breadcrumb">
						<li><a href="{{ url('/') }}">Home</a></li>
						<li><span>Seller</span></li>
						<li><span>{{$seller->business_name}}</span></li>
					</ul>
					@else
					<img src="{{asset('/public/categoryImage')}}/{{$category->banner}}" class="img-fluid"><br>
					<ul class="uk-breadcrumb">
						<li><a href="{{ url('/') }}">Home</a></li>
						<li><span>{{$category->category_name}}</span></li>
					</ul>
					@endif
				</div>




				<div class="col-sm-12 col-12 pa">
					<div class="row"  id="showdata">


						@if(isset($product_cat))
						@foreach($product_cat as $s)
						@php 
						$productname=str_replace(["%","/"," "],"-",$s->product_name)
						@endphp
						<div class="col-lg-3 cl-md-4 col-sm-6 col-6 mt-4">
						    
						    			    
						        @if($s->discount_per>0)
          
          <div class="overlay p-2">
           <span>{{ -intval($s->discount_per) }} %</span>
         </div>
         
         @endif
						    
						    
						    
							 <div class="homeproducts border">
								<center>
									<a href="{{url('product')}}/{{$productname}}/{{$s->product_id}}"><img src="{{asset('public/productImage')}}/{{$s->image}}" class="img-fluid" style=""></a>
								</center>




								<div>
									<a href="{{url('product')}}/{{$productname}}/{{$s->product_id}}"><center>{{ $s->product_name }}<br>
										<span>@if($s->discount_price>0)<del>TK.{{$s->sale_price}}</del>@endif&nbsp;&nbsp;TK.{{$s->current_price}}</span></center></a>
									</div>
								</div>
							</div>



							@endforeach
							@endif


							<div class="col-sm-12 col-12 mt-5">
								{{ $product_cat->links() }}
							</div>

						</div>
					</div>


				</div>
			</div>
		</div>
	</div>




	@endsection
	<script type="text/javascript">
		function brand_search()
		{
			var category_id = $("#category_id").val();

			var id = [];
			$("#brand_id:checked").each(function(index, el) {
				id.push(this.value);
			});

			$("#brand_id:checked").change(function(){

				var id = [];
				$("#brand_id:checked").each(function(index, el) {
					id.push(this.value);
				});


				if(id != '')
				{

					$.ajax({

						headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
						url: '{{ url("brand_wise_search_categorys") }}',
						type: 'POST',
						data: {id:id,category_id:category_id},
						success: function(data)
						{
							$('#showdata').html(data);
						}
					})

				}


			});
		}



		function size_search()
		{

			var category_id = $("#category_id").val();
			var id = [];
			$("#size:checked").each(function(index, el) {
				id.push(this.value);
			});

			$("#size:checked").change(function(){

				var id = [];
				$("#size:checked").each(function(index, el) {
					id.push(this.value);
				});


				if(id != '')
				{

					$.ajax({

						headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
						url: '{{ url("size_wise_search_category") }}',
						type: 'POST',
						data: {id:id,category_id:category_id},
						success: function(data)
						{
							$('#showdata').html(data);
						}
					})

				}


			});
		}

		function color_search()
		{
			var category_id = $("#category_id").val();

			var id = [];
			$("#color:checked").each(function(index, el) {
				id.push(this.value);
			});

			$("#color:checked").change(function(){

				var id = [];
				$("#color:checked").each(function(index, el) {
					id.push(this.value);
				});


				if(id != '')
				{

					$.ajax({

						headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
						url: '{{ url("color_wise_search_category") }}',
						type: 'POST',
						data: {id:id,category_id:category_id},
						success: function(data)
						{
							$('#showdata').html(data);
						}
					})

				}


			});
		}

		function price_search()
		{

			var category_id = $("#category_id").val();
			var id = $("#price:checked").val();

			$("#price:checked").change(function(){

				var id = $("#price:checked").val();



				if(id != '')
				{

					$.ajax({

						headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
						url: '{{ url("price_wise_search_category") }}',
						type: 'POST',
						data: {id:id,category_id:category_id},
						success: function(data)
						{
							$('#showdata').html(data);
						}
					})

				}


			});
		}
	</script>
