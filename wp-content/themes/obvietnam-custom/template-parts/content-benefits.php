<?php
/**
 * Template part for displaying benefits section
 *
 * @package OB_Vietnam_Custom
 */
?>

<section class="benefits-section section">
    <div class="site-container">
        <h2 class="section-heading"><?php esc_html_e('LỢI ÍCH KHI CHỌN OB VIỆT NAM GROUP', 'obvietnam-custom'); ?></h2>
        <div class="section-description">
            <?php esc_html_e('Chúng tôi cam kết mang đến những giá trị tốt nhất cho khách hàng.', 'obvietnam-custom'); ?>
        </div>

        <div class="benefits-grid">
            <?php
            $benefits_args = array(
                'post_type' => 'benefits',
                'posts_per_page' => 3,
                'orderby' => 'menu_order',
                'order' => 'ASC',
            );
            $benefits_query = new WP_Query($benefits_args);

            if ($benefits_query->have_posts()) :
                while ($benefits_query->have_posts()) : $benefits_query->the_post();
                    $icon = get_post_meta(get_the_ID(), '_benefit_icon', true);
                    
                    if (empty($icon)) {
                        $icon = 'fa-award';
                    }
            ?>
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas <?php echo esc_attr($icon); ?>"></i>
                        </div>
                        <div class="benefit-content">
                            <h3 class="benefit-title"><?php the_title(); ?></h3>
                            <div class="benefit-description"><?php the_content(); ?></div>
                        </div>
                    </div>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
                // Display placeholder benefits if no benefits are found
                $placeholder_benefits = array(
                    array(
                        'title' => 'An toàn & Bảo mật',
                        'icon' => 'fa-shield-alt',
                        'desc' => 'Chúng tôi đảm bảo an toàn tuyệt đối cho hàng hoá của bạn trong suốt quá trình vận chuyển và lưu kho với hệ thống bảo mật nghiêm ngặt.'
                    ),
                    array(
                        'title' => 'Tiết kiệm thời gian',
                        'icon' => 'fa-clock',
                        'desc' => 'Với quy trình tối ưu và đội ngũ chuyên nghiệp, chúng tôi giúp bạn tiết kiệm thời gian và tập trung vào hoạt động kinh doanh cốt lõi.'
                    ),
                    array(
                        'title' => 'Chuyên nghiệp & Uy tín',
                        'icon' => 'fa-handshake',
                        'desc' => 'Chúng tôi tự hào về đội ngũ nhân viên chuyên nghiệp, giàu kinh nghiệm và luôn đặt uy tín, chất lượng dịch vụ lên hàng đầu.'
                    ),
                );
                
                foreach ($placeholder_benefits as $benefit) :
            ?>
                    <div class="benefit-item">
                        <div class="benefit-icon">
                            <i class="fas <?php echo esc_attr($benefit['icon']); ?>"></i>
                        </div>
                        <div class="benefit-content">
                            <h3 class="benefit-title"><?php echo esc_html($benefit['title']); ?></h3>
                            <div class="benefit-description"><?php echo esc_html($benefit['desc']); ?></div>
                        </div>
                    </div>
            <?php
                endforeach;
            endif;
            ?>
        </div>
    </div>
</section>
