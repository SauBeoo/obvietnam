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
            <header class="page-header mb-12 text-center space-y-4 p-6">
                <h1 class="text-4xl md:text-5xl font-bold text-slate-800 tracking-tight color-title">
                    <?php the_title(); ?>
                </h1>
                <?php if (has_excerpt()) : ?>
                    <div class="page-description max-w-3xl mx-auto text-lg text-slate-600 leading-relaxed">
                        <?php the_excerpt(); ?>
                    </div>
                <?php endif; ?>
                <div class="h-1 w-24 bg-black mx-auto rounded-full"></div>
            </header>

            <!-- Contact Content -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8 lg:gap-12">
                <!-- Contact Information -->
                <div class="lg:col-span-1">
                    <div class="bg-white rounded-2xl shadow-xl p-8 lg:p-10 border border-gray-100">
                        <h2 class="text-2xl font-bold text-slate-800 mb-6 pb-2 border-b-2 border-blue-500">
                            <?php esc_html_e('Thông tin liên hệ', 'obvietnam-custom'); ?>
                        </h2>

                        <ul class="space-y-6" style="margin-left: 0">
                            <?php
                            $values = [
                                    [
                                        'icon' => 'map-marker-alt',
                                        'title' => 'Địa chỉ',
                                        'content' => 'Quốc lộ 13, Khu phố 4, phường Mỹ Phước, Thị Xã Bến Cát, Tỉnh Bình Dương.'
                                    ],
                                    [
                                        'icon' => 'phone',
                                        'title' => 'Điện thoại',
                                        'content' => '02743.599.079 – 02743.599.078'
                                    ],
                                    [
                                        'icon' => 'envelope',
                                        'title' => 'Email',
                                        'content' => 'sale.obvietnam@gmail.com'
                                    ],
                                    [
                                        'icon' => 'clock',
                                        'title' => 'Giờ làm việc',
                                        'content' => 'Thứ 2 - Thứ 7: 8:00 - 17:30'
                                    ],
                                ];
                            foreach ($values as $key => $value) : ?>
                                <li class="flex items-start">
                                    <?php if($key === 0):?>
                                        <div class="w-15 h-10 bg-blue-500/10 rounded-lg flex items-center justify-center mr-4">
                                    <?php else :?>
                                        <div class="w-10 h-10 bg-blue-500/10 rounded-lg flex items-center justify-center mr-4">
                                     <?php endif; ?>
                                    <i class="fas fa-<?php echo $value['icon']; ?> text-blue-600 text-lg"></i>
                                    </div>
                                    <div>
                                        <h3 class="font-semibold text-slate-700 mb-1"><?php echo esc_html($value['title']); ?></h3>
                                        <p class="text-slate-600"><?php echo esc_html($value['content']); ?></p>
                                    </div>
                                </li>
                            <?php endforeach; ?>
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
                                           class="w-10 h-10 bg-blue-500/10 hover:bg-emerald-500/20 rounded-full flex items-center justify-center transition-colors"
                                           target="_blank"
                                           rel="noopener">
                                            <i class="fab fa-<?php echo $platform; ?> text-blue-600 text-lg"></i>
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
                        <h2 class="text-2xl font-bold text-slate-800 mb-6 pb-2 border-b-2 border-blue-500">
                            <?php esc_html_e('Gửi tin nhắn cho chúng tôi', 'obvietnam-custom'); ?>
                        </h2>

                        <?php if (function_exists('wpcf7_contact_form')) :
                            $contact_form_id = "3b47747";
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
                                                   class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-blue-500 transition-all">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-slate-700 mb-2">
                                                <?php esc_html_e('Email', 'obvietnam-custom'); ?> *
                                            </label>
                                            <input type="email" required
                                                   class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-blue-500 transition-all">
                                        </div>
                                    </div>

                                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                                        <div>
                                            <label class="block text-sm font-medium text-slate-700 mb-2">
                                                <?php esc_html_e('Số điện thoại', 'obvietnam-custom'); ?>
                                            </label>
                                            <input type="tel"
                                                   class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-blue-500 transition-all">
                                        </div>
                                        <div>
                                            <label class="block text-sm font-medium text-slate-700 mb-2">
                                                <?php esc_html_e('Chủ đề', 'obvietnam-custom'); ?>
                                            </label>
                                            <input type="text"
                                                   class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-blue-500 transition-all">
                                        </div>
                                    </div>

                                    <div>
                                        <label class="block text-sm font-medium text-slate-700 mb-2">
                                            <?php esc_html_e('Nội dung tin nhắn', 'obvietnam-custom'); ?> *
                                        </label>
                                        <textarea rows="5" required
                                                  class="w-full px-4 py-3 border border-gray-200 rounded-lg focus:ring-2 focus:ring-emerald-500 focus:border-blue-500 transition-all"></textarea>
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
            <div class="mt-12 lg:mt-16 mb-6">
                <h2 class="text-2xl font-bold text-slate-800 mb-6 pb-2 border-b-2 border-blue-500">
                    <?php esc_html_e('Bản đồ', 'obvietnam-custom'); ?>
                </h2>
                <div class="bg-gray-50 rounded-2xl shadow-xl h-96 border-2 border-dashed border-gray-200 overflow-hidden">
                    <div class="w-full h-full">
                        <div class="w-full h-full flex flex-col">
                            <div class="flex-1 relative">
                                <div class="absolute inset-0 overflow-hidden rounded-xl">
                                    <iframe
                                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15657.94373937638!2d106.5989212152713!3d11.151611725737851!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMTHCsDA5JzA1LjciTiAxMDbCsDM2JzI3LjYiRQ!5e0!3m2!1sen!2s!4v1523285709116"
                                            class="w-full h-full"
                                            style="border:0;"
                                            allowfullscreen
                                            loading="lazy"
                                            referrerpolicy="no-referrer-when-downgrade">
                                    </iframe>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?php
get_footer();
