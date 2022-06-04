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
                                    Product Stock
                                </div> 
                                <div class="card-title" style="float: right;">
                                    <a href="{{url('/viewproductstock')}}" class="btn btn-warning">View</a>
                                    <a href="{{url('/Admin-dashboard')}}" class="btn btn-danger">X</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <form id="" method="post" class=" right-text-label-form feedback-icon-form" action="{{url('updateproductstock/'. $view->id)}}" enctype="multipart/form-data">
                                    @csrf
                       

                                             <input type="hidden" class="form-control" id="admin_id" name="admin_id"  value="{{Auth('admin')->user()->id}}" />
                              
                                        
                                        
                                        @php
                                         
                                         $prouct = DB::table('product_productinfo')->get();
                                         
                                        @endphp
                                
                                    <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="username1">Product Name</label>
                                        <div class="col-sm-5">
                                            <select name="product_id" class="form-control searchjs">
                                                @if(isset($prouct))
                                                @foreach($prouct as $data)
                                                <option value="{{$data->product_id}}" <?php if($data->product_id == $view->product_id) echo "selected" ?>>{{$data->product_name}}</option>
                                                @endforeach
                                                @endif
                                            </select>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="username1">Quentity</label>
                                        <div class="col-sm-5">
                                            <input type="number" class="form-control" id="quentity" name="quentity" placeholder="" value="{{ $view->quentity }}"  />
                                        </div>
                                    </div>
                                    
            
                                

                                    <div class="form-group row">
                                        <div class="col-sm-8 ml-auto">
                                            <button type="submit" class="btn btn-info" name="signup1" value="Update">Update</button>
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