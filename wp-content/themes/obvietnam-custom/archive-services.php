<?php
/**
 * The template for displaying archive pages for services
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
                <p><?php echo esc_html__('Chúng tôi cung cấp đa dạng các dịch vụ cung ứng hàng hoá, vận chuyển và logistics với chất lượng cao và giá cả cạnh tranh.', 'obvietnam-custom'); ?></p>
            </div>
        </header>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <?php
            if (have_posts()) :
                while (have_posts()) : the_post();
                    $icon = get_post_meta(get_the_ID(), '_service_icon', true);
                    if (empty($icon)) {
                        $icon = 'fa-truck';
                    }
            ?>
                <div class="service-card">
                    <div class="text-center">
                        <div class="service-icon flex items-center justify-center">
                            <i class="fas <?php echo esc_attr($icon); ?> text-5xl text-site-blue"></i>
                        </div>
                        <h3 class="text-xl font-bold text-site-blue mb-3">
                            <?php the_title(); ?>
                        </h3>
                        <div class="text-gray-700 mb-4">
                            <?php the_excerpt(); ?>
                        </div>
                        <a href="<?php the_permalink(); ?>" class="text-site-blue hover:text-site-blue-dark font-medium inline-flex items-center">
                            <?php esc_html_e('Xem chi tiết', 'obvietnam-custom'); ?>
                            <i class="fas fa-arrow-right ml-2"></i>
                        </a>
                    </div>
                </div>
            <?php
                endwhile;
            else :
                echo '<div class="col-span-3 text-center py-8">';
                echo '<p>' . esc_html__('Không tìm thấy dịch vụ nào.', 'obvietnam-custom') . '</p>';
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
