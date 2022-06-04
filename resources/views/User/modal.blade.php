<!DOCTYPE html>
<html>
<head>
	<title>Modal</title>
	<!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">-->
</head>
<body>



	<div class="modal" id="staticBackdrop" data-backdrop="static" data-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
		<div class="modal-dialog modal-lg">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="staticBackdropLabel">Login/Register</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">


					<div class="col-lg-12 col-12 mt-4">
						<div class="container">
							<ul class="nav nav-pills nav-justified " id="pills-tab" role="tablist">
								<li class="nav-item">
									<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#Sellers" role="tab" aria-controls="pills-home" aria-selected="true">Login</a>
								</li>
								<li class="nav-item">
									<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#Buyers" role="tab" aria-controls="pills-profile" aria-selected="false">Register</a>
								</li>
							</ul>

						</div>
					</div>



 @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif
					<div class="tab-content" id="pills-tabContent">
						<div class="tab-pane fade show active" id="Sellers" role="tabpanel" aria-labelledby="pills-home-tab">

							<div class="col-lg-12 col-md-12 col-sm-10 col-12 pt-4 pb-5">
								<div class="container">
									<div class="col-sm-12 col-12 p-4 bg-white loginback">
										<h5 class="text-uppercase">Login your Account</h5><hr>
										<form method="post" action="{{url('/guest-login-redirect')}}" enctype="multipart/form-data">
											@csrf
											
											<div class="row p-2">
												<div class="form-group mform col-sm-12">
													<label>Email/Mobile</label>
													<input type="text" class="form-control textfill" name="email" placeholder="Email/Mobile" required="" @if(Cookie::has('user')) value="{{Cookie::get('user')}}" @endif>
												</div>

												<div class="form-group mform col-sm-12">
													<label>Password</label>
													<input type="Password" class="form-control textfill" name="password" placeholder="Password" required="" @if(Cookie::has('password')) value="{{Cookie::get('password')}}" @endif>
												</div>
												
												<div class="form-group mform col-sm-12">
                                                     <div class="col-md-6 offset-md-4">
                                                          <div class="form-check">
                                                               <input class="form-check-input" type="checkbox" name="remember" @if(Cookie::has('user')) checked @endif>
                                                
                                                               <label class="form-check-label" for="remember">
                                                                      {{ __('Remember Me') }}
                                                               </label>
                                                          </div>
                                                      </div>
                                                  </div>

												<div class="form-group mform col-sm-12"> 
													<a href="{{ url('/forgot_password') }}" style="text-align:right">Forgot Account ?</a>
												</div>
												

												<div class="form-group mform col-sm-12">
													<center><input type="submit" value="LOGIN" class="form-control logbutton w-50" style="background:#0a0a0a;"></center>
												</div>

											</div>
										</form>


									</div>
								</div>
							</div>
						</div>



						<div class="tab-pane fade" id="Buyers" role="tabpanel" aria-labelledby="pills-profile-tab">


							<div class="col-lg-12 col-12 pt-4 pb-5">
								<div class="container">
									<div class="col-sm-12 col-12 p-4 bg-white loginback">
										<h5 class="text-uppercase">User Registation</h5><hr>
										<form method="post" action="{{route('user-Register.store')}}" enctype="multipart/form-data"> 
											@csrf
											
											<div class="row p-2">

												<div class="form-group mform col-sm-12">
													<label>Name</label>
													<input type="text" class="form-control textfill" name="first_name" placeholder="Name" required="" value="{{old('first_name')}}">
												</div>

												<!--<div class="form-group mform col-sm-6">-->
													<!--  <label>Last Name</label>-->
													<!--  <input type="text" class="form-control textfill" name="last_name" placeholder="Last Name" required="" value="{{old('last_name')}}">-->
													<!--</div>-->


													<div class="form-group mform col-sm-12">
														<label>Email</label>
														<input type="email" class="form-control textfill" name="email" placeholder="Email"  value="{{old('email')}}">
													</div>

													<div class="form-group mform col-sm-12">
														<label>Phone</label>
														<input type="text" class="form-control textfill" name="phone" id="phone" placeholder="Mobile" value="{{old('phone')}}" required="">
													</div>

													<div class="form-group mform col-sm-6">
														<label>Password</label>
														<input type="Password" class="form-control textfill" name="password" id="password" placeholder="Password" required="" value="{{old('password')}}" onkeyup="checkpassword()">
                                                        <span id="p_sms"></span></div>


													<div class="form-group mform col-sm-6">
														<label>Confirm Password</label>
														<input type="Password"  disabled="disabled" class="form-control textfill" name="confirm_password" id="confirm_password" placeholder="Confirm Password" required="" value="{{old('confirm_password')}}" onkeyup="checkconfirm_p()">
                                                        <span id="c_sms"></span></div>

													<div class="form-group mform col-sm-12">
														<label>Address</label>
														<textarea class="form-control textfill2" rows="3" placeholder="Address" name="address" required="">{{old('address')}}</textarea>
													</div>
													
													<div class="form-group mform col-sm-12">
														<label>OTP Code</label>
														<input type="text" class="form-control textfill2" rows="3" placeholder="EX:1234" name="otp" id="otp" onkeyup="checkotp()" required="" value="{{old('otp')}}">
															<br>
															<a onclick="sent_otp()" class="btn btn-info" style="color:white;text-decoration:none;cursor:pointer">Send OTP</a>	
															<br>
															<span id="opt_sms" style="color:green"></span>
													</div>


													

													<div class="form-group mform col-sm-12">
														<center><input  disabled="disabled" type="submit" id="submit" value="SIGN UP" class="d-block form-control logbutton w-50" style="cursor: not-allowed;background:#0a0a0a;couser:disable"></center>
													
														
													</div>
												</div></form>


											</div>
										</div>
									</div>

								</div>



							</div>

						</div>

					</div>
				</div>
			</div>





			<!--<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>-->
			<!--<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>-->


		</body>
		</html>


		<style type="text/css">
			
			.mform label{
				color: #414141;
				font-weight: normal;
				font-size: 15px;
			}



			.textfill{
				height: 50px;
				background-color: #fff;
				color: #414141;
				border-radius: 0px;
				transition: 0.9s;
				border:2px solid #f1f1f1;
				font-size: 15px;
				font-weight: normal;
			}

			.textfill:focus{
				box-shadow: none;
				border:2px solid #414141;
			}



			.textfill2{
				background-color: #fff;
				border-radius: 0px;
				border:2px solid #f1f1f1;
				font-size: 15px;
				color: #414141;
				transition: 0.9s;

			}

			.textfill2:focus{
				box-shadow: none;
				border:2px solid #585858;
			}



			.list-group .headlist{
				background: #585858;
				color: #fff;
				font-size: 22px;
				border-radius: 0px;
				border:none;
				line-height: 35px;
				text-transform: uppercase;
			}


			.loginback{

				box-shadow: 0 0.15rem 1.75rem 0 rgba(58, 59, 69, 0.10) !important;


			}


			.logbutton{
				background-color: #dc3545;
				color: #fff;
				padding: 10px;
				border-radius: 0px;
				width: 50%;
				font-weight: bold;
				cursor: pointer;
				border:none;
			}

			.logbutton:focus{
				background-color: #dc3545;
				color: #fff;
				box-shadow: none;
				border:none;
			}



			.loginback h5{
				font-size: 20px;
				font-weight: bold;
				color: #585858;
			}



			.loginback a{
				text-decoration: none;
				color: gray;
				font-size: 13px;
				transition: 0.5s;
			}

			.loginback a:hover{
				text-decoration: none;
				color: #dc3545;

			}



			.nav .nav-link{
				font-size: 14px;
				color: #414141;
				transition: 0.4s;
				padding: 15px 30px;
				background: #fff;
				border: 1px solid #f1f1f1;
				border-radius: 0px;
				text-transform: uppercase;
			}

			.nav .nav-link:focus{
				color: #fff;


			}

			.nav .nav-link.active {
				color: #fff;
				background: #343a40;

			}

		</style>
		
		
		<script>
var minLength = 8;

function checkpassword(){
   
    var password = document.getElementById("password").value;
    //  alert(password.length)
    if (password.length < minLength) {
        $("#p_sms").html("<font style='color:red;font-size:12px'>**Password minimum 8 character</font>");
        document.getElementById("confirm_password").disabled = true;
    }else if (password.length >= minLength){
         $("#p_sms").html("<font style='color:green;font-size:12px'>This password is accepted</font>");
         document.getElementById("confirm_password").disabled = false;
      }
      else
      {
          $("#p_sms").html("");
          document.getElementById("confirm_password").disabled = true;
      }
}



function checkconfirm_p(){
   $("#p_sms").html("");
    var password = document.getElementById("password").value;
    var c_password = document.getElementById("confirm_password").value;
    //  alert(c_password)
    if (password === c_password) {
        $("#c_sms").html("<font style='color:green;font-size:12px'>This Password Match Successfully</font>");
    }
    else if (password.length < c_password.length)
    {
         $("#c_sms").html("<font style='color:red;font-size:12px'>**The confirm password and password must match.</font>");
    }
    else
      {
          $("#c_sms").html("<font style='color:red;font-size:12px'>*Password try to matching...</font>");
      }
}

	function sent_otp()
	{
	    
	 var phone=document.getElementById("phone").value;
		
		if(phone.length == '11' && phone !='')
		{
		  	$.ajax({
			headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
			url: '{{ url("guest-reg-otp") }}',
			type:'POST',
			data:{phone:phone},
			success: function(data)
			{
			    if(data == '200')
			    {
			      	$("#opt_sms").html('<font style="color:red">Already Registered Using This Phone</font>');  
			    }
			  
			    else
			    {
			      	$("#opt_sms").html(data);  
			    }
			
			}
		});  
		}
		else
		{
		    alert ('Please Add valid Phone number!!');
		}
	
	}
	
	function checkotp(){
   	 var phone=document.getElementById("phone").value;
    var otp = document.getElementById("otp").value;
    
    
    		if(phone.length == '11' && otp.length == '4' && phone !='' && otp !='')
		{
		  	$.ajax({
			headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
			url: '{{ url("guest-reg-otp-check") }}',
			type:'POST',
			data:{phone:phone,otp:otp},
			success: function(data)
			{
			    if(data == '404')
			    {
			      	$("#opt_sms").html('<font style="color:red;font-size:12px">This OTP Not Match</font>'); 
			      	document.getElementById("submit").disabled = true;
			    }
			  
			    else if(data == 'matching')
			    {
			      	 $("#opt_sms").html("<font style='color:green;font-size:12px'>This OTP is Matching</font>");
                        document.getElementById("submit").disabled = false;
                        var x = document.getElementById("submit");
                         document.getElementById("submit").style.cursor = "pointer";
			    }
			
			}
		});  
		}
		else
		{
		    	$("#opt_sms").html('<font style="color:red;font-size:12px">This OTP Not Match....</font>'); 
			      	document.getElementById("submit").disabled = true;
			      	 document.getElementById("submit").style.cursor = "not-allowed";
		}
		
}

</script>