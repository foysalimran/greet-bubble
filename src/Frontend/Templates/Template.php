<?php

namespace ThemeAtelier\GreetBubble\Frontend\Templates;

class Template
{
    public static function content($options)
    {
        $video = isset($options['video']) ? $options['video'] : '';
        $video_url = isset($video['url']) ? $video['url'] : '';
        $bubble_buttons = isset($options['bubble_buttons']) ? $options['bubble_buttons'] : '';
        $button_display_type = isset($options['button_display_type']) ? $options['button_display_type'] : '';
?>
        <div id="greet_wrapper" class="greet_wrapper greet_toggler <?php echo esc_attr($options['greet_positon']) ?>">
            <video id="greet_video" <?php if (isset($options['poster']['url'])) : ?>poster="<?php echo esc_url($options['poster']['url']); ?>" <?php endif; ?>>
                <source id="playVideo" type="video/mp4" src="<?php echo esc_url($video_url) ?>#t=0.5" />
            </video>

            <h4 id="greet_text" class="greet_text"><?php echo esc_html($options['hi_text'])  ?></h4>

            <div class="greet_close">
                <i class="icofont-close-circled"></i>
            </div>
            <div id="greet_full_btn">
                <div class="greet_full_close">
                    <i class="icofont-close-line"></i>
                </div>
                <div id="greet_full_play" class="greet_full_play">
                    <i class="icofont-play"></i>
                </div>
                <?php if ($options['hide_replay'] || $options['hide_mute_unmute'] || $options['hide_fullscreen']) : ?>
                    <div class="greet_media-action">
                        <?php if ($options['hide_replay']) : ?>
                            <div id="greet_full_replay" class="greet_full_replay" onclick="videoChange('<?php echo esc_url($video_url) ?>')">
                                <i class="icofont-spinner-alt-3"></i>
                            </div>
                        <?php endif; ?>
                        <?php if ($options['hide_mute_unmute']) : ?>
                            <div id="greet_full_volume" class="greet_full_volume">
                                <i class="icofont-volume-up"></i>
                            </div>
                            <div id="greet_full_mute" class="greet_full_mute">
                                <i class="icofont-mute-volume"></i>
                            </div>
                        <?php endif; ?>

                        <?php if ($options['hide_fullscreen']) : ?>
                            <div id="greet_full_expand" class="greet_full_expand">
                                <i class="icofont-expand"></i>
                            </div>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>


                <div class="greet_change_video">
                    <?php
                    if (!empty($bubble_buttons)) {
                        foreach ($bubble_buttons as $key => $button) {
                            $btn_ID = $key + 1;
                            if (!empty($button)) {
                                $button_behavior    = isset($button['button_behavior']) ? $button['button_behavior'] : '';
                                $video_link_url     = isset($button['video_link']['url']) ? $button['video_link']['url'] : '';
                                $button_text        = isset($button['button_text']) ? $button['button_text'] : '';
                                $button_icon        = isset($button['button_icon']) ? $button['button_icon'] : '';
                                $button_link        = isset($button['button_link']) ? $button['button_link'] : '';
                                $button_link_url    = isset($button_link['url']) ? $button_link['url'] : '';
                                $button_link_target = isset($button_link['target']) ? $button_link['target'] : '';

                                if($button_display_type == 'with_icon_and_text') {
                                    $button_html = '<i class="' . esc_attr($button_icon) . '"></i>' . esc_html($button_text);
                                } elseif($button_display_type == 'text_only') {
                                    $button_html = esc_html($button_text);
                                } else{
                                    $button_html = esc_html($button_text);
                                }
                            }
                            switch ($button) {
                                case $button_behavior == 'another_video':
                                    if ($button_text) {  ?>
                                        <div <?php if ($video_link_url) {  ?> onclick="videoChange('<?php echo esc_url($video_link_url) ?>')" <?php } ?> class="greet_video">
                                            <?php if ($button_text) {  ?>
                                                <a class="<?php echo esc_attr($button_display_type); ?>"><?php echo wp_kses_post($button_html) ?></a>
                                            <?php } ?>
                                        </div>
                    <?php }
                                    break;
                                case $button_behavior == 'external_link':
                                    if ($button_text) {
                                        echo '<div class="greet_video">';
                                        echo '<a href="' . esc_url($button_link_url) . '" target="' . esc_attr($button_link_target) . '">' . wp_kses_post($button_html) . '</a>';
                                        echo '</div>';
                                    }
                                    break;
                            }
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
<?php
    }
}
