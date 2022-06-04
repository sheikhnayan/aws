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

    <div class="row">
      <div class=" col-sm-12">
        <div class="mb-4">

      {{--              <div class="row">
                      <div class=" col-sm-4">
                         <form action="{{ url('/adminsearchproduct') }}">
                          <label for="fname">Enter Product Code:</label><br>
                          <input type="text" class="form-control" id="product_code" name="product_code" ><br>
                          <button class="btn btn-success"  type="submit">Search</button>
                      </form> 

                  </div>


                </div> --}}

                <div class="card-body p-0 mt-4">
                  <table id="example" class="display nowrap" style="width:100%">
                    <thead>
                      <tr>

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
                        <th>Offer</th>
                        <th>Image</th>
                        <th>Action</th>
                      </tr>
                    </thead>

                    <tbody >
                     @php
                     $sl=1;
                     @endphp
                     @if(isset($data))
                     @foreach($data as $showdata)
                     <tr id="tr-{{$showdata->id}}">

                      <td>{{$sl++}}</td>
                      <td>{{$showdata->product_id}}</td>
                      <td>{{$showdata->item_name}}</td>
                      <td>{{$showdata->category_name}}</td>

                      <td>{{$showdata->company_name}}</td>

                      <td>{{$showdata->product_name}}</td>
                      <td>{{$showdata->measurement_type ?? ''}}</td>

                      <td>{{$showdata->purchase_price}}</td>
                      <td>{{$showdata->sale_price}}</td>
                      <td>{{$showdata->discount_price}}</td>
                      <td>{{$showdata->current_price}}</td>
                      <td>{{$showdata->min_qunt}}</td>
                      <td>{{$showdata->shipping_name}}</td>
                      <td>
                        @if($showdata->offer_id  == 1)
                        Huge Savings
                        @elseif($showdata->offer_id  == 2)
                        Order More Save more 
                        @elseif($showdata->offer_id  == 3)
                        Special Discount Offers
                        @elseif($showdata->offer_id  == 4)
                        Buy one get 1 free 
                        @elseif($showdata->offer_id  == 5)
                        Special Services
                        @endif
                      </td>
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

                       <a href="{{ url('/deleteadminproduct/'.$showdata->id) }}" class="btn btn-outline-danger" onclick="return confirm('Are you sure?')">Delete</a>

                     </td>
                   </tr>
                   @endforeach
                   @endif
                 </tbody>


               </table>


             </div>
           </div>
         </div>
       </div>


     </div>












   </div>

   @include('Admin.footer')


 </script>
