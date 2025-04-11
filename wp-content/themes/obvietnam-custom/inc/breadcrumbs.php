<?php
function custom_breadcrumbs() {
    echo '<div class="mx-auto px-4 py-4 bg-gray-100" >';
    echo '<nav class="mx-auto flex flex-wrap md:flex-nowrap gap-8 site-container" aria-label="Breadcrumb">';
    echo '<ol class="inline-flex items-center space-x-1 md:space-x-2 px-4">';

    // Trang chủ - Luôn hiển thị
    echo '<li class="inline-flex items-center">';
    echo '<a href="' . home_url() . '" class="inline-flex text-sm font-medium text-gray-500 hover:text-blue-600">';
    echo '<svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 20 20"><path d="M10.707 2.293a1 1 0 00-1.414 0l-7 7a1 1 0 001.414 1.414L4 10.414V17a1 1 0 001 1h2a1 1 0 001-1v-2a1 1 0 011-1h2a1 1 0 011 1v2a1 1 0 001 1h2a1 1 0 001-1v-6.586l.293.293a1 1 0 001.414-1.414l-7-7z"></path></svg>';
    echo 'Trang chủ';
    echo '</a>';
    echo '</li>';

    // Xử lý các loại trang
    if (is_category() || is_tag()) {
        // Archive page
        $current_term = get_queried_object();
        echo '<li aria-current="page">';
        echo '<div class="flex items-center">';
        echo '<svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>';
        echo '<span class="ml-2 text-sm font-medium text-gray-700">' . $current_term->name . '</span>';
        echo '</div>';
        echo '</li>';
    } elseif (is_singular('products')) {
        $terms = wp_get_post_terms(get_the_ID(), 'product_category', array('orderby' => 'parent', 'order' => 'DESC')); // Thay 'product_cat' bằng taxonomy

        if (!empty($terms)) {
            $main_term = $terms[0];

            // Lấy URL archive của post type 'products'
            $base_url = get_post_type_archive_link('products');

            // Hiển thị parent terms
            if ($main_term->parent) {
                $ancestors = get_ancestors($main_term->term_id, 'product_category');
                $ancestors = array_reverse($ancestors);

                foreach ($ancestors as $ancestor) {
                    $term = get_term($ancestor);
                    // Tạo URL kết hợp post_type và taxonomy
                    $term_url = add_query_arg(
                        'product_category',
                        $term->slug,
                        $base_url
                    );
                    echo '<li>';
                    echo '<div class="flex items-center">';
                    echo '<svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>';
                    echo '<a href="' . esc_url($term_url) . '" class="ml-2 text-sm font-medium text-gray-500 hover:text-blue-600">' . $term->name . '</a>';
                    echo '</div>';
                    echo '</li>';
                }
            }

            // Hiển thị main term
            $main_term_url = add_query_arg(
                'product_category',
                $main_term->slug,
                $base_url
            );
            echo '<li>';
            echo '<div class="flex items-center">';
            echo '<svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>';
            echo '<a href="' . esc_url($main_term_url) . '" class="ml-2 text-sm font-medium text-gray-500 hover:text-blue-600">' . $main_term->name . '</a>';
            echo '</div>';
            echo '</li>';
        }

// Product hiện tại
        echo '<li aria-current="page">';
        echo '<div class="flex items-center">';
        echo '<svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>';
        echo '<span class="ml-2 text-sm font-medium text-gray-700">' . get_the_title() . '</span>';
        echo '</div>';
        echo '</li>';
    } elseif (is_page()) {
        // Trang thường
        global $post;

        if ($post->post_parent) {
            // Xử lý trang có cha
            $ancestors = array_reverse(get_post_ancestors($post));
            foreach ($ancestors as $ancestor) {
                echo '<li>';
                echo '<div class="flex items-center">';
                echo '<svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>';
                echo '<a href="' . get_permalink($ancestor) . '" class="ml-2 text-sm font-medium text-gray-500 hover:text-blue-600">' . get_the_title($ancestor) . '</a>';
                echo '</div>';
                echo '</li>';
            }
        }

        // Hiển thị trang hiện tại
        echo '<li aria-current="page">';
        echo '<div class="flex items-center">';
        echo '<svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>';
        echo '<span class="ml-2 text-sm font-medium text-gray-700">' . get_the_title() . '</span>';
        echo '</div>';
        echo '</li>';
    } elseif (is_single()) {
        // Bài viết blog
        $categories = get_the_category();
        if (!empty($categories)) {
            echo '<li>';
            echo '<div class="flex items-center">';
            echo '<svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>';
            echo '<a href="' . get_category_link($categories[0]->term_id) . '" class="ml-2 text-sm font-medium text-gray-500 hover:text-blue-600">' . $categories[0]->name . '</a>';
            echo '</div>';
            echo '</li>';
        }

        // Bài viết hiện tại
        echo '<li aria-current="page">';
        echo '<div class="flex items-center">';
        echo '<svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>';
        echo '<span class="ml-2 text-sm font-medium text-gray-700">' . get_the_title() . '</span>';
        echo '</div>';
        echo '</li>';
    } else {
        // Các trường hợp khác
        echo '<li aria-current="page">';
        echo '<div class="flex items-center">';
        echo '<svg class="w-5 h-5 text-gray-400" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>';
        echo '<span class="ml-2 text-sm font-medium text-gray-700">' . get_the_title() . '</span>';
        echo '</div>';
        echo '</li>';
    }

    echo '</ol>';
    echo '</nav>';
    echo '</div>';
}