<?php
/**
 * The template for displaying archive product posts
 *
 * @package OB_Vietnam_Custom
 */
get_header();
?>

<div class="container mx-auto px-4 py-8 flex flex-wrap md:flex-nowrap gap-8">
    <!-- Sidebar Danh mục -->
    <div class="w-full md:w-1/4 bg-gray-100 p-6 rounded-lg shadow-md">
        <h2 class="text-xl font-bold mb-6 text-gray-800 border-b-2 border-blue-100 pb-3 flex items-center">
            <i class="fas fa-list mr-2 text-blue-500"></i>
            Danh mục sản phẩm
        </h2>
        <?php
        $active_slug = isset($_GET['product_category']) ? sanitize_text_field($_GET['product_category']) : '';

        display_category_tree(0, 'product_category', $active_slug);
        ?>
    </div>
    <!-- Main Content -->
    <div class="w-full md:w-3/4">
        <!-- Sorting -->
        <div class="bg-gray-100 rounded-xl shadow-sm p-4 mb-6 flex flex-col sm:flex-row justify-between items-center">
            <div class="text-gray-600 mb-2 sm:mb-0">
                <span class="font-medium">Hiển thị</span>
                <?php
                $current_page = max(1, get_query_var('paged'));
                $per_page = 16;
                $total = $wp_query->found_posts;
                printf(' %d - %d của %d sản phẩm',
                    ($current_page - 1) * $per_page + 1,
                    min($current_page * $per_page, $total),
                    $total
                );
                ?>
            </div>
            <div class="flex items-center space-x-4">
                <div class="flex items-center">
                    <span class="text-gray-600 mr-2">Sắp xếp:</span>
                    <div class="relative">
                        <select id="sort" class="appearance-none bg-white border border-gray-300 rounded-lg px-4 py-2 pr-8 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-gray-700"  onchange="window.location.href=this.value">
                            <?php
                            $current_order = isset($_GET['order']) ? $_GET['order'] : 'desc';
                            $base_url = add_query_arg(array());
                            ?>
                            <option value="<?= add_query_arg('order', 'desc', $base_url) ?>" <?= selected($current_order, 'desc') ?>>Mới nhất</option>
                            <option value="<?= add_query_arg('order', 'asc', $base_url) ?>" <?= selected($current_order, 'asc') ?>>Cũ nhất</option>
                        </select>
                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
                            <i class="fas fa-chevron-down text-xs"></i>
                        </div>
                    </div>
                </div>
            </div>  
        </div>

        <!-- Product Grid -->
        <?php
        global $wp_query;

        // Xử lý tham số sắp xếp
        $current_order = isset($_GET['order']) ? sanitize_text_field($_GET['order']) : 'DESC';
        ?>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
                <div class="bg-white rounded-xl shadow-md overflow-hidden transition-all duration-300 hover:shadow-lg product-card relative">
                    <a href="<?php the_permalink(); ?>">
                        <div class="bg-gradient-to-br from-emerald-500 to-blue-500 rounded-2xl flex items-center justify-center mx-auto mb-6">
                            <?php if (has_post_thumbnail()) : ?>
                                <img class="w-full h-48 object-cover" src="<?= esc_url(get_the_post_thumbnail_url()) ?>" alt="<?php the_title(); ?>">
                            <?php endif; ?>
                        </div>
                        <div class="p-4">
                            <p class="text-gray-800 font-medium text-center mb-2 hover:text-blue-600 transition-colors"><?php the_title(); ?></p>
                        </div>
                    </a>
                </div>
            <?php endwhile; ?>
        </div>

    <!-- Pagination -->
        <div class="mt-8 flex justify-center">
            <?php
            $big = 999999999; // Số lớn không thể
            $args = array(
                'base'    => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                'format'  => '?paged=%#%',
                'current' => max(8, get_query_var('paged')),
                'total'   => $wp_query->max_num_pages,
                'prev_text' => __('«'),
                'next_text' => __('»'),
                'type'    => 'list',
                'add_args' => array(
                    'order' => $current_order,
                    'product_category' => isset($_GET['product_category']) ? $_GET['product_category'] : ''
                )
            );
            echo paginate_links($args);
            ?>
        </div>

    <?php else : ?>
        <div class="text-center py-12 text-gray-500">Không có sản phẩm nào</div>
    <?php endif; ?>
    </div>
    </div>
</div>

<?php get_footer(); ?>