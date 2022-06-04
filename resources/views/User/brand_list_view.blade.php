@extends('User.layouts.master')
@section('body')





<div class="col-md-12 pt-4 pb-4 bg-white border-bottom">
  <div class="container padd">
    <div class="row">
      <div class="col-xl-9 col-lg-9 col-md-6 col-sm-6 col-12 text-sm-left text-center catheader2">
        <span>All Brands</span>
      </div>

      <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 text-sm-left text-center catsearch">
        <div class="input-group">
          <input type="text" class="form-control" id="searchbrand" placeholder="Search..." name="searchbrand"  autocomplete="off">
          <div class="input-group-append">
            <button class="btn" type="submit" onclick="searchbrandlist()"><i class="fa fa-search"></i></button>
          </div>
        </div>
        
      </div>

    </div>
  </div>
</div>




<div class="col-md-12">
  <div class="container padd">

    <div class="scrolling-pagination">
      <div class="row" id="showbrand">

       @if(isset($brandinfo))
       @foreach ($brandinfo as $branddata)

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
      @endif


    </div>

    {{ $brandinfo->links() }}

  </div>

</div>
</div><!------------End Brand-------------->






<script>
  function searchbrandlist()
  {

    var searchtext = $("#searchbrand").val();
    if (searchtext != '')

    {
      $.ajax({
        headers: {
          'X-CSRF-TOKEN': "{{ csrf_token() }}"
        },
        url: '{{ url('search-brand-list') }}',

        type: 'POST',
        data: {
          searchtext: searchtext,
        },
        success: function(data)
        {
          $('#showbrand').html(data);

          $("#searchbrand").val('');

        }

      })

    } else

    {

      $("#searchbrand").val('');

    }
  }

</script>



@endsection

