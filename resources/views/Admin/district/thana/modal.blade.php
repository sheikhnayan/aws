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
                                    Update District
                                </div> 
                                <div class="card-title" style="float: right;">
                                    <a href="{{route('thana-add.index')}}" class="btn btn-warning">View</a>
                                     <a href="{{url('/Admin-dashboard')}}" class="btn btn-danger">X</a>
                                </div>
                            </div>
                            <div class="card-body">

                                <form method="post" class=" right-text-label-form feedback-icon-form" action="{{route('thana-add.update',[$data->id])}}" enctype="multipart/form-data">
                                    @method('PATCH')
                                    @csrf
                       

                                    <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="username1">District Name</label>
                                        <div class="col-sm-5">
                                   <select name="district_id" id="district_id" class="form-control">       
                                    <option value="{{$data->district_id}}">{{$data->district->district_name}}</option>
                                    @if($district)
                                    @foreach($district as $disdata)
                                    @if( $disdata->id != $data->district_id)
                                    <option value="{{$disdata->id}}">{{$disdata->district_name}}</option>
                                    @endif
                                    @endforeach
                                    @endif
                                            </select>
                                        </div>
                                    </div>

                                     <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="username1">Thana/Area Name</label>
                                        <div class="col-sm-5">
                                        <input type="text" name="thana_name" id="thana_name" class="form-control" value="{{$data->thana_name}}">
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