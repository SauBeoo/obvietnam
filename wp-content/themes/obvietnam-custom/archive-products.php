<?php
/*
Template Name: Product Page
*/
get_header();
?>

    <div class="container mx-auto px-4 py-8 flex flex-wrap md:flex-nowrap gap-8">
        <!-- Sidebar Danh mục -->
        <div class="w-full md:w-1/4 bg-gray-100 p-6 rounded-lg shadow-md">
            <h2 class="text-xl font-semibold mb-4 text-gray-800 border-b pb-2">Danh mục sản phẩm</h2>
            <?php
            $active_slug = isset($_GET['product_category']) ? sanitize_text_field($_GET['product_category']) : '';

            display_category_tree(0, 'product_category', $active_slug);
            ?>
        </div>
        <!-- Main Content -->
        <div class="w-full md:w-3/4">
            <!-- Sorting -->
            <div class="mb-6 flex justify-between items-center bg-gray-100 p-4 rounded-lg shadow-md">
                <div class="text-gray-600">
                    <?php
                    $current_page = max(1, get_query_var('paged'));
                    $per_page = 16;
                    $total = $wp_query->found_posts;
                    printf('Hiển thị %d - %d của %d sản phẩm',
                        ($current_page - 1) * $per_page + 1,
                        min($current_page * $per_page, $total),
                        $total
                    );
                    ?>
                </div>
                <select id="sort" class="border rounded px-4 py-2" onchange="window.location.href=this.value">
                    <?php
                    $current_order = isset($_GET['order']) ? $_GET['order'] : 'desc';
                    $base_url = add_query_arg(array());
                    ?>
                    <option value="<?= add_query_arg('order', 'desc', $base_url) ?>" <?= selected($current_order, 'desc') ?>>Mới nhất</option>
                    <option value="<?= add_query_arg('order', 'asc', $base_url) ?>" <?= selected($current_order, 'asc') ?>>Cũ nhất</option>
                </select>
            </div>

            <!-- Product Grid -->
            <?php
            $paged = get_query_var('paged') ? get_query_var('paged') : 1;
            $args = [
                'post_type' => 'products',
                'posts_per_page' => 1,
                'paged' => $paged,
                'orderby' => 'date',
                'order' => $current_order,
            ];

            if (isset($_GET['product_category'])) {
                $args['tax_query'] = [
                    [
                        'taxonomy' => 'product_category',
                        'field' => 'slug',
                        'terms' => sanitize_text_field($_GET['product_category']),
                    ]
                ];
            }

            $products = new WP_Query($args);

            if ($products->have_posts()) :
                ?>
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                    <?php while ($products->have_posts()) : $products->the_post(); ?>
                        <div class="bg-white p-4 shadow-lg inset-shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                            <a href="<?php the_permalink(); ?>">
                                <div class="bg-gradient-to-br from-emerald-500 to-blue-500 rounded-2xl flex items-center justify-center mx-auto mb-6">
                                    <?php if (has_post_thumbnail()) : ?>
                                        <img class="w-full h-48 object-cover" src="<?= esc_url(get_the_post_thumbnail_url()) ?>" alt="<?php the_title(); ?>">
                                    <?php endif; ?>
                                </div>
                                <p class="text-base mb-2 text-gray-800 text-center"><?php the_title(); ?></p>
                            </a>
                        </div>
                    <?php endwhile; ?>
                </div>

                <!-- Pagination -->
                <div class="mt-8 flex justify-center">
                    <?php
                    echo paginate_links([
                        'base' => str_replace(999999999, '%#%', esc_url(get_pagenum_link(999999999))),
                        'format' => '?paged=%#%',
                        'current' => max(1, $paged),
                        'total' => $products->max_num_pages,
                        'prev_text' => __('«'),
                        'next_text' => __('»'),
                        'type' => 'list',
                        'add_args' => isset($_GET['product_category']) ? ['product_category' => $_GET['product_category']] : [],
                    ]);
                    ?>
                </div>
            <?php else : ?>
                <div class="text-center py-12 text-gray-500">Không có sản phẩm nào</div>
            <?php endif; wp_reset_postdata(); ?>
        </div>
    </div>

<?php get_footer(); ?>