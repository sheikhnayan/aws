@include('User.Seller.header')
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
                                    <a href="{{url('seller-product-view')}}" class="btn btn-warning">View</a>
                                      <a href="{{url('/Admin-dashboard')}}" class="btn btn-danger">X</a>
                                </div>
                            </div>
                            <div class="card-body">
                  <form method="post" action="{{url('sub-product-update',$data->id)}}" name="basic_validate"  novalidate="novalidate" enctype="multipart/form-data">
                   @csrf
                   <div class="row">
<div class="col-md-6">
                      <div class="control-group">
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


                      <div class="control-group">
                        <label class="control-label">Category Name</label>
                        <div class="controls">
                          <select name="category_id" id="category_id" onchange="getsubcat();" class="form-control searchjs1">
                             <option value="{{$data->category_id}}">{{$data->category_name}}</option>
                          </select>
                        </div>
                      </div>


                      <div class="control-group">
                        <label class="control-label">SubCategory Name</label>
                        <div class="controls">
                          <select name="subcategory_id" id="subcategory_id"  class="form-control searchjs2">
                             <option value="{{$data->subcategory_id}}">{{$data->subcategory_name}}</option>
                          </select>
                        </div>
                      </div>


                      <div class="control-group">
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

                      <div class="control-group">
                        <label class="control-label">Seller</label>
                        <div class="controls">
                          <select name="seller_id" id="seller_id" class="form-control searchjs3">

                            @if(isset($seller) && count($seller))
                              @foreach ($seller as $sellerdata)
                              @if($sellerdata->id == $data->seller_id)
                                <option value="{{$sellerdata->id}}">{{$sellerdata->business_name}}</option>
                                @endif

                                <option value="{{$sellerdata->id}}">{{$sellerdata->business_name}}</option>
                              @endforeach
                            @endif
                          </select>
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label">Product Name (English):</label>
                        <div class="controls">
                          <input type="text" name="product_name" id="product_name" class="form-control" placeholder="Product Name (English)"  style="width: 90%" value="{{$data->product_name}}" />
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label">Product Name (Bangla):</label>
                        <div class="controls">
                          <input type="text" name="product_name_bangla" id="product_name_bangla" class="form-control" placeholder="Product Name(Bangla)"  style="width: 90%" value="{{$data->product_name_bangla}}"/>
                        </div>
                      </div>
                      
                      
                      <div class="control-group">
                        <label class="control-label">Min. Quntity</label>
                        <div class="controls">
                          <input type="number" name="min_qunt" id="min_qunt" class="form-control" placeholder="ex:2"  style="width: 90%" value="{{$data->min_qunt}}"/>
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label">Measurement Type:</label>
                        <div class="controls">
                          <select class="form-control searchjs4" name="measurement_type" id="measurement_type">
                            @if($measurementinfo)
                                @foreach ($measurementinfo as $measurement)
                                  <option value="{{$measurement->id}}">{{$measurement->measurement_type}}</option>
                                @endforeach
                              @endif
                          </select>
                        </div>
                      </div>
                      
                 
                    
                      <div class="control-group">
                        <label class="control-label">Product Type:</label>
                        <div class="controls">
                            @if($offer)
                            @foreach($offer as $offerdata)
                            @if($offerdata->type == '3')
                              <input type="checkbox" name="type[]" value="3" checked>&nbsp;Exclusive Product&nbsp;
                            @elseif($offerdata->type == '4')
                            <input type="checkbox" name="type[]" value="4" checked>&nbsp;Best Sale&nbsp;
                            @elseif($offerdata->type == '5')
                              <input type="checkbox" name="type[]" value="5" checked>&nbsp;Express Service&nbsp;
                            @endif
                            @endforeach
                            @endif
                        <input type="checkbox" name="type[]" value="3">&nbsp;Exclusive Product&nbsp;
                        <input type="checkbox" name="type[]" value="4">&nbsp;Best Sale&nbsp;
                        <input type="checkbox" name="type[]" value="5">&nbsp;Express Service&nbsp;
                          
                        </div>
                      </div>

                      <div class="control-group col-sm-12">
                        <label class="control-label">Size:</label>
                        <div class="controls">
                            
                        @if($sizes)
                        @foreach($sizes as $sizesdata)
                        <input type="checkbox" name="size_title[]" value="{{$sizesdata->size}}" checked>
                        <label for="checkbox">{{$sizesdata->size}}</label>
                        @endforeach
                        @endif
                        
                        
                        @if($size)
                        @foreach($size as $sizedata)
                      
                        <input type="checkbox" name="size_title[]" value="{{$sizedata->size_title}}">
                        <label for="checkbox">{{$sizedata->size_title}}</label>
                      
                        @endforeach
                        @endif
                        
                      
                        </div>
                      </div>
                 


                      <div class="control-group col-sm-12">
                        <label class="control-label">Color:</label>
                        <div class="controls">
                            
                        
                           @if($colors)
                        @foreach($colors as $colorsdata)
                        <input type="checkbox" name="color_title[]" value="{{$colorsdata->color}}" checked>
                        <label for="checkbox">{{$colorsdata->color}}</label>
                        @endforeach
                        @endif
                        
                        @if($color)
                        @foreach($color as $colordata)

                        <input type="checkbox" name="color_title[]" value="{{$colordata->color_title}}">
                        <label for="checkbox">{{$colordata->color_title}}</label>

                        @endforeach
                        @endif
                        
                       
                        </div>
                      </div>
                      

                      <div class="control-group">
                        <label class="control-label">Purchase Price:</label>
                        <div class="controls">
                          <input type="number" name="purchase_price" id="purchase_price" class="form-control" placeholder="Purchase Price" style="width: 90%" value="{{$data->purchase_price}}"/>
                        </div>
                      </div>

                      
                      
                      <div class="control-group">
                        <label class="control-label">Sale Price</label>
                        <div class="controls">
                        <input type="number" name="sale_price" id="sale_price" class="form-control" class="form-control" placeholder="Sale Price" style="width: 90%" value="{{$data->sale_price}}"/>
                        </div>
                      </div> 
                      <div class="control-group">
                        <label class="control-label">Discount Amount</label>
                        <div class="controls">
                        <input type="number" name="discount_price" id="discount_price" class="form-control" class="form-control" placeholder="Discount Amount" style="width: 90%" value="{{$data->discount_price}}"/>
                        </div>
                      </div>

                      </div>   

                      <div class="col-md-6">


        

                      <div class="control-group">
                        <label class="control-label">Discount percentage</label>
                        <div class="controls">
                        <input type="number" name="discount_per" id="discount_per" class="form-control" class="form-control" placeholder="Discount percentage" style="width: 90%" value="{{$data->discount_per}}"/>
                        </div>
                      </div>

                      <div class="control-group">
                        <label class="control-label">Current Price</label>
                        <div class="controls">
                        <input type="number" name="current_price" id="current_price" class="form-control" class="form-control" placeholder="Cuurent Price" style="width: 90%" value="{{$data->current_price}}"/>
                        </div>
                      </div>

                      <div class="control-group">
              
                        <label class="control-label">Short Description</label>
                    
                        <div class="controls">
                          <textarea name="product_us" id="product_us" class="form-control" style="resize: none;">{{$data->product_us}}</textarea>
                        </div>
                      </div>  

                      <div class="control-group">
              
                        <label class="control-label">Product Details </label>
                    
                        <div class="controls">
                          <textarea name="product_details" id="product_details" class="form-control" style="resize: none;">{{$data->product_details}}</textarea>
                        </div>
                      </div>        


                      <div class="control-group">
              
                        <label class="control-label">Product condition </label>
                    
                        <div class="controls">
                          <textarea name="condition" id="condition" class="form-control" style="resize: none;">{{$data->condition}}</textarea>
                        </div>
                      </div>        

                      <div class="control-group">
              
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
                      

                    
                      <div class="control-group">
                        <label class="control-label">Published/Unpublish</label>
                    
                        <div class="controls">
                           <select name="status" id="status" class="form-control" >
                            @if($data->status == '1')
                            <option value="1">Published</option>
                            <option value="0">Save as Draft</option>
                            @else
                            <option value="0">Save as Draft</option>
                             <option value="1">Published</option>
                            
                            @endif

                          </select>
                        </div>
                      </div> 

                          <div class="control-group">
              
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
                      </div>

                      <div class="control-group">
              
                        <label class="control-label">Product Image:</label>
                    
                        <div class="controls">
                          <input type="file" name="image[]" id="image" multiple>
                        </div>
                      </div>
             

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
@include('User.Seller.footer')

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
</script>

