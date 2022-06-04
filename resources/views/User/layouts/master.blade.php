@include('User.layouts.header')

@yield('body')

@include('User.layouts.footer')

<script type="text/javascript">
	shopping_cart();
	placeorder_show();
	totalcartprice();
	totalcartqunt();
	totalcartamount();
	totalcartamounts();
	
	 $('#loading').hide();

	function AddCart(product_id)
	{
		var Quantity = $("#Quantity-"+product_id).val();
		// var size = $("#size-"+product_id).val();
		// var color = $("#color-"+product_id).val();

		var size = $('#customer_selected_size').val();
		var color = $('#customer_selected_color').val();

		$.ajax({
			headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
			url: '{{ url("add_to_cart") }}',
			type:'POST',
			data:{product_id:product_id,Quantity:Quantity,size:size,color:color},
			beforeSend:function(){
				 $('#cartbutton').hide();
				 $('#loading').show();
			},
			success: function(data)
			{
				UIkit.notification({
					message: '<i class="fa fa-shopping-basket"></i>&nbsp;&nbsp;&nbsp;Product Added To Shopping Cart',
					pos:     'bottom-center',
					timeout:  2000,
					status: 'primary',
				});
				shopping_cart();
				totalcartprice();
				totalcartqunt();
				totalcartamount();

				$('#loading').hide();
				$('#cartbutton').show();
			}
		});
	}



	function AddToWishList(product_id)
	{
		var Quantity = $("#Quantity-"+product_id).val();
		// var size = $("#size-"+product_id).val();
		// var color = $("#color-"+product_id).val();
		var size = $('#size').val();
		var color = $('#color').val();

		$.ajax({
			headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
			url: '{{ url("add_to_wistlist") }}',
			type:'POST',
			data:{product_id:product_id,Quantity:Quantity,size:size,color:color},
			beforeSend:function(){
				 $('#cartbutton').hide();
				 $('#loading').show();
			},
			success: function(data)
			{
				UIkit.notification({
					message: '<i class="fa fa-shopping-basket"></i>&nbsp;&nbsp;&nbsp;Product Added To Wishlist',
					pos:     'bottom-center',
					timeout:  2000,
					status: 'primary',
				});
				shopping_cart();
				totalcartprice();
				totalcartqunt();
				totalcartamount();

				$('#loading').hide();
				$('#cartbutton').show();

				$(".wishlistCount").html( data);
			},
			error:function(data) {
				UIkit.notification({
					message: '<i class="fa-solid fa-arrow-right-to-bracket"></i>&nbsp;&nbsp;&nbsp;Please Login First',
					pos:     'bottom-center',
					timeout:  2000,
					status: 'error',
				});
			}
		});
	}

	function delete_wishlist(product_id)
	{
		
		$.ajax({
			headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
			url: '{{ url("remove-from-wishlist") }}',
			type:'POST',
			data:{product_id:product_id},
			success: function(data)
			{
				UIkit.notification({
					message: '<i class="fa fa-trash"></i>&nbsp;&nbsp;&nbsp;Product Remove To Wishlist',
					pos:     'bottom-center',
					timeout:  2000
				});

				location.reload();

			}
		});
	}



	function shopping_cart()
	{
		
		$.ajax({
			headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
			url: '{{ url("shoppingcart_view") }}',
			type:'POST',
			data:{},
			success: function(data)
			{
				$("#cartshow").html(data);
			}
		});
	}


	function placeorder_show()
	{
		
		$.ajax({
			headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
			url: '{{ url("placeorder_show") }}',
			type:'POST',
			data:{},
			success: function(data)
			{
				$("#placeordershow").html(data);
			}
		});
	}

	function delete_product(product_id)
	{
		
		$.ajax({
			headers: { 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
			url: '{{ url("delete_product") }}',
			type:'POST',
			data:{product_id:product_id},
			success: function(data)
			{
				UIkit.notification({
					message: '<i class="fa fa-trash"></i>&nbsp;&nbsp;&nbsp;Product Remove To Shopping Cart',
					pos:     'bottom-center',
					timeout:  2000
				});

				shopping_cart();
				placeorder_show();
				totalcartprice();
				totalcartqunt();
				totalcartamount();
			}
		});
	}


	function totalcartprice()
	{
		$("#cartprice").load( "{{url('totalprice')}}" );
	}
	function totalcartqunt()
	{
		$("#cartqunt, .cartqunt").load( "{{url('totalcartqunt')}}" );
	}
	function totalcartamount()
	{
		$("#cartamount").load( "{{url('totalcartamount')}}" );
	}

	function totalcartamounts()
	{
		$("#cartamounts").load( "{{url('totalcartamounts')}}" );
	}




</script>
