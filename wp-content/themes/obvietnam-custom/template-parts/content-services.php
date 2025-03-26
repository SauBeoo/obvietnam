<?php
/**
 * Template part for displaying services section
 *
 * @package OB_Vietnam_Custom
 */
?>

<section class="services-section section">
    <div class="site-container">
        <h2 class="section-heading services-section-title"><?php echo esc_html(get_theme_mod('services_section_title', 'DỊCH VỤ CUNG ỨNG HÀNG HÓA')); ?></h2>
        <div class="section-description services-section-description">
            <?php echo esc_html(get_theme_mod('services_section_description', 'Chúng tôi cung cấp đa dạng các dịch vụ cung ứng hàng hoá, vận chuyển và logistics với chất lượng cao và giá cả cạnh tranh.')); ?>
        </div>

        <div class="services-grid">
            <?php
            $services_args = array(
                'post_type' => 'services',
                'posts_per_page' => 6,
                'orderby' => 'menu_order',
                'order' => 'ASC',
            );
            $services_query = new WP_Query($services_args);

            if ($services_query->have_posts()) :
                while ($services_query->have_posts()) : $services_query->the_post();
                    $icon = get_post_meta(get_the_ID(), '_service_icon', true);
                    if (empty($icon)) {
                        $icon = 'fa-truck';
                    }
            ?>
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas <?php echo esc_attr($icon); ?>"></i>
                        </div>
                        <h3 class="service-title"><?php the_title(); ?></h3>
                        <div class="service-description"><?php the_excerpt(); ?></div>
                        <a href="<?php the_permalink(); ?>" class="service-link">
                            <?php esc_html_e('Xem chi tiết', 'obvietnam-custom'); ?>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
                // Display placeholder services if no services are found
                $placeholder_services = array(
                    array('title' => 'Vận chuyển hàng hoá', 'icon' => 'fa-truck', 'desc' => 'Cung cấp dịch vụ vận chuyển hàng hoá đa dạng từ đường bộ, đường biển đến đường hàng không với chi phí tối ưu.'),
                    array('title' => 'Dịch vụ kho bãi', 'icon' => 'fa-warehouse', 'desc' => 'Hệ thống kho bãi hiện đại, đáp ứng mọi nhu cầu lưu trữ, phân phối hàng hoá với quy trình quản lý chuyên nghiệp.'),
                    array('title' => 'Dịch vụ xuất nhập khẩu', 'icon' => 'fa-globe', 'desc' => 'Giải pháp xuất nhập khẩu toàn diện, hỗ trợ doanh nghiệp thông quan nhanh chóng và tuân thủ quy định.'),
                    array('title' => 'Tư vấn chuỗi cung ứng', 'icon' => 'fa-chart-line', 'desc' => 'Đội ngũ chuyên gia giàu kinh nghiệm tư vấn tối ưu hoá chuỗi cung ứng, giúp doanh nghiệp tiết kiệm chi phí.'),
                    array('title' => 'Phân phối hàng hoá', 'icon' => 'fa-box', 'desc' => 'Mạng lưới phân phối rộng khắp, đảm bảo hàng hoá đến tay người tiêu dùng nhanh chóng và an toàn.'),
                    array('title' => 'Dịch vụ giao hàng', 'icon' => 'fa-shipping-fast', 'desc' => 'Dịch vụ giao hàng nhanh chóng, đúng hẹn với hệ thống theo dõi trực tuyến giúp kiểm soát hàng hoá mọi lúc.'),
                );

                foreach ($placeholder_services as $service) :
            ?>
                    <div class="service-card">
                        <div class="service-icon">
                            <i class="fas <?php echo esc_attr($service['icon']); ?>"></i>
                        </div>
                        <h3 class="service-title"><?php echo esc_html($service['title']); ?></h3>
                        <div class="service-description"><?php echo esc_html($service['desc']); ?></div>
                    </div>
            <?php
                endforeach;
            endif;
            ?>
        </div>
    </div>
</section>
