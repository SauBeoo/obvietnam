<?php
/**
 * Template part for displaying products section
 *
 * @package OB_Vietnam_Custom
 */
?>
<section class="py-16 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <!-- Section Header -->
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4 relative inline-block color-title" style="text-transform: uppercase;">
                <span class="relative z-10"><?php echo esc_html(get_theme_mod('products_section_title', 'Danh Mục Sản Phẩm')); ?></span>
            </h2>
            <p class="text-lg text-gray-600 max-w-2xl mx-auto">
                <?php echo esc_html(get_theme_mod('products_section_description', 'Chúng tôi cung cấp đa dạng các sản phẩm chất lượng cao, đáp ứng mọi nhu cầu của khách hàng.')); ?>
            </p>
        </div>
        <!-- Product Grid -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
        <?php
        $category_args = array(
            'post_type' => 'category',
            'posts_per_page' => 5,
            'orderby' => 'date',
            'order' => 'DESC',
        );
        $category_query = new WP_Query($category_args);

        if ($category_query->have_posts()) :
        while ($category_query->have_posts()) : $category_query->the_post();
            $icon = get_post_meta(get_the_ID(), '_category_icon', true);
            $bg_classes = get_post_meta(get_the_ID(), '_category_icon_bg', true);
            if (empty($icon)) {
                $icon = 'fa-award';
            }
        ?>
            <!-- Product Card 1 -->
            <div class="product-card bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:shadow-xl animate-fadeIn" style="animation-delay: 0.1s">
                <div class="p-6 flex flex-col items-center">
                    <div class="icon-wrapper mb-6 w-24 h-24 rounded-full <?php echo esc_attr($bg_classes); ?> flex items-center justify-center ">
                        <i class="fas <?php echo esc_attr($icon); ?> text-4xl"></i>
                    </div>
                    <div class="text-center">
                        <h3 class="text-xl font-semibold text-gray-800 mb-3"><?php the_title(); ?></h3>
                        <p class="text-gray-500 mb-4"><?php the_excerpt(); ?></p>
                    </div>
                </div>
            </div>
            <?php
            endwhile;
            wp_reset_postdata();
            else :
            // Display placeholder products if no products are found
            $placeholder_products = array(
                [
                    'icon' => 'boxes',
                    'title' => 'Tạp Vật',
                    'content' => 'Các vật dụng đa dạng phục vụ mọi nhu cầu'
                ],
                [
                    'icon' => 'tape',
                    'title' => 'Vật Tư Đóng Gói',
                    'content' => 'Vật liệu đóng gói chất lượng cao'
                ],
                [
                    'icon' => 'tools',
                    'title' => 'Công cụ - Dụng cụ',
                    'content' => 'Dụng cụ chuyên nghiệp cho mọi công việc'
                ],
                [
                    'icon' => 'hammer',
                    'title' => 'Ngũ Kim',
                    'content' => 'Sản phẩm kim loại đa dạng'
                ],
                [
                    'icon' => 'hard-hat',
                    'title' => 'Bảo Hộ',
                    'content' => 'Thiết bị bảo hộ an toàn'
                ],
            );

            foreach ($placeholder_products as $product) :
            ?>
            <!-- Product Card 2 -->
            <div class="product-card bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:shadow-xl animate-fadeIn" style="animation-delay: 0.2s">
                <div class="p-6 flex flex-col items-center">
                    <div class="icon-wrapper mb-6 w-24 h-24 rounded-full bg-green-50 flex items-center justify-center text-green-600">
                        <i class="fas fa-<?php echo esc_html($product['icon']); ?> text-4xl"></i>
                    </div>
                    <div class="text-center">
                        <h3 class="text-xl font-semibold text-gray-800 mb-3"><?php echo esc_html($product['title']); ?></h3>
                        <p class="text-gray-500 mb-4"><?php echo esc_html($product['content']); ?></p>
                    </div>
                </div>
            </div>
            <?php
            endforeach;
            endif;
            ?>
        </div>

        <!-- View All Button -->
        <div class="text-center mt-16">
            <a href="<?php echo esc_url(get_post_type_archive_link('products')); ?>"
               class="btn btn-primary contact-button">
                <span><?php esc_html_e('Xem tất cả sản phẩm', 'obvietnam-custom'); ?></span>
                <i class="fas fa-arrow-right ml-3"></i>
            </a>
        </div>
    </div>
</section>

