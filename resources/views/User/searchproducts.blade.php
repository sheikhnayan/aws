@extends('User.layouts.master')
@section('body')



<div class="col-md-12">
  <div class="container">
    <div class="row">

      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 d-none d-lg-block"> 
        @include('User.layouts.sidmenu')
      </div><!----------End Sidebar-------->

      @if(count($searchproducts)>0)
      <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12 pb-5">


        <div class="col-md-12 mt-2 cathead">
          <strong>Search Products</strong>
        </div>

        <div class="col-md-12">
          <div class="scrolling-pagination">
            <div class="row">


              @if(isset($searchproducts))
              @foreach($searchproducts as $product)
              @php 
              $productname=str_replace(["%","/"," "],"-",$product->product_name)
              @endphp

              <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-6 mt-4">
                @include('components.product-long')
              </div>


              @endforeach
              @endif

              {{ $searchproducts->links() }}

            </div>

          </div>
        </div>

      </div>

      @else 

      <div class="col-xl-9 col-lg-9 col-md-8 col-sm-12 col-12 pt-5">
        <div class="container padd">
          <center><img src="{{ asset('public/Frontend/img/no-order.svg') }}" class="img-fluid"><br>
            <strong class="text-dark">Product Not Found</strong>
          </center>

        </div>
      </div>


      @endif



      
    </div>
  </div>
</div>







@endsection




