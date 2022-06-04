
@extends('User.layouts.master')
@section('body')


@php
$date = substr($viewcart[0]->created_at,0,10);
$setting = DB::table('settings')->first();
@endphp

<div class="container">
<div class="col-md-12">

		<div class="row">


			<div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12 mt-4">
				@include('User.Guest.user-invoice')
			</div>


			<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12 mt-4">
				<div class="col-md-12 p-4 invoice">

					<strong>Invoice NO: #{{$viewcart[0]->invoice_id}} {{-- <a href="{{ url('/invoice-pdf') }}/{{$viewcart[0]->session_id}}" class="btn btn-success btn-sm float-end">Download</a> --}}</strong>

					<div class="col-md-12 col-12 p-4 mt-4 border">
						<div class="row">
							<div class="col-md-4" style="font-size: 13px;">
								<img src="{{asset('/public/siteImage')}}/{{$setting->logo}}" class="img-fluid" style="max-height: 45px;"><br>
								<div class="mt-2">
									Invoice No: #{{$viewcart[0]->invoice_id}}<br>
									Order Date: {{$date}}<br>
									Payment Status: {{$viewcart[0]->payment_type}}<br>
								</div><br>
							</div>


							<div class="col-md-8 text-left text-sm-end" >
							
							</div>

						</div>


						<center><h6 class="p-2 font-weight-bold text-uppercase">Sales Invoice</h6></center><br>
						<div class="row" style="font-size: 13px;">
							<div class="col-md-7">
								<h6 class="font-weight-bold text-uppercase">Billing</h6>
								Name: {{$viewcart[0]->guestfirstname}}&nbsp;{{$viewcart[0]->guestlastname}}<br>
								<!-- Vessel: {{$viewcart[0]->guestvessel_name}}<br>
								Rank: {{$viewcart[0]->guestrank}}<br> -->
								Phone: {{$viewcart[0]->guestphone}}
							</div>


							<div class="col-md-5">
								<h6 class="font-weight-bold text-uppercase">Shipping</h6>
								Name: {{$viewcart[0]->first_name}}&nbsp;{{$viewcart[0]->last_name}}<br>
								<!-- Vessel: {{$viewcart[0]->vessel_name}}<br>
								Rank: {{$viewcart[0]->rank}}<br> -->
								Phone: {{$viewcart[0]->phone}}<br>
								Address: {{$viewcart[0]->address}}
							</div>
						</div>


						<br>
						<div class="table-responsive">

							<table class="table table-bordered">
								<thead class="bg-dark text-light">
									<th>SL</th>
									<th>Product</th>
									<th>SKU</th>
									<th>Price</th>
									<th>QTY</th>
									<th>Amount</th>
								</thead>


								<tbody>

									@php
									$sl=1;

									$payment =  $balance->payment;
									@endphp  

									@if($payment>0)
									$payments=$payment;
									@else

									@endif

									@if(isset($viewcart))
									@foreach($viewcart as $cart)


									<tr>
										<td>{{$sl++}}</td>
										<td style="text-align: left;">
		                                    <p>{{$cart->product_name}} - <span>{{ $cart->size ?? '' }} - {{ $cart->color ?? '' }}</span>
		                                    </p>
		                                </td>
										<td>{{$cart->sku}}</td>
										<td >{{$cart->current_price}} Tk</td>
										<td>{{$cart->quantity}}</td>
										<td>{{$cart->current_price * $cart->quantity}} Tk</td>
									</tr>

									@endforeach
									@endif


								</tbody>

								<tfoot>
									<tr>
										<th colspan="3"></th>
										<th colspan="2">Sub Total</th>
										<th>{{$viewcart[0]->sub_total}} Tk</th>
									</tr>

									<tr>
										<th colspan="3"></th>
										<th colspan="2">Delivery Charge(+)</th>
										<th>{{$viewcart[0]->delivery_charge}} Tk</th>
									</tr>

									@if($viewcart[0]->coupon_id !='' && $viewcart[0]->discount>0)
									<tr>
										<th colspan="3"></th>
										<th colspan="2">Discount(-)</th>
										<th>{{$viewcart[0]->discount}} Tk</th>
									</tr>
									@endif

									@if($viewcart[0]->redeem)
									<tr>
										<th colspan="3"></th>
										<th colspan="2">Redeem(-)</th>
										<th>{{$viewcart[0]->redeem}} Tk</th>
									</tr>
									@endif

									<tr>
										<th colspan="3"></th>
										<th colspan="2">Grand Total</th>
										<th>{{$viewcart[0]->grand_total}} Tk</th>
									</tr>

							

								</tfoot>

							</table>
							
						</div>

						@if($viewcart[0]->note)
						<span style="font-weight:600; font-size:13px;"> Order Note: {{$viewcart[0]->note ?? ''}} </span>
						@endif

						<br>
						<br>
						<br>
						<center><span style="font-weight:600; font-size:13px;">[ Note: This is computer generate copy. No signature is required ]</span></center>
					</div>


				</div>
			</div>




		</div>
	</div>
</div><!------------End invoice-------------->




<style type="text/css" scoped="">

	thead{
		font-size: 14px;
	}

	tbody{
		font-size: 14px;
	}

	tfoot{
		font-size: 14px;
		white-space: nowrap;
	}
</style>





@endsection



