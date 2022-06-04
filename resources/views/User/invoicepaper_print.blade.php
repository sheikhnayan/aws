<!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Invoice</title>
<link rel="icon" href="{{asset('public')}}/favicon.png" type="image/x-icon" style="height: auto;" />
</head>
<body>
@php
    $date = substr($viewcart[0]->created_at,0,10);
    $setting = DB::table('settings')->first();
    $domain = 'http://localhost:8080/office/textmart';
@endphp


<style>

</style>
<table height="100%" width="500" bgcolor="#fff" align="center">
    <tr>
        <td> 
                <table height="100%" width="500" border="0" cel>
                    <tr> 
                    <td align="left" width="50%"> 
                     <!-- <img src="data:image/png;base64, {{ base64_encode(file_get_contents('https://buynfeel.com/public/logo.png')) }}" height="75px"><br> -->

                       <img src="{{$domain}}/public/siteImage/{{$setting->logo}}" height="75px"><br>

                     <span style="text-transform: capitalize; font-weight: 500; font-size: 14px;">
                    Invoice No: #{{$viewcart[0]->invoice_id}}<br>
                    Order Date: {{$date}}<br>
                    @if($payment)  Payment Type: {{$payment->card_type}}<br> 
                    Payment Status: {{$payment->pay_status}}<br> @endif
                    </span>
                    </td> 
                     <td align="right" width="50%"> 
                        <span style=" font-weight: 500; font-size: 14px;">
                          {{$setting->address ?? ''}}<br>
                           <div class="mt-2">
                               E-Mail: {{$setting->email ?? ''}}
                           </div>
                           <div class="mt-2">
                           Phone: {{$setting->hotline ?? ''}}
                           </div>
                        </span>
                    </td> 
                    </tr>
                    <tr>
                        <td colspan="2" bgcolor="#ccc" heght="30" align="center"><span style="text-align:center; font-size:18px;">Sales Invoice</p></td>
                    </tr>
                    
                        <tr> 
                    <td align="left" width="50%"> 
                    
                     <span style="text-transform: capitalize; font-weight: 500; font-size: 13px;">
                   <h2>Billing Address</h2>
                    Name: {{$viewcart[0]->guestfirstname}}&nbsp;{{$viewcart[0]->guestlastname}}<br>
                   Phone: {{$viewcart[0]->guestphone}}
           
                    </span>
                    </td> 
                     <td align="left" width="50%"> 
                        <span style="text-transform: capitalize; font-weight: 500; font-size: 13px;">
                          <h2>Shipping Address</h2>
                           Name: {{$viewcart[0]->first_name}}&nbsp;{{$viewcart[0]->last_name}}<br>
                           Email: {{$viewcart[0]->email}}<br>
                           Address: {{$viewcart[0]->address}}<br>
                           Phone: {{$viewcart[0]->phone}}
   
                        </span>
          
                    </td> 
                    </tr>
                </table>
        </td>
    </tr>

<tr> 

<td colspan="2"> 
   <table width="100%" cellpadding="0" cellspacing="0">
     <thead>
         <tr>
       <th bgcolor="#999">SL</th>
       <th  bgcolor="#999">Product</th>
       <th  bgcolor="#999">SKU</th>
       <th  bgcolor="#999">Unit Price</th>
       <th  bgcolor="#999">Discount Amount</th>
       <th  bgcolor="#999">Discounted Price</th>
       <th  bgcolor="#999">QTY</th>
       <th  bgcolor="#999">Amount</th>
        </tr>
     </thead>
     
    
     <tbody>
   
            @php
        $sl=1;
        @endphp

        @if(isset($viewcart))
        @foreach($viewcart as $cart)
         
         
       <tr>
         <td style="border-left:1px #000 solid; border-bottom:1px #000 solid; border-right:1px #000 solid; ">{{$sl++}}</td>
         <td style="border-bottom:1px #000 solid; border-right:1px #000 solid; ">{{$cart->product_name}}</td>
         <td style="border-bottom:1px #000 solid; border-right:1px #000 solid; ">{{$cart->sku}}</td>
         <td style="border-bottom:1px #000 solid; border-right:1px #000 solid; ">{{$cart->sale_price}} Tk</td>
         <td style="border-bottom:1px #000 solid; border-right:1px #000 solid; ">{{$cart->discount_price}} Tk</td>
         <td style="border-bottom:1px #000 solid; border-right:1px #000 solid; ">{{$cart->current_price}} Tk</td>
         <td style="border-bottom:1px #000 solid; border-right:1px #000 solid; ">{{$cart->quantity}}</td>
         <td style="border-bottom:1px #000 solid; border-right:1px #000 solid; ">{{$cart->current_price * $cart->quantity}} Tk</td>
       </tr>
       
         @endforeach
        @endif
       
       
     </tbody>
     
   
       <tr>
       
         <th colspan="7" align="right">Sub Total :</th>
         <th align="right">{{$viewcart[0]->sub_total}} Tk</th>
       </tr>
       
       <tr>
         <th colspan="7" align="right">Delivery Charge(+) :</th>
         <th align="right">{{$viewcart[0]->delivery_charge}} Tk</th>
       </tr>

   
       
        @if($viewcart[0]->coupon_id !='' && $viewcart[0]->discount>0)
       
         <tr>
         <th colspan="7" align="right">Discount(-) :</th>
         <th align="right">{{$viewcart[0]->discount}} Tk</th>
       </tr>
       @endif
       
       
        <tr>
         <th colspan="7" align="right">Redeem :</th>
         <th align="right">{{$viewcart[0]->redeem}} Tk</th>
       </tr> 
       
        <tr>
         <th colspan="7" align="right">Grand Total :</th>
         <th align="right">{{$viewcart[0]->grand_total}} Tk</th>
       </tr>    
       
        <tr>
         <th colspan="7" align="right">Due :</th>
         <th align="right">@if($viewcart[0]->payment_status == '1'){{0.00}}@else{{$viewcart[0]->grand_total-$balance->payment}}@endif Tk</th>
       </tr>
       
       <tr>
         <th colspan="7" align="right">Paid :</th>
         <th align="right">@if($viewcart[0]->payment_status == '1'){{$viewcart[0]->grand_total}}@else{{$balance->payment}}@endif Tk</th>
       </tr> 
       
      

   </table>
   </tr>
   
   <tr>
       <td align="left" colspan="2"> <p style="font-size:14px; line-height:25px;">
       Need help? Call us on {{$setting->hotline}}<br>
       Follow us on Facebook: <a href="{{$setting->facebook}}" target="_blank">Facebook</a><br>
       Have a good day! Thank you for shopping on <a href="{{$domain}}">{{$domain}}</a><br>
   </p></td>
   </tr>
   </table>

  

  
   
   <br><br>
   
   
   <center><span style="font-weight:600; font-size:13px;">[ Note: This is computer generated copy. No signature is required ]</span></center>
   
   
 



 </body>
</html>


<style type="text/css">
  .container{
    padding: 0 150px;
  }

  thead{
    font-size: 13px;
  }

   tbody{
    font-size: 13px;
  }

  tfoot{
    font-size: 13px;
    white-space: nowrap;
  }
</style>