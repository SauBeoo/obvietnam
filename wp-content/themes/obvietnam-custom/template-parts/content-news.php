<?php
/**
 * Template part for displaying news section
 *
 * @package OB_Vietnam_Custom
 */
?>

<section class="news-section section">
    <div class="site-container">
        <h2 class="section-heading news-section-title"><?php echo esc_html(get_theme_mod('news_section_title', 'TIN TỨC & SỰ KIỆN')); ?></h2>
        <div class="section-description news-section-description">
            <?php echo esc_html(get_theme_mod('news_section_description', 'Cập nhật những tin tức mới nhất về ngành logistics và chuỗi cung ứng.')); ?>
        </div>
        <div class="slider-data relative">
            <div class="news-grid slider">
                <?php
                $news_args = array(
                    'post_type' => 'post',
                    'posts_per_page' => 6,
                    'orderby' => 'date',
                    'order' => 'DESC',
                );
                $news_query = new WP_Query($news_args);

                if ($news_query->have_posts()) :
                    while ($news_query->have_posts()) : $news_query->the_post();
                ?>
                    <div class="news-card">
                        <div class="news-image">
                            <?php if (has_post_thumbnail()) : ?>
                                <?php the_post_thumbnail('news-thumbnail'); ?>
                            <?php else : ?>
                                <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/news-placeholder.png'); ?>" alt="<?php the_title_attribute(); ?>">
                            <?php endif; ?>
                        </div>
                        <div class="news-content">
                            <div class="news-date"><?php echo get_the_date(); ?></div>
                            <h3 class="news-title"><?php the_title(); ?></h3>
                            <div class="news-excerpt"><?php the_excerpt(); ?></div>
                            <a href="<?php the_permalink(); ?>" class="news-link">
                                <?php esc_html_e('Xem thêm', 'obvietnam-custom'); ?>
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
                <?php
                    endwhile;
                    wp_reset_postdata();
                endif;
                ?>
            </div>
            <button class="prev-btn"><i class="fa-solid fa-circle-chevron-left"></i></button>
            <button class="next-btn"><i class="fa-solid fa-circle-chevron-right"></i></button>
        </div>
        <div class="text-center mt-5">
            <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>" class="btn btn-primary contact-button">
                <?php esc_html_e('Xem tất cả tin tức', 'obvietnam-custom'); ?>
            </a>
        </div>
    </div>
</section>
