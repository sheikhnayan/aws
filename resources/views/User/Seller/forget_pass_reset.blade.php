@extends('User.layouts.master')

@section('body')


<div class="col-sm-12 col-12 mt-4">
  <div class="container border p-3">
    <div>
      <ul class="uk-breadcrumb">
        <li><a href="">Home</a></li>
        <li><span>Forget Password</span></li>
      </ul>
    </div>
    @include('msg.flash')
    <div class="row">

      <div class="col-lg-6 col-md-12 col-sm-12 col-12 mt-4">
        <div class="col-sm-12 col-12">
         <form method="post" action="{{url('/seller_forget_reset_done')}}">
          @csrf
          <center><h4>Forget password</h4></center><hr><br>

          <div class="row">


          <div class="form-group col-12">
            <label><b>Phone</b> <span class="text-danger">*</span></label>
            <input type="text" class="form-control textfill" name="phone" value="{{$check->phone}}" readonly="">
          </div>

          <div class="form-group col-12">
            <label><b>Password</b> <span class="text-danger">*</span></label>
            <input type="text" class="form-control textfill" name="password">
          </div>

        </div>
        <br>
        <input type="submit" value="Login " class="btn btn-info pr-4 pl-4">
      </form>
    </div>
  </div>



</div>
</div>
</div>



@endsection
