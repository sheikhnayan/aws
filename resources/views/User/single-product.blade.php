<meta property="og:url" content="{{ Request::url() }}" />
<meta property="og:type" content="Article">
<meta property="og:title" content="{{ $viewproduct->product_name }}">
<meta property="og:description" content="{{ $viewproduct->product_name }}">
<meta property="og:image" content="{{ url('/public/productImage') }}/{{ $viewproduct->image }}" />

@extends('User.layouts.master')
@section('body')


@php
$setting = DB::table('settings')->first();
@endphp

<style>
    .nice-number {
        user-select: none;
        position: relative;
        max-width: 120px;
    }

    .nice-number .minus,
    .nice-number .plus {
        background: #ffffff;
        border: 1px solid #ddd;
        display: flex;
        align-items: center;
        justify-content: center;
        height: 50%;
        position: absolute;
        right: 0;
        width: 30px;
        cursor: pointer;
    }

    .nice-number .minus {
        top: 0;
    }

    .nice-number .plus {
        bottom: 0;
    }

    .nice-number__input {
        width: 100%;
        height: 100%;
        text-align: center;
        padding: 4px;
        padding-right: 30px;
    }

    input {
        height: 42px;
        width: 100px;
        text-align: center;
        font-size: 26px;
        border: 1px solid #ddd;
        border-radius: 4px;
        display: inline-block;
        vertical-align: middle;
    }

    .select_color {
        padding: 6px;
        border: 1px solid #c4c4c4;
        text-align: center;
        cursor: pointer;
        font-weight: 600;
        font-size: 12px;
        height: 40px;
        width: 40px;
    }

    .selected_color {
        padding: 6px;
        border: 3px solid #31a303 !important;
        text-align: center;
        ursor: pointer;
        font-weight: 800;
        height: 40px;
        width: 40px;
    }

    .select_size {
        border: 1px solid #c4c4c4;
        cursor: pointer;
        font-weight: 600;
        font-size: 12px;
        --size: 40px;
        width: var(--size);
        height: var(--size);
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
    }
    .select_size__check-mark {
        position: absolute;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ffffffd6;
        display: flex;
        align-items: center;
        justify-content: center;
        color: #00a127;
        font-size: 18px;
        display: none;
    }

    .selected_size .select_size__check-mark {
        display: flex;
    }

    .sl-wrapper.simple-lightbox {
        background-color: #a4a4a4;
        overflow: hidden;
        z-index: 2000;
    }

    .sl-close {
        color: white !important;
    }

    .sl-prev {
        color: white !important;
    }

    .sl-next {
        color: white !important;
    }

    .sl-counter {
        color: white !important;
    }

    .star-rating {
        display: flex;
        flex-direction: row-reverse;
        font-size: 1.5em;
        justify-content: space-around;
        padding: 0 .2em;
        text-align: center;
        width: 5em;
        padding-left: 24px;
    }

    .star-rating input {
        display: none;
    }

    .star-rating label {
        color: #ccc;
        cursor: pointer;
        font-size: 36px;
    }

    .star-rating :checked~label {
        color: #f90;
    }

    .star-rating label:hover,
    .star-rating label:hover~label {
        color: #fc0;
    }
</style>


<div class="col-md-12">
    <div class="container">
        @include('components.offer_banner')
    </div>
    <div style="background-color: #e9e9e9;">
        <div class="container">
            <div class="py-2 mt-3 col-md-12 breadcumbs">
                <li><a href="{{ url('/') }}">Home</a></li>
                <li><i class="bi bi-chevron-right"></i></li>
                <li>{{ $viewproduct->product_name }}</li>
            </div>
        </div>
    </div>

    <div class="container overflow-hidden">
        <div class="row">
            <!----------End Sidebar-------->
            <div class="pb-5 col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="p-3 pb-4 mt-4 bg-white rounded col-md-12 single p-lg-0">
                    <div class="row">
                        <div class="p-4 col-xl-5 col-lg-6 col-md-6 col-12">
                            <div class="simpleLens-gallery-container" id="demo-1">
                                <div class="row">
                                    <div class="col-lg-3 order-2 order-lg-0">
                                        <div class="product-thumb-gallery">
                                            @foreach($product_image as $img)
                                            <div class="product-thumb-gallery-item">
                                                <!-- <img src="{{ asset('public/productImage') }}/{{ $viewproduct->image }}" alt=""> -->
                                                <img src="{{asset('/public/productImage')}}/{{$img->image}}" alt="">
                                            </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="col-lg-9">
                                        <div class="border simpleLens-container" style="width: 100%;">
                                            <div class="p-2 simpleLens-big-image-container">
                                                @foreach($product_image as $img)
                                                <a href="{{asset('/public/productImage')}}/{{$img->image}}" class="simpleLens-lens-image popup-image" data-lens-image="{{asset('/public/productImage')}}/{{$img->image}}">
                                                    <img src="{{asset('/public/productImage')}}/{{$img->image}}" class="simpleLens-big-image product-image-zoom">
                                                </a>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-7 col-lg-6 col-md-6 col-12">
                            <h2 class="fw-bold">{{ $viewproduct->product_name }}</h2>
                            <span><b>SKU:</b> {{ $viewproduct->product_id }}</span><br>
                            @if($viewproduct->stock_status == 1)
                            <span class="rounded bg-success text-light" style="padding: 2px 10px; font-size: 13px;">Stock Available</span>
                            @else
                            <span class="rounded bg-danger text-light" style="padding: 2px 10px; font-size: 13px;">Stock Out</span>
                            @endif
                            <br><br>

                            <label>৳ {{ number_format($viewproduct->current_price, 2, '.', ',') }}</label>

                            @if ($viewproduct->discount_price > 0)
                            <del>৳ {{ number_format($viewproduct->sale_price, 2, '.', ',') }}</del>
                            @endif
                            <br>
                            <p>{!! $viewproduct->product_us ?? '' !!}</p>

                            @if(count($product_color)>0)
                            <div class="mt-3 mb-3 color_select">
                                <div class="row" style="padding-right: 40px;">
                                    <div class="col-md-12">
                                        <p style="margin: 0"><b>Color : </b></p>
                                        <div class="g-2 row select_size-container">
                                            @foreach($product_color as $color)
                                            <div class="col-auto">
                                                <div class="select_size select-color" data-id="{{ $color->id }}" style="background-color: {{$color->color}}; color: {{$color->color}}">
                                                    <span class="d-none">{{$color->color}}</span>
                                                    <div class="select_size__check-mark">
                                                        <i class="fa fa-check"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                            <input type="hidden" name="color" id="customer_selected_color" style="text-align: left;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif

                            @if(count($product_size)>0)
                            <div class="mt-3 mb-3 color_select">
                                <div class="row" style="padding-right: 40px;">
                                    <div class="col-md-12">
                                        <p style="margin: 0"><b>Size : </b></p>
                                        <div class="g-2 row select_size-container">
                                            @foreach($product_size as $size)
                                            <div class="col-auto">
                                                <div class="select_size" data-id="{{ $size->id }}">
                                                    {{$size->size}}
                                                    <div class="select_size__check-mark">
                                                        <i class="fa fa-check"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            @endforeach
                                            <input type="hidden" name="size" id="customer_selected_size" style="text-align: left;">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endif


                            <div class="mt-5">
                                <label>Quantity</label><br>

                                <div class="row row-cols-2 row-cols-sm-3 g-3 pe-3">
                                    <div class="col">
                                        <div class="nice-number me-3" style="max-width: 100%;">
                                            
                                            <span class="plus">+</span>
                                            
                                            <input type="label" class="quantity nice-number__input" min="{{ $viewproduct->min_qunt }}" name="Quantity-{{ $viewproduct->id }}" id="Quantity-{{ $viewproduct->id }}" value="{{ $viewproduct->min_qunt }}" />
                                            

                                            <span class="minus">-</span>
                                        </div>
                                    </div>

                                    <div class="col">
                                        @if($viewproduct->stock_status == 1)
                                        <button class="cart w-100" onclick="AddCart('{{ $viewproduct->id }}')"><i class="fa fa-shopping-basket" aria-hidden="true"></i>&nbsp;&nbsp;Add To Cart</button>
                                        @else
                                        <button class="cart w-100" style="cursor: not-allowed;"><i class="fa fa-shopping-basket" aria-hidden="true"></i>&nbsp;&nbsp;Add To Cart</button>
                                        @endif
                                    </div>

                                    <div class="col">
                                        @if(Auth('guest')->user())
                                        <form action="{{ url('/buy_now') }}" method="post">
                                            <input type="hidden" name="product_id" value="{{ $viewproduct->id }}">

                                            <input type="hidden" name="weight" id="buy_now_weight">

                                            <input type="hidden" name="size" id="buy_now_size">

                                            <input type="hidden" name="color" id="buy_now_color">

                                            <input type="hidden" name="Quantity" value="{{ $viewproduct->min_qunt }}" min="{{ $viewproduct->min_qunt }}" class="buy_now_quantity">

                                            @csrf
                                            <button class="cart w-100 text-nowrap" type="submit" 
                                                style="background: #1b99bf;"><i class="fa fa-shopping-basket me-2"></i> Buy
                                                Now</button>
                                        </form>
                                        @else
                                            <a href="{{ url('/user-login') }}" class="cart w-100 text-nowrap text-white d-inline-block" style="background: #1b99bf;">
                                                <i class="fa fa-shopping-basket me-2"></i> Buy Now
                                            </a>
                                        @endif
                                    </div>


                                </div>
                            </div>


                            <div class="mt-4">
                                <span>Share With :</span><br>
                                <div class="addthis_inline_share_toolbox_0v9d"></div>

                            </div>


                        </div>
                    </div>
                </div>
                <!--------------End Product's--------------------->





                <div class="p-0 p-4 mt-4 bg-white col-md-12 details">

                    <ul class="nav nav-tabs" id="myTab">
                        <li class="nav-item">
                            <a href="#Description" class="nav-link active" data-bs-toggle="tab">Description</a>
                        </li>
                        <li class="nav-item">
                            <a href="#Review" class="nav-link" data-bs-toggle="tab">Review</a>
                        </li>

                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="Description">
                            <h4 class="mt-2">{{ $viewproduct->product_name }}</h4>
                            <p>{!! $viewproduct->product_details !!}</p>
                        </div>

                        <div class="tab-pane fade" id="Review">
                            <div class="rating_details" style="border-bottom: 1px solid #dedede; padding: 25px;">
                                <div class="row">

                                    <div class="col-md-6" style="text-align: center;">
                                        @if($avg_rating > 0)
                                        <h1 style="margin: 0;">{{ substr($avg_rating, 0, 3) }}</h1>
                                        @else
                                        <h1 style="margin: 0;">0</h1>
                                        @endif

                                        @if($avg_rating == 5)
                                        <span class="fa fa-star checked" style="color: orange;"></span>
                                        <span class="fa fa-star checked" style="color: orange"></span>
                                        <span class="fa fa-star checked" style="color: orange"></span>
                                        <span class="fa fa-star checked" style="color: orange"></span>
                                        <span class="fa fa-star checked" style="color: orange"></span>
                                        @elseif($avg_rating >= 4)
                                        <span class="fa fa-star checked" style="color: orange;"></span>
                                        <span class="fa fa-star checked" style="color: orange"></span>
                                        <span class="fa fa-star checked" style="color: orange"></span>
                                        <span class="fa fa-star checked" style="color: orange"></span>
                                        <span class="fa fa-star"></span>
                                        @elseif($avg_rating >= 3)
                                        <span class="fa fa-star checked" style="color: orange;"></span>
                                        <span class="fa fa-star checked" style="color: orange"></span>
                                        <span class="fa fa-star checked" style="color: orange"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        @elseif($avg_rating >= 2)
                                        <span class="fa fa-star checked" style="color: orange;"></span>
                                        <span class="fa fa-star checked" style="color: orange"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        @elseif($avg_rating >= 1)
                                        <span class="fa fa-star checked" style="color: orange;"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        @else
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        <span class="fa fa-star"></span>
                                        @endif

                                        <p style="margin: 0;">Average Rating based on {{$total_rating ?? 0}} reviews.</p>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="row">
                                            <div class="side">
                                                <div>5 star</div>
                                            </div>
                                            <div class="middle">
                                                <div class="bar-container">
                                                    <div class="bar-5" style="width: {{$five_star ?? 0}}%;"></div>
                                                </div>
                                            </div>
                                            <div class="side right">
                                                <div>{{$five_star ?? 0}}</div>
                                            </div>
                                            <div class="side">
                                                <div>4 star</div>
                                            </div>
                                            <div class="middle">
                                                <div class="bar-container">
                                                    <div class="bar-4" style="width: {{$four_star ?? 0}}%; "></div>
                                                </div>
                                            </div>
                                            <div class="side right">
                                                <div>{{$four_star ?? 0}}</div>
                                            </div>
                                            <div class="side">
                                                <div>3 star</div>
                                            </div>
                                            <div class="middle">
                                                <div class="bar-container">
                                                    <div class="bar-3" style="width: {{$three_star ?? 0}}%;"></div>
                                                </div>
                                            </div>
                                            <div class="side right">
                                                <div>{{$three_star ?? 0}}</div>
                                            </div>
                                            <div class="side">
                                                <div>2 star</div>
                                            </div>
                                            <div class="middle">
                                                <div class="bar-container">
                                                    <div class="bar-2" style="width: {{$two_star ?? 0}}%; "></div>
                                                </div>
                                            </div>
                                            <div class="side right">
                                                <div>{{$two_star ?? 0}}</div>
                                            </div>
                                            <div class="side">
                                                <div>1 star</div>
                                            </div>
                                            <div class="middle">
                                                <div class="bar-container">
                                                    <div class="bar-1" style="width: {{$one_star ?? 0}}%; "></div>
                                                </div>
                                            </div>
                                            <div class="side right">
                                                <div>{{$one_star ?? 0}}</div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>

                            <div class="row">

                                <div class="col-md-6">

                                    @if(count($product_ratings)>0)
                                    @foreach($product_ratings as $product_rating)
                                    <?php
                                    $guest = DB::table('guest')
                                        ->where('id', $product_rating->guest_id)
                                        ->first();
                                    $product_rating_images = App\ProductReviewImage::where(
                                        'product_rating_id',
                                        $product_rating->id
                                    )->get();
                                    ?>
                                    <div class="comments" style="padding: 14px;padding: 14px;border: 1px solid #e4e4e4;">

                                        <h4 style="margin:0;color: darkgreen;font-weight: bold;font-size: 17px;">{{$guest->first_name ?? ''}}
                                            (

                                            @if($product_rating->guest_rating == 5)
                                            <span class="fa fa-star checked" style="color: orange;"></span>
                                            <span class="fa fa-star checked" style="color: orange"></span>
                                            <span class="fa fa-star checked" style="color: orange"></span>
                                            <span class="fa fa-star checked" style="color: orange"></span>
                                            <span class="fa fa-star checked" style="color: orange"></span>
                                            @elseif($product_rating->guest_rating >= 4)
                                            <span class="fa fa-star checked" style="color: orange;"></span>
                                            <span class="fa fa-star checked" style="color: orange"></span>
                                            <span class="fa fa-star checked" style="color: orange"></span>
                                            <span class="fa fa-star checked" style="color: orange"></span>
                                            <span class="fa fa-star"></span>
                                            @elseif($product_rating->guest_rating >= 3)
                                            <span class="fa fa-star checked" style="color: orange;"></span>
                                            <span class="fa fa-star checked" style="color: orange"></span>
                                            <span class="fa fa-star checked" style="color: orange"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            @elseif($product_rating->guest_rating >= 2)
                                            <span class="fa fa-star checked" style="color: orange;"></span>
                                            <span class="fa fa-star checked" style="color: orange"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            @elseif($product_rating->guest_rating >= 1)
                                            <span class="fa fa-star checked" style="color: orange;"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            @else
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            <span class="fa fa-star"></span>
                                            @endif

                                            )
                                        </h4>

                                        <p style="margin:0;font-size: 14px;color: #6e6e6e;">{!! $product_rating->comment !!} </p>

                                        <div class="row">
                                            @foreach($product_rating_images as $img)
                                            <div class="col-md-3 imageGallery1">
                                                <a class="" href="{{ asset($img->image) }}">

                                                    <img src="{{ asset($img->image_thumb) }}" alt="" style="height: 100%;width: 100%;object-fit: cover;">

                                                </a>

                                            </div>
                                            @endforeach
                                        </div>

                                    </div>
                                    @endforeach
                                    @else
                                    <p style="text-align: center; margin-top: 2rem;font-size: 18px;font-weight: 700;">No Rating Yet</p>
                                    @endif

                                </div>
                                <div class="col-md-6">
                                    <div style="border-left: 1px solid #f4eaea; padding: 10px;">
                                        <h4 class="mt-2"><strong>Write Your Review</strong></h4>
                                        @if(Session::has('feedback_submited'))
                                        <p class="alert {{ Session::get('alert-class', 'alert-success') }}">{{ Session::get('feedback_submited') }}</p>
                                        @endif

                                        @if ($errors->any())
                                        <div class="alert alert-danger">
                                            <ul>
                                                @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                                @endforeach
                                            </ul>
                                        </div>
                                        @endif

                                        @if(Auth('guest')->user())
                                        <form action="{{ route('submit-feedback') }}" method="post" enctype="multipart/form-data">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $viewproduct->product_id }}">
                                            <input type="hidden" name="guest_id" value="{{ Auth('guest')->id() }}">
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label">Rating</label>

                                                <div class="star-rating">
                                                    <input type="radio" id="5-stars" name="guest_rating" value="5" />
                                                    <label for="5-stars" class="star">&#9733;</label>
                                                    <input type="radio" id="4-stars" name="guest_rating" value="4" />
                                                    <label for="4-stars" class="star">&#9733;</label>
                                                    <input type="radio" id="3-stars" name="guest_rating" value="3" />
                                                    <label for="3-stars" class="star">&#9733;</label>
                                                    <input type="radio" id="2-stars" name="guest_rating" value="2" />
                                                    <label for="2-stars" class="star">&#9733;</label>
                                                    <input type="radio" id="1-star" name="guest_rating" value="1" />
                                                    <label for="1-star" class="star">&#9733;</label>
                                                </div>

                                                <!--<select name="guest_rating" id="" class="form-control" style="color: #ff9f06;font-weight: bolder;" required="">-->
                                                <!--    <option value="5">★★★★★</option>-->
                                                <!--    <option value="4">★★★★</option>-->
                                                <!--    <option value="3">★★★</option>-->
                                                <!--    <option value="2">★★</option>-->
                                                <!--    <option value="1">★</option>-->
                                                <!--</select>-->
                                            </div>
                                            <div class="mb-3">
                                                <label for="exampleFormControlInput1" class="form-label">Comment</label>
                                                <textarea name="comment" class="form-control" rows="3" required=""></textarea>
                                                <input type="file" name="image[]" multiple="" style="width: 100%; height: 38px;font-size: 12px;margin-top: 6px;font-weight: 700;">
                                            </div>
                                            <button type="submit" class="btn btn-warning text-light">Submit</button>
                                        </form>
                                        @else

                                        <a href="{{ url('user-login') }}" class="text-dark"><button type="submit" class="btn btn-info text-light">Login</button></a>

                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>

                </div>




                <div class="mt-5 col-md-12 cathead">
                    <strong>Related Products</strong>
                    <div class="row">

                        @if (isset($related_product))
                        @foreach ($related_product as $product)
                        @php
                        $productname = str_replace(['%', '/', ' '], '-', $product->product_name);
                        @endphp



                        <div class="mt-4 col-xl-3 col-lg-3 col-md-3 col-sm-4 col-6">
                            @include('components.product-long')
                        </div>


                        @endforeach
                        @endif






                    </div>
                </div>





            </div>


        </div>
    </div>
</div>









@endsection