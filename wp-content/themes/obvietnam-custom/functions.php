<?php
/**
 * OB Vietnam Custom functions and definitions
 *
 * @package OB_Vietnam_Custom
 */

if ( ! defined( '_S_VERSION' ) ) {
	// Replace the version number of the theme on each release.
	define( '_S_VERSION', '1.1.0' );
}

/**
 * Sets up theme defaults and registers support for various WordPress features.
 */
function obvietnam_custom_setup() {
	// Add default posts and comments RSS feed links to head.
	add_theme_support( 'automatic-feed-links' );

	// Let WordPress manage the document title.
	add_theme_support( 'title-tag' );

	// Enable support for Post Thumbnails on posts and pages.
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'service-thumbnail', 600, 400, true );
	add_image_size( 'product-thumbnail', 600, 400, true );
	add_image_size( 'news-thumbnail', 600, 400, true );

	// Register menu locations
	register_nav_menus(
		array(
			'main-menu' => esc_html__( 'Main Menu', 'obvietnam-custom' ),
			'footer-services' => esc_html__( 'Footer Services', 'obvietnam-custom' ),
			'footer-links' => esc_html__( 'Footer Links', 'obvietnam-custom' ),
			'footer-products' => esc_html__( 'Footer Products', 'obvietnam-custom' ),
		)
	);

	// Switch default core markup to output valid HTML5.
	add_theme_support(
		'html5',
		array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
			'style',
			'script',
		)
	);

	// Set up the WordPress core custom background feature.
	add_theme_support(
		'custom-background',
		apply_filters(
			'obvietnam_custom_custom_background_args',
			array(
				'default-color' => 'ffffff',
				'default-image' => '',
			)
		)
	);

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	// Add support for custom logo
	add_theme_support(
		'custom-logo',
		array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		)
	);
}
add_action( 'after_setup_theme', 'obvietnam_custom_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 */
function obvietnam_custom_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'obvietnam_custom_content_width', 1200 );
}
add_action( 'after_setup_theme', 'obvietnam_custom_content_width', 0 );

/**
 * Register widget area.
 */
function obvietnam_custom_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'obvietnam-custom' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'obvietnam-custom' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title">',
			'after_title'   => '</h2>',
		)
	);
	
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer About', 'obvietnam-custom' ),
			'id'            => 'footer-about',
			'description'   => esc_html__( 'Add widgets for the footer about section.', 'obvietnam-custom' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="footer-heading">',
			'after_title'   => '</h3>',
		)
	);
	
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Contact', 'obvietnam-custom' ),
			'id'            => 'footer-contact',
			'description'   => esc_html__( 'Add widgets for the footer contact section.', 'obvietnam-custom' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="footer-heading">',
			'after_title'   => '</h3>',
		)
	);
	
	register_sidebar(
		array(
			'name'          => esc_html__( 'Footer Newsletter', 'obvietnam-custom' ),
			'id'            => 'footer-newsletter',
			'description'   => esc_html__( 'Add widgets for the footer newsletter section.', 'obvietnam-custom' ),
			'before_widget' => '<div id="%1$s" class="widget %2$s">',
			'after_widget'  => '</div>',
			'before_title'  => '<h3 class="footer-heading">',
			'after_title'   => '</h3>',
		)
	);
}
add_action( 'widgets_init', 'obvietnam_custom_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function obvietnam_custom_scripts() {
	wp_enqueue_style( 'obvietnam-custom-style', get_stylesheet_uri(), array(), _S_VERSION );
	
	// Google Fonts
	wp_enqueue_style( 'google-fonts', 'https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap', array(), null );
	
	// Font Awesome
	wp_enqueue_style( 'font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css', array(), '6.4.0' );
	
	// Custom CSS
	wp_enqueue_style( 'obvietnam-custom-responsive', get_template_directory_uri() . '/css/responsive.css', array('obvietnam-custom-style'), _S_VERSION );
	
	wp_enqueue_style( 'obvietnam-custom-mobile', get_template_directory_uri() . '/css/mobile.css', array('obvietnam-custom-mobile-style'), _S_VERSION );
	
	// Navigation JS
	wp_enqueue_script( 'obvietnam-custom-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery'), _S_VERSION, true );
	
	// Slider JS
	wp_enqueue_script( 'obvietnam-custom-slider', get_template_directory_uri() . '/js/slider.js', array('jquery'), _S_VERSION, true );
	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'obvietnam_custom_scripts' );

/**
 * Register Custom Post Types
 */
function obvietnam_custom_register_post_types() {
    // Services Post Type
    $services_labels = array(
        'name'                  => _x( 'Dịch vụ', 'Post type general name', 'obvietnam-custom' ),
        'singular_name'         => _x( 'Dịch vụ', 'Post type singular name', 'obvietnam-custom' ),
        'menu_name'             => _x( 'Dịch vụ', 'Admin Menu text', 'obvietnam-custom' ),
        'name_admin_bar'        => _x( 'Dịch vụ', 'Add New on Toolbar', 'obvietnam-custom' ),
        'add_new'               => __( 'Thêm mới', 'obvietnam-custom' ),
        'add_new_item'          => __( 'Thêm dịch vụ mới', 'obvietnam-custom' ),
        'new_item'              => __( 'Dịch vụ mới', 'obvietnam-custom' ),
        'edit_item'             => __( 'Sửa dịch vụ', 'obvietnam-custom' ),
        'view_item'             => __( 'Xem dịch vụ', 'obvietnam-custom' ),
        'all_items'             => __( 'Tất cả dịch vụ', 'obvietnam-custom' ),
        'search_items'          => __( 'Tìm dịch vụ', 'obvietnam-custom' ),
        'parent_item_colon'     => __( 'Dịch vụ cha:', 'obvietnam-custom' ),
        'not_found'             => __( 'Không tìm thấy dịch vụ.', 'obvietnam-custom' ),
        'not_found_in_trash'    => __( 'Không tìm thấy dịch vụ trong thùng rác.', 'obvietnam-custom' ),
        'featured_image'        => __( 'Hình ảnh dịch vụ', 'obvietnam-custom' ),
        'set_featured_image'    => __( 'Đặt hình ảnh dịch vụ', 'obvietnam-custom' ),
        'remove_featured_image' => __( 'Xóa hình ảnh dịch vụ', 'obvietnam-custom' ),
        'use_featured_image'    => __( 'Sử dụng làm hình ảnh dịch vụ', 'obvietnam-custom' ),
        'archives'              => __( 'Lưu trữ dịch vụ', 'obvietnam-custom' ),
        'insert_into_item'      => __( 'Chèn vào dịch vụ', 'obvietnam-custom' ),
        'uploaded_to_this_item' => __( 'Đã tải lên dịch vụ này', 'obvietnam-custom' ),
        'filter_items_list'     => __( 'Lọc danh sách dịch vụ', 'obvietnam-custom' ),
        'items_list_navigation' => __( 'Điều hướng danh sách dịch vụ', 'obvietnam-custom' ),
        'items_list'            => __( 'Danh sách dịch vụ', 'obvietnam-custom' ),
    );

    $services_args = array(
        'labels'             => $services_labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'dich-vu' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 20,
        'menu_icon'          => 'dashicons-cart',
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
        'show_in_rest'       => true,
    );

    register_post_type( 'services', $services_args );

    // Products Post Type
    $products_labels = array(
        'name'                  => _x( 'Sản phẩm', 'Post type general name', 'obvietnam-custom' ),
        'singular_name'         => _x( 'Sản phẩm', 'Post type singular name', 'obvietnam-custom' ),
        'menu_name'             => _x( 'Sản phẩm', 'Admin Menu text', 'obvietnam-custom' ),
        'name_admin_bar'        => _x( 'Sản phẩm', 'Add New on Toolbar', 'obvietnam-custom' ),
        'add_new'               => __( 'Thêm mới', 'obvietnam-custom' ),
        'add_new_item'          => __( 'Thêm sản phẩm mới', 'obvietnam-custom' ),
        'new_item'              => __( 'Sản phẩm mới', 'obvietnam-custom' ),
        'edit_item'             => __( 'Sửa sản phẩm', 'obvietnam-custom' ),
        'view_item'             => __( 'Xem sản phẩm', 'obvietnam-custom' ),
        'all_items'             => __( 'Tất cả sản phẩm', 'obvietnam-custom' ),
        'search_items'          => __( 'Tìm sản phẩm', 'obvietnam-custom' ),
        'parent_item_colon'     => __( 'Sản phẩm cha:', 'obvietnam-custom' ),
        'not_found'             => __( 'Không tìm thấy sản phẩm.', 'obvietnam-custom' ),
        'not_found_in_trash'    => __( 'Không tìm thấy sản phẩm trong thùng rác.', 'obvietnam-custom' ),
        'featured_image'        => __( 'Hình ảnh sản phẩm', 'obvietnam-custom' ),
        'set_featured_image'    => __( 'Đặt hình ảnh sản phẩm', 'obvietnam-custom' ),
        'remove_featured_image' => __( 'Xóa hình ảnh sản phẩm', 'obvietnam-custom' ),
        'use_featured_image'    => __( 'Sử dụng làm hình ảnh sản phẩm', 'obvietnam-custom' ),
        'archives'              => __( 'Lưu trữ sản phẩm', 'obvietnam-custom' ),
        'insert_into_item'      => __( 'Chèn vào sản phẩm', 'obvietnam-custom' ),
        'uploaded_to_this_item' => __( 'Đã tải lên sản phẩm này', 'obvietnam-custom' ),
        'filter_items_list'     => __( 'Lọc danh sách sản phẩm', 'obvietnam-custom' ),
        'items_list_navigation' => __( 'Điều hướng danh sách sản phẩm', 'obvietnam-custom' ),
        'items_list'            => __( 'Danh sách sản phẩm', 'obvietnam-custom' ),
    );

    $products_args = array(
        'labels'             => $products_labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'san-pham' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 21,
        'menu_icon'          => 'dashicons-products',
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
        'show_in_rest'       => true,
    );

    register_post_type( 'products', $products_args );

    // Clients Post Type
    $clients_labels = array(
        'name'                  => _x( 'Khách hàng', 'Post type general name', 'obvietnam-custom' ),
        'singular_name'         => _x( 'Khách hàng', 'Post type singular name', 'obvietnam-custom' ),
        'menu_name'             => _x( 'Khách hàng', 'Admin Menu text', 'obvietnam-custom' ),
        'name_admin_bar'        => _x( 'Khách hàng', 'Add New on Toolbar', 'obvietnam-custom' ),
        'add_new'               => __( 'Thêm mới', 'obvietnam-custom' ),
        'add_new_item'          => __( 'Thêm khách hàng mới', 'obvietnam-custom' ),
        'new_item'              => __( 'Khách hàng mới', 'obvietnam-custom' ),
        'edit_item'             => __( 'Sửa khách hàng', 'obvietnam-custom' ),
        'view_item'             => __( 'Xem khách hàng', 'obvietnam-custom' ),
        'all_items'             => __( 'Tất cả khách hàng', 'obvietnam-custom' ),
        'search_items'          => __( 'Tìm khách hàng', 'obvietnam-custom' ),
        'not_found'             => __( 'Không tìm thấy khách hàng.', 'obvietnam-custom' ),
        'not_found_in_trash'    => __( 'Không tìm thấy khách hàng trong thùng rác.', 'obvietnam-custom' ),
        'featured_image'        => __( 'Logo khách hàng', 'obvietnam-custom' ),
        'set_featured_image'    => __( 'Đặt logo khách hàng', 'obvietnam-custom' ),
        'remove_featured_image' => __( 'Xóa logo khách hàng', 'obvietnam-custom' ),
        'use_featured_image'    => __( 'Sử dụng làm logo khách hàng', 'obvietnam-custom' ),
    );

    $clients_args = array(
        'labels'             => $clients_labels,
        'public'             => true,
        'publicly_queryable' => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'khach-hang' ),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 22,
        'menu_icon'          => 'dashicons-businessperson',
        'supports'           => array( 'title', 'thumbnail', 'custom-fields' ),
        'show_in_rest'       => true,
    );

    register_post_type( 'clients', $clients_args );
    
    // Supply Chain Solutions Post Type
    $solutions_labels = array(
        'name'                  => _x( 'Giải pháp', 'Post type general name', 'obvietnam-custom' ),
        'singular_name'         => _x( 'Giải pháp', 'Post type singular name', 'obvietnam-custom' ),
        'menu_name'             => _x( 'Giải pháp', 'Admin Menu text', 'obvietnam-custom' ),
        'name_admin_bar'        => _x( 'Giải pháp', 'Add New on Toolbar', 'obvietnam-custom' ),
        'add_new'               => __( 'Thêm mới', 'obvietnam-custom' ),
        'add_new_item'          => __( 'Thêm giải pháp mới', 'obvietnam-custom' ),
        'new_item'              => __( 'Giải pháp mới', 'obvietnam-custom' ),
        'edit_item'             => __( 'Sửa giải pháp', 'obvietnam-custom' ),
        'view_item'             => __( 'Xem giải pháp', 'obvietnam-custom' ),
        'all_items'             => __( 'Tất cả giải pháp', 'obvietnam-custom' ),
        'search_items'          => __( 'Tìm giải pháp', 'obvietnam-custom' ),
        'not_found'             => __( 'Không tìm thấy giải pháp.', 'obvietnam-custom' ),
        'not_found_in_trash'    => __( 'Không tìm thấy giải pháp trong thùng rác.', 'obvietnam-custom' ),
        'featured_image'        => __( 'Hình ảnh giải pháp', 'obvietnam-custom' ),
        'set_featured_image'    => __( 'Đặt hình ảnh giải pháp', 'obvietnam-custom' ),
        'remove_featured_image' => __( 'Xóa hình ảnh giải pháp', 'obvietnam-custom' ),
        'use_featured_image'    => __( 'Sử dụng làm hình ảnh giải pháp', 'obvietnam-custom' ),
    );

    $solutions_args = array(
        'labels'             => $solutions_labels,
        'public'             => true,
        'publicly_queryable' => true,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'giai-phap' ),
        'capability_type'    => 'post',
        'has_archive'        => true,
        'hierarchical'       => false,
        'menu_position'      => 23,
        'menu_icon'          => 'dashicons-networking',
        'supports'           => array( 'title', 'editor', 'thumbnail', 'excerpt', 'custom-fields' ),
        'show_in_rest'       => true,
    );

    register_post_type( 'solutions', $solutions_args );
    
    // Benefits Post Type
    $benefits_labels = array(
        'name'                  => _x( 'Lợi ích', 'Post type general name', 'obvietnam-custom' ),
        'singular_name'         => _x( 'Lợi ích', 'Post type singular name', 'obvietnam-custom' ),
        'menu_name'             => _x( 'Lợi ích', 'Admin Menu text', 'obvietnam-custom' ),
        'name_admin_bar'        => _x( 'Lợi ích', 'Add New on Toolbar', 'obvietnam-custom' ),
        'add_new'               => __( 'Thêm mới', 'obvietnam-custom' ),
        'add_new_item'          => __( 'Thêm lợi ích mới', 'obvietnam-custom' ),
        'new_item'              => __( 'Lợi ích mới', 'obvietnam-custom' ),
        'edit_item'             => __( 'Sửa lợi ích', 'obvietnam-custom' ),
        'view_item'             => __( 'Xem lợi ích', 'obvietnam-custom' ),
        'all_items'             => __( 'Tất cả lợi ích', 'obvietnam-custom' ),
        'search_items'          => __( 'Tìm lợi ích', 'obvietnam-custom' ),
        'not_found'             => __( 'Không tìm thấy lợi ích.', 'obvietnam-custom' ),
        'not_found_in_trash'    => __( 'Không tìm thấy lợi ích trong thùng rác.', 'obvietnam-custom' ),
    );

    $benefits_args = array(
        'labels'             => $benefits_labels,
        'public'             => true,
        'publicly_queryable' => false,
        'show_ui'            => true,
        'show_in_menu'       => true,
        'query_var'          => true,
        'rewrite'            => array( 'slug' => 'loi-ich' ),
        'capability_type'    => 'post',
        'has_archive'        => false,
        'hierarchical'       => false,
        'menu_position'      => 24,
        'menu_icon'          => 'dashicons-awards',
        'supports'           => array( 'title', 'editor', 'custom-fields' ),
        'show_in_rest'       => true,
    );

    register_post_type( 'benefits', $benefits_args );

    // Services Post Type
    $category_labels = array(
        'name'                  => _x( 'Danh mục', 'Post type general name', 'obvietnam-custom' ),
        'singular_name'         => _x( 'Danh mục', 'Post type singular name', 'obvietnam-custom' ),
        'menu_name'             => _x( 'Danh mục', 'Admin Menu text', 'obvietnam-custom' ),
        'name_admin_bar'        => _x( 'Danh mục', 'Add New on Toolbar', 'obvietnam-custom' ),
        'add_new'               => __( 'Thêm mới', 'obvietnam-custom' ),
        'add_new_item'          => __( 'Thêm danh mục mới', 'obvietnam-custom' ),
        'new_item'              => __( 'Danh mục mới', 'obvietnam-custom' ),
        'edit_item'             => __( 'Sửa danh mục', 'obvietnam-custom' ),
        'view_item'             => __( 'Xem danh mục', 'obvietnam-custom' ),
        'all_items'             => __( 'Tất cả danh mục', 'obvietnam-custom' ),
        'search_items'          => __( 'Tìm danh mục', 'obvietnam-custom' ),
        'parent_item_colon'     => __( 'Danh mục cha:', 'obvietnam-custom' ),
        'not_found'             => __( 'Không tìm thấy danh mục.', 'obvietnam-custom' ),
        'not_found_in_trash'    => __( 'Không tìm thấy danh mục trong thùng rác.', 'obvietnam-custom' ),
        'featured_image'        => __( 'Hình ảnh danh mục', 'obvietnam-custom' ),
        'set_featured_image'    => __( 'Đặt hình ảnh danh mục', 'obvietnam-custom' ),
        'remove_featured_image' => __( 'Xóa hình ảnh danh mục', 'obvietnam-custom' ),
        'use_featured_image'    => __( 'Sử dụng làm hình ảnh danh mục', 'obvietnam-custom' ),
        'archives'              => __( 'Lưu trữ danh mục', 'obvietnam-custom' ),
        'insert_into_item'      => __( 'Chèn vào danh mục', 'obvietnam-custom' ),
        'uploaded_to_this_item' => __( 'Đã tải lên danh mục này', 'obvietnam-custom' ),
        'filter_items_list'     => __( 'Lọc danh danh mục vụ', 'obvietnam-custom' ),
        'items_list_navigation' => __( 'Điều hướng danh sách danh mục', 'obvietnam-custom' ),
        'items_list'            => __( 'Danh sách danh mục', 'obvietnam-custom' ),
    );

    $category_args = array(
		'labels'             => $category_labels,
		'public'             => true,
		'publicly_queryable' => false,
		'show_ui'            => true,
		'show_in_menu'       => true,
		'query_var'          => true,
		'rewrite'            => array( 'slug' => 'loi-ich' ),
		'capability_type'    => 'post',
		'has_archive'        => false,
		'hierarchical'       => false,
		'menu_position'      => 25,
		'menu_icon'          => 'dashicons-category',
		'supports'           => array( 'title', 'editor', 'custom-fields' ),
		'show_in_rest'       => true,
    );

    register_post_type( 'category', $category_args );
}
add_action( 'init', 'obvietnam_custom_register_post_types' );

/**
 * Add meta boxes for custom post types
 */
function obvietnam_custom_add_meta_boxes() {
    // Service Icon
    add_meta_box(
        'service_icon_meta_box',
        __( 'Icon dịch vụ', 'obvietnam-custom' ),
        'obvietnam_custom_service_icon_meta_box_callback',
        'services',
        'side',
        'default'
    );
    
    // Product Details
    add_meta_box(
        'product_details_meta_box',
        __( 'Thông tin sản phẩm', 'obvietnam-custom' ),
        'obvietnam_custom_product_details_meta_box_callback',
        'products',
        'normal',
        'default'
    );
    
    // Solution Icon
    add_meta_box(
        'solution_icon_meta_box',
        __( 'Icon giải pháp', 'obvietnam-custom' ),
        'obvietnam_custom_solution_icon_meta_box_callback',
        'solutions',
        'side',
        'default'
    );
    
    // Solution Features
    add_meta_box(
        'solution_features_meta_box',
        __( 'Tính năng giải pháp', 'obvietnam-custom' ),
        'obvietnam_custom_solution_features_meta_box_callback',
        'solutions',
        'normal',
        'default'
    );
    
    // Benefit Icon
    add_meta_box(
        'benefit_icon_meta_box',
        __( 'Icon lợi ích', 'obvietnam-custom' ),
        'obvietnam_custom_benefit_icon_meta_box_callback',
        'benefits',
        'side',
        'default'
    );
	// Category Icon
	add_meta_box(
		'category_icon_meta_box',
		__( 'Icon danh mục', 'obvietnam-custom' ),
		'obvietnam_custom_category_icon_meta_box_callback',
		'category',
		'side',
		'default'
	);
}
add_action( 'add_meta_boxes', 'obvietnam_custom_add_meta_boxes' );

/**
 * Service Icon Meta Box Callback
 */
function obvietnam_custom_service_icon_meta_box_callback( $post ) {
    wp_nonce_field( 'obvietnam_custom_service_icon_meta_box', 'obvietnam_custom_service_icon_meta_box_nonce' );
    
    $value = get_post_meta( $post->ID, '_service_icon', true );
    
    echo '<p>' . __( 'Nhập class của icon FontAwesome (ví dụ: fa-truck, fa-warehouse)', 'obvietnam-custom' ) . '</p>';
    echo '<input type="text" id="obvietnam_custom_service_icon" name="obvietnam_custom_service_icon" value="' . esc_attr( $value ) . '" style="width:100%">';
    echo '<p><a href="https://fontawesome.com/icons?d=gallery&s=solid&m=free" target="_blank">' . __( 'Xem danh sách icon', 'obvietnam-custom' ) . '</a></p>';
}

/**
 * Product Details Meta Box Callback
 */
function obvietnam_custom_product_details_meta_box_callback( $post ) {
    wp_nonce_field( 'obvietnam_custom_product_details_meta_box', 'obvietnam_custom_product_details_meta_box_nonce' );

    $price = get_post_meta( $post->ID, '_product_price', true );
    $code = get_post_meta( $post->ID, '_product_code', true );
    $availability = get_post_meta( $post->ID, '_product_availability', true );

    // Lấy danh mục hiện tại và danh sách danh mục
    $current_terms = wp_get_object_terms( $post->ID, 'product_category', array( 'fields' => 'ids' ) );
    $categories = get_terms( array(
        'taxonomy' => 'product_category',
        'hide_empty' => false,
    ) );

    echo '<table class="form-table">';

    echo '<tr>';
    echo '<th><label for="obvietnam_custom_product_code">' . __( 'Mã sản phẩm', 'obvietnam-custom' ) . '</label></th>';
    echo '<td><input type="text" id="obvietnam_custom_product_code" name="obvietnam_custom_product_code" value="' . esc_attr( $code ) . '" style="width:50%"></td>';
    echo '</tr>';

    // Thêm phần danh mục
    echo '<tr>';
    echo '<th><label for="product_category">' . __( 'Danh mục sản phẩm', 'obvietnam-custom' ) . '</label></th>';
    echo '<td>';

    // Dropdown chọn danh mục
    echo '<select name="existing_product_category" style="width: 50%; margin-bottom: 10px;">';
    echo '<option value="">' . __( '-- Chọn danh mục --', 'obvietnam-custom' ) . '</option>';
    foreach ( $categories as $category ) {
        $selected = in_array( $category->term_id, $current_terms ) ? 'selected="selected"' : '';
        echo '<option value="' . esc_attr( $category->term_id ) . '" ' . $selected . '>' . $category->name . '</option>';
    }
    echo '</select>';

    // Input thêm danh mục mới
    echo '<br><input type="text" name="new_product_category" placeholder="' . __( 'Thêm danh mục mới', 'obvietnam-custom' ) . '" style="width: 50%;">';
    echo '<p class="description">' . __( 'Chọn danh mục có sẵn hoặc nhập tên danh mục mới', 'obvietnam-custom' ) . '</p>';

    echo '</td>';
    echo '</tr>';

    echo '</table>';
}

// Hàm lưu dữ liệu
function obvietnam_save_custom_product_details( $post_id ) {
    // ... Kiểm tra nonce và các điều kiện lưu cũ ...

    // Xử lý danh mục
    if ( isset( $_POST['new_product_category'] ) && ! empty( $_POST['new_product_category'] ) ) {
        $new_category = sanitize_text_field( $_POST['new_product_category'] );

        // Kiểm tra nếu danh mục chưa tồn tại
        if ( ! term_exists( $new_category, 'product_category' ) ) {
            wp_insert_term( $new_category, 'product_category' );
        }

        // Gán danh mục mới
        wp_set_object_terms( $post_id, $new_category, 'product_category' );
    } elseif ( isset( $_POST['existing_product_category'] ) && ! empty( $_POST['existing_product_category'] ) ) {
        // Gán danh mục đã chọn
        wp_set_object_terms( $post_id, (int)$_POST['existing_product_category'], 'product_category' );
    }

    // ... Lưu các trường meta khác ...
}
add_action( 'save_post', 'obvietnam_save_custom_product_details' );

function obvietnam_register_product_taxonomy() {
    register_taxonomy(
        'product_category',
        'products', // Thay bằng post type phù hợp
        array(
            'label' => __( 'Danh mục sản phẩm' ),
            'rewrite' => array( 'slug' => 'product-category' ),
            'hierarchical' => true,
        )
    );
}
add_action( 'init', 'obvietnam_register_product_taxonomy' );

/**
 * Solution Icon Meta Box Callback
 */
function obvietnam_custom_solution_icon_meta_box_callback( $post ) {
    wp_nonce_field( 'obvietnam_custom_solution_icon_meta_box', 'obvietnam_custom_solution_icon_meta_box_nonce' );
    
    $value = get_post_meta( $post->ID, '_solution_icon', true );
    
    echo '<p>' . __( 'Nhập class của icon FontAwesome (ví dụ: fa-truck, fa-warehouse)', 'obvietnam-custom' ) . '</p>';
    echo '<input type="text" id="obvietnam_custom_solution_icon" name="obvietnam_custom_solution_icon" value="' . esc_attr( $value ) . '" style="width:100%">';
    echo '<p><a href="https://fontawesome.com/icons?d=gallery&s=solid&m=free" target="_blank">' . __( 'Xem danh sách icon', 'obvietnam-custom' ) . '</a></p>';
}

/**
 * Solution Features Meta Box Callback
 */
function obvietnam_custom_solution_features_meta_box_callback( $post ) {
    wp_nonce_field( 'obvietnam_custom_solution_features_meta_box', 'obvietnam_custom_solution_features_meta_box_nonce' );
    
    $features = get_post_meta( $post->ID, '_solution_features', true );
    
    if ( empty( $features ) ) {
        $features = array( '', '', '', '' );
    }
    
    echo '<p>' . __( 'Nhập các tính năng của giải pháp (tối đa 6 tính năng)', 'obvietnam-custom' ) . '</p>';
    echo '<div id="solution-features-container">';
    
    foreach ( $features as $index => $feature ) {
        echo '<div class="solution-feature-item">';
        echo '<input type="text" name="obvietnam_custom_solution_features[]" value="' . esc_attr( $feature ) . '" style="width:100%; margin-bottom:10px;">';
        echo '</div>';
    }
    
    echo '</div>';
    
    echo '<button type="button" id="add-solution-feature" class="button">' . __( 'Thêm tính năng', 'obvietnam-custom' ) . '</button>';
    
    // Add JavaScript to handle adding/removing features
    ?>
    <script type="text/javascript">
        jQuery(document).ready(function($) {
            $('#add-solution-feature').on('click', function() {
                var container = $('#solution-features-container');
                var count = container.children().length;
                
                if (count < 6) {
                    container.append('<div class="solution-feature-item"><input type="text" name="obvietnam_custom_solution_features[]" value="" style="width:100%; margin-bottom:10px;"><button type="button" class="button remove-solution-feature">Xóa</button></div>');
                } else {
                    alert('Tối đa 6 tính năng');
                }
            });
            
            $(document).on('click', '.remove-solution-feature', function() {
                $(this).parent().remove();
            });
        });
    </script>
    <?php
}

/**
 * Benefit Icon Meta Box Callback
 */
function obvietnam_custom_benefit_icon_meta_box_callback( $post ) {
    wp_nonce_field( 'obvietnam_custom_benefit_icon_meta_box', 'obvietnam_custom_benefit_icon_meta_box_nonce' );
    
    $value = get_post_meta( $post->ID, '_benefit_icon', true );
    
    echo '<p>' . __( 'Nhập class của icon FontAwesome (ví dụ: fa-award, fa-chart-line)', 'obvietnam-custom' ) . '</p>';
    echo '<input type="text" id="obvietnam_custom_benefit_icon" name="obvietnam_custom_benefit_icon" value="' . esc_attr( $value ) . '" style="width:100%">';
    echo '<p><a href="https://fontawesome.com/icons?d=gallery&s=solid&m=free" target="_blank">' . __( 'Xem danh sách icon', 'obvietnam-custom' ) . '</a></p>';
}

/**
 * Save meta box data
 */
function obvietnam_custom_save_meta_box_data( $post_id ) {
    // Service Icon
    if ( isset( $_POST['obvietnam_custom_service_icon_meta_box_nonce'] ) ) {
        if ( ! wp_verify_nonce( $_POST['obvietnam_custom_service_icon_meta_box_nonce'], 'obvietnam_custom_service_icon_meta_box' ) ) {
            return;
        }
        
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
            return;
        }
        
        if ( isset( $_POST['obvietnam_custom_service_icon'] ) ) {
            update_post_meta( $post_id, '_service_icon', sanitize_text_field( $_POST['obvietnam_custom_service_icon'] ) );
        }
    }
    
    // Product Details
    if ( isset( $_POST['obvietnam_custom_product_details_meta_box_nonce'] ) ) {
        if ( ! wp_verify_nonce( $_POST['obvietnam_custom_product_details_meta_box_nonce'], 'obvietnam_custom_product_details_meta_box' ) ) {
            return;
        }
        
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
            return;
        }
        
        if ( isset( $_POST['obvietnam_custom_product_price'] ) ) {
            update_post_meta( $post_id, '_product_price', sanitize_text_field( $_POST['obvietnam_custom_product_price'] ) );
        }
        
        if ( isset( $_POST['obvietnam_custom_product_code'] ) ) {
            update_post_meta( $post_id, '_product_code', sanitize_text_field( $_POST['obvietnam_custom_product_code'] ) );
        }
        
        if ( isset( $_POST['obvietnam_custom_product_availability'] ) ) {
            update_post_meta( $post_id, '_product_availability', sanitize_text_field( $_POST['obvietnam_custom_product_availability'] ) );
        }
    }
    
    // Solution Icon
    if ( isset( $_POST['obvietnam_custom_solution_icon_meta_box_nonce'] ) ) {
        if ( ! wp_verify_nonce( $_POST['obvietnam_custom_solution_icon_meta_box_nonce'], 'obvietnam_custom_solution_icon_meta_box' ) ) {
            return;
        }
        
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
            return;
        }
        
        if ( isset( $_POST['obvietnam_custom_solution_icon'] ) ) {
            update_post_meta( $post_id, '_solution_icon', sanitize_text_field( $_POST['obvietnam_custom_solution_icon'] ) );
        }
    }
    
    // Solution Features
    if ( isset( $_POST['obvietnam_custom_solution_features_meta_box_nonce'] ) ) {
        if ( ! wp_verify_nonce( $_POST['obvietnam_custom_solution_features_meta_box_nonce'], 'obvietnam_custom_solution_features_meta_box' ) ) {
            return;
        }
        
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
            return;
        }
        
        if ( isset( $_POST['obvietnam_custom_solution_features'] ) ) {
            $features = array_map( 'sanitize_text_field', $_POST['obvietnam_custom_solution_features'] );
            $features = array_filter( $features ); // Remove empty values
            update_post_meta( $post_id, '_solution_features', $features );
        }
    }
    
    // Benefit Icon
    if ( isset( $_POST['obvietnam_custom_benefit_icon_meta_box_nonce'] ) ) {
        if ( ! wp_verify_nonce( $_POST['obvietnam_custom_benefit_icon_meta_box_nonce'], 'obvietnam_custom_benefit_icon_meta_box' ) ) {
            return;
        }
        
        if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
            return;
        }
        
        if ( isset( $_POST['obvietnam_custom_benefit_icon'] ) ) {
            update_post_meta( $post_id, '_benefit_icon', sanitize_text_field( $_POST['obvietnam_custom_benefit_icon'] ) );
        }
    }
}
add_action( 'save_post', 'obvietnam_custom_save_meta_box_data' );

function inline_styles()
{

    $stylesheets = [
        'contact' => get_template_directory_uri() . '/css/contact.css',
    ];
    foreach ($stylesheets as $key => $value) {
        $styles_css_content = file_get_contents($value);
        $compressed_css_content = compress_css($styles_css_content);
        echo '<style id="global-styles-inline-css-' . $key . '"> ' . $compressed_css_content . '</style>';
    }
}

add_action('wp_head', 'inline_styles');

function compress_css($css)
{
    // Remove comments
    $css = preg_replace('!/\*[^*]*\*+([^/][^*]*\*+)*/!', '', $css);

    // Remove whitespace
    $css = str_replace(array("\r\n", "\r", "\n", "\t", '  ', '    ', '    '), '', $css);

    return $css;
}

/**
 * Hàm hiển thị cây danh mục sản phẩm theo dạng đệ quy.
 *
 * @param int    $parent_id    ID của danh mục cha (mặc định là 0).
 * @param string $taxonomy     Tên taxonomy, ví dụ 'product_category'.
 * @param string $active_slug  Slug của danh mục đang được chọn (active).
 * @param int    $level        Mức độ lồng nhau (0 là cấp cao nhất).
 *
 * @return bool  Trả về true nếu trong nhánh này có danh mục đang active, false nếu không.
 */
function display_category_tree($parent_id = 0, $taxonomy = 'product_category', $active_slug = '', $level = 0) {
    $terms = get_terms([
        'taxonomy'   => $taxonomy,
        'hide_empty' => false,
        'parent'     => $parent_id
    ]);

    if (empty($terms) || is_wp_error($terms)) {
        return false;
    }

    // Nếu là danh mục con (level > 0) thì thụt vào 20px (ml-5)
    $ul_class = 'space-y-1';
    if ($level > 0) {
        $ul_class .= ' ml-3';
    }

    $branch_active = false;

    echo '<ul class="' . $ul_class . '">';
    foreach ($terms as $term) {
        // Kiểm tra nếu danh mục hiện tại đang active.
        $is_current_active = ($active_slug === $term->slug);

        // Gọi đệ quy để lấy danh mục con.
        ob_start();
        $child_active = display_category_tree($term->term_id, $taxonomy, $active_slug, $level + 1);
        $child_html = ob_get_clean();

        // Nếu danh mục hiện tại hoặc bất kỳ danh mục con nào đang active thì mặc định mở.
        $is_open = ($is_current_active || $child_active) ? 'true' : 'false';

        // Thiết lập class active cho danh mục hiện tại.
        $active_class = $is_current_active ? 'bg-blue-100 text-blue-600' : 'text-gray-700 hover:bg-gray-50';
        ?>
        <li x-data="{ isOpen: <?= $is_open ?> }" class="relative">
            <div class="flex items-center justify-between <?= $active_class ?> rounded-md px-3 py-2 transition-colors"  @click="isOpen = !isOpen">
                <div>
                    <a href="?product_category=<?= esc_attr($term->slug) ?>" class="flex-1" @click.stop>
                        <?= esc_html($term->name) ?>
                    </a>
                </div>
                <?php if (!empty($child_html)) : ?>
                    <button class="p-1 hover:bg-gray-200 rounded-full ml-2">
                        <svg class="w-4 h-4 transform transition-transform" :class="{ 'rotate-90': isOpen }"
                             fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                        </svg>
                    </button>
                <?php endif; ?>
            </div>

            <?php if (!empty($child_html)) : ?>
                <div x-show="isOpen" x-collapse>
                    <?= $child_html ?>
                </div>
            <?php endif; ?>
        </li>
        <?php

        if ($is_current_active || $child_active) {
            $branch_active = true;
        }
    }
    echo '</ul>';

    return $branch_active;
}

function obvietnam_custom_category_icon_meta_box_callback($post) {
	wp_nonce_field('obvietnam_custom_category_icon_meta_box', 'obvietnam_custom_category_icon_meta_box_nonce');
	
	$icon_class = get_post_meta($post->ID, '_category_icon', true);
	$bg_class = get_post_meta($post->ID, '_category_icon_bg', true);
	
	echo '<p>' . __('Nhập class của icon FontAwesome (ví dụ: fa-truck, fa-warehouse)', 'obvietnam-custom') . '</p>';
	echo '<input type="text" id="obvietnam_custom_category_icon" name="obvietnam_custom_category_icon" value="' . esc_attr($icon_class) . '" style="width:100%">';
	echo '<p><a href="https://fontawesome.com/icons?d=gallery&s=solid&m=free" target="_blank">' . __('Xem danh sách icon', 'obvietnam-custom') . '</a></p>';
	echo '<p>' . __('Class background Tailwind (ví dụ: bg-blue-500 p-2 rounded-full)', 'obvietnam-custom') . '</p>';
	echo '<input type="text" name="obvietnam_custom_category_icon_bg" value="' . esc_attr($bg_class) . '" style="width:100%">';

	echo '<p><a href="https://tailwindcss.com/docs/background-color" target="_blank">Tra cứu màu background Tailwind</a></p>';
}
function obvietnam_save_category_icon_meta($post_id) {
	if (!isset($_POST['obvietnam_custom_category_icon_meta_box_nonce']) ||
		!wp_verify_nonce($_POST['obvietnam_custom_category_icon_meta_box_nonce'], 'obvietnam_custom_category_icon_meta_box')) {
		return;
	}

	if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;
	if (!current_user_can('edit_post', $post_id)) return;

	// Save icon
	if (isset($_POST['obvietnam_custom_category_icon'])) {
		update_post_meta(
			$post_id,
			'_category_icon',
			sanitize_text_field($_POST['obvietnam_custom_category_icon'])
		);
	}

	// Save background
	if (isset($_POST['obvietnam_custom_category_icon_bg'])) {
		update_post_meta(
			$post_id,
			'_category_icon_bg',
			sanitize_text_field($_POST['obvietnam_custom_category_icon_bg'])
		);
	}
}
add_action('save_post_category', 'obvietnam_save_category_icon_meta'); // Thay 'category' bằng slug post type
/**
 * Include template functions
 */
require get_template_directory() . '/inc/template-functions.php';

/**
 * Include template tags
 */
require get_template_directory() . '/inc/template-tags.php';

/**
 * Include customizer
 */
require get_template_directory() . '/inc/customizer.php';

/**
 * Include responsive styles
 */
require get_template_directory() . '/inc/responsive-include.php';
