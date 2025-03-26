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
					<button id="mobile-menu-toggle" class="mobile-menu-toggle">
						<i class="fas fa-bars"></i>
					</button>
				</nav><!-- #site-navigation -->
			</div>
		</div>

		<div id="mobile-navigation" class="mobile-navigation" style="display: none;">
			<div class="site-container">
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
	</header><!-- #masthead -->
