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

					<strong>All Orders</strong><br><br>

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

								@if($data)
								@foreach($data as $showdata)

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

								@endforeach
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
