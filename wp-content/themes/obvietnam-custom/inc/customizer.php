<?php
/**
 * OB Vietnam Custom Theme Customizer
 *
 * @package OB_Vietnam_Custom
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function obvietnam_custom_customize_register( $wp_customize ) {
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';
	$wp_customize->get_setting( 'header_textcolor' )->transport = 'postMessage';

	if ( isset( $wp_customize->selective_refresh ) ) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector'        => '.site-title a',
				'render_callback' => 'obvietnam_custom_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector'        => '.site-description',
				'render_callback' => 'obvietnam_custom_customize_partial_blogdescription',
			)
		);
	}

    // Hero Section
    $wp_customize->add_section(
        'obvietnam_hero_section',
        array(
            'title'    => __( 'Hero Section', 'obvietnam-custom' ),
            'priority' => 30,
        )
    );

    // Hero Title
    $wp_customize->add_setting(
        'hero_slide_1_title',
        array(
            'default'           => 'GIẢI PHÁP CUNG ỨNG HÀNG HOÁ TOÀN DIỆN',
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'refresh',
        )
    );
    $wp_customize->add_control(
        'hero_slide_1_title',
        array(
            'label'    => __( 'Hero Title', 'obvietnam-custom' ),
            'section'  => 'obvietnam_hero_section',
            'type'     => 'text',
        )
    );

    // Hero Description
    $wp_customize->add_setting(
        'hero_slide_1_description',
        array(
            'default'           => 'Chúng tôi cung cấp giải pháp cung ứng hàng hoá toàn diện từ nhà máy đến khách hàng, giúp doanh nghiệp tối ưu hoá chi phí và nâng cao hiệu quả quản lý.',
            'sanitize_callback' => 'sanitize_textarea_field',
            'transport'         => 'refresh',
        )
    );
    $wp_customize->add_control(
        'hero_slide_1_description',
        array(
            'label'    => __( 'Hero Description', 'obvietnam-custom' ),
            'section'  => 'obvietnam_hero_section',
            'type'     => 'textarea',
        )
    );

    // Hero Image
    $wp_customize->add_setting(
        'hero_slide_1_image',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
            'transport'         => 'refresh',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'hero_slide_1_image',
            array(
                'label'    => __( 'Hero Image', 'obvietnam-custom' ),
                'section'  => 'obvietnam_hero_section',
                'settings' => 'hero_slide_1_image',
            )
        )
    );

    // Hero Button Text
    $wp_customize->add_setting(
        'hero_button_text',
        array(
            'default'           => 'Xem thêm',
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'refresh',
        )
    );
    $wp_customize->add_control(
        'hero_button_text',
        array(
            'label'    => __( 'Hero Button Text', 'obvietnam-custom' ),
            'section'  => 'obvietnam_hero_section',
            'type'     => 'text',
        )
    );

    // Hero Button Link
    $wp_customize->add_setting(
        'hero_button_link',
        array(
            'default'           => '/lien-he',
            'sanitize_callback' => 'esc_url_raw',
            'transport'         => 'refresh',
        )
    );
    $wp_customize->add_control(
        'hero_button_link',
        array(
            'label'    => __( 'Hero Button Link', 'obvietnam-custom' ),
            'section'  => 'obvietnam_hero_section',
            'type'     => 'url',
        )
    );

    // Services Section
    $wp_customize->add_section(
        'obvietnam_services_section',
        array(
            'title'    => __( 'Services Section', 'obvietnam-custom' ),
            'priority' => 40,
        )
    );

    // Services Section Title
    $wp_customize->add_setting(
        'services_section_title',
        array(
            'default'           => 'DỊCH VỤ CUNG ỨNG HÀNG HÓA',
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'refresh',
        )
    );
    $wp_customize->add_control(
        'services_section_title',
        array(
            'label'    => __( 'Services Section Title', 'obvietnam-custom' ),
            'section'  => 'obvietnam_services_section',
            'type'     => 'text',
        )
    );

    // Services Section Description
    $wp_customize->add_setting(
        'services_section_description',
        array(
            'default'           => 'Chúng tôi cung cấp đa dạng các dịch vụ cung ứng hàng hoá, vận chuyển và logistics với chất lượng cao và giá cả cạnh tranh.',
            'sanitize_callback' => 'sanitize_textarea_field',
            'transport'         => 'refresh',
        )
    );
    $wp_customize->add_control(
        'services_section_description',
        array(
            'label'    => __( 'Services Section Description', 'obvietnam-custom' ),
            'section'  => 'obvietnam_services_section',
            'type'     => 'textarea',
        )
    );

    // About Section
    $wp_customize->add_section(
        'obvietnam_about_section',
        array(
            'title'    => __( 'About Section', 'obvietnam-custom' ),
            'priority' => 50,
        )
    );

    // About Section Title
    $wp_customize->add_setting(
        'features_section_title',
        array(
            'default'           => 'GIỚI THIỆU VỀ OB VIỆT NAM GROUP',
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'refresh',
        )
    );
    $wp_customize->add_control(
        'features_section_title',
        array(
            'label'    => __( 'About Section Title', 'obvietnam-custom' ),
            'section'  => 'obvietnam_about_section',
            'type'     => 'text',
        )
    );

    // About Section Description
    $wp_customize->add_setting(
        'features_section_description',
        array(
            'default'           => 'OB Việt Nam Group là đơn vị cung cấp giải pháp cung ứng hàng hoá toàn diện, kết nối chuỗi cung ứng trên khắp toàn cầu với hơn 10 năm kinh nghiệm.',
            'sanitize_callback' => 'sanitize_textarea_field',
            'transport'         => 'refresh',
        )
    );
    $wp_customize->add_control(
        'features_section_description',
        array(
            'label'    => __( 'About Section Description', 'obvietnam-custom' ),
            'section'  => 'obvietnam_about_section',
            'type'     => 'textarea',
        )
    );

    // About Section Image
    $wp_customize->add_setting(
        'features_section_image',
        array(
            'default'           => '',
            'sanitize_callback' => 'esc_url_raw',
            'transport'         => 'refresh',
        )
    );
    $wp_customize->add_control(
        new WP_Customize_Image_Control(
            $wp_customize,
            'features_section_image',
            array(
                'label'    => __( 'About Section Image', 'obvietnam-custom' ),
                'section'  => 'obvietnam_about_section',
                'settings' => 'features_section_image',
            )
        )
    );

    // About Features
    for ($i = 1; $i <= 4; $i++) {
        // Feature Title
        $wp_customize->add_setting(
            'feature_' . $i . '_title',
            array(
                'default'           => '',
                'sanitize_callback' => 'sanitize_text_field',
                'transport'         => 'refresh',
            )
        );
        $wp_customize->add_control(
            'feature_' . $i . '_title',
            array(
                'label'    => sprintf(__( 'Feature %d Title', 'obvietnam-custom' ), $i),
                'section'  => 'obvietnam_about_section',
                'type'     => 'text',
            )
        );

        // Feature Icon
        $wp_customize->add_setting(
            'feature_' . $i . '_icon',
            array(
                'default'           => 'fa-check-circle',
                'sanitize_callback' => 'sanitize_text_field',
                'transport'         => 'refresh',
            )
        );
        $wp_customize->add_control(
            'feature_' . $i . '_icon',
            array(
                'label'    => sprintf(__( 'Feature %d Icon (FontAwesome class)', 'obvietnam-custom' ), $i),
                'section'  => 'obvietnam_about_section',
                'type'     => 'text',
                'description' => __( 'Enter FontAwesome icon class (e.g., fa-check-circle)', 'obvietnam-custom' ),
            )
        );
    }

    // About Button Text
    $wp_customize->add_setting(
        'features_button_text',
        array(
            'default'           => 'Xem thêm',
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'refresh',
        )
    );
    $wp_customize->add_control(
        'features_button_text',
        array(
            'label'    => __( 'About Button Text', 'obvietnam-custom' ),
            'section'  => 'obvietnam_about_section',
            'type'     => 'text',
        )
    );

    // About Button Link
    $wp_customize->add_setting(
        'features_button_link',
        array(
            'default'           => '/gioi-thieu',
            'sanitize_callback' => 'esc_url_raw',
            'transport'         => 'refresh',
        )
    );
    $wp_customize->add_control(
        'features_button_link',
        array(
            'label'    => __( 'About Button Link', 'obvietnam-custom' ),
            'section'  => 'obvietnam_about_section',
            'type'     => 'url',
        )
    );

    // Products Section
    $wp_customize->add_section(
        'obvietnam_products_section',
        array(
            'title'    => __( 'Products Section', 'obvietnam-custom' ),
            'priority' => 60,
        )
    );

    // Products Section Title
    $wp_customize->add_setting(
        'products_section_title',
        array(
            'default'           => 'SẢN PHẨM CỦA CHÚNG TÔI',
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'refresh',
        )
    );
    $wp_customize->add_control(
        'products_section_title',
        array(
            'label'    => __( 'Products Section Title', 'obvietnam-custom' ),
            'section'  => 'obvietnam_products_section',
            'type'     => 'text',
        )
    );

    // Products Section Description
    $wp_customize->add_setting(
        'products_section_description',
        array(
            'default'           => 'Chúng tôi cung cấp đa dạng các sản phẩm chất lượng cao, đáp ứng mọi nhu cầu của khách hàng.',
            'sanitize_callback' => 'sanitize_textarea_field',
            'transport'         => 'refresh',
        )
    );
    $wp_customize->add_control(
        'products_section_description',
        array(
            'label'    => __( 'Products Section Description', 'obvietnam-custom' ),
            'section'  => 'obvietnam_products_section',
            'type'     => 'textarea',
        )
    );

    // Stats Section
    $wp_customize->add_section(
        'obvietnam_stats_section',
        array(
            'title'    => __( 'Stats Section', 'obvietnam-custom' ),
            'priority' => 70,
        )
    );

    // Stats - Clients
    $wp_customize->add_setting(
        'stats_clients',
        array(
            'default'           => '500+',
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'refresh',
        )
    );
    $wp_customize->add_control(
        'stats_clients',
        array(
            'label'    => __( 'Number of Clients', 'obvietnam-custom' ),
            'section'  => 'obvietnam_stats_section',
            'type'     => 'text',
        )
    );
    $wp_customize->add_setting(
        'stats_clients_text',
        array(
            'default'           => 'Khách hàng tin tưởng',
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'refresh',
        )
    );
    $wp_customize->add_control(
        'stats_clients_text',
        array(
            'label'    => __( 'Clients Text', 'obvietnam-custom' ),
            'section'  => 'obvietnam_stats_section',
            'type'     => 'text',
        )
    );

    // Stats - Experience
    $wp_customize->add_setting(
        'stats_experience',
        array(
            'default'           => '10 năm+',
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'refresh',
        )
    );
    $wp_customize->add_control(
        'stats_experience',
        array(
            'label'    => __( 'Years of Experience', 'obvietnam-custom' ),
            'section'  => 'obvietnam_stats_section',
            'type'     => 'text',
        )
    );
    $wp_customize->add_setting(
        'stats_experience_text',
        array(
            'default'           => 'Kinh nghiệm trong nghề',
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'refresh',
        )
    );
    $wp_customize->add_control(
        'stats_experience_text',
        array(
            'label'    => __( 'Experience Text', 'obvietnam-custom' ),
            'section'  => 'obvietnam_stats_section',
            'type'     => 'text',
        )
    );

    // Stats - Partners
    $wp_customize->add_setting(
        'stats_partners',
        array(
            'default'           => '50+',
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'refresh',
        )
    );
    $wp_customize->add_control(
        'stats_partners',
        array(
            'label'    => __( 'Number of Partners', 'obvietnam-custom' ),
            'section'  => 'obvietnam_stats_section',
            'type'     => 'text',
        )
    );
    $wp_customize->add_setting(
        'stats_partners_text',
        array(
            'default'           => 'Đối tác Logistics',
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'refresh',
        )
    );
    $wp_customize->add_control(
        'stats_partners_text',
        array(
            'label'    => __( 'Partners Text', 'obvietnam-custom' ),
            'section'  => 'obvietnam_stats_section',
            'type'     => 'text',
        )
    );

    // Stats - Satisfaction
    $wp_customize->add_setting(
        'stats_satisfaction',
        array(
            'default'           => '100%',
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'refresh',
        )
    );
    $wp_customize->add_control(
        'stats_satisfaction',
        array(
            'label'    => __( 'Satisfaction Rate', 'obvietnam-custom' ),
            'section'  => 'obvietnam_stats_section',
            'type'     => 'text',
        )
    );
    $wp_customize->add_setting(
        'stats_satisfaction_text',
        array(
            'default'           => 'Khách hàng hài lòng',
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'refresh',
        )
    );
    $wp_customize->add_control(
        'stats_satisfaction_text',
        array(
            'label'    => __( 'Satisfaction Text', 'obvietnam-custom' ),
            'section'  => 'obvietnam_stats_section',
            'type'     => 'text',
        )
    );

    // News Section
    $wp_customize->add_section(
        'obvietnam_news_section',
        array(
            'title'    => __( 'News Section', 'obvietnam-custom' ),
            'priority' => 80,
        )
    );

    // News Section Title
    $wp_customize->add_setting(
        'news_section_title',
        array(
            'default'           => 'TIN TỨC & SỰ KIỆN',
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'refresh',
        )
    );
    $wp_customize->add_control(
        'news_section_title',
        array(
            'label'    => __( 'News Section Title', 'obvietnam-custom' ),
            'section'  => 'obvietnam_news_section',
            'type'     => 'text',
        )
    );

    // News Section Description
    $wp_customize->add_setting(
        'news_section_description',
        array(
            'default'           => 'Cập nhật những tin tức mới nhất về ngành logistics và chuỗi cung ứng.',
            'sanitize_callback' => 'sanitize_textarea_field',
            'transport'         => 'refresh',
        )
    );
    $wp_customize->add_control(
        'news_section_description',
        array(
            'label'    => __( 'News Section Description', 'obvietnam-custom' ),
            'section'  => 'obvietnam_news_section',
            'type'     => 'textarea',
        )
    );

    // Contact Section
    $wp_customize->add_section(
        'obvietnam_contact_section',
        array(
            'title'    => __( 'Contact Section', 'obvietnam-custom' ),
            'priority' => 90,
        )
    );

    // Contact Section Title
    $wp_customize->add_setting(
        'contact_section_title',
        array(
            'default'           => 'LIÊN HỆ VỚI CHÚNG TÔI',
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'refresh',
        )
    );
    $wp_customize->add_control(
        'contact_section_title',
        array(
            'label'    => __( 'Contact Section Title', 'obvietnam-custom' ),
            'section'  => 'obvietnam_contact_section',
            'type'     => 'text',
        )
    );

    // Contact Section Description
    $wp_customize->add_setting(
        'contact_section_description',
        array(
            'default'           => 'Hãy liên hệ ngay với chúng tôi để được tư vấn và nhận giải pháp cung ứng hàng hoá tối ưu nhất cho doanh nghiệp của bạn',
            'sanitize_callback' => 'sanitize_textarea_field',
            'transport'         => 'refresh',
        )
    );
    $wp_customize->add_control(
        'contact_section_description',
        array(
            'label'    => __( 'Contact Section Description', 'obvietnam-custom' ),
            'section'  => 'obvietnam_contact_section',
            'type'     => 'textarea',
        )
    );

    // Contact Button Text
    $wp_customize->add_setting(
        'contact_button_text',
        array(
            'default'           => 'Liên hệ ngay',
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'refresh',
        )
    );
    $wp_customize->add_control(
        'contact_button_text',
        array(
            'label'    => __( 'Contact Button Text', 'obvietnam-custom' ),
            'section'  => 'obvietnam_contact_section',
            'type'     => 'text',
        )
    );

    // Contact Button Link
    $wp_customize->add_setting(
        'contact_button_link',
        array(
            'default'           => '/lien-he',
            'sanitize_callback' => 'esc_url_raw',
            'transport'         => 'refresh',
        )
    );
    $wp_customize->add_control(
        'contact_button_link',
        array(
            'label'    => __( 'Contact Button Link', 'obvietnam-custom' ),
            'section'  => 'obvietnam_contact_section',
            'type'     => 'url',
        )
    );

    // Footer Section
    $wp_customize->add_section(
        'obvietnam_footer_section',
        array(
            'title'    => __( 'Footer Settings', 'obvietnam-custom' ),
            'priority' => 100,
        )
    );

    // Footer About Text
    $wp_customize->add_setting(
        'footer_about_text',
        array(
            'default'           => 'OB Việt Nam Group là đơn vị cung cấp giải pháp cung ứng hàng hoá toàn diện, kết nối chuỗi cung ứng trên khắp toàn cầu với hơn 10 năm kinh nghiệm.',
            'sanitize_callback' => 'sanitize_textarea_field',
            'transport'         => 'refresh',
        )
    );
    $wp_customize->add_control(
        'footer_about_text',
        array(
            'label'    => __( 'Footer About Text', 'obvietnam-custom' ),
            'section'  => 'obvietnam_footer_section',
            'type'     => 'textarea',
        )
    );

    // Copyright Text
    $wp_customize->add_setting(
        'copyright_text',
        array(
            'default'           => '© Copyright ' . date('Y') . ' OB Việt Nam Group - All Rights Reserved',
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'refresh',
        )
    );
    $wp_customize->add_control(
        'copyright_text',
        array(
            'label'    => __( 'Copyright Text', 'obvietnam-custom' ),
            'section'  => 'obvietnam_footer_section',
            'type'     => 'text',
        )
    );

    // Social Media Links
    $social_platforms = array(
        'facebook' => __( 'Facebook URL', 'obvietnam-custom' ),
        'twitter' => __( 'Twitter URL', 'obvietnam-custom' ),
        'linkedin' => __( 'LinkedIn URL', 'obvietnam-custom' ),
        'youtube' => __( 'YouTube URL', 'obvietnam-custom' ),
    );

    foreach ( $social_platforms as $platform => $label ) {
        $wp_customize->add_setting(
            'social_' . $platform,
            array(
                'default'           => '#',
                'sanitize_callback' => 'esc_url_raw',
                'transport'         => 'refresh',
            )
        );
        $wp_customize->add_control(
            'social_' . $platform,
            array(
                'label'    => $label,
                'section'  => 'obvietnam_footer_section',
                'type'     => 'url',
            )
        );
    }

    // Contact Information
    $wp_customize->add_section(
        'obvietnam_contact_info',
        array(
            'title'    => __( 'Contact Information', 'obvietnam-custom' ),
            'priority' => 110,
        )
    );

    // Address
    $wp_customize->add_setting(
        'contact_address',
        array(
            'default'           => '123 Nguyễn Trãi, Thanh Xuân, Hà Nội',
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'refresh',
        )
    );
    $wp_customize->add_control(
        'contact_address',
        array(
            'label'    => __( 'Address', 'obvietnam-custom' ),
            'section'  => 'obvietnam_contact_info',
            'type'     => 'text',
        )
    );

    // Phone
    $wp_customize->add_setting(
        'contact_phone',
        array(
            'default'           => '0987 654 321',
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'refresh',
        )
    );
    $wp_customize->add_control(
        'contact_phone',
        array(
            'label'    => __( 'Phone', 'obvietnam-custom' ),
            'section'  => 'obvietnam_contact_info',
            'type'     => 'text',
        )
    );

    // Email
    $wp_customize->add_setting(
        'contact_email',
        array(
            'default'           => 'info@obvietnam.com',
            'sanitize_callback' => 'sanitize_email',
            'transport'         => 'refresh',
        )
    );
    $wp_customize->add_control(
        'contact_email',
        array(
            'label'    => __( 'Email', 'obvietnam-custom' ),
            'section'  => 'obvietnam_contact_info',
            'type'     => 'email',
        )
    );

    // Business Hours
    $wp_customize->add_setting(
        'contact_hours',
        array(
            'default'           => 'Thứ 2 - Thứ 7: 8:00 - 17:30',
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'refresh',
        )
    );
    $wp_customize->add_control(
        'contact_hours',
        array(
            'label'    => __( 'Business Hours', 'obvietnam-custom' ),
            'section'  => 'obvietnam_contact_info',
            'type'     => 'text',
        )
    );

    // Chat Buttons
    $wp_customize->add_section(
        'obvietnam_chat_buttons',
        array(
            'title'    => __( 'Chat Buttons', 'obvietnam-custom' ),
            'priority' => 120,
        )
    );

    // Show Chat Buttons
    $wp_customize->add_setting(
        'show_chat_buttons',
        array(
            'default'           => true,
            'sanitize_callback' => 'obvietnam_custom_sanitize_checkbox',
            'transport'         => 'refresh',
        )
    );
    $wp_customize->add_control(
        'show_chat_buttons',
        array(
            'label'    => __( 'Show Chat Buttons', 'obvietnam-custom' ),
            'section'  => 'obvietnam_chat_buttons',
            'type'     => 'checkbox',
        )
    );

    // Zalo Number
    $wp_customize->add_setting(
        'zalo_number',
        array(
            'default'           => '0987654321',
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'refresh',
        )
    );
    $wp_customize->add_control(
        'zalo_number',
        array(
            'label'    => __( 'Zalo Number', 'obvietnam-custom' ),
            'section'  => 'obvietnam_chat_buttons',
            'type'     => 'text',
        )
    );

    // Facebook Messenger
    $wp_customize->add_setting(
        'facebook_messenger',
        array(
            'default'           => 'https://messenger.com/t/obvietnam/',
            'sanitize_callback' => 'esc_url_raw',
            'transport'         => 'refresh',
        )
    );
    $wp_customize->add_control(
        'facebook_messenger',
        array(
            'label'    => __( 'Facebook Messenger URL', 'obvietnam-custom' ),
            'section'  => 'obvietnam_chat_buttons',
            'type'     => 'url',
        )
    );
}
add_action( 'customize_register', 'obvietnam_custom_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function obvietnam_custom_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function obvietnam_custom_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function obvietnam_custom_customize_preview_js() {
	wp_enqueue_script( 'obvietnam-custom-customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), _S_VERSION, true );
}
add_action( 'customize_preview_init', 'obvietnam_custom_customize_preview_js' );

/**
 * Sanitize checkbox values
 */
function obvietnam_custom_sanitize_checkbox( $checked ) {
    return ( ( isset( $checked ) && true == $checked ) ? true : false );
}
