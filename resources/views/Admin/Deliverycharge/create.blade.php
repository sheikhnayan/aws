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
                                    Create Delviery Charge
                                </div> 
                                <div class="card-title" style="float: right;">
                                    <a href="{{route('deliverychargeadd.index')}}" class="btn btn-warning">View</a>
                                     <a href="{{url('/Admin-dashboard')}}" class="btn btn-danger">X</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <form id="" method="post" class=" right-text-label-form feedback-icon-form" action="{{route('deliverychargeadd.store')}}" enctype="multipart/form-data">
                                    @csrf
                       

                                    <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="username1">Zone Name</label>
                                        <div class="col-sm-5">
                                   <select name="zone_id" id="zone_id" class="form-control">
                                       <option value="">--Select Zone--</option>
                                    @if($zone)
                                    @foreach($zone as $zonedata)
                                    <option value="{{$zonedata->id}}">{{$zonedata->zone_name}}</option>
                                    @endforeach
                                    @endif

                                   </select>
                                        </div>
                                    </div>

<!--                                 
                                    <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="username1"> Shipment Class </label>
                                        <div class="col-sm-5">
                                           <select class="form-control" name="shipping_id">
                                            <option value="">--Select Shipment Class--</option>
                                            @if($ship)
                                            @foreach($ship as $shipdata)
                                               <option value="{{$shipdata->id}}">{{$shipdata->shipping_name}}</option>
                                            @endforeach
                                            @endif
                                           </select>
                                        </div>
                                    </div>
                                 -->
                                
                                    <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="username1"> Charge</label>
                                        <div class="col-sm-5">
                                            <input type="number" class="form-control" id="charge" name="charge" placeholder=" price" value="{{old('charge')}}"/>
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
<script type="text/javascript">
      function check_all()
      {
      
      if($('#chkbx_all').is(':checked')){
        $('input.check_elmnt2').prop('disabled', false);
        $('input.check_elmnt').prop('checked', true);
        $('input.check_elmnt2').prop('checked', true);
      }else{
        $('input.check_elmnt2').prop('disabled', true);
        $('input.check_elmnt').prop('checked', false);
        $('input.check_elmnt2').prop('checked', false);
        }
    } 
    

    function chekMain(getID){
       
          if($('#linkID-'+getID).is(':checked')){
              
            $("input#sublinkID-"+getID).attr('disabled', false);
            $("input#sublinkID-"+getID).attr('checked', true);
          
          }else{
            $("input#sublinkID-"+getID).attr('disabled', true);
            $("input#sublinkID-"+getID).attr('checked', false);
          
          }
      
        }


</script>