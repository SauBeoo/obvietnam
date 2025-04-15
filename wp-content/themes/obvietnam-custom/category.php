<?php
/**
 * Template Name: News Archive
 * Template Post Type: post, page
 */

get_header();
$paged = (get_query_var('paged')) ? get_query_var('paged') : 1;

// Lấy category hiện tại
$current_category = get_queried_object();

global $wp_query;
$current_cat = get_queried_object();

// Thêm điều kiện nếu đang xem category cụ thể
if ($current_category instanceof WP_Term && $current_category->taxonomy === 'category') {
    $args['cat'] = $current_category->term_id;
}

$all_posts = new WP_Query($args);
?>

    <main class="container mx-auto px-4 py-8">
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Main News List -->
            <div class="lg:w-2/3">
                <?php get_template_part('template-parts/content', 'news-filters'); ?>

                <?php  if (have_posts())  : ?>
                    <div class="grid md:grid-cols-2 gap-6">
                        <?php while (have_posts()) : the_post(); ?>
                            <?php get_template_part('template-parts/content', 'news-archive'); ?>
                        <?php endwhile; ?>
                    </div>

                    <!-- Sửa phần pagination -->
                    <div class="mt-10 flex justify-center">
                        <nav class="flex items-center space-x-1">
                            <?php
                            $big = 999999999;
                            echo paginate_links([
                                'base'      => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
                                'current'   => max(1, get_query_var('paged')),
                                'total'     => $wp_query->max_num_pages,
                                'prev_text' => __('«'),
                                'next_text' => __('»'),
                                'type'    => 'list',
                            ]);

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