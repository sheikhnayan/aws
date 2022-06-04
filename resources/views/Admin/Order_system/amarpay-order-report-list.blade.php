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
                                    <!--<thead>-->
                                    <tr>
                                          <th>SL</th>
                                        <th>Order ID</th>
                                        <th>Aamarpay txnid</th>
                                        <th>Pay status</th>
                                        <th>Customer Name</th>
                                        <th>Customer Phone</th>
                                        <th>Pay time</th>
                                         <th>Store_amount</th>
                                        <th>Amount</th>
                                        <th>Bank txn</th>
                                        <th>Card type</th>
                                        <th>Reason</th>
                                        <th>Order View</th>
                                    </tr>
                                    <!--</thead>-->
                                    <tfoot>
                                    <tr>
                                        <th>SL</th>
                                        <th>Order ID</th>
                                        <th>Aamarpay txnid</th>
                                        <th>Pay status</th>
                                        <th>Customer Name</th>
                                        <th>Customer Phone</th>
                                        <th>Pay time</th>
                                         <th>Store_amount</th>
                                        <th>Amount</th>
                                        <th>Bank txn</th>
                                        <th>Card type</th>
                                        <th>Reason</th>
                                        <th>Order View</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                        @php
                                        $sl=1;
                                        $total=0;
                                        $totals=0;
                                        @endphp
                                        @if(isset($data))
                                        @foreach($data as $showdata)
                                        
                                        @php
                                        $total+=$showdata->amount;
                                        $totals+=$showdata->store_amount;
                                        @endphp
                                      <tr id="tr-{{$showdata->mer_txnid}}">
                                        <td>{{$sl++}}</td>
                                        <td>{{$showdata->mer_txnid}}</td>
                                        <td>{{$showdata->pg_txnid}}</td>
                                        <td>{{$showdata->pay_status}}</td>
                                        <td>{{$showdata->cus_name}}</td>
                                        <td>{{$showdata->cus_phone}}</td>
                                        <td>{{$showdata->pay_time}}</td>
                                        <td>{{$showdata->store_amount}}</td>
                                        <td>{{$showdata->amount}}</td>
                                        <td>{{$showdata->bank_txn}}</td>
                                        <td>{{$showdata->card_type}}</td>
                                        <td>{{$showdata->reason}}</td>
                                        <td>
                                            <a href="{{url('invoice-paper')}}/{{$showdata->session_id}}" class="btn btn-outline-warning btn-sm" target="_blank">View</a>
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