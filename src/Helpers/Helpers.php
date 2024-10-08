<?php

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the public-facing stylesheet and JavaScript.
 *
 * @link       https://themeatelier.net
 * @since      1.0.0
 *
 * @package greet-bubble
 * @subpackage greet-bubble/Helpers
 * @author     ThemeAtelier<themeatelierbd@gmail.com>
 */

namespace ThemeAtelier\GreetBubble\Helpers;

/**
 * The Helpers class to manage all public facing stuffs.
 *
 * @since 1.0.0
 */
class Helpers
{
    /**
     * The min of this plugin.
     *
     * @since    1.0.0
     * @access   private
     * @var      string    $min   The slug of this plugin.
     */
    private $min;
    /**
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param      string $plugin_name       The name of the plugin.
     * @param      string $version    The version of this plugin.
     */
    public function __construct()
    {
        $this->min   = defined('WP_DEBUG') && WP_DEBUG ? '' : '.min';
    }

    /**
     * Register the All scripts for the public-facing side of the site.
     *
     * @since    2.0
     */
    public function register_all_scripts()
    {
        wp_register_style('ico-font', GREET_BUBBLE_ASSETS . 'css/icofont' . $this->min . '.css', array(), GREET_BUBBLE_VERSION, 'all');
        wp_register_style('greet-style', GREET_BUBBLE_ASSETS . 'css/greet-style' . $this->min . '.css', array(), GREET_BUBBLE_VERSION, 'all');
        wp_register_style('greet-help', GREET_BUBBLE_ASSETS . 'css/help' . $this->min . '.css', array(), GREET_BUBBLE_VERSION, 'all');
        wp_register_style('greet-global-admin', GREET_BUBBLE_ASSETS . 'css/admin' . $this->min . '.css', array(), GREET_BUBBLE_VERSION, 'all');

        wp_register_script('greet-script', GREET_BUBBLE_ASSETS . 'js/greet-script' . $this->min . '.js', array('jquery'), GREET_BUBBLE_VERSION, true);
    }
}
