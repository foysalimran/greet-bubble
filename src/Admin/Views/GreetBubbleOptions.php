<?php

/**
 * Views class for Shortcode generator options.
 *
 * @link       https://themeatelier.net
 * @since      1.0.0
 *
 * @package greet-bubble
 * @subpackage greet-bubble/Admin/Views/GreetBubbleOptions
 * @author     ThemeAtelier<themeatelierbd@gmail.com>
 */

namespace ThemeAtelier\GreetBubble\Admin\Views;

use ThemeAtelier\GreetBubble\Admin\Framework\Classes\GREET_BUBBLE;
use ThemeAtelier\GreetBubble\Admin\Views\GetHelp;

class GreetBubbleOptions
{

    /**
     * Create Option fields for the setting options.
     *
     * @param string $prefix Option setting key prefix.
     * @return void
     */
    public static function options($prefix)
    {
        GREET_BUBBLE::createOptions($prefix, array(
            'menu_title' => esc_html__('Greet Video', 'greet-bubble'),
            'menu_slug'  => 'greet-bubble-settings',
            'framework_title'   => esc_html__('Greet', 'greet-bubble'),
            'show_bar_menu' => false,
            'menu_icon' => 'dashicons-format-video',
            'footer_text'             => __('If you love the plugin don\'t forgot to add a review at <a target="_blank" href="https://wordpress.org/support/plugin/greet-bubble/reviews/#new-post">WordPress plugin repository</a>. ', 'greet-bubble'),
            'theme'                   => 'light',
            'ajax_save'        => true,
            'show_reset_all'   => false,
            'show_search'      => false,
            'show_all_options' => false,
            'show_sub_menu'    => false,
            'nav'              => 'inline',
            'menu_position'    => 58,
        ));

        //
        // Create a section
        //
        GREET_BUBBLE::createSection($prefix, array(
            'title'  => __('UPLOAD VIDEO', 'greet-bubble'),
            'icon'   => 'icofont-upload',
            'fields' => array(

                array(
                    'id'    => 'poster',
                    'type'  => 'media',
                    'title' => __('Default video poster', 'greet-bubble'),
                    'desc'  => __('Specifies an image to be shown while the video is downloading, or until the user hits the play button. If this is not included, the first frame of the video will be used instead.', 'greet-bubble'),
                    'library' => 'image',
                ),


                array(
                    'id'      => 'mp4',
                    'type'    => 'media',
                    'title'   => esc_html__('Upload Video (mp4)*', 'greet-bubble'),
                    'desc'  =>  __('If you do not have a mp4 video you may use <a href="http://www.freeconvert.com" target="_blank">this website</a> to convert your current version of video.', 'greet-bubble'),
                    'library' => 'video',
                ),

                array(
                    'id'    => 'button_text',
                    'title' => esc_html__('Button text', 'greet-bubble'),
                    'desc' => esc_html__('Add button text here. If you don\'t want to show the button just keep it blank.', 'greet-bubble'),
                    'type'  => 'text',
                    'default' => esc_html__('Make a booking', 'greet-bubble'),
                ),

                array(
                    'id'    => 'button_link',
                    'title' => esc_html__('Button link', 'greet-bubble'),
                    'desc' => esc_html__('Add link for opening as external link on first button click. Remove link if you want to load second video instead of link.', 'greet-bubble'),
                    'type'  => 'link',
                ),

                // Second video
                array(
                    'type'    => 'notice',
                    'style'   => 'normal',
                    'class'   => 'greet_pro_notice',
                    'content' => __('Want to add multiple video with multiple button control over your <strong>Greet Bubble</strong>? <a href="https://1.envato.market/gbdm79" target="_blank"><b>Upgrade To Pro!</b></a>.', 'greet-bubble'),
                ),
                array(
                    'id'      => 'second__video',
                    'class'   => 'greet_bubble_pro_only',
                    'type'    => 'media',
                    'title'   => __('Second video on first button click (mp4)', 'greet-bubble'),
                    'desc' => __('If you add video here the video will play on first button click', 'greet-bubble'),
                    'library' => 'video',
                    'dependency' => array('button_link', '==', 'false'),
                ),

                array(
                    'id'    => 'button_second_text',
                    'class'   => 'greet_bubble_pro_only',
                    'title' => __('Second button text', 'greet-bubble'),
                    'desc' => __('Add button text here. If you don\'t want to show the button just keep it blank.', 'greet-bubble'),
                    'type'  => 'text',
                ),

                array(
                    'id'    => 'button_second_link',
                    'class'   => 'greet_bubble_pro_only',
                    'title' => __('Second button link', 'greet-bubble'),
                    'desc' => __('Put link for opening as external link on second button click. Remove link if you want to load third video instead of link.', 'greet-bubble'),
                    'type'  => 'link',
                ),

                // Third video
                array(
                    'id'      => 'third__video',
                    'class'   => 'greet_bubble_pro_only',
                    'type'    => 'media',
                    'title'   => __('Third video on button click (mp4)', 'greet-bubble'),
                    'desc' => __('This video will play on second button click.', 'greet-bubble'),
                    'library' => 'video',
                    'dependency' => array('button_second_link', '==', 'false'),
                ),

                array(
                    'id'    => 'button_third_text',
                    'class'   => 'greet_bubble_pro_only',
                    'title' => __('Third button text', 'greet-bubble'),
                    'desc' => __('Add button text here. If you don\'t want to show the button just keep it blank.', 'greet-bubble'),
                    'type'  => 'text',
                ),

                array(
                    'id'    => 'button_third_link',
                    'class'   => 'greet_bubble_pro_only',
                    'title' => __('Third button link', 'greet-bubble'),
                    'desc' => __('Put link for opening as external link on third button click. Remove link if you want to load fourth video instead of link', 'greet-bubble'),
                    'type'  => 'link',
                ),

                // Fourth video
                array(
                    'id'      => 'fourth__video',
                    'class'   => 'greet_bubble_pro_only',
                    'type'    => 'media',
                    'title'   => __('Fourth video on button click (mp4)', 'greet-bubble'),
                    'desc' => __('This video will play on third button click.', 'greet-bubble'),
                    'library' => 'video',
                    'dependency' => array('button_third_link', '==', 'false'),
                ),


            )
        ));

        //
        // Validate
        //

        GREET_BUBBLE::createSection($prefix, array(
            'title'       => __('APPEARANCE', 'greet-bubble'),
            'icon'        => 'icofont-monitor',
            'fields'      => array(
                array(
                    'type'    => 'notice',
                    'style'   => 'normal',
                    'class'   => 'greet_pro_notice',
                    'content' => __('Explore the benefits of upgrading to the professional version by <a target="_blank" href="https://1.envato.market/gbdm79"><strong><i>clicking here</i></strong></a>.', 'greet-bubble'),
                ),


                array(
                    'id'    => 'hi_text',
                    'title' => esc_html__('Hi text Input', 'greet-bubble'),
                    'desc' => esc_html__('Change small hello text here', 'greet-bubble'),
                    'type'  => 'text',
                    'default' =>  esc_html__('Hello', 'greet-bubble'),
                ),

                array(
                    'id'     => 'hi_text_typography',
                    'class'  => 'greet_bubble_pro_only',
                    'desc'  => __('To unlock These Typography (940+ Google Fonts) options, <a target="_blank" href="https://1.envato.market/gbdm79"><strong><i>Upgrade To Pro!</i></strong></a>', 'greet-bubble'),
                    'title'  => __('Hi text typography', 'greet-bubble'),
                    'type'   => 'typography',
                ),

                array(
                    'id'          => 'greet_positon',
                    'type'        => 'button_set',
                    'title'       => esc_html__('Bubble position', 'greet-bubble'),
                    'desc' => esc_html__('Select bubble position you want to show', 'greet-bubble'),
                    'options'     => array(
                        'right'     => esc_html__('Right', 'greet-bubble'),
                        'greet-left'     => esc_html__('Left', 'greet-bubble'),
                    ),
                    'default'     => 'right'
                ),

                array(
                    'id' => 'session-hide',
                    'type' => 'switcher',
                    'class' => 'greet_bubble_pro_only',
                    'title' => __("Hide for session", "greet-bubble"),
                    'desc'  => __('Turn on to hide permenently for this session of user visit on close button click. <a target="_blank" href="https://1.envato.market/gbdm79"><strong><i>Upgrade To Pro!</i></strong></a>', 'greet-bubble'),

                ),

                array(
                    'id'         => 'pause-video',
                    'type'       => 'switcher',
                    'title'       => esc_html__('Pause video when leaving page', 'greet-bubble'),
                    'desc' => esc_html__('Turn on the option to pause video if they switch browser tab. ', 'greet-bubble'),
                ),


                array(
                    'id'      => 'border_color',
                    'type'    => 'color',
                    'title'   => esc_html__('Border Color', 'greet-bubble'),
                    'desc'   => esc_html__('Change bubble border color here', 'greet-bubble'),
                    'default' => '#7432ff',
                ),

                array(
                    'id'      => 'button_type',
                    'type'    => 'button_set',
                    'title'   => esc_html__('Button type', 'greet-bubble'),
                    'options' => array(
                        'square'    => esc_html__('Square', 'greet-bubble'),
                        'rounded'   => esc_html__('Rounded', 'greet-bubble'),
                    ),
                    'default' => 'square',
                ),


                array(
                    'id'      => 'button_radius',
                    'type'    => 'slider',
                    'title'   => esc_html__('Button radius', 'greet-bubble'),
                    'default' => 5,
                    'dependency' => array('button_type', '==', 'rounded'),
                ),

                array(
                    'id'        => 'buttonsColors',
                    'type'      => 'color_group',
                    'title'     => esc_html__('Buttons colors', 'greet-bubble'),
                    'options'   => array(
                        'buttons_bg' => esc_html__('Backorund', 'greet-bubble'),
                        'buttons_color' => esc_html__('Text color', 'greet-bubble'),
                        'buttons_hover_bg' => esc_html__('Background hover', 'greet-bubble'),
                        'buttons_hover_color' => esc_html__('Hover text color', 'greet-bubble'),
                    ),
                    'default'   => array(
                        'buttons_bg' => '#7432ff',
                        'buttons_color' => '#ffffff',
                        'buttons_hover_bg' => '#7113ff',
                        'buttons_hover_color' => '#ffffff',
                    )
                ),
                array(
                    'id'          => 'show_pages',
                    'class'       => 'greet_bubble_pro_only',
                    'type'        => 'select',
                    'title'       => __('Show Specefic pages only', 'greet-bubble'),
                    'chosen'      => true,
                    'multiple'    => true,
                    'sortable'    => false,
                    'ajax'        => true,
                    'options'     => 'pages',
                    'placeholder' => __('Select pages', 'greet-bubble'),
                    'desc'  => __('Want to show your <strong>Greet Bubble</srong> on specefic page only? <a target="_blank" href="https://1.envato.market/gbdm79"><strong><i>Upgrade To Pro!</i></strong></a>', 'greet-bubble'),
                ),

            )
        ));


        GREET_BUBBLE::createSection($prefix, array(
            'title'       => __('CONTROLS', 'greet-bubble'),
            'icon'        => 'icofont-eye-alt',
            'fields'      => array(
                array(
                    'type'    => 'notice',
                    'style'   => 'normal',
                    'class'   => 'greet_pro_notice',
                    'content' => __('Want essential controls over your <strong>Greet bubble</strong>? <a href="https://1.envato.market/gbdm79" target="_blank"><b>Upgrade To Pro!</b></a>', 'greet-bubble'),
                ),
                array(
                    'title'   => __('Hide re-play control', 'greet-bubble'),
                    'class'   => 'greet_bubble_pro_only',
                    'id'      => 'hide_replay',
                    'type'    => 'switcher',
                    'text_on'   => __('Yes', 'greet-bubble'),
                    'text_off'   => __('No', 'greet-bubble'),
                    'inline'  => true,
                    'default' => true,
                ),
                array(
                    'title'   => __('Hide mute/unmute control', 'greet-bubble'),
                    'class'   => 'greet_bubble_pro_only',
                    'id'      => 'hide_mute_unmute',
                    'type'    => 'switcher',
                    'text_on'   => __('Yes', 'greet-bubble'),
                    'text_off'   => __('No', 'greet-bubble'),
                    'inline'  => true,
                    'default' => true,
                ),
                array(
                    'title'   => __('Hide fullscreen control', 'greet-bubble'),
                    'class'   => 'greet_bubble_pro_only',
                    'id'      => 'hide_fullscreen',
                    'type'    => 'switcher',
                    'text_on'   => __('Yes', 'greet-bubble'),
                    'text_off'   => __('No', 'greet-bubble'),
                    'inline'  => true,
                    'default' => true,
                ),
            )
        ));


        GREET_BUBBLE::createSection($prefix, array(
            'title'       => __('ADVANCED', 'greet-bubble'),
            'icon'        => 'icofont-code-alt',
            'fields' => array(
                array(
                    'id'       => 'greet_additional_css',
                    'type'     => 'code_editor',
                    'title'    => __('Additional CSS', 'greet-bubble'),
                    'settings' => array(
                        'theme' => 'mbo',
                        'mode'  => 'css',
                    ),
                ),
                array(
                    'id'       => 'greet_additional_js',
                    'type'     => 'code_editor',
                    'title'    => __('Additional JS', 'greet-bubble'),
                    'settings' => array(
                        'theme' => 'mbo',
                        'mode'  => 'js',
                    ),
                ),
            ),

        ));


        GREET_BUBBLE::createSection($prefix, array(
            'title'       => esc_html__('BACKUP', 'greet-bubble'),
            'icon'        => 'icofont-shield',
            'description' => esc_html__('Export or import to use same settings in different websites.', 'greet-bubble'),
            'fields'      => array(
                array(
                    'type' => 'backup',
                ),

            )
        ));

    }
}
