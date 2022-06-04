@include('Admin.header')
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>


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
                                    Edit Category
                                </div> 
                                <div class="card-title" style="float: right;">
                                    <a href="{{route('category-add.index')}}" class="btn btn-warning">View</a>
                                     <a href="{{url('/Admin-dashboard')}}" class="btn btn-danger">X</a>
                                </div>
                            </div>
                            <div class="card-body">

                                <form method="post" class=" right-text-label-form feedback-icon-form" action="{{route('category-add.update',[$data->id])}}" enctype="multipart/form-data">
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
                                            <select name="item_id" class="form-control searchjs">
                                                <option value="{{$data->item_id}}">{{$data->item_name}}</option>
                                                @if(isset($item))
                                                @foreach($item as $itemdata)
                                                @if($itemdata->id != $data->item_id)
                                                <option value="{{$itemdata->id}}">{{$itemdata->item_name}}</option>
                                                @endif
                                                @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="username1">Category Name</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" id="category_name" name="category_name" placeholder="ex:T-Shirt" value="{{$data->category_name}}" />
                                      
                                        </div>

                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="picture1">Picture</label>
                                        <div class="col-sm-5">
                                            <input type="file" class="form-control" id="image" name="image" />
                                            <br>
                                             <div uk-lightbox="animation: fade">
                                           <a href="{{asset('/public/categoryImage')}}/{{$data->image}}"> 
                                            <img src="{{asset('public/categoryImage')}}/{{$data->image}}" style="height: 80px">
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
                                           <a href="{{asset('/public/categoryImage')}}/{{$data->banner}}"> 
                                            <img src="{{asset('public/categoryImage')}}/{{$data->banner}}" style="height: 80px">
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