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
                                   	SEO Setting
                                </div> 
                        
                            </div>
                            <div class="card-body">
                                <form id="" method="post" class=" right-text-label-form feedback-icon-form" action="{{route('seosetting.store')}}" enctype="multipart/form-data">
                                    @csrf
                       

                                
                                    <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="username1">Meta title</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control" name="meta_title" placeholder="Meta title" required="">
                                        </div>
                                    </div>
                                    
                                      <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="username1">Meta Description</label>
                                        <div class="col-sm-6">
                                            <textarea name="meta_des" id="" class="form-control" placeholder="Meta Description"></textarea>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="username1">Meta Keywords</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control"  name="meta_keywords" placeholder="Meta Keywords" >
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="username1">Meta Robots</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control"  name="robots" placeholder="Meta Robots" >
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="username1">Canonical tag</label>
                                        <div class="col-sm-6">
                                            <input type="text" class="form-control"  name="canonical" placeholder="Canonical tag" >
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="username1">Meta Image</label>
                                        <div class="col-sm-6">
                                          
                                            <input type="file" class="form-control"  name="meta_image">
                                            <span>Size: 1200*627px</span>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="username1">Google Analytics Code</label>
                                        <div class="col-sm-6">
                                            <textarea name="google_analytics" id="" cols="30" rows="10" class="form-control"></textarea>
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