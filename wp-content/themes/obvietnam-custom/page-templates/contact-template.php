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
        <div class="site-container py-12 lg:py-16">
            <!-- Header Section -->
            <header class="page-header mb-12 text-center space-y-4">
                <h1 class="text-4xl md:text-5xl font-bold text-slate-800 tracking-tight">
                    <?php the_title(); ?>
                </h1>
                <?php if (has_excerpt()) : ?>
                    <div class="page-description max-w-3xl mx-auto text-lg text-slate-600 leading-relaxed">
                        <?php the_excerpt(); ?>
                    </div>
                <?php endif; ?>
                <div class="h-1 w-24 bg-emerald-500 mx-auto rounded-full"></div>
            </header>

            <!-- Contact Content -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 lg:gap-12">
                <!-- Contact Information -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-2xl shadow-xl p-8 lg:p-10 border border-gray-100">
                        <h2 class="text-2xl font-bold text-slate-800 mb-6 pb-2 border-b-2 border-emerald-500">
                            <?php esc_html_e('Thông tin liên hệ', 'obvietnam-custom'); ?>
                        </h2>

                        <ul class="space-y-6">
                            <li class="flex items-start">
                                <div class="w-10 h-10 bg-emerald-500/10 rounded-lg flex items-center justify-center mr-4">
                                    <i class="fas fa-map-marker-alt text-emerald-600 text-lg"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-slate-700 mb-1"><?php esc_html_e('Địa chỉ', 'obvietnam-custom'); ?></h3>
                                    <p class="text-slate-600"><?php echo esc_html(get_theme_mod('contact_address', '123 Nguyễn Trãi, Thanh Xuân, Hà Nội')); ?></p>
                                </div>
                            </li>

                            <li class="flex items-start">
                                <div class="w-10 h-10 bg-emerald-500/10 rounded-lg flex items-center justify-center mr-4">
                                    <i class="fas fa-phone text-emerald-600 text-lg"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-slate-700 mb-1"><?php esc_html_e('Điện thoại', 'obvietnam-custom'); ?></h3>
                                    <p class="text-slate-600"><?php echo esc_html(get_theme_mod('contact_phone', '0987 654 321')); ?></p>
                                </div>
                            </li>

                            <li class="flex items-start">
                                <div class="w-10 h-10 bg-emerald-500/10 rounded-lg flex items-center justify-center mr-4">
                                    <i class="fas fa-envelope text-emerald-600 text-lg"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-slate-700 mb-1"><?php esc_html_e('Email', 'obvietnam-custom'); ?></h3>
                                    <p class="text-slate-600 break-all"><?php echo esc_html(get_theme_mod('contact_email', 'info@obvietnam.com')); ?></p>
                                </div>
                            </li>

                            <li class="flex items-start">
                                <div class="w-10 h-10 bg-emerald-500/10 rounded-lg flex items-center justify-center mr-4">
                                    <i class="fas fa-clock text-emerald-600 text-lg"></i>
                                </div>
                                <div>
                                    <h3 class="font-semibold text-slate-700 mb-1"><?php esc_html_e('Giờ làm việc', 'obvietnam-custom'); ?></h3>
                                    <p class="text-slate-600"><?php echo esc_html(get_theme_mod('contact_hours', 'Thứ 2 - Thứ 7: 8:00 - 17:30')); ?></p>
                                </div>
                            </li>
                        </ul>

                        <!-- Social Links -->
                        <div class="mt-10 pt-6 border-t border-gray-100">
                            <h3 class="font-semibold text-slate-700 mb-4"><?php esc_html_e('Kết nối với chúng tôi', 'obvietnam-custom'); ?></h3>
                            <div class="flex space-x-5">
                                <?php
                                $socials = [
                                    'facebook' => get_theme_mod('social_facebook', '#'),
                                    'twitter' => get_theme_mod('social_twitter', '#'),
                                    'linkedin' => get_theme_mod('social_linkedin', '#'),
                                    'youtube' => get_theme_mod('social_youtube', '#')
                                ];

                                foreach ($socials as $platform => $url) :
                                    if ($url) : ?>
                                        <a href="<?php echo esc_url($url); ?>"
                                           class="w-10 h-10 bg-emerald-500/10 hover:bg-emerald-500/20 rounded-full flex items-center justify-center transition-colors"
                                           target="_blank"
                                           rel="noopener">
                                            <i class="fab fa-<?php echo $platform; ?> text-emerald-600 text-lg"></i>
                                        </a>
                                    <?php endif;
                                endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Contact Form -->
                <div class="lg:col-span-2">
                    <div class="bg-white rounded-2xl shadow-xl p-8 lg:p-10 border border-gray-100">
                        <h2 class="text-2xl font-bold text-slate-800 mb-6 pb-2 border-b-2 border-emerald-500">
                            <?php esc_html_e('Gửi tin nhắn cho chúng tôi', 'obvietnam-custom'); ?>
                        </h2>

                        <?php if (function_exists('wpcf7_contact_form')) :
                            $contact_form_id = get_theme_mod('contact_form_id');
                            if ($contact_form_id) : ?>
                                <div class="contact-form-wrapper">
                                    <?php echo do_shortcode('[contact-form-7 id="' . esc_attr($contact_form_id) . '"]'); ?>
                                </div>
                            <?php else : ?>
                                <!-- Custom Form Fallback -->
                                <form class="space-y-6">
                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <div>
                                            <label class="block text-sm font-medium text-slate-700 mb-2">
                                                <?php esc_html_e('Họ tên', 'obvietnam-custom'); ?> *
                                            </label>
                                            <input type="text" required
                                                   class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-slate-700 mb-2">
                                                <?php esc_html_e('Email', 'obvietnam-custom'); ?> *
                                            </label>
                                            <input type="email" required
                                                   class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all">
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <div>
                                            <label class="block text-sm font-medium text-slate-700 mb-2">
                                                <?php esc_html_e('Số điện thoại', 'obvietnam-custom'); ?>
                                            </label>
                                            <input type="tel"
                                                   class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-slate-700 mb-2">
                                                <?php esc_html_e('Chủ đề', 'obvietnam-custom'); ?>
                                            </label>
                                            <input type="text"
                                                   class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all">
                                        </div>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-slate-700 mb-2">
                                            <?php esc_html_e('Nội dung tin nhắn', 'obvietnam-custom'); ?> *
                                        </label>
                                        <textarea rows="5" required
                                                  class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-emerald-500 transition-all"></textarea>
                                    </div>

                                    <button type="submit"
                                            class="w-full bg-emerald-500 hover:bg-emerald-600 text-white font-semibold py-3 px-6 rounded-lg transition-all transform hover:scale-[1.02] shadow-md hover:shadow-lg">
                                        <?php esc_html_e('Gửi tin nhắn', 'obvietnam-custom'); ?>
                                    </button>
                                </form>
                            <?php endif; ?>
                        <?php else : ?>
                            <!-- Plugin Warning -->
                            <div class="bg-amber-50 border-l-4 border-amber-400 p-4 rounded-lg mb-6">
                                <div class="flex items-center">
                                    <i class="fas fa-exclamation-triangle text-amber-500 text-xl mr-3"></i>
                                    <div>
                                        <p class="text-sm text-amber-700">
                                            <?php esc_html_e('Để hiển thị form liên hệ, vui lòng cài đặt và kích hoạt plugin Contact Form 7.', 'obvietnam-custom'); ?>
                                        </p>
                                    </div>
                                </div>
                            </div>

                            <!-- Custom Form Fallback -->
                            <form class="space-y-6">
                                <!-- Same form structure as above -->
                            </form>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

            <!-- Google Map Section -->
            <div class="mt-12 lg:mt-16">
                <h2 class="text-2xl font-bold text-slate-800 mb-6 pb-2 border-b-2 border-emerald-500">
                    <?php esc_html_e('Bản đồ', 'obvietnam-custom'); ?>
                </h2>

                <?php if (!empty($map_embed)) : ?>
                    <div class="rounded-2xl shadow-xl overflow-hidden border border-gray-200">
                        <?php echo $map_embed; ?>
                    </div>
                <?php else : ?>
                    <div class="bg-gray-50 rounded-2xl shadow-xl h-96 flex items-center justify-center border-2 border-dashed border-gray-200">
                        <div class="text-center p-8 max-w-md">
                            <i class="fas fa-map-marked-alt text-4xl text-gray-400 mb-4"></i>
                            <p class="text-gray-500">
                                <?php esc_html_e('Thêm mã nhúng Google Maps trong Tùy chỉnh Theme để hiển thị bản đồ tại đây.', 'obvietnam-custom'); ?>
                            </p>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </main>

<?php
get_footer();
