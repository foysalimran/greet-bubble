<?php

/**
 * Update version.
 */
update_option('greet_bubble_version', GREET_BUBBLE_VERSION);
update_option('greet_bubble_db_version', GREET_BUBBLE_VERSION);

/**
 * Convert old data keys to new ones.
 */
function greet_bubble_convert_old_to_new_data_4_0_3($options)
{
    if (isset($options['mp4'])) {
        $options['video'] = $options['mp4'];
        unset($options['mp4']);
    }

    $old_option_link_one = isset($options['button_link']['url']) ? $options['button_link']['url'] : '';

    $first_button_text = isset($options['button_text']) ? $options['button_text'] : '';
    $first_button_link = isset($options['button_link']) ? $options['button_link'] : '';

    if($old_option_link_one) {
        $selected_button_behavior_one = $old_option_link_one !== '' ? 'external_link' : 'another_video';
    } else {
        $selected_button_behavior_one = 'another_video';
    }

    if ($old_option_link_one) {
        $options['bubble_buttons'] = [
            [
                'button_text' => $first_button_text,
                'button_behavior' => $selected_button_behavior_one,
                'video_link' => '',
                'button_link' => $first_button_link,
                'form_title' => '',
                'email_subject' => '',
                'name' => '',
                'email' => '',
                'phone' => '',
                'message' => '',
                'external_form_shortcode' => '',
                'web3form_button_text' => '',
                'web3form_loading_message' => '',
                'web3form_success_message' => '',
                'web3form_error_message' => '',
                'access_key' => '',
                'whatsapp_number' => '',
                'user_name' => '',
                'whatsapp_message' => '',
                'whatsapp_button_text' => '',
                'whatsapp_loading_text' => '',
                'greet_email_template' => ''
            ],
        ];
    }

    return $options;
}

/**
 * Update old to new data.
 */
$options = get_option('_greet');
if ($options) {
    $updated_options = greet_bubble_convert_old_to_new_data_4_0_3($options);
    update_option('_greet', $updated_options);
}
