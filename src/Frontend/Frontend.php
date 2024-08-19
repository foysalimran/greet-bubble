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
 * @subpackage greet-bubble/Frontend
 * @author     ThemeAtelier<themeatelierbd@gmail.com>
 */

namespace ThemeAtelier\GreetBubble\Frontend;
use ThemeAtelier\GreetBubble\Frontend\Templates\Template;

/**
 * The Frontend class to manage all public facing stuffs.
 *
 * @since 1.0.0
 */
class Frontend
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
     * Initialize the class and set its properties.
     *
     * @since    1.0.0
     * @param      string $plugin_name       The name of the plugin.
     * @param      string $version    The version of this plugin.
     */
    public function __construct()
    {
        $this->min   = defined('WP_DEBUG') && WP_DEBUG ? '' : '.min';
        add_action('wp_footer', [$this, 'greet_bubble_content']);
    }

    /**
     * Register the stylesheets for the public-facing side of the site.
     *
     * @since    1.0.0
     */
    public static function enqueue_scripts()
    {
        $options                = get_option('_greet');
        $custom_js              = isset($options['greet_additional_js']) ? $options['greet_additional_js'] : '';
        $additional_css         = isset($options['greet_additional_css']) ? $options['greet_additional_css'] : '';

        wp_enqueue_style('ico-font');
        wp_enqueue_style('greet-style');

        $button_type           = isset($options['button_type']) ? $options['button_type'] : '';
        $button_radius           = isset($options['button_radius']) ? $options['button_radius'] : '';
        $border_color           = isset($options['border_color']) ? $options['border_color'] : '#7432ff';
        $buttonsColors          = isset($options['buttonsColors']) ? $options['buttonsColors'] : '';
        $buttons_bg             = isset($buttonsColors['buttons_bg']) ? $buttonsColors['buttons_bg'] : '#7432ff';
        $buttons_hover_bg       = isset($buttonsColors['buttons_hover_bg']) ? $buttonsColors['buttons_hover_bg'] : '#7432ff';
        $buttons_color          = isset($buttonsColors['buttons_color']) ? $buttonsColors['buttons_color'] : '#ffffff';
        $buttons_hover_color    = isset($buttonsColors['buttons_hover_color']) ? $buttonsColors['buttons_hover_color'] : '#ffffff';
        $scroll_bar_colors      = isset($options['scroll_bar_colors']) ? $options['scroll_bar_colors'] : '';
        $thumb_bg               = isset($scroll_bar_colors['thumb_bg']) ? $scroll_bar_colors['thumb_bg'] : '#7432ff';
        $track_bg               = isset($scroll_bar_colors['track_bg']) ? $scroll_bar_colors['track_bg'] : '#eeeeee';
        $custom_css = "
        :root {
            --border-color: {$border_color};
            --buttons-bg-color: {$buttons_bg};
            --buttons-hover-bg-color: {$buttons_hover_bg};
            --buttons-color: {$buttons_color};
            --buttons-hover-color: {$buttons_hover_color};
            --thumb-bg: {$thumb_bg};
            --track-bg: {$track_bg};
        }
        ";
        if ($button_type == 'rounded') {
            $custom_css .= ".greet_wrapper_full .greet_change_video [class*=video] a {border-radius: {$button_radius}px}";
        }
        wp_add_inline_style('greet-style', $custom_css);

        wp_enqueue_script('greet-script');
        if (!empty($additional_css)) {
            wp_add_inline_style('greet-style', $additional_css);
        }
        if (!empty($custom_js)) {
            wp_add_inline_script('greet-script', $custom_js);
        }
        wp_localize_script(
            'greet-script',
            'frontend_scripts',
            array(
                'pause_on_switch' => esc_attr($options['pause-video']),
                'hide_for_session' => esc_attr($options['session-hide']),
                'ajaxurl' => admin_url('admin-ajax.php'),
                'nonce'   => wp_create_nonce('greet_nonce'),
            )
        );
    }

    public function greet_bubble_content()
    {
        // Meta csf option
        $options = get_option('_greet');
        $show_pages = $options['show_pages'];
        $meta = get_post_meta(get_the_ID(), '_greet_meta', true);

        if (!empty($meta['video']['url'])) :
            Template::content($meta);
        else :
            $video = isset($options['video']) ? $options['video'] : '';
            $video_url = isset($video['url']) ? $video['url'] : '';

            if ($show_pages && $video_url) :
                if (is_page($show_pages)) :
                    Template::content($options);
                endif;
            elseif ($video_url) :

                Template::content($options);
            endif;
        endif;
    }
}
