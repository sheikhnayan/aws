<!DOCTYPE html>
<html>
<head>
	<title>BuynFeel Online Payment Statement Report</title>
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




				<table class="table table-bordered" style="font-size: 13px;">
				
					<tr class="text-center">
					      <center>
                                  <img src="{{asset('public')}}/logo.png" class="img-fluid" style="max-height: 150px; width: 150px;"><br>
                                  <span>
                                    House: 95, Road: 9/A, Dhanmondi, Dhaka.<br>
                                   E-Mail: Support@Buynfeel.Live<br>
                                   Phone: 09642887766<br>
                                  </span>
                                </center>
						<th colspan="13" class="text-uppercase">BuynFeel Online Payment Statement Report
						</th>
					</tr>



				


				<!--<thead>-->
                                    <tr>
                                          <th>SL</th>
                                        <th>Order ID</th>
                                        <th>Aamarpay txnid</th>
                                        <th>Pay status</th>
                                        <th>Customer Name</th>
                                        <th>Customer Phone</th>
                                        <th>Pay time</th>
                                         <th>Store_amount</th>
                                        <th>Amount</th>
                                        <th>Bank txn</th>
                                        <th>Card type</th>
                                        <th>Reason</th>
                                        <th>Order View</th>
                                    </tr>
                                    <!--</thead>-->
                                    <tfoot>
                                    <tr>
                                        <th>SL</th>
                                        <th>Order ID</th>
                                        <th>Aamarpay txnid</th>
                                        <th>Pay status</th>
                                        <th>Customer Name</th>
                                        <th>Customer Phone</th>
                                        <th>Pay time</th>
                                         <th>Store_amount</th>
                                        <th>Amount</th>
                                        <th>Bank txn</th>
                                        <th>Card type</th>
                                        <th>Reason</th>
                                        <th>Order View</th>
                                    </tr>
                                    </tfoot>
                                    <tbody>
                                        @php
                                        $sl=1;
                                        $total=0;
                                        $totals=0;
                                        @endphp
                                        @if(isset($data))
                                        @foreach($data as $showdata)
                                        
                                        @php
                                        $total+=$showdata->amount;
                                        $totals+=$showdata->store_amount;
                                        @endphp
                                      <tr id="tr-{{$showdata->mer_txnid}}">
                                        <td>{{$sl++}}</td>
                                        <td>{{$showdata->mer_txnid}}</td>
                                        <td>{{$showdata->pg_txnid}}</td>
                                        <td>{{$showdata->pay_status}}</td>
                                        <td>{{$showdata->cus_name}}</td>
                                        <td>{{$showdata->cus_phone}}</td>
                                        <td>{{$showdata->pay_time}}</td>
                                        <td>{{$showdata->store_amount}}</td>
                                        <td>{{$showdata->amount}}</td>
                                        <td>{{$showdata->bank_txn}}</td>
                                        <td>{{$showdata->card_type}}</td>
                                        <td>{{$showdata->reason}}</td>
                                        <td>
                                            <a href="{{url('invoice-paper')}}/{{$showdata->session_id}}" class="btn btn-outline-warning btn-sm" target="_blank">View</a>
                                        </td>
                                    </tr>
                                         @endforeach
                                         @endif
                                         
                                    <tr>
                                        <th colspan="7" style="text-align:right">Total</th>
                                        <th>{{number_format($totals,2)}}</th>
                                        <th>{{number_format($total,2)}}</th>
                                    </tr>
                                    </tbody>
                                </table>










	<br>
	<center><input type="button" name="" value="Print" class="btn btn-danger print" onclick="window.print()"></center>


</body>
</html>

