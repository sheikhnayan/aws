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

					<strong>Track your order</strong><br><br>

		            @include('msg.flash')
		            <form method="post" action="{{ route('tracking') }}">
		              @csrf

		              <div class="row">

		                <div class="form-group col-12 mb-3">
		                  <label><b>Invoice  ID</b> <span class="text-danger">*</span></label>
		                  <input type="number" class="form-control textfill" name="invoice_id" required="">
		                </div>
		              </div>
		              <input type="submit" value="Track" class="btn btn-danger w-100 pr-4 pl-4">
		            </form>

				</div>
			</div>







		</div>
	</div>
</div><!------------End Dashboard-------------->


@endsection
