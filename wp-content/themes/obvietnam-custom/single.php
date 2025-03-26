<?php
/**
 * The template for displaying all single posts
 *
 * @package OB_Vietnam_Custom
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="site-container py-12">
        <?php
        while ( have_posts() ) :
            the_post();
            ?>
            <article id="post-<?php the_ID(); ?>" <?php post_class('bg-white rounded-lg shadow-md overflow-hidden'); ?>>
                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="post-thumbnail">
                        <?php the_post_thumbnail('full', ['class' => 'w-full h-auto object-cover']); ?>
                    </div>
                <?php endif; ?>
                
                <div class="p-8">
                    <header class="entry-header mb-6">
                        <?php the_title( '<h1 class="entry-title text-3xl font-bold text-site-blue">', '</h1>' ); ?>
                        
                        <div class="entry-meta text-sm text-gray-600 mt-3">
                            <span class="posted-on">
                                <i class="far fa-calendar-alt mr-1"></i>
                                <?php echo get_the_date(); ?>
                            </span>
                            <span class="mx-2">|</span>
                            <span class="byline">
                                <i class="far fa-user mr-1"></i>
                                <?php the_author(); ?>
                            </span>
                            <?php if ( has_category() ) : ?>
                                <span class="mx-2">|</span>
                                <span class="cat-links">
                                    <i class="far fa-folder-open mr-1"></i>
                                    <?php the_category( ', ' ); ?>
                                </span>
                            <?php endif; ?>
                        </div>
                    </header>

                    <div class="entry-content prose max-w-none">
                        <?php the_content(); ?>
                    </div>
                    
                    <footer class="entry-footer mt-8 pt-6 border-t border-gray-200">
                        <?php if ( has_tag() ) : ?>
                            <div class="tags-links mb-4">
                                <span class="font-semibold mr-2"><?php esc_html_e( 'Tags:', 'obvietnam-custom' ); ?></span>
                                <?php the_tags( '', ', ', '' ); ?>
                            </div>
                        <?php endif; ?>
                        
                        <div class="post-navigation mt-6">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div class="prev-post">
                                    <?php
                                    $prev_post = get_previous_post();
                                    if ( ! empty( $prev_post ) ) :
                                        ?>
                                        <span class="text-sm text-gray-600 block mb-1"><?php esc_html_e( 'Bài trước', 'obvietnam-custom' ); ?></span>
                                        <a href="<?php echo esc_url( get_permalink( $prev_post->ID ) ); ?>" class="text-site-blue hover:text-site-blue-dark font-medium">
                                            <i class="fas fa-chevron-left mr-2"></i>
                                            <?php echo esc_html( get_the_title( $prev_post->ID ) ); ?>
                                        </a>
                                    <?php endif; ?>
                                </div>
                                
                                <div class="next-post text-right">
                                    <?php
                                    $next_post = get_next_post();
                                    if ( ! empty( $next_post ) ) :
                                        ?>
                                        <span class="text-sm text-gray-600 block mb-1"><?php esc_html_e( 'Bài sau', 'obvietnam-custom' ); ?></span>
                                        <a href="<?php echo esc_url( get_permalink( $next_post->ID ) ); ?>" class="text-site-blue hover:text-site-blue-dark font-medium">
                                            <?php echo esc_html( get_the_title( $next_post->ID ) ); ?>
                                            <i class="fas fa-chevron-right ml-2"></i>
                                        </a>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </footer>
                </div>
            </article>

            <?php
            // If comments are open or we have at least one comment, load up the comment template.
            if ( comments_open() || get_comments_number() ) :
                comments_template();
            endif;
        endwhile; // End of the loop.
        ?>
    </div>
</main>

<?php
get_footer();
