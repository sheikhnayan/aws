@php
$setting = DB::table('settings')->first();
@endphp


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="csrf-token" content="{{ csrf_token() }}" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>{{ $setting->title }}</title>

  <link rel="shortcut icon" href="{{asset('/public/siteImage')}}/{{$setting->favicon}}" class="img-fluid">

  <link href="https://fonts.googleapis.com/css2?family=Hind+Siliguri:wght@500&family=PT+Serif:wght@400;700&display=swap" rel="stylesheet">
  <link href="https://fonts.maateen.me/solaiman-lipi/font.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@200;300;400;600&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" type="text/css" href="{{ asset('public/fontdev/') }}/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.6.0/font/bootstrap-icons.css">

  <link rel="stylesheet" type="text/css" href="{{ asset('public/fontdev/') }}/css/uikit.min.css">
  <!-- <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/') }}/css/magnific-popup.css"> -->
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/simplelightbox/2.10.2/simple-lightbox.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/') }}/css/slick-theme.css">
  <link rel="stylesheet" type="text/css" href="{{ asset('public/assets/') }}/css/slick.css">

  <link rel="stylesheet" type="text/css" href="{{ asset('public/fontdev/') }}/style.css">

  <link rel="stylesheet" type="text/css" href="{{ asset('public/fontdev') }}/css/toast.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">


</head>

<body onload="myfunctions();" id="body">

  <div id="load"></div>

<!--   <div class="preloader">
        <img src="{{ asset('public/preloader.svg') }}" alt="">
  </div> -->

  <?php
  $setting = DB::table('settings')->first();
  if (Auth('guest')->user()) {
    $cus_id = Auth('guest')->user()->id;
    $total_wishlist = App\Wishlist::where('user_id', $cus_id)->count();
  }
  ?>

  <div uk-sticky>
    <div class="pt-2 pb-2 col-md-12 topbar d-none d-lg-block">
      <div class="container">
        <div class="row align-items-center">
<!--           <div class="col">

            <strong>Hotline: {{ $setting->hotline ?? '' }}</strong>

          </div>


          <div class="col">
            <div class="float-end">
              @if(Auth('guest')->user())
              <li><a href="{{ url('userdashboard') }}" title="Login"><strong>Dashboard</strong></a></li>
              <li><a href="{{ url('guest-logout') }}" title="Login"><strong>Logout</strong></a></li>
              @else
              <li><a href="{{ url('user-login') }}" title="Login"><strong>Login / Register</strong></a></li>
              @endif
            </div>


          </div> -->
        </div>
      </div>
    </div>
    <!---------End Topbar------->

    <div class="pb-2 col-md-12 menubarsection">
      <div class="container">
        <div class="row align-items-center justify-content-between">

          <div class="col-xl-3 col-lg-3 col-auto">
            <a href="{{ url('/') }}"><img src="{{asset('/public/siteImage')}}/{{$setting->logo}}" class="img-fluid"></a>
            <!-- <span class="text-light" data-bs-toggle="modal" data-bs-target="#exampleModal">&nbsp;&nbsp;<i class="bi bi-geo-alt-fill"></i>&nbsp;&nbsp;@if(isset($getlocation)){{ $getlocation }}@else Chattogram @endif</span> -->
          </div>

          <div class="col-lg-6 col order-4 order-lg-0">
            <!-- <div class="search-box">
              <select name="" class="search-box__select">
                <option value="">Item 1</option>
                <option value="">Item 1</option>
                <option value="">Item 1</option>
                <option value="">Item 1</option>
              </select>
              <input type="text" class="search-box__input" placeholder="Search">
              <button class="search-box__submitter"><i class="fa fa-search"></i></button>
            </div> -->

            <?php
              $categories = DB::table('product_category')->orderBy('sl', 'ASC')->get();
            ?>

            <form method="get" action="{{ url('/searchproducts') }}" class="d-flex mt-3 mt-lg-0">
              @csrf
              <select name="category_id" id="" class="border-end-0 rounded-start border-primary search-category" style="max-width: 74px">
                <option value="">All</option>
                @foreach($categories as $category)
                  @if(isset($category_id))
                  <option value="{{ $category->id }}" @php if ($category->id == $category_id) { echo "selected"; } @endphp> {{ $category->category_name }}</option>
                  @else
                  <option value="{{ $category->id }}" > {{ $category->category_name }}</option>
                  @endif
                @endforeach
              </select>

              <div class="input-group">
                <input type="text" class="form-control" id="searchbox" placeholder="What are you looking for?" name="search" autocomplete="off" required="" onkeyup="Searchproduct();">
                <div class="input-group-append">
                  <button class="btn" type="submit"><i class="bi bi-search"></i></button>
                </div>
              </div>
            </form>
            <div id="searchdata"></div>
          </div>

          <div class="col-xl-3 col-lg-3 col-6 order-3">
            <div class="float-end text-dark">
              <span type="button" class="position-relative d-none d-sm-inline-block" uk-toggle="target: #offcanvas-none">
                <i class="bi bi-cart3 nav-icon text-dark"></i>
                <span class="position-absolute start-120 badge rounded-pill cart-counter" style="bottom: 80%;left: 90%;transform: translateX(-42%);padding: 2px 4px;">
                  <span id="cartqunt">0</span>
                </span>
              </span>
              &nbsp;&nbsp;&nbsp;&nbsp;


              <!-- <a href="{{ url('wishlist') }}" class="d-none d-sm-inline-block">
                <span type="button" class="position-relative">
                  <i class="bi bi-heart-fill nav-icon text-dark"></i>
                  <span class="top-0 position-absolute start-120 translate-middle badge rounded-pill cart-counter">
                    <span id="" class="wishlistCount">{{$total_wishlist ?? 0}}</span>
                  </span>
                </span>
              </a> -->

              
              @if(Auth('guest')->user())
              <a href="{{ url('userdashboard') }}" class="text-dark"><i class="bi bi-person-circle nav-icon text-dark"></i>&nbsp;&nbsp;&nbsp;&nbsp;</a>

              <a href="{{ url('trackorder') }}" class="text-dark"><i class="fa fa-motorcycle nav-icon text-dark"></i>&nbsp;&nbsp;&nbsp;&nbsp;</a>

              @else
              <a href="{{ url('user-login') }}" class="text-dark"><i class="bi bi-person-circle nav-icon text-dark"></i>&nbsp;&nbsp;&nbsp;&nbsp;</a>

              <a href="{{ url('user-login') }}" class="text-dark"><i class="fa fa-motorcycle nav-icon text-dark"></i>&nbsp;&nbsp;&nbsp;&nbsp;</a>
              @endif

              <a href="tel:{{$setting->hotline}}" class="text-dark"><i class="fa fa-phone-flip nav-icon text-dark"></i>&nbsp;&nbsp;&nbsp;&nbsp;</a>

              <span class="text2" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"><i class="bi bi-list nav-icon text-dark d-lg-none"></i></span>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="bg-white position-relative d-none d-lg-block">
      <div class="container">
        <div class="nav-bar d-none d-lg-block">
          <ul class="nav-bar__list">
            <a href="{{ URL::to('/') }}" style="color: black"><li class="py-3 px-4 me-4 fw-bold" style="background-color:#ededed">Home</li></a>

            <?php
            $item = DB::table('product_item')->orderBy('sl', 'ASC')->get();
            ?>

            @if(isset($item))
            @foreach($item as $i)
            <?php
            $item_name = str_replace(" ", "-", $i->item_name);
            $category = DB::table('product_category')->where('item_id', $i->id)->get();
            ?>

            <li class="nav-bar__item {{ count($category) > 0 ? 'position-static' : ''}}">
              <a href="#" class="nav-bar__link">{{ $i->item_name }}
                @if(count($category)>0)
                <i class="fas fa-angle-down ms-2"></i>
                @endif
              </a>

              @if(count($category)>0)

              <div class="mega-menu">
                <div class="container">
                  <div class="row row-cols-4 g-4">

                    @foreach($category as $cat)
                    @if($cat->item_id == $i->id)

                    <?php
                      $category_name = str_replace(" ", "-", $cat->category_name);
                      $sub_categories = DB::table('product_subcategory')->where('category_id', $cat->id)->get();
                    ?>
                    
                    <div class="col">
                      <h5 class="mega-menu__heading">{{ $cat->category_name }}</h5>
                      <ul class="mega-menu__list">
                        @foreach($sub_categories as $sub_category)

                        <?php
                        $subcategory_name = str_replace(" ", "-", $sub_category->subcategory_name);
                        ?>

                        <li class="mega-menu__item"><a href="{{url('subcategory')}}/{{$subcategory_name}}/{{$sub_category->id}}" class="mega-menu__link">{{$sub_category->subcategory_name}}</a></li>
                        @endforeach
                      </ul>
                    </div>

                    @endif
                    @endforeach

                  </div>
                </div>
              </div>
              @endif

            </li>




            @endforeach
            @endif
          </ul>
        </div>
      </div>
    </div>
  </div>


  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">

        <div class="modal-body">
          <center>
            <strong>
              <h1><i class="bi bi-compass"></i></h1>
              SELECT YOUR DELIVERY LOCATION
            </strong>

            <form class="p-3 mt-4 formback" method="get" action="{{ url('/Location') }}">
              @csrf
              <div class="row align-items-center">
                <div class="form-group col-md-4">
                  <select class="form-control textfill">
                    <option>Select City</option>
                    <option value="Chattogram">Chattogram</option>
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <select class="form-control textfill" name="area">
                    <option>Select Area</option>
                    <option value="Sea Beach">Sea Beach</option>
                    <option value="Chorpara">Chorpara</option>
                    <option value="Jele Para">Jele Para</option>
                    <option value="Alpha">Alpha</option>
                    <option value="C-Anchorage">C-Anchorage</option>
                    <option value="B-Anchorage">B-Anchorage</option>
                    <option value="karnaphuli">karnaphuli</option>
                  </select>
                </div>
                <div class="form-group col-md-4">
                  <input type="submit" name="" class="rounded btn btn-success btn-sm w-100">
                </div>
              </div>
            </form>
          </center>

        </div>

      </div>
    </div>
  </div>










  <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight" aria-labelledby="offcanvasRightLabel">
    <div class="offcanvas-header">
      <span>Categories</span>
      <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
    </div>
    <div class="p-0 offcanvas-body sidemenu">
      <ul class="uk-nav-parent-icon" uk-nav duration='800'>



        <?php
        $item = DB::table('product_item')->orderBy('sl', 'ASC')->get();
        ?>

        @if(isset($item))
        @foreach($item as $i)
          <?php
            $item_name = str_replace(" ", "-", $i->item_name);
            $category = DB::table('product_category')->where('item_id', $i->id)->get();
          ?>

        <li class="uk-parent">
          <a href="{{url('item')}}/{{$item_name}}/{{$i->id}}"><img src="{{ asset('public/itemImage') }}/{{ $i->image }}" class="img-fluid">&nbsp;&nbsp;{{ $i->item_name }}</a>
          <ul class="uk-nav-sub">
            @foreach($category as $cat)
            @if($cat->item_id == $i->id)

            <?php
              $category_name = str_replace(" ", "-", $cat->category_name);
              $sub_categories = DB::table('product_subcategory')->where('category_id', $cat->id)->get();

            ?>
            <li class="uk-parent sub-category-parent">
              <a href="{{url('category')}}/{{$category_name}}/{{$cat->id}}">{{ $cat->category_name }}</a>
              @if(count($sub_categories)>0)
              <i class="sub-category-toggler fas fa-chevron-down"></i>
              @endif
              <ul class="sub-category-list">
                @foreach($sub_categories as $sub_category)

                <?php
                $subcategory_name = str_replace(" ", "-", $sub_category->subcategory_name);
                ?>
                <li><a href="{{url('subcategory')}}/{{$subcategory_name}}/{{$sub_category->id}}">{{$sub_category->subcategory_name}}</a></li>
                @endforeach
              </ul>
            </li>

            @endif
            @endforeach
          </ul>
        </li>

        @endforeach
        @endif

        <!--
      <li><a href="{{ url('hugesaving') }}"><img src="{{ asset('public/fontdev/') }}/img/i1.webp" class="img-fluid">&nbsp;&nbsp;Huge Saving</a></li>
    <li><a href="{{ url('ordersavemore') }}"><img src="{{ asset('public/fontdev/') }}/img/i2.webp" class="img-fluid">&nbsp;&nbsp;Order more save more</a></li>
    <li><a href="{{ url('dicountoffer') }}"><img src="{{ asset('public/fontdev/') }}/img/i3.webp" class="img-fluid">&nbsp;&nbsp;Special Discount </a></li>
    <li><a href="{{ url('buyget') }}"><img src="{{ asset('public/fontdev/') }}/img/i4.webp" class="img-fluid">&nbsp;&nbsp;Buy 1 get 1 offers</a></li>
    <li><a href="{{ url('specialservices') }}"><img src="{{ asset('public/fontdev/') }}/img/i10.webp" class="img-fluid">&nbsp;&nbsp;Our special discount  offers</a></li> -->


        <!-- <div style="height: 150px;"></div> -->



      </ul>

    </div>
  </div>










  <script type="text/javascript">
    function Searchproduct()

    {

      var search = $("#searchbox").val();

      if (search != '')

      {

        $.ajax({
          headers: {
            'X-CSRF-TOKEN': "{{ csrf_token() }}"
          },
          url: '{{ url("Searchproduct") }}',
          type: 'POST',
          data: {
            search: search
          },
          success: function(data) {
            $('#searchdata').html(data);

          }

        })
      } else

      {
        $('#searchdata').html('');

      }

    }
  </script>