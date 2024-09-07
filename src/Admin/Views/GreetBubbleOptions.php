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
            'menu_title' => esc_html__('Greet Bubble', 'greet-bubble'),
            'menu_slug'  => 'greet-bubble',
            'menu_type'               => 'submenu',
            'framework_title'   => esc_html__('Greet Bubble', 'greet-bubble'),
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
                            'title' => esc_html__('Button Icon', 'greet-bubble-pro'),
                            'desc' => esc_html__('Select Button icon', 'greet-bubble-pro'),
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
                                    'text' => __( 'Another Video', 'greet-bubble' ),
                                ),
                                'external_link' => array(
                                    'text' => __( 'External Link', 'greet-bubble' ),
                                ),
                                'contact_form' => array(
                                    'text' => __( 'Contact Form', 'greet-bubble' ),
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

        //
        // Validate
        //

        GREET_BUBBLE::createSection($prefix, array(
            'title'       => __('APPEARANCE', 'greet-bubble'),
            'icon'        => 'icofont-paint',
            'fields'      => array(
                

                array(
                    'type'  => 'heading',
                    'title' => esc_html__('Bubble', 'greet-bubble'),
                ),

                array(
                    'id'    => 'hi_text',
                    'title' => esc_html__('Hi text Input', 'greet-bubble'),
                    'desc' => esc_html__('Change small \'Hi\' text here.', 'greet-bubble'),
                    'type'  => 'text',
                    'default' =>  esc_html__('Hi', 'greet-bubble'),
                ),

                array(
                    'id'     => 'hi_text_typography',
                    'class'  => 'greet_bubble_pro_only',
                    'desc'  => __('To unlock These Typography (940+ Google Fonts) options, <a target="_blank" href="https://1.envato.market/gbdm79"><strong><i>Upgrade To Pro!</i></strong></a>', 'greet-bubble'),
                    'title'  => __('\'Hi\' text typography.', 'greet-bubble'),
                    'type'   => 'typography',
                ),

                array(
                    'id'          => 'greet_positon',
                    'type'        => 'button_set',
                    'title'       => esc_html__('Bubble position', 'greet-bubble'),
                    'desc' => esc_html__('Select bubble position you want to show.', 'greet-bubble'),
                    'options'     => array(
                        'right' => array(
                            'text' => __( 'Right', 'greet-bubble' ),
                        ),
                        'greet-left' => array(
                            'text' => __( 'Left', 'greet-bubble' ),
                        ),
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
                    'desc'   => esc_html__('Change bubble border color here.', 'greet-bubble'),
                    'default' => '#7432ff',
                ),
                
                array(
                    'type'  => 'heading',
                    'title' => esc_html__('Buttons', 'greet-bubble'),
                ),

                array(
                    'id'    => 'buttons_typography',
                    'class'  => 'greet_bubble_pro_only',
                    'desc'  => __('To unlock These Typography (940+ Google Fonts) options, <a target="_blank" href="https://1.envato.market/gbdm79"><strong><i>Upgrade To Pro!</i></strong></a>', 'greet-bubble'),
                    'type'  => 'typography',
                    'title' => esc_html__('Buttons Typography', 'greet-bubble'),
                    'color' => false,
                    'text_align'    => false,
                  ),
                  array(
                    'id'    => 'button_display_type',
                    'type'    => 'button_set',
                    'title'   => esc_html__('Button Display Type', 'greet-bubble'),
                    'options' => array(
                        'text_only' => array(
                            'text' => __( 'Text Only', 'greet-bubble' ),
                        ),
                        'with_icon_and_text' => array(
                            'text' => __( 'With Icon and Text', 'greet-bubble' ),
                        ),
                        'icon_only' => array(
                            'text' => __( 'Icon Only', 'greet-bubble' ),
                            'pro_only' => true,
                        ),
                    ),
                    'default'   => 'text_only',
                ),
                array(
                    'id'      => 'button_type',
                    'type'    => 'button_set',
                    'title'   => esc_html__('Button type', 'greet-bubble'),
                    'desc'   => esc_html__('Select type of the buttons.', 'greet-bubble'),
                    'options' => array(
                        'square' => array(
                            'text' => __( 'Square', 'greet-bubble' ),
                        ),
                        'rounded' => array(
                            'text' => __( 'Rounded', 'greet-bubble' ),
                        ),
                    ),
                    'default' => 'rounded',
                ),


                array(
                    'id'      => 'button_radius',
                    'type'    => 'slider',
                    'title'   => esc_html__('Button radius', 'greet-bubble'),
                    'desc'   => esc_html__('Use buttons border radius value in px.', 'greet-bubble'),
                    'default' => 5,
                    'dependency' => array('button_type', '==', 'rounded'),
                ),

                array(
                    'id'        => 'buttonsColors',
                    'type'      => 'color_group',
                    'title'     => esc_html__('Buttons colors', 'greet-bubble'),
                    'desc'   => esc_html__('Change buttons Background, text, and hover colors from here. ', 'greet-bubble'),
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
                    'type'  => 'heading',
                    'title' => esc_html__('Others', 'greet-bubble'),
                ),

                array(
                    'id'        => 'scroll_bar_colors',
                    'type'      => 'color_group',
                    'class'     => 'greet-bubble-pro-only',
                    'title'     => esc_html__('Scroll bar colors', 'greet-bubble'),
                    'desc'      => esc_html__('Some popup elements like contact forms uses scroll bars. Change their colors from this option.', 'greet-bubble'),
                    'options'   => array(
                        'track_bg' => esc_html__('Track background', 'greet-bubble'),
                        'thumb_bg' => esc_html__('Thumb background', 'greet-bubble'),
                    ),
                    'default'   => array(
                        'thumb_bg' => '#7432ff',
                        'track_bg' => '#eeeeee',
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
                    'desc'  => __('Want to show your <strong>Greet Bubble</strong> on specefic page only? <a target="_blank" href="https://1.envato.market/gbdm79"><strong><i>Upgrade To Pro!</i></strong></a>', 'greet-bubble'),
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
