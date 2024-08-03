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
 * @package idonate-pro
 * @subpackage idonate-pro/Frontend
 * @author     ThemeAtelier<themeatelierbd@gmail.com>
 */

namespace ThemeAtelier\GreetBubble\Frontend;

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
        $options = get_option('_greet');
        $custom_js            = isset($options['greet_additional_js']) ? $options['greet_additional_js'] : '';
        $custom_css            = isset($options['greet_additional_css']) ? $options['greet_additional_css'] : '';

        wp_enqueue_style('ico-font');
        wp_enqueue_style('greet-style');

        wp_enqueue_script('greet-script');
        if (!empty($custom_css)) {
            wp_add_inline_style('greet-style', $custom_css);
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
            )
        );
    }

    public function greet_bubble_content()
    {
        // Greet options
        $options = get_option('_greet');

        $greet_button_target = isset($options['button_link']['target']) ? $options['button_link']['target'] : '_self';
?>

        <?php if (!empty($options['mp4']['url'])) : ?>
            <div id="greet_wrapper" class="greet_wrapper greet_toggler <?php echo esc_attr($options['greet_positon']) ?>">
                <video id="greet_video" <?php if (isset($options['poster']['url'])) : ?>poster="<?php echo esc_url($options['poster']['url']); ?>" <?php endif; ?>>
                    <source id="playVideo" type="video/mp4" src="<?php echo esc_url($options['mp4']['url']) ?>#t=0.5" />
                </video>
                <h4 id="greet_text" class="greet_text"><?php echo esc_html($options['hi_text'])  ?></h4>

                <div class="greet_close">
                    <i class="icofont-close-circled"></i>
                </div>
                <div id="greet_full-btn">
                    <div class="greet_full-close">
                        <i class="icofont-close-line"></i>
                    </div>
                    <div id="greet_full-play" class="greet_full-play">
                        <i class="icofont-play"></i>
                    </div>
                    <div class="greet_media-action">
                        <div id="greet_full-replay" class="greet_full-replay" onclick="videoChange('<?php echo esc_url($options['mp4']['url']) ?>')">
                            <i class="icofont-spinner-alt-3"></i>
                        </div>
                        <div id="greet_full-volume" class="greet_full-volume">
                            <i class="icofont-volume-up"></i>
                        </div>
                        <div id="greet_full-mute" class="greet_full-mute">
                            <i class="icofont-ui-mute"></i>
                        </div>
                        <div id="greet_full-expand" class="greet_full-expand">
                            <i class="icofont-expand"></i>
                        </div>
                    </div>
                    <div class="greet_change-video">
                        <?php if ($options['button_text']) {  ?>
                            <div class="greet_video">
                                <?php if ($options['button_text']) {  ?>
                                    <a target="<?php echo esc_attr($greet_button_target); ?>" href="<?php echo esc_attr($options['button_link']['url']) ?>"><?php echo esc_html($options['button_text']) ?></a>
                                <?php } ?>
                            </div>
                        <?php } ?>
                    </div>
                    <div class="greet__powered__by">
                        Powered By: <a target="_blank" style="color:#fff" href="https://wordpress.org/plugins/greet-bubble/">Greet</a>
                    </div>
                </div>

            </div>
            <style>
                .greet_wrapper video {
                    border-color: <?php echo esc_attr($options['border_color']) ?>;
                }

                .greet_wrapper-full .greet_change-video [class*="video"] a {
                    background-color: <?php echo esc_attr($options['buttonsColors']['buttons_bg']) ?>;
                    color: <?php echo esc_attr($options['buttonsColors']['buttons_color']) ?>;
                    <?php if ($options['button_type'] == 'rounded') {
                    ?>border-radius: <?php echo esc_attr($options['button_radius']) ?>px;
                    <?php
                    }
                    ?>
                }

                .greet_wrapper-full .greet_change-video [class*="video"] a:hover {
                    background-color: <?php echo esc_attr($options['buttonsColors']['buttons_hover_bg']) ?>;
                    color: <?php echo esc_attr($options['buttonsColors']['buttons_hover_color']) ?>;
                }
            </style>
<?php endif;
    }
}
