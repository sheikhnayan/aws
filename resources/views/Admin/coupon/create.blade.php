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
                                    Create Coupon
                                </div> 
                                <div class="card-title" style="float: right;">
                                    <a href="{{route('CouponAdd.index')}}" class="btn btn-warning">View</a>
                                     <a href="{{url('/Admin-dashboard')}}" class="btn btn-danger">X</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <form id="" method="post" class=" right-text-label-form feedback-icon-form" action="{{route('CouponAdd.store')}}" enctype="multipart/form-data">
                                    @csrf
                       

                                    <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="username1">Coupon Name</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" id="coupon_name" name="coupon_name" placeholder="#MIAJAD50" value="{{old('coupon_name')}}"/>
                                        </div>
                                    </div>

                                
                                    <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="username1">Start Date</label>
                                        <div class="col-sm-5">
                                            <input type="date" class="form-control" id="start_date" name="start_date"  value="{{old('start_date')}}" />
                                             <input type="hidden" class="form-control" id="admin_id" name="admin_id"  value="{{Auth('admin')->user()->id}}" />
                                        </div>
                                    </div>
                                

                                
                                    <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="username1">Minimum Price</label>
                                        <div class="col-sm-5">
                                            <input type="number" class="form-control" id="min_price" name="min_price" placeholder="Minimum price" value="{{old('min_price')}}"/>
                                        </div>
                                    </div>
                                
                                    <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="username1">Discount Percantage</label>
                                        <div class="col-sm-5">
                                            <input type="number" class="form-control" id="discout_per" name="discout_per" placeholder="discount per(%)" value="{{old('discout_per')}}"/>
                                        </div>
                                    </div>


                                    <!-- <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="username1">Discount price</label>
                                        <div class="col-sm-5">
                                            <input type="number" class="form-control" id="discout_price" name="discout_price" placeholder="Discount price" value="{{old('discout_price')}}"/>
                                        </div>
                                    </div> -->


                                    <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="username1">Apply coupon</label>
                                        <div class="col-sm-5">
                                            <input type="number" class="form-control" id="apply_coupon" name="apply_coupon" placeholder="Apply Coupon" value="{{old('apply_coupon')}}"/>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="username1">End Date</label>
                                        <div class="col-sm-5">
                                            <input type="date" class="form-control" id="end_date" name="end_date"  value="{{old('end_date')}}"/>
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