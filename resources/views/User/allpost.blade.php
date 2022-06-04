
<div class="scrolling-pagination">
	@if(isset($data))
	@foreach($data as $d)

	<div class="col-md-12 mt-4 pt-3 pb-3 postbox">

		<div class="row">
			<div class="col-md-auto col-3">
				@if(isset($d->userimg))
				<img src="{{ $d->userimg }}" class="img-fluid profile">
				@else
				<img src="{{ asset('public/Frontend/img/man_placeholder.png') }}" class="img-fluid profile">

				@endif
			</div>
			<div class="col-md-auto col-9 mt-1">
				<strong>{{ $d->first_name }}</strong><br>
				<span>{{ $d->date }}</span>
			</div>
		</div>
		<p>{{ $d->details }}</p>
		@if(isset($d->image))
		<center><img src="{{ url($d->image) }}" class="img-fluid" title="{{ $d->first_name }}"></center>
		@endif


	</div>

	@endforeach
	@endif

	{{ $data->links() }}

</div>





<script type="text/javascript">
    $('ul.pagination').hide();
    $(function() {
        $('.scrolling-pagination').jscroll({
            loadingHtml: '<center><img class="mt-5" src="{{ asset('public/Frontend/img/loader.gif') }}" style="height:50px;"></center>',
            autoTrigger: true,
            padding: 0,
            nextSelector: '.pagination li.active + li a',
            contentSelector: 'div.scrolling-pagination',
            callback: function() {
                $('ul.pagination').remove();
            }
        });
    });
</script>
