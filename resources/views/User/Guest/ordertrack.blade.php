@extends('User.layouts.master')

@section('body')
<style>


.logo a

{

    text-decoration: none;

    color: #523A28;
    font-family: 'Chilanka', cursive;

    font-size: 50px;
  

}
@import url("https://fonts.googleapis.com/css?family=Montserrat:300,400,500,600&display=swap");
*, *::after, *::before {
  padding: 0;
  margin: 0;
  box-sizing: border-box;
}


.credits{
    font-size: 19px;
    margin-top: 50px;
    color: white;
    text-align: center;
}
h2, h4, h6 {
  margin: 0;
  padding: 0;
  display: inline-block;
}

.root {
  padding: 3rem 2rem;
  border-radius: 5px;
  box-shadow: 0 2rem 6rem rgba(0, 0, 0, 0.3);
  background-color: white;
  transition: 0.3s;
}
.root:hover{
    box-shadow: 0 2rem 4rem 4px rgb(0 0 0 / 30%);
    transition: 0.3s;
}

figure {
  display: flex;
}
figure img {
  width: 8rem;
  height: 8rem;
  border-radius: 50%;
  border: 1px solid #f05a00;
  margin-right: 1.5rem;
  padding: 8px;
}
figure figcaption {
  display: flex;
  flex-direction: column;
  justify-content: space-evenly;
}
figure figcaption h4 {
  font-size: 1.4rem;
  font-weight: 500;
}
figure figcaption h6 {
  font-size: 1rem;
  font-weight: 300;
}
figure figcaption h2 {
  font-size: 1.6rem;
  font-weight: 500;
}

.order-track {
  margin-top: 2rem;
  padding: 0 1rem;
  border-top: 1px solid #2c3e502e;
  padding-top: 2.5rem;
  display: flex;
  flex-direction: column;
}
.order-track-step {
  display: flex;
  height: 7rem;
}
.order-track-step:last-child {
  overflow: hidden;
  height: 4rem;
}
.order-track-step:last-child .order-track-status span:last-of-type {
  display: none;
}
.order-track-status {
  margin-right: 2.5rem;
  position: relative;
}
.order-track-status-dot {
  display: block;
  width: 2.2rem;
  height: 2.2rem;
  border-radius: 50%;
  border: 2px solid #f05a00;
  text-align:center;
  color:white;
}
.order-track-status-dot-active {
  display: block;
  width: 2.2rem;
  height: 2.2rem;
  border-radius: 50%;
  border: 2px solid #f05a00;
  background: #f05a00;
    text-align:center;
     animation: glowing 2500ms infinite;
  color:white;
}

.order-track-status-line {
  display: block;
  margin: 0 auto;
  width: 2px;
  height: 78px;
  background: #f05a00;
}
.order-track-text-stat {
  font-size: 1.3rem;
  font-weight: 500;
  margin-bottom: 3px;
}
.order-track-text-sub {
  font-size: 1rem;
  font-weight: 300;
}

.order-track {
  transition: all 0.3s height 0.3s;
  transform-origin: top center;
}

</style>


    <link href="https://fonts.googleapis.com/css2?family=Kaushan+Script&display=swap" rel="stylesheet">

<div class="container">
 <div class="col-sm-12 col-12 bg-white p-3 loginback">
<section class="root">
  <figure>
    <img src="{{asset('public/favicon.png')}}" alt="buynfeel_logo">
    <figcaption>
      <h4>BuynFeel</h4>
      <h6>Order ID#</h6>
      <h2>{{$viewcart->invoice_id}}</h2>
    </figcaption>
  </figure>
  <div class="order-track">

 @if($viewcart->status == '4')
    <div class="order-track-step">
      <div class="order-track-status">
            @if($viewcart->status == '4')
        <span class="order-track-status-dot-active"><i class="fa fa-cross" style="font-size:18px;margin-top:5px"></i></span>
        @else
        <span class="order-track-status-dot"></span>
        @endif
        <span class="order-track-status-line"></span>
      </div>
      <div class="order-track-text">
        <p class="order-track-text-stat">ORDER CANCELLED</p>
      
       
       
        <span class="order-track-text-sub">Order Delivery Completed-<br>

<br>{{$viewcart->updated_at}}</span>

      </div>
    </div>
 @endif
    <div class="order-track-step">
      <div class="order-track-status">
            @if($viewcart->status == '3')
        <span class="order-track-status-dot-active"><i class="fa fa-check" style="font-size:18px;margin-top:5px"></i></span>
        @else
        <span class="order-track-status-dot"></span>
        @endif
        <span class="order-track-status-line"></span>
      </div>
      <div class="order-track-text">
        <p class="order-track-text-stat">ORDER DELIVERED</p>
      
        @if($viewcart->status == '3')
       
        <span class="order-track-text-sub">Order Delivery Completed-<br>

<br>{{$viewcart->updated_at}}</span>
 @endif
      </div>
    </div>
    
    
    
    
    <div class="order-track-step">
      <div class="order-track-status">
        @if($viewcart->status == '5' || $viewcart->status > '5')
        <span class="order-track-status-dot-active"><i class="fa fa-check" style="font-size:18px;margin-top:5px"></i></span>
        @else
        <span class="order-track-status-dot"></span>
        @endif
        <span class="order-track-status-line"></span>
      </div>
      <div class="order-track-text">
        <p class="order-track-text-stat">ORDER SHIPPED</p>
        @if($viewcart->status == '5' || $viewcart->status > '5')
       <span class="order-track-text-sub">Your Order Shipped - BuynFeel <Br> - <br>{{$viewcart->updated_at}}</span>
        @endif
        
      </div>
    </div>
    
    
    
    <div class="order-track-step">
      <div class="order-track-status">
         @if($viewcart->status == '1' || $viewcart->status > '1')
        <span class="order-track-status-dot-active"><i class="fa fa-check" style="font-size:18px;margin-top:5px"></i></span>
        @else
        <span class="order-track-status-dot"></span>
        @endif
        <span class="order-track-status-line"></span>
      </div>
      <div class="order-track-text">
        <p class="order-track-text-stat">ORDER PROCESSING</p>
         @if($viewcart->status == '1' || $viewcart->status > '1')
        @if($viewcart->payment_type == 'bank' || $viewcart->payment_type == 'bkash' || $viewcart->payment_type == 'nagad' || $viewcart->payment_type == 'rocket')
        <span class="order-track-text-sub">{{$viewcart->payment_type}} payment complete. Order selected for processing. - BuynFeel <br>{{$viewcart->updated_at}}</span>
        @elseif($viewcart->payment_type == 'COD')
         <span class="order-track-text-sub">Cash on delivery payment system. Order selected for processing. - BuynFeel <br>{{$viewcart->updated_at}}</span>
        @endif
@endif
      </div>
    </div>
    
    
    
  
    <div class="order-track-step">
      <div class="order-track-status">
         @if($viewcart->status == '0' || $viewcart->status > '0')
        <span class="order-track-status-dot-active"><i class="fa fa-check" style="font-size:18px;margin-top:5px"></i></span>
        @else
        <span class="order-track-status-dot"></span>
        @endif
        <span class="order-track-status-line"></span>
      </div>
      <div class="order-track-text">
        <p class="order-track-text-stat">ORDER PENDING</p>
        
       
               @if($viewcart->status == '0' || $viewcart->status > '0')
        @if($viewcart->payment_type == 'bank' || $viewcart->payment_type == 'bkash' || $viewcart->payment_type == 'nagad' || $viewcart->payment_type == 'rocket')
        
        <span class="order-track-text-sub">Tk.{{number_format($viewcart->grand_total,2)}} ({{$viewcart->payment_type}}) payment received by BuynFeel Pay from customer<br>
{{$viewcart->created_at}}</span>

        
          @endif
        @endif
      </div>
    </div>
  
    
    
    <div class="order-track-step">
      <div class="order-track-status">
        @if($viewcart->status == '0' || $viewcart->status > '0')
        <span class="order-track-status-dot-active"><i class="fa fa-check" style="font-size:18px;margin-top:5px"></i></span>
        @else
        <span class="order-track-status-dot"></span>
        @endif
        <span class="order-track-status-line"></span>
      </div>
      <div class="order-track-text">
        <p class="order-track-text-stat">ORDER PENDING</p>
          @if($viewcart->status == '0' || $viewcart->status > '0')
          
        <span class="order-track-text-sub">Purchasing Policy and Terms & Conditions accepted. {{$viewcart->invoice_id}} has been marked as Pending by - customer
        <br>{{$viewcart->created_at}}</span>
        @endif
      </div>
    </div>
  </div>
</section>
</div>
</div>
@endsection