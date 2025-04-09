<?php
/**
 * The header for our theme
 *
 * @package OB_Vietnam_Custom
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#3B82F6',
                        secondary: '#10B981',
                        dark: '#1E293B',
                        light: '#F8FAFC'
                    },
                    fontFamily: {
                        sans: ['Inter', 'sans-serif'],
                    },
                }
            }
        }
    </script>
	<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'obvietnam-custom' ); ?></a>

	<header id="masthead" class="site-header">
		<div class="site-container">
			<div class="header-container">
				<div class="site-branding">
					<?php
					if ( has_custom_logo() ) :
						the_custom_logo();
					else :
					?>
						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
					<?php
					endif;
					?>
				</div><!-- .site-branding -->

				<nav id="site-navigation" class="main-navigation">
					<?php
					wp_nav_menu(
						array(
							'theme_location' => 'main-menu',
							'menu_id'        => 'main-menu',
							'container'      => false,
							'menu_class'     => 'main-nav',
							'fallback_cb'    => false,
							'walker'         => new OB_Vietnam_Menu_Walker(),
						)
					);
					?>
					<div class="flex items-center">
						<div class="relative">
							<form class="flex" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>" >
								<div class="relative">
									<?php wp_dropdown_categories([
										'show_option_all' => __('Danh mục', 'obvietnam-custom'),
										'taxonomy'        => 'product_category', // Đảm bảo tên này khớp 100% với register_taxonomy
										'name'            => 'product_category',
										'value_field'     => 'slug',
										'class'           => 'search-category appearance-none bg-gray-100 border border-gray-300 text-gray-700 py-2 px-4 pr-8 rounded-l-lg focus:outline-none focus:bg-white focus:border-blue-500t',
										'hide_empty'      => 0, // <--- THAY ĐỔI Ở ĐÂY
										'orderby'         => 'name',
										'hierarchical'    => true, // Thêm cái này nếu bạn muốn hiển thị cấu trúc cha-con ( thụt lề )
										'show_count'      => false, // Tùy chọn: có hiển thị số lượng bài viết trong danh mục không
										'depth'           => 0,     // Tùy chọn: hiển thị tất cả các cấp độ danh mục
									]); ?>
									<div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
										<i class="fas fa-chevron-down text-xs"></i>
									</div>
								</div>
								<div class="relative flex-grow">
									<input
										type="search"
										id="header-search-input"
										class="search-input w-48 px-4 py-2 border border-gray-300 focus:border-blue-500"
										placeholder="<?php esc_attr_e('Tìm sản phẩm...', 'obvietnam-custom'); ?>"
										value="<?php echo get_search_query(); ?>"
										name="s"
										autocomplete="off"
										data-min-chars="2"
									>
									<div id="search-suggestions" class="absolute hidden w-full bg-white shadow-lg rounded-lg mt-1 z-50 max-h-96 overflow-y-auto divide-y divide-gray-200"></div>
								</div>
								<button class="hover:bg-blue-700 text-white px-4 py-2 rounded-r-lg transition-colors" style="background-color: var(--site-orange)">
									<i class="fas fa-search"></i>
								</button>
							</form>
						</div>

						<button id="mobile-menu-toggle" class="md:hidden p-2 text-gray-600 hover:text-blue-600 transition-colors ml-4">
							<i class="fas fa-bars text-xl"></i>
						</button>
					</div>
				</nav><!-- #site-navigation -->
				
				<!-- Mobile Menu Toggle -->
				<button id="demo-open-menu" class="lg:hidden p-2 rounded-lg hover:bg-gray-100 transition-colors">
					<i class="fas fa-bars text-xl text-gray-600"></i>
				</button>
			</div>
		</div>

        <!-- Overlay -->
        <div id="menu-overlay" class="menu-overlay menu-overlay-inactive fixed inset-0 bg-black bg-opacity-50 z-10"></div>

    </header><!-- #masthead -->