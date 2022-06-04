@include('Admin.header')
@php
$setting = DB::table('settings')->first();
@endphp


<body class="app header-fixed left-sidebar-fixed right-sidebar-fixed right-sidebar-overlay right-sidebar-hidden">

    <!--===========header start===========-->
    
    <!--===========header end===========-->

    <!--===========app body start===========-->

    <style type="text/css">
        .card-shadow{
            font-weight: bold;
            font-size: 20px!important;
        }
    </style>



    <div class="app-body">

        <main class="main-content" style="font-size: 20px;">
            <!--page title start-->
            <div class="page-title">
                <div class="container p-0 mb-2">
                    <div class="row">
                        <div class="col-8">
                            <h3 class="font-weight-bold"> Welcome To <span class="text-danger">{{$setting->title}}</span>
                            </h3>
                     
                        </div>

                    </div>
                </div>
            </div>

            <!--page title end-->


            <div class="container">

                <!--state widget start-->
                <div class="row">

                    @php

                    $totaladmin = DB::table('createadmin')->get();
                    $totalproduct = DB::table('product_productinfo')->count();
                    $activeproduct = DB::table('product_productinfo')->where('status',1)->count();
                    $inactiveproduct = DB::table('product_productinfo')->where('status',0)->count();
                    $totalorder = DB::table('invoices')->count();
                    $process_order = DB::table('invoices')->where('status', 1)->count();
                    $pending_order = DB::table('invoices')->where('status', 0)->count();
                    $shippingg_order = DB::table('invoices')->where('status', 5)->count();
                    $on_the_way_order = DB::table('invoices')->where('status', 2)->count();
                    $complete_order = DB::table('invoices')->where('status', 3)->count();
                    $refound_order = DB::table('invoices')->where('status', 6)->count();
                    $reject_order = DB::table('invoices')->where('status', 4)->count();



                    @endphp

                    <div class="col-xl-3 col-sm-6 mb-4">
                        <div class="card card-shadow bg-success">
                            <div class="card-body ">
                                <i class="icon-people text-light f30"></i>
                                <a href="{{url('view-admin')}}" style="text-decoration:none; color: #f1f1f1;"><h6 class="mb-0 mt-3 text-light font-weight-bold">Total Admin</h6>
                                    <p class="f12 mb-0">{{ count($totaladmin) }}  Users</p></a>
                                </div>
                            </div>
                        </div>

                    </div>

                    <div class="row">
                        
                        <div class="col-xl-3 col-sm-6 mb-4">
                            <div class="card card-shadow bg-info">
                            <div class="card-body ">
                                <i class="icon-chart text-light f30"></i>
                                <a href="{{URL::to('totalOrder')}}" style="text-decoration:none;"><h6 class="mb-0 mt-3 text-light font-weight-bold">Total Order</h6>
                                    <p class="f12 mb-0 text-light">{{$totalorder}}  Orders</p></a>
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="col-xl-3 col-sm-6 mb-4">
                            <div class="card card-shadow bg-success">
                            <div class="card-body ">
                                <i class="icon-chart text-light f30"></i>
                                <a href="{{URL::to('CompleteOrder')}}" style="text-decoration:none;"><h6 class="mb-0 mt-3 text-light font-weight-bold">Complete Order</h6>
                                    <p class="f12 mb-0 text-light">{{$complete_order}}  Orders</p></a>
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="col-xl-3 col-sm-6 mb-4">
                            <div class="card card-shadow bg-info">
                            <div class="card-body ">
                                <i class="icon-chart text-light f30"></i>
                                <a href="{{URL::to('ProcessOrder')}}" style="text-decoration:none;"><h6 class="mb-0 mt-3 text-light font-weight-bold">Process Order</h6>
                                    <p class="f12 mb-0 text-light">{{$process_order}}  Orders</p></a>
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="col-xl-3 col-sm-6 mb-4">
                            <div class="card card-shadow bg-warning">
                            <div class="card-body ">
                                <i class="icon-chart text-light f30"></i>
                                <a href="{{URL::to('pendingOrder')}}" style="text-decoration:none;"><h6 class="mb-0 mt-3 text-light font-weight-bold">Pending Order</h6>
                                    <p class="f12 mb-0 text-light">{{$pending_order}}  Orders</p></a>
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="col-xl-3 col-sm-6 mb-4">
                            <div class="card card-shadow bg-info">
                            <div class="card-body ">
                                <i class="icon-chart text-light f30"></i>
                                <a href="{{URL::to('Shipping-Order')}}" style="text-decoration:none;"><h6 class="mb-0 mt-3 text-light font-weight-bold">Shipping Order</h6>
                                    <p class="f12 mb-0 text-light">{{$shippingg_order}}  Orders</p></a>
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="col-xl-3 col-sm-6 mb-4">
                            <div class="card card-shadow bg-info">
                            <div class="card-body ">
                                <i class="icon-chart text-light f30"></i>
                                <a href="{{URL::to('Shipping-Order')}}" style="text-decoration:none;"><h6 class="mb-0 mt-3 text-light font-weight-bold">One the way Order</h6>
                                    <p class="f12 mb-0 text-light">{{$on_the_way_order}}  Orders</p></a>
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="col-xl-3 col-sm-6 mb-4">
                            <div class="card card-shadow bg-danger">
                            <div class="card-body ">
                                <i class="icon-chart text-light f30"></i>
                                <a href="{{URL::to('Refound-Order')}}" style="text-decoration:none;"><h6 class="mb-0 mt-3 text-light font-weight-bold">Refund Order</h6>
                                    <p class="f12 mb-0 text-light">{{$refound_order}}  Orders</p></a>
                                </div>
                            </div>
                        </div>
                        
                        
                        <div class="col-xl-3 col-sm-6 mb-4">
                            <div class="card card-shadow bg-danger">
                            <div class="card-body ">
                                <i class="icon-chart text-light f30"></i>
                                <a href="{{URL::to('RejectOrder')}}" style="text-decoration:none;"><h6 class="mb-0 mt-3 text-light font-weight-bold">Reject Order</h6>
                                    <p class="f12 mb-0 text-light">{{$reject_order}}  Orders</p></a>
                                </div>
                            </div>
                        </div>
                        
                    </div>
        

                    <div class="row">




                        <div class="col-xl-3 col-sm-6 mb-4">
                            <div class="card card-shadow bg-warning">
                                <div class="card-body ">
                                    <i class="icon-people text-light f30"></i>
                                    <a href="{{url('GuestList')}}" style="text-decoration:none;"><h6 class="mb-0 mt-3 text-light font-weight-bold">Register Users</h6>
                                        <p class="f12 mb-0 text-light">{{$user}}  Users</p></a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-3 col-sm-6 mb-4">
                                <div class="card card-shadow bg-success">
                                    <div class="card-body ">
                                        <i class="icon-people text-light f30"></i>
                                        <a href="{{url('GuestListactive')}}" style="text-decoration:none;color:green;"> <h6 class="mb-0 mt-3 text-light font-weight-bold">Active Users</h6>
                                            <p class="f12 mb-0 text-light">{{$acuser}}  Users</p></a>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-xl-3 col-sm-6 mb-4">
                                    <div class="card card-shadow bg-danger">
                                        <div class="card-body ">
                                            <i class="icon-people text-light f30"></i>
                                            <a href="{{url('GuestListinactive')}}" style="text-decoration:none;"> <h6 class="mb-0 mt-3 text-light font-weight-bold">Inactive Users</h6>
                                                <p class="f12 mb-0 text-light">{{$inuser}}  Users</p></a>
                                            </div>
                                        </div>
                                    </div>







                                    <div class="col-xl-3 col-sm-6 mb-4">
                                        <div class="card card-shadow bg-dark">
                                            <div class="card-body ">
                                                <i class="icon-chart text-light f30"></i>
                                                <a href="" style="text-decoration:none;"> <h6 class="mb-0 mt-3 text-light font-weight-bold">Total Product's</h6>
                                                    <p class="f12 mb-0 text-light">{{ $totalproduct }}  Products</p></a>
                                                </div>
                                            </div>
                                        </div>


                                        <div class="col-xl-3 col-sm-6 mb-4">
                                            <div class="card card-shadow bg-info">
                                                <div class="card-body ">
                                                    <i class="icon-chart text-light f30"></i>
                                                    <a href="" style="text-decoration:none;"> <h6 class="mb-0 mt-3 text-light font-weight-bold">Active Products</h6>
                                                        <p class="f12 mb-0 text-light">{{ $activeproduct }}  Products</p></a>
                                                    </div>
                                                </div>
                                            </div>



                                            <div class="col-xl-3 col-sm-6 mb-4">
                                                <div class="card card-shadow bg-primary">
                                                    <div class="card-body ">
                                                        <i class="icon-chart text-light f30"></i>
                                                        <a href="" style="text-decoration:none;"> <h6 class="mb-0 mt-3 text-light font-weight-bold">Inactive Products</h6>
                                                            <p class="f12 mb-0 text-light">{{ $inactiveproduct }}  Products</p></a>
                                                        </div>
                                                    </div>
                                                </div>



                         








{{-- 
                                <div class="col-xl-3 col-sm-6 mb-4">
                                    <div class="card card-shadow bg-dark">
                                        <div class="card-body ">
                                            <i class="icon-basket-loaded text-light f30"></i>
                                            <a href="{{url('totalOrder')}}" style="text-decoration:none;"><h6 class="mb-0 mt-3 text-light font-weight-bold">Total Order Placed</h6></a>
                                            <p class="f12 mb-0 text-light">{{$order}} Order Placed</p>
                                            <p class="f12 mb-0 text-light">MRP: {{$order_mrp_price}} TK</p>
                                            <p class="f12 mb-0 text-light">Discount amount: {{$order_discount_amount}} TK</p>
                                            <p class="f12 mb-0 text-light">Grand total: {{$order_grand_total}} TK</p>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-xl-3 col-sm-6 mb-4">
                                    <div class="card card-shadow bg-primary">
                                        <div class="card-body ">
                                            <i class="icon-basket-loaded text-light f30"></i>
                                            <a href="{{url('pendingOrder')}}" style="text-decoration:none;"> <h6 class="mb-0 mt-3 text-light font-weight-bold">Pending Order Placed</h6>
                                                <p class="f12 mb-0 text-light">{{$porder}} Order Placed</p></a>
                                                <p class="f12 mb-0 text-light">MRP: {{$porder_mrp_price}} TK</p>
                                                <p class="f12 mb-0 text-light">Discount amount: {{$porder_discount_amount}} TK</p>
                                                <p class="f12 mb-0 text-light">Grand total: {{$porder_grand_total}} TK</p>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="col-xl-3 col-sm-6 mb-4">
                                        <div class="card card-shadow bg-dark">
                                            <div class="card-body ">
                                                <i class="icon-basket-loaded text-light f30"></i>
                                                <a href="{{url('ProcessOrder')}}" style="text-decoration:none;color:yellow;"> <h6 class="mb-0 mt-3 text-light font-weight-bold">Processing </h6>
                                                    <p class="f12 mb-0 text-light" style="color: green">{{$pporder}} Order Placed</p></a>
                                                    <p class="f12 mb-0 text-light">MRP: {{$pporder_mrp_price}} TK</p>
                                                    <p class="f12 mb-0 text-light">Discount amount: {{$pporder_discount_amount}} TK</p>
                                                    <p class="f12 mb-0 text-light">Grand total: {{$pporder_grand_total}} TK</p>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-xl-3 col-sm-6 mb-4">
                                            <div class="card card-shadow bg-primary">
                                                <div class="card-body ">
                                                    <i class="icon-basket-loaded text-light f30"></i>
                                                    <a href="{{url('Shipping-Order')}}" style="text-decoration:none;color:yellow;"> <h6 class="mb-0 mt-3 text-light font-weight-bold">Shipping Order </h6>
                                                        <p class="f12 mb-0 text-light" style="color: green">{{$shpping}} Order Placed</p></a>
                                                        <p class="f12 mb-0 text-light">MRP: {{$shpping_mrp_price}} TK</p>
                                                        <p class="f12 mb-0 text-light">Discount amount: {{$shpping_discount_amount}} TK</p>
                                                        <p class="f12 mb-0 text-light">Grand total: {{$shpping_grand_total}} TK</p>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-xl-3 col-sm-6 mb-4">
                                                <div class="card card-shadow bg-info">
                                                    <div class="card-body ">
                                                        <i class="icon-basket-loaded text-light f30"></i>
                                                        <a href="{{url('onthewayOrder')}}" style="text-decoration:none;color:yellow;"> <h6 class="mb-0 mt-3 text-light font-weight-bold">On the way Order Placed</h6>
                                                            <p class="f12 mb-0 text-light" style="color: green">{{$onorder}} Order Placed</p> </a>
                                                            <p class="f12 mb-0 text-light">MRP: {{$onorder_mrp_price}} TK</p>
                                                            <p class="f12 mb-0 text-light">Discount amount: {{$onorder_discount_amount}} TK</p>
                                                            <p class="f12 mb-0 text-light">Grand total: {{$onorder_grand_total}} TK</p>

                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-xl-3 col-sm-6 mb-4">
                                                    <div class="card card-shadow bg-warning">
                                                        <div class="card-body ">
                                                            <i class="icon-basket-loaded text-light f30"></i>
                                                            <a href="{{url('CompleteOrder')}}" style="text-decoration:none;color:green;">   <h6 class="mb-0 mt-3 text-light font-weight-bold">Success Order Placed</h6>
                                                                <p class="f12 mb-0 text-light" style="color: green">{{$sorder}} Order Placed</p></a>
                                                                <p class="f12 mb-0 text-light">MRP: {{$sorder_mrp_price}} TK</p>
                                                                <p class="f12 mb-0 text-light">Discount amount: {{$sorder_discount_amount}} TK</p>
                                                                <p class="f12 mb-0 text-light">Grand total: {{$sorder_grand_total}} TK</p>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-xl-3 col-sm-6 mb-4">
                                                        <div class="card card-shadow bg-info">
                                                            <div class="card-body ">
                                                                <i class="icon-basket-loaded text-light f30"></i>
                                                                <a href="{{url('RejectOrder')}}" style="text-decoration:none;"> <h6 class="mb-0 mt-3 text-light font-weight-bold">Reject Order Placed</h6>
                                                                    <p class="f12 mb-0 text-light">{{$reorder}} Order Placed</p></a>
                                                                    <p class="f12 mb-0 text-light">MRP: {{$reorder_mrp_price}} TK</p>
                                                                    <p class="f12 mb-0 text-light">Discount amount: {{$reorder_discount_amount}} TK</p>
                                                                    <p class="f12 mb-0 text-light">Grand total: {{$reorder_grand_total}} TK</p>
                                                                </div>
                                                            </div>
                                                        </div>


                                                        <div class="col-xl-3 col-sm-6 mb-4">
                                                            <div class="card card-shadow bg-warning">
                                                                <div class="card-body ">
                                                                    <i class="icon-basket-loaded text-light f30"></i>
                                                                    <a href="{{url('Refound-Order')}}" style="text-decoration:none;"> <h6 class="mb-0 mt-3 text-light font-weight-bold">Refund Order</h6>
                                                                        <p class="f12 mb-0 text-light">{{$refund}} Order refunded</p></a>
                                                                        <p class="f12 mb-0 text-light">MRP: {{$refund_mrp_price}} TK</p>
                                                                        <p class="f12 mb-0 text-light">Discount amount: {{$refund_discount_amount}} TK</p>
                                                                        <p class="f12 mb-0 text-light">Grand total: {{$refund_grand_total}} TK</p>
                                                                    </div>
                                                                </div>
                                                            </div>


                                                            --}}


                                                        </div>

                                                    </div>

                                                </main>

                                            </div>
                                            {{Auth('admin')->user()->type}}


                                            @include('Admin.footer')

                                        </body>

                                        </html>
                                        <!-- Data table -->

<!-- https://datatables.net/extensions/buttons/examples/initialisation/export.html -->