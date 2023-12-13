<?php 
function enqueue_styles() {
   
    wp_enqueue_style('main-style', get_template_directory_uri() . '/dist/css/styles.css', array(), '1.0.0', 'all');
}
add_action('wp_enqueue_scripts', 'enqueue_styles');


function enqueue_scripts() {
//   // Enqueue jQuery from the Google CDN
//   wp_enqueue_script('jquery', 'https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js', array(), null, true);

// Enqueue your main script
wp_enqueue_script('main-script', get_template_directory_uri() . '/dist/js/bundle.js', array('jquery'), '1.0.0', true);

wp_localize_script('main-script', 'main-script_js', array('ajax_url' => admin_url('admin-ajax.php')));

}

add_action('wp_enqueue_scripts', 'enqueue_scripts');


function theme_setup() {
    // Register your menus here
    register_nav_menus(
        array(
            'primary_menu' => esc_html__('Primary Menu', 'your-theme-textdomain'),
            'footer_menu'  => esc_html__('Footer Menu', 'your-theme-textdomain'),
            // Add more menu locations if needed
        )
    );
}
add_action('after_setup_theme', 'theme_setup');
add_action('wp_ajax_get_custom_nav_menu', 'get_custom_nav_menu');
add_action('wp_ajax_nopriv_get_custom_nav_menu', 'get_custom_nav_menu');
add_action('wp_enqueue_scripts', 'enqueue_scripts');

?>