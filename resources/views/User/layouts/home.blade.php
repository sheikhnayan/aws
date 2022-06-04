@extends('User.layouts.master')
@section('body')


@php

$activeslider = DB::table('sliders')->where('place', 'Header')->orderBy('sl','DESC')->get();
$slidermore = DB::table('sliders')->orderBy('id','DESC')->skip(1)->limit(2)->get();
$setting = DB::table('settings')->first();
$category = DB::table('product_category')->orderBy('id','DESC')->limit(10)->get();

@endphp
<main>

    @if($setting->marquee)
    <div class="text-light d-flex py-2" style="background-color: #232323;">
        <marquee behavior="smooth" direction="">{{$setting->marquee}}</marquee>
    </div>
    @endif
    
    <section class="banner-section">
        <div class="banner-slider">
            @foreach($activeslider as $img)
            <div class="banner-img">
                <img src="{{ asset('public/sliderImage') }}/{{ $img->image }}" alt="">
            </div>
            @endforeach
        </div>

        <div class="container mt-3">
            <?php $item_name = str_replace(' ', '-', $man_item->item_name); ?>
           <a href="{{url('item')}}/{{$item_name}}/{{$man_item->id}}"> <img src="{{ asset('public/itemImage') }}/{{ $man_item->banner }}" alt="" style="width: 100%;"></a>
        </div>
    </section>

    <section class="mt-3">
        <div class="container">
            <div class="text-center">
                <h3><b>Popular Men's Categories</b></h3>
            </div>
            <div class="category-slider">

                 @if(isset($man_categories))
                  @foreach($man_categories as $cat)
                  @php
                  $category_name=str_replace(" ","-",$cat->category_name)
                  @endphp

                <div class="slide-item">
                    <a href="{{url('category')}}/{{$category_name}}/{{$cat->id}}">
                        <img src="{{ asset('public/categoryImage') }}/{{ $cat->image }}" alt="" class="w-100">
                    </a>
                </div>

                @endforeach
                @endif

            </div>

            <div class="text-center mt-5">
                <h3><b>Popular Product</b></h3>
            </div>

            <div class="category-slider mt-2">

                <?php $man_discount_products = DB::table('product_productinfo')
                    ->where('status', 1)
                    ->orderBy('id', 'DESC')
                    ->where('item_id', 113)
                    ->where('discount_per', '!=', 0)
                    ->limit(10)
                    ->get(); ?>
                @foreach($man_discount_products as $product)
                @php
                $productname=str_replace(["%","/"," "],"-", $product->product_name);

                $item = DB::table('product_item')->where('id', $product->item_id)->first();
                $category = DB::table('product_category')->where('id', $product->category_id)->first();

                $avg_rating = App\ProductRating::where('product_id', $product->product_id)->where('status', 1)->avg('guest_rating');
                @endphp


                <div class="slide-item">
                    @include('components.product-long')
                </div>
                
                @endforeach
            </div>

                <?php $man_without_discount_products = DB::table(
                    'product_productinfo'
                )
                    ->where('status', 1)
                    ->orderBy('id', 'DESC')
                    ->where('item_id', 113)
                    ->where('discount_per', 0)
                    ->limit(10)
                    ->get(); ?>

            @if($man_without_discount_products)
            <div class="category-slider mt-5">



                @foreach($man_without_discount_products as $product)
                @php
                $productname=str_replace(["%","/"," "],"-", $product->product_name);

                $item = DB::table('product_item')->where('id', $product->item_id)->first();
                $category = DB::table('product_category')->where('id', $product->category_id)->first();

                $avg_rating = App\ProductRating::where('product_id', $product->product_id)->where('status', 1)->avg('guest_rating');
                @endphp


                <div class="slide-item">
                    @include('components.product-long')
                </div>
                
                @endforeach
            </div>

            @endif

            <!-- @php
            $offerbanner = DB::table('explore_banners')->limit(4)->get();
            @endphp

            <div class="col-md-12 mt-4">
                <div class="row">

                    @if(isset($offerbanner))
                    @foreach($offerbanner as $offer)

                    <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3">
                        <a href="{{ $offer->url }}"><img src="{{ asset('public/exploreImage') }}/{{ $offer->image }}" class="img-fluid"></a>
                    </div>

                    @endforeach
                    @endif

                </div>
            </div> -->

            <div class="my-3">
                <?php $item_name = str_replace(
                    ' ',
                    '-',
                    $woman_item->item_name
                ); ?>
                <a href="{{url('item')}}/{{$item_name}}/{{$woman_item->id}}"> <img src="{{ asset('public/itemImage') }}/{{ $woman_item->banner }}" alt="" style="width: 100%;"></a>
            </div>

            <div class="text-center">
                <!-- <b><h3>Popular Women's Categories</h3></b> -->
            </div>

            <div class="category-slider">

                 @if(isset($woman_categories))
                  @foreach($woman_categories as $cat)
                  @php
                  $category_name=str_replace(" ","-",$cat->category_name)
                  @endphp

                <div class="slide-item">
                    <a href="{{url('category')}}/{{$category_name}}/{{$cat->id}}">
                        <img src="{{ asset('public/categoryImage') }}/{{ $cat->image }}" alt="" class="w-100">
                    </a>
                </div>

                @endforeach
                @endif

            </div>

            <div class="text-center mt-5">
                <h3><b>Popular Product</b></h3>
            </div>

            <div class="category-slider mt-2">

                <?php $woman_discount_products = DB::table(
                    'product_productinfo'
                )
                    ->where('status', 1)
                    ->orderBy('id', 'DESC')
                    ->where('item_id', 115)
                    ->where('discount_per', '!=', 0)
                    ->limit(10)
                    ->get(); ?>
                @foreach($woman_discount_products as $product)
                @php
                $productname=str_replace(["%","/"," "],"-", $product->product_name);

                $item = DB::table('product_item')->where('id', $product->item_id)->first();
                $category = DB::table('product_category')->where('id', $product->category_id)->first();

                $avg_rating = App\ProductRating::where('product_id', $product->product_id)->where('status', 1)->avg('guest_rating');
                @endphp

                <div class="slide-item">
                    @include('components.product-long')
                </div>
                
                 @endforeach
            </div>


            <div class="category-slider mt-2">

                <?php $woman_without_discount_products = DB::table(
                    'product_productinfo'
                )
                    ->where('status', 1)
                    ->orderBy('id', 'DESC')
                    ->where('item_id', 115)
                    ->where('discount_per', 0)
                    ->limit(10)
                    ->get(); ?>
                @foreach($woman_without_discount_products as $product)
                @php
                $productname=str_replace(["%","/"," "],"-", $product->product_name);

                $item = DB::table('product_item')->where('id', $product->item_id)->first();
                $category = DB::table('product_category')->where('id', $product->category_id)->first();

                $avg_rating = App\ProductRating::where('product_id', $product->product_id)->where('status', 1)->avg('guest_rating');
                @endphp


                <div class="slide-item">
                    @include('components.product-long')
                </div>
                
                @endforeach
            </div>


            @include('components.exchange_policy')

        </div>
    </section>
</main>


@endsection