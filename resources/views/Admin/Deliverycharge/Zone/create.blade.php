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
                                    Create zone Setup
                                </div> 
                                <div class="card-title" style="float: right;">
                                    <a href="{{url('zone')}}" class="btn btn-warning">View</a>
                                     <a href="{{url('/Admin-dashboard')}}" class="btn btn-danger">X</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <form id="" method="post" class=" right-text-label-form feedback-icon-form" action="{{url('zonecreated')}}" enctype="multipart/form-data">
                                    @csrf
                       

                                    <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="username1"> Zone Class</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" id="zone_name" name="zone_name" placeholder=" zone name" value="{{old('zone_name')}}"/>
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