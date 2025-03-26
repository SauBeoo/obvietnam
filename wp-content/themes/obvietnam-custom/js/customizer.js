/**
 * JavaScript for customizer preview
 */

( function( $ ) {
    // Site title and description
    wp.customize( 'blogname', function( value ) {
        value.bind( function( to ) {
            $( '.site-title a' ).text( to );
        } );
    } );
    
    wp.customize( 'blogdescription', function( value ) {
        value.bind( function( to ) {
            $( '.site-description' ).text( to );
        } );
    } );

    // Contact Information
    wp.customize( 'contact_address', function( value ) {
        value.bind( function( to ) {
            $( '.footer-contact-address' ).text( to );
        } );
    } );
    
    wp.customize( 'contact_phone', function( value ) {
        value.bind( function( to ) {
            $( '.footer-contact-phone' ).text( to );
            $( '.header-contact-phone' ).text( to );
            $( 'a.chat-phone span' ).text( to );
        } );
    } );
    
    wp.customize( 'contact_email', function( value ) {
        value.bind( function( to ) {
            $( '.footer-contact-email' ).text( to );
            $( '.header-contact-email' ).text( to );
        } );
    } );
    
    wp.customize( 'contact_hours', function( value ) {
        value.bind( function( to ) {
            $( '.footer-contact-hours' ).text( to );
        } );
    } );

    // Footer
    wp.customize( 'footer_about_text', function( value ) {
        value.bind( function( to ) {
            $( '.footer-about-text' ).text( to );
        } );
    } );
    
    wp.customize( 'copyright_text', function( value ) {
        value.bind( function( to ) {
            $( '.copyright-text' ).text( to );
        } );
    } );
    
    wp.customize( 'footer_credits', function( value ) {
        value.bind( function( to ) {
            $( '.footer-credits' ).text( to );
        } );
    } );

    // Hero Section
    wp.customize( 'hero_button_text', function( value ) {
        value.bind( function( to ) {
            $( '.hero-button' ).text( to );
        } );
    } );

    // Services Section
    wp.customize( 'services_section_title', function( value ) {
        value.bind( function( to ) {
            $( '.services-section-title' ).text( to );
        } );
    } );
    
    wp.customize( 'services_section_description', function( value ) {
        value.bind( function( to ) {
            $( '.services-section-description' ).text( to );
        } );
    } );

    // Features Section
    wp.customize( 'features_section_title', function( value ) {
        value.bind( function( to ) {
            $( '.features-section-title' ).text( to );
        } );
    } );
    
    wp.customize( 'features_section_description', function( value ) {
        value.bind( function( to ) {
            $( '.features-section-description' ).text( to );
        } );
    } );
    
    wp.customize( 'features_button_text', function( value ) {
        value.bind( function( to ) {
            $( '.features-button' ).text( to );
        } );
    } );

    // Products Section
    wp.customize( 'products_section_title', function( value ) {
        value.bind( function( to ) {
            $( '.products-section-title' ).text( to );
        } );
    } );
    
    wp.customize( 'products_section_description', function( value ) {
        value.bind( function( to ) {
            $( '.products-section-description' ).text( to );
        } );
    } );

    // Stats Section
    wp.customize( 'stats_clients', function( value ) {
        value.bind( function( to ) {
            $( '.stats-clients-number' ).text( to );
        } );
    } );
    
    wp.customize( 'stats_clients_text', function( value ) {
        value.bind( function( to ) {
            $( '.stats-clients-text' ).text( to );
        } );
    } );
    
    wp.customize( 'stats_experience', function( value ) {
        value.bind( function( to ) {
            $( '.stats-experience-number' ).text( to );
        } );
    } );
    
    wp.customize( 'stats_experience_text', function( value ) {
        value.bind( function( to ) {
            $( '.stats-experience-text' ).text( to );
        } );
    } );
    
    wp.customize( 'stats_partners', function( value ) {
        value.bind( function( to ) {
            $( '.stats-partners-number' ).text( to );
        } );
    } );
    
    wp.customize( 'stats_partners_text', function( value ) {
        value.bind( function( to ) {
            $( '.stats-partners-text' ).text( to );
        } );
    } );
    
    wp.customize( 'stats_satisfaction', function( value ) {
        value.bind( function( to ) {
            $( '.stats-satisfaction-number' ).text( to );
        } );
    } );
    
    wp.customize( 'stats_satisfaction_text', function( value ) {
        value.bind( function( to ) {
            $( '.stats-satisfaction-text' ).text( to );
        } );
    } );

    // News Section
    wp.customize( 'news_section_title', function( value ) {
        value.bind( function( to ) {
            $( '.news-section-title' ).text( to );
        } );
    } );
    
    wp.customize( 'news_section_description', function( value ) {
        value.bind( function( to ) {
            $( '.news-section-description' ).text( to );
        } );
    } );

    // Contact Section
    wp.customize( 'contact_section_title', function( value ) {
        value.bind( function( to ) {
            $( '.contact-section-title' ).text( to );
        } );
    } );
    
    wp.customize( 'contact_section_description', function( value ) {
        value.bind( function( to ) {
            $( '.contact-section-description' ).text( to );
        } );
    } );
    
    wp.customize( 'contact_button_text', function( value ) {
        value.bind( function( to ) {
            $( '.contact-button' ).text( to );
        } );
    } );
} )( jQuery );
