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
                                    Update Coupon
                                </div> 
                                <div class="card-title" style="float: right;">
                                    <a href="{{route('CouponAdd.index')}}" class="btn btn-warning">View</a>
                                     <a href="{{url('/Admin-dashboard')}}" class="btn btn-danger">X</a>
                                </div>
                            </div>
                            <div class="card-body">

                                <form method="post" class=" right-text-label-form feedback-icon-form" action="{{route('CouponAdd.update',[$data->id])}}" enctype="multipart/form-data">
                                    @method('PATCH')
                                    @csrf
                       

                                    <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="username1">Coupon Name</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" id="coupon_name" name="coupon_name" placeholder="#MIAJAD50" value="{{$data->coupon_name}}"/>
                                        </div>
                                    </div>

                                
                                    <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="username1">Start Date</label>
                                        <div class="col-sm-5">
                                            <input type="date" class="form-control" id="start_date" name="start_date"  value="{{$data->start_date}}" />
                                             <input type="hidden" class="form-control" id="admin_id" name="admin_id"  value="{{Auth('admin')->user()->id}}" />
                                        </div>
                                    </div>
                                

                                
                                    <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="username1">Minimum Price</label>
                                        <div class="col-sm-5">
                                            <input type="number" class="form-control" id="min_price" name="min_price" placeholder="Minimum price" value="{{$data->min_price}}"/>
                                        </div>
                                    </div>
                                
                                    <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="username1">Discount Percantage</label>
                                        <div class="col-sm-5">
                                            <input type="number" class="form-control" id="discout_per" name="discout_per" placeholder="discount per(%)" value="{{$data->discout_per}}"/>
                                        </div>
                                    </div>


                                    <!-- <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="username1">Discount price</label>
                                        <div class="col-sm-5">
                                            <input type="number" class="form-control" id="discout_price" name="discout_price" placeholder="Discount price" value="{{$data->discout_price}}"/>
                                        </div>
                                    </div> -->


                                    <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="username1">Apply coupon</label>
                                        <div class="col-sm-5">
                                            <input type="number" class="form-control" id="apply_coupon" name="apply_coupon" placeholder="Apply Coupon" value="{{$data->apply_coupon}}"/>
                                        </div>
                                    </div>



                                    <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="username1">End Date</label>
                                        <div class="col-sm-5">
                                            <input type="date" class="form-control" id="end_date" name="end_date"  value="{{$data->end_date}}"/>
                                        </div>
                                    </div>


                         
                                 

                                    <div class="form-group row">
                                        <div class="col-sm-8 ml-auto">
                                            <button type="submit" class="btn btn-success" name="signup1" value="Sign up">Update</button>
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