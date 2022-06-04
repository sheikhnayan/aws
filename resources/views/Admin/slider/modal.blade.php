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
                                    Create Slider
                                </div> 
                                <div class="card-title" style="float: right;">
                                    <a href="{{route('slider.index')}}" class="btn btn-warning">View</a>
                                      <a href="{{url('/Admin-dashboard')}}" class="btn btn-danger">X</a>
                                </div>
                            </div>
                            <div class="card-body">

                                <form method="post" class=" right-text-label-form feedback-icon-form" action="{{route('slider.update',[$data->id])}}" enctype="multipart/form-data">
                                     @method('PATCH')
                                    @csrf
                       

                                
                                    <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="username1">SL</label>
                                        <div class="col-sm-5">
                                            <input type="number" class="form-control" id="sl" name="sl" placeholder="ex:1" value="{{$data->sl}}" />
                                             <input type="hidden" class="form-control" id="admin_id" name="admin_id"  value="{{Auth('admin')->user()->id}}" />
                                        </div>
                                    </div>
                                

                                
                                    <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="username1">Url name</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" id="url" name="url" placeholder="Url name" value="{{$data->url}}"/>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="picture1">Picture</label>
                                        <div class="col-sm-5">
                                            <input type="file" class="form-control" id="image" name="image" />
                                            <br>
                                             <div uk-lightbox="animation: fade">
                                           <a href="{{asset('/public/sliderImage')}}/{{$data->image}}"> 
                                            <img src="{{asset('public/sliderImage')}}/{{$data->image}}" style="max-height: 80px">
                                        </a>
                                    </div>
                                        </div>
                                    </div>
                                 
                                    <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="username1">Place</label>
                                        <div class="col-sm-5">
                                            <select name="place" class="form-control" id="" required>
                                                <option value="">Select</option>
                                                <option value="Header" @php if ($data['place'] == "Header") { echo "selected"; } @endphp>Header</option>
                                                <option value="Footer" @php if ($data['place'] == "Footer") { echo "selected"; } @endphp>Footer</option>
                                            </select>
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