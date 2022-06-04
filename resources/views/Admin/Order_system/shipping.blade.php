@include('Admin.header')

<br>
<br>
<br>






<div class="main-content" style="overflow: hidden;">
    @include('Admin.modal')
            <!--page title start-->
            <div class="page-title" style="float: left;">
                <h4 class="mb-0">View Total Order
                    <small></small>
                </h4>
              
            </div>
            
             <div class="page-title" style="float: right; ">
                   
             <div class="page-title" style="float: right; ">
                 <a href="{{url('/Admin-dashboard')}}" class="btn btn-danger">X</a>
            </div>
            </div>
            <!--page title end-->


            <div class="container" style="overflow-x: scroll; max-height:726px">

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
                                       <!--<th>SL</th>-->
                                        <th>Order ID</th>
                                        <th>Date</th>
                                        <th>Billing Name</th>
                                        <th>Shipping Name</th>
                                        <th>Billing Phone</th>
                                        <th>Shipping Phone</th>
                                        <th>Shipping Area</th>
                                        <th>Payment Method</th>
                                        <th>Transaction ID</th>
                                      
                                        <th>Product Id</th>
                                        <th>Unit Price</th>
                                        <th>Quantity</th>
                                        <th>Delivery Charge</th>
                                        <th>Sub Total</th>
                                        <th>Grand Total</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                       <th>SL</th>
                                       <!--<th>SL</th>-->
                                        <th>Order ID</th>
                                        <th>Date</th>
                                        <th>Billing Name</th>
                                        <th>Shipping Name</th>
                                        <th>Billing Phone</th>
                                        <th>Shipping Phone</th>
                                        <th>Shipping Area</th>
                                        <th>Payment Method</th>
                                        <th>Transaction ID</th>
                                        <th>Product Id</th>
                                        
                                        <th>Unit Price</th>
                                        <th>Quantity</th>
                                        <th>Delivery Charge</th>
                                        <th>Sub Total</th>
                                        <th>Grand Total</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                        @php
                                        $sl=1;
                                        @endphp
                                        @if(isset($data))
                                        @foreach($data as $showdata)
                                        
                                        <?php 
                                            $guest = DB::table('guest')->where('id', $showdata->guest_id)->first();
                                            $delivery_info = DB::table('delivery_infos')->where('id', $showdata->delivery_id)->first();
                                            $zone = DB::table('zones')->where('id', $delivery_info->zone_id)->first();
                                            $shopping_cart = DB::table('shopping_carts')->where('session_id', $showdata->session_id)->first();
                                            $product_productinfo = DB::table('product_productinfo')->where('id', $shopping_cart->product_id)->first();

                                            $product = DB::table('invoices')
                                                ->join('shopping_carts','shopping_carts.session_id','invoices.session_id')
                                                ->join('product_productinfo','product_productinfo.id','shopping_carts.product_id')
                                                ->select('product_productinfo.product_name','product_productinfo.current_price',
                                                'product_productinfo.product_id','invoices.invoice_id','shopping_carts.quantity','shopping_carts.discount_price as dp',
                                                'shopping_carts.sale_price as sp','shopping_carts.current_price as cp')
                                                ->where('invoices.invoice_id',$showdata->invoice_id)
                                                ->get();

                                        ?>

                                        @php
                                        




                                        @endphp
                                      <tr id="tr-{{$showdata->invoice_id}}">
                                        
                                        <td title="SL">{{$sl++}}</td>
                                        <td title="Order ID">{{$showdata->invoice_id}}</td>
                                        <td title="Date">{{$showdata->created_at}}</td>
                                        <td title="Bill To Name">{{$guest->first_name ?? ''}}</td>
                                        <td title="Bill To Name">{{$delivery_info->first_name ?? ''}}</td>

                                        <td title="Billing Phone">{{$guest->phone ?? ''}}</td>
                                        <td title="Billing Phone">{{$delivery_info->phone ?? ''}}</td>
                                        <td title="Shipping Area">{{$delivery_info->address ?? ''}}, {{ $zone->zone_name ?? '' }}</td>
                                        <td title="Payment Method">{{$showdata->payment_type ?? ''}}</td>
                                        <td title="Transaction ID">{{$showdata->trans_id ?? ''}}</td>
                                      
                                        <td title="SKU">
                                            @if($product)
                                            @foreach($product as $productdata)

                                           <li>{{$productdata->product_id}},</li>

                                            @endforeach
                                            @endif
                                            <br>
                                        
                                        </td>
   

                                      <td title="Unit Price">
                                            
                                             @if($product)
                                            @foreach($product as $productdata)

                                           <li>{{$productdata->sp}},</li>

                                            @endforeach
                                            @endif
                                            <!--{{$shopping_cart->sale_price}}-->
                                        
                                        
                                        </td>
                                        <td title="Quantity">
                                            @if($product)
                                            @foreach($product as $productdata)

                                           <li>{{$productdata->quantity}},</li>

                                            @endforeach
                                            @endif
                                            <br>
                                        
                                        </td>
                                        <td title="Delivery Charge">{{$showdata->delivery_charge}}</td>

                                     
                                        <td title="Sub Total">{{$showdata->sub_total}}</td>
                                        <td title="Grand Total">{{$showdata->grand_total}}</td>
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
                                            @elseif($showdata->status == '6')
                                              <a class="btn btn-info btn-sm">Refound</a>
                                            @elseif($showdata->status == '4')
                                              <a class="btn btn-danger btn-sm">Reject</a>
                                             @endif
                                        </td>
                                        @if(Auth('admin')->user()->type == '1')
                                        <td>
                                            <a class="btn btn-outline-info btn-sm" onclick="loadModelss('{{$showdata->invoice_id}}')" data-toggle="modal" data-target="#myModal" >Edit</a>
                                             @if($showdata->status == '0')
                                             
                                            
                                            <a class="btn btn-outline-info btn-sm" onclick="loadModel('{{$showdata->invoice_id}}')" data-toggle="modal" data-target="#myModal" >Process</a>
                                            <a class="btn btn-outline-warning btn-sm" onclick="protoShipping('{{$showdata->invoice_id}}')">Shipping</a>
                                            <a class="btn btn-outline-primary btn-sm" onclick="proToontheOrder('{{$showdata->invoice_id}}')">On the Way</a>
                                            <a class="btn btn-outline-success btn-sm" onclick="rejecttorefundOrder('{{$showdata->invoice_id}}')">Refound</a>
                                            <a class="btn btn-outline-success btn-sm" onclick="ontheTosuccOrder('{{$showdata->invoice_id}}')">Complete</a>
                                            <a class="btn btn-outline-danger btn-sm" onclick="loadModels('{{$showdata->invoice_id}}')" data-toggle="modal" data-target="#myModal">Reject</a>
                                            @elseif($showdata->status == '1')

                                            <a class="btn btn-outline-warning btn-sm" onclick="protoShipping('{{$showdata->invoice_id}}')">Shipping</a>
                                            <a class="btn btn-outline-primary btn-sm" onclick="proToontheOrder('{{$showdata->invoice_id}}')">On the Way</a>
                                            <a class="btn btn-outline-success btn-sm" onclick="rejecttorefundOrder('{{$showdata->invoice_id}}')">Refound</a>
                                            <a class="btn btn-outline-success btn-sm" onclick="ontheTosuccOrder('{{$showdata->invoice_id}}')">Complete</a>
                                            <a class="btn btn-outline-danger btn-sm" onclick="loadModels('{{$showdata->invoice_id}}')" data-toggle="modal" data-target="#myModal">Reject</a>
                                            
                                            @elseif($showdata->status == '5')
                                            <a class="btn btn-outline-primary btn-sm" onclick="proToontheOrder('{{$showdata->invoice_id}}')">On the Way</a>
                                            <a class="btn btn-outline-success btn-sm" onclick="rejecttorefundOrder('{{$showdata->invoice_id}}')">Refound</a>
                                            <a class="btn btn-outline-success btn-sm" onclick="ontheTosuccOrder('{{$showdata->invoice_id}}')">Complete</a>
                                            <a class="btn btn-outline-danger btn-sm" onclick="loadModels('{{$showdata->invoice_id}}')" data-toggle="modal" data-target="#myModal">Reject</a>
                                            @elseif($showdata->status == '2')

                                            <a class="btn btn-outline-success btn-sm" onclick="rejecttorefundOrder('{{$showdata->invoice_id}}')">Refound</a>
                                            <a class="btn btn-outline-success btn-sm" onclick="ontheTosuccOrder('{{$showdata->invoice_id}}')">Complete</a>
                                            <a class="btn btn-outline-danger btn-sm" onclick="loadModels('{{$showdata->invoice_id}}')" data-toggle="modal" data-target="#myModal">Reject</a>
                                            @elseif($showdata->status == '3')
                                                  <a class="btn btn-outline-success btn-sm" onclick="rejecttorefundOrder('{{$showdata->invoice_id}}')">Refound</a>
                                            <a class="btn btn-outline-danger btn-sm" onclick="loadModels('{{$showdata->invoice_id}}')" data-toggle="modal" data-target="#myModal">Reject</a>
                                            @elseif($showdata->status == '6')
                                              <a class="btn btn-info btn-sm">Refound</a>
                                            @elseif($showdata->status == '4')
                                              <a class="btn btn-danger btn-sm">Reject</a>
                                             @endif
                                            <a href="{{url('invoice-paper')}}/{{$showdata->session_id}}" class="btn btn-outline-warning btn-sm" target="_blank">View</a>
                                            <!--<a href="{{url('invoice-balance')}}/{{$showdata->invoice_id}}" class="btn btn-outline-info btn-sm" target="_blank">View Balance</a>-->
                                            <!--<a href="{{url('invoice-trans')}}/{{$showdata->invoice_id}}" class="btn btn-outline-primary btn-sm" target="_blank">Pay History</a>-->
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

function loadModel(id)
        {
          $(".modal-body").load("{{URL::to('processorder_note')}}"+'/'+id);
        }
        
        
        
function loadModels(id)
        {
          $(".modal-body").load("{{URL::to('rejectorder_note')}}"+'/'+id);
        }
        
function loadModelss(id)
        {
          $(".modal-body").load("{{URL::to('shipping_address')}}"+'/'+id);
        }
        
function penToProOrder(id)
{
    let note = $("#note").val();
   if(confirm('are you sure?'))
    $.ajax({

            headers:{ 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
            url:'{{url("penToProOrder")}}',
            type:'POST',
            data:{id:id,note:note},
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
     let note=$("#note").val();
    if(confirm('are you sure?'))
   
    $.ajax({

            headers:{ 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
            url:'{{url("penTorejectOrder")}}',
            type:'POST',
            data:{id:id,note:note},
            success:function(data)
            {
                $("#tr-"+id).hide();
                $("#sms").html('<span class="alert alert-danger">Order Reject</span>');
            }
        })  

    
}
  
  
function rejecttorefundOrder(id)
{
    if(confirm('are you sure?'))
   
    $.ajax({

            headers:{ 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
            url:'{{url("rejecttorefundOrder")}}',
            type:'POST',
            data:{id:id},
            success:function(data)
            {
                $("#tr-"+id).hide();
                $("#sms").html('<span class="alert alert-danger">Order Refound</span>');
            }
        })  

    
}
  
</script>