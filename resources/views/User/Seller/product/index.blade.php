@include('User.Seller.header')

<div class="main-content">
    <div class="container">



        <div class="card">
            <div class="card-header d-block">
                  <h3 style="float: right;"><a href="{{url('/seller-dashboard')}}" class="btn btn-danger">X</a></h3>
                <h3>View Product</h3>
            </div>
            <div class="card-body p-0 table-border-style">
                <div class="table-responsive">
                    <table class="table" id="example">
                                    <thead>
                                    <tr>
                                        <th>SL</th>
                                        <th>Product ID</th>
                                        <th>Item Name</th>
                                        <th>Category Name</th>
                                        <th>subCategory Name</th>
                                        <th>Brand Name</th>
                                        <th>Seller Name</th>
                                        <th>Product Name</th>
                                        <th>Measurement Type</th>
                                        <th>Size Type</th>
                                        <th>Color Type</th>
                                        <th>Purchase Price</th>
                                        <th>Sale Price</th>
                                        <th>Discount Price</th>
                                        <th>Discount Percantage</th>
                                        <th>Current Price</th>
                                        <th>Minimum Quantity</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>SL</th>
                                        <th>Product ID</th>
                                        <th>Item Name</th>
                                        <th>Category Name</th>
                                        <th>subCategory Name</th>
                                        <th>Brand Name</th>
                                        <th>Seller Name</th>
                                        <th>Product Name</th>
                                        <th>Measurement Type</th>
                                        <th>Size Type</th>
                                        <th>Color Type</th>
                                        <th>Purchase Price</th>
                                        <th>Sale Price</th>
                                        <th>Discount Price</th>
                                        <th>Discount Percantage</th>
                                        <th>Current Price</th>
                                        <th>Minimum Quantity</th>
                                        <th>Image</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
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
                                        <td>{{$showdata->subcategory_name}}</td>
                                        <td>{{$showdata->company_name}}</td>
                                        <td> 
                                      
                                        @if(Auth('seller')->user()->id == $showdata->seller_id)
                                       {{Auth('seller')->user()->business_name}}
                                        @endif
                                        
                                        </td>
                                        <td>{{$showdata->product_name}}</td>
                                        <td>{{$showdata->measurementName}}</td>
                                         <td> 
                                        @if($size)
                                        @foreach($size as $sized)
                                        @if($sized->product_id == $showdata->id)
                                       {{$sized->size}}
                                        @endif
                                        @endforeach
                                        @endif
                                        </td>
                                         <td> 
                                        @if($color)
                                        @foreach($color as $colord)
                                        @if($colord->product_id == $showdata->id)
                                       {{$colord->color}}
                                        @endif
                                        @endforeach
                                        @endif
                                        </td>
                                        <td>{{$showdata->purchase_price}}</td>
                                        <td>{{$showdata->sale_price}}</td>
                                        <td>{{$showdata->discount_price}}</td>
                                        <td>{{$showdata->discount_per}}</td>
                                        <td>{{$showdata->current_price}}</td>
                                        <td>{{$showdata->min_qunt}}</td>
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
                                            <a href="{{url('sub-productedit/'.$showdata->id)}}" class="btn btn-outline-primary">Edit</a>
                                            <form method="get" action="{{ url('sub-product-delete/'.$showdata->id) }}">
                                              
                                                <button type="submit" class="btn btn-outline-danger">Delete</button> 
                                            </form>
                                            
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

@include('User.Seller.footer')
