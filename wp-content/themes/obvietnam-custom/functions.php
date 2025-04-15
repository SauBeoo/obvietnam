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

// Đăng ký menu mobile
function register_mobile_menu() {
    register_nav_menus(array(
        'mobile-menu' => __('Mobile Menu', 'text-domain')
    ));
}
add_action('init', 'register_mobile_menu');

class Mobile_Menu_Walker extends Walker_Nav_Menu {
    public function start_el(&$output, $item, $depth = 0, $args = null, $id = 0) {
        // Map icon và màu sắc
        $icon_map = [
            'trang-chu' => 'fa-home',
            'san-pham' => 'fa-box-open',
            'dich-vu' => 'fa-concierge-bell',
            'gioi-thieu' => 'fa-info-circle',
            'lien-he' => 'fa-envelope',
            'trang-mau' => 'fa-file-alt'
        ];

        $slug = sanitize_title($item->title);
        $icon = $icon_map[$slug] ?? 'fa-circle';

        // Kiểm tra URL hiện tại
        $current_url = home_url($_SERVER['REQUEST_URI']);
        $is_active = untrailingslashit($current_url) === untrailingslashit($item->url);

        // Class động
        $link_class = $is_active
            ? 'bg-primary bg-opacity-5 text-primary'
            : 'hover:bg-gray-100 text-gray-700';

        $output .= '<li class="nav-item">';
        $output .= sprintf(
            '<a href="%s" class="flex items-center px-4 py-3 rounded-lg font-medium %s">',
            esc_url($item->url),
            esc_attr($link_class)
        );

        // Icon container
        $icon_bg = $is_active
            ? 'bg-primary bg-opacity-10'
            : 'bg-' . $this->get_color_class($slug) . '-100';

        $output .= sprintf(
            '<div class="w-8 h-8 rounded-full %s flex items-center justify-center mr-3">',
            $icon_bg
        );

        // Icon
        $icon_color = $is_active
            ? 'text-primary'
            : 'text-' . $this->get_color_class($slug) . '-500';

        $output .= sprintf(
            '<i class="fas %s %s"></i>',
            $icon,
            $icon_color
        );
        $output .= '</div>';

        // Tiêu đề menu
        $output .= '<span>' . $item->title . '</span>';

        // Icon mũi tên
        $output .= '<i class="fas fa-chevron-right ml-auto text-gray-400 text-sm"></i>';
        $output .= '</a></li>';
    }

    private function get_color_class($slug) {
        $color_map = [
            'trang-chu' => 'primary',
            'san-pham' => 'blue',
            'dich-vu' => 'green',
            'gioi-thieu' => 'purple',
            'lien-he' => 'yellow',
            'trang-mau' => 'red'
        ];
        return $color_map[$slug] ?? 'gray';
    }
}

// Thêm file mobile-menu vào footer
function add_mobile_menu() {
    get_template_part('template-parts/content', 'mobile-menu');
}
add_action('wp_footer', 'add_mobile_menu');
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

    // Jquery JS
    wp_enqueue_script( 'obvietnam-custom-jquery', get_template_directory_uri() . '/js/jquery-1.11.0.min.js', array('jquery'), _S_VERSION, true );

    // Jquery Migrate JS
    wp_enqueue_script( 'obvietnam-custom-jquery-migrate', get_template_directory_uri() . '/js/jquery-migrate-1.2.1.min.js', array('jquery'), _S_VERSION, true );

	// Navigation JS
	wp_enqueue_script( 'obvietnam-custom-navigation', get_template_directory_uri() . '/js/navigation.js', array('jquery'), _S_VERSION, true );

    // Slider Min JS
    wp_enqueue_script( 'obvietnam-custom-slick', get_template_directory_uri() . '/js/slick.min.js', array('jquery'), _S_VERSION, true );

	// Slider JS
	wp_enqueue_script( 'obvietnam-custom-slider', get_template_directory_uri() . '/js/slider.js', array('jquery'), _S_VERSION, true );

	//Search 
	wp_enqueue_script('obvietnam-search', get_template_directory_uri() . '/js/search.js', array(), '1.0', true);
	wp_localize_script('obvietnam-search', 'obvietnam_ajax', array(
		'ajax_url' => admin_url('admin-ajax.php')
	));
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
    // Helper function to create post type labels
    function obvietnam_create_post_type_labels($singular, $plural, $text_domain = 'obvietnam-custom') {
        return array(
            'name'                  => _x( $plural, 'Post type general name', $text_domain ),
            'singular_name'         => _x( $singular, 'Post type singular name', $text_domain ),
            'menu_name'             => _x( $plural, 'Admin Menu text', $text_domain ),
            'name_admin_bar'        => _x( $singular, 'Add New on Toolbar', $text_domain ),
            'add_new'               => __( 'Thêm mới', $text_domain ),
            'add_new_item'          => __( "Thêm {$singular} mới", $text_domain ),
            'new_item'              => __( "{$singular} mới", $text_domain ),
            'edit_item'             => __( "Sửa {$singular}", $text_domain ),
            'view_item'             => __( "Xem {$singular}", $text_domain ),
            'all_items'             => __( "Tất cả {$plural}", $text_domain ),
            'search_items'          => __( "Tìm {$singular}", $text_domain ),
            'parent_item_colon'     => isset($parent) ? __( "{$singular} cha:", $text_domain ) : null,
            'not_found'             => __( "Không tìm thấy {$singular}.", $text_domain ),
            'not_found_in_trash'    => __( "Không tìm thấy {$singular} trong thùng rác.", $text_domain ),
            'featured_image'        => __( "Hình ảnh {$singular}", $text_domain ),
            'set_featured_image'    => __( "Đặt hình ảnh {$singular}", $text_domain ),
            'remove_featured_image' => __( "Xóa hình ảnh {$singular}", $text_domain ),
            'use_featured_image'    => __( "Sử dụng làm hình ảnh {$singular}", $text_domain ),
            'archives'              => __( "Lưu trữ {$singular}", $text_domain ),
            'insert_into_item'      => __( "Chèn vào {$singular}", $text_domain ),
            'uploaded_to_this_item' => __( "Đã tải lên {$singular} này", $text_domain ),
            'filter_items_list'     => __( "Lọc danh sách {$plural}", $text_domain ),
            'items_list_navigation' => __( "Điều hướng danh sách {$plural}", $text_domain ),
            'items_list'            => __( "Danh sách {$plural}", $text_domain ),
        );
    }

    /**
     * Register a custom post type
     * 
     * @param string $post_type The post type key
     * @param string $singular Singular name
     * @param string $plural Plural name
     * @param string $slug URL slug
     * @param array $args Additional arguments
     * @param array $label_overrides Override specific labels
     */
    function obvietnam_register_post_type($post_type, $singular, $plural, $slug, $args = array(), $label_overrides = array()) {
        $labels = obvietnam_create_post_type_labels($singular, $plural);
        
        // Apply any label overrides
        if (!empty($label_overrides)) {
            $labels = array_merge($labels, $label_overrides);
        }
        
        $defaults = array(
            'labels'             => $labels,
            'public'             => true,
            'publicly_queryable' => true,
            'show_ui'            => true,
            'show_in_menu'       => true,
            'query_var'          => true,
            'rewrite'            => array('slug' => $slug),
            'capability_type'    => 'post',
            'has_archive'        => true,
            'hierarchical'       => false,
            'supports'           => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields'),
            'show_in_rest'       => true,
        );
        
        $args = array_merge($defaults, $args);
        register_post_type($post_type, $args);
    }

    // Services Post Type
    obvietnam_register_post_type(
        'services',
        'Dịch vụ',
        'Dịch vụ',
        'dich-vu',
        array(
            'menu_position' => 20,
            'menu_icon'     => 'dashicons-cart',
        )
    );

    // Products Post Type
    obvietnam_register_post_type(
        'products',
        'Sản phẩm',
        'Sản phẩm',
        'san-pham',
        array(
            'menu_position' => 21,
            'menu_icon'     => 'dashicons-products',
        )
    );

    // Clients Post Type
    obvietnam_register_post_type(
        'clients',
        'Khách hàng',
        'Khách hàng',
        'khach-hang',
        array(
            'publicly_queryable' => false,
            'has_archive'        => false,
            'menu_position'      => 22,
            'menu_icon'          => 'dashicons-businessperson',
            'supports'           => array('title', 'thumbnail', 'custom-fields'),
        ),
        array(
            'featured_image'        => __('Logo khách hàng', 'obvietnam-custom'),
            'set_featured_image'    => __('Đặt logo khách hàng', 'obvietnam-custom'),
            'remove_featured_image' => __('Xóa logo khách hàng', 'obvietnam-custom'),
            'use_featured_image'    => __('Sử dụng làm logo khách hàng', 'obvietnam-custom'),
        )
    );

    // Supply Chain Solutions Post Type
    obvietnam_register_post_type(
        'solutions',
        'Giải pháp',
        'Giải pháp',
        'giai-phap',
        array(
            'menu_position' => 23,
            'menu_icon'     => 'dashicons-networking',
        )
    );
    
    // Benefits Post Type
    obvietnam_register_post_type(
        'benefits',
        'Lợi ích',
        'Lợi ích',
        'loi-ich',
        array(
            'publicly_queryable' => false,
            'has_archive'        => false,
            'menu_position'      => 24,
            'menu_icon'          => 'dashicons-awards',
            'supports'           => array('title', 'editor', 'custom-fields'),
        )
    );

    // Category Post Type
    obvietnam_register_post_type(
        'category-ob',
        'Danh mục OB',
        'Danh mục OB',
        'danh-muc-ob',
        array(
            'publicly_queryable' => false,
            'has_archive'        => false,
            'menu_position'      => 25,
            'menu_icon'          => 'dashicons-category',
            'supports'           => array('title', 'editor', 'custom-fields'),
        )
    );
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
		'category-ob',
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

	register_term_meta('product_category', 'icon_class', array(
		'type' => 'string',
		'description' => 'FontAwesome Icon Class',
		'single' => true,
		'show_in_rest' => true,
	));
}
add_action( 'init', 'obvietnam_register_product_taxonomy' );


// 2. Thêm trường nhập icon khi THÊM term mới
function obvietnam_add_icon_class_field() {
	?>
	<div class="form-field term-icon-class-wrap">
		<label for="product_category_icon_class"><?php _e('FontAwesome Icon Class'); ?></label>
		<input type="text" name="product_category_icon_class" id="product_category_icon_class" value="">
		<p class="description"><?php _e('Nhập class icon từ FontAwesome, ví dụ: fas fa-truck'); ?></p>
	</div>
	<?php
}
add_action('product_category_add_form_fields', 'obvietnam_add_icon_class_field');

// 3. Thêm trường nhập icon khi SỬA term
function obvietnam_edit_icon_class_field($term) {
	$icon_class = get_term_meta($term->term_id, 'icon_class', true);
	?>
	<tr class="form-field term-icon-class-wrap">
		<th scope="row">
			<label for="product_category_icon_class"><?php _e('FontAwesome Icon Class'); ?></label>
		</th>
		<td>
			<input type="text" name="product_category_icon_class" id="product_category_icon_class" value="<?php echo esc_attr($icon_class); ?>">
			<p class="description"><?php _e('Nhập class icon từ FontAwesome, ví dụ: fas fa-truck'); ?></p>
		</td>
	</tr>
	<?php
}
add_action('product_category_edit_form_fields', 'obvietnam_edit_icon_class_field');

// 4. Lưu dữ liệu từ trường icon
function obvietnam_save_icon_class($term_id) {
	if (!isset($_POST['product_category_icon_class']) || !current_user_can('manage_categories')) {
		return;
	}

	update_term_meta(
		$term_id,
		'icon_class',
		sanitize_text_field($_POST['product_category_icon_class'])
	);
}
add_action('created_product_category', 'obvietnam_save_icon_class');
add_action('edited_product_category', 'obvietnam_save_icon_class');

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
function obvietnam_custom_save_meta_box_data($post_id) {
    // Define meta box configurations
    $meta_boxes = array(
        // Service Icon
        array(
            'nonce_name' => 'obvietnam_custom_service_icon_meta_box_nonce',
            'nonce_action' => 'obvietnam_custom_service_icon_meta_box',
            'fields' => array(
                array(
                    'post_field' => 'obvietnam_custom_service_icon',
                    'meta_key' => '_service_icon'
                )
            )
        ),
        // Product Details
        array(
            'nonce_name' => 'obvietnam_custom_product_details_meta_box_nonce',
            'nonce_action' => 'obvietnam_custom_product_details_meta_box',
            'fields' => array(
                array(
                    'post_field' => 'obvietnam_custom_product_price',
                    'meta_key' => '_product_price'
                ),
                array(
                    'post_field' => 'obvietnam_custom_product_code',
                    'meta_key' => '_product_code'
                ),
                array(
                    'post_field' => 'obvietnam_custom_product_availability',
                    'meta_key' => '_product_availability'
                )
            )
        ),
        // Solution Icon
        array(
            'nonce_name' => 'obvietnam_custom_solution_icon_meta_box_nonce',
            'nonce_action' => 'obvietnam_custom_solution_icon_meta_box',
            'fields' => array(
                array(
                    'post_field' => 'obvietnam_custom_solution_icon',
                    'meta_key' => '_solution_icon'
                )
            )
        ),
        // Solution Features
        array(
            'nonce_name' => 'obvietnam_custom_solution_features_meta_box_nonce',
            'nonce_action' => 'obvietnam_custom_solution_features_meta_box',
            'fields' => array(
                array(
                    'post_field' => 'obvietnam_custom_solution_features',
                    'meta_key' => '_solution_features',
                    'is_array' => true
                )
            )
        ),
        // Benefit Icon
        array(
            'nonce_name' => 'obvietnam_custom_benefit_icon_meta_box_nonce',
            'nonce_action' => 'obvietnam_custom_benefit_icon_meta_box',
            'fields' => array(
                array(
                    'post_field' => 'obvietnam_custom_benefit_icon',
                    'meta_key' => '_benefit_icon'
                )
            )
        ),
        // Category Icon
        array(
            'nonce_name' => 'obvietnam_custom_category_icon_meta_box_nonce',
            'nonce_action' => 'obvietnam_custom_category_icon_meta_box',
            'fields' => array(
                array(
                    'post_field' => 'obvietnam_custom_category_icon',
                    'meta_key' => '_category_icon'
                ),
                array(
                    'post_field' => 'obvietnam_custom_category_icon_bg',
                    'meta_key' => '_category_icon_bg'
                )
            )
        )
    );

    // Process each meta box
    foreach ($meta_boxes as $meta_box) {
        // Check if nonce exists and is valid
        if (!isset($_POST[$meta_box['nonce_name']]) || 
            !wp_verify_nonce($_POST[$meta_box['nonce_name']], $meta_box['nonce_action'])) {
            continue;
        }
        
        // Skip if doing autosave
        if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) {
            continue;
        }
        
        // Check user permissions
        if (!current_user_can('edit_post', $post_id)) {
            continue;
        }
        
        // Process each field in the meta box
        foreach ($meta_box['fields'] as $field) {
            if (isset($_POST[$field['post_field']])) {
                if (isset($field['is_array']) && $field['is_array']) {
                    // Handle array fields (like solution features)
                    $values = array_map('sanitize_text_field', $_POST[$field['post_field']]);
                    $values = array_filter($values); // Remove empty values
                    update_post_meta($post_id, $field['meta_key'], $values);
                } else {
                    // Handle single value fields
                    update_post_meta($post_id, $field['meta_key'], sanitize_text_field($_POST[$field['post_field']]));
                }
            }
        }
    }
}
add_action('save_post', 'obvietnam_custom_save_meta_box_data');

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
    echo "<link rel='stylesheet' id='theme-style-slick' href='" . get_stylesheet_directory_uri() . '/css/slick.css?v=' . filemtime(get_stylesheet_directory() . '/css/slick.css') . "' type='text/css' media='all' />";
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

function modify_products_query($query)
{
	if (!is_admin() && $query->is_main_query() && is_post_type_archive('products')) {
		// Số sản phẩm mỗi trang
		$query->set('posts_per_page', 1);

		// Tham số sắp xếp
		$order = isset($_GET['order']) ? $_GET['order'] : 'DESC';
		$query->set('orderby', 'date');
		$query->set('order', $order);

		// Lọc theo danh mục
		if (isset($_GET['product_category'])) {
			$tax_query = array(
				array(
					'taxonomy' => 'product_category',
					'field' => 'slug',
					'terms' => sanitize_text_field($_GET['product_category'])
				)
			);
			$query->set('tax_query', $tax_query);
		}
	}
}

add_action('pre_get_posts', 'modify_products_query');

// Đăng ký sidebar
function theme_sidebars() {
	register_sidebar([
		'name'          => 'News Sidebar',
		'id'            => 'news-sidebar',
		'before_widget' => '<div class="bg-white rounded-lg shadow p-5 mb-6">',
		'after_widget'  => '</div>',
		'before_title'  => '<h2 class="text-lg font-semibold mb-4 text-gray-800 border-b pb-2">',
		'after_title'   => '</h2>',
	]);
}
add_action('widgets_init', 'theme_sidebars');

//// Trong functions.php
//function custom_news_query($query) {
//	if ($query->is_main_query() && is_post_type_archive('post')) {
//		$query->set('posts_per_page', 2);
//		$query->set('orderby', 'date');
//		$query->set('order', 'DESC');
//	}
//}
//add_action('pre_get_posts', 'custom_news_query');

// Thêm class active cho menu
add_filter('nav_menu_css_class', function($classes, $item) {
	if (is_page('tin-tuc') && $item->title === 'Tin tức') {
		$classes[] = 'current-menu-item';
	}
	return $classes;
}, 10, 2);

// Log lỗi phân trang
add_action('pre_get_posts', function($query) {
	if ($query->is_main_query() && $query->is_category()) {
		error_log('Category Query Args: ' . print_r($query->query_vars, true));
	}
});
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

require get_template_directory() . '/inc/category-functions.php';

require get_template_directory() . '/inc/product_search.php';

require get_template_directory() . '/inc/product-single-page.php';

require get_template_directory() . '/inc/breadcrumbs.php';

require get_template_directory() . '/inc/single.php';
