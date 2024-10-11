<?php

/**
 * The admin-facing functionality of the plugin.
 *
 * @link       https://themeatelier.net
 * @since      1.0.0
 *
 * @package greet-bubble
 * @subpackage greet-bubble/Admin
 * @author     ThemeAtelier<themeatelierbd@gmail.com>
 */

namespace ThemeAtelier\GreetBubble\Admin;

use ThemeAtelier\GreetBubble\Admin\DBUpdates;
use ThemeAtelier\GreetBubble\Admin\Views\Views;
use ThemeAtelier\GreetBubble\Admin\Views\GreetBubbleOptions;

/**
 * The admin class
 */
class Admin
{
    /**
     * The slug of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $plugin_slug   The slug of this plugin.
     */
    private $plugin_slug;

    /**
     * The min of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $min   The slug of this plugin.
     */
    private $min;

    /**
     * The version of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $version    The current version of this plugin.
     */
    private $version;

    /**
     * The class constructor.
     *
     * @param string $plugin_slug The slug of the plugin.
     * @param string $version Current version of the plugin.
     */
    function __construct($plugin_slug, $version)
    {
        $this->plugin_slug = $plugin_slug;
        $this->version     = $version;
        $this->min         = defined('WP_DEBUG') && WP_DEBUG ? '' : '.min';
        Views::metaboxes('_greet_meta');
        GreetBubbleOptions::options('_greet');
        // Database Updater.
		new DBUpdates();
        add_action('admin_menu', array($this, 'add_plugin_page'));
    }

    /**
     * Register the stylesheets for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public static function enqueue_scripts($hook)
    {
        if ('toplevel_page_greet-bubble' == $hook || 'toplevel_page_greet-bubble-help') {

            wp_enqueue_style('greet-help');
        }
        wp_enqueue_style('greet-global-admin');
    }


    public function add_plugin_page()
    {
        // This page will be under "Settings"
        add_menu_page(
            esc_html__('Greet Bubble', 'greet-bubble'),
            esc_html__('Greet Bubble', 'greet-bubble'),
            'manage_options',
            'greet-bubble',
            array($this, 'greet_bubble_settings'),
            'dashicons-format-video',
            6
        );

        // Greet Bubble Settings Page.
        add_submenu_page(
            'greet-bubble',
            esc_html__('Settings', 'greet-bubble'),
            esc_html__('Settings', 'greet-bubble'),
            'manage_options',
            'greet-bubble',
            array($this, 'greet_bubble_settings')
        );

         // Greet Bubble Settings Page.
         add_submenu_page(
            'greet-bubble',
            esc_html__('Help', 'greet-bubble'),
            esc_html__('Help', 'greet-bubble'),
            'manage_options',
            'greet-bubble-help',
            array($this, 'greet_get_help_callback')
        );

        add_submenu_page('greet-bubble', __('👑 Upgrade to Pro!', 'greet-bubble'), sprintf('<span class="greet-bubble-pro-text">%s</span>', __('👑 Upgrade to Pro!', 'greet-bubble')), 'manage_options', 'https://1.envato.market/greet');
    }

    /**
     * Options page callback
     */
    public function greet_bubble_settings() {}

    // Greet help page

    public function greet_get_help_callback()
    {
    ?>
        <div class="wrap">
            <div class="greet-bubble-help-wrapper">
                <div class="greet_bubble__help--header">
                    <h3>Greet Bubble <span><?php echo GREET_BUBBLE_VERSION; ?></span></h3>
                    Thank you for installing <strong>Greet Bubble</strong> plugin! This video will help you get started with the plugin.
                </div>
    
                <div class="greet_bubble__help--video">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/3LbuUw7SdNQ?si=7pfYmbZhdrKacgxU" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
                </div>
    
                <div class="greet_bubble__help--footer">
                    <a class="button button-primary" href="<?php echo get_admin_url() . '/admin.php?page=greet-bubble'; ?>">Go to settings page</a>
                    <a target="_blank" class="button button-secondary" href="https://1.envato.market/gbdm79">Upgrade to pro</a>
                </div>
    
            </div>
        </div>
    <?php }
}
