<?php
/**
 * Template part for displaying about section
 *
 * @package OB_Vietnam_Custom
 */
?>

<section class="about-section section">
    <div class="site-container">
        <div class="about-container">
            <div class="about-image">
            </div>
            <div class="about-content">
                <h2 class="about-title"><?php echo esc_html(get_theme_mod('features_section_title', 'GIỚI THIỆU VỀ OB VIỆT NAM GROUP')); ?></h2>
                <div class="about-description">
                    <?php echo esc_html(get_theme_mod('features_section_description', 'OB Việt Nam Group là đơn vị cung cấp giải pháp cung ứng hàng hoá toàn diện, kết nối chuỗi cung ứng trên khắp toàn cầu với hơn 10 năm kinh nghiệm.')); ?>
                </div>
                <div class="about-features">
                    <?php
                    // Display features from theme customizer
                    for ($i = 1; $i <= 4; $i++) :
                        $feature_title = get_theme_mod('feature_' . $i . '_title');
                        $feature_icon = get_theme_mod('feature_' . $i . '_icon', 'fa-check-circle');
                        
                        if (!empty($feature_title)) :
                    ?>
                        <div class="about-feature">
                            <i class="fas <?php echo esc_attr($feature_icon); ?>"></i>
                            <div><?php echo esc_html($feature_title); ?></div>
                        </div>
                    <?php
                        endif;
                    endfor;

                    // If no features are set in customizer, display placeholders
                    if (empty(get_theme_mod('feature_1_title'))) :
                        $placeholder_features = array(
                            'Đội ngũ nhân viên giàu kinh nghiệm',
                            'Mạng lưới đối tác rộng khắp toàn cầu',
                            'Giải pháp cung ứng tối ưu chi phí',
                            'Hệ thống quản lý hiện đại, chuyên nghiệp'
                        );
                        
                        foreach ($placeholder_features as $feature) :
                    ?>
                        <div class="about-feature">
                            <i class="fas fa-check-circle"></i>
                            <div><?php echo esc_html($feature); ?></div>
                        </div>
                    <?php
                        endforeach;
                    endif;
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>
