@include('Admin.header')

 <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
 

@php
date_default_timezone_set('Asia/Dhaka');
@endphp

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
                                    Create Discount Mela Offer
                                </div> 
                                <div class="card-title" style="float: right;">
                                    <a href="{{url('offer-setup-discount-mela-view')}}" class="btn btn-warning">View</a>
                                     <a href="{{url('/Admin-dashboard')}}" class="btn btn-danger">X</a>
                                </div>
                            </div>
                            <div class="card-body">
                                 <form method="post" action="{{route('offer-setup.store')}}" name="basic_validate"  novalidate="novalidate" enctype="multipart/form-data">
                   @csrf
                   <div class="row">
<div class="col-md-6">
    
    
                      <div class="control-group">
                        <label class="control-label">Product code</label>
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
                        <label class="control-label">Sale Price</label>
                        <div class="controls">
                        <input type="number" name="sale_price" id="sale_price" class="form-control" class="form-control" placeholder="Sale Price" style="width: 90%" value="{{old('sale_price')}}"  onkeyup="calculate()" min="1" />
                        </div>
                      </div> 
                      
                      <div class="control-group">
                        <label class="control-label">Discount Amount</label>
                        <div class="controls">
                        <input type="number" name="discount_price" id="discount_price" class="form-control" class="form-control" placeholder="Discount Amount" style="width: 90%" value="0" onkeyup="calculate()" min="1" />
                        </div>
                      </div>


                      <div class="control-group">
                        <label class="control-label">Discount percentage</label>
                        <div class="controls">
                        <input type="text" name="discount_per" id="discount_per" class="form-control" class="form-control" placeholder="Discount percentage" style="width: 90%" value="{{old('discount_per')}}" min="0" readonly=""/>
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label">Current Price</label>
                        <div class="controls">
                        <input type="number" name="current_price" id="current_price" class="form-control" class="form-control" placeholder="Cuurent Price" style="width: 90%" value="{{old('current_price')}}"/>
                        </div>
                      </div>


                      <div class="control-group" style="display:none">
                        <label class="control-label">Type</label>
                        <div class="controls">
                            
                           
                             <input type="checkbox" name="type[]" value="5" checked>&nbsp;Discount Mela&nbsp;
                            
                       
                        
                        </div>
                      </div>


                      <div class="control-group">
                        <label class="control-label">Start Date&Time</label>
                        <div class="controls">
                          <input type="text" name="start_date" placeholder="2021-01-02 00:01:01" class="form-control" value="{{date('Y-m-d H:i:s')}}">
                          <span style="color:red;font-size:12px">Year-month-day</span>
                        </div>
                      </div>


                      <div class="control-group">
                        <label class="control-label">End Date&Time</label>
                        <div class="controls">
                          <input type="text" name="end_date" placeholder="2021-01-02 24:00:00" class="form-control" value="{{date('Y-m-d H:i:s')}}">
                          <span style="color:red;font-size:12px">Year-month-day</span>
                        </div>
                      </div>





                    
             

                  </div>
           
                  </div>
<br>
                  <div align="center">
           <input type="submit" name="submit" class="btn btn-success">
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

function calculate()
{

  var sale_price = $("#sale_price").val();
  var discount_price = $("#discount_price").val();
  var total=0;


    total = sale_price - discount_price;
    per = (discount_price/sale_price*100);

    $("#current_price").val(total);
    $("#discount_per").val(per.toFixed(0));
  
}



function productdetails() {
  var product_code=$('#product_code').val();
 
  if (product_id!=0) {
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
          $('#image').html('<img src="'+data.image+'">');
          $('#sale_price').val(data.sale_price);
          $('#discount_price').val(data.discount_price);
          $('#discount_per').val(data.discount_per);
          $('#current_price').val(data.current_price);
        }
      });
  } 
  else {
    $('#product_id').html('<option value="0">Select A Product</option>');
  }
}

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

function getproduct() {
  var subcategory_id=$('#subcategory_id').val();
  if (subcategory_id!=0) {
      $.ajax({
        headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
        url: '{{ url("getProduct") }}',
        type: 'POST',
        data: {id: subcategory_id},
        success: function(data){
          $('#product_id').html(data);
          //GetBrand(); 
        }
      });
  } 
  else {
    $('#product_id').html('<option value="0">Select A Product</option>');
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