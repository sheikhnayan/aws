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
                                    Update Zone
                                </div> 
                                <div class="card-title" style="float: right;">
                                    <a href="{{url('zonedistrict')}}" class="btn btn-warning">View</a>
                                     <a href="{{url('/Admin-dashboard')}}" class="btn btn-danger">X</a>
                                </div>
                            </div>
                            <div class="card-body">

                                <form method="post" class=" right-text-label-form feedback-icon-form" action="{{url('zonedistrictupdate',[$data->id])}}" enctype="multipart/form-data">
                                   
                                    @csrf
                       

                            
                                
                                  <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="username1"> Zone Name</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" id="zone_name" name="zone_name" placeholder=" zone name" value="{{$data->zone_name}}"/>
                                        </div>
                                    </div>
                                
                                   

                                    <div class="form-group row">
                                        <div class="col-sm-8 ml-auto">
                                            <button type="submit" class="btn btn-success" name="signup1">Update</button>
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