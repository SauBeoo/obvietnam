<?php
/**
 * Functions for testing responsive design
 *
 * @package OB_Vietnam_Custom
 */

/**
 * Add viewport testing meta
 */
function obvietnam_custom_responsive_test_meta() {
    if (isset($_GET['viewport_test']) && $_GET['viewport_test'] == 'true') {
        echo '<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=5.0">';
        echo '<style>
            body:before {
                content: "Desktop View";
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                background: rgba(0,0,0,0.8);
                color: white;
                z-index: 9999;
                padding: 5px 10px;
                font-size: 12px;
                text-align: center;
            }
            @media (max-width: 1199px) {
                body:before {
                    content: "Desktop Small View (1199px)";
                    background: rgba(0,100,0,0.8);
                }
            }
            @media (max-width: 991px) {
                body:before {
                    content: "Tablet View (991px)";
                    background: rgba(0,0,100,0.8);
                }
            }
            @media (max-width: 767px) {
                body:before {
                    content: "Mobile View (767px)";
                    background: rgba(100,0,0,0.8);
                }
            }
            @media (max-width: 575px) {
                body:before {
                    content: "Small Mobile View (575px)";
                    background: rgba(100,0,100,0.8);
                }
            }
        </style>';
    }
}
add_action('wp_head', 'obvietnam_custom_responsive_test_meta', 0);

/**
 * Add responsive testing toolbar
 */
function obvietnam_custom_responsive_test_toolbar() {
    if (current_user_can('administrator') && !is_admin()) {
        echo '<div class="responsive-test-toolbar">
            <div class="responsive-test-toggle">Responsive Test</div>
            <div class="responsive-test-options">
                <a href="?viewport_test=true" class="responsive-test-button">Enable Test Mode</a>
                <a href="?" class="responsive-test-button">Disable Test Mode</a>
                <div class="responsive-test-sizes">
                    <button class="responsive-size-button" data-width="1200">Desktop</button>
                    <button class="responsive-size-button" data-width="992">Tablet</button>
                    <button class="responsive-size-button" data-width="768">Mobile</button>
                    <button class="responsive-size-button" data-width="576">Small Mobile</button>
                </div>
            </div>
        </div>';
        
        echo '<style>
            .responsive-test-toolbar {
                position: fixed;
                bottom: 20px;
                left: 20px;
                z-index: 9999;
                font-family: Arial, sans-serif;
            }
            .responsive-test-toggle {
                background: #333;
                color: white;
                padding: 8px 15px;
                border-radius: 4px;
                cursor: pointer;
                font-size: 14px;
            }
            .responsive-test-options {
                display: none;
                background: white;
                border: 1px solid #ddd;
                border-radius: 4px;
                padding: 10px;
                margin-top: 5px;
                box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            }
            .responsive-test-button {
                display: block;
                margin-bottom: 8px;
                padding: 5px 10px;
                background: #f5f5f5;
                text-decoration: none;
                color: #333;
                border-radius: 3px;
                font-size: 13px;
                text-align: center;
            }
            .responsive-test-button:hover {
                background: #e5e5e5;
            }
            .responsive-test-sizes {
                display: flex;
                flex-wrap: wrap;
                gap: 5px;
                margin-top: 8px;
            }
            .responsive-size-button {
                flex: 1;
                padding: 5px;
                background: #4a90e2;
                color: white;
                border: none;
                border-radius: 3px;
                cursor: pointer;
                font-size: 12px;
            }
            .responsive-size-button:hover {
                background: #3a80d2;
            }
        </style>';
        
        echo '<script>
            document.addEventListener("DOMContentLoaded", function() {
                var toggle = document.querySelector(".responsive-test-toggle");
                var options = document.querySelector(".responsive-test-options");
                var sizeButtons = document.querySelectorAll(".responsive-size-button");
                
                toggle.addEventListener("click", function() {
                    options.style.display = options.style.display === "block" ? "none" : "block";
                });
                
                sizeButtons.forEach(function(button) {
                    button.addEventListener("click", function() {
                        var width = this.getAttribute("data-width");
                        window.open(window.location.href, "", "width=" + width + ",height=800,resizable=yes,scrollbars=yes");
                    });
                });
            });
        </script>';
    }
}
add_action('wp_footer', 'obvietnam_custom_responsive_test_toolbar', 999);
