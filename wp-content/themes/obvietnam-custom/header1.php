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
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
	<script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
	<?php wp_head(); ?>
</head>header.php

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
					<div class="header-search">
						<form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
							<input type="search" class="search-field" placeholder="<?php esc_attr_e('Tìm sản phẩm...', 'obvietnam-custom'); ?>"
								   value="<?php echo get_search_query(); ?>" name="s" />
							<input type="hidden" name="post_type" value="product" /> <!-- Giả sử tìm kiếm sản phẩm WooCommerce -->
							<button type="submit"><i class="fas fa-search"></i></button>
						</form>
					</div>
				</nav><!-- #site-navigation -->
				
				<!-- Mobile Menu Toggle -->
				<button id="mobile-menu-toggle" class="lg:hidden p-2 rounded-lg hover:bg-gray-100 transition-colors">
					<i class="fas fa-bars text-xl text-gray-600"></i>
				</button>
			</div>
		</div>

		<!-- Phần Mobile Navigation sửa lại -->
		<div id="mobile-navigation" class="lg:hidden fixed inset-y-0 right-0 w-full max-w-xs bg-white shadow-2xl z-50 transform translate-x-full transition-transform duration-300 ease-in-out">
			<div class="flex flex-col h-full">
				<div class="flex justify-between items-center p-4 border-b">
					<div class="text-lg font-semibold">Menu</div>
					<button id="mobile-menu-close" class="p-2 hover:text-primary">
						<i class="fas fa-times text-xl"></i>
					</button>
				</div>

				<div class="flex-1 overflow-y-auto p-4">
					<div class="mobile-search mb-6">
						<form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
							<div class="relative">
								<input type="search"
									   class="w-full pl-4 pr-10 py-3 border rounded-lg focus:outline-none focus:ring-2 focus:ring-primary"
									   placeholder="<?php esc_attr_e('Tìm sản phẩm...', 'obvietnam-custom'); ?>"
									   name="s" />
								<button type="submit" class="absolute right-3 top-3 text-gray-400">
									<i class="fas fa-search"></i>
								</button>
							</div>
							<input type="hidden" name="post_type" value="product" />
						</form>
					</div>

					<?php wp_nav_menu([
						'theme_location' => 'main-menu',
						'menu_class'     => 'space-y-2',
						'container'      => false
					]); ?>
				</div>
			</div>
		</div>

		<!-- Thêm overlay -->
		<div id="mobile-menu-overlay" class="hidden fixed inset-0 bg-black bg-opacity-50 z-40"></div>
	</header><!-- #masthead -->