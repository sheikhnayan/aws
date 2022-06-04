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

					<strong><i class="fa fa-user-circle-o" aria-hidden="true"></i>&nbsp;&nbsp;Edit Information</strong><br><br>



					<form class="row passreset" id="btn-submit" method="post">
						@csrf


						<div class="form-group col-md-12 mb-3">
							<label>First Name</label>
							<input type="text" name="first_name" autocomplete="off"  class="form-control" value="{{ Auth('guest')->user()->first_name }}">
						</div>

						<div class="form-group col-md-12 mb-3">
							<label>Email</label>
							<input type="email" name="email" autocomplete="off"  class="form-control" value="{{ Auth('guest')->user()->email }}">
						</div>


						<div class="form-group col-md-12 mb-3">
							<label>Phone Number</label>
							<input type="number" name="phone" autocomplete="off"  class="form-control" value="{{ Auth('guest')->user()->phone }}">
						</div>

						<div class="form-group col-md-12 mb-3">
							<label>Address</label>
							<input type="text" name="address" autocomplete="off"  class="form-control" value="{{ Auth('guest')->user()->address }}">
						</div>

						<!-- <div class="form-group col-md-12 mb-3">
							<label>Vessel Name</label>
							<textarea rows="1" class="form-control" name="vessel_name">{{ Auth('guest')->user()->vessel_name }}</textarea>
						</div> -->
						
						<!-- <div class="form-group col-md-12 mb-3">
							<label>Rank</label>
							    <select class="form-control textfill" name="rank">
							        <option value="{{ Auth('guest')->user()->rank }}">{{ Auth('guest')->user()->rank }}</option>
				                  <option value="Captain">Captain</option>
				                  <option value="Master">Master</option>
				                  <option value="2nd Master">2nd Master</option>
				                  <option value="Driver">Driver</option>
				                  <option value="Greaser">Greaser</option>
				                  <option value="Sokani">Sokani</option>
				                  <option value="Loskor">Loskor</option>
				                  <option value="Management">Management </option>
				                  <option value="Ship owner">Ship owner</option>
				                  <option value="Chief Engineer">Chief Engineer</option>
				                  <option value="Second Engineer">Second Engineer</option>
				                  <option value="Third Engineer">Third Engineer</option>
				                  <option value="Electrician">Electrician</option>
				                  <option value="Chief Cook">Chief Cook</option>
				              </select>
						</div> -->


						<div class="col-md-12 mt-2">
							<button type="submit" class="btn btn-dark w-100 p-2 button border-0">Update Information</button>
							<button type="button" class="btn btn-dark w-100 p-2" id="loading">Loading...</button>
						</div>
					</form>


				</div>
			</div>







		</div>
	</div>
</div><!------------End Dashboard-------------->







<script type="text/javascript">
	$.ajaxSetup({
		headers: {
			'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
		}
	});

	$('#loading').hide();
	$("#btn-submit").submit(function(e){
		e.preventDefault();
		var data = $(this).serialize();
		$.ajax({
			url:'{{ url('profileupdate') }}',
			method:'POST',
			data:data,
			beforeSend:function(response) { 

				$('#loading').show();
				$('.button').hide();

			},

			success:function(response){

				UIkit.notification({
					message: '<i class="fa fa-pencil-square" aria-hidden="true"></i>&nbsp;&nbsp;Profile Update Successfully Done',
					pos: 'bottom-center',
					timeout: 2000
				});
				$('#loading').hide();
				$('.button').show();

			},

			error:function(error){
				console.log(error)
			}
		});
	});






</script>








@endsection
