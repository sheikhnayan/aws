@include('Admin.header')

<br>
<br>
<br>






<div class="main-content" style="overflow: hidden;">

            <!--page title start-->
            <div class="page-title" style="float: left;">
                <h4 class="mb-0">
                    <small>Payment Method</small>
                </h4>
              
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
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Holder Name</th>
                                        <th>Account Number</th>
                                        <th>Account Type</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tfoot>
                                    <tr>
                                       <th>SL</th>
                                        <th>Image</th>
                                        <th>Name</th>
                                        <th>Holder Name</th>
                                        <th>Account Number</th>
                                        <th>Account Type</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                        @php
                                        $sl=1;
                                        @endphp
                                        @if(isset($methods))
                                        @foreach($methods as $showdata)
                                      
                                      <tr id="tr-{{$showdata->invoice_id}}">
                                        <td data-toggle="tooltip" title="SL">{{$sl++}}</td>
                                        <td data-toggle="tooltip" title="Order ID"><img src="{{asset('/public/PaymentMethodImage')}}/{{$showdata->image}}" alt=""></td>
                                        <td data-toggle="tooltip" title="Order ID">{{ $showdata->name }}</td>
                                        <td data-toggle="tooltip" title="Order ID">{{ $showdata->account_holder_name }}</td>
                                        <td data-toggle="tooltip" title="Order ID">{{ $showdata->account_number }}</td>
                                        <td data-toggle="tooltip" title="Order ID">{{ $showdata->account_type }}</td>

                                        <td>
                                            @if($showdata->status == '0')
                                            <a class="btn btn-warning btn-sm">Inactive</a>
                                            @elseif($showdata->status == '1')
                                              <a class="btn btn-info btn-sm">Active</a>
                                             @endif
                                        </td>
                                        <td>
                                          <div class="row">
                                             <a href="{{route('paymentmethod.edit', $showdata->id)}}" class="btn btn-outline-warning btn-sm mr-2" target="_blank" style="float: left;">Edit</a>

                                            <form action="{{route('paymentmethod.destroy', $showdata->id)}}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-outline-warning btn-sm" style="float: left;">Delete</button>
                                            </form> 
                                          </div>
                                            

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
