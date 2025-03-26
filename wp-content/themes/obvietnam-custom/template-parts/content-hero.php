<?php
/**
 * Template part for displaying hero section
 *
 * @package OB_Vietnam_Custom
 */
?>

<section class="hero-section">
    <div class="site-container">
        <div class="hero-container">
            <div class="hero-image">
            </div>
            <div class="hero-content">
                <h1 class="hero-title"><?php echo esc_html(get_theme_mod('hero_slide_1_title', 'GIẢI PHÁP CUNG ỨNG HÀNG HOÁ TOÀN DIỆN')); ?></h1>
                <div class="hero-description">
                    <?php echo esc_html(get_theme_mod('hero_slide_1_description', 'Chúng tôi cung cấp giải pháp cung ứng hàng hoá toàn diện từ nhà máy đến khách hàng, giúp doanh nghiệp tối ưu hoá chi phí và nâng cao hiệu quả quản lý.')); ?>
                </div>
                <a href="<?php echo esc_url(get_theme_mod('hero_button_link', '/lien-he')); ?>" class="btn btn-primary hero-button">
                    <?php echo esc_html(get_theme_mod('hero_button_text', 'Xem thêm')); ?>
                </a>
            </div>
        </div>
    </div>
    <div class="hero-shapes">
        <!-- Decorative shapes -->
    </div>
</section>
