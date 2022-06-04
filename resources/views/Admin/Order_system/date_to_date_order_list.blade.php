@include('Admin.header')

<br>
<br>
<br>






<div class="main-content" style="overflow: hidden;">
            <!--page title start-->
            <div class="page-title" style="float: left;">
                <h4 class="mb-0" style="color:green">
                    <small>From Date:{{$date1}}</small>
                    <small>To Date:{{$date2}}</small>
                </h4>
              
            </div>
            
             <div class="page-title" style="float: right; ">
                  
             <div class="page-title" style="float: right; ">
                 <a href="{{url('/Admin-dashboard')}}" class="btn btn-danger">X</a>
            </div>
            </div>
            <!--page title end-->


            <div class="container" style="overflow-x: scroll;max-height:726px">

                <!-- state start-->
                <div class="row">
                    <div class=" col-sm-12">
                        <div class="mb-4">
                   
                                    <span id="sms"></span>
                            <div class="card-body">
                                <table id="example" class="display nowrap" style="width:100%;text-align:center;">
                                    <thead>
                                    <tr>
                                       <th>SL</th>
                                        <th>Order ID</th>
                                        <th>Date</th>
                                        <th>Date&Time</th>
                                        <th>Bill To Name</th>
                                        <th>Ship To Name</th>
                                        <th>Billing address</th>
                                        <th>shipping address</th>
                                        <th>Billing Phone</th>
                                        <th>Shipping Phone</th>
                                        <th>Shipping Area</th>
                                        <th>Payment Method</th>
                                        <th>Payment Account</th>
                                        <th>Transaction ID</th>
                                        <th>SKU</th>
                                        <th>Unit Price</th>
                                        <th>Discount Percentage</th>
                                        <th>Discount Amount</th>
                                        <th>Discounted Price</th>
                                        <th>Quantity</th>
                                        <th>Delivery Charge</th>
                                        <th>Discount</th>
                                        <th>Sub Total</th>
                                        <th>Grand Total</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>SL</th>
                                        <th>Order ID</th>
                                        <th>Date</th>
                                        <th>Date&Time</th>
                                        <th>Bill To Name</th>
                                        <th>Ship To Name</th>
                                        <th>Billing address</th>
                                        <th>shipping address</th>
                                        <th>Billing Phone</th>
                                        <th>Shipping Phone</th>
                                        <th>Shipping Area</th>
                                        <th>Payment Method</th>
                                        <th>Payment Account</th>
                                        <th>Transaction ID</th>
                                        <th>SKU</th>
                                        <th>Unit Price</th>
                                        <th>Discount Percentage</th>
                                        <th>Discount Amount</th>
                                        <th>Discounted Price</th>
                                        <th>Quantity</th>
                                        <th>Delivery Charge</th>
                                        <th>Discount</th>
                                        <th>Sub Total</th>
                                        <th>Grand Total</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                        
                                    <!--<tr>-->
                                    <!--    <th></th>-->
                                    <!--    <th>From Date</th>-->
                                    <!--    <th>{{$date1}}</th>-->
                                    <!--    <th></th>-->
                                    <!--    <th></th>-->
                                    <!--    <th>To Date</th>-->
                                    <!--    <th>{{$date2}}</th>-->
                                    <!--    <th></th>-->
                                    <!--    <th></th>-->
                                    <!--    <th></th>-->
                                    <!--    <th> </th>-->
                                    <!--    <th> </th>-->
                                    <!--    <th> </th>-->
                                    <!--    <th> </th>-->
                                    <!--    <th></th>-->
                                    <!--    <th></th>-->
                                    <!--    <th> </th>-->
                                    <!--    <th></th>-->
                                    <!--    <th> </th>-->
                                    <!--    <th> </th>-->
                                    <!--    <th></th>-->
                                    <!--    <th></th>-->
                                    <!--</tr>-->
                                    
                                    
                                        @php
                                        $sl=1;
                                        @endphp
                                        @if(isset($data))
                                        @foreach($data as $showdata)
                                      <tr id="tr-{{$showdata->invoice_id}}">
                                        <td data-toggle="tooltip" title="SL">{{$sl++}}</td>
                                        <td data-toggle="tooltip" title="Order ID">{{$showdata->invoice_id}}</td>
                                        <td data-toggle="tooltip" title="Date">{{$showdata->date}}</td>
                                        <td data-toggle="tooltip" title="Date and time">{{$showdata->created_at}}</td>
                                        <td data-toggle="tooltip" title="Bill To Name">{{$showdata->billing_name}}</td>
                                        <td data-toggle="tooltip" title="Ship To Name">{{$showdata->first_name}}&nbsp;{{$showdata->last_name}}</td>
                                        <td data-toggle="tooltip" title="Billing address">{{$showdata->billing_address}}</td>
                                        <td data-toggle="tooltip" title="shipping address">{{$showdata->address}}</td>
                                        <td data-toggle="tooltip" title="Billing Phone">{{$showdata->billing_phone}}</td>
                                        <td data-toggle="tooltip" title="Shipping Phone">{{$showdata->phone}}</td>
                                        <td data-toggle="tooltip" title="Shipping Area">{{$showdata->district_name}},{{$showdata->thana_name}}</td>
                                        <td data-toggle="tooltip" title="Payment Method">{{$showdata->payment_type}}</td>
                                        <td data-toggle="tooltip" title="Payment Account">{{$showdata->mobile_acc}}</td>
                                        <td data-toggle="tooltip" title="Transaction ID">{{$showdata->trans_id}}</td>
                                        
                                        
                                        
                                        
                                        
                                        <td data-toggle="tooltip" title="SKU">
                                            @if($product)
                                            @foreach($product as $productdata)
                                            @if($productdata->invoice_id == $showdata->invoice_id)
                                           <li>{{$productdata->product_id}},</li>
                                            @endif
                                            @endforeach
                                            @endif
                                            <br>
                                        </td>
                                        
                                        <td data-toggle="tooltip" title="Unit Price">{{$showdata->sale_price}}</td>
                                        <td data-toggle="tooltip" title="Discount Percentage">{{floor($showdata->discount_price/$showdata->sale_price*100)}}%</td>
                                        <td data-toggle="tooltip" title="Discount Amount">{{$showdata->discount_price}}</td>
                                        <td data-toggle="tooltip" title="Discounted Price">{{$showdata->current_price}}</td>
                                        <td data-toggle="tooltip" title="Quantity">
                                            @if($product)
                                            @foreach($product as $productdata)
                                            @if($productdata->invoice_id == $showdata->invoice_id)
                                           <li>{{$productdata->quantity}},</li>
                                            @endif
                                            @endforeach
                                            @endif
                                            <br>
                                        
                                        </td>
                                        <td data-toggle="tooltip" title="Delivery Charge">{{$showdata->delivery_charge}}</td>
                                        <td data-toggle="tooltip" title="Discount">{{$showdata->discount}}</td>
                                        <td data-toggle="tooltip" title="Sub Total">{{$showdata->sub_total}}</td>
                                        <td data-toggle="tooltip" title="Grand Total">{{$showdata->grand_total}}</td>
                                        <td>
                                            @if($showdata->status == '0')
                                            <a class="btn btn-warning btn-sm">pending</a>
                                            @elseif($showdata->status == '1')
                                              <a class="btn btn-info btn-sm">process</a>
                                            
                                            @elseif($showdata->status == '5')
                                              <a class="btn btn-primary btn-sm">shipping</a>
                                            @elseif($showdata->status == '2')
                                              <a class="btn btn-secondary btn-sm">on the way</a>
                                            @elseif($showdata->status == '3')
                                              <a class="btn btn-success btn-sm">complete</a>
                                            @elseif($showdata->status == '4')
                                              <a class="btn btn-danger btn-sm">Reject</a>
                                             @endif
                                        </td>
                                        @if(Auth('admin')->user()->type == '1')
                                        <td>


                                            <a class="btn btn-outline-info btn-sm" onclick="penToProOrder('{{$showdata->invoice_id}}')">Process</a>
                                            <a class="btn btn-outline-warning btn-sm" onclick="protoShipping('{{$showdata->invoice_id}}')">Shipping</a>


                                            
                                            <a class="btn btn-outline-primary btn-sm" onclick="proToontheOrder('{{$showdata->invoice_id}}')">On the Way</a>


                                            
                                            <a class="btn btn-outline-success btn-sm" onclick="ontheTosuccOrder('{{$showdata->invoice_id}}')">Complete</a>


                                            
                                            <a class="btn btn-outline-danger btn-sm" onclick="penTorejectOrder('{{$showdata->invoice_id}}')">Reject</a>



                                            <a href="{{url('invoice-paper')}}/{{$showdata->session_id}}" class="btn btn-outline-warning btn-sm" target="_blank">View</a>
                                        </td>
                                        @else
                                        <td>
                                            <a href="{{url('invoice-paper')}}/{{$showdata->session_id}}" class="btn btn-outline-warning btn-sm" target="_blank">View</a>
                                        </td>
                                        @endif
                                    </tr>
                                         @endforeach
                                         @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- state end-->

            </div>
        </div>

@include('Admin.footer')
<script type="text/javascript">

function penToProOrder(id)
{
   if(confirm('are you sure?'))
    $.ajax({

            headers:{ 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
            url:'{{url("penToProOrder")}}',
            type:'POST',
            data:{id:id},
            success:function(data)
            {
                $("#tr-"+id).hide();
                $("#sms").html('<span class="alert alert-success">Order Sent to Proccessign</span>');
            }
        })  

    
}
function protoShipping(id)
{
    if(confirm('are you sure?'))

    $.ajax({

            headers:{ 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
            url:'{{url("protoShipping")}}',
            type:'POST',
            data:{id:id},
            success:function(data)
            {
                $("#tr-"+id).hide();
                $("#sms").html('<span class="alert alert-success">Order Sent to Shipping</span>');
            }
        })  

    
}
  
function proToontheOrder(id)
{
   if(confirm('are you sure?'))
   
    $.ajax({

            headers:{ 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
            url:'{{url("proToontheOrder")}}',
            type:'POST',
            data:{id:id},
            success:function(data)
            {
                $("#tr-"+id).hide();
                $("#sms").html('<span class="alert alert-success">Order Sent By Rider</span>');
            }
        })  

    
}
  
function ontheTosuccOrder(id)
{
   if(confirm('are you sure?'))
   
    $.ajax({

            headers:{ 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
            url:'{{url("ontheTosuccOrder")}}',
            type:'POST',
            data:{id:id},
            success:function(data)
            {
                $("#tr-"+id).hide();
                $("#sms").html('<span class="alert alert-success">Order Delivery Success</span>');
            }
        })  

    
}
  
function penTorejectOrder(id)
{
    if(confirm('are you sure?'))
   
    $.ajax({

            headers:{ 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
            url:'{{url("penTorejectOrder")}}',
            type:'POST',
            data:{id:id},
            success:function(data)
            {
                $("#tr-"+id).hide();
                $("#sms").html('<span class="alert alert-danger">Order Reject</span>');
            }
        })  

    
}
  
</script>