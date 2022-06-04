	<div class="col-md-12 p-0 pt-4 pb-4 userdashboard">
		<center>
			<form method="post" class="btn-submit" enctype="multipart/form-data">
				<div class="profile-pic">
					<label class="-label" for="file">
						<span class="glyphicon glyphicon-camera"></span>
						<span>Change Profile</span>
					</label>

					<input id="file" type="file" name="image" onchange="loadFile(event)"/>
					@if(Auth('guest')->user()->image)
					<img src="{{ url(Auth('guest')->user()->image) }}" id="output">
					@else
					<img src="{{ asset('public/Frontend/img/man_placeholder.png') }}" id="output">
					@endif

				</div>
				<button class="btn text-light btn-sm" id="uploadbutton" type="submit" style="box-shadow: none; background: #b90000;">Upate Profile</button><br>
				<strong>{{ Auth('guest')->user()->first_name }}</strong> <br>
				<span>Reward Points: {{ Auth('guest')->user()->reward_points ?? 0 }}</span><br>
				<hr>

			</form>
				<a href="{{URL::to('/')}}"><button class="btn btn-info btn-sm text-light">Redeem</button></a>
		</center>

		<div class="mt-4">
			<li class="@if(request()->path() == 'userdashboard') {{ 'active' }} @endif"><a href="{{ url('/userdashboard') }}"><i class="fa fa-tachometer" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;Dashboard</a></li>
			<li class="@if(request()->path() == 'allorder') {{ 'active' }} @endif"><a href="{{ url('/allorder') }}"><i class="fa fa-list-ul" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;Order Information</a></li>
			
			<li class="@if(request()->path() == 'trackorder') {{ 'active' }} @endif">
				<a href="{{ url('/trackorder') }}">
					<i class="fa  fa-solid fa-motorcycle"  aria-hidden="true"></i>
				
			</i>&nbsp;&nbsp;&nbsp;&nbsp;Track Order</a></li>

			<li class="@if(request()->path() == 'updateinformation') {{ 'active' }} @endif"><a href="{{ url('/updateinformation') }}"><i class="fa fa-user-circle-o" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;Basic Information</a></li>
			<li class="@if(request()->path() == 'changepassword') {{ 'active' }} @endif"><a href="{{ url('/changepassword') }}"><i class="fa fa-key" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;Change Password</a></li>
			<li><a href="{{ url('/') }}"><i class="fa fa-shopping-basket" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;Go To Shopping</a></li>
			<li><a href="{{url('/guest-logout')}}"><i class="fa fa-sign-out" aria-hidden="true"></i>&nbsp;&nbsp;&nbsp;&nbsp;Logout</a></li>
		</div>

	</div>





	<script type="text/javascript">
		$.ajaxSetup({
			headers: {
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			}
		});



		$(".btn-submit").submit(function(e){
			e.preventDefault();

			$.ajax({
				headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
				url:"{{ url('profilechange') }}",
				method:"POST",
				data:new FormData(this),
				dataType:'JSON',
				contentType: false,
				cache: false,
				processData: false,
				beforeSend:function(data) { 


				},

				success:function(data)
				{

					alert("Hello")


				},error: function(data) {
					
					
					UIkit.notification({
						message: '<i class="fa fa-user"></i>&nbsp;&nbsp;Profile Update Successfully Done',
						pos:     'bottom-center',
						timeout:  2000
					});

					
					
				}
			})

		});






	</script>













	<script type="text/javascript">
		var loadFile = function(event) {
			var image = document.getElementById('output');
			image.src = URL.createObjectURL(event.target.files[0]);
		};
	</script>


	<style type="text/css">
		.profile-pic {
			color: transparent;
			transition: all 0.3s ease;
			display: flex;
			justify-content: center;
			align-items: center;
			position: relative;
			transition: all 0.3s ease;
			
		}
		.profile-pic input {
			display: none;

		}
		.profile-pic img {
			position: absolute;
			object-fit: cover;
			width: 150px;
			height: 150px;
			z-index: 0;
			box-shadow: 0 1px 3px 0 rgba(0,0,0,0.1),0 1px 2px 0 rgba(0,0,0,0.06);
		}
		.profile-pic .-label {
			cursor: pointer;
			height: 150px;
			width: 150px;
		}
		.profile-pic:hover .-label {
			display: flex;
			justify-content: center;
			align-items: center;
			background-color: rgba(0, 0, 0, .4);
			z-index: 10000;
			color: #fafafa;
			transition: background-color 0.3s ease-in-out;
			border-radius: 100px;
			
		}
		.profile-pic span {
			display: inline-flex;
			padding: 0.2em;
			height: 2em;
			font-size: 13px;
			
		}

	</style>


