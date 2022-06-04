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
                                    Add Product Stock
                                </div> 
                                <div class="card-title" style="float: right;">
                                    <a href="{{url('/viewproductstock')}}" class="btn btn-warning">View</a>
                                    <a href="{{url('/Admin-dashboard')}}" class="btn btn-danger">X</a>
                                </div>
                            </div>
                            <div class="card-body">
                                <form id="" method="post" class=" right-text-label-form feedback-icon-form" action="{{url('addproductstock')}}" enctype="multipart/form-data">
                                    @csrf
                       

                                             <input type="hidden" class="form-control" id="admin_id" name="admin_id"  value="{{Auth('admin')->user()->id}}" />
                                             
                                             
                                             
                                 
            
                      
                      
                      
                      
                          <div class="control-group">
                        <label class="control-label">Product id</label>
                        <div class="controls">
                          <input type="text" name="product_code" id="product_code" class="form-control" onkeyup="productdetails()">
                        </div>
                      </div>
                      
                      
                      <div class="control-group">
                        <label class="control-label">Item Name</label>
                        <div class="controls">
                            <input type="text" name="item_name" id="item_name" class="form-control" readonly>
                            <input type="hidden" name="item_id" id="item_id" class="form-control">
                        </div>
                      </div>


                      <div class="control-group">
                        <label class="control-label">Category Name</label>
                        <div class="controls">
                             <input type="text" name="category_name" id="category_name" class="form-control" readonly>
                            <input type="hidden" name="category_id" id="category_id" class="form-control">
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label">subCategory Name</label>
                        <div class="controls">
                            <input type="text" name="subcategory_name" id="subcategory_name" class="form-control" readonly>
                            <input type="hidden" name="subcategory_id" id="subcategory_id" class="form-control">
                        </div>
                      </div>


                      <div class="control-group">
                        <label class="control-label">Product Name</label>
                        <div class="controls">
                           <input type="text" name="product_name" id="product_name" class="form-control" readonly>
                           <input type="hidden" name="product_id" id="product_id" class="form-control">
                           
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label">Size</label>
                        <div class="controls">
                           <div id="sizeinfo"></div>
                           
                        </div>
                      </div>
                      
                      <div class="control-group">
                        <label class="control-label">Color</label>
                        <div class="controls">
                        <div id="colorinfo"></div>
                           
                        </div>
                      </div>
                      
                      

                      <!--<div class="control-group">-->
                      <!--  <label class="control-label">Quentity</label>-->
                      <!--  <div class="controls">-->
                      <!--     <input type="number" name="quentity" id="quentity" class="form-control" required>-->
                           
                      <!--  </div>-->
                      <!--</div>    -->
                      
                      
                      <br>
                <div class="form-group">
      <div class="input_fields_wrap" >
        <div class="row">
          <div class="col-md-2 col-4">
                <label> Color : </label> 
                <label>  
                    <select class="custom-select" id="inputGroupSelect03" name="color[]"  style="width:150px">
                        <option selected>Choose...</option>
                        <option>None</option>
                                  @if($color)
                        @foreach($color as $colordata)
                        <option value="{{$colordata->color_title}}">{{$colordata->color_title}}</option>
                        @endforeach
                        @endif
                    </select>
                </label>
          </div>
      
          <div class="col-md-2 col-4">
                <label> Size : </label> 
                <label>  
          
                     <select class="custom-select" id="inputGroupSelect03" name="size[]"  style="width:150px">
                        
                        <option>None</option>
                        @if($size)
                        @foreach($size as $sizedata)
                        
                       <option value="{{$sizedata->size_title}}">{{$sizedata->size_title}}</option>
                        @endforeach
                        @endif
                    </select>
                </label>
          </div>
          <div class="col-md-2 col-4">

                <label> Qun : </label>
                <label>  
                    <input type="text" name="qun[]"   style="max-width:100px"  class="form-control" placeholder="10">  
                </label>
          </div>
          </div>
        </div>

      </div>
      <div class="form-group">
      <button class="add_field_button btn btn-info" style="border-radius: 0px; ">Add More Fields</button>
    </div>

<br>


                                    <div class="form-group row">
                                        <div class="col-sm-8 ml-auto">
                                            <button type="submit" class="btn btn-success" name="signup1" value="Save">Save</button>
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




function GetCategory() {
  var item_id=$('#item_id').val();
  if (item_id!=0) {
      $.ajax({
        headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
        url: '{{ url("CreateProductGetCategory") }}',
        type: 'POST',
        data: {id: item_id},
        success: function(data){
          $('#category_id').html(data);
          //GetBrand(); 
        }
      });
  } 
  else {
    $('#category_id').html('<option value="0">Select A Category</option>');
  }
}

function getsubcat() {
  var category_id=$('#category_id').val();
  if (category_id!=0) {
      $.ajax({
        headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
        url: '{{ url("CreateProductGetsubCategory") }}',
        type: 'POST',
        data: {id: category_id},
        success: function(data){
          $('#subcategory_id').html(data);
          //GetBrand(); 
        }
      });
  } 
  else {
    $('#subcategory_id').html('<option value="0">Select A subCategory</option>');
  }
}


function getmultisubcat() {
  var subcategory_id=$('#subcategory_id').val();
  if (subcategory_id!=0) {
      $.ajax({
        headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
        url: '{{ url("CreateProductGetmultisubCategory") }}',
        type: 'POST',
        data: {id: subcategory_id},
        success: function(data){
          $('#multiple_subcategory_id').html(data);
          //GetBrand(); 
        }
      });
  } 
  else {
    $('#subcategory_id').html('<option value="0">Select A MultiSubCategory</option>');
  }
}





function productdetails() {
  var product_code=$('#product_code').val();
 
  if (product_code!=0) {
      $.ajax({
        headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
        url: '{{ url("productdetails") }}',
        type: 'POST',
        data: {product_code: product_code},
        success: function(data){
          $('#category_name').val(data.category_name);
          $('#category_id').val(data.category_id);
          $('#subcategory_name').val(data.subcategory_name);
          $('#subcategory_id').val(data.subcategory_id);
          $('#product_name').val(data.product_name);
          $('#product_id').val(data.product_id);
          $('#item_name').val(data.item_name);
          $('#item_id').val(data.item_id);
          getsize(product_code);
          getcolor(product_code);
         
        }
      });
  } 
  else {
    $('#product_code').html('');
  }
}







function getsize(product_code) {
  if (product_code!=0) {
      $.ajax({
        headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
        url: '{{ url("getsize") }}',
        type: 'POST',
        data: {product_code: product_code},
        success: function(data){
          $('#sizeinfo').html(data);
          //GetBrand(); 
        }
      });
  } 
  else {
    $('#sizeinfo').html('');
  }
}

function getcolor(product_code) {
  if (product_code!=0) {
      $.ajax({
        headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
        url: '{{ url("getcolor") }}',
        type: 'POST',
        data: {product_code: product_code},
        success: function(data){
          $('#colorinfo').html(data);
          //GetBrand(); 
        }
      });
  } 
  else {
    $('#colorinfo').html('');
  }
}






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

<script type="text/javascript">
	$(document).ready(function() {
    var max_fields      = 30; //maximum input boxes allowed
    var wrapper         = $(".input_fields_wrap"); //Fields wrapper
    var add_button      = $(".add_field_button"); //Add button ID
    
    var x = 1; //initlal text box count
    $(add_button).click(function(e){ //on add input button click
        e.preventDefault();
        if(x < max_fields){ //max input box allowed
            x++; //text box increment
            $(wrapper).append('<div class="row"> <div class="col-md-2 col-4"><label>  Color : </label><label> <select class="custom-select" id="inputGroupSelect03" name="color[]"  style="width:150px"><option selected>Choose...</option> @if($size)@foreach($color as $colordata) <option value="{{$colordata->color_title}}">{{$colordata->color_title}}</option> @endforeach @endif </select></label> </div>  <div class="col-md-2 col-4"><label>  Size : </label><label><select class="custom-select" id="inputGroupSelect03" name="size[]" style="width:150px"> @if($size)@foreach($size as $sizedata) <option value="{{$sizedata->size_title}}">{{$sizedata->size_title}}</option> @endforeach @endif </select></div><div class="col-md-2 col-4"><label>  Qun : </label><label><input type="text" name="qun[]"   style="max-width:100px" placeholder="10" class="form-control"></label> </div>  <a href="#" class="remove_field">Remove</a></div>'); 


            //add input box
        }
    });
    
    $(wrapper).on("click",".remove_field", function(e){ //user click on remove text
        e.preventDefault(); $(this).parent('div').remove(); x--;
    })
});
</script>

