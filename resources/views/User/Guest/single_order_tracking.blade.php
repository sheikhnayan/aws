@extends('User.layouts.master')
@section('body')



<div class="col-md-12">
	<div class="container padd">
		<div class="row">


			<div class="col-xl-3 col-lg-3 col-md-4 col-sm-12 col-12 mt-4">
				@include('User.Guest.user-sidebar')
			</div>


			<div class="col-xl-9 col-lg-9 col-md-8 col-sm-12 col-12 mt-4">
				<div class="col-md-12 p-4 userdashboard">

					<strong>Your Order</strong><br><br>

					<div class="table-responsive">
						<table id="example" class="table table-bordered table-striped">
							<thead>
								<tr>
									<th>Invoice ID</th>
									<th>Order Date</th>
									<th>Ammount</th>
									<th>Payment</th>
									<th>Status</th>
								</tr>
							</thead>


							<tbody>

								
								@if($showdata)
								<tr>
									<td><a href="{{ url('/viewinvoice/'.$showdata->session_id) }}" class="text-dark font-weight-bold">#{{ $showdata->invoice_id }}</a></td>
									<td>{{ $showdata->date }}</td>
									<td>&#2547; {{ $showdata->grand_total }}</td>
									<td>{{ $showdata->payment_type }}</td>
									@if($showdata->status == 0)
									<td><span class="orderstatus bg-info">Pending</span></td>
									@elseif($showdata->status==1)
									<td><span class="orderstatus bg-info">Processing</span></td>
									@elseif($showdata->status==5)
									<td><span class="orderstatus bg-dark">Shipping</span></td>
									@elseif($showdata->status==2)
									<td><span class="orderstatus bg-warning">On the way</span></td>
									@elseif($showdata->status==3)
									<td><span class="orderstatus bg-success">Complete</span></td>
									@elseif($showdata->status==6)
									<td><span class="orderstatus bg-warning">Refound</span></td>
									@elseif($showdata->status==4)
									<td><span class="orderstatus bg-danger">Reject</span></td>

									@else
									<td><span class="orderstatus bg-danger">Failed</span></td>
									@endif
								</tr>

								<tr>
									<td colspan="5" class="text-center">
										<h1 class="mt-5 mb-5">

										@if($showdata->status == 0)
										<strong class="orderstatus bg-info"> Your order is pending</strong>
										@elseif($showdata->status==1)
										<strong class="orderstatus bg-info">Your order is Processing</strong>
										@elseif($showdata->status==5)
										<strong class="orderstatus bg-dark">Your order is Shipping</strong>
										@elseif($showdata->status==2)
										<strong class="orderstatus bg-warning">Your order is On the way</strong>
										@elseif($showdata->status==3)
										<strong class="orderstatus bg-success">Your order is Complete</strong>
										@elseif($showdata->status==6)
										<strong class="orderstatus bg-warning">Your order is Refound</strong>
										@elseif($showdata->status==4)
										<strong class="orderstatus bg-danger">Your order is Reject</strong>

										@else
										<strong class="orderstatus bg-danger">Your order is Failed</strong>
										@endif

										</h1>
									</td>
								</tr>

								@else
								<tr>
									<td>No order found</td>
								</tr>
								@endif
								
							</tbody>


						</table>
					</div>



				</div>
			</div>







		</div>
	</div>
</div><!------------End Dashboard-------------->


@endsection
