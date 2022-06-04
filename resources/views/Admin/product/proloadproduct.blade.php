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
                                        <th>Size Type</th>
                                        <th>Color Type</th>
                                        <th>Purchase Price</th>
                                        <th>Sale Price</th>
                                        <th>Discount Price</th>
                                        <th>Current Price</th>
                                        <th>Minimum Quantity</th>
                                        <th>Type</th>
                                        <!--<th>Image</th>-->
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
                                        <th>Size Type</th>
                                        <th>Color Type</th>
                                        <th>Purchase Price</th>
                                        <th>Sale Price</th>
                                        <th>Discount Price</th>
                                        <th>Current Price</th>
                                        <th>Minimum Quantity</th>
                                        <th>Type</th>
                                        <!--<th>Image</th>-->
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
                                        <td>{{$showdata->current_price}}</td>
                                        <td>{{$showdata->min_qunt}}</td>
                                        <td>{{$showdata->shipping->shipping_name}}</td>
                                        <td>
                                      
                                    <!--        @if($showdata->image)-->
                                    <!--<div uk-lightbox="animation: fade">-->
                                    <!--       <a href="{{asset('/public/productImage')}}/{{$showdata->image}}"> <img src="{{asset('/public/productImage')}}/{{$showdata->image}}" style="width: 50px;height: 50px"></a>-->
                                    <!--    </div>        -->

                                    <!--        @else-->
                                    <!--        <div uk-lightbox="animation: fade">-->
                                    <!--         <a href="{{asset('/public')}}/noimage.png"> <img src="{{asset('/public')}}/noimage.png" style="width: 50px;height: 50px"></a>-->
                                    <!--     </div>-->
                                    <!--     @endif-->


                                        </td>
                                        <td>

                                             @if($showdata->status == '0')
                                            <a href="{{url('productstatusactive',$showdata->id)}}" class="btn btn-outline-danger">Inactive</a>
                                            
                                            @else
                                            <a href="{{url('productstatusinactive',$showdata->id)}}" class="btn btn-outline-success">Active</a>
                                            @endif
                                            
                                            <a href="{{route('product-add.edit',$showdata->id)}}" class="btn btn-outline-primary">Edit</a>
                                            <!--<form method="POST" action="{{ route('product-add.destroy',$showdata->id) }}">-->
                                            <!--    @csrf-->
                                            <!--    {{ method_field('delete') }}-->
                                            <!--    <button type="submit" class="btn btn-outline-danger" onclick="return confirm('Are you sure?')">Delete</button> -->
                                            <!--</form>-->
                                            
                                        </td>
                                    </tr>
                                         @endforeach
                                         @endif
                                        </tbody>
                                        
                                          
                                </table>

                                </form>
                                    <script type="text/javascript">
      $(document).ready(function() {
    $('#example').DataTable( {
         responsive: true,
 
    "lengthMenu": [[10, 5, 15, 25, 50, -1], [10,5,15, 25, 50, "All"]],
        dom: 'Bfrtip',
         buttons: [
            {
                extend: 'copyHtml5',
                exportOptions: {
                    columns: [ 0, ':visible' ]
                }
            },
            {
                extend: 'excelHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'pdfHtml5',
                exportOptions: {
                    columns: ':visible'
                }
            },
            {
                extend: 'print',
                exportOptions: {
                     columns: ':visible'
                }
            },
            'colvis','pageLength'
        ]
    } );
} );

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
                                