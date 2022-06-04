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
                                    Create Item
                                </div> 
                                <div class="card-title" style="float: right;">
                                    <a href="{{route('item-add.index')}}" class="btn btn-warning">View</a>
                                     <a href="{{url('/Admin-dashboard')}}" class="btn btn-danger">X</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <form id="" method="post" class=" right-text-label-form feedback-icon-form" action="{{route('item-add.store')}}" enctype="multipart/form-data">
                                    @csrf
                       

                                
                                    <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="username1">SL</label>
                                        <div class="col-sm-5">
                                            <input type="number" class="form-control" id="sl" name="sl" placeholder="ex:1" value="{{old('sl')}}" />
                                             <input type="hidden" class="form-control" id="admin_id" name="admin_id"  value="{{Auth('admin')->user()->id}}" />
                                        </div>
                                    </div>
                                

                                
                                    <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="username1">Item name</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" id="item_name" name="item_name" placeholder="Item name" value="{{old('item_name')}}"/>
                                        </div>
                                    </div>


                                    <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="picture1">Picture</label>
                                        <div class="col-sm-5">
                                            <input type="file" class="form-control" id="image" name="image" />
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="picture1">Banner</label>
                                        <div class="col-sm-5">
                                            <input type="file" class="form-control" id="banner" name="banner" />
                                        </div>
                                    </div>
                                    
                            {{--         <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="picture1">Setting Home</label>
                                        <div class="col-sm-5">
                                            <input type="checkbox" class="form-control" id="left_menu" name="left_menu" value="1"/>Left Menu&nbsp;
                                            <input type="checkbox" class="form-control" id="shop_by" name="shop_by" value="1"/>Shop By Category's&nbsp;
                                            <input type="checkbox" class="form-control" id="show_home" name="show_home" value="1"/>Home Page Show&nbsp;
                                        </div>
                                    </div>
                                 
                                    <div class="form-group row">
                                        <label class="col-sm-4 control-label" for="picture1">Setting Home Paginate</label>
                                        <div class="col-sm-5">
                                            <input type="text" class="form-control" id="paginate" placeholder="how many product show by item wise ex:12" name="paginate"/>
                                        </div>
                                    </div>
                                  --}}

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