@include('Admin.header')

<br>
<br>
<br>



<div class="main-content" style="overflow: hidden;">
            <!--page title start-->
            <div class="page-title" >
                <h4 class="mb-0">Exchange Request
                    <small></small>
                </h4>
              
            </div>


            <div class="container-fluid" style="overflow-x: scroll; max-height:726px;">

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
                                        <th>Name</th>
                                        <th>Order Number</th>
                                        <th>Number</th>
                                        <th>Email</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                       <th>SL</th>
                                        <th>Name</th>
                                        <th>Order Number</th>
                                        <th>Number</th>
                                        <th>Email</th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                        @php
                                        $sl=1;
                                        @endphp
                                        @if(isset($exchange_requests))
                                        @foreach($exchange_requests as $exchange_request)
                                        
                                        
                                      <tr id="tr-{{$exchange_request->id}}">

                                            <td data-toggle="tooltip" title="SL">{{$sl++}}</td>
                                            <td data-toggle="tooltip" title="Order ID">{{$exchange_request->name}}</td>
                                            <td data-toggle="tooltip" title="Date">{{$exchange_request->order_number}}</td>
                                            <td data-toggle="tooltip" title="Bill To Name">{{$exchange_request->phone_number}}</td>
                                            <td data-toggle="tooltip" title="Ship To Name">{{$exchange_request->email}}</td>
                                            <td data-toggle="tooltip" title="Billing address">{{$exchange_request->created_at}}</td>

                                            <td>
                                                @if($exchange_request->status == '0')
                                                <a class="btn btn-warning btn-sm">Pending</a>
                                                @else
                                                  <a class="btn btn-danger btn-sm">Completed</a>
                                                 @endif
                                            </td>

                                            <td>
                                                <a href="{{url('exchange_request_details')}}/{{$exchange_request->id}}" class="btn btn-outline-warning btn-sm" target="_blank">View</a>

                                                <a href="{{url('delete_exchange_request')}}/{{$exchange_request->id}}" class="btn btn-outline-danger btn-sm">Delete</a>
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
