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

<body class="bg-gray-50">
<!-- Scroll to top button -->
<div id="scrollTop" class="scroll-top">
    <i class="fas fa-arrow-up"></i>
</div>

<?php wp_body_open(); ?>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e( 'Skip to content', 'obvietnam-custom' ); ?></a>

	<header id="masthead" class="site-header">
        <div class="site-container">
            <!-- Top Section - Logo & Search -->
            <div class="header-top py-4 hidden lg:block shadow-sm bg-pri">
                <div class="container mx-auto flex flex-col lg:flex-row items-center justify-between px-4 gap-4">
                    <!-- Logo -->
                    <div class="site-branding flex-shrink-0">
                        <?php
                        if (has_custom_logo()) :
                            the_custom_logo();
                        else :
                            ?>
                            <h1 class="site-title text-2xl font-bold">
                                <a href="<?php echo esc_url(home_url('/')); ?>" rel="home" class="text-gray-800 hover:text-orange-500 transition-colors">
                                    <?php bloginfo('name'); ?>
                                </a>
                            </h1>
                        <?php endif; ?>
                    </div>

                    <!-- Search Form -->
                    <div class="w-full lg:max-w-2xl flex-grow">
                        <form class="flex w-full" role="search" method="get" action="<?php echo esc_url(home_url('/')); ?>">
                            <input type="hidden" name="post_type" value="products">
                            <div class="relative flex-grow">
                                <div class="flex w-full">
                                    <!-- Category Dropdown -->
                                    <div class="relative flex-shrink-0">
                                        <?php wp_dropdown_categories([
                                            'show_option_all' => __('Tất cả', 'obvietnam-custom'),
                                            'taxonomy'        => 'product_category',
                                            'name'            => 'product_category',
                                            'value_field'     => 'slug',
                                            'class'           => 'appearance-none bg-gray-50 border border-r-0 border-gray-300 text-gray-700 py-3 px-4 pr-8 rounded-l-lg ',
                                            'hide_empty'      => 0,
                                            'hierarchical'    => true,
                                        ]); ?>
                                        <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-500">
                                            <i class="fas fa-chevron-down text-sm"></i>
                                        </div>
                                    </div>

                                    <!-- Search Input -->
                                    <input
                                            id="header-search-input"
                                            type="search"
                                            class="flex-grow px-4 py-3 border border-gray-300 placeholder-gray-400"
                                            placeholder="<?php esc_attr_e('Tìm sản phẩm...', 'obvietnam-custom'); ?>"
                                            value="<?php echo get_search_query(); ?>"
                                            name="s"
                                            autocomplete="off"
                                    >

                                    <!-- Search Button -->
                                    <button class="bg-orange-500 hover:bg-orange-600 text-white px-6 py-3 rounded-r-lg transition-colors">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>

                                <!-- Search Suggestions -->
                                <div id="search-suggestions" class="absolute hidden w-full bg-white shadow-lg rounded-b-lg mt-1 z-50 max-h-96 overflow-y-auto border border-gray-200"></div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <!-- Bottom Section - Navigation -->
            <nav class="header-bottom py-3 hidden lg:block bg-pri ">
                <div class="container mx-auto px-4">
                    <?php
                    wp_nav_menu([
                        'theme_location' => 'main-menu',
                        'menu_id'        => 'main-menu',
                        'container'     => false,
                        'menu_class'     => 'flex space-x-6',
                        'fallback_cb'    => false,
                        'walker'        => new OB_Vietnam_Menu_Walker(),
                        'items_wrap'     => '<ul class="flex space-x-6">%3$s</ul>',
                    ]);
                    ?>
                </div>
            </nav>

            <!-- Mobile Menu Toggle -->
            <button id="demo-open-menu" class="lg:hidden p-2 rounded-lg hover:bg-gray-100 transition-colors">
                <i class="fas fa-bars text-xl text-white"></i>
            </button>
        </div>


        <!-- Overlay -->
        <div id="menu-overlay" class="menu-overlay menu-overlay-inactive fixed inset-0 bg-black bg-opacity-50 z-10"></div>

    </header><!-- #masthead -->
<?php if ( !is_front_page() && !is_home() ) : ?>
    <?php custom_breadcrumbs(); ?>
<?php endif; ?>
