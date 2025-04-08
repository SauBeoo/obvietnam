<div id="mobile-navigation"  class="hidden menu-slide menu-slide-out fixed inset-y-0 right-0 w-full max-w-xs bg-gradient-to-b from-white to-gray-50 shadow-2xl transform transition-transform duration-300">
    <div class="flex flex-col h-full">
        <!-- Header -->
        <div class="flex justify-between items-center p-6 bg-gradient-to-r from-primary to-secondary">
            <div class="text-xl font-bold text-white flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                </svg>
                OB Vietnam
            </div>
            <button id="mobile-menu-close" class="menu-toggle p-2 rounded-full bg-white bg-opacity-20 hover:bg-opacity-30 text-white">
                <i class="fas fa-times text-xl"></i>
            </button>
        </div>

        <!-- User Profile -->
        <div class="px-6 py-4 border-b border-gray-200 flex items-center space-x-3 bg-gray-50">
            <div class="h-12 w-12 rounded-full bg-gradient-to-r from-primary to-secondary flex items-center justify-center text-white font-bold">
                <span>OB</span>
            </div>
            <div>
                <div class="font-medium text-gray-800">Xin chào!</div>
            </div>
        </div>

        <!-- Search -->
        <div class="px-6 py-4 border-b border-gray-200 bg-white">
            <div class="relative">
                <?php get_search_form(); ?>
            </div>
        </div>

        <!-- Menu Items -->
        <div class="flex-1 overflow-y-auto px-6 py-4 space-y-2">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'mobile-menu',
                'menu_class' => 'space-y-2',
                'container' => false,
                'walker' => new Mobile_Menu_Walker()
            ));
            ?>
        </div>

        <!-- Footer -->
        <div class="px-6 py-4 border-t border-gray-200 bg-gray-50">
            <div class="flex justify-center space-x-4">
                <a href="#" class="w-10 h-10 rounded-full bg-white shadow flex items-center justify-center text-gray-600 hover:bg-blue-600 hover:text-white transition-colors">
                    <i class="fab fa-facebook-f"></i>
                </a>
                <a href="#" class="w-10 h-10 rounded-full bg-white shadow flex items-center justify-center text-gray-600 hover:bg-blue-400 hover:text-white transition-colors">
                    <i class="fab fa-twitter"></i>
                </a>
                <a href="#" class="w-10 h-10 rounded-full bg-white shadow flex items-center justify-center text-gray-600 hover:bg-pink-600 hover:text-white transition-colors">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="#" class="w-10 h-10 rounded-full bg-white shadow flex items-center justify-center text-gray-600 hover:bg-red-500 hover:text-white transition-colors">
                    <i class="fab fa-youtube"></i>
                </a>
            </div>
            <div class="mt-4 text-center text-sm text-gray-500">
                © <?php echo date('Y'); ?> OB Vietnam. All rights reserved.
            </div>
        </div>
    </div>
</div>