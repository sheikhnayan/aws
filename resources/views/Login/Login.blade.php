
<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
     <link rel="icon" type="image/png" href="{{ asset('public/admin') }}/assets/img/logo.png">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@500&display=swap" rel="stylesheet">

    <link rel="icon" type="image/png" href="{{ asset('public/backend/') }}/assets/img/logo.png" class="img-fluid">


</head>
<body class="bg-light">


    <div class="container mt-5 pt-5">
        <div class="row justify-content-center">
            <div class="col-md-5 bg-white p-4 loginback">
                <div class="card">

                    <div class="card-body">
                      <form method="POST" action="{{ URL::to('Login-Admin') }}">
                        @csrf
                        <center><h4>Admin <span class="text-danger">Login</span></h4></center><br>
                        <div class="row p-2">
                            <div class="form-group mform col-sm-12">
                                <label>Email :</label>
                                <input id="email" type="email" class="form-control textfill @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="Enter Email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>

                            <div class="form-group mform col-sm-12">
                                <label>Password :</label>
                             <input id="password" type="password" class="form-control textfill @error('password') is-invalid @enderror" name="password" required autocomplete="current-password" placeholder="Enter Password">

                             @error('password')
                             <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>



                        <div class="form-group col-sm-12">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                <label class="form-check-label" for="remember">
                                    {{ __('Remember Me') }}
                                </label>
                            </div>
                        </div>

                    </div>
                    <center><input type="submit" name="LOG IN"  value="LOG IN" class="d-block form-control logbutton"></center>
                </form>

            </div>



        </div>
    </div>
</div>









<style type="text/css">
    body{
        font-family: 'Quicksand';
        font-size: 14px;
        background-image: url(public/img/education-6052677_1920.jpg);
    }
    .textfill{
      height: 45px;
      background-color: #f8f8f8;
      color: #414141;
      border-radius: 0px;
      transition: 0.9s;
      border:1px solid transparent;
      font-size: 14px;
      font-weight: normal;
  }

  .textfill:focus{
      box-shadow: none;
      border:1px solid #585858;
      background-color: #fff;
  }

  .logbutton{
      background-color: darkred;
      color: #fff;
      padding: 10px;
      border-radius: 0px;
      width: 95%;
      font-weight: bold;
      cursor: pointer;
      border:none;
      font-size: 13px;
  }

  .logbutton:focus{
      background-color: darkred;
      color: #fff;
      box-shadow: none;
      border:none;
  }



  .loginback{
      box-shadow: 0 10px 15px -3px rgba(0,0,0,.1), 0 4px 6px -2px rgba(0,0,0,.05);
      background-color: #fff;
  }


  .loginback h5{
      font-size: 15px;
      font-weight: bold;
      color: #585858;
  }



  .card{
    border-radius: 0px;
    border:1px dotted #e1e1e1;
}

</style>






</body>
</html>





