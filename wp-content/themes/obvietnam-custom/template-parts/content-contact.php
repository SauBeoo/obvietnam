<?php
/**
 * Template part for displaying contact section
 *
 * @package OB_Vietnam_Custom
 */
?>

<section class="contact-section">
    <div class="site-container">
        <div class="contact-container">
            <h2 class="contact-title contact-section-title"><?php echo esc_html(get_theme_mod('contact_section_title', 'LIÊN HỆ VỚI CHÚNG TÔI')); ?></h2>
            <div class="contact-description">
                <?php echo esc_html(get_theme_mod('contact_section_description', 'Hãy liên hệ ngay với chúng tôi để được tư vấn và nhận giải pháp cung ứng hàng hoá tối ưu nhất cho doanh nghiệp của bạn')); ?>
            </div>
            <div class="text-center mt-4">
                <a href="<?php echo esc_url(get_theme_mod('contact_button_link', '/lien-he')); ?>" class="btn btn-primary contact-button">
                    <?php echo esc_html(get_theme_mod('contact_button_text', 'Liên hệ ngay')); ?>
                </a>
            </div>
        </div>
    </div>
    <div class="contact-shapes">
        <!-- Decorative shapes -->
    </div>
</section>
