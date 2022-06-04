<?php
    $setting = DB::table('settings')->first();
?>
<div class="text-center">
	<img src="{{asset('/public/OfferBanner')}}/{{$setting->offer_banner}}" alt="">
</div>