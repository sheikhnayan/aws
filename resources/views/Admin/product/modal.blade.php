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
              Edit Product
            </div> 
            <div class="card-title" style="float: right;">

              <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".bd-example-modal-lg">Upload Image</button>

              <a href="{{route('product-add.index')}}" class="btn btn-warning">View</a>
              <a href="{{url('/Admin-dashboard')}}" class="btn btn-danger">X</a>
            </div>
          </div>
          <div class="card-body">
            <form method="post" action="{{route('product-add.update',$data->id)}}" name="basic_validate"  novalidate="novalidate" enctype="multipart/form-data">
              @method('PATCH')
              @csrf
              <div class="row">
                <div class="col-md-6">

                  <div class="control-group mb-3">
                    <label class="control-label">Item Name</label>
                    <div class="controls">
                      <select name="item_id" onchange="GetCategory();"  id="item_id" class="form-control searchjs">
                        <option value="{{$data->item_id}}">{{$data->item_name}}</option>
                        @if(count($iteminfo))
                        @foreach ($iteminfo as $item)
                        @if($item->id != $data->item_id)
                        <option value="{{$item->id}}">{{$item->item_name}}</option>
                        @endif
                        @endforeach
                        @endif

                      </select>
                    </div>
                  </div>


                  <div class="control-group mb-3">
                    <label class="control-label">Category Name</label>
                    <div class="controls">
                      <select name="category_id" id="category_id" onchange="getsubcat();" class="form-control searchjs1">
                       <option value="{{$data->category_id}}">{{$data->category_name}}</option>
                     </select>
                   </div>
                 </div>

                  <div class="control-group mb-3">
                    <label class="control-label">Sub Category Name</label>
                    <div class="controls">
                      <select name="subcategory_id" id="subcategory_id" class="form-control searchjs1">
                       <option value="{{$subcategory->subcategory_id ?? ''}}">{{$subcategory->subcategory_name ?? ''}}</option>
                     </select>
                   </div>
                 </div>


                 <div class="control-group mb-3">
                  <label class="control-label">Brand Name</label>
                  <div class="controls">
                    <select name="brand_id" id="brand_id" class="form-control searchjs3">
                      <option value="{{$data->brand_id}}">{{$data->company_name}}</option>
                      @if(isset($company) && count($company))
                      @foreach ($company as $com)
                      @if($com->id != $data->brand_id)
                      <option value="{{$com->id}}">{{$com->company_name}}</option>
                      @endif
                      @endforeach
                      @endif
                    </select>
                  </div>
                </div>

                @if(Auth('admin')->user()->id == '1' || Auth('admin')->user()->id == '26')
                <div class="control-group mb-3">
                  <label class="control-label">Product Code</label>
                  <div class="controls">
                    <input type="text" name="product_id" id="product_id" class="form-control" placeholder="Productcode"   value="{{$data->product_id}}" />
                  </div>
                </div>
                @else
                <input type="hidden" name="product_id" id="product_id" class="form-control" placeholder="Productcode"   value="{{$data->product_id}}" />
                @endif

                <div class="control-group mb-3">
                  <label class="control-label">Product Name:</label>
                  <div class="controls">
                    <input type="text" name="product_name" id="product_name" class="form-control" placeholder="Product Name (English)"   value="{{$data->product_name}}" />
                  </div>
                </div>


                <div class="control-group mb-3">
                  <label class="control-label">Min. Quntity</label>
                  <div class="controls">
                    <input type="number" min="1" name="min_qunt" id="min_qunt" class="form-control" placeholder="ex:2"   value="{{$data->min_qunt}}"/>
                  </div>
                </div>

                <div class="control-group mb-3">
                  <label class="control-label">Measurement Type:</label>
                  <div class="controls">
                    <select class="form-control searchjs4" name="measurement_type" id="measurement_type">
                      @if($measurementinfo)
                      @foreach ($measurementinfo as $measurement)
                      <option value="{{$measurement->id}}" @php if ($data->measurement_type == $measurement->id) { echo "selected"; } @endphp>{{$measurement->measurement_type}}</option>
                      @endforeach
                      @endif
                    </select>
                  </div>
                </div>



                <!-- <div class="control-group mb-3">
                    <label class="control-label text-danger"><b>Call For Order ??</b></label>
                    <div class="controls">
                        <select name="call_for_order" id="call_for_order" class="form-control" required="" >
                            <option value="Yes" @php if ($data->call_for_order == 'Yes') { echo "selected"; } @endphp>Yes</option>
                            <option value="No" @php if ($data->call_for_order == 'No') { echo "selected"; } @endphp>No</option>
                        </select>
                    </div>
                </div> -->


                <div class="control-group mb-3">
                  <label class="control-label">Purchase Price:</label>
                  <div class="controls">
                    <input type="number" name="purchase_price" id="purchase_price" class="form-control" placeholder="Purchase Price"  value="{{$data->purchase_price}}"/>
                  </div>
                </div>



                <div class="control-group mb-3">
                  <label class="control-label">Sale Price</label>
                  <div class="controls">
                    <input type="number" name="sale_price" id="sale_price" class="form-control" class="form-control" placeholder="Sale Price"  value="{{$data->sale_price}}" onkeyup="calculate()"/>
                  </div>
                </div> 

                <div class="control-group mb-3">
                  <label class="control-label">Discount percentage</label>
                  <div class="controls">
                    <input type="number" name="discount_per" id="discount_per" class="form-control" class="form-control" placeholder="Discount percentage"  value="{{$data->discount_per}}" onkeyup="calculateDiscountAmount()"/>
                  </div>
                </div>

                <div class="control-group mb-3">
                  <label class="control-label">Discount Amount</label>
                  <div class="controls">
                    <input type="number" name="discount_price" id="discount_price" class="form-control" class="form-control" placeholder="Discount Amount"  value="{{$data->discount_price}}" onkeyup="calculateDiscountPercent()" />
                  </div>
                </div>





                <div class="control-group mb-3">
                  <label class="control-label">Current Price</label>
                  <div class="controls">
                    <input type="number" name="current_price" id="current_price" class="form-control" class="form-control" placeholder="Cuurent Price"  value="{{$data->current_price}}" readonly="" />
                  </div>
                </div>




              </div>   

              <div class="col-md-6">




                <div class="control-group mb-3">

                  <label class="control-label">Short Description</label>

                  <div class="controls">
                    <textarea name="product_us" id="product_us" class="form-control" style="resize: none;">{{$data->product_us}}</textarea>
                  </div>
                </div>  

                <div class="control-group mb-3">

                  <label class="control-label">Product Details </label>

                  <div class="controls">
                    <textarea name="product_details" id="product_details" class="form-control" style="resize: none;">{{$data->product_details}}</textarea>
                  </div>
                </div>        



                <div class="control-group mb-3">

                  <label class="control-label">Stock Available/Out</label>

                  <div class="controls">
                    <select name="stock_status" id="stock_status" class="form-control" >
                      @if($data->stock_status == '1')
                      <option value="1">Stock Available</option>
                      <option value="0">Stock Out</option>
                      @else
                      <option value="0">Stock Out</option>
                      <option value="1">Stock Available</option>
                      @endif

                    </select>
                  </div>
                </div>

                <div class="control-group mb-3">
                    <label class="control-label">Size</label>
                    <div class="controls">
                        <select name="size_title[]" id="size_title" class="form-control productSize" multiple="" required="">
                            <option value="">Select </option>
                           
                            @if(count($product_sizes)>0)
                              @foreach ($sizes as $size)
                                @foreach ($product_sizes as $product_size)
                                  <option value="{{ $size->size_title }}" @php if ($product_size->size == $size->size_title) { echo "selected"; } @endphp>
                                      {{ $size->size_title }}
                                  </option>
                                @endforeach
                              @endforeach
                            @else

                              @foreach ($sizes as $size)
                                  <option value="{{ $size->size_title }}">
                                      {{ $size->size_title }}
                                  </option>
                              @endforeach

                            @endif


                           
                        </select>
                    </div>
                </div>

                <div class="control-group mb-3">
                    <label class="control-label">Color</label>
                    <div class="controls">
                        <select name="color_title[]" id="color_title" class="form-control productColor" multiple="" required="">
                            <option value="">Select </option>

                              @if(count($product_colors)>0)
                                @foreach ($colors as $color)
                                  @foreach ($product_colors as $product_color)
                                    <option value="{{ $color->color_title }}" @php if ($product_color->color == $color->color_title) { echo "selected"; } @endphp>
                                        {{ $color->color_title }}
                                    </option>
                                  @endforeach
                                @endforeach
                              @else
                                @foreach ($colors as $color)
                                    <option value="{{ $color->color_title }}">
                                        {{ $color->color_title }}
                                    </option>
                                @endforeach

                              @endif
                        </select>
                    </div>
                </div>

<!--                 <div class="control-group mb-3">

                  <label class="control-label">Shipping Class</label>

                  <div class="controls">
                    <select name="shipping_id" id="shipping_id" class="form-control searchjs5" >

                      @if($shipping)
                      @foreach($shipping as $ship)
                      @if($ship->id == $data->shipping_id)
                      <option value="{{$ship->id}}">{{$ship->shipping_name}}</option>
                      @endif
                      @endforeach
                      @endif 

                      @if($shipping)
                      @foreach($shipping as $ship)
                      @if($ship->id != $data->shipping_id)
                      <option value="{{$ship->id}}">{{$ship->shipping_name}}</option>
                      @endif
                      @endforeach
                      @endif

                    </select>
                  </div>
                </div> -->

                <div class="control-group mb-3">
                    <label class="control-label">Feature Image</label>
                    <div class="controls">
                        @php
                            $path= base_path().'/public/productImage/'.$data->image;
                        @endphp
                        @if($data->image)
                        <img src="{{asset('/public/productImage')}}/{{$data->image}}" alt="" style="width: 50%">
                        @endif

                        <input type="file" name="feature_image" class="form-control">
                    </div>
                </div>




<!--                 <div class="control-group mb-3">

                  <label class="control-label text-danger"><b>Offer Select</b></label>

                  <div class="controls">

                    <select name="offer_id" id="offer_id" class="form-control">

                     <option value="{{ $data->offer_id }}"></option>

                     <option value="1" @php if ($data->offer_id == 1) { echo "selected"; } @endphp>Huge Savings</option>
                     <option value="2" @php if ($data->offer_id == 2) { echo "selected"; } @endphp>Order More Save more</option>
                     <option value="3" @php if ($data->offer_id == 3) { echo "selected"; } @endphp>Discount Offer</option>
                     <option value="4" @php if ($data->offer_id == 4) { echo "selected"; } @endphp>Buy one get 1 free</option>
                     <option value="5" @php if ($data->offer_id == 5) { echo "selected"; } @endphp>Special Services</option>

                   </select>

                 </div>

               </div>
 -->



             </div>
           </div>
           <br>
           <div align="center">
             <input type="submit" name="submit" value="update" class="btn btn-info">
           </div>
         </form>
       </div>
     </div>




   </div>
 </div>
</div>
</div>








<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">

      <form action="{{route('admin/update-multi-image')}}" method="post" enctype="multipart/form-data">
          @csrf
          <div class="col-sm-12 mt-5" style="padding: 10px 50px;background: aliceblue;">
              @if(count($images) > 0)
                  @foreach($images as $image)
                      
                  <table class="table table-striped" id="productImage">
                      <thead>
                      <tr>
                          <th>Image</th>
                          <th></th>
                          <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>
                          <tr>
                              <input type="hidden" value="{{$data->id}}" name="id">

                              @if(isset($image))
                              <td style="width: 100px;">
                                  <div class="form-group">
                                      <img src="{{asset('/public/productImage')}}/{{$image->image}}" alt="Image" style="width: 100%">
                                  </div>
                              </td> 
                              @endif
                              <td><input type="file" class="form-control" name="image[]"></td>

                              <td>
                                <td> <button id="add"  type="button" class="btn btn-success btn-sm add"><i class="fa fa-plus-circle"></i> </button></td>
                              </td>

                              <td>
                                  

                                  <a href="{{route('admin/delete-multi-image', [$image->id])}}"><button  type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> </button></a>
                              </td>
                          </tr>
                          <tr></tr>

                      </tbody>
                  </table>  
              @endforeach
              @else
                  <table class="table table-striped" id="productImage">
                      <thead>
                      <tr>
                          <th>Image</th>
                          <th></th>
                          <th>Action</th>
                      </tr>
                      </thead>
                      <tbody>
                          <tr>
                              <input type="hidden" value="{{$data->id}}" name="id">

                              <td style="width: 100px;">
                                  <div class="form-group">
                                      
                                  </div>
                              </td> 

                              <td><input type="file" class="form-control" name="image[]" ></td>

                                <td> <button id="add"  type="button" class="btn btn-success btn-sm add"><i class="fa fa-plus-circle"></i> </button></td>

                              <td>
                                  

                                  <a href=""><button  type="button" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i> </button></a>
                              </td>

                              
                          </tr>
                          <tr></tr>

                      </tbody>
                  </table> 
              @endif
              <button type="submit" class="btn btn-primary float-sm-right mb-5 mt-5">Update Image</button>

          </div>
      </form>


    </div>
  </div>
</div>










@include('Admin.footer')

<!--<script src="{{URL::to('/')}}/public/editor3/ckeditor.js"></script> -->

<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.css" rel="stylesheet">
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-lite.js"></script>

<script>
  $('#product_us').summernote(); 
  $('#product_details').summernote(); 
  $('#condition').summernote(); 
</script>
<script type="text/javascript">

//CKEDITOR.replace('editor1');

        function calculate()

        {
            var sale_price = $("#sale_price").val();
            var discount_price = $("#discount_price").val();
            var total = 0;

            total = sale_price - discount_price;
            per = (discount_price / sale_price * 100);

            $("#current_price").val(total);
            $("#discount_per").val(per.toFixed(0));
        }
        function calculateDiscountAmount()

        {
            var sale_price = $("#sale_price").val();
            var discount_per = $("#discount_per").val();
            var total = 0;

            discount_price = (sale_price * discount_per)/100;
            current_price = sale_price - discount_price;

            total = sale_price - discount_price;
            per = (discount_price / sale_price * 100);

            $("#current_price").val(current_price);
            $("#discount_price").val(discount_price.toFixed(0));
        }

        function calculateDiscountPercent()

        {
            var sale_price = $("#sale_price").val();
            var discount_price = $("#discount_price").val();
            var total = 0;

            discount_per = ((sale_price - discount_price) / sale_price) * 100;

            current_price = sale_price - discount_price;

            total = sale_price - discount_price;
            per = (discount_price / sale_price * 100);

            $("#current_price").val(current_price);
            $("#discount_per").val(discount_per.toFixed(0) ?? 0);
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


    function TogglePrice() {
        value = $('#call_for_order').val();
        if(value == 'Yes'){
            document.getElementById('purchase_price').readOnly = true;
            document.getElementById('sale_price').readOnly = true;
            document.getElementById('discount_price').readOnly = true;
            document.getElementById('discount_per').readOnly = true;
            document.getElementById('current_price').readOnly = true;

            document.getElementById('purchase_price').value = 0;
            document.getElementById('sale_price').value = 0;
            document.getElementById('discount_price').value = 0;
            document.getElementById('discount_per').value = 0;
            document.getElementById('current_price').value = 0;

        }else{
            document.getElementById('purchase_price').readOnly = false;
            document.getElementById('sale_price').readOnly = false;
            document.getElementById('discount_price').readOnly = false;
            // document.getElementById('discount_per').readOnly = false;
            document.getElementById('current_price').readOnly = false;
        }
    }


    $(document).on('click', '.add', function(){
      var html = '';
      html += '<tr>';
      html += '<td ></td>';
      html += '<td style="width: 100%;"><input type="file" name="image[]" class="form-control" /></td>';
      html += '<td><button type="button" name="remove" class="btn btn-danger btn-sm remove"><span class="fa fa-minus-circle"></span></button></td></tr>';
      $('#productImage').append(html);
    });

    $(document).on('click', '.remove', function() {
        $(this).closest('tr').remove();
    });



</script>

