import "./bootstrap";

// Import jQuery
import $ from "jquery";

// Import Slick Carousel JS
import "slick-carousel";

// Initialize Slick Carousel
$(document).ready(function () {
    $(".main-slider").slick({
        autoplay: true,
        dots: true,
        infinite: true,
        speed: 500,
        slidesToShow: 1,
        slidesToScroll: 1,
    });
});
