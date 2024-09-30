<?php

/**
 * Views class for Shortcode generator options.
 *
 * @link       https://themeatelier.net
 * @since      1.0.0
 *
 * @package greet-bubble
 * @subpackage greet-bubble/Admin/Views/GreetBubbleGeneral
 * @author     ThemeAtelier<themeatelierbd@gmail.com>
 */

namespace ThemeAtelier\GreetBubble\Admin\Views;

use ThemeAtelier\GreetBubble\Admin\Framework\Classes\GREET_BUBBLE;

class GreetBubbleGeneral
{

    /**
     * Create Option fields for the setting options.
     *
     * @param string $prefix Option setting key prefix.
     * @return void
     */
    public static function options($prefix)
    {
        //
        // Create a section
        //
        GREET_BUBBLE::createSection($prefix, array(
            'title'  => __('GENERAL', 'greet-bubble'),
            'icon'   => 'icofont-gear',
            'fields' => array(

                array(
                    'id'    => 'poster',
                    'type'  => 'media',
                    'title' => __('Default video poster', 'greet-bubble'),
                    'desc'  => __('Specifies an image to be shown while the video is downloading, or until the user hits the play button. If this is not included, the first frame of the video will be used instead.', 'greet-bubble'),
                    'library' => 'image',
                ),

                array(
                    'id'      => 'video',
                    'type'    => 'media',
                    'title'   => esc_html__('Upload Video (mp4)*', 'greet-bubble'),
                    'desc'  =>  __('If you do not have a mp4 video you may use <a href="http://www.freeconvert.com" target="_blank">this website</a> to convert your current version of video.', 'greet-bubble'),
                    'library' => 'video',
                ),

                array(
                    'id'     => 'bubble_buttons',
                    'type'   => 'group',
                    'max'   => 3,
                    'accordion_title_number' => true,
                    'title'  => esc_html__('Include Buttons', 'greet-bubble'),
                    'desc'   => __('By including a button you will able to use different functionalities on button click.', 'greet-bubble'),
                    'fields' => array(
                        array(
                            'id'    => 'button_text',
                            'title' => esc_html__('Button Text', 'greet-bubble'),
                            'desc' => esc_html__('Add button text here.', 'greet-bubble'),
                            'type'  => 'text',
                            'default' => esc_html__('Make a booking', 'greet-bubble'),
                        ),

                        array(
                            'id'    => 'button_icon',
                            'title' => esc_html__('Button Icon', 'greet-bubble'),
                            'desc' => esc_html__('Select Button icon', 'greet-bubble'),
                            'type'  => 'icon',
                        ),

                        array(
                            'id'        => 'button_behavior',
                            'type'      => 'button_set',
                            'inline'    => 'true',
                            'class'     => 'greet_bubble_pro_only',
                            'title'     => esc_html__('Button Behavior', 'greet-bubble'),
                            'desc'      => __('Select option to behave on button click. To access advanced form features such as WhatsApp forms, Web3 forms, and third-party form shortcodes, please <a target="_blank" href="https://1.envato.market/gbdm79"><strong><i>Upgrade To Pro!</i></strong></a>', 'greet-bubble'),
                            'options'    => array(

                                'another_video' => array(
                                    'text' => __('Another Video', 'greet-bubble'),
                                ),
                                'external_link' => array(
                                    'text' => __('External Link', 'greet-bubble'),
                                ),
                                'contact_form' => array(
                                    'text' => __('Contact Form', 'greet-bubble'),
                                    'pro_only'  => true,
                                ),

                            ),
                            'default' => 'another_video',
                        ),
                        array(
                            'id'      => 'video_link',
                            'type'    => 'media',
                            'title'   => esc_html__('Upload Video (mp4)*', 'greet-bubble'),
                            'desc'  =>  __('If you do not have a mp4 video you may use <a href="http://www.freeconvert.com" target="_blank">this website</a> to convert your current version of video.', 'greet-bubble'),
                            'library' => 'video',
                            'dependency' => array('button_behavior', '==', 'another_video'),
                        ),

                        array(
                            'id'    => 'button_link',
                            'title' => esc_html__('Add Button Link', 'greet-bubble'),
                            'desc' => esc_html__('Add link for opening as external link on first button click. Remove link if you want to load second video instead of link.', 'greet-bubble'),
                            'type'  => 'link',
                            'dependency' => array('button_behavior', '==', 'external_link'),
                        ),
                    ),
                ),
            )
        ));
    }
}
