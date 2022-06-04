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

					<strong><i class="fa fa-key" aria-hidden="true"></i>&nbsp;&nbsp;Change Password</strong><br><br>

					<form class="passreset mt-2" id="btn-submit" method="post" action="{{ url('updatepassword') }}">
						@csrf

						<div class="form-group col-md-12 mb-3">
							<label>Old Password</label>
							<input type="Password" name="old_password" autocomplete="off"  class="form-control" required="">
						</div>


						<div class="form-group col-md-12 mb-3">
							<label>New Password</label>
							<input type="Password" name="new_password" autocomplete="off"  class="form-control" minlength="8" required="">
						</div>

						<div class="form-group col-md-12 mb-3">
							<label>Confirm Password</label>
							<input type="Password" name="confirm_password" autocomplete="off"  class="form-control" minlength="8"  required="">
						</div>


						<div class="col-md-12 mt-2">
							<button type="submit" class="btn btn-dark w-100 p-2 button border-0">Change Password</button>
						</div>
					</form>



				</div>
			</div>







		</div>
	</div>
</div><!------------End Dashboard-------------->



@endsection
