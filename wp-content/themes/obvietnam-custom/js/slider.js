/**
 * JavaScript for handling hero slider functionality
 *
 * @package OB_Vietnam_Custom
 */

jQuery(document).ready(function($) {
    // Variables for hero slider
    var currentSlide = 0;
    var totalSlides = $('.hero-slide').length;
    var slideInterval;
    var slideDelay = 5000; // 5 seconds between slides
    
    // Initialize slider if there are multiple slides
    if (totalSlides > 1) {
        // Show first slide
        $('.hero-slide').eq(0).addClass('active');
        
        // Create slider navigation dots
        var dotsHtml = '<div class="hero-dots">';
        for (var i = 0; i < totalSlides; i++) {
            dotsHtml += '<span class="hero-dot' + (i === 0 ? ' active' : '') + '" data-slide="' + i + '"></span>';
        }
        dotsHtml += '</div>';
        $('.hero-container').append(dotsHtml);
        
        // Start automatic sliding
        startSlideInterval();
        
        // Click event for dots
        $('.hero-dot').on('click', function() {
            var slideIndex = $(this).data('slide');
            goToSlide(slideIndex);
            resetSlideInterval();
        });
        
        // Add arrow navigation
        $('.hero-container').append('<div class="hero-nav"><span class="hero-prev"><i class="fas fa-chevron-left"></i></span><span class="hero-next"><i class="fas fa-chevron-right"></i></span></div>');
        
        // Click event for arrows
        $('.hero-prev').on('click', function() {
            prevSlide();
            resetSlideInterval();
        });
        
        $('.hero-next').on('click', function() {
            nextSlide();
            resetSlideInterval();
        });
        
        // Pause slider on hover
        $('.hero-section').hover(
            function() {
                clearInterval(slideInterval);
            },
            function() {
                startSlideInterval();
            }
        );
    }
    
    // Function to go to specific slide
    function goToSlide(index) {
        if (index >= totalSlides) {
            index = 0;
        } else if (index < 0) {
            index = totalSlides - 1;
        }
        
        $('.hero-slide').removeClass('active');
        $('.hero-slide').eq(index).addClass('active');
        
        $('.hero-dot').removeClass('active');
        $('.hero-dot').eq(index).addClass('active');
        
        currentSlide = index;
    }
    
    // Function for next slide
    function nextSlide() {
        goToSlide(currentSlide + 1);
    }
    
    // Function for previous slide
    function prevSlide() {
        goToSlide(currentSlide - 1);
    }
    
    // Function to start automatic sliding
    function startSlideInterval() {
        slideInterval = setInterval(function() {
            nextSlide();
        }, slideDelay);
    }
    
    // Function to reset slide interval
    function resetSlideInterval() {
        clearInterval(slideInterval);
        startSlideInterval();
    }
    
    // Add animation to stats numbers
    function animateStats() {
        $('.stat-number').each(function() {
            var $this = $(this);
            var text = $this.text();
            
            // Check if the text contains a number
            if (/\d/.test(text)) {
                var hasPlus = text.includes('+');
                var hasPercent = text.includes('%');
                
                // Extract the number
                var num = parseInt(text.replace(/[^\d]/g, ''));
                
                // Only animate if in viewport
                if ($this.isInViewport() && !$this.hasClass('animated')) {
                    $this.prop('Counter', 0).addClass('animated');
                    $this.animate({
                        Counter: num
                    }, {
                        duration: 2000,
                        easing: 'swing',
                        step: function(now) {
                            var text = Math.ceil(now);
                            if (hasPlus) {
                                text += '+';
                            }
                            if (hasPercent) {
                                text += '%';
                            }
                            $this.text(text);
                        }
                    });
                }
            }
        });
    }
    
    // Check if element is in viewport
    $.fn.isInViewport = function() {
        var elementTop = $(this).offset().top;
        var elementBottom = elementTop + $(this).outerHeight();
        var viewportTop = $(window).scrollTop();
        var viewportBottom = viewportTop + $(window).height();
        return elementBottom > viewportTop && elementTop < viewportBottom;
    };
    
    // Trigger stats animation on scroll
    $(window).on('scroll', function() {
        animateStats();
    });
    
    // Initial check for stats animation
    animateStats();
    
    // Client logos hover effect
    $('.client-item').hover(
        function() {
            $(this).addClass('hover');
        },
        function() {
            $(this).removeClass('hover');
        }
    );
});
