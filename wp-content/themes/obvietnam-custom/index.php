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

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php
                /* Start the Loop */
                while ( have_posts() ) :
                    the_post();
                    ?>
                    <article id="post-<?php the_ID(); ?>" <?php post_class('bg-white rounded-lg shadow-md overflow-hidden'); ?>>
                        <?php if ( has_post_thumbnail() ) : ?>
                            <div class="post-thumbnail">
                                <a href="<?php the_permalink(); ?>">
                                    <?php the_post_thumbnail('news-thumbnail', ['class' => 'w-full h-64 object-cover']); ?>
                                </a>
                            </div>
                        <?php endif; ?>
                        
                        <div class="p-6">
                            <header class="entry-header mb-4">
                                <?php the_title( '<h2 class="entry-title text-xl font-bold"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark" class="text-site-blue hover:text-site-blue-dark">', '</a></h2>' ); ?>
                                
                                <div class="entry-meta text-sm text-gray-600 mt-2">
                                    <span class="posted-on">
                                        <i class="far fa-calendar-alt mr-1"></i>
                                        <?php echo get_the_date(); ?>
                                    </span>
                                    <span class="mx-2">|</span>
                                    <span class="byline">
                                        <i class="far fa-user mr-1"></i>
                                        <?php the_author(); ?>
                                    </span>
                                </div>
                            </header>

                            <div class="entry-content">
                                <?php the_excerpt(); ?>
                            </div>
                            
                            <footer class="entry-footer mt-4">
                                <a href="<?php the_permalink(); ?>" class="btn-primary inline-block">
                                    <?php esc_html_e( 'Xem thêm', 'obvietnam-custom' ); ?>
                                    <i class="fas fa-arrow-right ml-2"></i>
                                </a>
                            </footer>
                        </div>
                    </article>
                <?php endwhile; ?>
            </div>

            <div class="pagination mt-8 flex justify-center">
                <?php
                the_posts_pagination(
                    array(
                        'mid_size'  => 2,
                        'prev_text' => '<i class="fas fa-chevron-left"></i> ' . esc_html__( 'Trước', 'obvietnam-custom' ),
                        'next_text' => esc_html__( 'Sau', 'obvietnam-custom' ) . ' <i class="fas fa-chevron-right"></i>',
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
