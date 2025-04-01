<?php
/*
Template Name: Product Page
*/
get_header();
?>

    <div class="container mx-auto px-4 py-8 flex flex-wrap md:flex-nowrap gap-8">
        <!-- Sidebar Danh mục -->
        <div class="w-full md:w-1/4 bg-white p-6 rounded-lg shadow-md">
            <h2 class="text-2xl font-bold mb-4 text-gray-800">Danh mục</h2>
            <ul class="space-y-2">
                <?php
                $terms = get_terms([
                    'taxonomy' => 'product_category',
                    'hide_empty' => false,
                ]);

                foreach ($terms as $term) {
                    $active_class = (isset($_GET['product_category']) && $_GET['product_category'] == $term->slug) ? 'bg-blue-500 text-white' : 'hover:bg-gray-100';
                    echo sprintf(
                        '<li><a href="?product_category=%s" class="block px-4 py-2 rounded %s transition-colors">%s</a></li>',
                        esc_attr($term->slug),
                        $active_class,
                        esc_html($term->name)
                    );
                }
                ?>
            </ul>
        </div>

        <!-- Main Content -->
        <div class="w-full md:w-3/4">
            <!-- Sorting -->
            <div class="mb-6 flex justify-between items-center bg-white p-4 rounded-lg shadow-md">
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
                'posts_per_page' => 16,
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
                        <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                            <a href="<?php the_permalink(); ?>">
                                <?php if (has_post_thumbnail()) : ?>
                                    <img class="w-full h-48 object-cover" src="<?= esc_url(get_the_post_thumbnail_url()) ?>" alt="<?php the_title(); ?>">
                                <?php endif; ?>
                                <div class="p-4">
                                    <p class="font-semibold text-lg mb-2 text-gray-800"><?php the_title(); ?></p>
                                </div>
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
                        'prev_text' => __('« Trước'),
                        'next_text' => __('Tiếp theo »'),
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