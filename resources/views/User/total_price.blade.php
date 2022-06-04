		@php
		$total =0;
		@endphp
		@if(isset($view))
		@foreach($view as $viewdata)

		@php
		$total +=$viewdata->current_price*$viewdata->quantity;
		@endphp
		@endforeach
		@endif
		{{$total}}