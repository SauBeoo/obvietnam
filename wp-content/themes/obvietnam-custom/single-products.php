<?php
/**
 * The template for displaying single product posts
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
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('bg-white rounded-lg shadow-md overflow-hidden'); ?>>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                        <div class="p-8">
                            <?php if ( has_post_thumbnail() ) : ?>
                                <div class="post-thumbnail mb-6">
                                    <?php the_post_thumbnail('full', ['class' => 'w-full h-auto object-cover rounded-lg']); ?>
                                </div>
                            <?php else : ?>
                                <div class="bg-site-gray-light h-64 flex items-center justify-center rounded-lg mb-6">
                                    <i class="fas fa-box text-6xl text-site-gray-dark"></i>
                                </div>
                            <?php endif; ?>

                            <div class="product-gallery grid grid-cols-4 gap-2">
                                <?php
                                // Display product gallery if available
                                $gallery_images = get_post_meta(get_the_ID(), '_product_gallery', true);
                                if (!empty($gallery_images)) {
                                    $gallery_array = explode(',', $gallery_images);
                                    foreach ($gallery_array as $image_id) {
                                        echo '<div class="gallery-item cursor-pointer">';
                                        echo wp_get_attachment_image($image_id, 'thumbnail', false, ['class' => 'w-full h-auto object-cover rounded']);
                                        echo '</div>';
                                    }
                                }
                                ?>
                            </div>
                        </div>

                        <div class="p-8">
                            <header class="entry-header mb-6">
                                <?php the_title( '<h1 class="entry-title text-3xl font-bold text-site-blue mb-4">', '</h1>' ); ?>

                                <?php
                                // Display product price if available
                                $product_price = get_post_meta(get_the_ID(), '_product_price', true);
                                if (!empty($product_price)) :
                                    ?>
                                    <div class="product-price text-xl font-semibold text-site-green mb-4">
                                        <?php echo esc_html(number_format($product_price, 0, ',', '.')) . ' VNĐ'; ?>
                                    </div>
                                <?php endif; ?>

                                <div class="product-meta text-sm text-gray-600 mb-4">
                                    <?php
                                    // Display product code if available
                                    $product_code = get_post_meta(get_the_ID(), '_product_code', true);
                                    if (!empty($product_code)) :
                                        ?>
                                        <div class="product-code mb-1">
                                            <span class="font-medium"><?php esc_html_e('Mã sản phẩm:', 'obvietnam-custom'); ?></span>
                                            <span><?php echo esc_html($product_code); ?></span>
                                        </div>
                                    <?php endif; ?>

                                    <?php
                                    // Display product availability if available
                                    $product_availability = get_post_meta(get_the_ID(), '_product_availability', true);
                                    if (!empty($product_availability)) :
                                        ?>
                                        <div class="product-availability">
                                            <span class="font-medium"><?php esc_html_e('Tình trạng:', 'obvietnam-custom'); ?></span>
                                            <span><?php echo esc_html($product_availability); ?></span>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </header>

                            <div class="entry-content prose max-w-none mb-6">
                                <?php the_content(); ?>
                            </div>

                            <div class="product-actions mt-8">
                                <a href="<?php echo esc_url(get_permalink(get_page_by_path('lien-he'))); ?>" class="btn-primary inline-block">
                                    <?php esc_html_e('Liên hệ đặt hàng', 'obvietnam-custom'); ?>
                                </a>

                                <a href="tel:<?php echo esc_attr(get_theme_mod('contact_phone', '0987654321')); ?>" class="btn-secondary inline-block ml-4">
                                    <i class="fas fa-phone mr-2"></i>
                                    <?php esc_html_e('Gọi ngay', 'obvietnam-custom'); ?>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="p-8 border-t border-gray-200">
                        <h2 class="text-2xl font-bold text-site-blue mb-6"><?php esc_html_e('Sản phẩm liên quan', 'obvietnam-custom'); ?></h2>

                        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                            <?php
                            $related_products = new WP_Query(array(
                                'post_type' => 'products',
                                'posts_per_page' => 4,
                                'post__not_in' => array(get_the_ID()),
                                'orderby' => 'rand',
                            ));

                            if ($related_products->have_posts()) :
                                while ($related_products->have_posts()) : $related_products->the_post();
                                    ?>
                                    <div class="bg-white rounded-lg shadow-md overflow-hidden transition-transform hover:-translate-y-1">
                                        <?php if (has_post_thumbnail()) : ?>
                                            <a href="<?php the_permalink(); ?>" class="block">
                                                <?php the_post_thumbnail('product-thumbnail', ['class' => 'w-full h-48 object-cover']); ?>
                                            </a>
                                        <?php else : ?>
                                            <div class="bg-site-gray-light h-48 flex items-center justify-center">
                                                <i class="fas fa-box text-4xl text-site-gray-dark"></i>
                                            </div>
                                        <?php endif; ?>

                                        <div class="p-4">
                                            <h3 class="text-lg font-semibold mb-2">
                                                <a href="<?php the_permalink(); ?>" class="text-site-blue hover:text-site-blue-dark">
                                                    <?php the_title(); ?>
                                                </a>
                                            </h3>
                                            <div class="text-sm text-gray-700 mb-3">
                                                <?php the_excerpt(); ?>
                                            </div>
                                            <a href="<?php the_permalink(); ?>" class="text-site-blue hover:text-site-blue-dark font-medium inline-flex items-center text-sm">
                                                <?php esc_html_e('Xem chi tiết', 'obvietnam-custom'); ?>
                                                <i class="fas fa-arrow-right ml-1"></i>
                                            </a>
                                        </div>
                                    </div>
                                <?php
                                endwhile;
                                wp_reset_postdata();
                            else :
                                echo '<div class="col-span-4 text-center py-8">';
                                echo '<p>' . esc_html__('Không tìm thấy sản phẩm liên quan.', 'obvietnam-custom') . '</p>';
                                echo '</div>';
                            endif;
                            ?>
                        </div>
                    </div>
                </article>
            <?php endwhile; ?>
        </div>
    </main>

<?php
get_footer();

