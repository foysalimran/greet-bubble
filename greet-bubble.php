<?php
/*
Plugin Name:  Greet Bubble
Plugin URI:   https://wp-plugins.themeatelier.net/greet/
Description:  Professional video bubble plugin for putting videos on your website in a great and fun way.
Version:      3.6.2
Author:       ThemeAtelier
Author URI:   https://themeatelier.net/
License:      GPL2
License URI:  https://www.gnu.org/licenses/gpl-2.0.html
Text Domain:  greet-bubble
Domain Path:  /languages
*/

// Block Direct access
if (!defined('ABSPATH')) {
    die('You should not access this file directly!.');
}

// load text domain from plugin folder
function greet_load_textdomain()
{
    load_plugin_textdomain('greet-bubble', false, dirname(__FILE__) . "/languages");
}
add_action("plugins_loaded", 'greet_load_textdomain');


// Define constants for plugin directory path.
if (!defined('GREET_VERSION'))
    define('GREET_VERSION', '3.5.0');

// Define constants for plugin directory path.
if (!defined('GREET_DIR_PATH'))
    define('GREET_DIR_PATH', plugin_dir_path(__FILE__));

// Define constants for plugin directory path.
if (!defined('GREET_DIR_URL'))
    define('GREET_DIR_URL', plugin_dir_url(__FILE__));


// Plugin settings in plugin list
add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'greet_settings_link');
function greet_settings_link(array $links)
{
    $url = get_admin_url() . "admin.php?page=greet-options#tab=upload-video";
    $settings_link = '<a href="' . esc_url($url) . '">' . esc_html__('Settings', 'greet-bubble') . '</a>';
    $links[] = $settings_link;
    return $links;
}


// Pro version link
add_filter('plugin_action_links_' . plugin_basename(__FILE__), 'greet_pro_link');
function greet_pro_link(array $links)
{
    $url = "https://1.envato.market/gbdm79";
    $settings_link = '<a style="color: #35b747; font-weight: 700;" href="' . esc_url($url) . '">' . esc_html__('Go Pro!', 'greet-bubble') . '</a>';
    $links[] = $settings_link;
    return $links;
}


// Require files
require_once dirname(__FILE__) . '/admin/greet-framework/classes/setup.class.php'; // greet setup
require_once dirname(__FILE__) . '/admin/greet-bubble-options.php'; // Greet options
require_once dirname(__FILE__) . '/frontend/greet-main.php';

/**
 * Initialize the plugin tracker
 *
 * @return void
 */
function greet_video_bubble_appsero_init()
{
    if (!class_exists('GreetAppSero\Insights')) {
        require_once GREET_DIR_PATH . 'admin/appsero/Client.php';
    }
    $client = new GreetAppSero\Client('53de6d86-33fe-48d4-9e6f-57ee60b8e3f1', 'Greet - Video Bubble Warm Welcome Plugin', __FILE__);
    // Active insights
    $client->insights()->init();
}
greet_video_bubble_appsero_init();
