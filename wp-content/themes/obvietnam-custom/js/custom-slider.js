jQuery(document).ready(function ($) {
    $('.slick-container').slick({
        // autoplay: true,
        // autoplaySpeed: 2000,
        dots: true,
        arrows: false,
        infinite: true,
        // speed: 500,
        fade: true,
        cssEase: 'linear',
    });

    $('.slider').slick({
        infinite: true,
        prevArrow: $('.prev-btn'),
        nextArrow: $('.next-btn'),
        responsive: [
            {
                breakpoint: 4000,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 3,
                    arrows: true,
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    arrows: false,
                }
            },
            {
                breakpoint: 650,
                settings: {
                    slidesToShow: 1,
                    slidesToScroll: 1
                }
            }
        ]
    });
});