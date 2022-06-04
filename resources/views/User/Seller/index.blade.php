@include('User.Seller.header')


<div class="main-content">
	<div class="container">

		<div class="row">




			<!-- imprestion, goal, impect start -->
			<div class="col-xl-12 col-md-12">
				<div class="card comp-card">
					<div class="card-body">
						<div class="row align-items-center">
							<div class="col">
								<h3 class="fw-700 text-green" style="text-align:center;border-bottom:1px dotted">Announcement</h3>
								<h6 class="fw-700 text-blue">{!!$sms->title!!}</h6>	<span style="color:red;">{{Carbon\Carbon::parse($sms->created_at)->format('F j, Y, g:i a')}}</span>
								<p class="mb-0">{!! $sms->description !!}</p>
							</div>
							<div class="col-auto" style="color:red">
							
								<!-- <i class="fab fa-product-hunt"></i> -->
							</div>
						</div>
					</div>
				</div>
			</div>



			<!-- imprestion, goal, impect start -->
			<div class="col-xl-4 col-md-12">
				<div class="card comp-card">
					<div class="card-body">
						<div class="row align-items-center">
							<div class="col">
								<h6 class="mb-25">Total Product</h6>
								<h3 class="fw-700 text-blue">{{$product}}</h3>
								<p class="mb-0">October 2020 - {{date("F Y")}}</p>
							</div>
							<div class="col-auto">
								<i class="fab fa-product-hunt bg-blue"></i>
								<!-- <i class="fab fa-product-hunt"></i> -->
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="col-xl-4 col-md-6">
				<div class="card comp-card">
					<div class="card-body">
						<div class="row align-items-center">
							<div class="col">
								<h6 class="mb-25">Total orderd</h6>
								<h3 class="fw-700 text-green">{{$order}}</h3>
								<p class="mb-0">October 2020 - {{date("F Y")}}</p>
							</div>
							<div class="col-auto">
								<i class="fas fa-shopping-bag bg-green"></i>
							</div>
						</div>
					</div>
				</div>
			</div>


		


		</div>



	</div>
</div>



@include('User.Seller.footer')