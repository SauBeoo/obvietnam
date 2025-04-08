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
				<button id="demo-open-menu" class="lg:hidden p-2 rounded-lg hover:bg-gray-100 transition-colors">
					<i class="fas fa-bars text-xl text-gray-600"></i>
				</button>
			</div>
		</div>

        <!-- Overlay -->
        <div id="menu-overlay" class="menu-overlay menu-overlay-inactive fixed inset-0 bg-black bg-opacity-50 z-10"></div>

    </header><!-- #masthead -->