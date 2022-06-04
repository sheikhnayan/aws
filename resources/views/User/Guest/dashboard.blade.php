@extends('User.layouts.master')
@section('body')





<div class="col-md-12">
	<div class="container padd">
		<div class="row">


			<div class="col-xl-3 col-lg-3 col-md-4 col-sm-5 col-12 mt-4">
				@include('User.Guest.user-sidebar')
			</div>


			<div class="col-xl-9 col-lg-9 col-md-8 col-sm-7 col-12 mt-4">
				<div class="col-md-12 p-4 userdashboard">

					<strong><i class="fa fa-map-marker" aria-hidden="true"></i>&nbsp;&nbsp;Personal Information</strong><br><br>
					<table class="table table-bordered">
						<tr>
							<th>Name:</th>
							<td>{{ Auth('guest')->user()->first_name }}</td>
						</tr>

				

						<tr>
							<th>Phone:</th>
							<td>{{ Auth('guest')->user()->phone }}</td>
						</tr>

						<tr>
							<th>Email:</th>
							<td>{{ Auth('guest')->user()->email }}</td>
						</tr>

						<tr>
							<th>Address:</th>
							<td>{{ Auth('guest')->user()->address }}</td>
						</tr>


						<!-- <tr>
							<th>Vessel:</th>
							<td>{{ Auth('guest')->user()->vessel_name }}</td>
						</tr>
						
						
							<tr>
							<th>Rank:</th>
							<td>{{ Auth('guest')->user()->rank }}</td>
						</tr> -->
					</table>



					<div class="row">

						<div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 mt-4">
							<div class="dash p-3 bg-info">
								<label>{{ count($data) }}</label><br>
								<a href="">Total Order</a>
							</div>
						</div>


						<div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 mt-4">
							<div class="dash p-3 bg-danger">
								<label>{{ count($pending) }}</label><br>
								<a href="">Pending Order</a>
							</div>
						</div>



						<div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 mt-4">
							<div class="dash p-3 bg-warning">
								<label>{{ count($processing) }}</label><br>
								<a href="">Processing Order</a>
							</div>
						</div>

						<div class="col-xl-3 col-lg-6 col-md-6 col-sm-12 col-12 mt-4">
							<div class="dash p-3 bg-success">
								<label>{{ count($delivered) }}</label><br>
								<a href="">Delivered Order</a>
							</div>
						</div>

						

					</div>


					
				</div>
			</div>



		</div>
	</div>
</div><!------------End Dashboard-------------->



@endsection
