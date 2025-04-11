<?php
/**
 * Hàm hiển thị cây danh mục sản phẩm theo dạng đệ quy.
 *
 * @param int    $parent_id    ID của danh mục cha (mặc định là 0).
 * @param string $taxonomy     Tên taxonomy, ví dụ 'product_category'.
 * @param string $active_slug  Slug của danh mục đang được chọn (active).
 * @param int    $level        Mức độ lồng nhau (0 là cấp cao nhất).
 *
 * @return bool  Trả về true nếu trong nhánh này có danh mục đang active, false nếu không.
 */
function display_category_tree($parent_id = 0, $taxonomy = 'product_category', $active_slug = '', $level = 0): bool
{
    $terms = get_terms([
        'taxonomy'   => $taxonomy,
        'hide_empty' => false,
        'parent'     => $parent_id
    ]);

    if (empty($terms) || is_wp_error($terms)) {
        return false;
    }

    // Tự động chọn danh mục đầu tiên nếu chưa có danh mục active và là level gốc
    if ($parent_id === 0 && $level === 0 && empty($active_slug)) {
        $first_term = reset($terms);
        $active_slug = $first_term->slug;
    }

    $branch_active = false;

    echo '<ul class="space-y-2">';
    foreach ($terms as $term) {
        $is_current_active = ($active_slug === $term->slug);

        ob_start();
        $icon_class = get_term_meta($term->term_id, 'icon_class', true);
        $child_active = display_category_tree($term->term_id, $taxonomy, $active_slug, $level + 1);
        $child_html = ob_get_clean();

        $is_open = ($is_current_active || $child_active) ? 'true' : 'false';
        $active_class = $is_current_active ? 'bg-blue-100 text-blue-600' : 'text-gray-700 hover:bg-gray-50';

        // Xác định icon
        $icon = !empty($icon_class) ? $icon_class : 'fa-circle';
        $icon_color = 'text-gray-400';
        $icon_size = 'text-xs';
        switch ($level) {
            case 0:
                $icon_color = 'text-gray-500';
                $icon_size = '';
                break;
            case 1:
                $icon_color = 'text-gray-400';
                $icon_size = '';
                break;
        }

        // Margin-left cho danh sách con
        $ml_class = $level >= 1 ? 'ml-4' : 'ml-8';
        ?>
        <li x-data="{ isOpen: <?= $is_open ?> }" class="relative">
            <div class="flex items-center justify-between <?= $active_class ?> rounded-lg px-3 py-2 transition-colors cursor-pointer category-item"
                 @click="isOpen = !isOpen">
                <div class="flex items-center">
                    <i class="fas <?= $icon ?> mr-2 <?= $icon_color ?> <?= $icon_size ?>"></i>
                    <a href="?product_category=<?= esc_attr($term->slug) ?>" class="font-medium" @click.stop>
                        <?= esc_html($term->name) ?>
                    </a>
                </div>
                <?php if (!empty($child_html)) : ?>
                    <button class="p-1 rounded-full transition-colors hover:bg-gray-200">
                        <i class="fas fa-chevron-right text-xs transition-transform duration-200"
                           :class="{ 'rotate-90': isOpen }"></i>
                    </button>
                <?php endif; ?>
            </div>

            <?php if (!empty($child_html)) : ?>
                <div x-show="isOpen" x-collapse class="<?= $ml_class ?> mt-1">
                    <ul class="space-y-2 border-l-2 border-gray-200 pl-4">
                        <?= $child_html ?>
                    </ul>
                </div>
            <?php endif; ?>
        </li>
        <?php

        if ($is_current_active || $child_active) {
            $branch_active = true;
        }
    }
    echo '</ul>';

    return $branch_active;
}

