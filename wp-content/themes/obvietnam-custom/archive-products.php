<?php
/**
 * The template for displaying archive pages for products
 *
 * @package OB_Vietnam_Custom
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="site-container py-12">
        <header class="page-header mb-8 text-center">
            <h1 class="section-heading">
                <?php post_type_archive_title(); ?>
            </h1>
            <div class="archive-description max-w-3xl mx-auto">
                <p><?php echo esc_html__('Chúng tôi cung cấp đa dạng các sản phẩm chất lượng cao, đáp ứng mọi nhu cầu của khách hàng.', 'obvietnam-custom'); ?></p>
            </div>
        </header>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
            <?php
            if (have_posts()) :
                while (have_posts()) : the_post();
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
            else :
                echo '<div class="col-span-4 text-center py-8">';
                echo '<p>' . esc_html__('Không tìm thấy sản phẩm nào.', 'obvietnam-custom') . '</p>';
                echo '</div>';
            endif;
            ?>
        </div>

        <div class="pagination mt-8 flex justify-center">
            <?php
            the_posts_pagination(
                array(
                    'mid_size'  => 2,
                    'prev_text' => '<i class="fas fa-chevron-left"></i> ' . esc_html__('Trước', 'obvietnam-custom'),
                    'next_text' => esc_html__('Sau', 'obvietnam-custom') . ' <i class="fas fa-chevron-right"></i>',
                )
            );
            ?>
        </div>
    </div>
</main>

<?php
get_footer();
