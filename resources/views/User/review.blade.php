
@extends('User.layouts.master')
@section('body')




<div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-sm-10 offset-sm-1 pt-4">
	<div class="col-md-12 pt-4 p-4 sharebox">
		<form id="postdata" method="post">
			<div class="form-group">
				<textarea rows="5" class="form-control text-dark" placeholder="Write your review here..." name="details" id="details"></textarea>
				<em id="errormessage"></em>
				<div class="uk-margin">
					<div uk-form-custom>
						<input type="file" onchange="readURL(this);" id="file" name="image">
						<button class="uk-button uk-button-default text-capitalize" type="button" tabindex="-1"><i class="fa fa-picture-o" aria-hidden="true"></i>&nbsp;&nbsp;Select Image</button>
						<img src="#" id="one" class="img-fluid rounded" alt="" style="height: 100px;">
						<input type="hidden" id="user_id" value="@if(Auth::guard('guest')->user()) {{ auth('guest')->user()->id }} @endif" name="">
					</div>
				</div>
			</div>

			<button type="submit" class="btn btn-dark w-100" id="post">POST</button>
			<button type="submit" class="btn btn-dark w-100" id="loading">Loading...</button>
		</form>
	</div>
</div>



<div class="col-lg-6 offset-lg-3 col-md-10 offset-md-1 col-sm-10 offset-sm-1">

	<div id="postdataall"></div>

</div>





<script type="text/javascript">

	allpost();
	$('#loading').hide();
	

	$(document).ready(function(){
		$('#postdata').on('submit', function(event){
			event.preventDefault();

			var detailsdata = $("#details").val();
			var file = $("#file").val();
			var user_id = $("#user_id").val();

			if (user_id != "") {
				if (detailsdata != "" || file != "") {
					$.ajax({
						headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
						url:"{{ url('addpost') }}",
						method:"POST",
						data:new FormData(this),
						dataType:'JSON',
						contentType: false,
						cache: false,
						processData: false,
						beforeSend:function(data) { 

							$('#loading').show();
							$('#post').hide();

						},

						success:function(data)
						{

							alert("Hello")


						},error: function(data) {
							$('#details').val('');
							$("#file").val('');
							$('#one').attr('src', '');

							UIkit.notification({
								message: '<i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i>&nbsp;&nbsp;&nbsp;Review Submit Successfully',
								pos:     'bottom-center',
								timeout:  2000
							});

							$('#post').show();
							$('#loading').hide();
							allpost();
						}
					})
				}
				else{
					UIkit.notification({
						message: '<i class="fa fa-info-circle"></i>&nbsp;&nbsp;Please Write Review Here Or Image',
						pos:     'bottom-center',
						timeout:  2000
					});
				}
			}
			else{
				UIkit.notification({
					message: '<i class="fa fa-info-circle"></i>&nbsp;&nbsp;Login your account then review',
					pos:     'bottom-center',
					timeout:  2000
				});
			}

			
			

		});


	});


	function allpost(){

		$.ajax({
			headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
			url:"{{ url('allpost') }}",
			method:"GET",
			data:{},
			success:function(data)
			{

				$('#postdataall').html(data);
			}

		});

	}




</script>






<script type="text/javascript">
	function readURL(input) {
		if (input.files && input.files[0]) {
			var reader = new FileReader();
			reader.onload = function (e) {
				$('#one')
				.attr('src', e.target.result)

			};
			reader.readAsDataURL(input.files[0]);
		}
	}
</script>



@endsection 