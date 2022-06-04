<div class="list-group status">
	<a href="#" class="list-group-item list-group-item-action active bg-dark border-0">
		My All Invoice
	</a>
	<div>
		@if(isset($data))
		@foreach($data as $showdata)
		<a href="{{ url('/viewinvoice/'.$showdata->session_id) }}" class="list-group-item list-group-item-action">Invoice NO: <br>#{{ $showdata->invoice_id }} 

			@if($showdata->status == 0)
			<span class="float-right">Pending</span></a>
			@elseif($showdata->status==1)
			<span class="float-right">Processing</span></a>
			@elseif($showdata->status==5)
			<span class="float-right">Shipping</span></a>
			@elseif($showdata->status==2)
			<span class="float-right">On the way</span></a>
			@elseif($showdata->status==3)
			<span class="float-right">Complete</span></a>
			@elseif($showdata->status==6)
			<span class="float-right">Refound</span></a>
			@elseif($showdata->status==4)
			<span class="float-right">Reject</span></a>
			@else
			<span class="float-right">Failed</span></a>
			@endif

			@endforeach
			@endif
		</div>
	</div>



	<style scoped="" type="text/css">

		.status span{
			background: #f1f1f1;
			font-size: 14px;
			font-weight: normal;
			padding: 1px 10px;
			border-radius: 30px;
		}

	</style>