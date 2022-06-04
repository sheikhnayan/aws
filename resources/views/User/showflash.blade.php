
@if(count($shop)>0)
<input type="hidden" name="end_date" id="end_date" value="{{$shop[0]->end_date_time}}">
        <input type="hidden" name="start" id="start">
        
        @foreach($shop as $data)
        @php
        $productname = str_replace(["%","/"," "],"-",$data->product->product_name);
        @endphp
        
        <li class="homeproducts border">
          <div class="col-sm-12 col-12">
            <center>
              <a href="{{url('product')}}/{{$productname}}/{{$data->product->product_id}}"><img src="{{asset('public/productImage')}}/{{$data->product->image}}" class="img-fluid" style=""></a>
            </center>
            
              
     
            
            <div>
              <a href="{{url('product')}}/{{$productname}}/{{$data->product->product_id}}"><center>{{$data->product->product_name}}<br>
                <span><del class="text-dark">TK.{{$data->product->sale_price}}</del>&nbsp;&nbsp;TK.{{$data->product->current_price}}</span></center></a>
              </div>
            </div>
          </li>
          
         @endforeach
         
@else
<span tabindex="-1" class="uk-active" style="
    width: 1000px;
    height: 400px;
"><img src="{{asset('public/notfound.jpg')}}" style="height: 458px;"></span>

@endif