var preloader = document.getElementById('load');
function myfunctions() {
	preloader.style.display = 'none';
}

$(document).ready(function () {
	$.each($('[data-bg-img]'), (index, item) => {
        $(item).css('background-image', $(item).data('bgImg'));
    })

	function activateElevateZoom(element) {
		$(element).elevateZoom({
			zoomType: "inner",
			cursor: "crosshair",
			zoomWindowFadeIn: 500,
			zoomWindowFadeOut: 500,
			lensFadeIn: 500,
			lensFadeOut: 500,
			easing: true,
		});
	};

	$('.simpleLens-big-image-container .popup-image').simpleLightbox();

	// jquery count down
	$.each($('.jquery-countdown'), function (index, value) {
		// date format MM/DD/YYYY hh:mm:ss
		const htmlTemplate = `
			<div class="date date_container">
				<div class="date-item">
					<span class="date-number">%D</span>
					<span class="date-name">Day(s)</span>
				</div>
				<div class="date-item">
					<span class="date-number">%H</span>
					<span class="date-name">Hours</span>
				</div>
				<div class="date-item">
					<span class="date-number">%M</span>
					<span class="date-name">Minutes</span>
				</div>
				<div class="date-item">
					<span class="date-number">%S</span>
					<span class="date-name">Seconds</span>
				</div>
			</div>
		`;

		const date = $(this).data('date');
		$(this).countdown(date, function (event) {
			$(this).html(event.strftime(htmlTemplate));
		});
	});

	// slick slider
	$('.simpleLens-big-image-container').slick({
		dots: false,
		arrows: false,
		asNavFor: '.product-thumb-gallery',
	});

	// banner slider
	$('.banner-slider').slick({
		dots: false,
		arrows: false,
		autoplay: true,
	})

	$('.selling-step-slider').slick({
		dots: false,
		arrows: true,
		// autoplay: true,
		loop: true,
		appendArrows: $('.selling-step-slider__arrow'),
		// prevArrow: '<i class="fas fa-angle-left slick-prev"></i>',
		// nextArrow: '<i class="fas fa-angle-right slick-next"></i>',
	})

	$('.simpleLens-big-image-container').on('beforeChange', function (event, slick, currentSlide, nextSlide) {
		$('.zoomContainer').remove();
	})
	$('.simpleLens-big-image-container').on('afterChange', function (event, slick, currentSlide, nextSlide) {
		const nextSlideImage = $(slick.$slides[currentSlide]).find("img");
		activateElevateZoom(nextSlideImage);
	});

	$('.product-thumb-gallery').slick({
		slidesToShow: 4,
		slidesToScroll: 2,
		asNavFor: '.simpleLens-big-image-container',
		dots: false,
		// centerMode: true,
		focusOnSelect: true,
		vertical: true,
		responsive: [
			{
				breakpoint: 992,
				settings: {
					vertical: false,
					centerMode: false,
				}
			}
		]
	});
	activateElevateZoom('.slick-current .product-image-zoom');

	$('.category-slider').slick({
		slidesToShow: 4,
		slidesToScroll: 2,
		dots: false,
		arrows: true,
		lazyLoad: 'ondemand',
		prevArrow: '<button type="button" class="slick-prev"><i class="fa-solid fa-angle-left"></i></button>',
		nextArrow: '<button type="button" class="slick-next"><i class="fa-solid fa-angle-right"></i></button>',
		infinite: false,
		responsive: [
			{
				breakpoint: 992,
				settings: {
					slidesToShow: 3,
				},
			},
			{
				breakpoint: 768,
				settings: {
					slidesToShow: 2,
				},
			},
		],
	});

	$(window).scroll(function () {
		if ($(window).scrollTop() > 20) {
			$('.menubar').addClass('menubarshadow');
		} else {
			$('.menubar').removeClass('menubarshadow');
		}
	});

	$('.sub-category-toggler').click(function () {
		$(this).parent().find('.sub-category-list').slideToggle();
	});

	// remove preloader
	$(window).on('load', function () {
		$('.preloader').fadeOut('slow');
	});

});