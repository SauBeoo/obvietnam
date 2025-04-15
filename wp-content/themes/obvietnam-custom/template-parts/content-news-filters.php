<div class="mb-8 bg-white rounded-lg shadow p-4">
    <h2 class="text-lg font-semibold mb-4 text-gray-800">Danh mục tin tức</h2>
    <div class="flex flex-wrap gap-2">
        <?php
        // Lấy link trang tin tức mặc định
        $news_page_url = get_permalink(get_page_by_path('tin-tuc'));
        $is_news_page = is_page('tin-tuc');
        ?>

        <a href="<?php echo esc_url($news_page_url); ?>"
           class="<?php echo $is_news_page ? 'bg-blue-500 text-white' : 'bg-gray-100 hover:bg-gray-200'; ?> 
                  px-4 py-2 rounded-full text-sm font-medium transition-colors">
            Tất cả
        </a>

        <?php
        $categories = get_categories([
            'exclude' => [1], // Loại bỏ uncategorized
            'orderby' => 'count',
            'order' => 'DESC'
        ]);

        foreach ($categories as $category) :
            $is_active = is_category($category->term_id);
            ?>
            <a href="<?php echo esc_url(get_category_link($category)); ?>"
               class="<?php echo $is_active ? 'bg-blue-500 text-white' : 'bg-gray-100 hover:bg-gray-200'; ?> 
                      px-4 py-2 rounded-full text-sm font-medium transition-colors">
                <?php echo esc_html($category->name); ?>
            </a>
        <?php endforeach; ?>
    </div>
</div>