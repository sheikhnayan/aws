@extends('User.layouts.master')
@section('body')

<div class="col-md-12">
	<div class="container">
		<div class="row">

			<div class="col-xl-3 col-lg-3 col-md-3 col-sm-3 col-3 d-none d-lg-block"> 
				@include('User.layouts.sidmenu')
			</div><!----------End Sidebar-------->

			<div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12 pb-5">

				<div class="col-md-12 detailspage mt-4 p-4">
					<strong>Privacy & Policy</strong><br><br>
					<span>
						{!! $data->description !!}
					</span>
				</div>




			</div>

			
		</div>
	</div>
</div>




@endsection