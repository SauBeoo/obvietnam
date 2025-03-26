<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package OB_Vietnam_Custom
 */

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function obvietnam_custom_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	return $classes;
}
add_filter( 'body_class', 'obvietnam_custom_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function obvietnam_custom_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'obvietnam_custom_pingback_header' );

/**
 * Modify the excerpt length
 */
function obvietnam_custom_excerpt_length( $length ) {
	return 20;
}
add_filter( 'excerpt_length', 'obvietnam_custom_excerpt_length' );

/**
 * Modify the excerpt more string
 */
function obvietnam_custom_excerpt_more( $more ) {
	return '...';
}
add_filter( 'excerpt_more', 'obvietnam_custom_excerpt_more' );

/**
 * Add custom classes to menu items
 */
function obvietnam_custom_menu_classes($classes, $item, $args) {
    if($args->theme_location == 'main-menu') {
        $classes[] = 'main-nav-item';
    }
    
    if($args->theme_location == 'footer-services' || $args->theme_location == 'footer-links') {
        $classes[] = 'footer-link';
    }
    
    return $classes;
}
add_filter('nav_menu_css_class', 'obvietnam_custom_menu_classes', 10, 3);

/**
 * Add custom classes to menu links
 */
function obvietnam_custom_menu_link_attributes($atts, $item, $args) {
    if($args->theme_location == 'footer-services') {
        $atts['class'] = 'footer-link flex items-center';
        
        // Add icon based on menu item title
        $icon = 'fa-truck'; // Default icon
        
        $title = strtolower($item->title);
        if(strpos($title, 'kho') !== false) {
            $icon = 'fa-warehouse';
        } elseif(strpos($title, 'xuất') !== false || strpos($title, 'nhập') !== false) {
            $icon = 'fa-globe';
        } elseif(strpos($title, 'tư vấn') !== false) {
            $icon = 'fa-chart-line';
        } elseif(strpos($title, 'phân phối') !== false) {
            $icon = 'fa-box';
        }
        
        $atts['data-icon'] = $icon;
    }
    
    return $atts;
}
add_filter('nav_menu_link_attributes', 'obvietnam_custom_menu_link_attributes', 10, 3);

/**
 * Add icons to footer service menu items
 */
function obvietnam_custom_footer_services_menu_items($items, $args) {
    if($args->theme_location == 'footer-services') {
        $dom = new DOMDocument();
        @$dom->loadHTML('<?xml encoding="utf-8" ?>' . $items);
        
        $links = $dom->getElementsByTagName('a');
        foreach ($links as $link) {
            $icon = $link->getAttribute('data-icon');
            if($icon) {
                $icon_html = '<i class="fas ' . $icon . ' mr-2"></i>';
                $link->removeAttribute('data-icon');
                
                $text = $link->textContent;
                $link->textContent = '';
                
                $fragment = $dom->createDocumentFragment();
                @$fragment->appendXML($icon_html . $text);
                $link->appendChild($fragment);
            }
        }
        
        $items = $dom->saveHTML($dom->documentElement);
        $items = str_replace(array('<html>', '</html>', '<body>', '</body>', '<?xml encoding="utf-8" ?>'), '', $items);
    }
    
    return $items;
}
add_filter('wp_nav_menu_items', 'obvietnam_custom_footer_services_menu_items', 10, 2);

/**
 * Add custom search form
 */
function obvietnam_custom_search_form( $form ) {
    $form = '<form role="search" method="get" class="search-form flex w-full" action="' . home_url( '/' ) . '">
                <input type="search" class="search-field flex-grow px-4 py-2 rounded-l-md border-0 focus:ring-2 focus:ring-site-blue" placeholder="' . esc_attr_x( 'Tìm kiếm...', 'placeholder', 'obvietnam-custom' ) . '" value="' . get_search_query() . '" name="s" />
                <button type="submit" class="search-submit bg-site-blue text-white px-4 py-2 rounded-r-md hover:bg-site-blue-dark">
                    <i class="fas fa-search"></i>
                </button>
            </form>';
    return $form;
}
add_filter( 'get_search_form', 'obvietnam_custom_search_form' );

/**
 * Add custom archive title
 */
function obvietnam_custom_archive_title( $title ) {
    if ( is_category() ) {
        $title = single_cat_title( '', false );
    } elseif ( is_tag() ) {
        $title = single_tag_title( '', false );
    } elseif ( is_author() ) {
        $title = get_the_author();
    } elseif ( is_post_type_archive() ) {
        $title = post_type_archive_title( '', false );
    } elseif ( is_tax() ) {
        $title = single_term_title( '', false );
    }

    return $title;
}
add_filter( 'get_the_archive_title', 'obvietnam_custom_archive_title' );
