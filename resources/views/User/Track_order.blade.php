@extends('User.layouts.master')
@section('body')



<div class="col-lg-4 offset-lg-4 col-md-10 offset-md-1 col-sm-10 offset-sm-1 col-12 mt-5">
	<div class="col-md-12 p-4 pb-5 formback">
		<center><strong>Track Order</strong><br><span>Enter Your Track Order Number</span></center>
		<hr>

		<form method="get" action="{{ url('searchorder') }}">
			@csrf

			<div class="form-group col-md-12">
				<label>Invoice No.</label>
				<input type="Number" name="invoice_no" autocomplete="off"  class="form-control" required="">
			</div>

			<div class="col-md-12 mt-2">
				<button type="submit" class="btn btn-dark d-block w-100 p-2">Track Order</button>
			</div>
		</form>


	</div>
</div>


@endsection
