/**
 * JavaScript for handling responsive navigation menu
 *
 * @package OB_Vietnam_Custom
 */

jQuery(document).ready(function($) {
    var $mobileNav = $('#mobile-navigation');
    var $mobileOverlay = $('.mobile-menu-overlay');
    var $body = $('body');

    // Mở menu mobile
    $('#mobile-menu-toggle').on('click', function(e) {
        e.preventDefault();
        $mobileNav.addClass('is-active');
        $mobileOverlay.addClass('is-active');
        $body.addClass('no-scroll');
    });

    // Đóng menu mobile
    $('.mobile-menu-close, .mobile-menu-overlay').on('click', function(e) {
        e.preventDefault();
        $mobileNav.removeClass('is-active');
        $mobileOverlay.removeClass('is-active');
        $body.removeClass('no-scroll');
    });

    // Ngăn chặn đóng menu khi click vào chính menu
    $mobileNav.on('click', function(e) {
        e.stopPropagation();
    });

    // Đóng menu khi nhấn phím ESC
    $(document).on('keyup', function(e) {
        if (e.keyCode === 27) { // ESC key
            $mobileNav.removeClass('is-active');
            $mobileOverlay.removeClass('is-active');
            $body.removeClass('no-scroll');
        }
    });
    //
    // // Add dropdown toggle to menu items with children on mobile
    // $('.mobile-menu .menu-item-has-children > a').after('<span class="dropdown-toggle"><i class="fas fa-chevron-down"></i></span>');
    //
    // // Toggle submenu on mobile
    // $('.mobile-menu .dropdown-toggle').on('click', function(e) {
    //     e.preventDefault();
    //     $(this).toggleClass('active');
    //     $(this).next('.sub-menu').slideToggle(200);
    //     $(this).find('i').toggleClass('fa-chevron-down fa-chevron-up');
    // });
    //
    // // Close mobile menu when clicking outside
    // $(document).on('click', function(e) {
    //     if (!$(e.target).closest('#mobile-navigation, #mobile-menu-toggle').length) {
    //         $('#mobile-navigation').slideUp(300);
    //     }
    // });

    // Handle window resize
    $(window).on('resize', function() {
        if ($(window).width() > 991) {
            $('#mobile-navigation').hide();
        }
    });

    // Smooth scroll for anchor links
    $('a[href*="#"]:not([href="#"])').on('click', function() {
        if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') && location.hostname === this.hostname) {
            var target = $(this.hash);
            target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
            if (target.length) {
                $('html, body').animate({
                    scrollTop: target.offset().top - 80
                }, 800);
                return false;
            }
        }
    });

    // Add active class to current menu item
    var currentUrl = window.location.href;
    $('.main-nav a, .mobile-menu a').each(function() {
        if ($(this).attr('href') === currentUrl) {
            $(this).closest('li').addClass('current-menu-item');
        }
    });

    // Add animation classes on scroll
    $(window).on('scroll', function() {
        $('.service-card, .product-card, .supply-chain-item, .benefit-item, .news-card').each(function() {
            if ($(this).offset().top < $(window).scrollTop() + $(window).height() - 100) {
                $(this).addClass('animate-fadeIn');
            }
        });
    });
});
