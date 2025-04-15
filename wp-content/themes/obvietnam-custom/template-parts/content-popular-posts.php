<div class="bg-white rounded-lg shadow-md p-6 mb-6">
    <h3 class="text-xl font-bold mb-4 pb-2 border-b border-gray-200">
        <i class="fas fa-fire text-red-500 mr-2"></i>
        <?php esc_html_e('Tin nổi bật', 'obvietnam-custom'); ?>
    </h3>
    <div class="space-y-4">
        <?php
        $popular_posts = new WP_Query(array(
            'posts_per_page' => 4,
            'meta_key'       => 'post_views_count',
            'orderby'        => 'meta_value_num',
            'order'          => 'DESC'
        ));

        while ($popular_posts->have_posts()) : $popular_posts->the_post(); ?>
            <div class="flex items-start">
                <div class="flex-shrink-0 mr-3">
                    <?php if (has_post_thumbnail()) : ?>
                        <img src="<?php the_post_thumbnail_url('thumbnail'); ?>" alt="<?php the_title(); ?>" class="w-20 h-20 object-cover rounded">
                    <?php else : ?>
                        <div class="w-20 h-20 rounded"> <img class="rounded" src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/news-placeholder.png'); ?>" alt="<?php the_title_attribute(); ?>"> </div>
                    <?php endif; ?>
                </div>
                <div>
                    <a href="<?php the_permalink(); ?>" class="font-medium text-gray-900 hover:text-primary"><?php the_title(); ?></a>
                    <div class="flex items-center text-xs text-gray-500 mt-1">
                        <span><i class="far fa-calendar-alt mr-1"></i><?php echo get_the_date(); ?></span>
                    </div>
                </div>
            </div>
        <?php endwhile; wp_reset_postdata(); ?>
    </div>
</div>