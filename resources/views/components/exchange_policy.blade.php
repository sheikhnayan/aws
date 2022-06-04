
<?php
    $setting = DB::table('settings')->first();
    $sliders = DB::table('sliders')->where('place', 'Footer')->orderBy('sl','ASC')->get();

?>

<div class="selling-step-slider__container">
    
    <div class="mt-5 mb-5 selling-step-slider">
        @foreach($sliders as $img)
        <div>
            <a href="{{ $img->url }}" target="_blank"><img src="{{ asset('public/sliderImage') }}/{{ $img->image }}" alt=""></a>
        </div>
        @endforeach
    </div>

    <div class="selling-step-slider__arrow"></div>
</div>

