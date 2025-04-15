<aside class="space-y-6">
    <!-- Popular News Widget -->
    <?php
    get_template_part('template-parts/content', 'popular-posts');
    ?>

    <!-- Tags Widget -->
    <div class="bg-white rounded-lg shadow p-5">
        <h2 class="text-lg font-semibold mb-4 text-gray-800 border-b pb-2">Từ khóa phổ biến</h2>
        <div class="flex flex-wrap gap-2">
            <?php
            $tags = get_tags([
                'orderby' => 'count',
                'order'   => 'DESC',
                'number'  => 10
            ]);

            foreach ($tags as $tag) : ?>
                <a href="<?php echo get_tag_link($tag->term_id); ?>"
                   class="bg-gray-100 hover:bg-gray-200 px-3 py-1 rounded-full text-sm transition">
                    #<?php echo $tag->name; ?>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</aside>