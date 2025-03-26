<?php
/**
 * Test script for verifying theme functionality across different devices
 *
 * @package OB_Vietnam_Custom
 */

// Set up the environment
define('WP_USE_THEMES', false);
require_once('../../../wp-load.php');

// Header
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OB Vietnam Custom Theme - Responsive Test</title>
    <?php wp_head(); ?>
    <style>
        .test-container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 20px;
        }
        .test-header {
            background: #f5f5f5;
            padding: 20px;
            margin-bottom: 20px;
            border-radius: 5px;
        }
        .test-section {
            margin-bottom: 30px;
            padding: 20px;
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .test-title {
            font-size: 24px;
            margin-bottom: 15px;
            color: #333;
        }
        .test-description {
            margin-bottom: 15px;
            color: #666;
        }
        .test-result {
            padding: 15px;
            background: #f9f9f9;
            border-radius: 5px;
            margin-top: 15px;
        }
        .test-pass {
            color: green;
            font-weight: bold;
        }
        .test-fail {
            color: red;
            font-weight: bold;
        }
        .device-info {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-bottom: 20px;
        }
        .device-info-item {
            background: #e9e9e9;
            padding: 8px 12px;
            border-radius: 4px;
            font-size: 14px;
        }
        .breakpoint-test {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 15px;
        }
        .breakpoint-indicator {
            padding: 8px 12px;
            border-radius: 4px;
            font-size: 14px;
            background: #f5f5f5;
        }
        .breakpoint-xs {
            display: none;
        }
        .breakpoint-sm {
            display: none;
        }
        .breakpoint-md {
            display: none;
        }
        .breakpoint-lg {
            display: none;
        }
        .breakpoint-xl {
            display: none;
        }
        
        @media (max-width: 575px) {
            .breakpoint-xs {
                display: block;
                background: #ffcccc;
            }
        }
        @media (min-width: 576px) and (max-width: 767px) {
            .breakpoint-sm {
                display: block;
                background: #ffffcc;
            }
        }
        @media (min-width: 768px) and (max-width: 991px) {
            .breakpoint-md {
                display: block;
                background: #ccffcc;
            }
        }
        @media (min-width: 992px) and (max-width: 1199px) {
            .breakpoint-lg {
                display: block;
                background: #ccccff;
            }
        }
        @media (min-width: 1200px) {
            .breakpoint-xl {
                display: block;
                background: #ffccff;
            }
        }
        
        .test-grid {
            display: grid;
            grid-template-columns: repeat(4, 1fr);
            gap: 15px;
            margin-top: 15px;
        }
        
        @media (max-width: 991px) {
            .test-grid {
                grid-template-columns: repeat(2, 1fr);
            }
        }
        
        @media (max-width: 575px) {
            .test-grid {
                grid-template-columns: 1fr;
            }
        }
        
        .test-grid-item {
            background: #f0f0f0;
            padding: 15px;
            border-radius: 5px;
            text-align: center;
        }
        
        .test-image {
            max-width: 100%;
            height: auto;
            display: block;
            margin: 15px 0;
        }
        
        .test-buttons {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            margin-top: 15px;
        }
        
        .test-button {
            padding: 8px 15px;
            background: #4a90e2;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        
        .test-button:hover {
            background: #3a80d2;
        }
        
        @media (max-width: 575px) {
            .test-buttons {
                flex-direction: column;
            }
        }
    </style>
</head>
<body <?php body_class('test-page'); ?>>

<div class="test-container">
    <div class="test-header">
        <h1>OB Vietnam Custom Theme - Responsive Test</h1>
        <p>This page tests the responsive functionality of the OB Vietnam Custom WordPress theme.</p>
        
        <div class="device-info">
            <div class="device-info-item">
                <strong>Screen Width:</strong> <span id="screen-width">0</span>px
            </div>
            <div class="device-info-item">
                <strong>Screen Height:</strong> <span id="screen-height">0</span>px
            </div>
            <div class="device-info-item">
                <strong>Device Type:</strong> <span id="device-type">Unknown</span>
            </div>
            <div class="device-info-item">
                <strong>Orientation:</strong> <span id="orientation">Unknown</span>
            </div>
        </div>
        
        <div class="breakpoint-test">
            <div class="breakpoint-indicator breakpoint-xs">Extra Small (< 576px)</div>
            <div class="breakpoint-indicator breakpoint-sm">Small (576px - 767px)</div>
            <div class="breakpoint-indicator breakpoint-md">Medium (768px - 991px)</div>
            <div class="breakpoint-indicator breakpoint-lg">Large (992px - 1199px)</div>
            <div class="breakpoint-indicator breakpoint-xl">Extra Large (≥ 1200px)</div>
        </div>
    </div>
    
    <div class="test-section">
        <h2 class="test-title">1. Grid System Test</h2>
        <div class="test-description">
            Testing the responsive grid system across different screen sizes.
        </div>
        
        <div class="test-grid">
            <div class="test-grid-item">Grid Item 1</div>
            <div class="test-grid-item">Grid Item 2</div>
            <div class="test-grid-item">Grid Item 3</div>
            <div class="test-grid-item">Grid Item 4</div>
        </div>
        
        <div class="test-result">
            <p>The grid should display as:</p>
            <ul>
                <li>4 columns on large screens (≥ 992px)</li>
                <li>2 columns on medium screens (576px - 991px)</li>
                <li>1 column on small screens (< 576px)</li>
            </ul>
            <p>Current result: <span id="grid-test-result">Checking...</span></p>
        </div>
    </div>
    
    <div class="test-section">
        <h2 class="test-title">2. Typography Test</h2>
        <div class="test-description">
            Testing how typography scales across different screen sizes.
        </div>
        
        <h1>Heading 1</h1>
        <h2>Heading 2</h2>
        <h3>Heading 3</h3>
        <h4>Heading 4</h4>
        <h5>Heading 5</h5>
        <h6>Heading 6</h6>
        
        <p>This is a paragraph with <strong>bold text</strong>, <em>italic text</em>, and <a href="#">a link</a>.</p>
        
        <div class="test-result">
            <p>Typography should scale appropriately across different screen sizes.</p>
            <p>Current result: <span id="typography-test-result">Checking...</span></p>
        </div>
    </div>
    
    <div class="test-section">
        <h2 class="test-title">3. Image Responsiveness Test</h2>
        <div class="test-description">
            Testing how images respond to different screen sizes.
        </div>
        
        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/test-image.jpg" alt="Test Image" class="test-image">
        
        <div class="test-result">
            <p>Images should scale down proportionally on smaller screens and never overflow their container.</p>
            <p>Current result: <span id="image-test-result">Checking...</span></p>
        </div>
    </div>
    
    <div class="test-section">
        <h2 class="test-title">4. Navigation Test</h2>
        <div class="test-description">
            Testing the responsive behavior of the navigation menu.
        </div>
        
        <div class="test-navigation">
            <?php
            wp_nav_menu(array(
                'theme_location' => 'main-menu',
                'container' => 'nav',
                'container_class' => 'main-navigation',
                'menu_class' => 'main-nav',
            ));
            ?>
        </div>
        
        <div class="test-result">
            <p>Navigation should:</p>
            <ul>
                <li>Display as a horizontal menu on large screens (≥ 992px)</li>
                <li>Collapse into a mobile menu on smaller screens (< 992px)</li>
            </ul>
            <p>Current result: <span id="navigation-test-result">Checking...</span></p>
        </div>
    </div>
    
    <div class="test-section">
        <h2 class="test-title">5. Button Responsiveness Test</h2>
        <div class="test-description">
            Testing how buttons respond to different screen sizes.
        </div>
        
        <div class="test-buttons">
            <button class="test-button">Primary Button</button>
            <button class="test-button">Secondary Button</button>
            <button class="test-button">Tertiary Button</button>
        </div>
        
        <div class="test-result">
            <p>Buttons should:</p>
            <ul>
                <li>Display inline on larger screens</li>
                <li>Stack vertically on small screens (< 576px)</li>
            </ul>
            <p>Current result: <span id="button-test-result">Checking...</span></p>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Update screen dimensions
        function updateScreenInfo() {
            document.getElementById('screen-width').textContent = window.innerWidth;
            document.getElementById('screen-height').textContent = window.innerHeight;
            
            // Update orientation
            var orientation = window.innerWidth > window.innerHeight ? 'Landscape' : 'Portrait';
            document.getElementById('orientation').textContent = orientation;
            
            // Update device type based on width
            var deviceType = 'Desktop';
            if (window.innerWidth < 576) {
                deviceType = 'Mobile Small';
            } else if (window.innerWidth < 768) {
                deviceType = 'Mobile Large';
            } else if (window.innerWidth < 992) {
                deviceType = 'Tablet';
            } else if (window.innerWidth < 1200) {
                deviceType = 'Desktop Small';
            }
            document.getElementById('device-type').textContent = deviceType;
            
            // Run tests
            runTests();
        }
        
        // Run responsive tests
        function runTests() {
            // Grid test
            var gridItems = document.querySelectorAll('.test-grid-item');
            var gridItemWidth = gridItems.length > 0 ? gridItems[0].offsetWidth : 0;
            var containerWidth = document.querySelector('.test-grid').offsetWidth;
            var columnsCount = Math.round(containerWidth / gridItemWidth);
            
            var gridTestResult = document.getElementById('grid-test-result');
            if ((window.innerWidth >= 992 && columnsCount === 4) || 
                (window.innerWidth >= 576 && window.innerWidth < 992 && columnsCount === 2) || 
                (window.innerWidth < 576 && columnsCount === 1)) {
                gridTestResult.textContent = 'PASS';
                gridTestResult.className = 'test-pass';
            } else {
                gridTestResult.textContent = 'FAIL - Expected ' + 
                    (window.innerWidth >= 992 ? '4' : (window.innerWidth >= 576 ? '2' : '1')) + 
                    ' columns, got ' + columnsCount;
                gridTestResult.className = 'test-fail';
            }
            
            // Typography test
            var h1Size = parseFloat(window.getComputedStyle(document.querySelector('h1')).fontSize);
            var pSize = parseFloat(window.getComputedStyle(document.querySelector('p')).fontSize);
            
            var typographyTestResult = document.getElementById('typography-test-result');
            if ((window.innerWidth < 576 && h1Size <= 24) || 
                (window.innerWidth >= 576 && h1Size > 24)) {
                typographyTestResult.textContent = 'PASS';
                typographyTestResult.className = 'test-pass';
            } else {
                typographyTestResult.textContent = 'FAIL - H1 size not scaling properly';
                typographyTestResult.className = 'test-fail';
            }
            
            // Image test
            var image = document.querySelector('.test-image');
            var imageContainer = image.parentElement;
            
            var imageTestResult = document.getElementById('image-test-result');
            if (image.offsetWidth <= imageContainer.offsetWidth) {
                imageTestResult.textContent = 'PASS';
                imageTestResult.className = 'test-pass';
            } else {
                imageTestResult.textContent = 'FAIL - Image overflows container';
                imageTestResult.className = 'test-fail';
            }
            
            // Navigation test
            var mainNav = document.querySelector('.main-navigation');
            var mobileMenuVisible = window.getComputedStyle(document.querySelector('.mobile-menu-toggle')).display !== 'none';
            
            var navigationTestResult = document.getElementById('navigation-test-result');
            if ((window.innerWidth >= 992 && !mobileMenuVisible) || 
                (window.innerWidth < 992 && mobileMenuVisible)) {
                navigationTestResult.textContent = 'PASS';
                navigationTestResult.className = 'test-pass';
            } else {
                navigationTestResult.textContent = 'FAIL - Navigation not switching correctly';
                navigationTestResult.className = 'test-fail';
            }
            
            // Button test
            var buttons = document.querySelectorAll('.test-button');
            var buttonContainer = document.querySelector('.test-buttons');
            var buttonDirection = window.getComputedStyle(buttonContainer).flexDirection;
            
            var buttonTestResult = document.getElementById('button-test-result');
            if ((window.innerWidth < 576 && buttonDirection === 'column') || 
                (window.innerWidth >= 576 && buttonDirection !== 'column')) {
                buttonTestResult.textContent = 'PASS';
                buttonTestResult.className = 'test-pass';
            } else {
                buttonTestResult.textContent = 'FAIL - Buttons not stacking correctly on mobile';
                buttonTestResult.className = 'test-fail';
            }
        }
        
        // Initial update
        updateScreenInfo();
        
        // Update on resize
        window.addEventListener('resize', updateScreenInfo);
    });
</script>

<?php wp_footer(); ?>
</body>
</html>
