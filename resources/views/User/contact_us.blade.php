@extends('User.layouts.master')
@section('body')


<div class="col-sm-12 col-12 mt-4">
  <div class="container">
    <div class="row">

      <div class="col-lg-6 col-md-12 col-sm-12 col-12 mt-2">
        <div class="mb-3"><strong>Send Message</strong></div>
        <div class="col-sm-12 col-12 detailspage p-4">
         <form action="{{url('/customer-message')}}" method="post">
          @csrf
          

          <div class="form-group">
            <label><b>Name</b> <span class="text-danger">*</span></label>
            <input type="text" class="form-control textfill" name="name" required="" value="@if(Auth('guest')->user()){{ Auth('guest')->user()->first_name }}@endif">
          </div>

          <div class="form-group">
            <label><b>Email</b> <span class="text-danger">*</span></label>
            <input type="text" class="form-control textfill" name="email" required="" value="@if(Auth('guest')->user()){{ Auth('guest')->user()->email }}@endif">
          </div>


          <div class="form-group">
            <label><b>Your Question</b> <span class="text-danger">*</span></label>
            <textarea class="form-control textfill2" rows="5" name="description" required=""></textarea>
          </div>


          <br>

          <input type="submit" value="Send Message" class="btn btn-dark w-100">

        </form>
      </div>
    </div>



    <div class="col-lg-6 col-md-12 col-sm-12 col-12 mt-2">
      <div class="mb-3"><strong>Address</strong></div>
      <div class="col-sm-12 col-12 detailspage p-4">
        {!! $contact_us->description !!}

        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14604.11899128579!2d90.415816!3d23.781955!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x19bd7392015966ba!2sBagdoom.com!5e0!3m2!1sen!2sbd!4v1599757258457!5m2!1sen!2sbd" width="100%" height="350" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
      </div>
    </div>




  </div>
</div>
</div>


@endsection