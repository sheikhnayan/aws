 @if(isset($searchproducts))
      @foreach($searchproducts as $data)
      @php
      $productname = str_replace(["%","/"," "],"-",$data->product_name);
      @endphp

      <div class="col-lg-2 cl-md-4 col-sm-6 col-6 mt-4">
        <div class="homeproducts">
          <center>
            <a href="{{url('product')}}/{{$productname}}/{{$data->product_id}}"><img src="{{asset('public/productImage')}}/{{$data->image}}" class="img-fluid" style=""></a>
          </center>

          <div>
            <a href="{{url('product')}}/{{$productname}}/{{$data->product_id}}">{{ substr($data->product_name, 0,20) }}<br>
              @if($data->discount_price>0)<del>TK.{{$data->sale_price}}</del>@endif&nbsp;&nbsp;<span>TK.{{$data->current_price}}</span></a>
            </div>
          </div>
        </div>
        
        @endforeach
        @endif
