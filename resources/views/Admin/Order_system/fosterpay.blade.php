@include('Admin.header')

<br>
<br>
<br>






<div class="main-content" style="overflow: hidden;">
            <!--page title start-->
            <div class="page-title" style="float: left;">
                <h4 class="mb-0">View Total Online System Payment Order
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
                                        <th>Order ID</th>
                                        <th>Customer ID</th>
                                        <th>Customer Name</th>
                                        <th>Customer Phone</th>
                                        <th>Customer Email</th>
                                        <th>Amount original</th>
                                        <th>Gateway fee</th>
                                        <th>pg card bank_name</th>
                                        <th>pg card bank_country</th>
                                        <th>card number</th>
                                        <th>card holder</th>
                                        <th>currency merchant</th>
                                        <th>convertion rate</th>
                                        <th>ip address</th>
                                        <th>pay status</th>
                                        <th>pg txnid</th>
                                        <th>currency</th>
                                        <th>store_amount</th>
                                        <th>pay time</th>
                                        <th>amount</th>
                                        <th>bank txn</th>
                                        <th>card type</th>
                                        <th>reason</th>
                                        <th>Status</th>
                                        <th>Report</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                        <th>SL</th>
                                        <th>Order ID</th>
                                        <th>Customer ID</th>
                                        <th>Customer Name</th>
                                        <th>Customer Phone</th>
                                        <th>Customer Email</th>
                                        <th>Amount original</th>
                                        <th>Gateway fee</th>
                                        <th>pg card bank_name</th>
                                        <th>pg card bank_country</th>
                                        <th>card number</th>
                                        <th>card holder</th>
                                        <th>currency merchant</th>
                                        <th>convertion rate</th>
                                        <th>ip address</th>
                                        <th>pay status</th>
                                        <th>pg txnid</th>
                                        <th>currency</th>
                                        <th>store_amount</th>
                                        <th>pay time</th>
                                        <th>amount</th>
                                        <th>bank txn</th>
                                        <th>card type</th>
                                        <th>reason</th>
                                        <th>Status</th>
                                        <th>Report</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                        @php
                                        $sl=1;
                                        @endphp
                                        @if(isset($data))
                                        @foreach($data as $showdata)
                                      <tr id="tr-{{$showdata->mer_txnid}}">
                                        <td data-toggle="tooltip" title="SL">{{$sl++}}</td>
                                        <td data-toggle="tooltip" title="Order ID">{{$showdata->mer_txnid}}</td>
                                        <td data-toggle="tooltip" title="Customer ID">{{$showdata->customer_id}}</td>
                                        <td data-toggle="tooltip" title="Customer Name">{{$showdata->cus_name}}</td>
                                        <td data-toggle="tooltip" title="Customer Phone">{{$showdata->cus_phone}}</td>
                                        <td data-toggle="tooltip" title="Customer Email">{{$showdata->cus_email}}</td>
                                        <td data-toggle="tooltip" title="Amount original">{{$showdata->amount_original}}</td>
                                        <td data-toggle="tooltip" title="Gateway fee">{{$showdata->gateway_fee}}</td>
                                        <td data-toggle="tooltip" title="pg card bank_name">{{$showdata->pg_card_bank_name}}</td>
                                        <td data-toggle="tooltip" title="pg card bank_country">{{$showdata->pg_card_bank_country}}</td>
                                        <td data-toggle="tooltip" title="card number">{{$showdata->card_number}}</td>
                                        <td data-toggle="tooltip" title="card holder">{{$showdata->card_holder}}</td>
                                        <td data-toggle="tooltip" title="currency merchant">{{$showdata->currency_merchant}}</td>
                                        <td data-toggle="tooltip" title="convertion rate">{{$showdata->convertion_rate}}</td>
                                        <td data-toggle="tooltip" title="ip address">{{$showdata->ip_address}}</td>
                                        <td data-toggle="tooltip" title="pay status">{{$showdata->pay_status}}</td>
                                        <td data-toggle="tooltip" title="pg txnid">{{$showdata->pg_txnid}}</td>
                                        <td data-toggle="tooltip" title="currency">{{$showdata->currency}}</td>
                                        <td data-toggle="tooltip" title="store_amount">{{$showdata->store_amount}}</td>
                                        <td data-toggle="tooltip" title="pay time">{{$showdata->pay_time}}</td>
                                        <td data-toggle="tooltip" title="amount">{{$showdata->amount}}</td>
                                        <td data-toggle="tooltip" title="bank txn">{{$showdata->bank_txn}}</td>
                                        <td data-toggle="tooltip" title="card type">{{$showdata->card_type}}</td>
                                        <td data-toggle="tooltip" title="reason">{{$showdata->reason}}</td>
                                        
                                        <td data-toggle="tooltip" title="Status">
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
                                        <td data-toggle="tooltip" title="Report">
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

  
</script>