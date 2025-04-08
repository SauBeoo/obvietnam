/**
 * JavaScript for handling responsive navigation menu
 *
 * @package OB_Vietnam_Custom
 */

jQuery(document).ready(function($) {
    const toggle = document.getElementById('mobile-menu-toggle');
    const closeButton = document.getElementById('mobile-menu-close');
    const mobileNav = document.getElementById('mobile-navigation');
    const overlay = document.getElementById('mobile-menu-overlay');

    // Toggle mobile menu
    function toggleMenu() {
        mobileNav.classList.toggle('translate-x-full');
        overlay.classList.toggle('hidden');
        document.body.classList.toggle('overflow-hidden');
    }

    // Mở/đóng menu
    toggle.addEventListener('click', toggleMenu);
    closeButton.addEventListener('click', toggleMenu);
    overlay.addEventListener('click', toggleMenu);

    // Đóng menu khi click menu item
    document.querySelectorAll('#mobile-navigation a').forEach(item => {
        item.addEventListener('click', toggleMenu);
    });

    // Xử lý phím ESC
    document.addEventListener('keyup', (e) => {
        if (e.key === 'Escape' && !mobileNav.classList.contains('translate-x-full')) {
            toggleMenu();
        }
    });

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
