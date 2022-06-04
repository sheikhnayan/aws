@extends('User.layouts.master')

@section('body')

<div class="col-sm-12 col-12 mt-4">
  <div class="container  p-3">

  	<div class="col-12 col-sm-12 col-md-12 col-xs-12">
  		<div class="row">
  			@if($shopdata)
  			@foreach($shopdata as $data)
  			@php
  			$brand = str_replace(' ','-',$data->business_name);

  			@endphp
  			<div class="col-lg-2">
  				<a href="{{url('seller-Product')}}/{{$brand}}/{{$data->id}}" style="text-decoration: none;color: black"> <img src="{{asset('public/seller')}}/{{$data->avatar}}">
  				<div style="background-color: #ccc;padding: 10px" align="center">
  					{{$data->business_name}}
  				</div></a>
  			</div>
  			@endforeach
  			@endif
  		</div>
  		
  	</div>
</div>
</div>
@endsection