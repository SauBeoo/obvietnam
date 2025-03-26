<?php
/**
 * Functions for testing the theme across different devices
 *
 * @package OB_Vietnam_Custom
 */

/**
 * Add device detection functionality
 */
function obvietnam_custom_detect_device() {
    $user_agent = $_SERVER['HTTP_USER_AGENT'];
    $device_class = 'desktop';
    
    // Mobile detection
    if (preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada\/|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm( os)?|phone|p(ixi|re)\/|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows ce|xda|xiino/i', $user_agent) || preg_match('/1207|6310|6590|3gso|4thp|50[1-6]i|770s|802s|a wa|abac|ac(er|oo|s\-)|ai(ko|rn)|al(av|ca|co)|amoi|an(ex|ny|yw)|aptu|ar(ch|go)|as(te|us)|attw|au(di|\-m|r |s )|avan|be(ck|ll|nq)|bi(lb|rd)|bl(ac|az)|br(e|v)w|bumb|bw\-(n|u)|c55\/|capi|ccwa|cdm\-|cell|chtm|cldc|cmd\-|co(mp|nd)|craw|da(it|ll|ng)|dbte|dc\-s|devi|dica|dmob|do(c|p)o|ds(12|\-d)|el(49|ai)|em(l2|ul)|er(ic|k0)|esl8|ez([4-7]0|os|wa|ze)|fetc|fly(\-|_)|g1 u|g560|gene|gf\-5|g\-mo|go(\.w|od)|gr(ad|un)|haie|hcit|hd\-(m|p|t)|hei\-|hi(pt|ta)|hp( i|ip)|hs\-c|ht(c(\-| |_|a|g|p|s|t)|tp)|hu(aw|tc)|i\-(20|go|ma)|i230|iac( |\-|\/)|ibro|idea|ig01|ikom|im1k|inno|ipaq|iris|ja(t|v)a|jbro|jemu|jigs|kddi|keji|kgt( |\/)|klon|kpt |kwc\-|kyo(c|k)|le(no|xi)|lg( g|\/(k|l|u)|50|54|\-[a-w])|libw|lynx|m1\-w|m3ga|m50\/|ma(te|ui|xo)|mc(01|21|ca)|m\-cr|me(rc|ri)|mi(o8|oa|ts)|mmef|mo(01|02|bi|de|do|t(\-| |o|v)|zz)|mt(50|p1|v )|mwbp|mywa|n10[0-2]|n20[2-3]|n30(0|2)|n50(0|2|5)|n7(0(0|1)|10)|ne((c|m)\-|on|tf|wf|wg|wt)|nok(6|i)|nzph|o2im|op(ti|wv)|oran|owg1|p800|pan(a|d|t)|pdxg|pg(13|\-([1-8]|c))|phil|pire|pl(ay|uc)|pn\-2|po(ck|rt|se)|prox|psio|pt\-g|qa\-a|qc(07|12|21|32|60|\-[2-7]|i\-)|qtek|r380|r600|raks|rim9|ro(ve|zo)|s55\/|sa(ge|ma|mm|ms|ny|va)|sc(01|h\-|oo|p\-)|sdk\/|se(c(\-|0|1)|47|mc|nd|ri)|sgh\-|shar|sie(\-|m)|sk\-0|sl(45|id)|sm(al|ar|b3|it|t5)|so(ft|ny)|sp(01|h\-|v\-|v )|sy(01|mb)|t2(18|50)|t6(00|10|18)|ta(gt|lk)|tcl\-|tdg\-|tel(i|m)|tim\-|t\-mo|to(pl|sh)|ts(70|m\-|m3|m5)|tx\-9|up(\.b|g1|si)|utst|v400|v750|veri|vi(rg|te)|vk(40|5[0-3]|\-v)|vm40|voda|vulc|vx(52|53|60|61|70|80|81|83|85|98)|w3c(\-| )|webc|whit|wi(g |nc|nw)|wmlb|wonu|x700|yas\-|your|zeto|zte\-/i', substr($user_agent, 0, 4))) {
        $device_class = 'mobile';
    }
    
    // Tablet detection
    if (preg_match('/tablet|ipad|playbook|silk|android(?!.*mobile)/i', $user_agent)) {
        $device_class = 'tablet';
    }
    
    return $device_class;
}

/**
 * Add device-specific body classes
 */
function obvietnam_custom_device_body_class($classes) {
    $device = obvietnam_custom_detect_device();
    $classes[] = 'device-' . $device;
    
    // Add orientation class
    if (isset($_COOKIE['orientation'])) {
        $classes[] = 'orientation-' . $_COOKIE['orientation'];
    }
    
    return $classes;
}
add_filter('body_class', 'obvietnam_custom_device_body_class');

/**
 * Add device testing toolbar for administrators
 */
function obvietnam_custom_device_test_toolbar() {
    if (current_user_can('administrator') && !is_admin()) {
        $current_device = obvietnam_custom_detect_device();
        
        echo '<div class="device-test-toolbar">
            <div class="device-test-info">
                <span class="device-label">Device:</span> 
                <span class="device-value">' . ucfirst($current_device) . '</span>
                <span class="screen-label">Screen:</span> 
                <span class="screen-width">0</span>x<span class="screen-height">0</span>
            </div>
            <div class="device-test-actions">
                <button class="device-test-button" id="toggle-grid">Toggle Grid</button>
                <button class="device-test-button" id="toggle-outlines">Toggle Outlines</button>
                <button class="device-test-button" id="check-responsive">Check Elements</button>
            </div>
        </div>';
        
        echo '<style>
            .device-test-toolbar {
                position: fixed;
                bottom: 20px;
                right: 20px;
                z-index: 9999;
                background: rgba(0,0,0,0.8);
                color: white;
                padding: 10px;
                border-radius: 5px;
                font-family: Arial, sans-serif;
                font-size: 12px;
                max-width: 300px;
            }
            .device-test-info {
                margin-bottom: 8px;
                display: flex;
                flex-wrap: wrap;
                gap: 5px 10px;
            }
            .device-label, .screen-label {
                font-weight: bold;
            }
            .device-test-actions {
                display: flex;
                gap: 5px;
            }
            .device-test-button {
                background: #4a90e2;
                color: white;
                border: none;
                padding: 5px 8px;
                border-radius: 3px;
                cursor: pointer;
                font-size: 11px;
                flex: 1;
            }
            .device-test-button:hover {
                background: #3a80d2;
            }
            .responsive-grid {
                display: none;
                position: fixed;
                top: 0;
                left: 0;
                right: 0;
                bottom: 0;
                z-index: 9998;
                pointer-events: none;
            }
            .responsive-grid-inner {
                height: 100%;
                max-width: 1200px;
                margin: 0 auto;
                display: grid;
                grid-template-columns: repeat(12, 1fr);
                gap: 30px;
            }
            .responsive-grid-col {
                background: rgba(255, 0, 0, 0.1);
                height: 100%;
            }
            .responsive-outlines * {
                outline: 1px solid rgba(0, 100, 255, 0.2) !important;
            }
            .responsive-check-active * {
                transition: outline 0.2s ease-in-out !important;
            }
            .responsive-check-active *:hover {
                outline: 2px solid rgba(255, 0, 0, 0.7) !important;
                position: relative;
            }
            .responsive-check-active *:hover:after {
                content: attr(class);
                position: absolute;
                bottom: 100%;
                left: 0;
                background: rgba(0,0,0,0.8);
                color: white;
                padding: 3px 6px;
                font-size: 10px;
                white-space: nowrap;
                z-index: 9999;
            }
        </style>';
        
        echo '<div class="responsive-grid">
            <div class="responsive-grid-inner">';
        
        for ($i = 0; $i < 12; $i++) {
            echo '<div class="responsive-grid-col"></div>';
        }
        
        echo '</div>
        </div>';
        
        echo '<script>
            document.addEventListener("DOMContentLoaded", function() {
                // Update screen dimensions
                function updateScreenDimensions() {
                    document.querySelector(".screen-width").textContent = window.innerWidth;
                    document.querySelector(".screen-height").textContent = window.innerHeight;
                    
                    // Set orientation cookie
                    var orientation = window.innerWidth > window.innerHeight ? "landscape" : "portrait";
                    document.cookie = "orientation=" + orientation + "; path=/";
                    
                    // Update body class
                    if (orientation === "landscape") {
                        document.body.classList.add("orientation-landscape");
                        document.body.classList.remove("orientation-portrait");
                    } else {
                        document.body.classList.add("orientation-portrait");
                        document.body.classList.remove("orientation-landscape");
                    }
                }
                
                // Toggle grid
                document.getElementById("toggle-grid").addEventListener("click", function() {
                    var grid = document.querySelector(".responsive-grid");
                    grid.style.display = grid.style.display === "block" ? "none" : "block";
                });
                
                // Toggle outlines
                document.getElementById("toggle-outlines").addEventListener("click", function() {
                    document.body.classList.toggle("responsive-outlines");
                });
                
                // Check responsive elements
                document.getElementById("check-responsive").addEventListener("click", function() {
                    document.body.classList.toggle("responsive-check-active");
                });
                
                // Initial update
                updateScreenDimensions();
                
                // Update on resize
                window.addEventListener("resize", updateScreenDimensions);
            });
        </script>';
    }
}
add_action('wp_footer', 'obvietnam_custom_device_test_toolbar', 999);

/**
 * Add responsive image sizes for testing
 */
function obvietnam_custom_test_image_sizes() {
    // Add specific test sizes for different devices
    add_image_size('test-mobile', 576, 9999);
    add_image_size('test-tablet', 768, 9999);
    add_image_size('test-desktop-small', 992, 9999);
    add_image_size('test-desktop', 1200, 9999);
}
add_action('after_setup_theme', 'obvietnam_custom_test_image_sizes');

/**
 * Log responsive issues for administrators
 */
function obvietnam_custom_log_responsive_issues() {
    if (current_user_can('administrator') && !is_admin() && isset($_GET['log_responsive_issues'])) {
        echo '<script>
            document.addEventListener("DOMContentLoaded", function() {
                // Check for horizontal overflow
                function checkOverflow() {
                    var docWidth = document.documentElement.offsetWidth;
                    var overflowElements = [];
                    
                    document.querySelectorAll("*").forEach(function(element) {
                        var rect = element.getBoundingClientRect();
                        if (rect.width > docWidth || rect.right > docWidth) {
                            overflowElements.push({
                                element: element.tagName,
                                class: element.className,
                                id: element.id,
                                width: rect.width,
                                right: rect.right
                            });
                        }
                    });
                    
                    if (overflowElements.length > 0) {
                        console.log("Responsive Issues - Elements causing horizontal overflow:", overflowElements);
                        
                        // Create visual indicators
                        overflowElements.forEach(function(item) {
                            var elements = document.querySelectorAll(item.id ? "#" + item.id : (item.class ? "." + item.class.replace(/\s+/g, ".") : item.element));
                            elements.forEach(function(el) {
                                el.style.outline = "2px solid red";
                                var indicator = document.createElement("div");
                                indicator.style.position = "absolute";
                                indicator.style.top = "0";
                                indicator.style.right = "0";
                                indicator.style.background = "red";
                                indicator.style.color = "white";
                                indicator.style.padding = "2px 5px";
                                indicator.style.fontSize = "10px";
                                indicator.style.zIndex = "9999";
                                indicator.textContent = "Overflow: " + Math.round(item.width) + "px";
                                
                                if (el.style.position !== "absolute" && el.style.position !== "fixed") {
                                    el.style.position = "relative";
                                }
                                
                                el.appendChild(indicator);
                            });
                        });
                    }
                }
                
                // Run overflow check
                setTimeout(checkOverflow, 1000);
            });
        </script>';
    }
}
add_action('wp_head', 'obvietnam_custom_log_responsive_issues', 999);
