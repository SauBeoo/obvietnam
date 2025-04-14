<!-- Popular Posts -->
<div class="bg-white rounded-lg shadow-md p-6 mb-6">
    <h3 class="text-xl font-bold mb-4 pb-2 border-b border-gray-200"><?php esc_html_e('Tin nổi bật', 'obvietnam-custom'); ?></h3>
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
                        <div class="w-20 h-20 bg-gray-200 rounded"></div>
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

<!-- Categories -->
<div class="bg-white rounded-lg shadow-md p-6 mb-6">
    <h3 class="text-xl font-bold mb-4 pb-2 border-b border-gray-200"><?php esc_html_e('Danh mục', 'obvietnam-custom'); ?></h3>
    <ul class="space-y-2">
        <?php
        $categories = get_categories();
        foreach ($categories as $category) {
            echo '<li>';
            printf(
                '<a href="%s" class="flex items-center justify-between py-2 text-gray-700 hover:text-primary">',
                esc_url(get_category_link($category->term_id))
            );
            printf('<span>%s</span>', esc_html($category->name));
            printf(
                '<span class="bg-gray-100 text-gray-800 text-xs font-medium px-2.5 py-0.5 rounded-full">%s</span>',
                esc_html($category->count)
            );
            echo '</a></li>';
        }
        ?>
    </ul>
</div>

<!-- Tags -->
<div class="bg-white rounded-lg shadow-md p-6 mb-6">
    <h3 class="text-xl font-bold mb-4 pb-2 border-b border-gray-200"><?php esc_html_e('Tags', 'obvietnam-custom'); ?></h3>
    <div class="flex flex-wrap gap-2">
        <?php
        $tags = get_tags();
        foreach ($tags as $tag) {
            printf(
                '<a href="%s" class="px-3 py-1 bg-gray-100 text-gray-800 rounded-full text-sm hover:bg-primary hover:text-white">%s</a>',
                esc_url(get_tag_link($tag->term_id)),
                esc_html($tag->name)
            );
        }
        ?>
    </div>
</div>
