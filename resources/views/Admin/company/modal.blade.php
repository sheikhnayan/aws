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
                                    Edit Brand
                                </div> 
                                <div class="card-title" style="float: right;">
                                    <a href="{{route('brand-add.index')}}" class="btn btn-warning">View</a>
                                     <a href="{{url('/Admin-dashboard')}}" class="btn btn-danger">X</a>
                                </div>
                            </div>
                            <div class="card-body">

                                <form method="post" class=" right-text-label-form feedback-icon-form" action="{{route('brand-add.update',[$data->id])}}" enctype="multipart/form-data">
                                     @method('PATCH')
                                    @csrf
                       

                                
                                   
                                <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="username1">SL</label>
                                        <div class="col-sm-5">
                                              
                                            <input type="text" class="form-control" id="sl" name="sl" placeholder="serial" value="{{$data->sl}}"/>
                                        </div>
                                    </div>
                                    
                                    
                                    <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="username1">Brand name</label>
                                        <div class="col-sm-5">
                                              <input type="hidden" class="form-control" id="admin_id" name="admin_id"  value="{{Auth('admin')->user()->id}}" />
                                              
                                            <input type="text" class="form-control" id="brand_name" name="brand_name" placeholder="Item name" value="{{$data->company_name}}"/>
                                        </div>
                                    </div>

                                    
                                    <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="picture1">Picture</label>
                                        <div class="col-sm-5">
                                            <input type="file" class="form-control" id="image" name="image" />
                                            <br>
                                             <div uk-lightbox="animation: fade">
                                           <a href="{{asset('/public/companyImage')}}/{{$data->image}}"> 
                                            <img src="{{asset('public/companyImage')}}/{{$data->image}}" style="width: 80px;height: 80px">
                                        </a>
                                    </div>
                                        </div>
                                    </div>
                                    
                                        
                                 

                                    <div class="form-group row">
                                        <div class="col-sm-8 ml-auto">
                                            <button type="submit" class="btn btn-info" name="signup1" value="Sign up">update</button>
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