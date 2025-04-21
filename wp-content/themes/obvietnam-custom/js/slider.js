$(document).ready(function(){
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
    $('.autoplay').slick({
        slidesToShow: 5,
        slidesToScroll: 2,
        autoplay: true,
        arrows: false,
        autoplaySpeed: 1000,
        speed: 1000,             // thời gian chạy animation (ms) — càng cao càng mượt
        cssEase: 'ease-in-out', // easing cho transform
        easing: 'linear',       // easing cho jQuery animate (nếu có dùng)
        responsive: [
            {
                breakpoint: 4000,
                settings: {
                    slidesToShow: 5,
                    slidesToScroll: 2,
                    arrows: false,
                    speed: 800,
                    cssEase: 'ease-in-out',
                }
            },
            {
                breakpoint: 768,
                settings: {
                    slidesToShow: 3,
                    slidesToScroll: 2,
                    arrows: false,
                    speed: 600,
                    cssEase: 'ease-in-out',
                }
            },
            {
                breakpoint: 650,
                settings: {
                    slidesToShow: 2,
                    slidesToScroll: 2,
                    arrows: false,
                    speed: 600,
                    cssEase: 'ease-in-out',
                }
            }
        ]
    });

});