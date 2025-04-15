<?php
/**
 * The template for displaying the about page
 *
 * Template Name: About Page
 *
 * @package OB_Vietnam_Custom
 */

get_header();
?>
    <main id="primary" class="site-main">
        <div class="site-container py-5 lg:py-5">
            <!-- Hero Section -->
            <header class="page-header mb-12  text-center p-6">
                <h1 class="text-4xl md:text-5xl font-bold text-slate-800 tracking-tight animate-fade-in-up color-title" style="margin-bottom: 0px">
                    <?php the_title(); ?>
                </h1>
                <?php if (has_excerpt()) : ?>
                    <div class="page-description max-w-3xl mx-auto text-lg text-slate-600 leading-relaxed">
                        <?php the_excerpt(); ?>
                    </div>
                <?php endif; ?>
                <div class="h-1 w-24 bg-black mx-auto rounded-full opacity-80"></div>
            </header>

            <!-- About Section -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 xl:gap-16 items-center">
                <div class="relative group">
                    <?php if (has_post_thumbnail()) : ?>
                        <div class="post-thumbnail rounded-2xl overflow-hidden shadow-xl transform transition-all duration-300 hover:shadow-2xl hover:-translate-y-1">
                            <?php the_post_thumbnail('full', [
                                'class' => 'w-full h-auto object-cover aspect-video',
                                'loading' => 'lazy'
                            ]); ?>
                        </div>
                    <?php else : ?>
                        <div class="bg-gradient-to-br from-emerald-50 to-blue-50 h-[480px] rounded-2xl shadow-lg flex items-center justify-center group-hover:shadow-xl transition-all duration-300">
                            <div class="text-center space-y-4">
                                <i class="fas fa-building text-5xl text-emerald-600/80"></i>
                                <p class="text-gray-500 font-medium"><?php esc_html_e('Thêm hình ảnh đại diện cho trang này.', 'obvietnam-custom'); ?></p>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="prose max-w-none">
                    <h2 class="text-3xl font-bold text-slate-800 mb-6 color-title">Hành Trình 10 Năm Phát Triển</h2>
                    <p class="text-lg text-gray-600 leading-relaxed mb-6">
                        Từ những bước đi đầu tiên trong lĩnh vực logistics đến vị thế dẫn đầu ngành hiện nay,
                        chúng tôi luôn không ngừng đổi mới và cam kết mang lại giải pháp tối ưu cho khách hàng.
                    </p>
                    <ul class="text-gray-600" style="margin: 0">
                        <li class="flex items-center">
                            <i class="fas fa-check-circle text-emerald-500 mr-3 pe-2"></i>
                            Đội ngũ chuyên gia giàu kinh nghiệm
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check-circle text-emerald-500 mr-3 pe-2"></i>
                            Hệ thống công nghệ hiện đại
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check-circle text-emerald-500 mr-3 pe-2"></i>
                            Mạng lưới đối tác toàn cầu
                        </li>
                    </ul>
                </div>
            </div>
            <div class="prose lg:prose-lg max-w-none section">
                <div class="text-slate-700">
                    <?php the_content(); ?>
                </div>
            </div>
            <!-- Core Values -->
            <section >
                <h2 class="text-3xl lg:text-4xl font-bold text-center text-slate-800 mb-14 ">
                    <span class="pb-2 color-title"><?php esc_html_e('Giá trị cốt lõi', 'obvietnam-custom'); ?></span>
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8 pt-6">
                    <?php
                    $values = [
                        [
                            'icon' => 'award',
                            'title' => 'Chất lượng',
                            'content' => 'Cam kết cung cấp dịch vụ và sản phẩm chất lượng cao, đáp ứng và vượt trên sự mong đợi của khách hàng.'
                        ],
                        [
                            'icon' => 'handshake',
                            'title' => 'Tin cậy',
                            'content' => 'Xây dựng mối quan hệ dựa trên sự tin cậy, minh bạch và trách nhiệm với khách hàng, đối tác và nhân viên.'
                        ],
                        [
                            'icon' => 'lightbulb',
                            'title' => 'Đổi mới',
                            'content' => 'Không ngừng đổi mới, cải tiến quy trình và giải pháp để mang lại hiệu quả tối ưu cho khách hàng.'
                        ]
                    ];

                    foreach ($values as $value) : ?>
                        <div class="bg-white p-8 rounded-2xl shadow-lg inset-shadow-sm hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                            <div class="w-20 h-20 bg-gradient-to-br from-emerald-500 to-blue-500 rounded-2xl flex items-center justify-center mx-auto mb-6">
                                <i class="fas fa-<?php echo $value['icon']; ?> text-3xl text-white"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-slate-800 text-center mb-2 pt-2"><?php echo esc_html($value['title']); ?></h3>
                            <p class="text-gray-600 text-center leading-relaxed"><?php echo esc_html($value['content']); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>
        </div>
        <?php
            // Stats Section
            get_template_part('template-parts/content', 'stats');
            // Clients Section
            get_template_part('template-parts/content', 'clients');
        ?>
    </main>

<?php
get_footer();
