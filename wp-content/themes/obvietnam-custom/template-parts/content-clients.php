<?php
/**
 * Template part for displaying clients section
 *
 * @package OB_Vietnam_Custom
 */
?>

<section class="clients-section section">
    <div class="site-container">
        <h2 class="section-heading"><?php esc_html_e('KHÁCH HÀNG TIÊU BIỂU', 'obvietnam-custom'); ?></h2>
        <div class="section-description">
            <?php esc_html_e('Chúng tôi tự hào được hợp tác với các doanh nghiệp hàng đầu trong nhiều lĩnh vực.', 'obvietnam-custom'); ?>
        </div>

        <div class="clients-grid autoplay">
            <?php
            $clients_args = array(
                'post_type' => 'clients',
                'posts_per_page' => -1,
                'orderby' => 'menu_order',
                'order' => 'ASC',
            );
            $clients_query = new WP_Query($clients_args);

            if ($clients_query->have_posts()) :
                while ($clients_query->have_posts()) : $clients_query->the_post();
            ?>
                    <div class="client-item">
                        <?php if (has_post_thumbnail()) : ?>
                            <?php the_post_thumbnail(); ?>
                        <?php else : ?>
                            <div class="client-name"><?php the_title(); ?></div>
                        <?php endif; ?>
                    </div>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
                // Display placeholder clients if no clients are found
                for ($i = 1; $i <= 6; $i++) :
            ?>
                    <div class="client-item">
                        <div class="client-name"><?php echo sprintf(esc_html__('Client %d', 'obvietnam-custom'), $i); ?></div>
                    </div>
            <?php
                endfor;
            endif;
            ?>
        </div>
    </div>
</section>
