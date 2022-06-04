@extends('User.layouts.master')
@section('body')




<div class="col-md-12">
  <div class="container">
    <div class="row">



     <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12 pb-5 offset-md-2">

      <div class="col-lg-8 offset-lg-2 col-md-10 offset-md-1 col-sm-10 offset-sm-1 col-12 pt-4 mt-4">
        <div class="col-md-12 p-4 pb-5 formback">
          <center><strong>Register</strong><br><span>Create your Account Thank You !!</span></center>
          <hr>

          @if ($errors->any())
          <div class="alert alert-danger">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          @endif

          <form action="{{route('user-Register.store')}}" method="POST">
           @csrf

           <div class="row p-2">

            <div class="form-group mform col-sm-12 mb-3">
              <label>Name</label>
              <input type="text" class="form-control textfill" name="first_name" placeholder="Name" required="" value="{{old('first_name')}}">
            </div>
            
<!--             <div class="form-group mform col-sm-6 mb-3">
              <label>Vessel Name</label>
              <input type="text" class="form-control textfill" name="vessel_name" placeholder="Vessel Name" required="" value="{{old('vessel_name')}}">
            </div>
            
             <div class="form-group mform col-sm-6 mb-3">
              <label>Rank</label>
              <select class="form-control textfill" name="rank">
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


            <div class="form-group mform col-sm-12 mb-3">
              <label>Email ( Optional )</label>
              <input type="email" class="form-control textfill" name="email" id="email" placeholder="Email" value="{{old('email')}}" autocomplete="off">
            </div>

            <div class="form-group mform col-sm-12 mb-3">
              <label>Phone</label>
              <input type="number" class="form-control textfill" name="phone" id="phone" placeholder="Mobile" value="{{old('phone')}}" required="">
            </div>


            <!-- <div class="form-group mform col-sm-6 mb-3">
              <label>Email</label>
              <input type="text" class="form-control textfill" name="email" id="email" placeholder="Email" value="{{old('email')}}" required="">
            </div> -->


            <!--<div class="form-group mform col-sm-12 mb-3">-->
            <!--  <label>Email</label>-->
            <!--  <input type="email" class="form-control textfill" name="email" placeholder="Email"  value="{{old('email')}}">-->
            <!--</div>-->


            <div class="form-group mform col-sm-6 mb-3">
              <label>Password</label>
              <input type="password" class="form-control textfill" name="password" id="password" placeholder="Password" required="" value="{{old('password')}}" onkeyup="checkpassword()">
              <span id="p_sms"></span>
            </div>


            <div class="form-group mform col-sm-6">
              <label>Confirm Password</label>
              <input type="Password"  disabled="disabled" class="form-control textfill" name="confirm_password" id="confirm_password" placeholder="Confirm Password" required="" value="{{old('confirm_password')}}" onkeyup="checkconfirm_p()">
              <span id="c_sms"></span>
            </div>

            <!--<div class="form-group mform col-sm-12 mb-3">-->
            <!--  <label>Address</label>-->
            <!--  <textarea class="form-control textfill2" rows="3" placeholder="Address" name="address" >{{old('address')}}</textarea>-->
            <!--</div>-->

<!--             <div class="form-group mform col-sm-12 mb-3">
              <label>OTP Code</label>
              <input type="text" class="form-control textfill2" rows="3" placeholder="EX:1234" name="otp" id="otp" onkeyup="checkotp()" required="" value="{{old('otp')}}">
              <br>
              <a onclick="sent_otp()" id="hideotp" class="btn btn-success w-100 bg-success text-light w-50 rounded" style="color:white;text-decoration:none;cursor:pointer">Send OTP</a>

              <a  id="hideloading" class="btn btn-success w-100 bg-success text-light w-50 rounded" style="color:white;text-decoration:none;cursor:not-allowed; display: none;">Loading...</a>




              <span id="opt_sms" style="color:green"></span>
            </div> -->

            <div class="form-group mform col-sm-12" id="signup" >
             <button type="submit" id="submit" class="border-0 d-block py-2 rounded text-light w-100 w-50" style="background: #b90000">SIGN UP</button>
           </div>
         </div>
       </form>




       <br>
       <center>
        <span>Already have an account? <a href="{{ url('user-login') }}" style="color: #b90000">Login</a></span>

      </center>



    </div>
  </div>


</div>


</div>
</div>
</div>





{{-- 
         <center>
          <span style="color:gray;">
           or
         </span><br><br>
         <a href="{{url('/user-login/facebook')}}" class="btn btn-primary  p-2 text-light"><span uk-icon="icon: facebook; ratio: 1"></span>&nbsp;&nbsp;Register with Facebook</a></center> --}}


       </div>
     </div>





     @endsection

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

  $("#hideotp").hide();
  $("#hideloading").show();
  

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

      $("#hideloading").hide();
       $("#signup").show();
       
       
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