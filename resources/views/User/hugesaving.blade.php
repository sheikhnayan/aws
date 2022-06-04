@extends('User.layouts.master')
@section('body')




<div class="col-md-12">
	<div class="container">
		<div class="row">

			<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 d-none d-lg-block"> 
				@include('User.layouts.sidmenu')
			</div><!----------End Sidebar-------->

			@if(count($data)>0)
			<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12 pb-5">


				<div class="col-md-12 mt-2 cathead">
					<strong>{{ $name }}</strong>
				</div>

				<div class="col-md-12">
					<div class="scrolling-pagination">
						<div class="row">


							@if(isset($data))
							@foreach($data as $p)
							@php 
							$productname=str_replace(["%","/"," "],"-",$p->product_name)
							@endphp

							<div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-6 mt-4">
								<div class="bg-white product p-3">
									<center>
										<a href="{{ url('product') }}/{{ $productname }}/{{ $p->product_id }}"><img src="{{ asset('public/productImage') }}/{{ $p->image }}" alt=""></a>
										<div class="text-dark fw-bold productname mt-3">{{ substr($p->product_name, 0, 30) }}<br>
											<span>৳ {{ number_format($p->current_price, 2, '.', ',') }}</span>
											@if ($p->discount_price > 0)
											<del>৳ {{ number_format($p->sale_price, 2, '.', ',') }}</del>
											@endif

										</div>
										<div class="mt-2"><button class="btn btn-success btn-sm" onclick="AddCart('{{ $p->id }}')">Add To Cart</button></div>
									</center>
								</div>
							</div>


							@endforeach
							@endif



							{{ $data->links() }}

						</div>

					</div>
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



			
		</div>
	</div>
</div>







@endsection