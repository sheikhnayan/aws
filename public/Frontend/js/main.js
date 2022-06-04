

jQuery(document).ready(function(){
    // This button will increment the value
    $('.qtyplus').click(function(e){
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('input[name='+fieldName+']').val());
        // If is not undefined
        if (!isNaN(currentVal)) {
            // Increment
            $('input[name='+fieldName+']').val(currentVal + 1);
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(0);
        }
    });
    // This button will decrement the value till 0
    $(".qtyminus").click(function(e) {
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        fieldName = $(this).attr('field');
        // Get its current value
        var currentVal = parseInt($('input[name='+fieldName+']').val());
        // If it isn't undefined or its greater than 0
        if (!isNaN(currentVal) && currentVal > 0) {
            // Decrement one
            $('input[name='+fieldName+']').val(currentVal - 1);
        } else {
            // Otherwise put a 0 there
            $('input[name='+fieldName+']').val(0);
        }
    });
});






















// window.onscroll = function() {scrollFunction()};
// function scrollFunction() {
//   if (document.body.scrollTop > 20|| document.documentElement.scrollTop > 20) {
//     document.getElementById("myBtn").style.display = "block";
//   } else {
//     document.getElementById("myBtn").style.display = "none";
//   }
// }
// function topFunction() {
//   document.body.scrollTop = 0; // For Safari
//   document.documentElement.scrollTop = 0;
// }



// $(window).scroll(function() {
//   if ($(window).scrollTop() > 20) {
//     $('#mobilemenu').addClass('floatingNav');
//   } else {
//     $('#mobilemenu').removeClass('floatingNav');
//   }
// });




// $(window).scroll(function() {
//   if ($(window).scrollTop() > 20) {
//     $('.uk-card').addClass('floatingNav');
//   } else {
//     $('.uk-card').removeClass('floatingNav');
//   }
// });




// jQuery(document).ready(function(){
//     // This button will increment the value
//     $('.qtyplus').click(function(e){
//         // Stop acting like a button
//         e.preventDefault();
//         // Get the field name
//         fieldName = $(this).attr('field');
//         // Get its current value
//         var currentVal = parseInt($('input[name='+fieldName+']').val());
//         // If is not undefined
//         if (!isNaN(currentVal)) {
//             // Increment
//             $('input[name='+fieldName+']').val(currentVal + 1);
//           } else {
//             // Otherwise put a 0 there
//             $('input[name='+fieldName+']').val(0);
//           }
//         });
//     // This button will decrement the value till 0
//     $(".qtyminus").click(function(e) {
//         // Stop acting like a button
//         e.preventDefault();
//         // Get the field name
//         fieldName = $(this).attr('field');
//         // Get its current value
//         var currentVal = parseInt($('input[name='+fieldName+']').val());
//         // If it isn't undefined or its greater than 0
//         if (!isNaN(currentVal) && currentVal > 0) {
//             // Decrement one
//             $('input[name='+fieldName+']').val(currentVal - 1);
//           } else {
//             // Otherwise put a 0 there
//             $('input[name='+fieldName+']').val(0);
//           }
//         });
//   });









// // $(document).ready(function(){


// //   $(".owl-carousel").owlCarousel({
// //     items:4,
// //     loop:true,
// //     touchDrag:true,
// //     autoplay:true,
// //     autoplayTimeout:2000,
// //     autoplayHoverPause:true,
// //      responsiveClass:true,
// //     responsive:{
// //         0:{
// //             items:1,

// //         },
// //         600:{
// //             items:2,

// //         },
// //         1000:{
// //             items:4,

// //         }
// //     }

// //   });



// // });

// // 


// $(function(){

//   $("#exzoom").exzoom({
    
//   });

// });




