<?php
/**
 * The template for displaying all single posts
 *
 * @package OB_Vietnam_Custom
 */

get_header();
?>

    <main class="container mx-auto px-4 py-8">
        <div class="flex flex-col lg:flex-row gap-8">
            <!-- Main Article -->
            <article class="lg:w-2/3 bg-white rounded-lg shadow-md overflow-hidden">
                <!-- Article Header -->
                <div class="px-6 pt-4 pb-2">
                    <div class="flex items-center text-sm text-gray-500 mb-2">
                        <span class="mr-3"><i class="far fa-calendar-alt mr-1"></i><?php echo get_the_date(); ?></span>
                        <span class="mr-3"><i class="far fa-eye mr-1"></i><?php echo obvietnam_get_post_views(get_the_ID()); ?> lượt xem</span>
                        <span><i class="far fa-comment-alt mr-1"></i><?php comments_number('0', '1', '%'); ?> bình luận</span>
                    </div>
                    <h1 class="text-3xl font-bold text-gray-900 mb-4"><?php the_title(); ?></h1>
                </div>
                
                <!-- Article Content -->
                <div class="px-6 py-4">
                    <div class="mb-6">
                        <?php the_content(); ?>
                    </div>
                    <!-- Contact Info - Always show -->
                    <div class="bg-blue-50 p-4 rounded-lg mb-6">
                        <h4 class="font-bold text-lg mb-2">Thông tin liên hệ</h4>
                        <ul class="space-y-2">
                            <li class="flex items-center">
                                <i class="fas fa-map-marker-alt text-primary mr-2"></i>
                                <span>Quốc lộ 13, phường Mỹ Phước, Thị Xã Bến Cát, Tỉnh Bình Dương</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-phone-alt text-primary mr-2"></i>
                                <span>02743.599.079 - 02743.599.078</span>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-envelope text-primary mr-2"></i>
                                <a href="mailto:sale.obvietnam@gmail.com" class="hover:underline">sale.obvietnam@gmail.com</a>
                            </li>
                            <li class="flex items-center">
                                <i class="fas fa-globe text-primary mr-2"></i>
                                <a href="https://binhduongtoolshop.com/" class="hover:underline">binhduongtoolshop.com</a>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Article Footer -->
                <div class="px-6 py-4 border-t border-gray-200">
                    <!-- Tags -->
                    <?php if(has_tag()) : ?>
                        <div class="flex flex-wrap gap-2 mb-4">
                            <span class="text-sm font-medium"><?php esc_html_e('Tags:', 'obvietnam-custom'); ?></span>
                            <?php
                            $tags = get_the_tags();
                            foreach($tags as $tag) {
                                echo sprintf(
                                    '<a href="%s" class="px-3 py-1 bg-gray-100 text-gray-800 rounded-full text-sm hover:bg-primary hover:text-white">%s</a>',
                                    esc_url(get_tag_link($tag->term_id)),
                                    esc_html($tag->name)
                                );
                            }
                            ?>
                        </div>
                    <?php endif; ?>
                </div>
            </article>

            <!-- Sidebar -->
            <aside class="lg:w-1/3 sticky-sidebar">
                <?php get_sidebar(); ?>
            </aside>
        </div>

        <!-- Related Posts -->
        <?php
        $related = new WP_Query(array(
            'category__in' => wp_get_post_categories(get_the_ID()),
            'posts_per_page' => 3,
            'post__not_in' => array(get_the_ID())
        ));

        if($related->have_posts()) :
            ?>
            <section class="mt-12">
                <h2 class="text-2xl font-bold mb-6 pb-2 border-b border-gray-200"><?php esc_html_e('Tin liên quan', 'obvietnam-custom'); ?></h2>
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <?php while($related->have_posts()) : $related->the_post(); ?>
                        <div class="bg-white rounded-lg shadow-md overflow-hidden news-card transition duration-300">
                            <?php if(has_post_thumbnail()) : ?>
                                <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title(); ?>" class="w-full h-48 object-cover">
                            <?php endif; ?>
                            <div class="p-4">
                                <div class="flex items-center text-xs text-gray-500 mb-2">
                                    <span class="mr-3"><i class="far fa-calendar-alt mr-1"></i><?php echo get_the_date(); ?></span>
                                    <span><i class="far fa-eye mr-1"></i><?php echo obvietnam_get_post_views(get_the_ID()); ?> lượt xem</span>
                                </div>
                                <h3 class="text-lg font-bold mb-2 hover:text-primary">
                                    <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                </h3>
                                <p class="text-gray-600 mb-3"><?php echo wp_trim_words(get_the_excerpt(), 20); ?></p>
                                <a href="<?php the_permalink(); ?>" class="text-primary font-medium read-more-btn inline-flex items-center">
                                    <?php esc_html_e('Đọc tiếp', 'obvietnam-custom'); ?> <i class="fas fa-arrow-right ml-2"></i>
                                </a>
                            </div>
                        </div>
                    <?php endwhile; wp_reset_postdata(); ?>
                </div>
            </section>
        <?php endif; ?>

        <!-- Comments Section -->
        <?php if (comments_open() || get_comments_number()) : ?>
            <section class="mt-12 bg-white rounded-lg shadow-md p-6">
                <?php comments_template(); ?>
            </section>
        <?php endif; ?>
    </main>

<?php
get_footer();