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
                                    Offer Start and End Time Date Update
                                </div> 
                        
                            </div>
                            <div class="card-body">
                                <form id="" method="post" class=" right-text-label-form feedback-icon-form" action="{{url('updateoffercontrol')}}" enctype="multipart/form-data">
                                    @csrf
                       

                                
                                    <div class="form-group row" style="padding:20px">
                                        <label class="col-sm-2 control-label" for="username1">Discount Mela</label>
                                        <div class="col-sm-10">
                                      
                                           <label>Start Date&Time: <input type="text" name="discount_start" value="{{$data->discount_start}}">
                                            End Date&Time: <input type="text" name="discount_end" value="{{$data->discount_end}}">
                                            Start:<input type="radio" id="status" name="status" value="1">
                                            Stop:<input type="radio" id="status" name="status" value="0">
                                            </label> <br>
                                            Delivery Days: <input type="number" name="discount_days" value="{{$data->discount_days}}">
                                            </label> 
                                        </div>
                                    </div>
                                    
                                      <div class="form-group row" style="padding:20px">
                                        <label class="col-sm-2 control-label" for="username1">Lifestyle Mela</label>
                                        <div class="col-sm-10">
                                           <label>Start Date&Time: <input type="text" name="life_start" value="{{$data->life_start}}">
                                            End Date&Time: <input type="text" name="life_end" value="{{$data->life_end}}">
                                            Start:<input type="radio" id="status" name="status" value="1">
                                            Stop:<input type="radio" id="status" name="status" value="0">
                                            </label> <br>
                                              Delivery Days: <input type="number" name="lifestyle_days" value="{{$data->lifestyle_days}}"></label> 
                                        </div>
                                    </div>


                                      <div class="form-group row" style="padding:20px">
                                        <label class="col-sm-2 control-label" for="username1">Gadget Mela</label>
                                        <div class="col-sm-10">
                                            <label>Start Date&Time: <input type="text" name="gadget_start" value="{{$data->gadget_start}}">
                                            End Date&Time: <input type="text" name="gadget_end" value="{{$data->gadget_end}}">
                                            Start:<input type="radio" id="status" name="status" value="1">
                                            Stop:<input type="radio" id="status" name="status" value="0">
                                            </label><br>
                                            Delivery Days: <input type="number" name="gadget_days" value="{{$data->gadget_days}}"></label>
                                        </div>
                                    </div>
                                    
                                    
                                      <div class="form-group row" style="padding:20px">
                                        <label class="col-sm-2 control-label" for="username1">Deshi Mela</label>
                                        <div class="col-sm-10">
                                           <label>Start Date&Time: <input type="text" name="deshi_start" value="{{$data->deshi_start}}">
                                            End Date&Time: <input type="text" name="deshi_end" value="{{$data->deshi_end}}">
                                            Start:<input type="radio" id="status" name="status" value="1">
                                            Stop:<input type="radio" id="status" name="status" value="0">
                                            </label> <br>
                                            Delivery Days: <input type="number" name="deshi_days" value="{{$data->deshi_days}}"></label> 
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <div class="col-sm-8 ml-auto">
                                            <button type="submit" class="btn btn-success" value="update">Update</button>
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
