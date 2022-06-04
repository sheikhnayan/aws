@extends('User.layouts.master')
@section('body')




<div class="col-md-12">
  <div class="container">
    <div class="row">

      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 d-none d-lg-block"> 
        @include('User.layouts.sidmenu')
      </div><!----------End Sidebar-------->

      <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12 pb-5">

        <div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-sm-10 offset-sm-1 col-12 pt-5 mt-4">
          <div class="col-md-12 p-4 pb-5 formback">
            <center><strong>Forget Password</strong><br><span>A OTP token will sent to your mobile phone</span></center>
            <hr>

            @include('msg.flash')
            <form method="post" action="{{url('/guest_forget_code_check')}}">
              @csrf

              <div class="row">


                <div class="form-group col-12 mb-3">
                  <label><b>Phone</b> <span class="text-danger">*</span></label>
                  <input type="text" class="form-control textfill" name="phone" value="{{$check->phone}}" readonly="">
                </div>

                <div class="form-group col-12 mb-3">
                  <label><b>Code</b> <span class="text-danger">*</span></label>
                  <input type="text" class="form-control textfill" name="code">
                </div>
              </div>
              <input type="submit" value="Submit" class="btn btn-dark w-100 pr-4 pl-4">
            </form>
          </div>
        </div>


      </div>


    </div>
  </div>
</div>





@endsection
