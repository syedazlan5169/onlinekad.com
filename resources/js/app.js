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

$(document).ready(function () {
    $('.testimoni-carousel').slick({
        dots: true, // Show navigation dots
        infinite: true, // Infinite looping
        speed: 500, // Transition speed
        slidesToShow: 3, // Slides visible at once
        slidesToScroll: 1, // Number of slides to scroll
        centerMode: true, // Center the active slide
        centerPadding: '60px', // Add padding around slides
        autoplay: true, // Enable autoplay
        autoplaySpeed: 3000, // Autoplay delay
        arrows: true, // Show next/prev arrows
        responsive: [
            {
                breakpoint: 1024,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 1,
                },
            },
            {
                breakpoint: 600,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1,
                },
            },
        ],
    });
});

