<?php
function obvietnam_get_post_views($postID){
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count == ''){
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
        return "0";
    }
    return $count;
}

function obvietnam_set_post_views($postID) {
    $count_key = 'post_views_count';
    $count = get_post_meta($postID, $count_key, true);
    if($count == ''){
        $count = 0;
        delete_post_meta($postID, $count_key);
        add_post_meta($postID, $count_key, '0');
    } else {
        $count++;
        update_post_meta($postID, $count_key, $count);
    }
}
function obvietnam_widgets_init() {
    register_sidebar(array(
        'name'          => __('Sidebar', 'obvietnam-custom'),
        'id'            => 'sidebar-1',
        'description'   => __('Add widgets here to appear in your sidebar.', 'obvietnam-custom'),
        'before_widget' => '<div class="bg-white rounded-lg shadow-md p-6 mb-6">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="text-xl font-bold mb-4 pb-2 border-b border-gray-200">',
        'after_title'   => '</h3>',
    ));
}
add_action('widgets_init', 'obvietnam_widgets_init');

function custom_content_styling($content) {
    // Bỏ qua nếu nội dung trống
    if (empty($content)) return $content;

    $dom = new DOMDocument();
    $libxml_prev_state = libxml_use_internal_errors(true); // Tắt báo lỗi XML

    // Thêm mã hóa UTF-8 và xử lý HTML
    $wrapper_content = mb_convert_encoding(
        '<!DOCTYPE html><html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head><body>' . $content . '</body></html>',
        'HTML-ENTITIES',
        'UTF-8'
    );

    $dom->loadHTML($wrapper_content, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);
    libxml_clear_errors();
    libxml_use_internal_errors($libxml_prev_state);

    // Xử lý các thẻ
    foreach ($dom->getElementsByTagName('h2') as $h2) {
        $h2->setAttribute('class', 'text-2xl font-bold my-4');
    }

    foreach ($dom->getElementsByTagName('h3') as $h3) {
        $h3->setAttribute('class', 'text-xl font-bold mb-3');
    }

    foreach ($dom->getElementsByTagName('p') as $p) {
        $p->setAttribute('class', trim($p->getAttribute('class') . ' mb-4'));
    }

    foreach ($dom->getElementsByTagName('ul') as $ul) {
        $ul->setAttribute('class', 'mb-6 pros');
    }

    foreach ($dom->getElementsByTagName('li') as $li) {
        $li_class = $li->getAttribute('class');
        $li->setAttribute('class', trim($li_class . ' mb-2 flex items-start'));

        // Tạo icon
        $icon = $dom->createElement('i');
        $icon_class = 'mt-1 mr-2'; // Mặc định

        // Check parent ul
        if ($li->parentNode && $li->parentNode instanceof DOMElement) {
            $ul_class = $li->parentNode->getAttribute('class');

            if (strpos($ul_class, 'pros') !== false) {
                $icon_class = 'fas fa-check-circle text-green-500 mt-1 mr-2';
            } elseif (strpos($ul_class, 'cons') !== false) {
                $icon_class = 'fas fa-times-circle text-red-500 mt-1 mr-2';
            }
        }

        $icon->setAttribute('class', $icon_class);

        // Di chuyển nội dung gốc vào fragment
        $content_fragment = $dom->createDocumentFragment();
        while ($li->childNodes->length > 0) {
            $content_fragment->appendChild($li->firstChild);
        }

        // Thêm icon và nội dung vào li
        $li->appendChild($icon);
        $li->appendChild($content_fragment);
    }

    // Lấy nội dung body và loại bỏ wrapper
    $body = $dom->getElementsByTagName('body')->item(0);
    $new_content = '';
    foreach ($body->childNodes as $node) {
        $new_content .= $dom->saveHTML($node);
    }

    return $new_content;
}
add_filter('the_content', 'custom_content_styling');


function obvietnam_custom_comment($comment, $args, $depth) {
    $GLOBALS['comment'] = $comment; ?>

<div <?php comment_class('flex flex-col md:flex-row gap-4 mb-6'); ?> id="comment-<?php comment_ID(); ?>">
    <!-- Avatar -->
    <div class="flex-shrink-0">
        <?php echo get_avatar($comment, $args['avatar_size'], '', '', array(
            'class' => 'w-14 h-14 rounded-full object-cover shadow-sm'
        )); ?>
    </div>

    <!-- Comment Content -->
    <div class="flex-1">
    <div class="bg-gray-50 p-4 rounded-lg relative">
        <!-- Comment Header -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-2">
            <div class="flex items-center space-x-2">
                <h4 class="font-semibold text-gray-900">
                    <?php echo get_comment_author_link(); ?>
                </h4>
                <?php if ($comment->user_id === get_the_author_meta('ID')) : ?>
                    <span class="px-2 py-1 bg-primary text-white text-xs rounded-full">Tác giả</span>
                <?php endif; ?>
            </div>

            <span class="text-sm text-gray-500 mt-1 md:mt-0">
                        <?php printf(__('%1$s - %2$s', 'obvietnam-custom'),
                            get_comment_date('d/m/Y'),
                            get_comment_time()
                        ); ?>
                    </span>
        </div>

        <!-- Comment Text -->
        <div class="text-gray-700 prose max-w-none">
            <?php if ($comment->comment_approved == '0') : ?>
                <p class="text-yellow-600 text-sm italic"><?php _e('Bình luận của bạn đang chờ kiểm duyệt.', 'obvietnam-custom'); ?></p>
            <?php endif; ?>

            <?php comment_text(); ?>
        </div>

        <!-- Reply Button -->
        <div class="flex justify-end mt-3">
            <?php
            comment_reply_link(array_merge($args, array(
                'depth'     => $depth,
                'max_depth' => $args['max_depth'],
                'before'    => '<div class="text-sm text-primary hover:text-secondary cursor-pointer">',
                'after'     => '</div>',
                'reply_text' => '<i class="fas fa-reply mr-2"></i>' . __('Trả lời', 'obvietnam-custom')
            )));
            ?>
        </div>
    </div>

    <!-- Nested Comments -->
    <?php if ($depth < $args['max_depth']) : ?>
        <div class="ml-0 md:ml-8 mt-4">
    <?php endif;
}