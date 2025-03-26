<?php
/**
 * The template for displaying the contact page
 *
 * Template Name: Contact Page
 *
 * @package OB_Vietnam_Custom
 */

get_header();
?>

<main id="primary" class="site-main">
    <div class="site-container py-12">
        <header class="page-header mb-8 text-center">
            <h1 class="section-heading">
                <?php the_title(); ?>
            </h1>
            <?php if (has_excerpt()) : ?>
                <div class="page-description max-w-3xl mx-auto">
                    <?php the_excerpt(); ?>
                </div>
            <?php endif; ?>
        </header>

        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            <!-- Contact Information -->
            <div class="lg:col-span-1">
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-xl font-bold text-site-blue mb-4"><?php esc_html_e('Thông tin liên hệ', 'obvietnam-custom'); ?></h2>
                    
                    <ul class="space-y-4">
                        <li class="flex">
                            <i class="fas fa-map-marker-alt text-site-blue mt-1 mr-3 text-lg"></i>
                            <div>
                                <h3 class="font-semibold"><?php esc_html_e('Địa chỉ', 'obvietnam-custom'); ?></h3>
                                <p><?php echo esc_html(get_theme_mod('contact_address', '123 Nguyễn Trãi, Thanh Xuân, Hà Nội')); ?></p>
                            </div>
                        </li>
                        <li class="flex">
                            <i class="fas fa-phone text-site-blue mt-1 mr-3 text-lg"></i>
                            <div>
                                <h3 class="font-semibold"><?php esc_html_e('Điện thoại', 'obvietnam-custom'); ?></h3>
                                <p><?php echo esc_html(get_theme_mod('contact_phone', '0987 654 321')); ?></p>
                            </div>
                        </li>
                        <li class="flex">
                            <i class="fas fa-envelope text-site-blue mt-1 mr-3 text-lg"></i>
                            <div>
                                <h3 class="font-semibold"><?php esc_html_e('Email', 'obvietnam-custom'); ?></h3>
                                <p><?php echo esc_html(get_theme_mod('contact_email', 'info@obvietnam.com')); ?></p>
                            </div>
                        </li>
                        <li class="flex">
                            <i class="fas fa-clock text-site-blue mt-1 mr-3 text-lg"></i>
                            <div>
                                <h3 class="font-semibold"><?php esc_html_e('Giờ làm việc', 'obvietnam-custom'); ?></h3>
                                <p><?php echo esc_html(get_theme_mod('contact_hours', 'Thứ 2 - Thứ 7: 8:00 - 17:30')); ?></p>
                            </div>
                        </li>
                    </ul>
                    
                    <div class="mt-6">
                        <h3 class="font-semibold mb-2"><?php esc_html_e('Kết nối với chúng tôi', 'obvietnam-custom'); ?></h3>
                        <div class="flex space-x-4">
                            <a href="<?php echo esc_url(get_theme_mod('social_facebook', '#')); ?>" class="text-site-blue hover:text-site-blue-dark">
                                <i class="fab fa-facebook-f text-xl"></i>
                            </a>
                            <a href="<?php echo esc_url(get_theme_mod('social_twitter', '#')); ?>" class="text-site-blue hover:text-site-blue-dark">
                                <i class="fab fa-twitter text-xl"></i>
                            </a>
                            <a href="<?php echo esc_url(get_theme_mod('social_linkedin', '#')); ?>" class="text-site-blue hover:text-site-blue-dark">
                                <i class="fab fa-linkedin-in text-xl"></i>
                            </a>
                            <a href="<?php echo esc_url(get_theme_mod('social_youtube', '#')); ?>" class="text-site-blue hover:text-site-blue-dark">
                                <i class="fab fa-youtube text-xl"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Contact Form -->
            <div class="lg:col-span-2">
                <div class="bg-white rounded-lg shadow-md p-6">
                    <h2 class="text-xl font-bold text-site-blue mb-4"><?php esc_html_e('Gửi tin nhắn cho chúng tôi', 'obvietnam-custom'); ?></h2>
                    
                    <?php
                    // Display contact form if Contact Form 7 is active
                    if (function_exists('wpcf7_contact_form')) {
                        $contact_form_id = get_theme_mod('contact_form_id');
                        if ($contact_form_id) {
                            echo do_shortcode('[contact-form-7 id="' . esc_attr($contact_form_id) . '"]');
                        } else {
                            // Display default form if no Contact Form 7 ID is set
                            ?>
                            <form action="#" method="post" class="contact-form">
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                    <div>
                                        <label for="name" class="block text-gray-700 mb-1"><?php esc_html_e('Họ tên', 'obvietnam-custom'); ?> <span class="text-red-500">*</span></label>
                                        <input type="text" id="name" name="name" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-site-blue focus:border-site-blue" required>
                                    </div>
                                    <div>
                                        <label for="email" class="block text-gray-700 mb-1"><?php esc_html_e('Email', 'obvietnam-custom'); ?> <span class="text-red-500">*</span></label>
                                        <input type="email" id="email" name="email" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-site-blue focus:border-site-blue" required>
                                    </div>
                                </div>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                    <div>
                                        <label for="phone" class="block text-gray-700 mb-1"><?php esc_html_e('Số điện thoại', 'obvietnam-custom'); ?></label>
                                        <input type="tel" id="phone" name="phone" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-site-blue focus:border-site-blue">
                                    </div>
                                    <div>
                                        <label for="subject" class="block text-gray-700 mb-1"><?php esc_html_e('Chủ đề', 'obvietnam-custom'); ?></label>
                                        <input type="text" id="subject" name="subject" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-site-blue focus:border-site-blue">
                                    </div>
                                </div>
                                <div class="mb-4">
                                    <label for="message" class="block text-gray-700 mb-1"><?php esc_html_e('Nội dung tin nhắn', 'obvietnam-custom'); ?> <span class="text-red-500">*</span></label>
                                    <textarea id="message" name="message" rows="5" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-site-blue focus:border-site-blue" required></textarea>
                                </div>
                                <div>
                                    <button type="submit" class="btn-primary"><?php esc_html_e('Gửi tin nhắn', 'obvietnam-custom'); ?></button>
                                </div>
                            </form>
                            <?php
                        }
                    } else {
                        // Display message if Contact Form 7 is not active
                        ?>
                        <div class="bg-yellow-50 border-l-4 border-yellow-400 p-4">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <i class="fas fa-exclamation-triangle text-yellow-400"></i>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm text-yellow-700">
                                        <?php esc_html_e('Để hiển thị form liên hệ, vui lòng cài đặt và kích hoạt plugin Contact Form 7.', 'obvietnam-custom'); ?>
                                    </p>
                                </div>
                            </div>
                        </div>
                        
                        <form action="#" method="post" class="contact-form mt-4">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                <div>
                                    <label for="name" class="block text-gray-700 mb-1"><?php esc_html_e('Họ tên', 'obvietnam-custom'); ?> <span class="text-red-500">*</span></label>
                                    <input type="text" id="name" name="name" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-site-blue focus:border-site-blue" required>
                                </div>
                                <div>
                                    <label for="email" class="block text-gray-700 mb-1"><?php esc_html_e('Email', 'obvietnam-custom'); ?> <span class="text-red-500">*</span></label>
                                    <input type="email" id="email" name="email" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-site-blue focus:border-site-blue" required>
                                </div>
                            </div>
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-4">
                                <div>
                                    <label for="phone" class="block text-gray-700 mb-1"><?php esc_html_e('Số điện thoại', 'obvietnam-custom'); ?></label>
                                    <input type="tel" id="phone" name="phone" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-site-blue focus:border-site-blue">
                                </div>
                                <div>
                                    <label for="subject" class="block text-gray-700 mb-1"><?php esc_html_e('Chủ đề', 'obvietnam-custom'); ?></label>
                                    <input type="text" id="subject" name="subject" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-site-blue focus:border-site-blue">
                                </div>
                            </div>
                            <div class="mb-4">
                                <label for="message" class="block text-gray-700 mb-1"><?php esc_html_e('Nội dung tin nhắn', 'obvietnam-custom'); ?> <span class="text-red-500">*</span></label>
                                <textarea id="message" name="message" rows="5" class="w-full px-4 py-2 border border-gray-300 rounded-md focus:ring-2 focus:ring-site-blue focus:border-site-blue" required></textarea>
                            </div>
                            <div>
                                <button type="submit" class="btn-primary"><?php esc_html_e('Gửi tin nhắn', 'obvietnam-custom'); ?></button>
                            </div>
                        </form>
                        <?php
                    }
                    ?>
                </div>
            </div>
        </div>
        
        <!-- Google Map -->
        <div class="mt-12">
            <h2 class="text-xl font-bold text-site-blue mb-4"><?php esc_html_e('Bản đồ', 'obvietnam-custom'); ?></h2>
            
            <?php
            // Display Google Map if map embed code is set
            $map_embed = get_theme_mod('contact_map_embed');
            if (!empty($map_embed)) {
                echo '<div class="map-container rounded-lg overflow-hidden shadow-md">';
                echo $map_embed;
                echo '</div>';
            } else {
                // Display placeholder if no map embed code is set
                ?>
                <div class="map-placeholder bg-site-gray-light rounded-lg overflow-hidden shadow-md h-96 flex items-center justify-center">
                    <div class="text-center p-8">
                        <i class="fas fa-map-marked-alt text-5xl text-site-gray-dark mb-4"></i>
                        <p class="text-gray-600"><?php esc_html_e('Thêm mã nhúng Google Maps trong Tùy chỉnh Theme để hiển thị bản đồ tại đây.', 'obvietnam-custom'); ?></p>
                    </div>
                </div>
                <?php
            }
            ?>
        </div>
    </div>
</main>

<?php
get_footer();
