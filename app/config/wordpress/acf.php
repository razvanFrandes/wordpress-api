<?php
add_action('acf/include_field_types', 'register_acf_field_unique_id');
function register_acf_field_unique_id() {
    class ACF_Field_Unique_ID extends acf_field {
        public function __construct() {
            $this->name     = 'unique_id';
            $this->label    = 'Unique ID';
            $this->category = 'basic';
            parent::__construct();
        }

        public function render_field($field) {
            printf(
                '<input type="text" name="%s" value="%s" readonly>',
                esc_attr($field['name']),
                esc_attr($field['value'])
            );
        }

        public function update_value($value, $post_id, $field) {
            if (!empty($value)) {
                return $value;
            }
            return uniqid();
        }
    }
    new ACF_Field_Unique_ID();
}

// Export ACF Fields on save
add_filter('acf/settings/save_json', 'az_acf_json_save_point');
function az_acf_json_save_point($path) {
    $path = get_stylesheet_directory() . '/_acf';
    return $path;
}

// Import Json
add_filter('acf/settings/load_json', 'az_acf_json_load_point');
function az_acf_json_load_point($paths) {
    unset($paths[0]);
    // append path
    $paths[] = get_stylesheet_directory() . '/_acf';
    // return
    return $paths;
}


add_action('manage_x_notifications_posts_custom_column', 'show_acf_status_column_content', 10, 2);
function show_acf_status_column_content($column, $post_id) {
    if ($column == 'acf_status') {
        $status = get_field('status', $post_id);
        //['Active', 'Finished', 'Canceled'];
        $name = 'Active';
        $color = '#ff0000';
        if ($status == 1) {
            $color = '#4caf50';
        } elseif ($status == 2) {
            $name = 'Finished';
            $color = '#2196f3';
        } elseif ($status == 3) {
            $color = '#e91e63';
            $name = 'Canceled';
        }

        echo '<span style="color: ' . esc_attr($color) . ';">' . esc_html($name) . '</span>';
    }
}
