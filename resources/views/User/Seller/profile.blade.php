@include('User.Seller.header')

<div class="main-content">
	<div class="container">
<hr>
@include('msg.flash')
<form action="{{url('seller-profile-setting-update')}}" method="post"  enctype="multipart/form-data">
	{{ csrf_field() }}
		<div class="col-12 col-md-12 col-sm-12 col-xs-12">
			<div class="row">
				<div class="col-12">
				    
					@if(Auth('seller')->user()->image)

					<img src="{{asset('public/seller')}}/{{Auth('seller')->user()->image}}" style="height: 150px"><br><br>
					@else
					<img src="{{asset('public')}}/onimage.png"><br><br>
					@endif
					<input type="file" name="image">
				</div>
			</div>
		</div>
<hr>
		<div class="col-12 col-md-12 col-sm-12 col-xs-12">
			<div class="row">

				<div class="col-4">
				<label>First Name</label>
				<input type="text" name="first_name" value="{{Auth('seller')->user()->first_name}}" class="form-control">
					
				</div>
				<div class="col-4">
				<label>Last Name</label>
				<input type="text" name="last_name" value="{{Auth('seller')->user()->last_name}}" class="form-control">
					
				</div>
				<div class="col-4">
				<label>Company Name</label>
				<input type="text" name="business_name" value="{{Auth('seller')->user()->business_name}}" class="form-control">
					
				</div>
				<div class="col-4">
				<label>Mobile</label>
				<input type="text" name="phone" value="{{Auth('seller')->user()->phone}}" class="form-control">
					
				</div>
				<div class="col-4">
				<label>E-mail</label>
				<input type="email" name="email" value="{{Auth('seller')->user()->email}}" class="form-control">
					
				</div>
				<div class="col-4">
				<label>address</label>
				<input type="text" name="address" value="{{Auth('seller')->user()->address}}" class="form-control">
					
				</div>
				<div class="col-4">
				<label>password</label>
				<input type="password" name="password"  class="form-control">
					
				</div>
				<div class="col-4">
				<label>logo</label>
				@if(Auth('seller')->user()->avatar)

					<img src="{{asset('public/seller')}}/{{Auth('seller')->user()->avatar}}" style="height: 80px"><br><br>
					@else
					<img src="{{asset('public')}}/onimage.png" style="height: 80px"><br><br>
					@endif
					<input type="file" name="logo">
					
				</div>
			</div>
		</div>
		<hr>
		<center><div class="col-12"><input type="submit" name="submit" value="update" class="btn btn-info"></div></center>

		</form>
</div>
</div>
@include('User.Seller.footer')
