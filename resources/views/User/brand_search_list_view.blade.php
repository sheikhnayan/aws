       

      
       @if(count($brandinfos)>0)
       @foreach ($brandinfos as $branddata)

       <div class="col-xl-2 col-lg-3 col-md-3 col-sm-4 col-6 mt-4">
        <div class="seller">
          <center>
            <a href="{{ url('brand-product-info') }}/{{ str_replace(' ', '', $branddata->company_name) }}/{{ $branddata->id }}">
              <img class="img-fluid" src="{{ asset('public/companyImage') }}/{{ $branddata->image }}"><br><br>
              {{ $branddata->company_name }}
            </a>
          </center>
        </div>
      </div>

      @endforeach
      @else

       {{ $brandinfos->links() }}

      <div class="">
         <center>
          <img src="{{ asset('public/Frontend/img/no-order.svg') }}" class="img-fluid"><br>
          <strong class="text-dark">Product Not Found</strong>
          </center>
      </div>
      @endif


