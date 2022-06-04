@extends('User.layouts.master')
@section('body')
<?php
    $setting = DB::table('settings')->first();
?>

<div class="container">
    @include('components.offer_banner')

    <h3 class="text-center">Exchange Policy</h3>

    <p class="fw-bold">{{$setting->exchange_policy_title ?? ''}}</p>

    <h4><b>Exchange Request Form:</b></h4>

    <form action="{{ route('submit-exchange-request') }}" method="post" class="mb-4" style="max-width: 500px;">
        @csrf
        <div class="form-group mt-3">
            <label for="">Name</label>
            <input type="text" class="form-control" name="name" placeholder="Name" required="">
        </div>
        <div class="form-group mt-3">
            <label for="">Phone Number</label>
            <input type="number" class="form-control" name="phone_number" placeholder="Phone Number" required="">
        </div>
        <div class="form-group mt-3">
            <label for="">Email Address  (please double check your address is correct)</label>
            <input type="email" class="form-control" name="email" placeholder="Email Address" required="">
        </div>
        <div class="form-group mt-3">
            <label for="">Order Number:</label>
            <input type="text" class="form-control" name="order_number" placeholder="Order Number" required="">
        </div>
        <div class="form-group mt-3">
            <label for="">Reason for Exchange Request:</label>
            <input type="text" class="form-control" name="reason" placeholder="Reason for Exchange Request" required="">
        </div>

        <h4><b>List of Product you want to return:</b></h4>

        <div class="form-group mt-3">
            <input type="text" class="form-control" name="return_product_style_number" placeholder="Style Number/ SKU:" required="">
        </div>
        <div class="form-group mt-3">
            <input type="text" class="form-control" name="return_product_size" placeholder="Size:" required="">
        </div>
        <div class="form-group mt-3">
            <input type="text" class="form-control" name="return_product_color" placeholder="Color:" required="">
        </div>

        <h4><b>What you want in exchange:</b></h4>

        <div class="form-group mt-3">
            <input type="text" class="form-control" name="exchange_product_style_number" placeholder="Style Number/ SKU:" required="">
        </div>
        <div class="form-group mt-3">
            <input type="text" class="form-control" name="exchange_product_size" placeholder="Size:" required="">
        </div>
        <div class="form-group mt-3">
            <input type="text" class="form-control" name="exchange_product_color" placeholder="Color:" required="">
        </div>

        <div class="form-group mt-3">
            <label for=""><b>Your Message (Optional) :</b> </label>
            <textarea name="message" rows="5" class="form-control"></textarea>
        </div>

        <button type="submit" class="py-3 px-5 text-light border-0 fw-bold mt-3" style="background-color: #b90000;">Submit Exchange request</button>
    </form>

    <div class="mb-5 mt-5">
        {!! $setting->exchange_policy ?? '' !!}

        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>
        <br>

    </div>

</div>

@endsection