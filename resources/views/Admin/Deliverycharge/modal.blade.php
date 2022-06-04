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
                                    <a href="{{route('deliverychargeadd.index')}}" class="btn btn-warning">View</a>
                                     <a href="{{url('/Admin-dashboard')}}" class="btn btn-danger">X</a>
                                </div>
                            </div>
                            <div class="card-body">

                                <form method="post" class=" right-text-label-form feedback-icon-form" action="{{route('deliverychargeadd.update',[$data->id])}}" enctype="multipart/form-data">
                                    @method('PATCH')
                                    @csrf
                       

                                    <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="username1">Zone Name</label>
                                        <div class="col-sm-5">
                                           <select name="zone_id" id="zone_id" class="form-control">       
                                            <option value="{{$data->zone_id}}">{{$data->zone->zone_name}}</option>
                                            @if($zone)
                                            @foreach($zone as $zonedata)
                                            @if($zonedata->id != $data->zone_id)
                                            <option value="{{$zonedata->id}}"  @php if ($zonedata->id == $data->zone_id) { echo "selected"; } @endphp>{{$zonedata->zone_name}}</option>
                                            @endif
                                            @endforeach
                                            @endif
                                            </select>
                                        </div>
                                    </div>

                                
<!--                                   <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="username1"> Shipping Class</label>
                                        <div class="col-sm-5">
                                           <select class="form-control" name="shipping_id">

                             

                                            @if($ship)
                                            @foreach($ship as $shipdata)
                                            @if($data->shipping_id == $shipdata->id)
                                               <option value="{{$shipdata->id}}">{{$shipdata->shipping_name}}</option>
                                            @endif
                                            @endforeach
                                            @endif

                                            @if($ship)
                                            @foreach($ship as $shipdata)
                                            @if($data->shipping_id != $shipdata->id)
                                               <option value="{{$shipdata->id}}">{{$shipdata->shipping_name}}</option>
                                            @endif
                                            @endforeach
                                            @endif
                                           </select>
                                        </div>
                                    </div> -->


                                    <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="username1"> Charge</label>
                                        <div class="col-sm-5">
                                            <input type="number" class="form-control" id="charge" name="charge" placeholder=" price" value="{{$data->charge}}"/>
                                        </div>
                                    </div>
                                
                                   

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