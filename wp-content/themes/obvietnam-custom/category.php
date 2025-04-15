<?php
get_header();

// Lấy category hiện tại đúng cách
$current_category = get_queried_object();
$category_id = isset($current_category->term_id) ? $current_category->term_id : 0;

// Lấy số trang hiện tại
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

// Thiết lập query arguments
$args = [
    'post_type'      => 'post',
    'posts_per_page' => 8,
    'paged'          => $paged,
];

// Thêm category nếu đang xem trang category
if ($category_id) {
    $args['cat'] = $category_id;
}

// Thực hiện custom query
$all_posts = new WP_Query($args);
?>

<main class="site-container mx-auto px-4 py-8">
    <div class="flex flex-col lg:flex-row gap-8">
        <!-- Main News List -->
        <div class="lg:w-2/3">
            <?php get_template_part('template-parts/content', 'news-filters'); ?>

            <?php if ($all_posts->have_posts()) : ?>
                <div class="grid md:grid-cols-2 gap-6">
                    <?php while ($all_posts->have_posts()) : $all_posts->the_post(); ?>
                        <?php get_template_part('template-parts/content', 'news-archive'); ?>
                    <?php endwhile; ?>
                </div>

                <!-- Phần pagination -->
                <div class="mt-10 flex justify-center">
                    <nav class="flex items-center space-x-1">
                        <?php
                        global $wp_query;
                        $temp_query = $wp_query;
                        $wp_query = $all_posts;

                        echo paginate_links([
                            'base'      => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
                            'format'    => '?paged=%#%',
                            'current'   => max(1, $paged),
                            'total'     => $all_posts->max_num_pages,
                            'prev_text' => __('«'),
                            'next_text' => __('»'),
                            'type'      => 'list',
                        ]);

                        $wp_query = $temp_query;
                        ?>
                    </nav>
                </div>
            <?php else : ?>
                <p class="text-gray-600"><?php _e('No news found.', 'textdomain'); ?></p>
            <?php endif; ?>

            <?php wp_reset_postdata(); // Reset query ?>
        </div>

        <!-- Sidebar -->
        <div class="lg:w-1/3">
            <?php get_sidebar('news'); ?>
        </div>
    </div>
</main>

<?php get_footer(); ?>
