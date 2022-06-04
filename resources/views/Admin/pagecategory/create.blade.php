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
                                   	Page Category
                                </div> 
                                <a href="{{route('pagecategory.index')}}"><button class="btn btn-info" style="float: right;">Page Category List</button></a>
                        
                            </div>
                            <div class="card-body">
                                <form id="" method="post" class=" right-text-label-form feedback-icon-form" action="{{route('pagecategory.store')}}" enctype="multipart/form-data">
                                    @csrf
                                
                                    <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="username1">Name</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="name" placeholder="Name" required="" >
                                        </div>
                                    </div>
                          
                                    <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="username1">Status</label>
                                        <div class="col-sm-6">
                                            <select name="status" class="form-control">
                                                <option value="1">Active</option>
                                                <option value="0">Inaction</option>
                                            </select>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <div class="col-sm-8 ml-auto">
                                            <button type="submit" class="btn btn-success" name="signup1" value="Sign up">Save</button>
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