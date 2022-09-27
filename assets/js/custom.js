/* Wow Js */
new WOW().init();/* Mail Slider */
$('.home-carousel').owlCarousel({
    autoplay: true,
    autoplayTimeout: 4000,
    autoplayHoverPause: true,
    loop: false,
    margin: 0,
    nav: false,
    dots: true,
    responsive: {0: {items: 1}, 600: {items: 1}, 1000: {items: 1}}
});/* Mail Slider */
$('.page-carousel').owlCarousel({
    autoplay: true,
    autoplayTimeout: 4000,
    autoplayHoverPause: true,
    loop: true,
    margin: 30,
    nav: false,
    dots: true,
    responsive: {0: {items: 2}, 600: {items: 2}, 1000: {items: 2}}
});/* Testimonial Slider */
$('.testimonial-carousel').owlCarousel({
    loop: false,
    margin: 30,
    nav: true,
    dots: false,
    responsive: {0: {items: 1}, 600: {items: 2}, 1000: {items: 3}}
})/* Gallery Slider */
$('.gallery-carousel').owlCarousel({
    loop: false,
    margin: 15,
    nav: false,
    dots: false,
    responsive: {0: {items: 3}, 600: {items: 4}, 1000: {items: 6}}
})/* Gallery Js */
baguetteBox.run('.tz-gallery');
/* Video Popup */
$(function() {
    $('.popup-youtube, .popup-vimeo').magnificPopup({
        disableOn: 700,
        type: 'iframe',
        mainClass: 'mfp-fade',
        removalDelay: 160,
        preloader: false,
        fixedContentPos: false
    });
});
