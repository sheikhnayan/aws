@include('Admin.header')


<div class="main-content">

    <div class="container">



        <br>

        <br>

        <br>

        <br>

        @if ($errors->any())

            <div class="alert alert-danger">

                <ul>

                    @foreach ($errors->all() as $error)

                        <li>{{ $error }}</li>

                    @endforeach

                </ul>

            </div>

        @endif

        <div class="row">

            <div class="col-md-12">



                <div class="card card-shadow mb-4">

                    <div class="card-header">

                        <div class="card-title" style="float: left;">

                            Create Guest

                        </div>

                        <div class="card-title" style="float: right;">

                           


                        </div>

                    </div>

                    <div class="card-body">
                
              <form action="{{url('guestregisterstore')}}" enctype="multipart/form-data" method="POST">
                <h5>Create your Account</h5><hr>
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
                    <label>Phone</label>
                    <input type="text" class="form-control textfill" name="phone" id="phone" placeholder="Mobile" value="{{old('phone')}}" required="">
                  </div>
        
        
                  <div class="form-group mform col-sm-12">
                    <label>Email</label>
                    <input type="email" class="form-control textfill" name="email" placeholder="Email"  value="{{old('email')}}">
                  </div>
        
        
                  <div class="form-group mform col-sm-6">
                    <label>Password</label>
                    <input type="Password" class="form-control textfill" name="password" id="password" placeholder="Password" required="" value="{{old('password')}}" onkeyup="checkpassword()">
                    <span id="p_sms"></span>
                  </div>
        
        
                  <div class="form-group mform col-sm-6">
                    <label>Confirm Password</label>
                    <input type="Password"  disabled="disabled" class="form-control textfill" name="confirm_password" id="confirm_password" placeholder="Confirm Password" required="" value="{{old('confirm_password')}}" onkeyup="checkconfirm_p()">
                   <span id="c_sms"></span>
                  </div>
        
                  <div class="form-group mform col-sm-12">
                    <label>Address</label>
                    <textarea class="form-control textfill2" rows="3" placeholder="Address" name="address" >{{old('address')}}</textarea>
                  </div>
                  
            
        
        
        
              
        
                  <div class="form-group mform col-sm-12">
                   <center><input   type="submit" id="submit" value="Register" class="d-block form-control logbutton w-50" style="background:#0a0a0a; color:white"></center>
        													
                  </div>
                </div>
              </form>

        
</div>

                </div>









            </div>

        </div>

    </div>

</div>












@include('Admin.footer')
<script type="text/javascript">

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



</script>