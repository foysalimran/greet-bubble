<?php

/**
 * Views class for Shortcode generator options.
 *
 * @link       https://themeatelier.net
 * @since      1.0.0
 *
 * @package greet-bubble
 * @subpackage greet-bubble/Admin/Views/GreetBubbleAppearance
 * @author     ThemeAtelier<themeatelierbd@gmail.com>
 */

namespace ThemeAtelier\GreetBubble\Admin\Views;

use ThemeAtelier\GreetBubble\Admin\Framework\Classes\GREET_BUBBLE;

class GreetBubbleAppearance
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
        // Validate
        //

        GREET_BUBBLE::createSection($prefix, array(
            'title'       => __('APPEARANCE', 'greet-bubble'),
            'icon'        => 'icofont-paint',
            'fields'      => array(

                array(
                    'type' => 'section_tab',
                    'tabs' => array(
                        array(
                            'title' => esc_html__('Bubble', 'greet-bubble'),
                            'icon'  => 'icofont-chat',
                            'fields'    => array(
                                array(
                                    'id'    => 'hi_text',
                                    'title' => esc_html__('Hi text Input', 'greet-bubble'),
                                    'desc' => esc_html__('Change small \'Hi\' text here.', 'greet-bubble'),
                                    'type'  => 'text',
                                    'default' =>  esc_html__('Hi', 'greet-bubble'),
                                ),
                                array(
                                    'id' => 'session-hide',
                                    'type' => 'switcher',
                                    'class' => 'switcher_pro_only',
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
                                    'id'    => 'bubble_button_tooltip',
                                    'type'    => 'switcher',
                                    'title'   => esc_html__('Bubble tooltip', 'greet-bubble'),
                                    'subtitle' => esc_html__('Show bubble tooltip.', 'greet-bubble'),
                                    'text_on' => esc_html__('Show', 'greet-bubble'),
                                    'text_off'  => esc_html__('Hide', 'greet-bubble'),
                                    'text_width'    => 80,
                                ),
                                array(
                                    'id'    => 'bubble_button_tooltip_text',
                                    'type'    => 'text',
                                    'title'   => esc_html__('Button Tooltip Text', 'greet-bubble'),
                                    'subtitle' => esc_html__('Set button tooltip text.', 'greet-bubble'),
                                    'default' => esc_html__('Need Help? <strong>Chat with us</strong>', 'greet-bubble'),
                                    'dependency' => array('bubble_button_tooltip', '==', 'true'),
                                ),
                                array(
                                    'id'    => 'bubble_button_tooltip_width',
                                    'type'    => 'slider',
                                    'title'   => esc_html__('Button Tooltip Width', 'greet-bubble'),
                                    'subtitle' => esc_html__('Set bubble button tooltip width.', 'greet-bubble'),
                                    'min'     => 20,
                                    'max'     => 500,
                                    'step'    => 5,
                                    'unit'    => 'px',
                                    'default' => 190,
                                    'dependency' => array('bubble_button_tooltip', '==', 'true'),
                                ),
                                array(
                                    'id' => 'bubble_visibility',
                                    'type' => 'button_set',
                                    'title' => esc_html__('Bubble Visibility', 'greet-bubble'),
                                    'desc' => esc_html__('Select bubble visibility you want to show', 'greet-bubble'),
                                    'options' => array(
                                        'everywhere'  => array(
                                            'text'  => esc_html__('Everywhere', 'greet-bubble'),
                                        ),
                                        'desktop'  => array(
                                            'text'  => esc_html__('Desktop Only', 'greet-bubble'),
                                            'pro_only'  => true,
                                        ),
                                        'tablet'  => array(
                                            'text'  => esc_html__('Tablet Only', 'greet-bubble'),
                                            'pro_only'  => true,
                                        ),
                                        'mobile'  => array(
                                            'text'  => esc_html__('Mobile Only', 'greet-bubble'),
                                            'pro_only'  => true,
                                        ),
                                    ),
                                    'default' => 'everywhere',
                                ),

                            ),
                        ),
                        array(
                            'title' => esc_html__('Position', 'greet-bubble'),
                            'icon'  => 'icofont-hand-drag',
                            'fields'    => array(
                                array(
                                    'id'      => 'bubble_position',
                                    'type'    => 'button_set',
                                    'title'   => esc_html__('Bubble position', 'greet-bubble'),
                                    'default' => 'right_bottom',
                                    'options'    => array(
                                        'right_bottom'  => array(
                                            'text'      => esc_html__('Right Bottom', 'greet-bubble'),
                                        ),
                                        'left_bottom'   => array(
                                            'text'      => esc_html__('Left Bottom', 'greet-bubble')
                                        ),
                                        'right_middle' => array(
                                            'text'      => esc_html__('Right Middle', 'greet-bubble'),
                                            'pro_only'  => true,
                                        ),
                                        'left_middle' => array(
                                            'text'      => esc_html__('Left Middle', 'greet-bubble'),
                                            'pro_only'  => true,
                                        ),
                                    ),
                                ),

                                array(
                                    'id'    => 'right_bottom',
                                    'type'  => 'spacing',
                                    'title' => esc_html__('Margin From Right Bottom', 'greet-bubble'),
                                    'top'   => false,
                                    'left'  => false,
                                    'default'  => array(
                                        'right'    => '30',
                                        'bottom'  => '30',
                                        'unit'   => 'px',
                                    ),
                                    'dependency' => array('bubble_position', '==', 'right_bottom', 'any'),
                                ),

                                array(
                                    'id'    => 'left_bottom',
                                    'type'  => 'spacing',
                                    'title' => esc_html__('Margin From Left Bottom', 'greet-bubble'),
                                    'top'   => false,
                                    'right'  => false,
                                    'default'  => array(
                                        'left'    => '30',
                                        'bottom'  => '30',
                                        'unit'   => 'px',
                                    ),
                                    'dependency' => array('bubble_position', '==', 'left_bottom', 'any'),
                                ),

                                array(
                                    'id'    => 'right_middle',
                                    'type'  => 'spacing',
                                    'title' => esc_html__('Margin From Right Middle', 'greet-bubble'),
                                    'top'   => false,
                                    'left'  => false,
                                    'bottom'  => false,
                                    'default'  => array(
                                        'right'    => '20',
                                        'unit'   => 'px',
                                    ),
                                    'dependency' => array('bubble_position', '==', 'right_middle', 'any'),
                                ),

                                array(
                                    'id'    => 'left_middle',
                                    'type'  => 'spacing',
                                    'title' => esc_html__('Margin From Left Middle', 'greet-bubble'),
                                    'top'   => false,
                                    'right' => false,
                                    'bottom' => false,
                                    'default'  => array(
                                        'left' => '20',
                                        'unit' => 'px',
                                    ),
                                    'dependency' => array('bubble_position', '==', 'left_middle', 'any'),
                                ),

                                array(
                                    'type'  => 'subheading',
                                    'title' => esc_html__('Different Positioning on Tablet', 'greet-bubble'),
                                    'dependency' => array('bubble_visibility', '==', 'everywhere', 'any'),
                                ),

                                array(
                                    'id'    => 'enable-positioning-tablet',
                                    'type'  => 'switcher',
                                    'class' => 'switcher_pro_only',
                                    'title' => esc_html__('Use Different Positioning for Tablet Devices', 'greet-bubble'),
                                    'text_on' => esc_html__('Yes', 'greet-bubble'),
                                    'text_off'  => esc_html__('No', 'greet-bubble'),
                                    'dependency' => array('bubble_visibility', '==', 'everywhere', 'any'),
                                ),

                                array(
                                    'type'  => 'subheading',
                                    'title' => esc_html__('Different Positioning on Mobile', 'greet-bubble'),
                                    'dependency'    => array('bubble_visibility', '==', 'everywhere', 'any')
                                ),
                                array(
                                    'id'    => 'enable-positioning-mobile',
                                    'type'  => 'switcher',
                                    'class' => 'switcher_pro_only',
                                    'title' => esc_html__('Use Different Positioning for Mobile Devices', 'greet-bubble'),
                                    'text_on' => esc_html__('Yes', 'greet-bubble'),
                                    'text_off'  => esc_html__('No', 'greet-bubble'),
                                    'dependency'    => array('bubble_visibility', '==', 'everywhere', 'any')
                                ),

                            )
                        ),
                        array(
                            'title' => esc_html__('Button', 'greet-bubble'),
                            'icon'  => 'icofont-external-link',
                            'fields'    => array(

                                array(
                                    'id'    => 'button_display_type',
                                    'type'    => 'button_set',
                                    'title'   => esc_html__('Button Display Type', 'greet-bubble'),
                                    'options' => array(
                                        'text_only' => array(
                                            'text' => __('Text Only', 'greet-bubble'),
                                        ),
                                        'with_icon_and_text' => array(
                                            'text' => __('With Icon and Text', 'greet-bubble'),
                                        ),
                                        'icon_only' => array(
                                            'text' => __('Icon Only', 'greet-bubble'),
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
                                            'text' => __('Square', 'greet-bubble'),
                                        ),
                                        'rounded' => array(
                                            'text' => __('Rounded', 'greet-bubble'),
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
                                    'id'    => 'buttons_tooltip',
                                    'type'    => 'switcher',
                                    'title'   => esc_html__('Buttons tooltip', 'greet-bubble'),
                                    'subtitle' => esc_html__('Show button tooltip.', 'greet-bubble'),
                                    'text_on' => esc_html__('Show', 'greet-bubble'),
                                    'text_off'  => esc_html__('Hide', 'greet-bubble'),
                                    'default'   => true,
                                    'text_width'    => 80,
                                ),
                                array(
                                    'id'    => 'buttons_tooltip_width',
                                    'type'    => 'slider',
                                    'title'   => esc_html__('Buttons Tooltip Width', 'greet-bubble'),
                                    'subtitle' => esc_html__('Set bubble under button tooltip width.', 'greet-bubble'),
                                    'min'     => 20,
                                    'max'     => 500,
                                    'step'    => 5,
                                    'unit'    => 'px',
                                    'default' => 190,
                                    'dependency' => array('buttons_tooltip', '==', 'true'),
                                ),
                                array(
                                    'id' => 'buttons_tooltip_position',
                                    'type' => 'button_set',
                                    'title' => esc_html__('Buttons tooltip Position', 'greet-bubble'),
                                    'options' => array(
                                        'top' => array(
                                            'text'  => esc_html__('Top', 'greet-bubble')
                                        ),
                                        'bottom' => array(
                                            'text' => esc_html__('Bottom', 'greet-bubble')
                                        ),
                                        'left' => array(
                                            'text' => esc_html__('Left', 'greet-bubble')
                                        ),
                                        'right' => array(
                                            'text' => esc_html__('Right', 'greet-bubble')
                                        ),
                                    ),
                                    'default' => 'top',
                                ),
                            )
                        ),
                        array(
                            'title' => esc_html__('Others', 'greet-bubble'),
                            'icon'  => 'icofont-swirl',
                            'fields'    => array(
                                array(
                                    'id'        => 'scroll_bar_colors',
                                    'type'      => 'color_group',
                                    'class'     => 'greet-bubble-only',
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
                        ),
                    )
                ),
            )
        ));
    }
}
