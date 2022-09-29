<?php
// Main settings api
if (!class_exists('Greet_Settings_API_Main')) :
    class Greet_Settings_API_Main
    {
        private $settings_api;
        function __construct()
        {
            $this->settings_api = new Greet_Settings_API;
            add_action('admin_init', array($this, 'admin_init'));
            add_action('admin_menu', array($this, 'admin_menu'));
        }

        function admin_init()
        {

            //set the settings
            $this->settings_api->set_sections($this->get_settings_sections());
            $this->settings_api->set_fields($this->get_settings_fields());

            //initialize settings
            $this->settings_api->admin_init();
        }

        function admin_menu()
        {
            add_options_page(
                esc_html__('Greet Video', 'greet'),
                esc_html__('Greet Video', 'greet'),
                'manage_options',
                'greet_settings',
                array($this, 'plugin_page')
            );
        }

        function get_settings_sections()
        {
            $sections = array(
                array(
                    'id'    => 'greet_video_upload',
                    'title' => esc_html__('Greet video upload', 'greet')
                ),
                array(
                    'id'    => 'greet_apperience',
                    'title' => esc_html__('Greet Apperience', 'greet')
                )
            );
            return $sections;
        }

        /**
         * Returns all the settings fields
         *
         * @return array settings fields
         */
        function get_settings_fields()
        {
            $settings_fields = array(
                'greet_video_upload' => array(
                    array(
                        'name'    => 'greet_mp4',
                        'label'   => esc_html__('Upload mp4 Video', 'greet'),
                        'desc'    => esc_html__('If you do not have a mp4 video you may use this website https://www.freeconvert.com/ to convert your current version of video.', 'greet'),
                        'type'    => 'file',
                        'default' => '',
                        'options' => array(
                            'button_label' =>  esc_html__('Choose mp4 Video', 'greet')
                        )
                    ),
                    array(
                        'name'    => 'greet_webm',
                        'label'   => esc_html__('Upload webm Video', 'greet'),
                        'desc'    => esc_html__('If you do not have a webm video you may use this link https://www.freeconvert.com/mp4-to-webm to convert your mp4 video to webm video.', 'greet'),
                        'type'    => 'file',
                        'default' => '',
                        'options' => array(
                            'button_label' =>  esc_html__('Choose webm Video', 'greet')
                        )
                    ),
                    array(
                        'name'    => 'greet_ogg',
                        'label'   => esc_html__('Upload ogg Video', 'greet'),
                        'desc'    => esc_html__('If you do not have a ogg video you may use this link https://www.freeconvert.com/mp4-to-ogg to convert your mp4 video to ogg video.', 'greet'),
                        'type'    => 'file',
                        'default' => '',
                        'options' => array(
                            'button_label' =>  esc_html__('Choose ogg Video', 'greet')
                        )
                    ),
                ),
                'greet_apperience' => array(
                    array(
                        'name'              => 'hi_text',
                        'label'             => esc_html__('Hi text Input', 'greet'),
                        'desc'              => esc_html__('Change small hi text here', 'greet'),
                        'placeholder'       => esc_html__('Text Input placeholder', 'greet'),
                        'type'              => 'text',
                        'default'           =>  esc_html__('Hi 👋', 'greet'),
                        'sanitize_callback' => 'sanitize_text_field'
                    ),

                    array(
                        'name'    => 'greet_positon',
                        'label'   => esc_html__('Bubble position', 'greet'),
                        'desc'    => esc_html__('Select bubble position you want to show', 'greet'),
                        'type'    => 'select',
                        'default' => 'right',
                        'options' => array(
                            'right' => esc_html__('Right', 'greet'),
                            'greet-left'  => esc_html__('Left', 'greet')
                        )
                    ),

                    array(
                        'name'    => 'border_color',
                        'label'   => esc_html__('Border Color', 'greet'),
                        'desc'    => esc_html__('Change bubble border color here', 'greet'),
                        'type'    => 'color',
                        'default' => '#7432ff'
                    ),
                )
            );

            return $settings_fields;
        }

        function plugin_page()
        {
            echo '<div class="wrap">';

            $this->settings_api->show_navigation();
            $this->settings_api->show_forms();

            echo '</div>';
        }

        /**
         * Get all the pages
         *
         * @return array page names with key value pairs
         */
        function get_pages()
        {
            $pages = get_pages();
            $pages_options = array();
            if ($pages) {
                foreach ($pages as $page) {
                    $pages_options[$page->ID] = $page->post_title;
                }
            }

            return $pages_options;
        }
    }
endif;
