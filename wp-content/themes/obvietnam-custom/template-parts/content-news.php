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

        <div class="news-grid">
            <?php
            $news_args = array(
                'post_type' => 'post',
                'posts_per_page' => 3,
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
            else :
                // Display placeholder news if no posts are found
                $placeholder_news = array(
                    array(
                        'title' => 'Xu hướng logistics năm 2023: Chuyển đổi số và tự động hóa',
                        'date' => '15/01/2023',
                        'excerpt' => 'Ngành logistics đang chứng kiến làn sóng chuyển đổi số mạnh mẽ với việc ứng dụng công nghệ AI, IoT và tự động hóa trong quản lý chuỗi cung ứng.'
                    ),
                    array(
                        'title' => 'OB Việt Nam mở rộng mạng lưới đối tác tại châu Âu',
                        'date' => '20/02/2023',
                        'excerpt' => 'OB Việt Nam Group vừa ký kết thỏa thuận hợp tác chiến lược với các đối tác logistics hàng đầu tại Đức, Pháp và Hà Lan.'
                    ),
                    array(
                        'title' => 'Giải pháp xanh cho chuỗi cung ứng bền vững',
                        'date' => '05/03/2023',
                        'excerpt' => 'OB Việt Nam Group triển khai các giải pháp logistics xanh, góp phần giảm thiểu tác động môi trường và xây dựng chuỗi cung ứng bền vững.'
                    ),
                );
                
                foreach ($placeholder_news as $news) :
            ?>
                    <div class="news-card">
                        <div class="news-image">
                            <img src="<?php echo esc_url(get_template_directory_uri() . '/assets/images/news-placeholder.png'); ?>" alt="<?php echo esc_attr($news['title']); ?>">
                        </div>
                        <div class="news-content">
                            <div class="news-date"><?php echo esc_html($news['date']); ?></div>
                            <h3 class="news-title"><?php echo esc_html($news['title']); ?></h3>
                            <div class="news-excerpt"><?php echo esc_html($news['excerpt']); ?></div>
                            <a href="#" class="news-link">
                                <?php esc_html_e('Xem thêm', 'obvietnam-custom'); ?>
                                <i class="fas fa-arrow-right"></i>
                            </a>
                        </div>
                    </div>
            <?php
                endforeach;
            endif;
            ?>
        </div>

        <div class="text-center mt-5">
            <a href="<?php echo esc_url(get_permalink(get_option('page_for_posts'))); ?>" class="btn btn-secondary">
                <?php esc_html_e('Xem tất cả tin tức', 'obvietnam-custom'); ?>
            </a>
        </div>
    </div>
</section>
