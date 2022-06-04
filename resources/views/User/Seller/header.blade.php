<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Seller Dashboard</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="icon" href="{{asset('public')}}/proyojon-logo.png" type="image/x-icon" />

    <link href="https://fonts.googleapis.com/css?family=Nunito+Sans:300,400,600,700,800" rel="stylesheet">

    <link rel="stylesheet" href="{{asset('/public/agentdashboard')}}/plugins/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('/public/agentdashboard')}}/plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="{{asset('/public/agentdashboard')}}/plugins/icon-kit/dist/css/iconkit.min.css">
    <link rel="stylesheet" href="{{asset('/public/agentdashboard')}}/plugins/ionicons/dist/css/ionicons.min.css">
    <link rel="stylesheet" href="{{asset('/public/agentdashboard')}}/plugins/perfect-scrollbar/css/perfect-scrollbar.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="{{asset('/public/agentdashboard')}}/plugins/jvectormap/jquery-jvectormap.css">
    <link rel="stylesheet" href="{{asset('/public/agentdashboard')}}/plugins/tempusdominus-bootstrap-4/build/css/tempusdominus-bootstrap-4.min.css">
    <link rel="stylesheet" href="{{asset('/public/agentdashboard')}}/plugins/weather-icons/css/weather-icons.min.css">
    <link rel="stylesheet" href="{{asset('/public/agentdashboard')}}/plugins/c3/c3.min.css">
    <link rel="stylesheet" href="{{asset('/public/agentdashboard')}}/plugins/owl.carousel/dist/assets/owl.carousel.min.css">
    <link rel="stylesheet" href="{{asset('/public/agentdashboard')}}/plugins/owl.carousel/dist/assets/owl.theme.default.min.css">
    <link rel="stylesheet" href="{{asset('/public/agentdashboard')}}/dist/css/theme.min.css">
    <script src="{{asset('/public/agentdashboard')}}/src/js/vendor/modernizr-2.8.3.min.js"></script>
    <link media="all" type="text/css" rel="stylesheet" href="{{asset('public/Frontend')}}/js/select2.min.css">
 <style>
     .select2-container--default .select2-selection--single{
  line-height: 25px;
  height: 45px;
  border-radius: 0px;
  border:1px solid #f1f1f1;
  font-size: 13px;
  color: gray;
}



.select2-container--default .select2-selection--single .select2-selection__rendered{
  line-height: 25px;

}

.select2-container--default .select2-selection--single .select2-selection__arrow b{
  margin-top: 5px;
}
 </style>
      <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">
    <style>
        .form-group input{ border:1px solid lightgray; height: 40px;  }
        .form-group textarea{ border:1px solid lightgray; }
    </style>
</head>
<body>


    <div class="wrapper">
        <header class="header-top" header-theme="light">
            <div class="container">
                <div class="d-flex justify-content-between">
                    <div class="top-menu d-flex align-items-center">
                        <button type="button" class="btn-icon mobile-nav-toggle d-lg-none"><span></span></button>
                        <div class="header-search">
                            <div class="input-group">
                                <span class="input-group-addon search-close"><i class="ik ik-x"></i></span>
                                <input type="text" class="form-control">
                                <span class="input-group-addon search-btn"><i class="ik ik-search"></i></span>
                            </div>
                        </div>
                        <button type="button" id="navbar-fullscreen" class="nav-link"><i class="ik ik-maximize"></i></button>
                    </div>
                    <div class="top-menu d-flex align-items-center">


                        <div class="dropdown">
                            <a class="dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img class="avatar" src="{{asset('public')}}/noimage.png" alt=""></a>
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="userDropdown">
                                <a class="dropdown-item" href="{{url('seller-logout')}}"><i class="ik ik-power dropdown-icon"></i> Logout</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </header>

        <div class="page-wrap">
            <div class="app-sidebar colored">
                <div class="sidebar-header" style="background-color: #1dc68c;">
                    <a class="header-brand" href="{{url('/seller-dashboard')}}">

                     <span class="text">{{Auth('seller')->user()->business_name}}</span>
                 </a>
                 <!--    <button type="button" class="nav-toggle"><i data-toggle="expanded" class="ik ik-toggle-right toggle-icon"></i></button> -->
                 <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
             </div>

             <div class="sidebar-content">
                <div class="nav-container">
                    <nav id="main-menu-navigation" class="navigation-main">

                        <div class="nav-item ">
                            <a href="{{url('/seller-dashboard')}}"><i class="ik ik-bar-chart-2"></i><span>Dashboard</span></a>
                        </div>



                        <div class="nav-lavel">Menu</div>

                         <div class="nav-item">
                            <a href="{{url('/')}}" target="_blank"><i class="ik ik-home"></i><span>Home</span></a>
                        </div>
                         @php   
            $padd = "https://" .$_SERVER['HTTP_HOST'].'/seller-product-add'; 
            $pview = "https://" .$_SERVER['HTTP_HOST'].'/seller-product-view'; 
            $toview = "https://" .$_SERVER['HTTP_HOST'].'/total-ordered-peroduct'; 
            $ps = "https://" .$_SERVER['HTTP_HOST'].'/seller-profile-setting'; 
            @endphp
                        <div class="nav-item has-sub @if(Request::url() === $padd || Request::url() === $pview){{'active'}} @else @endif">
                            <a href="#" ><i class="ik ik-disc" ></i><span>Product Info</span></a>
                            <div class="submenu-content">
                                <a href="{{url('/seller-product-add')}}" class="menu-item @if(Request::url() === $padd) {{'active'}} @else @endif">Product</a>
                                <a href="{{url('/seller-product-view')}}" class="menu-item @if( Request::url() === $pview){{'active'}} @else @endif">View</a>
                            </div>
                        </div>

                        <div class="nav-item @if(Request::url() === $toview){{'active'}} @else @endif">
                            <a href="{{url('/total-ordered-peroduct')}}"><i class="ik ik-disc"></i><span>Total Order Product</span></a>
                        </div>

                        <div class="nav-item @if(Request::url() === $ps){{'active'}} @else @endif">
                            <a href="{{url('/seller-profile-setting')}}"><i class="ik ik-disc"></i><span>Profile Setting</span></a>
                        </div>






                    </nav>
                </div>
            </div>
        </div>






