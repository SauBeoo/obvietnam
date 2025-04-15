<?php
/**
 * The template for displaying single product posts
 *
 * @package OB_Vietnam_Custom
 */

get_header();
?>
    <main id="primary" class="site-main">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-4 py-8 md:py-12">
            <?php while (have_posts()) : the_post(); ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('bg-white rounded-xl shadow-md overflow-hidden'); ?>>
                    <div class="grid grid-cols-1 lg:grid-cols-2 gap-0 lg:gap-8">
                        <!-- Product Images Section -->
                        <div class="bg-gray-50">
                            <div class="relative rounded-lg overflow-hidden shadow-hover">
                                <?php if (has_post_thumbnail()) : ?>
                                    <?php the_post_thumbnail('large', [
                                        'class' => 'w-full h-auto object-cover rounded-lg zoom-effect',
                                        'alt' => get_the_title(),
                                        'decoding' => 'async'
                                    ]); ?>
                                <?php else : ?>
                                    <div class="w-full h-96 bg-gray-200 flex items-center justify-center">
                                        <i class="fas fa-image text-gray-400 text-4xl"></i>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <?php
                                $gallery = get_post_meta(get_the_ID(), '_product_gallery', true);
                                if ($gallery):
                            ?>
                                <div class="grid grid-cols-4 gap-3">
                                    <?php
                                    $gallery_images = $gallery ? explode(',', $gallery) : [];
    
                                    // Hiển thị tối đa 4 ảnh
                                    for ($i = 0; $i < 4; $i++) :
                                        if (isset($gallery_images[$i])) :
                                            ?>
                                            <div class="cursor-pointer border-2 border-transparent hover:border-primary rounded-md overflow-hidden transition-all">
                                                <?php echo wp_get_attachment_image(
                                                    $gallery_images[$i],
                                                    'thumbnail',
                                                    false,
                                                    ['class' => 'w-full h-20 object-cover']
                                                ); ?>
                                            </div>
                                        <?php else : ?>
                                            <div class="cursor-pointer border-2 border-transparent hover:border-primary rounded-md overflow-hidden transition-all">
                                                <div class="w-full h-20 bg-gray-200 flex items-center justify-center">
                                                    <i class="fas fa-image text-gray-400 text-xl"></i>
                                                </div>
                                            </div>
                                        <?php endif; ?>
                                    <?php endfor; ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <!-- Product Details Section -->
                        <div class="p-4 md:p-6">
                            <div class="mb-6">
                                <h1 class="entry-title text-2xl md:text-3xl font-bold text-dark mb-2">
                                    <?php the_title(); ?>
                                </h1>

                                <div class="flex items-center mb-4">
                                    <?php
                                    $rating = get_post_meta(get_the_ID(), '_product_rating', true);
                                    ?>
                                    <div class="flex text-yellow-400 mr-2">
                                        <?php for ($i = 1; $i <= 5; $i++) : ?>
                                            <i class="fas fa-star<?php echo ($i <= floor($rating)) ? '' : ($i == ceil($rating) ? '-half-alt' : ''); ?>"></i>
                                        <?php endfor; ?>
                                    </div>
                                </div>

                                <?php if ($badge = get_post_meta(get_the_ID(), '_product_badge', true)) : ?>
                                    <div class="bg-blue-50 border-l-4 border-primary p-3 mb-4">
                                        <div class="flex items-center">
                                            <i class="fas fa-tags text-primary mr-2"></i>
                                            <span class="text-sm font-medium"><?php echo esc_html($badge); ?></span>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="entry-content mb-6">
                                <?php if ($features = get_post_meta(get_the_ID(), '_product_features', true)) : ?>
                                    <h3 class="text-lg font-semibold text-dark mb-3">Đặc điểm nổi bật</h3>
                                    <div class="space-y-3">
                                        <?php foreach ($features as $feature) : ?>
                                            <div class="product-feature">
                                                <i class="fas fa-check-circle text-green-500"></i>
                                                <span><?php echo esc_html($feature); ?></span>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </div>

                            <div class="product-actions mt-8 space-y-4 md:space-y-0 md:space-x-4">
                                <a href="<?php echo esc_url(get_permalink(get_page_by_path('lien-he'))); ?>"
                                   class="btn-primary inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-primary hover:bg-primary-dark shadow-sm transition-colors w-full md:w-auto">
                                    <i class="fas fa-shopping-cart mr-2"></i>
                                    Liên hệ đặt hàng
                                </a>

                                <a href="tel:<?php echo esc_attr(get_theme_mod('company_phone', '0987654321')); ?>"
                                   class="btn-secondary inline-flex items-center justify-center px-6 py-3 border border-transparent text-base font-medium rounded-md text-white bg-secondary hover:bg-secondary-dark shadow-sm transition-colors w-full md:w-auto">
                                    <i class="fas fa-phone-alt mr-2"></i>
                                    Gọi ngay
                                </a>
                            </div>

                            <div class="mt-6 pt-6 border-t border-gray-200">
                                <?php if ($warranty = get_post_meta(get_the_ID(), '_product_warranty', true)) : ?>
                                    <div class="flex items-center text-sm text-gray-600">
                                        <i class="fas fa-shield-alt text-primary mr-2"></i>
                                        <span><?php echo esc_html($warranty); ?></span>
                                    </div>
                                <?php endif; ?>
                                
                                    <div class="flex items-center text-sm text-gray-600 mt-2">
                                        <i class="fas fa-truck text-primary mr-2"></i>
                                        <span>Miễn phí vận chuyển cho đơn hàng > 5 triệu</span>
                                    </div>
                            </div>
                        </div>
                    </div>

                    <!-- Product Tabs -->
                    <div class="border-t border-gray-200 mt-6">
                        <div class="px-4 md:px-6">
                            <nav class="flex space-x-8" aria-label="Tabs">
                                <button class="border-b-2 border-primary text-primary px-4 py-4 text-sm font-medium">
                                    Thông tin chi tiết
                                </button>
                            </nav>
                        </div>

                        <div class="px-4 md:px-6 py-6">
                            <div class="prose max-w-none">
                                <?php if ($specs = get_post_meta(get_the_ID(), '_product_specifications', true)) : ?>
                                    <h3 class="text-lg font-semibold mb-3">Thông số kỹ thuật</h3>
                                    <table class="min-w-full divide-y divide-gray-200">
                                        <tbody class="bg-white divide-y divide-gray-200">
                                        <?php foreach ($specs as $spec) : ?>
                                            <tr>
                                                <td class="px-4 py-3 whitespace-nowrap text-sm font-medium text-gray-700 bg-gray-50"><?php echo $spec['label']; ?></td>
                                                <td class="px-4 py-3 whitespace-nowrap text-sm text-gray-700"><?php echo $spec['value']; ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                <?php endif; ?>

                                <h3 class="text-lg font-semibold mt-6 mb-3">Mô tả sản phẩm</h3>
                                <?php the_content(); ?>
                            </div>
                        </div>
                    </div>

                    <!-- Related Products -->
                    <?php
                    $related_products = new WP_Query([
                        'post_type' => 'products',
                        'posts_per_page' => 4,
                        'post__not_in' => [get_the_ID()],
                        'orderby' => 'rand'
                    ]);

                    if ($related_products->have_posts()) :
                        ?>
                        <div class="p-4 md:p-6 border-t border-gray-200 bg-gray-50">
                            <h2 class="text-2xl font-bold text-dark mb-6">Sản phẩm liên quan</h2>

                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 md:gap-6">
                                <?php while ($related_products->have_posts()) : $related_products->the_post(); ?>
                                    <div class="bg-white rounded-lg shadow-md overflow-hidden transition-all hover:shadow-lg">
                                        <div class="bg-gray-100 h-48 flex items-center justify-center relative">
                                            <?php if (has_post_thumbnail()) : ?>
                                                <?php the_post_thumbnail('medium', ['class' => 'w-full h-full object-cover']); ?>
                                            <?php else : ?>
                                                <i class="fas fa-box text-4xl text-gray-400"></i>
                                            <?php endif; ?>

                                            <?php if (get_post_meta(get_the_ID(), '_is_new', true)) : ?>
                                                <div class="absolute top-2 right-2 bg-primary text-white text-xs font-bold px-2 py-1 rounded">
                                                    Mới
                                                </div>
                                            <?php endif; ?>
                                        </div>

                                        <div class="p-4">
                                            <h3 class="text-lg font-semibold mb-2">
                                                <a href="<?php the_permalink(); ?>" class="text-dark hover:text-primary transition-colors">
                                                    <?php the_title(); ?>
                                                </a>
                                            </h3>
                                            <div class="text-sm text-gray-700 mb-3 line-clamp-2">
                                                <?php echo wp_trim_words(get_the_excerpt(), 15); ?>
                                            </div>
                                            <a href="<?php the_permalink(); ?>" class="text-primary hover:text-primary-dark font-medium inline-flex items-center text-sm transition-colors">
                                                Xem chi tiết
                                                <i class="fas fa-arrow-right ml-1 text-xs"></i>
                                            </a>
                                        </div>
                                    </div>
                                <?php endwhile; wp_reset_postdata(); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </article>
            <?php endwhile; ?>
        </div>
    </main>

<?php
get_footer();

