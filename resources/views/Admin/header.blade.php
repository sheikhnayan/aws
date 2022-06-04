<!DOCTYPE html>
<html lang="en">
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
<meta name="description" content="">
<meta name="author" content="Didarul Islam Akand">
<meta http-equiv="Pragma" content="no-cache" />

<meta name="csrf-token" content="{{ csrf_token() }}" />




<!--favicon icon-->

<title>Admin Dashboard</title>

<!--google font-->
<link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" rel="stylesheet">


<!--common style-->
<link href="{{asset('/public')}}/assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
<link href="{{asset('/public')}}/assets/vendor/lobicard/css/lobicard.css" rel="stylesheet">
<link href="{{asset('/public')}}/assets/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<link href="{{asset('/public')}}/assets/vendor/simple-line-icons/css/simple-line-icons.css" rel="stylesheet">
<link href="{{asset('/public')}}/assets/vendor/themify-icons/css/themify-icons.css" rel="stylesheet">
<link href="{{asset('/public')}}/assets/vendor/weather-icons/css/weather-icons.min.css" rel="stylesheet">

<!--easy pie chart-->
<link href="{{asset('/public')}}/assets/vendor/jquery-easy-pie-chart/jquery.easy-pie-chart.css" rel="stylesheet">

<!--custom css-->
<link href="{{asset('/public')}}/assets/css/main.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
<!-- UIkit CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/uikit@3.5.8/dist/css/uikit.min.css" />

<!-- UIkit JS -->
<script src="https://cdn.jsdelivr.net/npm/uikit@3.5.8/dist/js/uikit.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/uikit@3.5.8/dist/js/uikit-icons.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.5.1/dropzone.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.0/themes/base/jquery-ui.css">

<style>
    .select2-container--default .select2-selection--single {
        line-height: 25px;
        height: 45px;
        border-radius: 0px;
        border: 1px solid #f1f1f1;
        font-size: 13px;
        color: gray;
    }



    .select2-container--default .select2-selection--single .select2-selection__rendered {
        line-height: 25px;

    }

    .select2-container--default .select2-selection--single .select2-selection__arrow b {
        margin-top: 5px;
    }

    .main-content {
        background: #fff;
        padding: 10px;


    }

    <?php
    $setting = DB::table('settings')->first();
    ?>

</style>

<body class="app header-fixed left-sidebar-fixed right-sidebar-fixed right-sidebar-overlay right-sidebar-hidden"
    style="background: #fff;">

    <header class="app-header navbar" style="background: {{ $setting->top_nav_color ?? '#343a40' }};">

        <!--brand start-->
        <div class="navbar-brand" style="background: {{ $setting->top_nav_color ?? '#343a40' }};">
            <a class="" style="color: #f1f1f1; font-weight: bold; text-decoration: none;"
                href="{{ asset('/Admin-dashboard') }}">
                <strong>DASHBOARD</strong>

            </a>
        </div>
        <!--brand end-->

        <!--left side nav toggle start-->
        <ul class="nav navbar-nav mr-auto">
            <li class="nav-item d-lg-none">
                <button class="navbar-toggler mobile-leftside-toggler" type="button"><i
                        class="ti-align-right"></i></button>
            </li>
            <li class="nav-item d-md-down-none">
                <a class="nav-link navbar-toggler left-sidebar-toggler" href="#"><i class=" ti-align-right"></i></a>
            </li>
            <li class="nav-item d-md-down-none-">
                <!--search start-->
                {{-- <form id="" method="get" class=" right-text-label-form feedback-icon-form" action="{{url('search-order')}}" enctype="multipart/form-data">
                @csrf
                
                
                <div class="input-group mb-3" style="margin-top: -10px;">
                  <input type="text" name="order_id" class="form-control" placeholder="Order ID" aria-label="Order ID" aria-describedby="basic-addon2">
                  <div class="input-group-append">
                    <span class="input-group-text" id="basic-addon2"><button type="submit" style="border:0px;background: #e5e9ec;"><i class="ti-search"></i></button></span>
                </div>
            </div>

            
        </form> --}}

                </a>
                <div class="search-container">
                    <div class="outer-close search-toggle">
                        <a class="close"><span></span></a>
                    </div>

                    <div class="container search-wrap">
                        <div class="row">
                            <div class="col text-left">
                                <a class="" href="#">
                                    <img src="{{ asset('/public') }}/logo.png"
                                        srcset="{{ asset('/public') }}/logo@2x.png 2x" alt="">
                                </a>
                                <form class="mt-3">
                                    <div class="form-row align-items-center">
                                        <input type="text" class="form-control custom-search" placeholder="Search">
                                    </div>
                                </form>

                                <div class="search-list">
                                    <h5 class="text-white mb-4">Search Results</h5>
                                    <ul class="list-unstyled ">
                                        <li>
                                            <a href="#" class="text-white">
                                                <span class="bg-danger">

                                                </span>
                                                Simply dummy text of the printing
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="text-white">
                                                <span class="bg-success">
                                                    C
                                                </span>
                                                Contrary Ipsum is not simply random text
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="text-white">
                                                <span class="bg-info">
                                                    <i class="icon-basket-loaded "></i>
                                                </span>
                                                Ipsum has been industry's standard dummy
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--search end-->
            </li>
        </ul>
        <!--left side nav toggle end-->

        <!--right side nav start-->
        <ul class="nav navbar-nav ml-auto">


            <!-- <li class="nav-item dropdown dropdown-slide d-md-down-none">
            <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <i class="ti-bell"></i>
                <span class="badge badge-danger notification-alarm"> </span>
            </a>
            <div class="dropdown-menu dropdown-menu-right">

                <div class="dropdown-header pb-3">
                    <strong>You have 6 Notifications</strong>
                </div>

                <a href="#" class="dropdown-item">
                    <i class="icon-basket-loaded text-primary"></i> New order
                </a>
                <a href="#" class="dropdown-item">
                    <i class="icon-user-follow text-success"></i> New registered member
                </a>
                <a href="#" class="dropdown-item">
                    <i class=" icon-layers text-danger"></i> Server error report
                </a>
                <a href="#" class="dropdown-item">
                    <i class=" icon-note text-warning"></i> Database report
                </a>

                <a href="#" class="dropdown-item">
                    <i class=" icon-present text-info"></i> Order confirmation
                </a>

            </div>
        </li> -->
            <!--  <li class="nav-item dropdown dropdown-slide d-md-down-none">
            <a class="nav-link nav-pill" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                <i class=" ti-view-grid"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-ql-gird">

                <div class="dropdown-header pb-3">
                    <strong>Quick Links</strong>
                </div>

                <div class="quick-links-grid">
                    <a href="#" class="ql-grid-item">
                        <i class="  ti-files text-primary"></i>
                        <span class="ql-grid-title">New Task</span>
                    </a>
                    <a href="#" class="ql-grid-item">
                        <i class="  ti-check-box text-success"></i>
                        <span class="ql-grid-title">Assign Task</span>
                    </a>
                </div>
                <div class="quick-links-grid">
                    <a href="#" class="ql-grid-item">
                        <i class="  ti-truck text-warning"></i>
                        <span class="ql-grid-title">Create Orders</span>
                    </a>
                    <a href="#" class="ql-grid-item">
                        <i class=" icon-layers text-info"></i>
                        <span class="ql-grid-title">New Orders</span>
                    </a>
                </div>

            </div>
        </li> -->

            <li class="nav-item dropdown dropdown-slide">
                <a class="nav-link nav-pill user-avatar" data-toggle="dropdown" href="#" role="button"
                    aria-haspopup="true" aria-expanded="false" style="margin-top: -10px">
                    <img src="{{ asset('/public') }}/AdminImage/{{ Auth('admin')->user()->image }}"
                        alt="{{ Auth('admin')->user()->name }}">
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-accout">
                    <div class="dropdown-header pb-3">
                        <div class="media d-user">
                            <img class="align-self-center mr-3"
                                src="{{ asset('/public') }}/AdminImage/{{ Auth('admin')->user()->image }}"
                                alt="{{ Auth('admin')->user()->name }}">
                            <div class="media-body">
                                <h5 class="mt-0 mb-0">{{ Auth('admin')->user()->name }}</h5>
                                <span>{{ Auth('admin')->user()->email }}</span>
                            </div>
                        </div>
                    </div>

                    <!--   <a class="dropdown-item" href="#"><i class=" ti-reload"></i> Activity</a>
                <a class="dropdown-item" href="#"><i class=" ti-email"></i> Message</a>
                <a class="dropdown-item" href="#"><i class=" ti-user"></i> Profile</a>
                <a class="dropdown-item" href="#"><i class=" ti-layers-alt"></i> Projects <span class="badge badge-primary">4</span> </a>

                <div class="dropdown-divider"></div>

                <a class="dropdown-item" href="#"><i class=" ti-lock"></i> Lock Account</a> -->
                    <a class="dropdown-item" href="{{ url('/Adminlogout') }}"><i class=" ti-unlock"></i>
                        Logout</a>
                </div>
            </li>

            <!--right side toggler-->
            <li class="nav-item d-lg-none">
                <!--<button class="navbar-toggler mobile-rightside-toggler" type="button"><i class="icon-options-vertical"></i></button>-->
            </li>
            <li class="nav-item d-md-down-none">
                <!--<a class="nav-link navbar-toggler right-sidebar-toggler" href="#"><i class="icon-options-vertical"></i></a>-->
            </li>
        </ul>

        <!--right side nav end-->
    </header>
    @php
        
        $id = Auth::guard('admin')->user();
        
        $mainlink = DB::table('linkpiority')
            ->join('adminmainmenu', 'adminmainmenu.id', '=', 'linkpiority.mainlinkid')
            ->select('linkpiority.*', 'adminmainmenu.*')
            ->groupBy('linkpiority.mainlinkid')
            ->orderBy('adminmainmenu.serialNo', 'ASC')
            ->where('linkpiority.adminid', $id->id)
            ->get();
        
        $sublink = DB::table('linkpiority')
            ->join('adminsubmenu', 'adminsubmenu.id', '=', 'linkpiority.sublinkid')
            ->select('linkpiority.*', 'adminsubmenu.*')
            ->orderBy('adminsubmenu.serialno', 'ASC')
            ->where('linkpiority.adminid', $id->id)
            ->get();
        
        $Adminminlink = DB::table('adminmainmenu')
            ->orderBy('adminmainmenu.serialNo', 'ASC')
            ->get();
        
        $adminsublink = DB::table('adminsubmenu')
            ->orderBy('adminsubmenu.serialno', 'ASC')
        
            ->get();
        
    @endphp

    <!--left sidebar start-->
    <div class="left-sidebar">
        <nav class="sidebar-menu" style="height: 100vh; overflow-y: scroll;">
            <ul id="nav-accordion">
                <li class="sub-menu">
                    <a href="javascript:;">
                        <i class=" ti-home"></i>
                        <span>Dashboard</span>
                    </a>

                </li>


                @if ($id->id == '1')
                    <li class="nav-title">
                        <h5 class="text-uppercase">Developer</h5>
                    </li>

                    @php
                        $path = 'http://' . $_SERVER['HTTP_HOST'] . '/office/demo-51/MainMenu';
                        $paths = 'http://' . $_SERVER['HTTP_HOST'] . '/office/demo-51/SubMenu';
                    @endphp
                    <li class="sub-menu">
                        <a href="javascript:;"
                            class="@if (Request::url() === $path || Request::url() === $paths) {{ 'active' }}@else @endif">
                            <i class=" icon-grid"></i>
                            <span>Developer Tools</span>
                        </a>
                        <ul class="sub">
                            <li class="@if (Request::url() === $path) {{ 'active' }}@else @endif"><a
                                    href="{{ url('/MainMenu') }}">Main Menu</a></li>
                            <li class="@if (Request::url() === $paths) {{ 'active' }}@else @endif"><a
                                    href="{{ url('/SubMenu') }}">Sub Menu</a></li>

                        </ul>
                    </li>
                @endif

                <li class="nav-title">
                    <h5 class="text-uppercase">Menu</h5>
                </li>


                <li class="sub-menu">
                    <a href="javascript:;"
                        class="
                        {{ request()->is('create-admin') ? 'active' : '' }}
                        {{ request()->is('view-admin') ? 'active' : '' }}
                    ">
                        <i class=" icon-grid"></i>
                        <span>Admin Setup</span>
                    </a>
                    <ul class="sub">
                        <li class="{{ request()->is('create-admin') ? 'active' : '' }}">
                            <a href="{{ URL::to('create-admin') }}"
                                class="{{ request()->is('create-admin') ? 'active text-danger' : '' }}">Create
                                Admin</a>
                        </li>
                        <li>
                            <a href="{{ URL::to('view-admin') }}"
                                class="{{ request()->is('view-admin') ? 'active text-danger' : '' }}">View Admin</a>
                        </li>
                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;"
                        class="
                    {{ request()->is('admin/contact_us') ? 'active' : '' }}
                    {{ request()->is('admin/privacy&policy') ? 'active' : '' }}
                    {{ request()->is('admin/howtobuy') ? 'active' : '' }}
                    {{ request()->is('slider') ? 'active' : '' }}
                    {{ request()->is('slider/create') ? 'active' : '' }}
                    {{ request()->is('setting') ? 'active' : '' }}
                ">
                        <i class=" icon-grid"></i>
                        <span>Website Setting</span>
                    </a>
                    <ul class="sub">
                        <!--<li class="{{ request()->is('admin/contact_us') ? 'active' : '' }}">-->
                        <!--    <a href="{{ URL::to('admin/contact_us') }}" class="{{ request()->is('admin/contact_us') ? 'active text-danger' : '' }}" >Contact Us</a>-->
                        <!--</li>-->
                        <!--<li>-->
                        <!--    <a href="{{ URL::to('admin/privacy&policy') }}" class="{{ request()->is('admin/privacy&policy') ? 'active text-danger' : '' }}" >Privacy  & Policy</a>-->
                        <!--</li>-->
                        <!--<li>-->
                        <!--    <a href="{{ URL::to('admin/howtobuy') }}" class="{{ request()->is('admin/howtobuy') ? 'active text-danger' : '' }}" >How To Buy</a>-->
                        <!--</li>-->
                        <li>
                            <a href="{{ URL::to('slider/create') }}"
                                class="{{ request()->is('slider/create') ? 'active text-danger' : '' }} ?? {{ request()->is('slider') ? 'active text-danger' : '' }}">Slider</a>
                        </li>
                        <li class="{{ request()->is('setting') ? 'active' : '' }}">
                            <a href="{{ URL::to('setting') }}"
                                class="{{ request()->is('setting') ? 'active text-danger' : '' }}">Setting</a>
                        </li>
                    </ul>
                </li>

                <!--<li class="sub-menu">-->
                <!--    <a href="javascript:;" class="-->
            <!--        {{ request()->is('setting') ? 'active' : '' }}-->
            <!--    ">-->
                <!--        <i class=" icon-grid"></i>-->
                <!--        <span>Other Setting</span>-->
                <!--    </a>-->
                <!--    <ul class="sub">-->
                <!--        <li class="{{ request()->is('setting') ? 'active' : '' }}">-->
                <!--            <a href="{{ URL::to('setting') }}" class="{{ request()->is('setting') ? 'active text-danger' : '' }}" >Setting</a>-->
                <!--        </li>-->

                <!--    </ul>-->
                <!--</li>-->

                <li class="sub-menu">
                    <a href="javascript:;"
                        class="
                    {{ request()->is('item-add/create') ? 'active' : '' }}
                    {{ request()->is('item-add') ? 'active' : '' }}
                    {{ request()->is('category-add/create') ? 'active' : '' }}
                    {{ request()->is('category-add') ? 'active' : '' }}
                    {{ request()->is('sub-category-add/create') ? 'active' : '' }}
                    {{ request()->is('sub-category-add') ? 'active' : '' }}
                    {{ request()->is('brand-add/create') ? 'active' : '' }}
                    {{ request()->is('brand-add') ? 'active' : '' }}
                    {{ request()->is('product-add/create') ? 'active' : '' }}
                    {{ request()->is('product-add') ? 'active' : '' }}
                    {{ request()->is('Measurementadd') ? 'active' : '' }}
                    {{ request()->is('size-info/create') ? 'active' : '' }}
                    {{ request()->is('size-info') ? 'active' : '' }}
                    {{ request()->is('color-info/create') ? 'active' : '' }}
                    {{ request()->is('color-info') ? 'active' : '' }}
                    {{ request()->is('store/create') ? 'active' : '' }}
                    {{ request()->is('store') ? 'active' : '' }}
                ">
                        <i class=" icon-grid"></i>
                        <span>Product Information</span>
                    </a>
                    <ul class="sub">

                        <li class="{{ request()->is('item-add/create') ? 'active' : '' }}">
                            <a href="{{ URL::to('item-add/create') }}"
                                class="{{ request()->is('item-add/create') ? 'active text-danger' : '' }} ?? {{ request()->is('item-add') ? 'active text-danger' : '' }}">Item
                                Add</a>

                        </li>
                        <li class="{{ request()->is('category-add/create') ? 'active' : '' }}">
                            <a href="{{ URL::to('category-add/create') }}"
                                class="{{ request()->is('category-add/create') ? 'active text-danger' : '' }} ?? {{ request()->is('category-add') ? 'active text-danger' : '' }}">Category
                                Add</a>
                        </li>
                        <li class="{{ request()->is('sub-category-add/create') ? 'active' : '' }}">
                            <a href="{{ URL::to('sub-category-add/create') }}"
                                class="{{ request()->is('sub-category-add/create') ? 'active text-danger' : '' }} ?? {{ request()->is('sub-category-add') ? 'active text-danger' : '' }}">Sub Category
                                Add</a>
                        </li>
                        <li class="{{ request()->is('brand-add/create') ? 'active' : '' }}">
                            <a href="{{ URL::to('brand-add/create') }}"
                                class="{{ request()->is('brand-add/create') ? 'active text-danger' : '' }} ?? {{ request()->is('brand-add') ? 'active text-danger' : '' }}">Brand
                                Add</a>
                        </li>
                        <li class="{{ request()->is('product-add/create') ? 'active' : '' }}">
                            <a href="{{ URL::to('product-add/create') }}"
                                class="{{ request()->is('product-add/create') ? 'active text-danger' : '' }}">Product
                                Add</a>
                        </li>
                        <li class="{{ request()->is('product-add') ? 'active' : '' }}">
                            <a href="{{ URL::to('product-add') }}"
                                class="{{ request()->is('product-add') ? 'active text-danger' : '' }}">View All
                                Product</a>
                        </li>
                        <li class="{{ request()->is('Measurementadd') ? 'active' : '' }}">
                            <a href="{{ URL::to('Measurementadd') }}"
                                class="{{ request()->is('Measurementadd') ? 'active text-danger' : '' }}">Measurement</a>
                        </li>
                        <li class="{{ request()->is('size-info/create') ? 'active' : '' }}">
                            <a href="{{ URL::to('size-info/create') }}"
                                class="{{ request()->is('size-info/create') ? 'active text-danger' : '' }} ?? {{ request()->is('size-info') ? 'active text-danger' : '' }}">Size</a>
                        </li>
                        <li class="{{ request()->is('color-info/create') ? 'active' : '' }}">
                            <a href="{{ URL::to('color-info/create') }}"
                                class="{{ request()->is('color-info/create') ? 'active text-danger' : '' }} ?? {{ request()->is('color-info') ? 'active text-danger' : '' }}">Color</a>
                        </li>
                        <!-- <li class="{{ request()->is('store') ? 'active' : '' }}">
                            <a href="{{ URL::to('store') }}"
                                class="{{ request()->is('store') ? 'active text-danger' : '' }} ?? {{ request()->is('store') ? 'active text-danger' : '' }}">Store</a>
                        </li> -->
                        <!-- <li class="{{ request()->is('weight') ? 'active' : '' }}">
                            <a href="{{ URL::to('weight') }}"
                                class="{{ request()->is('weight') ? 'active text-danger' : '' }} ?? {{ request()->is('weight') ? 'active text-danger' : '' }}">Weight</a>
                        </li> -->

                    </ul>
                </li>


                <li class="sub-menu">
                    <a href="javascript:;"
                        class="
                    {{ request()->is('GuestList') ? 'active' : '' }}
                ">
                        <i class="icon-grid"></i>
                        <span>Guest Informatin</span>
                    </a>
                    <ul class="sub">
                        <li class="{{ request()->is('GuestList') ? 'active' : '' }}">
                            <a href="{{ URL::to('GuestList') }}"
                                class="{{ request()->is('GuestList') ? 'active text-danger' : '' }}">Guest
                                Register</a>
                        </li>

                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;"
                        class="
                    {{ request()->is('deliveryzone') ? 'active' : '' }}
                    {{ request()->is('zone') ? 'active' : '' }}
                    {{ request()->is('deliverychargeadd/create') ? 'active' : '' }}
                    {{ request()->is('deliverychargeadd') ? 'active' : '' }}
                ">
                        <i class="icon-grid"></i>
                        <span>Delivery Charge Setup</span>
                    </a>
                    <ul class="sub">
                        <li class="{{ request()->is('deliveryzone') ? 'active' : '' }}">
                            <a href="{{ URL::to('deliveryzone') }}"
                                class="{{ request()->is('deliveryzone') ? 'active text-danger' : '' }} ?? {{ request()->is('zone') ? 'active text-danger' : '' }}">Zone
                                Add</a>
                        </li>
                        <li class="{{ request()->is('deliverychargeadd/create') ? 'active' : '' }}">
                            <a href="{{ URL::to('deliverychargeadd/create') }}"
                                class="{{ request()->is('deliverychargeadd/create') ? 'active text-danger' : '' }} ?? {{ request()->is('deliverychargeadd') ? 'active text-danger' : '' }}">Delivery
                                Charge Add</a>
                        </li>
                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;"
                        class="
                    {{ request()->is('pendingOrder') ? 'active' : '' }}
                    {{ request()->is('ProcessOrder') ? 'active' : '' }}
                    {{ request()->is('totalOrder') ? 'active' : '' }}
                    {{ request()->is('Shipping-Order') ? 'active' : '' }}
                    {{ request()->is('onthewayOrder') ? 'active' : '' }}
                    {{ request()->is('CompleteOrder') ? 'active' : '' }}
                    {{ request()->is('RejectOrder') ? 'active' : '' }}
                    {{ request()->is('date-to-date-order') ? 'active' : '' }}
                    {{ request()->is('Refound-Order') ? 'active' : '' }}
                    {{ request()->is('exchange-request') ? 'active' : '' }}
                    {{ request()->is('allorderstatus') ? 'active' : '' }}
                ">
                        <i class=" icon-grid"></i>
                        <span>Order Information</span>
                    </a>
                    <ul class="sub">
                        <li class="{{ request()->is('pendingOrder') ? 'active' : '' }}">
                            <a href="{{ URL::to('pendingOrder') }}"
                                class="{{ request()->is('pendingOrder') ? 'active text-danger' : '' }}">Pending
                                Order</a>
                        </li>
                        <li class="{{ request()->is('ProcessOrder') ? 'active' : '' }}">
                            <a href="{{ URL::to('ProcessOrder') }}"
                                class="{{ request()->is('ProcessOrder') ? 'active text-danger' : '' }}">Process
                                Order</a>
                        </li>
                        <li class="{{ request()->is('totalOrder') ? 'active' : '' }}">
                            <a href="{{ URL::to('totalOrder') }}"
                                class="{{ request()->is('totalOrder') ? 'active text-danger' : '' }}">All Order
                                info</a>
                        </li>
                        <li class="{{ request()->is('Shipping-Order') ? 'active' : '' }}">
                            <a href="{{ URL::to('Shipping-Order') }}"
                                class="{{ request()->is('Shipping-Order') ? 'active text-danger' : '' }}">Shipping
                                Order</a>
                        </li>
                        <li class="{{ request()->is('onthewayOrder') ? 'active' : '' }}">
                            <a href="{{ URL::to('onthewayOrder') }}"
                                class="{{ request()->is('onthewayOrder') ? 'active text-danger' : '' }}">On the Way
                                Order</a>
                        </li>
                        <li class="{{ request()->is('CompleteOrder') ? 'active' : '' }}">
                            <a href="{{ URL::to('CompleteOrder') }}"
                                class="{{ request()->is('CompleteOrder') ? 'active text-danger' : '' }}">Complete
                                Order</a>
                        </li>
                        <li class="{{ request()->is('RejectOrder') ? 'active' : '' }}">
                            <a href="{{ URL::to('RejectOrder') }}"
                                class="{{ request()->is('RejectOrder') ? 'active text-danger' : '' }}">Reject
                                Order</a>
                        </li>
                        <li class="{{ request()->is('date-to-date-order') ? 'active' : '' }}">
                            <a href="{{ URL::to('date-to-date-order') }}"
                                class="{{ request()->is('date-to-date-order') ? 'active text-danger' : '' }}">Search
                                Order List</a>
                        </li>
                        <li class="{{ request()->is('Refound-Order') ? 'active' : '' }}">
                            <a href="{{ URL::to('Refound-Order') }}"
                                class="{{ request()->is('Refound-Order') ? 'active text-danger' : '' }}">Refund
                                Order</a>
                        </li>
                        <li class="{{ request()->is('exchange-request') ? 'active' : '' }}">
                            <a href="{{ URL::to('exchange-request') }}"
                                class="{{ request()->is('exchange-request') ? 'active text-danger' : '' }}">Exchange Request</a>
                        </li>
                       <!--  <li class="{{ request()->is('allorderstatus') ? 'active' : '' }}">
                            <a href="{{ URL::to('allorderstatus') }}"
                                class="{{ request()->is('allorderstatus') ? 'active text-danger' : '' }}">All Order
                                Status</a>
                        </li> -->
                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;"
                        class="
                    {{ request()->is('all-product-report') ? 'active' : '' }}
                ">
                        <i class=" icon-grid"></i>
                        <span>Product Report</span>
                    </a>
                    <ul class="sub">
                        <li class="{{ request()->is('all-product-report') ? 'active' : '' }}">
                            <a href="{{ URL::to('all-product-report') }}" target="_blank"
                                class="{{ request()->is('all-product-report') ? 'active text-danger' : '' }}">All
                                products report</a>
                        </li>

                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;"
                        class="
                    {{ request()->is('CouponAdd/create') ? 'active' : '' }}
                ">
                        <i class=" icon-grid"></i>
                        <span>Coupon</span>
                    </a>
                    <ul class="sub">
                        <li class="{{ request()->is('CouponAdd/create') ? 'active' : '' }}">
                            <a href="{{ URL::to('CouponAdd/create') }}"
                                class="{{ request()->is('CouponAdd/create') ? 'active text-danger' : '' }}">Coupon
                                Add</a>
                        </li>

                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;"
                        class="
                    {{ request()->is('seosetting') ? 'active' : '' }}
                ">
                        <i class=" icon-grid"></i>
                        <span>SEO Setting</span>
                    </a>
                    <ul class="sub">
                        <li class="{{ request()->is('seosetting') ? 'active' : '' }}">
                            <a href="{{ URL::to('seosetting') }}" target="_blank"
                                class="{{ request()->is('seosetting') ? 'active text-danger' : '' }}">Website
                                SEO</a>
                        </li>

                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;"
                        class="
                    {{ request()->is('pagecategory/create') ? 'active' : '' }}
                    {{ request()->is('pagecategory') ? 'active' : '' }}
                    {{ request()->is('page/create') ? 'active' : '' }}
                    {{ request()->is('page') ? 'active' : '' }}
                ">
                        <i class=" icon-grid"></i>
                        <span>Page Setting</span>
                    </a>
                    <ul class="sub">
                        <li class="{{ request()->is('pagecategory/create') ? 'active' : '' }}">
                            <a href="{{ URL::to('pagecategory/create') }}"
                                class="{{ request()->is('pagecategory/create') ? 'active text-danger' : '' }}">Add
                                Page Category</a>
                        </li>
                        <li class="{{ request()->is('pagecategory') ? 'active' : '' }}">
                            <a href="{{ URL::to('pagecategory') }}"
                                class="{{ request()->is('pagecategory') ? 'active text-danger' : '' }}">Manage Page
                                Category</a>
                        </li>
                        <li class="{{ request()->is('page/create') ? 'active' : '' }}">
                            <a href="{{ URL::to('page/create') }}"
                                class="{{ request()->is('page/create') ? 'active text-danger' : '' }}">Add Page</a>
                        </li>
                        <li class="{{ request()->is('page') ? 'active' : '' }}">
                            <a href="{{ URL::to('page') }}"
                                class="{{ request()->is('page') ? 'active text-danger' : '' }}">Manage Page </a>
                    </ul>
                </li>

                <li class="sub-menu">
                    <a href="javascript:;"
                        class="
                    {{ request()->is('employee/create') ? 'active' : '' }}
                    {{ request()->is('employee') ? 'active' : '' }}
                ">
                        <i class=" icon-grid"></i>
                        <span>Employee Setting</span>
                    </a>
                    <ul class="sub">
                        <li class="{{ request()->is('employee/create') ? 'active' : '' }}">
                            <a href="{{ URL::to('employee/create') }}"
                                class="{{ request()->is('employee/create') ? 'active text-danger' : '' }}">Add
                                Employee</a>
                        </li>
                        <li class="{{ request()->is('employee') ? 'active' : '' }}">
                            <a href="{{ URL::to('employee') }}"
                                class="{{ request()->is('employee') ? 'active text-danger' : '' }}">Manage
                                Employee</a>
                        </li>

                    </ul>
                </li>

                <!-- <li class="sub-menu">
                <a href="javascript:;" class="
                    {{ request()->is('CouponAdd/create') ? 'active' : '' }}
                ">
                    <i class=" icon-grid"></i>
                    <span>Coupon</span>
                </a>
                <ul class="sub">
                    <li class="{{ request()->is('CouponAdd/create') ? 'active' : '' }}">
                        <a href="{{ URL::to('CouponAdd/create') }}" class="{{ request()->is('CouponAdd/create') ? 'active text-danger' : '' }}" >Coupon Add</a>
                    </li>
                </ul>
            </li> -->

                <!-- <li class="sub-menu">
                <a href="javascript:;" class="
                    {{ request()->is('paymentmethod/create') ? 'active' : '' }}
                    {{ request()->is('paymentmethod') ? 'active' : '' }}
                ">
                    <i class=" icon-grid"></i>
                    <span>Payment Method</span>
                </a>
                <ul class="sub">
                    <li class="{{ request()->is('paymentmethod/create') ? 'active' : '' }}">
                        <a href="{{ URL::to('paymentmethod/create') }}" class="{{ request()->is('paymentmethod/create') ? 'active text-danger' : '' }}" >Add Method</a>
                    </li>
                    <li class="{{ request()->is('paymentmethod') ? 'active' : '' }}">
                        <a href="{{ URL::to('paymentmethod') }}" class="{{ request()->is('paymentmethod') ? 'active text-danger' : '' }}" >Manage Method</a>
                    </li>
                </ul>
            </li> -->

            <li class="sub-menu">
                <a href="javascript:;"
                    class="
                {{ request()->is('productstock') ? 'active' : '' }}
                {{ request()->is('viewproductstock') ? 'active' : '' }}
                {{ request()->is('stockreport') ? 'active' : '' }}
            ">
                    <i class=" icon-grid"></i>
                    <span>Stock</span>
                </a>
                <ul class="sub">
                    <li class="{{ request()->is('productstock') ? 'active' : '' }}">
                        <a href="{{ URL::to('productstock') }}"
                            class="{{ request()->is('productstock') ? 'active text-danger' : '' }}">Add
                            Stock</a>
                    </li>
                    <li class="{{ request()->is('viewproductstock') ? 'active' : '' }}">
                        <a href="{{ URL::to('viewproductstock') }}"
                            class="{{ request()->is('viewproductstock') ? 'active text-danger' : '' }}">View
                            Stock</a>
                    </li>
                    <li class="{{ request()->is('stockreport') ? 'active' : '' }}">
                        <a href="{{ URL::to('stockreport') }}" target="_blank"
                            class="{{ request()->is('stockreport') ? 'active text-danger' : '' }}">Stock
                            Report</a>
                    </li>
                </ul>
            </li>
        </nav>
    </div>




    <script type="text/javascript">


    </script>
