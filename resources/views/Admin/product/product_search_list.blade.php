@include('Admin.header')

<br>
<br>
<br>






<div class="main-content" style="overflow: hidden;">
            <!--page title start-->
            <div class="page-title" style="float: left;">
                <h4 class="mb-0">View Product
                    <small></small>
                </h4>
              
            </div>
            <div class="page-title" style="float: right; ">
                <a href="{{route('product-add.create')}}" class="btn btn-outline-success">Add product</a> 
                  <a href="{{url('/Admin-dashboard')}}" class="btn btn-danger">X</a>
            </div>
            <!--page title end-->


            <div class="container" style="overflow-x: scroll;">

                <!-- state start-->
                <!--<div class="row">-->
                <!--    <div class=" col-sm-12">-->
                <!--        <div class="mb-4">-->
                   
                <!--                 <div class="row">-->
                <!--              <div class=" col-sm-4">-->
                <!--               <select name="item_id" onchange="GetCategory();" onclick="GetCategory();"  id="item_id" class="form-control searchjs">-->
                <!--                   <option value="">Select Item</option>-->
                <!--                   @if($item)-->
                <!--                   @foreach($item as $itemdata)-->
                <!--                   <option value="{{$itemdata->id}}">{{$itemdata->item_name}}</option>-->
                <!--                   @endforeach-->
                <!--                   @endif-->
                <!--               </select>  -->
                <!--               </div>-->
                <!--               <div class=" col-sm-4">-->
                <!--               <select name="category_id" id="category_id" class="form-control searchjs1">-->
                <!--                   <option value="">Select Category</option>-->
                                    
                <!--               </select>-->
                <!--               </div>-->
                <!--               <div class=" col-sm-4">-->
                <!--               <button class="btn btn-success" onclick="return searchproduct()" onchange="return searchproduct()">Search</button>-->
                <!--               </div>-->
                              
                <!--               </div>-->
                               
                <!--            <div class="card-body" >-->
                                  

                <!--                <div id="showdata">-->
                                    
                <!--                </div>-->
                                
                <!--            </div>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->

   
                <div class="row">
                    <div class=" col-sm-12">
                        <div class="mb-4">
                   
                                 
                               
                                <div class="card-body" >
                                  
                                    <div>
                                       <form method="POST" action="{{ url('product-add-destroy') }}">
                                                @csrf

                               <button class="btn btn-danger" onclick="return confirm('are you sure?')" style="float:right">Delete</button>


                                                            <table id="example" class="display nowrap" style="width:100%">
                                                                <thead>
                                                                <tr>
                                                                     <th>Select<input id="chkbx_all"  onclick="return check_all()" type="checkbox"  /></th>
                                                                    <th>SL</th>
                                                                    <th>Product ID</th>
                                                                    <th>Item Name</th>
                                                                    <th>Category Name</th>
                            
                                                                    <th>Brand Name</th>
                            
                                                                    <th>Product Name</th>
                                                                    <th>Measurement Type</th>
                                                                    <!--<th>Size Type</th>-->
                                                                    <!--<th>Color Type</th>-->
                                                                    <th>Purchase Price</th>
                                                                    <th>Sale Price</th>
                                                                    <th>Discount Price</th>
                                                                    <th>Current Price</th>
                                                                    <th>Minimum Quantity</th>
                                                                    <th>Type</th>
                                                                    <th>Image</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                                </thead>
                                                              <tfoot>
                                                                <tr>
                                                                    <th>Select</th>
                                                                    <th>SL</th>
                                                                    <th>Product ID</th>
                                                                    <th>Item Name</th>
                                                                    <th>Category Name</th>
                            
                                                                    <th>Brand Name</th>
                            
                                                                    <th>Product Name</th>
                                                                    <th>Measurement Type</th>
                                                                    <!--<th>Size Type</th>-->
                                                                    <!--<th>Color Type</th>-->
                                                                    <th>Purchase Price</th>
                                                                    <th>Sale Price</th>
                                                                    <th>Discount Price</th>
                                                                    <th>Current Price</th>
                                                                    <th>Minimum Quantity</th>
                                                                    <th>Type</th>
                                                                    <th>Image</th>
                                                                    <th>Action</th>
                                                                </tr>
                                                                </tfoot>
                                                                <tbody >
                                                                     @php
                                                                    $sl=1;
                                                                    @endphp
                                                                    @if(isset($data))
                                                                    @foreach($data as $showdata)
                                                                  <tr id="tr-{{$showdata->id}}">
                                                                      <td>
                                                                        <input type="checkbox" id="product_id" name="product_id[]" value="{{$showdata->id}}" class="check_elmnt" />
                                                                      </td>
                                                                    <td>{{$sl++}}</td>
                                                                    <td>{{$showdata->product_id}}</td>
                                                                    <td>{{$showdata->item->item_name}}</td>
                                                                    <td>{{$showdata->category->category_name}}</td>
                                                                   
                                                                    <td>{{$showdata->brand->company_name}}</td>
                                                                    
                                                                    <td>{{$showdata->product_name}}</td>
                                                                    <td>{{$showdata->measurment->measurement_type}}</td>
                                                                    
                                                                    <!-- <td> -->
                                                                    <!--    @if($size)-->
                                                                    <!--    @foreach($size as $sized)-->
                                                                    <!--    @if($sized->product_id == $showdata->id)-->
                                                                    <!--   {{$sized->size}}-->
                                                                    <!--    @endif-->
                                                                    <!--    @endforeach-->
                                                                    <!--    @endif-->
                                                                    <!--</td>-->
                                                                    <!-- <td> -->
                                                                    <!--    @if($color)-->
                                                                    <!--    @foreach($color as $colord)-->
                                                                    <!--    @if($colord->product_id == $showdata->id)-->
                                                                    <!--   {{$colord->color}}-->
                                                                    <!--    @endif-->
                                                                    <!--    @endforeach-->
                                                                    <!--    @endif-->
                                                                    <!--</td>-->
                                                                    
                                                                    <td>{{$showdata->purchase_price}}</td>
                                                                    <td>{{$showdata->sale_price}}</td>
                                                                    <td>{{$showdata->discount_price}}</td>
                                                                    <td>{{$showdata->current_price}}</td>
                                                                    <td>{{$showdata->min_qunt}}</td>
                                                                    <td>{{$showdata->shipping->shipping_name}}</td>
                                                                    <td>
                                                                  
                                                                        @if($showdata->image)
                                                                <div uk-lightbox="animation: fade">
                                                                       <a href="{{asset('/public/productImage')}}/{{$showdata->image}}"> <img src="{{asset('/public/productImage')}}/{{$showdata->image}}" style="width: 50px;height: 50px"></a>
                                                                    </div>        
                            
                                                                        @else
                                                                        <div uk-lightbox="animation: fade">
                                                                         <a href="{{asset('/public')}}/noimage.png"> <img src="{{asset('/public')}}/noimage.png" style="width: 50px;height: 50px"></a>
                                                                     </div>
                                                                     @endif
                            
                            
                                                                    </td>
                                                                    <td>
                            
                                                                         @if($showdata->status == '0')
                                                                        <a href="{{url('productstatusactive',$showdata->id)}}" class="btn btn-outline-danger">Inactive</a>
                                                                        
                                                                        @else
                                                                        <a href="{{url('productstatusinactive',$showdata->id)}}" class="btn btn-outline-success">Active</a>
                                                                        @endif
                                                                        
                                                                        <a href="{{route('product-add.edit',$showdata->id)}}" class="btn btn-outline-primary">Edit</a>
                                                                        <form method="POST" action="{{ route('product-add.destroy',$showdata->id) }}">
                                                                            @csrf
                                                                            {{ method_field('delete') }}
                                                                            <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Are you sure?')">Delete</button> 
                                                                        </form>
                                                                        
                                                                    </td>
                                                                </tr>
                                                                     @endforeach
                                                                     @endif
                                                                    </tbody>
                                                                    
                                                                      
                                                            </table>

                                </form>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>


            </div>
        </div>

@include('Admin.footer')
<script type="text/javascript">
//     function GetCategory() {
//   var item_id=$('#item_id').val();
//   if (item_id!=0) {
//       $.ajax({
//         headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
//         url: '{{ url("CreateProductGetCategory") }}',
//         type: 'POST',
//         data: {id: item_id},
//         success: function(data){
//           $('#category_id').html(data);
//           //GetBrand(); 
//         }
//       });
//   } 
//   else {
//     $('#category_id').html('<option value="0">Select A Category</option>');
//   }
// }
//     function searchproduct() {
//   var item_id=$('#item_id').val();
//   var category_id=$('#category_id').val();

//       $.ajax({
//         headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
//         url: '{{ url("proload-product") }}',
//         type: 'POST',
//         data: {item_id: item_id,category_id: category_id},
//         success: function(data){
//           $('#showdata').html(data);
//           //GetBrand(); 
//         }
//       });
   
  
// }


    

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
</script>
