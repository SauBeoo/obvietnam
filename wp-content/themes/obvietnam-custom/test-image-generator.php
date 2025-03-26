<?php
/**
 * Test image generator for responsive testing
 *
 * @package OB_Vietnam_Custom
 */

// Set up the environment
define('WP_USE_THEMES', false);
require_once('../../../wp-load.php');

// Create test image
$width = isset($_GET['width']) ? intval($_GET['width']) : 800;
$height = isset($_GET['height']) ? intval($_GET['height']) : 600;
$text = isset($_GET['text']) ? $_GET['text'] : "{$width}x{$height}";
$bg_color = isset($_GET['bg']) ? $_GET['bg'] : '4a90e2';
$text_color = isset($_GET['text_color']) ? $_GET['text_color'] : 'ffffff';

// Convert hex colors to RGB
function hex2rgb($hex) {
    $hex = str_replace('#', '', $hex);
    if(strlen($hex) == 3) {
        $r = hexdec(substr($hex, 0, 1).substr($hex, 0, 1));
        $g = hexdec(substr($hex, 1, 1).substr($hex, 1, 1));
        $b = hexdec(substr($hex, 2, 1).substr($hex, 2, 1));
    } else {
        $r = hexdec(substr($hex, 0, 2));
        $g = hexdec(substr($hex, 2, 2));
        $b = hexdec(substr($hex, 4, 2));
    }
    return array($r, $g, $b);
}

// Create image
$im = imagecreatetruecolor($width, $height);

// Set colors
$bg_rgb = hex2rgb($bg_color);
$text_rgb = hex2rgb($text_color);
$bg = imagecolorallocate($im, $bg_rgb[0], $bg_rgb[1], $bg_rgb[2]);
$text_color = imagecolorallocate($im, $text_rgb[0], $text_rgb[1], $text_rgb[2]);

// Fill background
imagefill($im, 0, 0, $bg);

// Add grid pattern
$grid_color = imagecolorallocate($im, 
    max(0, $bg_rgb[0] - 20), 
    max(0, $bg_rgb[1] - 20), 
    max(0, $bg_rgb[2] - 20)
);

// Draw grid lines
$grid_size = 20;
for ($i = $grid_size; $i < $width; $i += $grid_size) {
    imageline($im, $i, 0, $i, $height, $grid_color);
}
for ($i = $grid_size; $i < $height; $i += $grid_size) {
    imageline($im, 0, $i, $width, $i, $grid_color);
}

// Add border
$border_color = imagecolorallocate($im, 
    max(0, $bg_rgb[0] - 40), 
    max(0, $bg_rgb[1] - 40), 
    max(0, $bg_rgb[2] - 40)
);
imagerectangle($im, 0, 0, $width - 1, $height - 1, $border_color);

// Add text
$font_size = min($width, $height) / 10;
$font_file = __DIR__ . '/assets/fonts/OpenSans-Bold.ttf';

// If font file doesn't exist, use default
if (!file_exists($font_file)) {
    // Add text using built-in font
    $font_size = 5; // 1-5
    $text_width = imagefontwidth($font_size) * strlen($text);
    $text_height = imagefontheight($font_size);
    
    $x = ($width - $text_width) / 2;
    $y = ($height - $text_height) / 2;
    
    imagestring($im, $font_size, $x, $y, $text, $text_color);
} else {
    // Get text dimensions
    $bbox = imagettfbbox($font_size, 0, $font_file, $text);
    $text_width = $bbox[2] - $bbox[0];
    $text_height = $bbox[1] - $bbox[7];
    
    // Calculate position
    $x = ($width - $text_width) / 2;
    $y = ($height + $text_height) / 2;
    
    // Add text
    imagettftext($im, $font_size, 0, $x, $y, $text_color, $font_file, $text);
}

// Add device info
$device_info = "Test Image";
if (isset($_GET['device'])) {
    $device_info = $_GET['device'];
}

// Add device info text
if (!file_exists($font_file)) {
    $info_font_size = 2;
    $info_text_width = imagefontwidth($info_font_size) * strlen($device_info);
    $info_x = ($width - $info_text_width) / 2;
    $info_y = $height - 20;
    
    imagestring($im, $info_font_size, $info_x, $info_y, $device_info, $text_color);
} else {
    $info_font_size = $font_size / 2;
    $bbox = imagettfbbox($info_font_size, 0, $font_file, $device_info);
    $info_text_width = $bbox[2] - $bbox[0];
    
    $info_x = ($width - $info_text_width) / 2;
    $info_y = $height - 20;
    
    imagettftext($im, $info_font_size, 0, $info_x, $info_y, $text_color, $font_file, $device_info);
}

// Output image
header('Content-Type: image/png');
imagepng($im);
imagedestroy($im);
