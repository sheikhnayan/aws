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
                                    Search Order List
                                </div> 
                           
                            </div>
                            <div class="card-body">
                                <form id="" method="post" class=" right-text-label-form feedback-icon-form" action="{{url('date-to-date-order-list')}}" enctype="multipart/form-data">
                                    @csrf
                       

          


                                    <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="username1">Date</label>
                                        <div class="col-sm-5">
                                           From Date:<input type="date" class="form-control" id="date1" name="date1"  required=""/>&nbsp;&nbsp;
                                           To Date: <input type="date" class="form-control" id="date2" name="date2"   required/>
                                        </div>
                                      </div>
                                      
                                      
                                    <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="username1">Product/SKU</label>
                                        <div class="col-sm-5">
                                            <select name="product_id" id="product_id" class="form-control searchjs">
                                          <option value="">Select one</option>
                                        @if($product)
                                        @foreach($product as $data)
                                         <option value="{{$data->id}}">{{$data->product_name}} ({{$data->product_id}})</option>
                                        @endforeach
                                        @endif
                                               
                                            </select>
                                        </div>
                                    </div>
                                      
                                      
                                    <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="username1">Status Type</label>
                                        <div class="col-sm-5">
                                            <select name="status" id="status" class="form-control searchjs1">
                                          <option value="">Select one</option>
                                          <option value="">ALL</option>
                                          <option value="0">Pending</option>
                                          <option value="1">Process</option>
                                          <option value="5">Shipping</option>
                                          <option value="2">On the way</option>
                                          <option value="3">Complete</option>
                                          <option value="4">Reject</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="username1">Payment Type</label>
                                        <div class="col-sm-5">
                                            <select name="payment_type" id="payment_type" class="form-control searchjs1">
                                          <option value="">Select one</option>
                                          <option value="COD">COD</option>
                                          <option value="bank">Bank</option>
                                          <option value="online">Online</option>
                                          <option value="bkash">Bkash</option>
                                          <option value="nagad">Nagad</option>
                                          <option value="rocket">Rocket</option>
                                            </select>
                                        </div>
                                    </div>
                                    
                                          
                                    
                                      


                                    <div class="form-group row">
                                        <div class="col-sm-8 ml-auto">
                                            <button type="submit" class="btn btn-success" name="signup1" value="Sign up">Show</button>
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
