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

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12 items-center mb-16">
            <div>
                <?php if (has_post_thumbnail()) : ?>
                    <div class="post-thumbnail rounded-lg overflow-hidden shadow-lg">
                        <?php the_post_thumbnail('full', ['class' => 'w-full h-auto']); ?>
                    </div>
                <?php else : ?>
                    <div class="bg-site-gray-light h-96 flex items-center justify-center rounded-lg shadow-lg">
                        <div class="text-center p-8">
                            <i class="fas fa-image text-5xl text-site-gray-dark mb-4"></i>
                            <p class="text-gray-600"><?php esc_html_e('Thêm hình ảnh đại diện cho trang này.', 'obvietnam-custom'); ?></p>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
            
            <div>
                <div class="prose max-w-none">
                    <?php the_content(); ?>
                </div>
            </div>
        </div>
        
        <!-- Company Values Section -->
        <section class="mb-16">
            <h2 class="section-heading text-center mb-12"><?php esc_html_e('Giá trị cốt lõi', 'obvietnam-custom'); ?></h2>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <div class="w-16 h-16 bg-site-blue rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-award text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-site-blue mb-3"><?php esc_html_e('Chất lượng', 'obvietnam-custom'); ?></h3>
                    <p class="text-gray-700"><?php esc_html_e('Cam kết cung cấp dịch vụ và sản phẩm chất lượng cao, đáp ứng và vượt trên sự mong đợi của khách hàng.', 'obvietnam-custom'); ?></p>
                </div>
                
                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <div class="w-16 h-16 bg-site-blue rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-handshake text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-site-blue mb-3"><?php esc_html_e('Tin cậy', 'obvietnam-custom'); ?></h3>
                    <p class="text-gray-700"><?php esc_html_e('Xây dựng mối quan hệ dựa trên sự tin cậy, minh bạch và trách nhiệm với khách hàng, đối tác và nhân viên.', 'obvietnam-custom'); ?></p>
                </div>
                
                <div class="bg-white p-6 rounded-lg shadow-md text-center">
                    <div class="w-16 h-16 bg-site-blue rounded-full flex items-center justify-center mx-auto mb-4">
                        <i class="fas fa-lightbulb text-white text-2xl"></i>
                    </div>
                    <h3 class="text-xl font-bold text-site-blue mb-3"><?php esc_html_e('Đổi mới', 'obvietnam-custom'); ?></h3>
                    <p class="text-gray-700"><?php esc_html_e('Không ngừng đổi mới, cải tiến quy trình và giải pháp để mang lại hiệu quả tối ưu cho khách hàng.', 'obvietnam-custom'); ?></p>
                </div>
            </div>
        </section>
        
        <!-- Team Section -->
        <section class="mb-16">
            <h2 class="section-heading text-center mb-12"><?php esc_html_e('Đội ngũ của chúng tôi', 'obvietnam-custom'); ?></h2>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <?php
                // Get team members from custom field if ACF is active
                if (function_exists('get_field') && get_field('team_members')) {
                    $team_members = get_field('team_members');
                    foreach ($team_members as $member) {
                        ?>
                        <div class="bg-white rounded-lg shadow-md overflow-hidden">
                            <?php if (!empty($member['photo'])) : ?>
                                <img src="<?php echo esc_url($member['photo']); ?>" alt="<?php echo esc_attr($member['name']); ?>" class="w-full h-64 object-cover">
                            <?php else : ?>
                                <div class="bg-site-gray-light h-64 flex items-center justify-center">
                                    <i class="fas fa-user text-4xl text-site-gray-dark"></i>
                                </div>
                            <?php endif; ?>
                            
                            <div class="p-4 text-center">
                                <h3 class="text-xl font-bold text-site-blue"><?php echo esc_html($member['name']); ?></h3>
                                <p class="text-site-green mb-2"><?php echo esc_html($member['position']); ?></p>
                                <?php if (!empty($member['description'])) : ?>
                                    <p class="text-sm text-gray-700 mb-3"><?php echo esc_html($member['description']); ?></p>
                                <?php endif; ?>
                                
                                <?php if (!empty($member['social_links'])) : ?>
                                    <div class="flex justify-center space-x-3 mt-3">
                                        <?php foreach ($member['social_links'] as $platform => $url) : ?>
                                            <?php if (!empty($url)) : ?>
                                                <a href="<?php echo esc_url($url); ?>" class="text-site-blue hover:text-site-blue-dark">
                                                    <i class="fab fa-<?php echo esc_attr($platform); ?>"></i>
                                                </a>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <?php
                    }
                } else {
                    // Display placeholder team members if no custom field data
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
                    
                    foreach ($placeholder_members as $member) {
                        ?>
                        <div class="bg-white rounded-lg shadow-md overflow-hidden">
                            <div class="bg-site-gray-light h-64 flex items-center justify-center">
                                <i class="fas fa-user text-4xl text-site-gray-dark"></i>
                            </div>
                            
                            <div class="p-4 text-center">
                                <h3 class="text-xl font-bold text-site-blue"><?php echo esc_html($member['name']); ?></h3>
                                <p class="text-site-green mb-2"><?php echo esc_html($member['position']); ?></p>
                                <p class="text-sm text-gray-700 mb-3"><?php esc_html_e('Thêm thông tin về thành viên này trong trang Giới thiệu.', 'obvietnam-custom'); ?></p>
                                
                                <div class="flex justify-center space-x-3 mt-3">
                                    <a href="#" class="text-site-blue hover:text-site-blue-dark">
                                        <i class="fab fa-linkedin"></i>
                                    </a>
                                    <a href="#" class="text-site-blue hover:text-site-blue-dark">
                                        <i class="fab fa-twitter"></i>
                                    </a>
                                    <a href="#" class="text-site-blue hover:text-site-blue-dark">
                                        <i class="fab fa-facebook"></i>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </section>
        
        <!-- Stats Section -->
        <section class="py-16 bg-site-blue text-white rounded-lg">
            <div class="container mx-auto px-4">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-8 text-center">
                    <div>
                        <h3 class="text-4xl font-bold mb-2">
                            <?php echo esc_html(get_theme_mod('stats_clients', '500+')); ?>
                        </h3>
                        <p><?php echo esc_html(get_theme_mod('stats_clients_text', 'Khách hàng tin tưởng')); ?></p>
                    </div>
                    <div>
                        <h3 class="text-4xl font-bold mb-2">
                            <?php echo esc_html(get_theme_mod('stats_experience', '10 năm+')); ?>
                        </h3>
                        <p><?php echo esc_html(get_theme_mod('stats_experience_text', 'Kinh nghiệm trong nghề')); ?></p>
                    </div>
                    <div>
                        <h3 class="text-4xl font-bold mb-2">
                            <?php echo esc_html(get_theme_mod('stats_partners', '50+')); ?>
                        </h3>
                        <p><?php echo esc_html(get_theme_mod('stats_partners_text', 'Đối tác Logistics')); ?></p>
                    </div>
                    <div>
                        <h3 class="text-4xl font-bold mb-2">
                            <?php echo esc_html(get_theme_mod('stats_satisfaction', '100%')); ?>
                        </h3>
                        <p><?php echo esc_html(get_theme_mod('stats_satisfaction_text', 'Khách hàng hài lòng')); ?></p>
                    </div>
                </div>
            </div>
        </section>
        
        <!-- Clients Section -->
        <section class="mt-16">
            <h2 class="section-heading text-center mb-12"><?php esc_html_e('Khách hàng tiêu biểu', 'obvietnam-custom'); ?></h2>
            
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-6 items-center justify-items-center">
                <?php
                // Get clients from custom field if ACF is active
                if (function_exists('get_field') && get_field('clients')) {
                    $clients = get_field('clients');
                    foreach ($clients as $client) {
                        ?>
                        <div class="bg-site-gray-light p-4 rounded-lg flex items-center justify-center h-24 w-full">
                            <?php if (!empty($client['logo'])) : ?>
                                <img src="<?php echo esc_url($client['logo']); ?>" alt="<?php echo esc_attr($client['name']); ?>" class="max-h-16">
                            <?php else : ?>
                                <div class="text-site-blue font-bold text-xl"><?php echo esc_html($client['name']); ?></div>
                            <?php endif; ?>
                        </div>
                        <?php
                    }
                } else {
                    // Display placeholder clients if no custom field data
                    for ($i = 1; $i <= 12; $i++) {
                        ?>
                        <div class="bg-site-gray-light p-4 rounded-lg flex items-center justify-center h-24 w-full">
                            <div class="text-site-blue font-bold text-xl"><?php echo sprintf(esc_html__('Client %d', 'obvietnam-custom'), $i); ?></div>
                        </div>
                        <?php
                    }
                }
                ?>
            </div>
        </section>
    </div>
</main>

<?php
get_footer();
