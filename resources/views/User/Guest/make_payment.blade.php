@extends('User.layouts.master')

@section('body')



<div class="col-md-12">
	<div class="container">
		<div class="row">

			<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 d-none d-lg-block"> 

			</div><!----------End Sidebar-------->

			<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12 pb-5">


				<div id="myModal" class="modal fade"  role="dialog" aria-labelledby="myModalLabel" data-backdrop="false" aria-hidden="true" data-keyboard="false">
					<div class="modal-dialog modal-confirm">
						<div class="modal-content" >
							<div class="modal-header" class="text-center">
               <!--  <div class="icon-box">
                    <i class="material-icons">&#xE876;</i>
                </div> -->
                <center><span style="color: green;text-align: center;font-size: 20px"><img src="https://www.aamarpay.com/images/logo/aamarpay_logo.png"></span></center>
            </div>
            <div class="modal-body">
            	<form class="mt-5 mb-5" id="form_file" action="{{url('/make-payment-online')}}" method="post" enctype="multipart/form-data">
            		@csrf
            		Payable Amount:<input type="text" class="form-control" name="total_amount" id="total_amount" placeholder="Payable Amount" min="1" value="@if($due>0) {{$due}} @endif"><br>
            		<input type="text" name="invoice_id" id="invoice_id" value="{{$invoice_id}}" hidden>
            		<input type="submit" name="aamarpay" value="Payment" class="form-control btn btn-info btn-sm">

            	</form>

            </div>
            <div class="modal-footer">
            	<img src="{{ asset('public/payment.png') }}" class="img-fluid">
            </div>
        </div>
    </div>
</div>


<div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-sm-10 offset-sm-1 col-12 mt-5">
	<div class="col-md-12">
		<div class="mb-2"><strong>Make Payment</strong></div>

		<form  id="form_file" action="{{url('/make-payment-offline')}}" method="post" enctype="multipart/form-data">
			@csrf
			<div>


				@if ($errors->any())
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
				@endif

				<li class="list-group-item border-0 pt-4 pb-4" style="font-size: 13px;">
					{{-- 	@if($control->online == '1')
						<img src="{{asset('public')}}/3.png" style="height:30px;width:30px;">&nbsp;&nbsp;<input type="radio" name="delivery_type" id="delivery_type" value="Online payment" onclick="pay_type('{{6}}')">&nbsp;&nbsp;Online Payment<br><br>
						@endif --}}

						<div class="row">
							<div class="col-md-6">
								@if($control->cash == '1')
								<img src="{{asset('public')}}/3.png" style="height:30px;width:30px;">&nbsp;&nbsp;<input type="radio" name="delivery_type" id="delivery_type" value="COD" onclick="pay_type('{{1}}')">&nbsp;&nbsp;Cash On Delivery<br><br>
								@endif
							</div>
							<div class="col-md-4">
								@if($control->bkash == '1')
								<img src="{{asset('public')}}/4.jpg" style="height:30px;width:30px;">&nbsp;&nbsp;<input type="radio" id="delivery_type" name="delivery_type" value="bkash" onclick="pay_type('{{2}}')">&nbsp;&nbsp;Bkash<br><br>
								@endif
							</div>
							<div class="col-md-4">
								@if($control->rocket == '1')
								<img src="{{asset('public')}}/1.png" style="height:30px;width:30px;">&nbsp;&nbsp;<input type="radio" id="delivery_type" name="delivery_type" value="rocket" onclick="pay_type('{{3}}')">&nbsp;&nbsp;Rocket<br><br>

								@endif
							</div>
							<div class="col-md-4">
								@if($control->nagad == '1')
								<img src="{{asset('public')}}/2.png" style="height:30px;width:30px;">&nbsp;&nbsp;<input type="radio" id="delivery_type" name="delivery_type" value="nagad" onclick="pay_type('{{4}}')">&nbsp;&nbsp;Nagad<br><br>

								@endif
							</div>
							<div class="col-md-4">
								@if($control->bank == '1' )
								<img src="{{asset('public')}}/bankicon.png" style="height:30px;width:30px;">&nbsp;&nbsp;<input type="radio" id="delivery_type" name="delivery_type" value="bank" onclick="pay_type('{{5}}')">&nbsp;&nbsp;Bank<br><br>

								@endif
							</div>
						</div>


						
						
						
						
						





						<div id="bKashfor" style="display:none;">

							<label class="d-none">Payment Date</label>
							<input type="hidden" name="deposit_date"  id="deposit_date" class="form-control textfill" value="<?php echo date('d/m/Y') ?>" ><br>
							<label>Mobile No#</label>
							<input type="text" name="mobile_acc"  id="mobile_acc"  class="form-control textfill"><br>
							<label>Transaction Id</label>
							<input type="text" name="trans_id" class="form-control textfill">
							<br>
						
							<span id="set"></span>

						</div>
				

						<input type="hidden" name="invoice_id" value="{{$invoice_id}}">
						<div class="mt-4">
							<input type="submit" value="Confirm Order" name="pays" id="pays" class="btn btn-dark w-100" style="border:none; cursor: pointer;">
						</div>

					</li>



				</div>

			</form>


		</div>
	</div>


</div>


</div>
</div>
</div>





<script>
	function pay_type(id)
	{


		if (id == '6') 
		{
			$("#bankfor").css("display", "none");
			$("#set1").html("");
			$("#bKashfor").css("display", "none");
			$("#qrcode").css("display", "none");
			$("#nagadqr").css("display", "none");

			$("#myModal").modal('show');
			$('#form_file').attr('action', '{{url('/make-payment-online')}}');
		}

		if (id == '1') 
		{
			$("#bankfor").css("display", "none");
			$("#set1").html("");

			$("#bKashfor").css("display", "none");
			$("#qrcode").css("display", "none");
			$("#nagadqr").css("display", "none");
			$('#form_file').attr('action', '{{url('/make-payment-offline')}}');

		}
		if(id == '2') 
		{
			$("#bankfor").css("display", "none");
			$("#set1").html("");

			$("#bKashfor").css("display", "block");

			$("#set").html("BKash: 01619222777<br>Personal Account");
			$("#qrcode").css("display", "block");
			$("#nagadqr").css("display", "none");
			$('#form_file').attr('action', '{{url('/make-payment-offline')}}');


		}
		if(id =='3') 
		{
			$("#bankfor").css("display", "none");
			$("#set1").html("");

			$("#bKashfor").css("display", "block");
			$("#set").html("Rocket: 01619222777<br>Personal Account");
			$("#qrcode").css("display", "none");
			$("#nagadqr").css("display", "none");
			$('#form_file').attr('action', '{{url('/make-payment-offline')}}');



		}
		if(id == '4') 
		{
			$("#bankfor").css("display", "none");
			$("#set1").html("");

			$("#bKashfor").css("display", "block");
			$("#set").html("Nagad: 01619222777<br>Personal Account");
			$("#qrcode").css("display", "none");
			$("#nagadqr").css("display", "block");

			$('#form_file').attr('action', '{{url('/make-payment-offline')}}');


		}
		if(id == '5') 
		{

			$("#set").html("");
			$("#qrcode").css("display", "none");

			$("#nagadqr").css("display", "none");
			$("#bKashfor").css("display", "none");
			$("#bankfor").css("display", "block");
			$("#set1").html("Buynfeel.com  ব্যাংক পেমেন্ট পদ্ধতি- <br> ব্যাংক পেমেন্টের জন্য নিচের ইনফরমেশন গুলো অনুসরণ করুন, <br>১. প্রিয় গ্রাহক, নিম্ন লিখিত ব্যাংক অ্যাকাউন্টে ডিপোজিট করুন। <br> ২. অতঃপর আপনার ডিপোজিট স্লিপের ছবি তুলে ইমেইল করুন- payment@buynfeel.live  <br> ৩. ইমেইলের সাবজেক্টে অবশ্যই অর্ডার নাম্বারটি উল্লেখ করতে হবে। <br> ৪. ডিপোজিট স্লিপটি অর্ডার অপশনে আপলোড করুন।  <br> *প্রয়োজনে কল করুন- 09642887766 <br>১) <br>Account Title: BUYNFEEL<br>Account Number: <b>1233132527001</b><br>Bank Name: City Bank<br>Branch Name: New Market Branch, Dhaka<br>Routing Number: 225263527<br>২) <br>Account Title: BUYNFEEL<br>Account Number:<b> 0542101000004921 </b><br>Bank Name: United Commercial Bank (UCBL)<br>Branch Name: Gulshan Branch<br>Routing Number: 245261725<br>৩) <br>Account Title: BUYNFEEL <br> Account Number: 171 110 0020092 <br> Bank Name: Dutch Bangla Bank Limited <br> Branch Name: Satmosjid Road Branch, Dhanmondi, Dhaka.<br>Routing Number:  ");
			$('#form_file').attr('action', '{{url('/make-payment-offline')}}');


		}

		if (id == '10') 
		{
			$("#bankfor").css("display", "none");
			$("#set1").html("");

			$("#bKashfor").css("display", "none");
			$("#qrcode").css("display", "none");
			$("#nagadqr").css("display", "none");
			$('#form_file').attr('action', '{{url('/make-payment-offline')}}');

		}
	}
</script>

<style>
	body.modal-open > :not(.modal) {
		-webkit-filter: blur(1px);
		-moz-filter: blur(1px);
		-o-filter: blur(1px);
		-ms-filter: blur(1px);
		filter: blur(15px);
	}
</style>

@endsection
