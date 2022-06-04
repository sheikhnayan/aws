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
                        Edit Item
                    </div> 
                    <div class="card-title" style="float: right;">
                        <a href="{{route('item-add.index')}}" class="btn btn-warning">View</a>
                        <a href="{{url('/Admin-dashboard')}}" class="btn btn-danger">X</a>
                    </div>
                </div>
                <div class="card-body">

                    <form method="post" class=" right-text-label-form feedback-icon-form" action="{{route('item-add.update',[$data->id])}}" enctype="multipart/form-data">
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
                        <label class="col-sm-4 control-label" for="username1">Item name</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control" id="item_name" name="item_name" placeholder="Item name" value="{{$data->item_name}}"/>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label class="col-sm-4 control-label" for="picture1">Picture</label>
                        <div class="col-sm-5">
                            <input type="file" class="form-control" id="image" name="image" />
                            <br>
                            <div uk-lightbox="animation: fade">
                             <a href="{{asset('/public/itemImage')}}/{{$data->image}}"> 
                                <img src="{{asset('public/itemImage')}}/{{$data->image}}" style="height: 80px">
                            </a>
                        </div>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-4 control-label" for="picture1">Banner</label>
                    <div class="col-sm-5">
                        <input type="file" class="form-control" id="banner" name="banner" />
                        <br>
                        <div uk-lightbox="animation: fade">
                         <a href="{{asset('/public/itemImage')}}/{{$data->banner}}"> 
                            <img src="{{asset('public/itemImage')}}/{{$data->banner}}" style="height: 80px">
                        </a>
                    </div>
                </div>
            </div>


                                     {{-- <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="picture1">Setting Home</label>
                                        <div class="col-sm-5">
                                            @if($data->left_menu == '1')
                                            <input type="checkbox" class="form-control" id="left_menu" name="left_menu" value="1" checked/>Left Menu&nbsp;
                                            @else
                                            <input type="checkbox" class="form-control" id="left_menu" name="left_menu" value="1"/>Left Menu&nbsp;
                                            @endif
                                            
                                            @if($data->show_home == '1')
                                            <input type="checkbox" class="form-control" id="shop_by" name="shop_by" value="1" checked/>Shop By Category's&nbsp;
                                            @else
                                            <input type="checkbox" class="form-control" id="shop_by" name="shop_by" value="1"/>Shop By Category's&nbsp;
                                            @endif
                                            
                                            @if($data->show_home == '1')
                                            <input type="checkbox" class="form-control" id="show_home" name="show_home" value="1" Checked/>Home Page Show&nbsp;
                                            @else
                                            <input type="checkbox" class="form-control" id="show_home" name="show_home" value="1"/>Home Page Show&nbsp;
                                            @endif
                                            
                                            
                                            
                                        </div>
                                    </div>
                                 
                                    <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="picture1">Setting Home</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" id="paginate" name="paginate" value="{{$data->paginate}}"/>
                                        </div>
                                    </div> --}}


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