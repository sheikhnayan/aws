<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Seller Register</title>
  <link rel="shortcut icon" href="img/siteicone.png" class="img-fluid">
  <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@500&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Kufam:wght@500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('public/Frontend/') }}/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('public/Frontend/') }}/style.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('public/Frontend/') }}/css/uikit.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
</head>
<body onload="myfunctions();" id="body" style="height: 100vh; background-color: #f7fafc;">
  

  <div class="col-sm-12 col-12">
    <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-sm-10 offset-sm-1 col-12 pt-4 pb-4">
      <div class="container">
        <div class="col-sm-12 col-12 bg-white pt-4 loginbacks">
            
             @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
        @endif


          <form action="{{url('seller-reg')}}" method="POST">
            <center><h5>Seller Register</h5></center>
            @csrf
            <div class="row p-2">

             <div class="form-group mform col-sm-6">
              <label>First Name</label>
              <input type="text" class="form-control textfillss" name="first_name" placeholder="First Name" required="" value="{{old('first_name')}}">
            </div>


            <div class="form-group mform col-sm-6">
              <label>Last Name</label>
              <input type="text" class="form-control textfillss" name="last_name" placeholder="Last Name" required=""  value="{{old('last_name')}}">
            </div>



            <div class="form-group mform col-sm-12">
              <label>Business Name</label>
              <input type="text" class="form-control textfillss" name="business_name" placeholder="Business Name" required=""  value="{{old('business_name')}}">
            </div>


            <!--<div class="form-group mform col-sm-6">-->
            <!--  <label>Email</label>-->
            <!--  <input type="email" class="form-control textfillss" name="email" placeholder="Email" required=""  value="{{old('email')}}">-->
            <!--</div>-->


            <div class="form-group mform col-sm-6">
              <label>Phone</label>
              <input type="text" class="form-control textfillss" name="phone" placeholder="Phone"  value="{{old('phone')}}">
            </div>

           
            <div class="form-group mform col-sm-12">
              <label>Address</label>
              <textarea class="form-control textfillss2" rows="3" placeholder="Address" name="address">{{old('address')}}</textarea>
            </div>


             <div class="form-group mform col-sm-6">
              <label>Password</label>
              <input type="Password" class="form-control textfillss" name="password"  id="password" placeholder="Password" required=""  value="{{old('password')}}" onkeyup="checkpassword()">
            <span id="p_sms"></span>
            </div>

             <div class="form-group mform col-sm-6">
              <label>Confirm Password</label>
              <input type="Password"  disabled="disabled" class="form-control textfillss" name="confirm_password"  id="confirm_password" placeholder="Confirm Password" required=""  value="{{old('confirm_password')}}" onkeyup="checkconfirm_p()">
            <span id="c_sms"></span>
            </div>


            <div class="form-group mform col-sm-12">
              <a href="{{ url('/seller-login') }}">Already Have Account ?</a>
            </div>

            <div class="form-group mform col-sm-12">
              <input type="submit" value="SIGN UP" class="d-block form-control logbutton float-right" style="background-color: #0a0a0a;">
            </div>
          </div>
        </form>



      </div>
    </div>
  </div>
</div>




<script type="text/javascript">
  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();
      reader.onload = function (e) {
        $('#one')
        .attr('src', e.target.result)

      };
      reader.readAsDataURL(input.files[0]);
    }
  }
</script>


<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

		<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
		<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

		<script>
			@if(Session::has('messege'))
			var type="{{Session::get('alert-type','info')}}"
			switch(type){
				case 'info':
				toastr.info("{{ Session::get('messege') }}");
				break;
				case 'success':
				toastr.success("{{ Session::get('messege') }}");
				break;
				case 'warning':
				toastr.warning("{{ Session::get('messege') }}");
				break;
				case 'error':
				toastr.error("{{ Session::get('messege') }}");
				break;
			}
			@endif
	
var minLength = 4;

function checkpassword(){
   
    var password = document.getElementById("password").value;
    //  alert(password.length)
    if (password.length < minLength) {
        $("#p_sms").html("<font style='color:red;font-size:12px'>**Password minimum 4 character</font>");
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
</script>

</body>
</html>




