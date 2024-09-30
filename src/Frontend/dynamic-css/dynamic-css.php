<?php
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

$bubble_position = isset($options['bubble_position']) ? $options['bubble_position'] : 'right_bottom';

$margin_form_left_bottom = isset($options['margin_form_left_bottom']) ? $options['margin_form_left_bottom'] : [];
$margin_form_left_bottom_left = isset($margin_form_left_bottom['left']) ? $margin_form_left_bottom['left'] : 'left';
$margin_form_left_bottom_bottom = isset($margin_form_left_bottom['bottom']) ? $margin_form_left_bottom['bottom'] : 'bottom';
$margin_form_left_bottom_unit = isset($margin_form_left_bottom['unit']) ? $margin_form_left_bottom['unit'] : 'px';

$bubble_button_tooltip_width = isset($options['bubble_button_tooltip_width']) ? $options['bubble_button_tooltip_width'] : '';

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

// Right
$right_bottom = isset($options['right_bottom']) ? $options['right_bottom'] : [];
$right_bottom_value_bottom = isset($right_bottom['bottom']) ? $right_bottom['bottom'] : '25';
$right_bottom_value_right = isset($right_bottom['right']) ? $right_bottom['right'] : '30';
$right_bottom_unit = isset($right_bottom['unit']) ? $right_bottom['unit'] : 'px';

// Left
$left_bottom = isset($options['left_bottom']) ? $options['left_bottom'] : [];
$left_bottom_value_bottom = isset($left_bottom['bottom']) ? $left_bottom['bottom'] : '25';
$left_bottom_value_left = isset($left_bottom['left']) ? $left_bottom['left'] : '30';
$left_bottom_unit = isset($left_bottom['unit']) ? $left_bottom['unit'] : 'px';

// Right Middle
$right_middle = isset($options['right_middle']) ? $options['right_middle'] : [];
$right_middle_value_right = isset($right_middle['right']) ? $right_middle['right'] : '0';
$right_middle_unit = isset($right_middle['unit']) ? $right_middle['unit'] : 'px';

// Left Middle
$left_middle = isset($options['left_middle']) ? $options['left_middle'] : [];
$left_middle_value_left = isset($left_middle['left']) ? $left_middle['left'] : '0';
$left_middle_unit = isset($left_middle['unit']) ? $left_middle['unit'] : 'px';


if ($bubble_position == 'right_bottom') {
    $custom_css .= ".greet_wrapper {
        bottom: {$right_bottom_value_bottom}{$right_bottom_unit};right: {$right_bottom_value_right}{$right_bottom_unit};transform-origin: bottom right;
    }
    .greet_wrapper .tooltip_text{
        right:100%;left:auto; margin-right: 10px;
    }
    .greet_wrapper .tooltip_text:after{
        right: -4px;left: auto;
    }";
}
if ($bubble_position == 'left_bottom') {
    $custom_css .= ".greet_wrapper{left: {$left_bottom_value_left}{$left_bottom_unit};bottom: {$left_bottom_value_bottom}{$left_bottom_unit};transform-origin: bottom left;}.greet_wrapper .tooltip_text{left:100%;right:auto; margin-left: 10px;margin-right: auto;}.greet_wrapper .tooltip_text:after{left: -4px;right: auto;}";
}
if ($bubble_position == 'right_middle') {
    $custom_css .= ".greet_wrapper {top: auto; bottom: 50%; left: auto; right: {$right_middle_value_right}{$right_middle_unit};transform-origin: bottom right; transform: translateY(50%);} .greet_wrapper.greet_wrapper-resize {transform: translateY(50%) scale(0.67);}.greet_wrapper .tooltip_text{right:100%;left:auto; margin-right: 10px;}.greet_wrapper .tooltip_text:after{right: -4px;left: auto;}";
}
if ($bubble_position == 'left_middle') {
    $custom_css .= ".greet_wrapper {top: auto; bottom: 50%; right: auto; left: {$left_middle_value_left}{$left_middle_unit};transform-origin: bottom left; transform: translateY(50%);} .greet_wrapper.greet_wrapper-resize {transform: translateY(50%) scale(0.67);}.greet_wrapper .tooltip_text{left:100%;right:auto; margin-left: 10px;margin-right: auto;}.greet_wrapper .tooltip_text:after{left: -4px;right: auto;}";
}

if ($bubble_button_tooltip_width) {
    $custom_css .= ".greet_wrapper .tooltip_text {width: {$bubble_button_tooltip_width}px;}";
}

if ($button_type == 'rounded') {
    $custom_css .= ".greet_wrapper_full .greet_change_video [class*=video] a {border-radius: {$button_radius}px}";
}
