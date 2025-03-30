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
					<div class="header-search">
						<form role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
							<input type="search" class="search-field" placeholder="<?php esc_attr_e('Tìm sản phẩm...', 'obvietnam-custom'); ?>"
								   value="<?php echo get_search_query(); ?>" name="s" />
							<input type="hidden" name="post_type" value="product" /> <!-- Giả sử tìm kiếm sản phẩm WooCommerce -->
							<button type="submit"><i class="fas fa-search"></i></button>
						</form>
					</div>
				</nav><!-- #site-navigation -->
				<button id="mobile-menu-toggle" class="mobile-menu-toggle">
					<i class="fas fa-bars"></i>
				</button>
			</div>
		</div>

		<div id="mobile-navigation" class="mobile-navigation" style="display: none;">
			<div class="site-container">
				<!-- Thêm form tìm kiếm mobile -->
				<div class="mobile-search">
					<?php get_search_form(); ?>
				</div>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'main-menu',
						'menu_id'        => 'mobile-menu',
						'container'      => false,
						'menu_class'     => 'mobile-menu',
						'fallback_cb'    => false,
					)
				);
				?>
			</div>
		</div>
		<!-- Thêm overlay -->
		<div class="mobile-menu-overlay"></div>
	</header><!-- #masthead -->
