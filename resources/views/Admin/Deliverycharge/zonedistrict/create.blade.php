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
                                    Create zone District Setup
                                </div> 
                                <div class="card-title" style="float: right;">
                                    <a href="{{url('zonedistrict')}}" class="btn btn-warning">View</a>
                                     <a href="{{url('/Admin-dashboard')}}" class="btn btn-danger">X</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <form id="" method="post" class=" right-text-label-form feedback-icon-form" action="{{url('zonedistrictcreated')}}" enctype="multipart/form-data">
                                    @csrf
                       

                                    <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="username1"> Zone Name</label>
                                        <div class="col-sm-5">
                                        <select class="form-control" name="zone_id" id="zone_id">
                                            <option value="">Select One</option>
                                            @if($zone)
                                            @foreach($zone as $zonedata)
                            <option value="{{$zonedata->id}}">{{$zonedata->zone_name}}</option>
                                            @endforeach
                                            @endif
                                          </select>
                                        </div>
                                    </div>
                                    
                                    
                                    
                                    <div class="form-group row">
                                        
                                        <div class="col-sm-12" style="background:#c4c4c4;padiing:10px;">
                                       <center><input id="chkbx_all"  onclick="return check_all()" type="checkbox"  />&nbsp; 
                                                <span><strong class="text-danger ">Select All</strong></span></center> 
                                </div>
                                </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="username1"> District Name</label>
                                        <div class="col-sm-5">

                                           
                
                                           @if($district)
                                            @foreach($district as $districtdata)

                                            @php
                                            $thana = DB::table('thanas')->where('district_id',$districtdata->id)->get();
                                            @endphp
                                             
                     <input class="check_elmnt" type="checkbox"  name="district_id[]" onclick="return chekMain('{{$districtdata->id}}')" id="district_id-{{$districtdata->id}}" value="{{$districtdata->id}}"/>&nbsp; 
                     <span><strong class="text-success ">{{$districtdata->district_name}}</strong></span>
                     <br>
                     @if($thana)
                     @foreach($thana as $thanadata)
                        
<input type="checkbox" name="thana_id[]" id="thana_id-{{$districtdata->id}}"  value="{{$thanadata->id}}" class="check_elmnt2" /> &nbsp; 
                 {{$thanadata->thana_name}} &nbsp;&nbsp;

                 @endforeach
                 @endif
                 <hr>


                                            @endforeach
                                            @endif
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
       
          if($('#district_id-'+getID).is(':checked')){
              
            $("input#thana_id-"+getID).attr('disabled', false);
            $("input#thana_id-"+getID).attr('checked', true);
          
          }else{
            $("input#thana_id-"+getID).attr('disabled', true);
            $("input#thana_id-"+getID).attr('checked', false);
          
          }
      
        }


</script>