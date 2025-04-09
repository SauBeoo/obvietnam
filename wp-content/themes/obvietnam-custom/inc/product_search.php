<?php
// Thêm AJAX handler cho search suggestions
add_action('wp_ajax_product_search', 'product_search_callback');
add_action('wp_ajax_nopriv_product_search', 'product_search_callback');

function product_search_callback() {
    $search_term = sanitize_text_field($_GET['s']);

    $args = [
        'post_type' => 'products',
        'posts_per_page' => 8,
        's' => $search_term,
        'meta_query' => [
            [
                'key' => '_stock_status',
                'value' => 'instock'
            ]
        ]
    ];

    if (!empty($_GET['category'])) {
        $args['tax_query'] = [
            [
                'taxonomy' => 'product_category',
                'field' => 'slug',
                'terms' => sanitize_text_field($_GET['category'])
            ]
        ];
    }

    $query = new WP_Query($args);

    ob_start();

    if ($query->have_posts()) {
        while ($query->have_posts()) : $query->the_post();
            global $product;
            ?>
            <a href="<?php the_permalink(); ?>" class="flex items-center p-3 hover:bg-gray-50 transition-colors gap-4">
                <div class="w-16 h-16 flex-shrink-0">
                    <?php echo $product->get_image('woocommerce_thumbnail', ['class' => 'w-full h-full object-cover rounded-lg']); ?>
                </div>
                <div class="flex-grow">
                    <h3 class="text-base font-medium text-gray-900 mb-1"><?php the_title(); ?></h3>
                    <div class="text-sm text-primary"><?php echo $product->get_price_html(); ?></div>
                    <?php if ($product->is_in_stock()) : ?>
                        <span class="inline-block mt-1 text-xs px-2 py-1 bg-green-100 text-green-800 rounded-full"><?php _e('Còn hàng', 'obvietnam-custom'); ?></span>
                    <?php else : ?>
                        <span class="inline-block mt-1 text-xs px-2 py-1 bg-red-100 text-red-800 rounded-full"><?php _e('Hết hàng', 'obvietnam-custom'); ?></span>
                    <?php endif; ?>
                </div>
            </a>
        <?php
        endwhile;
    } else {
        echo '<div class="p-4 text-center text-gray-500">'.__('Không tìm thấy sản phẩm phù hợp', 'obvietnam-custom').'</div>';
    }

    wp_reset_postdata();

    $output = ob_get_clean();
    echo $output;
    die();
}
