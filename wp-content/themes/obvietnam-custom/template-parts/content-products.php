<?php
/**
 * Template part for displaying products section
 *
 * @package OB_Vietnam_Custom
 */
?>

<section class="products-section section">
    <div class="site-container">
        <h2 class="section-heading products-section-title"><?php echo esc_html(get_theme_mod('products_section_title', 'Danh Mục Sản Phẩm')); ?></h2>
        <div class="section-description products-section-description">
            <?php echo esc_html(get_theme_mod('products_section_description', 'Chúng tôi cung cấp đa dạng các sản phẩm chất lượng cao, đáp ứng mọi nhu cầu của khách hàng.')); ?>
        </div>

        <div class="products-grid">
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
            ?>
                <div class="product-card">
                    <div class="product-image">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail('product-thumbnail'); ?>
                        <?php else : ?>
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/product-placeholder.png'); ?>" alt="<?php the_title_attribute(); ?>">
                        <?php endif; ?>
                    </div>
                    <div class="product-content">
                        <h3 class="product-title text-center"><?php the_title(); ?></h3>
                    </div>
                </div>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
                // Display placeholder products if no products are found
                $placeholder_products = array(
                    array('title' => 'Dịch vụ vận chuyển hàng hóa', 'price' => ''),
                    array('title' => 'Giải pháp chuỗi cung ứng toàn diện', 'price' => ''),
                    array('title' => 'Dịch vụ kho bãi chuyên nghiệp', 'price' => ''),
                );

                foreach ($placeholder_products as $product) :
            ?>
                    <div class="product-card">
                        <div class="product-image">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/product-placeholder.png'); ?>" alt="<?php echo esc_attr($product['title']); ?>">
                        </div>
                        <div class="product-content">
                            <h3 class="product-title"><?php echo esc_html($product['title']); ?></h3>
                            <div class="product-description"><?php esc_html_e('Mô tả ngắn về sản phẩm hoặc dịch vụ này. Thêm thông tin chi tiết tại đây để giới thiệu đến khách hàng.', 'obvietnam-custom'); ?></div>
                        </div>
                    </div>
            <?php
                endforeach;
            endif;
            ?>
        </div>

        <div class="text-center mt-5">
            <a href="<?php echo esc_url(get_post_type_archive_link('products')); ?>" class="btn btn-secondary">
                <?php esc_html_e('Xem tất cả sản phẩm', 'obvietnam-custom'); ?>
            </a>
        </div>
    </div>
</section>
