<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Seller Login</title>
  <link rel="shortcut icon" href="img/siteicone.png" class="img-fluid">
  <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@500&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Kufam:wght@500&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('public/Frontend/') }}/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('public/Frontend/') }}/style.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('public/Frontend/') }}/css/uikit.min.css">
</head>
<body onload="myfunctions();" id="body" style="height: 100vh; background-color: #f7fafc;">


  <div class="col-sm-12 col-12">
    <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-sm-10 offset-sm-1 col-12 pt-5 pb-5">
      <div class="container">

        <div class="col-sm-12 col-12 bg-white pt-4 loginbacks mt-5">
          @include('msg.flash')

          <form method="post" action="{{url('/seller-signin')}}">
            <center><h5>Seller Login</h5></center>
            @csrf

            <div class="row p-2">
              <div class="form-group mform col-sm-12">
                <label>Email</label>
                <input type="text" class="form-control textfillss" name="email" placeholder="Email" required="">
              </div>

              <div class="form-group mform col-sm-12">
                <label>Password</label>
                <input type="Password" class="form-control textfillss" name="password" placeholder="Password" required="">
              </div>

              <div class="form-group mform col-sm-12">
                <a href="{{ url('/seller-register') }}">Create New Account ?</a>
                <a href="{{ url('/forgot_password_seller') }}">Forgot Account ?</a>
              </div>

              <div class="form-group mform col-sm-12">
                <input type="submit" value="LOGIN" class="d-block form-control logbutton float-right" style="background-color: #0a0a0a;">
              </div>

            </div>
          </form>



        </div>
      </div>
    </div>
  </div>






</body>
</html>












