@extends('User.layouts.master')
@section('body')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>








<div class="col-md-12 pt-4 pb-4 bg-white border-bottom">
	<div class="container">
		<div class="row">
			<div class="col-md-9 catheader2">
				<span>Checkout---(Step-1)</span>
			</div>

		</div>
	</div>
</div>

@if(count($vieworder)>0)
@if(Auth('guest')->user())

<form  id="form_file" action="{{url('/ordesystem')}}" method="post" enctype="multipart/form-data">
	@csrf

	<div class="col-md-12">
		<div class="container padd">
			<div class="row">

				<div class="col-lg-5 col-md-12 col-sm-12 col-12 mt-4">

					<div class="mb-3"><strong>Shipping</strong></div>


					<div class="productsummarys p-4">

						<div class="row">
							<div class="form-group col-sm-12 mb-3">
								<label><b>Name</b> <span class="text-danger">*</span></label>
								<input type="text" class="form-control textfill" name="fname" placeholder="First Name" required="" value="{{Auth('guest')->user()->first_name}} {{Auth('guest')->user()->last_name}}">
							</div>

							<div class="form-group col-12 mb-3">
								<label><b>Mobile</b> <span class="text-danger">*</span></label>
								<input type="text" class="form-control textfill" name="phone" placeholder="Mobile" required="" value="{{Auth('guest')->user()->phone}}">
							</div>

							<div class="form-group col-12 mb-3">
								<label><b>Full Address</b> <span class="text-danger">*</span></label>
								<input type="text" class="form-control textfill" name="address" placeholder="Address" required="" value="{{Auth('guest')->user()->address}}">
							</div>

							<div class="form-group col-12 mb-3">
								<label><b>Area</b> <span class="text-danger">*</span></label>
								<select  id="zone_id" name="zone_id" title="District/State" class="form-control searchjs textfill" style="" defaultvalue="" required="" autocomplete="off" onchange="return charge();" onchange="return charge();">

									<option value="">Please select area</option>
									@if($zone)
									@foreach($zone as $zonedata)
									<option value="{{$zonedata->id}}">{{$zonedata->zone_name}}</option>
									@endforeach
									@endif


								</select>
							</div>

							<div class="form-group col-12 mb-3">
								<label><b>Notes</b> <span class="text-danger">*</span></label>
								<textarea name="note" class="form-control textfill" cols="30" rows="3"></textarea>
							</div>


						</div>
					</div>
				</div>

				<div class="col-lg-7 col-md-12 col-sm-12 col-12 mt-4">
					<div class="row">
						<div class="col-md-6">
							<div class="mb-3"><strong>Order Summary</strong></div>
						</div>
						<div class="col-md-6">
							<button type="button" class="btn btn-danger float-end mb-2" onclick="applyRedeem();">Redeem your points</button>
						</div>
					</div>
					

					

					<div class="pricesummary p-4">

						<div class="table-responsive">
							<table class="table" style="font-size: 13px;">
								<thead>
									<tr class="text-center">
										<th>Product Name</th>
										<th>Quantity</th>
										<th>Price</th>
										<th>Subtotal</th>
										<th>Remove</th>
									</tr>
								</thead>
								<tbody id="placeordershow">

								</tbody>
							</table>
						</div>
						<hr>


						<diV>
							<input type="checkbox" name="terms" id="terms" onchange="activateButton(this)" >  Confirm Order
							<br>
							<br>
							<input type="submit" name="submit" id="submit" class="btn btn-dark d-block p-2 w-100" style="border:none; cursor: not-allowed;" disabled="disabled">
						</diV>


					</div>
				</div>

			</div>
		</div>
	</div>


</form>




		<div class="col-sm-12 col-12 mt-4">
			<div class="container">
<!-- 				<div>
					<ul class="uk-breadcrumb">
						<li><a href="">Home</a></li>
						<li><span>Checkout</span></li>
					</ul>
				</div> -->

<!-- 				<div class="row" style="color: #585858;">

					<div class="col-lg-6 col-md-12 col-sm-12 col-12">
						<div>
							<ul class="list-group">
								<li class="list-group-item adhead bg-info text-light" style="border-radius: 0px;"><span>01.</span>&nbsp;&nbsp;Shipping Address</li>
							</ul>
							<li class="list-group-item border-top-0">

							</li>
						</div><br>
					</div>
 -->




					<div class="col-lg-12 col-md-12 col-sm-12 col-12">


						<div class="col-lg-12 col-md-12 col-sm-12 col-12 mt-3 p-0" >
							<div>
								<ul class="list-group">
									<li class="list-group-item adhead bg-info text-light" style="border-radius: 0px;"><span></span>&nbsp;&nbsp;Apply Coupon</li>
								</ul>

								<li class="list-group-item border-top-0">
									<div class="discount">
										<label style="font-family: cursive;">Promo code</label>
										<input type="text"  id="coupon_code" name="coupon_code">
										<button type="button" title="Apply Promo" class="btn btn-success btn-sm" onclick="Applypromo();" value="Apply Promo">
											<b>Apply Promo</b>
										</button>
									</div>
								</li>


								<li class="list-group-item border-top-0">

								</li>
							</div>
							<br>
							<!--<diV  class="d-inline bag float-right">-->
								

							</div>
						</div>


					</div>
				</form>
			</div>
		</div>

		
		
		
	
		<script type="text/javascript">

			function activateButton(element) {

				if(element.checked) {
					document.getElementById("submit").disabled = false;
					document.getElementById("submit").style.cursor = "pointer";
				}
				else  
				{
					document.getElementById("submit").disabled = true;
					document.getElementById("submit").style.cursor = "not-allowed";
				}

			}


			allcalculate();
			Applypromo();
			charge();
			function charge()
			{

				let subamount = $("#subamount").val();

				let zone_id = $("#zone_id").val();
				shipping_id=[];
				$("#shipping_id:checked").each(function(index, el) {
					shipping_id.push(this.value);
				})


				$("#zone_id").change(function(){
					let zone_id = $("#zone_id").val();
				})
				if (zone_id != '')
				{

					$.ajax({

						headers:{ 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
						url:'{{url("district_charge")}}',
						type:'POST',
						data:{zone_id:zone_id},
						success:function(data)
						{
							$("#dcharge").html('<input type="radio" name="charge" value="'+data+'" checked="">&nbsp;Home Delivery Tk.&nbsp;'+data);
							$("#ddcharge").html(data);
							$("#deliverycharge").val(data);
							allcalculate();

						}
					})	
				}
				else
				{
					$("#dcharge").html('<input type="radio" name="charge" value="'+0+'" checked="">&nbsp;Home Delivery Tk.&nbsp;'+0);
					$("#ddcharge").html(0);
					$("#deliverycharge").val(0);
					allcalculate();
				}

			}


			function allcalculate()
			{
				var totalamount = $("#totalamount").val();
				var subamount = $("#subamount").val();
				var charge = $("#deliverycharge").val();
				var discount = $("#discount").val();
				let redeem = $("#redeem").val();

				var total=0;

				if (subamount !='' && charge !='' && discount !='') 
				{
					if(redeem > 0){

						total=(parseFloat(totalamount)+parseFloat(charge))-parseFloat(discount);
						console.log("redeem");
					}else{
						total=(parseFloat(subamount)+parseFloat(charge))-parseFloat(discount);
						console.log("not_redeem");

					}
					$("#totalamount").val(total);
					$("#gtotal").html(total);

				}
				else if(subamount !='' && charge !='')
				{
					if(redeem > 0){
						total=parseFloat(totalamount)+parseFloat(charge);
					}else{
						total=parseFloat(subamount)+parseFloat(charge);
					}
					$("#totalamount").val(total);
					$("#gtotal").html(total);

				}
				else if(subamount !='' &&  discount !='')
				{

					total=parseFloat(subamount)-parseFloat(discount);
					$("#totalamount").val(total);
					$("#gtotal").html(total);

				}
				else
				{
					total=parseFloat(subamount);
					$("#totalamount").val(total);
					$("#gtotal").html(total);

				}
			}

			function pay_type(id)
			{


				if (id == '6') 
				{
					$("#bankfor").html("");
					$("#set1").html("");
					$("#bKashfor").html("");
					$("#qrcode").html("");
					$("#nagadqr").html("");


					$('#form_file').attr('action', '{{url('/ordesystem')}}');
				}

				if (id == '1') 
				{
					$("#bankfor").css("display", "none");
					$("#set1").html("");
					$("#nagadqr").css("display", "none");
					$("#bKashfor").css("display", "none");
					$("#qrcode").css("display", "none");

					$('#form_file').attr('action', '{{url('/regular-order-system')}}');

				}
				if(id == '2') 
				{
					$("#bankfor").css("display", "none");
					$("#set1").html("");
					$("#nagadqr").css("display", "none");
					$("#bKashfor").css("display", "block");

					$("#set").html("BKash: 01619222777<br>Merchant Account");
					$("#qrcode").css("display", "block");

					$('#form_file').attr('action', '{{url('/regular-order-system')}}');


				}
				if(id =='3') 
				{
					$("#bankfor").css("display", "none");
					$("#set1").html("");
					$("#nagadqr").css("display", "none");
					$("#bKashfor").css("display", "block");
					$("#set").html("Rocket: 01619222777<br>Personal Account");
					$("#qrcode").css("display", "none");

					$('#form_file').attr('action', '{{url('/regular-order-system')}}');



				}
				if(id == '4') 
				{
					$("#bankfor").css("display", "none");
					$("#set1").html("");

					$("#bKashfor").css("display", "block");
					$("#set").html("Nagad: 01619222777<br>Merchant Account");
					$("#qrcode").css("display", "none");
					$("#nagadqr").css("display", "block");

					$('#form_file').attr('action', '{{url('/regular-order-system')}}');


				}
				if(id == '5') 
				{

					$("#set").html("");
					$("#qrcode").css("display", "none");

					$("#nagadqr").css("display", "none");
					$("#bKashfor").css("display", "none");
					$("#bankfor").css("display", "block");
					$("#set1").html("Buynfeel.com  ব্যাংক পেমেন্ট পদ্ধতি- <br> ব্যাংক পেমেন্টের জন্য নিচের ইনফরমেশন গুলো অনুসরণ করুন, <br>১. প্রিয় গ্রাহক, নিম্ন লিখিত ব্যাংক অ্যাকাউন্টে ডিপোজিট করুন। <br> ২. অতঃপর আপনার ডিপোজিট স্লিপের ছবি তুলে ইমেইল করুন- payment@buynfeel.live  <br> ৩. ইমেইলের সাবজেক্টে অবশ্যই অর্ডার নাম্বারটি উল্লেখ করতে হবে। <br> ৪. ডিপোজিট স্লিপটি অর্ডার অপশনে আপলোড করুন।  <br> *প্রয়োজনে কল করুন- 09642887766 <br>১) <br>Account Title: BUYNFEEL<br>Account Number: <b>1233132527001</b><br>Bank Name: City Bank<br>Branch Name: New Market Branch, Dhaka<br>Routing Number: 225263527<br>২) <br>Account Title: BUYNFEEL<br>Account Number:<b> 0542101000004921 </b><br>Bank Name: United Commercial Bank (UCBL)<br>Branch Name: Gulshan Branch<br>Routing Number: 245261725<br>৩) <br>Account Title: BUYNFEEL <br> Account Number: 171 110 0020092 <br> Bank Name: Dutch Bangla Bank Limited <br> Branch Name: Satmosjid Road Branch, Dhanmondi, Dhaka.<br>Routing Number:  ");
					$('#form_file').attr('action', '{{url('/regular-order-system')}}');


				}
			}

			function Applypromo()
			{
				var coupon_code = $("#coupon_code").val();
				var subamount = $("#subamount").val();
				if (coupon_code !='') 
				{

					$.ajax({
						headers:{ 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
						type:'POST',
						url:"{{url('Applypromo_check')}}",
						data:{code:coupon_code,subamount:subamount},
						success:function(data)
						{
							if (data == 'false') 
							{
								alert('Promo code "'+coupon_code+'" is invalid/incorrect or did not match the criteria');
								$("#coupon_code").val('');
								$("#discount").val(0);
								$("#promo_price").html(0);
								$("#super_code").val('');
								allcalculate();
							}
							else if(data =='wrong_coupon')
							{
								alert('Promo code "'+coupon_code+'" is invalid/incorrect or did not match the criteria');
								$("#coupon_code").val('');
								$("#discount").val(0);
								$("#promo_price").html(0);
								$("#super_code").val('');
								allcalculate();
							}
							else if(data =='date_invalid')
							{
								alert('Promo code "'+coupon_code+'" is invalid/incorrect Date');
								$("#coupon_code").val('');
								$("#discount").val(0);
								$("#promo_price").html(0);
								$("#super_code").val('');
								allcalculate();
							}
							else if(data =='end_date')
							{
								alert('Promo code "'+coupon_code+'" is invalid Date');
								$("#coupon_code").val('');
								$("#discount").val(0);
								$("#promo_price").html(0);
								$("#super_code").val('');
								allcalculate();
							}
							else if(data =='min_price')
							{
								alert('Your Cart amount low ! please add to cart more product');
								$("#coupon_code").val('');
								$("#discount").val(0);
								$("#promo_price").html(0);
								$("#super_code").val('');
								allcalculate();
							}
							else
							{
								$("#super_code").val(coupon_code);
								$("#discount").val(data);
								$("#promo_price").html(data);
								allcalculate();
							}
						}

					});

				}
				else
				{
					// alert('Please enter your promo code!');
				}
			}

			function thana_info()
			{
				var district_id = $("#district_id").val();

				$.ajax({

					headers:{ 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
					url:'{{url("thana_info")}}',
					type:'POST',
					data:{district_id:district_id},
					success:function(data)
					{
						$("#thana_id").html(data)

					}
				});

			}


			function applyRedeem()
			{
				var totalamount = $("#totalamount").val();
				var subamount = $("#subamount").val();
				var discount = $("#discount").val();
				$.ajax({
					headers:{ 'X-CSRF-TOKEN': "{{ csrf_token() }}" },
					type:'POST',
					url:"{{url('apply_redeem')}}",
					data:{subamount:subamount},
					success:function(data)
					{
						if (data > 0) 
						{
							// $("#coupon_code").val('');
							// $("#discount").val(0);
							// $("#promo_price").html(0);
							// $("#super_code").val('');
							$("#redeem").val(data);
							$("#redeem_price").html(data);

							if(discount){
								console.log(totalamount);

								total=parseFloat(totalamount)-parseFloat(data);
								$("#totalamount").val(total);
								$("#gtotal").html(total);
							}else{
								total=parseFloat(subamount)-parseFloat(data);
								$("#totalamount").val(total);
								$("#gtotal").html(total);
							}

						}else{
							alert('Insufficient reward points');
						}
					}

				});
			}










		</script>
		@else
		<script type="text/javascript">
			window.location.href = "{{url('/user-login')}}";
		</script>
		@endif

		@else
		<script type="text/javascript">
			window.location.href = "{{url('/')}}";
		</script>

		@endif
		
		
	@endsection