<?php
/**
 * Product Details Meta Box Callback
 */
function obvietnam_custom_product_details_meta_box_callback($post) {
    wp_nonce_field('obvietnam_custom_product_details_meta_box', 'obvietnam_custom_product_details_meta_box_nonce');

    // Lấy tất cả giá trị hiện có
    $values = get_post_meta($post->ID);
    $price = isset($values['_product_price']) ? esc_attr($values['_product_price'][0]) : '';
    $code = isset($values['_product_code']) ? esc_attr($values['_product_code'][0]) : '';
    $availability = isset($values['_product_availability']) ? esc_attr($values['_product_availability'][0]) : 'Còn hàng';
    $gallery = isset($values['_product_gallery']) ? explode(',', $values['_product_gallery'][0]) : [];
    $features = isset($values['_product_features']) ? unserialize($values['_product_features'][0]) : [];
    $specs = isset($values['_product_specifications']) ? unserialize($values['_product_specifications'][0]) : [];
    $warranty = isset($values['_product_warranty']) ? esc_attr($values['_product_warranty'][0]) : '';
    $badge = isset($values['_product_badge']) ? esc_attr($values['_product_badge'][0]) : '';
    $rating = isset($values['_product_rating']) ? esc_attr($values['_product_rating'][0]) : 0;

    // Danh mục
    $current_terms = wp_get_object_terms($post->ID, 'product_category', array('fields' => 'ids'));
    $categories = get_terms(array(
        'taxonomy' => 'product_category',
        'hide_empty' => false,
    ));

    
    echo '<div class="product-meta-container">';

    // Tab Navigation
    echo '<div class="product-meta-tabs">';
    echo '<button type="button" class="active" data-tab="general">Thông tin chung</button>';
    echo '<button type="button" data-tab="gallery">Thư viện ảnh</button>';
    echo '<button type="button" data-tab="specs">Thông số kỹ thuật</button>';
    echo '</div>';

    // General Tab
    echo '<div class="product-meta-tab active" data-tab="general">';
    echo '<table class="form-table">';

    // Product Code
    echo '<tr>';
    echo '<th><label for="product_code">' . __('Mã sản phẩm', 'obvietnam-custom') . '</label></th>';
    echo '<td><input type="text" name="product_code" value="' . $code . '" class="regular-text"></td>';
    echo '</tr>';

    // Product Price
    echo '<tr>';
    echo '<th><label for="product_price">' . __('Giá sản phẩm', 'obvietnam-custom') . '</label></th>';
    echo '<td><input type="number" name="product_price" value="' . $price . '" step="1000"> VNĐ</td>';
    echo '</tr>';

    // Product Badge
    echo '<tr>';
    echo '<th><label for="product_badge">' . __('Nhãn sản phẩm', 'obvietnam-custom') . '</label></th>';
    echo '<td><input type="text" name="product_badge" value="' . $badge . '" placeholder="Ví dụ: Sản phẩm bán chạy"></td>';
    echo '</tr>';

    // Product Rating
    echo '<tr>';
    echo '<th><label for="product_rating">' . __('Đánh giá', 'obvietnam-custom') . '</label></th>';
    echo '<td><input type="number" name="product_rating" min="0" max="5" step="0.1" value="' . $rating . '"></td>';
    echo '</tr>';

    // Warranty
    echo '<tr>';
    echo '<th><label for="product_warranty">' . __('Bảo hành', 'obvietnam-custom') . '</label></th>';
    echo '<td><input type="text" name="product_warranty" value="' . $warranty . '" placeholder="Ví dụ: Bảo hành 5 năm"></td>';
    echo '</tr>';

    // Availability
    echo '<tr>';
    echo '<th><label for="product_availability">' . __('Tình trạng', 'obvietnam-custom') . '</label></th>';
    echo '<td>';
    echo '<select name="product_availability">';
    echo '<option value="Còn hàng" ' . selected($availability, 'Còn hàng', false) . '>Còn hàng</option>';
    echo '<option value="Hết hàng" ' . selected($availability, 'Hết hàng', false) . '>Hết hàng</option>';
    echo '<option value="Đặt hàng" ' . selected($availability, 'Đặt hàng', false) . '>Đặt hàng</option>';
    echo '</select>';
    echo '</td>';
    echo '</tr>';

    // Product Features
    echo '<tr class="product-features">';
    echo '<th><label>' . __('Tính năng nổi bật', 'obvietnam-custom') . '</label></th>';
    echo '<td>';
    echo '<div class="feature-repeater">';
    foreach ($features as $index => $feature) {
        echo '<div class="feature-group">';
        echo '<input type="text" name="product_features[]" value="' . esc_attr($feature) . '" class="regular-text">';
        echo '<button type="button" class="button remove-feature">×</button>';
        echo '</div>';
    }
    echo '</div>';
    echo '<button type="button" class="button add-feature">Thêm tính năng</button>';
    echo '</td>';
    echo '</tr>';

    // Categories
    echo '<tr>';
    echo '<th><label>' . __('Danh mục', 'obvietnam-custom') . '</label></th>';
    echo '<td>';
    echo '<select name="existing_product_category" style="width:50%">';
    echo '<option value="">-- Chọn danh mục --</option>';
    foreach ($categories as $category) {
        $selected = in_array($category->term_id, $current_terms) ? 'selected' : '';
        echo '<option value="' . $category->term_id . '" ' . $selected . '>' . $category->name . '</option>';
    }
    echo '</select>';
    echo '<br><input type="text" name="new_product_category" placeholder="Thêm danh mục mới" style="margin-top:5px;width:50%">';
    echo '</td>';
    echo '</tr>';

    echo '</table>';
    echo '</div>'; // End General Tab

    // Gallery Tab
    echo '<div class="product-meta-tab" data-tab="gallery">';
    echo '<div class="product-gallery-container">';
    echo '<ul class="product-gallery-images">';
    foreach ($gallery as $image_id) {
        $image_url = wp_get_attachment_image_url($image_id, 'thumbnail');
        echo '<li data-id="' . $image_id . '">';
        echo '<img src="' . $image_url . '">';
        echo '<a href="#" class="remove-image">×</a>';
        echo '</li>';
    }
    echo '</ul>';
    echo '<input type="hidden" name="product_gallery" value="' . implode(',', $gallery) . '">';
    echo '<button type="button" class="button upload-gallery">Thêm ảnh</button>';
    echo '</div>';
    echo '</div>'; // End Gallery Tab

    // Specifications Tab
    echo '<div class="product-meta-tab" data-tab="specs">';
    echo '<div class="spec-repeater">';
// Kiểm tra và hiển thị thông số đã lưu
    if (!empty($specs)) {
        foreach ($specs as $index => $spec) {
            echo '<div class="spec-group">';
            echo '<input type="text" name="spec_labels[]" value="' . esc_attr($spec['label']) . '" placeholder="Nhãn thông số">';
            echo '<input type="text" name="spec_values[]" value="' . esc_attr($spec['value']) . '" placeholder="Giá trị">';
            echo '<button type="button" class="button remove-spec">×</button>';
            echo '</div>';
        }
    } else {
        // Hiển thị 1 group trống mặc định
        echo '<div class="spec-group">';
        echo '<input type="text" name="spec_labels[]" placeholder="Nhãn thông số">';
        echo '<input type="text" name="spec_values[]" placeholder="Giá trị">';
        echo '<button type="button" class="button remove-spec">×</button>';
        echo '</div>';
    }
    echo '</div>';
    echo '<button type="button" class="button add-spec">Thêm thông số</button>';
    echo '</div>'; // End Specifications Tab
    
    echo '</div>'; // End container

    // CSS & JS
    ?>
    <style>
        .product-meta-tabs { margin-bottom: 20px; }
        .product-meta-tabs button {
            padding: 10px 15px;
            background: #f1f1f1;
            border: none;
            cursor: pointer;
        }
        .product-meta-tabs button.active { background: #0073aa; color: white; }
        .product-meta-tab { display: none; }
        .product-meta-tab.active { display: block; }
        .feature-group, .spec-group { margin-bottom: 5px; display: flex; gap: 5px; }
        .product-gallery-images { display: grid; grid-template-columns: repeat(5, 1fr); gap: 10px; }
        .product-gallery-images li { position: relative; }
        .product-gallery-images img { width: 100%; height: 100px; object-fit: cover; }
        .remove-image { position: absolute; top: 0; right: 0; background: red; color: white; padding: 2px 5px; }
    </style>

    <script>
        jQuery(document).ready(function($) {
            // Tab switching
            $('.product-meta-tabs button').click(function() {
                $('.product-meta-tabs button').removeClass('active');
                $(this).addClass('active');
                $('.product-meta-tab').removeClass('active');
                $('[data-tab="' + $(this).data('tab') + '"]').addClass('active');
            });

            // Add features
            $('.add-feature').click(function() {
                $('.feature-repeater').append(`
                <div class="feature-group">
                    <input type="text" name="product_features[]" class="regular-text">
                    <button type="button" class="button remove-feature">×</button>
                </div>
            `);
            });

            // Remove features
            $('.feature-repeater').on('click', '.remove-feature', function() {
                $(this).closest('.feature-group').remove();
            });

            $('.add-spec').click(function() {
                $('.spec-repeater').append(`
        <div class="spec-group">
            <input type="text" name="spec_labels[]" placeholder="Nhãn thông số">
            <input type="text" name="spec_values[]" placeholder="Giá trị">
            <button type="button" class="button remove-spec">×</button>
        </div>
    `);
            });

            // Remove specs
            $('.spec-repeater').on('click', '.remove-spec', function() {
                $(this).closest('.spec-group').remove();
            });
            // Gallery uploader
            $('.upload-gallery').click(function(e) {
                e.preventDefault();
                const frame = wp.media({
                    title: 'Chọn ảnh',
                    multiple: true,
                    library: { type: 'image' }
                });

                frame.on('select', function() {
                    const attachments = frame.state().get('selection').map(att => att.toJSON());
                    const ids = attachments.map(att => att.id);
                    $('input[name="product_gallery"]').val(ids.join(','));

                    const galleryHtml = attachments.map(att => `
                    <li data-id="${att.id}">
                        <img src="${att.sizes.thumbnail.url}">
                        <a href="#" class="remove-image">×</a>
                    </li>
                `).join('');

                    $('.product-gallery-images').html(galleryHtml);
                });

                frame.open();
            });

            // Remove gallery image
            $('.product-gallery-images').on('click', '.remove-image', function(e) {
                e.preventDefault();
                const id = $(this).closest('li').data('id');
                const currentIds = $('input[name="product_gallery"]').val().split(',').filter(existingId => existingId != id);
                $('input[name="product_gallery"]').val(currentIds.join(','));
                $(this).closest('li').remove();
            });

            // Initialize select2
            $('.related-products-select').select2();
        });
    </script>
    <?php
}

function obvietnam_custom_save_product_details($post_id) {
    // Kiểm tra nonce
    if (!isset($_POST['obvietnam_custom_product_details_meta_box_nonce']) ||
        !wp_verify_nonce($_POST['obvietnam_custom_product_details_meta_box_nonce'], 'obvietnam_custom_product_details_meta_box')) {
        return;
    }

    // Kiểm tra autosave
    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

    // Kiểm tra quyền user
    if (!current_user_can('edit_post', $post_id)) return;

    // Xử lý từng trường dữ liệu
    $fields_to_save = [
        'product_code' => '_product_code',
        'product_price' => '_product_price',
        'product_availability' => '_product_availability',
        'product_badge' => '_product_badge',
        'product_warranty' => '_product_warranty',
        'product_rating' => '_product_rating',
//        'product_gallery' => '_product_gallery'
    ];

    // Lưu các trường đơn giản
    foreach ($fields_to_save as $field => $meta_key) {
        if (isset($_POST[$field])) {
            $value = sanitize_text_field($_POST[$field]);
            update_post_meta($post_id, $meta_key, $value);
        }
    }

    // Xử lý gallery
    if (isset($_POST['product_gallery'])) {
        $gallery_ids = array_filter(explode(',', $_POST['product_gallery']));
        $gallery_ids = array_map('intval', $gallery_ids);
        update_post_meta($post_id, '_product_gallery', implode(',', $gallery_ids));
    }

    // Xử lý tính năng nổi bật
    $features = [];
    if (isset($_POST['product_features']) && is_array($_POST['product_features'])) {
        $features = array_map('sanitize_text_field', $_POST['product_features']);
        $features = array_filter($features);
    }
    update_post_meta($post_id, '_product_features', $features);

    // Xử lý thông số kỹ thuật
    $specifications = [];
    if (isset($_POST['spec_labels']) && isset($_POST['spec_values'])) {
        $labels = array_map('sanitize_text_field', $_POST['spec_labels']);
        $values = array_map('sanitize_text_field', $_POST['spec_values']);

        foreach ($labels as $index => $label) {
            if (!empty($label) && !empty($values[$index])) {
                $specifications[] = [
                    'label' => $label,
                    'value' => $values[$index]
                ];
            }
        }
    }
    update_post_meta($post_id, '_product_specifications', $specifications);
    
    // Xử lý danh mục
    $taxonomy = 'product_category';
    $terms = [];

    // Thêm danh mục mới
    if (!empty($_POST['new_product_category'])) {
        $new_term = wp_insert_term(
            sanitize_text_field($_POST['new_product_category']),
            $taxonomy
        );

        if (!is_wp_error($new_term)) {
            $terms[] = $new_term['term_id'];
        }
    }

    // Thêm danh mục đã chọn
    if (!empty($_POST['existing_product_category'])) {
        $terms[] = intval($_POST['existing_product_category']);
    }

    // Cập nhật danh mục
    if (!empty($terms)) {
        wp_set_object_terms($post_id, $terms, $taxonomy, false);
    }
}
add_action('save_post_products', 'obvietnam_custom_save_product_details');