<?php
/**
 * The updated front page template file that uses modular template parts
 *
 * @package OB_Vietnam_Custom
 */

get_header();
?>

<main id="primary" class="site-main">

    <?php
    // Hero Section
    get_template_part('template-parts/content', 'hero');
    
    // Services Section
    get_template_part('template-parts/content', 'services');
    
    // About Section
    get_template_part('template-parts/content', 'about');
    
    // Products Section
    get_template_part('template-parts/content', 'products');
    
    // Supply Chain Section
    get_template_part('template-parts/content', 'supply-chain');
    
    // Stats Section
    get_template_part('template-parts/content', 'stats');
    
    // Clients Section
    get_template_part('template-parts/content', 'clients');
    
    // Benefits Section
    get_template_part('template-parts/content', 'benefits');
    
    // News Section
    get_template_part('template-parts/content', 'news');
    
    // Contact Section
    get_template_part('template-parts/content', 'contact');
    ?>

</main><!-- #main -->

<?php
get_footer();
