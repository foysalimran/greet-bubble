<?php

// enqueue scripts
function greet_plugin_assets()
{
    wp_enqueue_style('ico-font', GREET_DIR_URL . 'assets/css/icofont.css', '', 1.1);
    wp_enqueue_style('greet-main', GREET_DIR_URL . 'assets/css/greet-main.css', '', 1.2);
    wp_enqueue_script('greet-script', GREET_DIR_URL . 'assets/js/greet-main.js', array('jquery'), '1.0.0', true);
}
add_action('wp_enqueue_scripts', 'greet_plugin_assets');

// Meta option register
function greet_get_option($option, $section, $default = '')
{
    $options = get_option($section);
    if (isset($options[$option])) {
        return $options[$option];
    }
    return $default;
}

// Greet plugin content
add_action('wp_footer', 'greet_plugin_content');
function greet_plugin_content()
{
    if (greet_get_option('greet_mp4', 'greet_video_upload', '')) {
        echo '
        <div id="greet_wrapper" class="greet_wrapper greet_toggler ' . esc_attr( greet_get_option('greet_positon', 'greet_apperience', '') ) . '">

    <video id="greet_video">
        <source type="video/mp4" src="' . esc_url( greet_get_option('greet_mp4', 'greet_video_upload', '') ) . '" />
        <source src="' .esc_url( greet_get_option('greet_webm', 'greet_video_upload', '') ). '" type="video/webm" />
        <source src="' . esc_url( greet_get_option('greet_ogg', 'greet_video_upload', '') ) . '" type="video/ogg" />
    </video>
    <h4 id="greet_text" class="greet_text">' . esc_html( greet_get_option('hi_text', 'greet_apperience') ) . '</h4>

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
            <div id="greet_full-replay" class="greet_full-replay">
                <i class="icofont-refresh"></i>
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

        <div class="greet-external-buttons">
            <a href="greet-external-buttons--single" href="#">Click here</a>
            <a href="greet-external-buttons--single" href="#">Submit quote</a>
            <a href="greet-external-buttons--single" href="#">Contact us</a>
        </div>

    </div>
</div>
<style>
.greet_wrapper video {
    border-color: ' . esc_attr( greet_get_option('border_color', 'greet_apperience') ) . ';
}
</style>
';
    }
}
