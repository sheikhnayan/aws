    <!DOCTYPE html>
    <html>
    <head>
    <title>Order report</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    
    <style type="text/css">
    
    @media print
    {
    	.print{
    		display: none;
    	}
    }
    </style>
    </head>
    <body>
    
    
    <div class="col-12" style="width: 100%; margin: 0 auto;">
    	<div class="card">
    		<div class="card-body">
    
    			<table class="table table-bordered" style="font-size: 13px;">
    				<tr>
    					<td colspan="12">
    					    
    					    <center>
                                  <img src="{{asset('public')}}/logo.png" class="img-fluid" style="max-height: 150px; width: 150px;"><br>
                                  <span>
                                    House: 95, Road: 9/A, Dhanmondi, Dhaka.<br>
                                   E-Mail: Support@Buynfeel.Live<br>
                                   Phone: 09642887766<br>
                                  </span>
                                </center>
                                

    					    </td>
    				</tr>
    
    				<tr class="text-center">
    					<th colspan="12" class="text-uppercase">Order Place Statement Report
    					</th>
    				</tr>
    
    
    
    
    				<tr>
    					<td colspan="8">
    						<table class="w-100">
    							<tr>
    
    								<td colspan="1">
    									
    								
    									<b>From Date :</b>{{$date1}}<br><b>To Date :</b>{{$date2}}
    								
    
    
    									<br>
    									<b>Print Date :</b> @php echo date('d-m-Y')   @endphp<br>
    								</td>
    							</tr>
    						</table>
    					</td>
    				</tr>
    
    
    				<tr>
    					<th>SL.</th>
                        <th>Product Name</th>
                        <th>SKU</th>
                        <th >Unit Price</th>
                        <th>Discount Amount</th>
                        <th>Discounted Price</th>
                        <th>Quantity</th>
                        <th>Total Sale Price</th>
                        <th>Total Delivery Charge</th>
                        <th>Grand Total</th>
                        <!--<th>Status</th>-->
    					
    				</tr>
    
    				@php
    				$sl=1;
    				$unit_price=0;
    				$discount_amount=0;
    				$discounted_price=0;
    				$quantity=0;
    				$sale_price=0;
    				$delivery_charge=0;
    				$grand_total=0;
    				@endphp
    
    				@if($data)
    				@foreach($data as $showdata)
    
    				@php
    				$unit_price+=$showdata->sale_price;
    				$discount_amount+=$showdata->discount_price;
    				$discounted_price+=$showdata->current_price;
    				$quantity+=$showdata->quantity;
    				$sale_price+=$showdata->current_price*$showdata->quantity;
    				$delivery_charge+=$showdata->total_delivery_charge;
    				$grand_total+=$showdata->current_price*$showdata->quantity + $showdata->total_delivery_charge;
    				@endphp
    				
    				<tr>
    					<td>{{$sl++}}</td>
    					<td>{{$showdata->product_name}}</td>
    					<td>{{$showdata->product_id}}</td>
    					<td>{{$showdata->sale_price}}</td>
    					<td>{{$showdata->discount_price}}</td>
    					<td>{{$showdata->current_price}}</td>
    					<td>{{$showdata->quantity }}</td>
    					<td>{{$showdata->current_price*$showdata->quantity}}</td>
    					<td>{{$showdata->total_delivery_charge}}</td>
    					<td>{{$showdata->current_price*$showdata->quantity + $showdata->total_delivery_charge}}</td>
    					<!--<td>-->
	        <!--            @if($showdata->status == '0')-->
         <!--               <a class="text-warning">pending</a>-->
         <!--               @elseif($showdata->status == '1')-->
         <!--                 <a class="text-info">process</a>-->
                        
         <!--               @elseif($showdata->status == '5')-->
         <!--                 <a class="text-primary">shipping</a>-->
         <!--               @elseif($showdata->status == '2')-->
         <!--                 <a class="text-secondary">on the way</a>-->
         <!--               @elseif($showdata->status == '3')-->
         <!--                 <a class="text-success">complete</a>-->
         <!--               @elseif($showdata->status == '4')-->
         <!--                 <a class="text-danger">Reject</a>-->
         <!--                @endif-->
    					<!--    </td>-->
    				</tr>
    
    
    
    				@endforeach
    				@endif
    
    				<tr>
    					<th colspan="3" class="text-right">Total</th>
    				
    					<th >{{$unit_price}}/-</th>
    					<th >{{$discount_amount}}/-</th>
    					<th >{{$discounted_price}}/-</th>
    					<th >{{$quantity}}/-</th>
    					<th >{{$sale_price}}/-</th>
    					<th >{{$delivery_charge}}/-</th>
    					<th >{{$grand_total}}/-</th>
    				</tr>
    
    			</table>
    
    
    
    
    	
    
    
    
    
    
    		</div>
    	</div>
    </div>
    
    <br>
    <center><input type="button" name="" value="Print" class="btn btn-danger print" onclick="window.print()"></center>
    
    
    </body>
    </html>
    
