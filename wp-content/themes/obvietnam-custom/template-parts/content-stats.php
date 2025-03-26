<?php
/**
 * Template part for displaying stats section
 *
 * @package OB_Vietnam_Custom
 */
?>

<section class="stats-section">
    <div class="site-container">
        <div class="stats-grid">
            <div class="stat-item">
                <div class="stat-number stats-clients-number"><?php echo esc_html(get_theme_mod('stats_clients', '500+')); ?></div>
                <div class="stat-text stats-clients-text"><?php echo esc_html(get_theme_mod('stats_clients_text', 'Khách hàng tin tưởng')); ?></div>
            </div>
            
            <div class="stat-item">
                <div class="stat-number stats-experience-number"><?php echo esc_html(get_theme_mod('stats_experience', '10 năm+')); ?></div>
                <div class="stat-text stats-experience-text"><?php echo esc_html(get_theme_mod('stats_experience_text', 'Kinh nghiệm trong nghề')); ?></div>
            </div>
            
            <div class="stat-item">
                <div class="stat-number stats-partners-number"><?php echo esc_html(get_theme_mod('stats_partners', '50+')); ?></div>
                <div class="stat-text stats-partners-text"><?php echo esc_html(get_theme_mod('stats_partners_text', 'Đối tác Logistics')); ?></div>
            </div>
            
            <div class="stat-item">
                <div class="stat-number stats-satisfaction-number"><?php echo esc_html(get_theme_mod('stats_satisfaction', '100%')); ?></div>
                <div class="stat-text stats-satisfaction-text"><?php echo esc_html(get_theme_mod('stats_satisfaction_text', 'Khách hàng hài lòng')); ?></div>
            </div>
        </div>
    </div>
</section>
