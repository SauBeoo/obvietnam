<?php
/**
 * The template for displaying single service posts
 *
 * @package OB_Vietnam_Custom
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="site-container py-12">
        <?php
        while ( have_posts() ) :
            the_post();
            $icon = get_post_meta(get_the_ID(), '_service_icon', true);
            if (empty($icon)) {
                $icon = 'fa-truck';
            }
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('bg-white rounded-lg shadow-md overflow-hidden'); ?>>
                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="post-thumbnail">
                        <?php the_post_thumbnail('full', ['class' => 'w-full h-auto object-cover']); ?>
                    </div>
                <?php endif; ?>
                
                <div class="p-8">
                    <header class="entry-header mb-6 text-center">
                        <div class="service-icon flex items-center justify-center mb-4">
                            <i class="fas <?php echo esc_attr($icon); ?> text-6xl text-site-blue"></i>
                        </div>
                        <?php the_title( '<h1 class="entry-title text-3xl font-bold text-site-blue">', '</h1>' ); ?>
                    </header>

                    <div class="entry-content prose max-w-none">
                        <?php the_content(); ?>
                    </div>
                    
                    <footer class="entry-footer mt-8 pt-6 border-t border-gray-200">
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                            <div>
                                <h3 class="text-xl font-semibold text-site-blue mb-4"><?php esc_html_e('Liên hệ với chúng tôi', 'obvietnam-custom'); ?></h3>
                                <p class="mb-4"><?php esc_html_e('Để được tư vấn chi tiết về dịch vụ này, vui lòng liên hệ với chúng tôi qua:', 'obvietnam-custom'); ?></p>
                                <ul class="space-y-2">
                                    <li class="flex items-center">
                                        <i class="fas fa-phone text-site-blue mr-2"></i>
                                        <span><?php echo esc_html(get_theme_mod('contact_phone', '0987 654 321')); ?></span>
                                    </li>
                                    <li class="flex items-center">
                                        <i class="fas fa-envelope text-site-blue mr-2"></i>
                                        <span><?php echo esc_html(get_theme_mod('contact_email', 'info@obvietnam.com')); ?></span>
                                    </li>
                                </ul>
                                <a href="<?php echo esc_url(get_permalink(get_page_by_path('lien-he'))); ?>" class="btn-primary inline-block mt-4">
                                    <?php esc_html_e('Gửi yêu cầu tư vấn', 'obvietnam-custom'); ?>
                                </a>
                            </div>
                            <div>
                                <h3 class="text-xl font-semibold text-site-blue mb-4"><?php esc_html_e('Dịch vụ khác', 'obvietnam-custom'); ?></h3>
                                <?php
                                $related_services = new WP_Query(array(
                                    'post_type' => 'services',
                                    'posts_per_page' => 4,
                                    'post__not_in' => array(get_the_ID()),
                                    'orderby' => 'rand',
                                ));
                                
                                if ($related_services->have_posts()) :
                                ?>
                                <ul class="space-y-3">
                                    <?php while ($related_services->have_posts()) : $related_services->the_post(); 
                                        $service_icon = get_post_meta(get_the_ID(), '_service_icon', true);
                                        if (empty($service_icon)) {
                                            $service_icon = 'fa-truck';
                                        }
                                    ?>
                                    <li>
                                        <a href="<?php the_permalink(); ?>" class="flex items-center text-site-blue hover:text-site-blue-dark">
                                            <i class="fas <?php echo esc_attr($service_icon); ?> mr-2"></i>
                                            <span><?php the_title(); ?></span>
                                        </a>
                                    </li>
                                    <?php endwhile; wp_reset_postdata(); ?>
                                </ul>
                                <a href="<?php echo esc_url(get_post_type_archive_link('services')); ?>" class="text-site-blue hover:text-site-blue-dark font-medium inline-flex items-center mt-4">
                                    <?php esc_html_e('Xem tất cả dịch vụ', 'obvietnam-custom'); ?>
                                    <i class="fas fa-arrow-right ml-2"></i>
                                </a>
                                <?php else : ?>
                                <p><?php esc_html_e('Không tìm thấy dịch vụ liên quan.', 'obvietnam-custom'); ?></p>
                                <?php endif; ?>
                            </div>
                        </div>
                    </footer>
                </div>
            </article>
        <?php endwhile; ?>
    </div>
</main>

<?php
get_footer();
