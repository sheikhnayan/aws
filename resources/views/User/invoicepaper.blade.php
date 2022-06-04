<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <title>Invoice</title>
  <link rel="icon" href="{{asset('public')}}/favicon.png" type="image/x-icon" style="height: auto;" />


  <style type="text/css">
    .container{
      padding: 0 150px;
    }

    thead{
      font-size: 15px;
    }

    tbody{
      font-size: 15px;
    }

    tfoot{
      font-size: 15px;
      white-space: nowrap;
    }
  </style>

</head>
<body>

  @php
  $date = substr($viewcart[0]->created_at,0,10);
  $setting = DB::table('settings')->first();
  @endphp



  <div class="container" id='DivIdToPrint'>
    <div class="col-md-12 col-12 p-4 mt-4 border">
      <div class="row">
        <div class="col-md-4" style="font-size: 13px;">
          <img src="{{ asset('public/siteImage/') }}/{{$setting->logo}}" class="img-fluid" style="max-height: 60px;"><br>
          <div class="mt-2">
            Invoice No: #{{$viewcart[0]->invoice_id}}<br>
            Order Date: {{$date}}<br>
            @if($payment)  Payment Type: {{$payment->card_type}}<br> 
            Payment Status: {{$payment->pay_status}}<br> @endif
          </div>
        </div>

        <div class="col-md-8 text-right" >
     
       </div>

     </div>

     <center><h6 class="p-2 font-weight-bold">Sales Invoice</h6></center><br>

     <div class="row" style="font-size: 13px;">
      <div class="col-md-7">
       <h6>Billing</h6>
       Name: {{$viewcart[0]->guestfirstname}}&nbsp;{{$viewcart[0]->guestlastname}}<br>
       <!-- Vessel: {{$viewcart[0]->guestvessel_name}}<br>
       Rank: {{$viewcart[0]->guestrank}}<br> -->
       Phone: {{$viewcart[0]->guestphone}}
     </div>



     <div class="col-md-5">
       <h6>Shipping</h6>
       Name: {{$viewcart[0]->first_name}}&nbsp;{{$viewcart[0]->last_name}}<br>
       <!-- Vessel: {{$viewcart[0]->vessel_name}}<br>
       Rank: {{$viewcart[0]->rank}}<br> -->
       Phone: {{$viewcart[0]->phone}}<br>
       Address: {{$viewcart[0]->address}}
     </div>
   </div>


   <br>
   <table class="table table-bordered">
     <thead class="">
       <th>SL</th>
       <th>Product</th>
       <th>SKU</th>
       <th  >Unit Price</th>
       <th>QTY</th>
       <th>Amount</th>
     </thead>


     <tbody>

      @php
      $sl=1;

      $payment =  $balance->payment;
      @endphp  

      @if($payment>0)
      $payments=$payment;
      @else
     
      @endif

      @if(isset($viewcart))
      @foreach($viewcart as $cart)


      <tr>
       <td>{{$sl++}}</td>
       <td>{{$cart->product_name}} - <span>{{ $cart->size ?? '' }} - {{ $cart->color ?? '' }}</span></td>
       <td>{{$cart->sku}}</td>
       <td >{{$cart->sale_price}} Tk</td>
       <td>{{$cart->quantity}}</td>
       <td>{{$cart->current_price * $cart->quantity}} Tk</td>
     </tr>

     @endforeach
     @endif


   </tbody>

   <tfoot>
     <tr>
       <th colspan="3"></th>
       <th colspan="2">Sub Total</th>
       <th>{{$viewcart[0]->sub_total}} Tk</th>
     </tr>

     <tr>
       <th colspan="3"></th>
       <th colspan="2">Delivery Charge(+)</th>
       <th>{{$viewcart[0]->delivery_charge}} Tk</th>
     </tr>

     @if($viewcart[0]->coupon_id !='' && $viewcart[0]->discount>0)
     <tr>
       <th colspan="3"></th>
       <th colspan="2">Discount(-)</th>
       <th>{{$viewcart[0]->discount}} Tk</th>
     </tr>
     @endif

    @if($viewcart[0]->redeem)
     <tr>
       <th colspan="3"></th>
       <th colspan="2">Redeem(-)</th>
       <th>{{$viewcart[0]->redeem}} Tk</th>
     </tr>
    @endif

		<tr>
			<th colspan="3"></th>
			<th colspan="2">Grand Total</th>
			<th>{{$viewcart[0]->grand_total}} Tk</th>
		</tr>

								


   </tfoot>

 </table>


  @if($viewcart[0]->note)
  <span style="font-weight:600; font-size:13px;"> Order Note: {{$viewcart[0]->note ?? ''}} </span>
  @endif

  <br>
  <br>


 <center><span style="font-weight:600; font-size:13px;">[ Note: This is computer generate copy. No signature is required ]</span></center>





</div>

<!-- <div id="thanks">
 <center><a href="{{ url('/invoice-pdf') }}/{{$viewcart[0]->session_id}}" class="btn btn-danger btn-sm" style="background-color: #ff5500; box-shadow: none; outline: none; border:none;">Download</a></center>
</div>
 -->

</div>

<!-- <input type='button' id='btn' value='Print' onclick='printDiv();'> -->











<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


<script>
  window.print();

// function printDiv() 
// {

//   var divToPrint=document.getElementById('DivIdToPrint');

//   var newWin=window.open('','Print-Window');

//   newWin.document.open();

//   newWin.document.write('<html><body onload="window.print()">'+divToPrint.innerHTML+'</body></html>');

//   newWin.document.close();

//   setTimeout(function(){newWin.close();},10);

// }


</script>


</body>
</html>

