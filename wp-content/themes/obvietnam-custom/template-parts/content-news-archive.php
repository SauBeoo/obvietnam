<article class="bg-white rounded-lg shadow overflow-hidden news-card transition duration-300">
    <div class="relative">
        <?php if (has_post_thumbnail()) : ?>
            <img src="<?php the_post_thumbnail_url('medium_large'); ?>"
                 alt="<?php the_title_attribute(); ?>"
                 class="w-full h-48 object-cover">
        <?php else : ?>
        <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/news-placeholder.png'); ?>"  class="w-full h-48 object-cover" alt="<?php the_title_attribute(); ?>">
        <?php endif; ?>
        <span class="absolute top-2 left-2 bg-blue-500 text-white text-xs px-2 py-1 rounded">
                <?php the_category(', '); ?>
            </span>
    </div>
    <div class="p-5">
        <div class="flex items-center text-sm text-gray-500 mb-2">
            <span><i class="far fa-clock mr-1"></i> <?php echo get_the_date(); ?></span>
            <span class="mx-2">•</span>
            <span><i class="far fa-eye mr-1"></i><?php echo obvietnam_get_post_views(get_the_ID()); ?> lượt xem</span>
        </div>
        <h2 class="text-xl font-bold mb-3 text-gray-800 hover:text-blue-500 transition">
            <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
        </h2>
        <p class="text-gray-600 mb-4"><?php echo wp_trim_words(get_the_excerpt(), 25); ?></p>
        <a href="<?php the_permalink(); ?>" class="text-primary font-medium read-more-btn inline-flex items-center">
            <?php esc_html_e('Đọc tiếp', 'obvietnam-custom'); ?> <i class="fas fa-arrow-right ml-2"></i>
        </a>
    </div>
</article>