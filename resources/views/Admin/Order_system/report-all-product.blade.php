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

    
    				<tr class="text-center">
    					<th colspan="16" class="text-uppercase">All Product Report
    					</th>
    				</tr>
    
    
    
    				<tr>
    					<th>SL</th>
                        <th>Product ID</th>
                        <th>Item Name</th>
                        <th>Category Name</th>
                        <th>Brand Name</th>
                        <th>Product Name</th>
                        <th>Measurement Type</th>
                        <th>Purchase Price</th>
                        <th>Sale Price</th>
                        <th>Discount Price</th>
                        <th>Discount Percantage</th>
                        <th>Current Price</th>
                        <th>Minimum Quantity</th>
    				</tr>
    
    				@php
    				$sl=1;
    			
    				@endphp
    
    				@if($data)
    				@foreach($data as $showdata)
    
    				
    				<tr>
        			    <td>{{$sl++}}</td>
                        <td>{{$showdata->product_id}}</td>
                        <td>{{$showdata->item_name}}</td>
                        <td>{{$showdata->category_name}}</td>
                        <td>{{$showdata->company_name}}</td>
                        <td>{{$showdata->product_name}}</td>
                        <td>{{$showdata->measurementName}}</td>
                        <td>{{$showdata->purchase_price}}</td>
                        <td>{{$showdata->sale_price}}</td>
                        <td>{{$showdata->discount_price}}</td>
                        <td>{{$showdata->discount_per}} %</td>
                        <td>{{$showdata->current_price}}</td>
                        <td>{{$showdata->min_qunt}}</td>
    				</tr>
    
    
    
    				@endforeach
    				@endif
    
    				<tr>
    		
 
    				</tr>
    
    			</table>
    
    
    
    
    	
    
    
    
    
    
    		</div>
    	</div>
    </div>
    
    <br>
    <center><input type="button" name="" value="Print" class="btn btn-danger print" onclick="window.print()"></center>
    
    
    </body>
    </html>
    
