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
        <div class="site-container py-16 lg:py-20">
            <!-- Hero Section -->
            <header class="page-header mb-12 lg:mb-20 text-center space-y-6">
                <h1 class="text-4xl md:text-5xl font-bold text-slate-800 tracking-tight animate-fade-in-up">
                    <?php the_title(); ?>
                </h1>
                <?php if (has_excerpt()) : ?>
                    <div class="page-description max-w-3xl mx-auto text-lg text-slate-600 leading-relaxed">
                        <?php the_excerpt(); ?>
                    </div>
                <?php endif; ?>
                <div class="h-1 w-24 bg-emerald-500 mx-auto rounded-full opacity-80"></div>
            </header>

            <!-- About Section -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 xl:gap-16 items-center mb-20 lg:mb-28">
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
                <div class="prose max-w-none lg:pl-12">
                    <h2 class="text-3xl font-bold text-slate-800 mb-6">Hành Trình 10 Năm Phát Triển</h2>
                    <p class="text-lg text-gray-600 leading-relaxed mb-6">
                        Từ những bước đi đầu tiên trong lĩnh vực logistics đến vị thế dẫn đầu ngành hiện nay,
                        chúng tôi luôn không ngừng đổi mới và cam kết mang lại giải pháp tối ưu cho khách hàng.
                    </p>
                    <ul class="space-y-3 text-gray-600">
                        <li class="flex items-center">
                            <i class="fas fa-check-circle text-emerald-500 mr-3"></i>
                            Đội ngũ chuyên gia giàu kinh nghiệm
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check-circle text-emerald-500 mr-3"></i>
                            Hệ thống công nghệ hiện đại
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-check-circle text-emerald-500 mr-3"></i>
                            Mạng lưới đối tác toàn cầu
                        </li>
                    </ul>
                </div>
                <div class="prose lg:prose-lg max-w-none lg:pl-12">
                    <div class="space-y-6 text-slate-700">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>

            <!-- Core Values -->
            <section class="mb-20 lg:mb-28">
                <h2 class="text-3xl lg:text-4xl font-bold text-center text-slate-800 mb-14 lg:mb-20">
                    <span class="border-b-4 border-emerald-500 pb-2"><?php esc_html_e('Giá trị cốt lõi', 'obvietnam-custom'); ?></span>
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6 lg:gap-8">
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
                        <div class="bg-white p-8 rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 hover:-translate-y-2">
                            <div class="w-20 h-20 bg-gradient-to-br from-emerald-500 to-blue-500 rounded-2xl flex items-center justify-center mx-auto mb-6">
                                <i class="fas fa-<?php echo $value['icon']; ?> text-3xl text-white"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-slate-800 text-center mb-4"><?php echo esc_html($value['title']); ?></h3>
                            <p class="text-gray-600 text-center leading-relaxed"><?php echo esc_html($value['content']); ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </section>

            <!-- Team Section -->
            <section class="mb-20 lg:mb-28">
                <h2 class="text-3xl lg:text-4xl font-bold text-center text-slate-800 mb-14 lg:mb-20">
                    <span class="border-b-4 border-emerald-500 pb-2"><?php esc_html_e('Đội ngũ của chúng tôi', 'obvietnam-custom'); ?></span>
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-8">
                    <?php if (function_exists('get_field') && get_field('team_members')) :
                        while (have_rows('team_members')) : the_row(); ?>
                            <div class="group bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                                <div class="relative h-72 bg-gray-100 overflow-hidden">
                                    <?php if ($photo = get_sub_field('photo')) : ?>
                                        <img src="<?php echo esc_url($photo); ?>" alt="<?php echo esc_attr(get_sub_field('name')); ?>"
                                             class="w-full h-full object-cover transform transition-transform duration-300 group-hover:scale-105">
                                    <?php else : ?>
                                        <div class="absolute inset-0 flex items-center justify-center bg-gradient-to-br from-gray-50 to-gray-100">
                                            <i class="fas fa-user text-5xl text-gray-400/80"></i>
                                        </div>
                                    <?php endif; ?>
                                </div>

                                <div class="p-6 text-center space-y-3">
                                    <h3 class="text-xl font-bold text-slate-800"><?php the_sub_field('name'); ?></h3>
                                    <p class="text-emerald-500 font-medium"><?php the_sub_field('position'); ?></p>
                                    <?php if ($description = get_sub_field('description')) : ?>
                                        <p class="text-sm text-gray-600"><?php echo esc_html($description); ?></p>
                                    <?php endif; ?>

                                    <?php if (have_rows('social_links')) : ?>
                                        <div class="flex justify-center space-x-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                            <?php while (have_rows('social_links')) : the_row();
                                                $platform = get_sub_field('platform');
                                                $url = get_sub_field('url');
                                                if ($url) : ?>
                                                    <a href="<?php echo esc_url($url); ?>"
                                                       class="text-slate-600 hover:text-emerald-500 transition-colors"
                                                       target="_blank"
                                                       aria-label="<?php echo esc_attr($platform); ?>">
                                                        <i class="fab fa-<?php echo esc_attr($platform); ?> text-lg"></i>
                                                    </a>
                                                <?php endif;
                                            endwhile; ?>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endwhile;
                    else :
                        $placeholder_members = array(
                            array(
                                'name' => 'Nguyễn Văn A',
                                'position' => 'Giám đốc điều hành',
                            ),
                            array(
                                'name' => 'Trần Thị B',
                                'position' => 'Giám đốc vận hành',
                            ),
                            array(
                                'name' => 'Lê Văn C',
                                'position' => 'Trưởng phòng kinh doanh',
                            ),
                            array(
                                'name' => 'Phạm Thị D',
                                'position' => 'Trưởng phòng marketing',
                            ),
                        );
                        foreach ($placeholder_members as $member) : ?>
                            <div class="group bg-white rounded-2xl shadow-lg hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2">
                                <div class="relative h-72 bg-gradient-to-br from-gray-50 to-gray-100 overflow-hidden">
                                    <div class="absolute inset-0 flex items-center justify-center">
                                        <i class="fas fa-user text-5xl text-gray-400/80"></i>
                                    </div>
                                </div>

                                <div class="p-6 text-center space-y-3">
                                    <h3 class="text-xl font-bold text-slate-800"><?php echo esc_html($member['name']); ?></h3>
                                    <p class="text-emerald-500 font-medium"><?php echo esc_html($member['position']); ?></p>
                                    <div class="flex justify-center space-x-4 opacity-0 group-hover:opacity-100 transition-opacity duration-300">
                                        <?php foreach (['linkedin', 'twitter', 'facebook'] as $platform) : ?>
                                            <a href="#" class="text-slate-600 hover:text-emerald-500 transition-colors">
                                                <i class="fab fa-<?php echo $platform; ?> text-lg"></i>
                                            </a>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach;
                    endif; ?>
                </div>
            </section>

        </div>
    </main>

<?php
get_footer();
