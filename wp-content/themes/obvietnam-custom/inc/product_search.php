<?php
// Thêm AJAX handler cho search suggestions
add_action('wp_ajax_product_search', 'product_search_callback');
add_action('wp_ajax_nopriv_product_search', 'product_search_callback');

function product_search_callback() {
    global $wpdb;

    if (empty($_GET['s'])) {
        echo '<div class="p-4 text-center text-gray-500">' . esc_html__('Vui lòng nhập từ khóa tìm kiếm', 'obvietnam-custom') . '</div>';
        die();
    }

    $search_term = sanitize_text_field($_GET['s']);

    $search_term_normalized = trim($search_term);
    $search_term_normalized = mb_strtolower($search_term_normalized, 'UTF-8');

    $like_pattern_anywhere = '%' . $wpdb->esc_like($search_term_normalized) . '%';
    $like_pattern_start = $wpdb->esc_like($search_term_normalized) . '%';

    $posts_table = $wpdb->posts;

    $query = $wpdb->prepare(
        "
        SELECT *
        FROM $posts_table
        WHERE post_type = 'products'
        AND post_status = 'publish'
        AND post_title LIKE %s -- Bỏ LOWER(), dựa vào collation của DB
        ORDER BY
            (post_title LIKE %s) DESC, -- Ưu tiên tiêu đề BẮT ĐẦU bằng từ khóa
            post_title ASC             -- Sắp xếp thứ cấp theo Alphabet
        LIMIT 6
        ",
        $like_pattern_anywhere, // Cho điều kiện WHERE
        $like_pattern_start    // Cho điều kiện ORDER BY (ưu tiên bắt đầu)
    );

    $products = $wpdb->get_results($query);

    ob_start(); // Bắt đầu bộ đệm đầu ra

    if (!empty($products)) {
        // Khai báo global $post để setup_postdata hoạt động đúng
        global $post;
        foreach ($products as $post) { // Gán kết quả vào $post toàn cục
            setup_postdata($post); // Thiết lập dữ liệu post toàn cục để dùng các template tags
            ?>
            <a href="<?php echo esc_url(get_permalink()); // Dùng get_permalink() sau setup_postdata ?>" class="flex items-center p-3 hover:bg-gray-50 transition-colors gap-4">
                <div class="w-16 h-16 flex-shrink-0">
                    <?php if (has_post_thumbnail()) : // Dùng has_post_thumbnail() ?>
                        <img class="w-full h-full object-cover rounded-lg"
                             src="<?= esc_url(get_the_post_thumbnail_url(get_the_ID(), 'thumbnail')) // Dùng get_the_ID() ?>"
                             alt="<?php echo esc_attr(get_the_title()); // Dùng get_the_title() ?>">
                    <?php else : ?>
                        <div class="w-full h-full bg-gray-100 rounded-lg flex items-center justify-center text-gray-400">
                           <span class="text-xs">No img</span> <!-- Hoặc để trống -->
                        </div>
                    <?php endif; ?>
                </div>
                <div class="flex-grow">
                    <h3 class="text-base font-medium text-gray-900 mb-1"><?php echo esc_html(get_the_title()); // Dùng get_the_title() và esc_html ?></h3>
                    <?php
                       // Optional: Hiển thị giá hoặc thông tin khác nếu cần
                       // Ví dụ: $product_obj = wc_get_product(get_the_ID());
                       // if ($product_obj) { echo '<p class="text-sm text-gray-600">' . $product_obj->get_price_html() . '</p>'; }
                    ?>
                </div>
            </a>
            <?php
        }
        wp_reset_postdata(); // Quan trọng: Khôi phục lại $post toàn cục ban đầu
    } else {
        // Sử dụng esc_html__ để đảm bảo dịch và thoát HTML an toàn
        echo '<div class="p-4 text-center text-gray-500">' . esc_html__('Không tìm thấy sản phẩm phù hợp', 'obvietnam-custom') . '</div>';
    }

    echo ob_get_clean(); // Lấy nội dung bộ đệm và xóa nó
    die(); // Kết thúc AJAX request
}
function obvietnam_search_filter($query) {
    if ($query->is_search && !is_admin() && empty($_GET['s'])) {
        $query->set('post_type', 'products');
    }
}
add_action('pre_get_posts', 'obvietnam_search_filter');
?>
