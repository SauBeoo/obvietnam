<!-- Popular Posts -->
<?php
get_template_part('template-parts/content', 'popular-posts');
?>
<!-- Categories -->
<div class="bg-white rounded-lg shadow-md p-6 mb-6">
    <h3 class="text-xl font-bold mb-4 pb-2 border-b border-gray-200"><?php esc_html_e('Danh mục', 'obvietnam-custom'); ?></h3>
    <ul class="space-y-2">
        <?php
        $categories = get_categories();
        foreach ($categories as $category) {
            echo '<li>';
            printf(
                '<a href="%s" class="flex items-center justify-between py-2 text-gray-700 hover:text-primary">',
                esc_url(get_category_link($category->term_id))
            );
            printf('<span>%s</span>', esc_html($category->name));
            printf(
                '<span class="bg-gray-100 text-gray-800 text-xs font-medium px-2.5 py-0.5 rounded-full">%s</span>',
                esc_html($category->count)
            );
            echo '</a></li>';
        }
        ?>
    </ul>
</div>

<!-- Tags -->
<div class="bg-white rounded-lg shadow-md p-6 mb-6">
    <h3 class="text-xl font-bold mb-4 pb-2 border-b border-gray-200"><?php esc_html_e('Tags', 'obvietnam-custom'); ?></h3>
    <div class="flex flex-wrap gap-2">
        <?php
        $tags = get_tags();
        foreach ($tags as $tag) {
            printf(
                '<a href="%s" class="px-3 py-1 bg-gray-100 text-gray-800 rounded-full text-sm hover:bg-primary hover:text-white">%s</a>',
                esc_url(get_tag_link($tag->term_id)),
                esc_html($tag->name)
            );
        }
        ?>
    </div>
</div>
