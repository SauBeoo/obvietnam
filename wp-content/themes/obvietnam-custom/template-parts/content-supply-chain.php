<?php
/**
 * Template part for displaying supply chain solutions section
 *
 * @package OB_Vietnam_Custom
 */
?>

<section class="supply-chain-section section">
    <div class="site-container">
        <h2 class="section-heading"><?php esc_html_e('GIẢI PHÁP CHUỖI CUNG ỨNG TOÀN DIỆN', 'obvietnam-custom'); ?></h2>
        <div class="section-description">
            <?php esc_html_e('Chúng tôi cung cấp giải pháp chuỗi cung ứng toàn diện, giúp doanh nghiệp tối ưu hoá chi phí và nâng cao hiệu quả quản lý.', 'obvietnam-custom'); ?>
        </div>

        <div class="supply-chain-grid">
            <?php
            $solutions_args = array(
                'post_type' => 'solutions',
                'posts_per_page' => 4,
                'orderby' => 'menu_order',
                'order' => 'ASC',
            );
            $solutions_query = new WP_Query($solutions_args);

            if ($solutions_query->have_posts()) :
                while ($solutions_query->have_posts()) : $solutions_query->the_post();
                    $icon = get_post_meta(get_the_ID(), '_solution_icon', true);
                    $features = get_post_meta(get_the_ID(), '_solution_features', true);
                    
                    if (empty($icon)) {
                        $icon = 'fa-cube';
                    }
            ?>
                    <div class="supply-chain-item">
                        <div class="supply-chain-icon">
                            <i class="fas <?php echo esc_attr($icon); ?>"></i>
                        </div>
                        <h3 class="supply-chain-title"><?php the_title(); ?></h3>
                        <?php if (!empty($features) && is_array($features)) : ?>
                            <ul class="supply-chain-features">
                                <?php foreach ($features as $feature) : ?>
                                    <li class="supply-chain-feature">
                                        <i class="fas fa-check"></i>
                                        <span><?php echo esc_html($feature); ?></span>
                                    </li>
                                <?php endforeach; ?>
                            </ul>
                        <?php else : ?>
                            <div class="supply-chain-description"><?php the_excerpt(); ?></div>
                        <?php endif; ?>
                    </div>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
                // Display placeholder solutions if no solutions are found
                $placeholder_solutions = array(
                    array(
                        'title' => 'Vận chuyển đa phương thức',
                        'icon' => 'fa-truck',
                        'features' => array(
                            'Vận chuyển đường bộ',
                            'Vận chuyển đường biển',
                            'Vận chuyển hàng không',
                            'Vận chuyển đa phương thức'
                        )
                    ),
                    array(
                        'title' => 'Dịch vụ kho bãi',
                        'icon' => 'fa-warehouse',
                        'features' => array(
                            'Kho ngoại quan',
                            'Kho CFS/ICD',
                            'Kho lạnh',
                            'Kho thường'
                        )
                    ),
                    array(
                        'title' => 'Quản lý đơn hàng',
                        'icon' => 'fa-clipboard-list',
                        'features' => array(
                            'Theo dõi đơn hàng',
                            'Báo cáo thời gian thực',
                            'Quản lý tồn kho',
                            'Tối ưu hóa đơn hàng'
                        )
                    ),
                    array(
                        'title' => 'Tư vấn chuỗi cung ứng',
                        'icon' => 'fa-chart-line',
                        'features' => array(
                            'Phân tích chuỗi cung ứng',
                            'Tối ưu hóa chi phí',
                            'Tư vấn chiến lược',
                            'Đào tạo nhân sự'
                        )
                    ),
                );
                
                foreach ($placeholder_solutions as $solution) :
            ?>
                    <div class="supply-chain-item">
                        <div class="supply-chain-icon">
                            <i class="fas <?php echo esc_attr($solution['icon']); ?>"></i>
                        </div>
                        <h3 class="supply-chain-title"><?php echo esc_html($solution['title']); ?></h3>
                        <ul class="supply-chain-features">
                            <?php foreach ($solution['features'] as $feature) : ?>
                                <li class="supply-chain-feature">
                                    <i class="fas fa-check"></i>
                                    <span><?php echo esc_html($feature); ?></span>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
            <?php
                endforeach;
            endif;
            ?>
        </div>
    </div>
</section>
