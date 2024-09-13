<?php
/*
Plugin Name:  Greet Bubble
Plugin URI:   https://wp-plugins.themeatelier.net/greet/
Description:  Professional video bubble plugin for putting videos on your website in a great and fun way.
Version:      4.1.3
Author:       ThemeAtelier
Author URI:   https://themeatelier.net/
License:      GPL-2.0+
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  greet-bubble
Domain Path:  /languages
*/

// Block Direct access
if (!defined('ABSPATH')) {
    die('You should not access this file directly!.');
}
require_once __DIR__ . '/vendor/autoload.php';

use ThemeAtelier\GreetBubble\GreetBubble;

define('GREET_BUBBLE_VERSION', '4.1.3');
define('GREET_BUBBLE_FILE', __FILE__);
define('GREET_ALERT_MSG', esc_html__('You should not access this file directly.!', 'greet-bubble'));
define('GREET_BUBBLE_DIRNAME', dirname(__FILE__));
define('GREET_DIR_PATH', plugin_dir_path(__FILE__));
define('GREET_DIR_URL', plugin_dir_url(__FILE__));
define('GREET_BUBBLE_BASENAME', plugin_basename(__FILE__));

function greet_bubble()
{
    // Launch the plugin.
    $greet_bubble = new GreetBubble();
    $greet_bubble->run();
}

include_once ABSPATH . 'wp-admin/includes/plugin.php';
$pro_plugin_slug = 'greet-bubble-pro/greet-bubble-pro.php';
// kick-off the plugin
if (!is_plugin_active($pro_plugin_slug)) {
greet_bubble();
}

/**
 * Initialize the plugin tracker
 *
 * @return void
 */
function greet_video_bubble_appsero_init()
{
    if (!class_exists('GreetAppSero\Insights')) {
        require_once GREET_DIR_PATH . 'src/Admin/appsero/Client.php';
    }
    $client = new GreetAppSero\Client('53de6d86-33fe-48d4-9e6f-57ee60b8e3f1', 'Greet - Video Bubble Warm Welcome Plugin', __FILE__);
    // Active insights
    $client->insights()->init();
}
greet_video_bubble_appsero_init();