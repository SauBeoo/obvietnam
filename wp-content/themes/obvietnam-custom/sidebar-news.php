<aside class="space-y-6">
    <!-- Popular News Widget -->
    <div class="bg-white rounded-lg shadow p-5">
        <h2 class="text-lg font-semibold mb-4 text-gray-800 border-b pb-2 flex items-center">
            <i class="fas fa-fire text-red-500 mr-2"></i> Tin nổi bật
        </h2>
        <?php
        $popular = new WP_Query([
            'posts_per_page' => 4,
            'meta_key' => 'views',
            'orderby' => 'meta_value_num',
            'order' => 'DESC'
        ]);

        if ($popular->have_posts()) : while ($popular->have_posts()) : $popular->the_post(); ?>
            <div class="flex gap-3 mb-4">
                <div class="flex-shrink-0">
                    <a href="<?php the_permalink(); ?>">
                        <?php the_post_thumbnail('thumbnail', ['class' => 'w-16 h-16 rounded object-cover']); ?>
                    </a>
                </div>
                <div>
                    <h3 class="font-medium text-gray-800 hover:text-blue-500 transition">
                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                    </h3>
                    <div class="flex items-center text-xs text-gray-500 mt-1">
                        <span><i class="far fa-clock mr-1"></i> <?php echo human_time_diff(get_the_time('U')); ?></span>
                        <span class="mx-2">•</span>
                        <span><i class="far fa-eye mr-1"></i> <?php echo get_views(); ?></span>
                    </div>
                </div>
            </div>
        <?php endwhile; endif; wp_reset_postdata(); ?>
    </div>

    <!-- Tags Widget -->
    <div class="bg-white rounded-lg shadow p-5">
        <h2 class="text-lg font-semibold mb-4 text-gray-800 border-b pb-2">Từ khóa phổ biến</h2>
        <div class="flex flex-wrap gap-2">
            <?php
            $tags = get_tags([
                'orderby' => 'count',
                'order'   => 'DESC',
                'number'  => 10
            ]);

            foreach ($tags as $tag) : ?>
                <a href="<?php echo get_tag_link($tag->term_id); ?>"
                   class="bg-gray-100 hover:bg-gray-200 px-3 py-1 rounded-full text-sm transition">
                    #<?php echo $tag->name; ?>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</aside>