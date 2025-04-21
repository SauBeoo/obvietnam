<?php
/**
 * The main template file
 *
 * @package OB_Vietnam_Custom
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="site-container py-12">
        <?php if ( have_posts() ) : ?>
            <header class="page-header mb-8">
                <h1 class="section-heading text-center">
                    <?php
                    if ( is_home() && ! is_front_page() ) {
                        single_post_title();
                    } elseif ( is_archive() ) {
                        the_archive_title();
                    } elseif ( is_search() ) {
                        printf( esc_html__( 'Kết quả tìm kiếm: %s', 'obvietnam-custom' ), '<span>' . get_search_query() . '</span>' );
                    }
                    ?>
                </h1>
                <?php
                if ( is_archive() ) {
                    the_archive_description( '<div class="archive-description text-center mb-8">', '</div>' );
                }
                ?>
            </header>
        
            <?php
            /* Start the Loop */
            while ( have_posts() ) :
                the_post();
                ?>
                <article id="post-<?php the_ID(); ?>" <?php post_class('bg-white rounded-lg shadow-md overflow-hidden'); ?>>
                    <div class="p-6">
                        <div class="entry-content">
                            <?php
                            // Sửa ở đây: Kiểm tra nếu là single post thì hiển thị full content
                            if (is_singular()) {
                                the_content();
                            } else {
                                the_excerpt();
                            }
                            ?>
                        </div>

                        <?php
                        // Sửa ở đây: Ẩn nút "Xem thêm" khi ở single post
                        if (!is_singular()) : ?>
                            <footer class="entry-footer mt-4">
                                <a href="<?php the_permalink(); ?>" class="news-link">
                                    <?php esc_html_e('Xem thêm', 'obvietnam-custom'); ?>
                                    <i class="fas fa-arrow-right ml-2"></i>
                                </a>
                            </footer>
                        <?php endif; ?>
                    </div>
                </article>
            <?php endwhile; ?>

            <div class="pagination mt-8 flex justify-center">
                <?php
                the_posts_pagination(
                    array(
                        'mid_size'  => 2,
                        'prev_text' => __('«'),
                        'next_text' => __('»'),
                    )
                );
                ?>
            </div>

        <?php else : ?>
            <div class="no-results bg-white p-8 rounded-lg shadow-md">
                <header class="page-header mb-4">
                    <h1 class="section-heading"><?php esc_html_e( 'Không tìm thấy', 'obvietnam-custom' ); ?></h1>
                </header>

                <div class="page-content">
                    <?php if ( is_search() ) : ?>
                        <p><?php esc_html_e( 'Không tìm thấy kết quả phù hợp với từ khóa. Vui lòng thử lại với từ khóa khác.', 'obvietnam-custom' ); ?></p>
                        <?php get_search_form(); ?>
                    <?php else : ?>
                        <p><?php esc_html_e( 'Không tìm thấy nội dung. Vui lòng thử tìm kiếm hoặc quay lại trang chủ.', 'obvietnam-custom' ); ?></p>
                        <?php get_search_form(); ?>
                    <?php endif; ?>
                </div>
            </div>
        <?php endif; ?>
    </div>
</main>

<?php
get_footer();
