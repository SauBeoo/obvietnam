/**
 * JavaScript for handling responsive navigation menu
 *
 * @package OB_Vietnam_Custom
 */

jQuery(document).ready(function($) {
    // Toggle mobile menu
    const mobileMenu = document.getElementById('mobile-navigation');
    const overlay = document.getElementById('menu-overlay');
    const openButton = document.getElementById('demo-open-menu');
    const closeButton = document.getElementById('mobile-menu-close');

    function openMenu() {
        mobileMenu.classList.remove('menu-slide-out');
        mobileMenu.classList.add('menu-slide-in');
        mobileMenu.style.zIndex = '100';
        overlay.classList.remove('menu-overlay-inactive');
        overlay.classList.add('menu-overlay-active');
        document.body.style.overflow = 'hidden';
        mobileMenu.style.display  = 'block';
    }

    function closeMenu() {
        mobileMenu.classList.remove('menu-slide-in');
        mobileMenu.classList.add('menu-slide-out');
        mobileMenu.style.zIndex = '-1';
        overlay.classList.remove('menu-overlay-active');
        overlay.classList.add('menu-overlay-inactive');
        document.body.style.overflow = 'auto';
        mobileMenu.style.display  = 'none';
    }

    openButton.addEventListener('click', openMenu);
    closeButton.addEventListener('click', closeMenu);
    overlay.addEventListener('click', closeMenu);

    // Close menu when pressing ESC key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape') {
            closeMenu();
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
