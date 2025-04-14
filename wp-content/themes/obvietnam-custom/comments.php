<?php if (post_password_required()) return; ?>

<section class="mt-12 bg-white rounded-lg shadow-md p-6">
    <div class="space-y-8">
        <!-- Comment List -->
        <?php if (have_comments()) : ?>
            <h2 class="text-2xl font-bold mb-6 pb-2 border-b border-gray-200">
                <?php
                printf(
                    _nx('Bình luận (%1$s)', 'Bình luận (%1$s)', get_comments_number(), 'comments title', 'obvietnam-custom'),
                    number_format_i18n(get_comments_number())
                );
                ?>
            </h2>

            <div class="comment-list space-y-6">
                <?php
                wp_list_comments(array(
                    'style'         => 'div',
                    'callback'      => 'obvietnam_custom_comment',
                    'avatar_size'   => 56,
                    'short_ping'    => true,
                    'reply_text'    => __('Trả lời', 'obvietnam-custom'),
                    'max_depth'     => 2
                ));
                ?>
            </div>
        <?php endif; ?>

        <!-- Comment Form -->
        <div class="comment-respond">
            <?php
            $commenter = wp_get_current_commenter();
            $req = get_option('require_name_email');
            $aria_req = ($req ? " required" : '');

            $fields = array(
                'author' => '
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                        <div>
                            <input 
                                type="text" 
                                id="author" 
                                name="author" 
                                placeholder="' . esc_attr__('Họ và tên *', 'obvietnam-custom') . '" 
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                                value="' . esc_attr($commenter['comment_author']) . '" 
                                ' . $aria_req . '>
                        </div>',

                'email' => '
                        <div>
                            <input 
                                type="email" 
                                id="email" 
                                name="email" 
                                placeholder="' . esc_attr__('Email *', 'obvietnam-custom') . '" 
                                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent"
                                value="' . esc_attr($commenter['comment_author_email']) . '" 
                                ' . $aria_req . '>
                        </div>
                    </div>',
            );

            $comment_args = array(
                'title_reply'          => __('Để lại bình luận', 'obvietnam-custom'),
                'title_reply_before'   => '<h3 class="text-lg font-semibold mb-4">',
                'title_reply_after'    => '</h3>',
                'comment_notes_before' => '<p class="text-sm text-gray-500 mb-4">' . __('Email của bạn sẽ không được hiển thị công khai.', 'obvietnam-custom') . '</p>',
                'comment_field'        => '
                    <textarea 
                        id="comment" 
                        name="comment" 
                        rows="5" 
                        placeholder="' . esc_attr__('Nội dung bình luận *', 'obvietnam-custom') . '" 
                        class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary focus:border-transparent mb-4"
                        required></textarea>',
                'submit_button'        => '
                    <button 
                        type="submit" 
                        class="bg-primary text-white px-6 py-3 rounded-lg hover:bg-secondary transition-all duration-300 transform hover:scale-105">
                        ' . esc_html__('Gửi bình luận', 'obvietnam-custom') . '
                    </button>',
                'fields'               => $fields,
                'class_container'      => 'comment-form',
                'class_form'           => 'comment-form space-y-4',
            );

            comment_form($comment_args);
            ?>
        </div>
    </div>
</section>