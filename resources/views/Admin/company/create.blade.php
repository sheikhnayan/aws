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
                                    Create Brand
                                </div> 
                                <div class="card-title" style="float: right;">
                                    <a href="{{route('brand-add.index')}}" class="btn btn-warning">View</a>
                                     <a href="{{url('/Admin-dashboard')}}" class="btn btn-danger">X</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <form id="" method="post" class=" right-text-label-form feedback-icon-form" action="{{route('brand-add.store')}}" enctype="multipart/form-data">
                                    @csrf
                       


                                
                                    <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="username1">SL</label>
                                        <div class="col-sm-5">
                                              
                                            <input type="text" class="form-control" id="sl" name="sl" placeholder="serial" value="{{old('sl')}}"/>
                                        </div>
                                    </div>
                                
                                    <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="username1">Brand name</label>
                                        <div class="col-sm-5">
                                              <input type="hidden" class="form-control" id="admin_id" name="admin_id"  value="{{Auth('admin')->user()->id}}" />
                                              
                                            <input type="text" class="form-control" id="brand_name" name="brand_name" placeholder="Brand name" value="{{old('brand_name')}}"/>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="picture1">Picture</label>
                                        <div class="col-sm-5">
                                            <input type="file" class="form-control" id="image" name="image" />
                                        </div>
                                    </div>

                      {{--               <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="picture1">Home page Show</label>
                                        <div class="col-sm-5">
                                             <select class="form-control" id="home_show" name="home_show" >
                                                <option value="1"/>On</option>
                                                <option value="0"/>Off</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="picture1">Status</label>
                                        <div class="col-sm-5">
                                            <select class="form-control" id="status" name="status" >
                                                <option value="1"/>Active</option>
                                                <option value="0"/>Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                  --}}

                                    <div class="form-group row">
                                        <div class="col-sm-8 ml-auto">
                                            <button type="submit" class="btn btn-success" name="signup1" value="Sign up">Create</button>
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
