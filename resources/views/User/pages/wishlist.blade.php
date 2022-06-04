@extends('User.layouts.master')
@section('body')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>



<div class="col-md-12 pt-4 pb-4 bg-white border-bottom">
	<div class="container">
		<div class="row">
			<div class="col-md-9 catheader2">
				<span><b>Wishlist</b></span>
			</div>

		</div>
	</div>
</div>


<form  id="form_file" action="{{url('/ordesystem')}}" method="post" enctype="multipart/form-data">
	@csrf

	<div class="col-md-12">
		<div class="container padd">
			<div class="row">


				<div class="col-xl-12 col-12-5 col-md-12 col-sm-12 col-12 mt-4 mb-4">
					<div class="pricesummary p-4">

						<div class="table-responsive">
							<table class="table table-bordered table-responsive" style="font-size: 13px;">
								<thead>
									<tr class="text-center">
										<th>Image</th>
										<th>Product Name</th>
										<th>Price</th>
										<th>Action</th>
									</tr>
								</thead>
								<tbody id="">
									@foreach($wishlists as $viewdata)
										<?php 
											$product = DB::table('product_productinfo')->where('id', $viewdata->product_id)->first();
											$productname=str_replace(["%","/"," "],"-", $product->product_name);
										?>
									<tr class="text-center">
										<td>
											<a href="{{ url('product') }}/{{ $productname }}/{{ $product->product_id }}">
												<img src="{{ asset('public/productImage') }}/{{ $product->image }}" alt="" style="width: 70px">
											</a>
										</td>
										<td>
											<a href="{{ url('product') }}/{{ $productname }}/{{ $product->product_id }}">
												<span class="text-dark">{{$product->product_name}}</span>
											</a>
										</td>
										<td>{{$product->current_price}} TK</td>
										<td>
											<a>

												<i class="fas fa-solid fa-trash-can text-danger"  onclick="delete_wishlist('{{$viewdata->id}}')" style="font-size: 20px; border: 1px solid;padding: 10px;"></i>

											</a>
											<a>
												<i class="fas fa-cart-plus text-success" onclick="AddCart('{{ $product->id }}')" style="font-size: 20px;border: 1px solid;padding: 10px;"></i>
											</a>
										</td>
									</tr>
									@endforeach
								</tbody>
							</table>
						</div>


					</div>
				</div>

			</div>
		</div>
	</div>


</form>


	
		
	@endsection