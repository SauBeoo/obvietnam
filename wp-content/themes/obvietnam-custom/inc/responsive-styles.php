<?php
/**
 * Functions for handling responsive styles
 *
 * @package OB_Vietnam_Custom
 */

/**
 * Add responsive viewport meta tag
 */
function obvietnam_custom_responsive_meta() {
    echo '<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">';
}
add_action('wp_head', 'obvietnam_custom_responsive_meta', 1);

/**
 * Add responsive classes to images
 */
function obvietnam_custom_responsive_images($content) {
    return preg_replace('/<img(.*?)class="(.*?)"(.*?)>/i', '<img$1class="$2 img-fluid"$3>', $content);
}
add_filter('the_content', 'obvietnam_custom_responsive_images');

/**
 * Add responsive classes to embeds
 */
function obvietnam_custom_responsive_embeds($html) {
    return '<div class="responsive-embed">' . $html . '</div>';
}
add_filter('embed_oembed_html', 'obvietnam_custom_responsive_embeds', 10, 3);

/**
 * Add responsive classes to menu items
 */
function obvietnam_custom_responsive_menu_classes($classes, $item, $args) {
    if($args->theme_location == 'main-menu') {
        $classes[] = 'nav-item';
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'obvietnam_custom_responsive_menu_classes', 10, 3);

/**
 * Add responsive classes to menu links
 */
function obvietnam_custom_responsive_menu_link_attributes($atts, $item, $args) {
    if($args->theme_location == 'main-menu') {
        $atts['class'] = 'nav-link';
    }
    return $atts;
}
add_filter('nav_menu_link_attributes', 'obvietnam_custom_responsive_menu_link_attributes', 10, 3);

/**
 * Add responsive breakpoint classes to body
 */
function obvietnam_custom_responsive_body_classes($classes) {
    // Add device detection classes
    if (wp_is_mobile()) {
        $classes[] = 'is-mobile';
    } else {
        $classes[] = 'is-desktop';
    }
    
    return $classes;
}
add_filter('body_class', 'obvietnam_custom_responsive_body_classes');

/**
 * Adjust image sizes for responsive design
 */
function obvietnam_custom_responsive_image_sizes() {
    // Update default image sizes
    update_option('thumbnail_size_w', 150);
    update_option('thumbnail_size_h', 150);
    update_option('medium_size_w', 400);
    update_option('medium_size_h', 400);
    update_option('large_size_w', 800);
    update_option('large_size_h', 800);
    
    // Add custom image sizes
    add_image_size('mobile-hero', 600, 400, true);
    add_image_size('tablet-hero', 800, 500, true);
    add_image_size('desktop-hero', 1200, 600, true);
}
add_action('after_setup_theme', 'obvietnam_custom_responsive_image_sizes');

/**
 * Add responsive srcset to custom header images
 */
function obvietnam_custom_responsive_header_image($html, $header, $attr) {
    if (isset($attr['src'])) {
        $image_id = attachment_url_to_postid($attr['src']);
        if ($image_id) {
            $image = wp_get_attachment_image_src($image_id, 'full');
            $srcset = wp_get_attachment_image_srcset($image_id, 'full');
            $sizes = wp_get_attachment_image_sizes($image_id, 'full');
            
            if ($srcset && $sizes) {
                $html = str_replace('<img', '<img srcset="' . esc_attr($srcset) . '" sizes="' . esc_attr($sizes) . '"', $html);
            }
        }
    }
    return $html;
}
add_filter('get_header_image_tag', 'obvietnam_custom_responsive_header_image', 10, 3);

/**
 * Enqueue responsive styles
 */
function obvietnam_custom_responsive_styles() {
    wp_enqueue_style('obvietnam-custom-responsive', get_template_directory_uri() . '/css/responsive.css', array(), _S_VERSION);
    wp_enqueue_style('obvietnam-custom-mobile', get_template_directory_uri() . '/css/mobile.css', array(), _S_VERSION);
}
add_action('wp_enqueue_scripts', 'obvietnam_custom_responsive_styles');
