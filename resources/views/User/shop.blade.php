@extends('User.layouts.master')

@section('body')



  <style>
      
.searchsections{
  background: #f4f4f4;
  padding: 25px;
}


.searchsections span{
  color: #fff;
  font-size: 35px;

}

.searchoption{
  border-radius: 0px;
  border:none;
  font-size: 15px;
  cursor: pointer;
}


.searchoption:focus{
  box-shadow: none;
}



.searchbutton{
  border:0px;
  padding: 6px 20px;
  color: #fff;
  background-color: #8e44ad;
  font-size: 18px;
  cursor: pointer;
}

.searchbutton:focus{
  box-shadow: none;
  border:none;
  outline: none;
  background-color: #8e44ad;
  color:#fff;

}


  </style>
  
  
  @php
  
  $iteminfo = DB::table('product_item')->get();
    
  @endphp


  <div class="col-sm-12 col-12 searchsections pt-5 pb-5">
      <div class="container">
    <div class="row">


      <div class="col-lg-3 col-md-6 col-sm-6 col-12 text-center">
          
         <select name="item_id" onchange="GetCategory();"  id="item_id" class="form-control searchjs searchoption">
                          <option value="">Select An Item</option>
                          @if(count($iteminfo))
                              @foreach ($iteminfo as $item)
                                <option value="{{$item->id}}">{{$item->item_name}}</option>
                              @endforeach
                            @endif
                          
                          </select><br>
      </div>


      <div class="col-lg-3 col-md-6 col-sm-6 col-12 text-center">
        <select name="category_id" id="category_id" onchange="getsubcat();" class="form-control searchjs1 searchoption">
                  <option value=""> Select A Category</option>
        </select><br>
      </div>


      <div class="col-lg-3 col-md-6 col-sm-6 col-12  text-center">
       <select name="subcategory_id" id="subcategory_id" class="form-control searchjs2 searchoption">
                            <option value=""> Select A subCategory</option>
                          </select><br>
      </div>



      <div class="col-lg-3 col-md-6 col-sm-6 col-12 text-center">
         <button type="button" class="searchbutton form-control">Search </button>
      </div>

    </div>
  </div>




</div><!---------End Search-------->




<div class="col-sm-12 col-12 mt-3">
	<div class="container">
		<div class="row" >




			<div class="col-lg-12 col-md-12 col-sm-12 col-12">

				<div>
					<!--<img src="{{asset('/public/Frontend')}}/img/banner.png" class="img-fluid"><br>-->
					<ul class="uk-breadcrumb">
						<li><a href="{{ url('/') }}">Home</a></li>
						<li><span>Proudct</span></li>
					</ul>
				</div>



				<div class="col-sm-12 col-12 pa">
					<div class="row" id="showdata">

						@if(isset($shop))
						@foreach($shop as $s)
						@php 
						$productname=str_replace(["%","/"," "],"-",$s->product_name)
						@endphp
						<div class="col-lg-2 col-md-2 col-sm-6 col-6 mt-4">
							<div class="homeproducts border">
							<center>
								<a href="{{url('product')}}/{{ $productname}}/{{$s->product_id}}"><img src="{{asset('public/productImage')}}/{{$s->image}}" class="img-fluid"></a>
							</center>

							<div>
								<center>
									<a href="{{url('product')}}/{{ $productname}}/{{$s->product_id}}">{{ substr($s->product_name, 0,20) }}</a><br>
									<span>@if($s->discount_price>0)<del>TK.{{$s->sale_price}}</del>@endif&nbsp;&nbsp;&nbsp;{{ $s->current_price }} Tk</span>
								</center>
							</div>
						</div>
						</div><!------End Product------------>

						@endforeach
						@endif


						<div class="col-sm-12 col-12 mt-5">
							{{ $shop->links() }}
						</div>




					</div>
				</div>




			</div>
		</div>
	</div>
</div>




@endsection
<script type="text/javascript">
	function brand_search()
	{

		var id = [];
		$("#brand_id:checked").each(function(index, el) {
			id.push(this.value);
		});

		$("#brand_id:checked").change(function(){

			var id = [];
			$("#brand_id:checked").each(function(index, el) {
				id.push(this.value);
			});


			if(id != '')
			{

				$.ajax({

					headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
					url: '{{ url("brand_wise_search") }}',
					type: 'POST',
					data: {id:id},
					success: function(data)
					{
						$('#showdata').html(data);
					}
				})

			}


		});
	}



	function size_search()
	{

		var id = [];
		$("#size:checked").each(function(index, el) {
			id.push(this.value);
		});

		$("#size:checked").change(function(){

			var id = [];
			$("#size:checked").each(function(index, el) {
				id.push(this.value);
			});


			if(id != '')
			{

				$.ajax({

					headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
					url: '{{ url("size_wise_search") }}',
					type: 'POST',
					data: {id:id},
					success: function(data)
					{
						$('#showdata').html(data);
					}
				})

			}


		});
	}
	
	function color_search()
	{

		var id = [];
		$("#color:checked").each(function(index, el) {
			id.push(this.value);
		});

		$("#color:checked").change(function(){

			var id = [];
			$("#color:checked").each(function(index, el) {
				id.push(this.value);
			});


			if(id != '')
			{

				$.ajax({

					headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
					url: '{{ url("color_wise_search") }}',
					type: 'POST',
					data: {id:id},
					success: function(data)
					{
						$('#showdata').html(data);
					}
				})

			}


		});
	}
	
	function price_search()
	{
		var id = $("#price:checked").val();

		$("#price:checked").change(function(){

			var id = $("#price:checked").val();



			if(id != '')
			{

				$.ajax({

					headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
					url: '{{ url("price_wise_search") }}',
					type: 'POST',
					data: {id:id},
					success: function(data)
					{
						$('#showdata').html(data);
					}
				})

			}


		});
	}
</script>


<script>
    
function GetCategory() {
  var item_id=$('#item_id').val();
  if (item_id!=0) {
      $.ajax({
        headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
        url: '{{ url("CreateProductGetCategory") }}',
        type: 'POST',
        data: {id: item_id},
        success: function(data){
          $('#category_id').html(data);
          //GetBrand(); 
        }
      });
  } 
  else {
    $('#category_id').html('<option value="0">Select A Category</option>');
  }
}

function getsubcat() {
  var category_id=$('#category_id').val();
  if (category_id!=0) {
      $.ajax({
        headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
        url: '{{ url("CreateProductGetsubCategory") }}',
        type: 'POST',
        data: {id: category_id},
        success: function(data){
          $('#subcategory_id').html(data);
          //GetBrand(); 
        }
      });
  } 
  else {
    $('#subcategory_id').html('<option value="0">Select A subCategory</option>');
  }
}


</script>