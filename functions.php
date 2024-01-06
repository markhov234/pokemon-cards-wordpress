<?php

function allow_cors()
{
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Methods: POST, GET, OPTIONS");
    header("Access-Control-Allow-Headers: Content-Type");
}


function enqueue_styles()
{
    wp_enqueue_style('main-style', get_template_directory_uri() . '/dist/css/styles.css', array(), '1.0.0', 'all');
}

function enqueue_scripts()
{
    wp_enqueue_script('jquery');
    wp_enqueue_script('main-script', get_template_directory_uri() . '/dist/js/bundle.js', array('jquery'), '1.0.0', true);
}



function theme_setup()
{
    register_nav_menus(
        array(
            'primary_menu' => esc_html__('Primary Menu', 'pokemon_cards'),
            'footer_menu'  => esc_html__('Footer Menu', 'pokemon_cards'),
        )
    );
}

function enqueue_custom_fonts()
{
}

// Make API call to the pokemon API
function make_pokemon_api_request($endpoint, $params = [])
{
    $api_base_url = 'https://api.pokemontcg.io/v2/';
    $api_key = 'f183f3a1-4acb-4832-a59c-6b0895b49fab'; // Access the API key securely

    $url = $api_base_url . $endpoint . '?' . http_build_query($params);

    $response = wp_remote_get($url, [
        'headers' => ['X-Api-Key' => $api_key] // Include the API key in the header
    ]);

    if (is_wp_error($response)) {
        // Handle error
        return [];
    }

    $body = wp_remote_retrieve_body($response);
    return json_decode($body, true);
}

function get_all_set_names()
{
    $sets_response = make_pokemon_api_request('sets');
    $sets_data = array();

    if (!empty($sets_response) && !empty($sets_response['data'])) {
        foreach ($sets_response['data'] as $set) {
            $sets_data[] = array(
                'id' => $set['id'],
                'name' => $set['name']
            );
        }
    }

    return $sets_data;
}





add_action('init', 'allow_cors');
add_action('wp_enqueue_scripts', 'enqueue_styles');
add_action('wp_enqueue_scripts', 'enqueue_scripts');
add_action('after_setup_theme', 'theme_setup');
add_action('wp_enqueue_scripts', 'enqueue_custom_fonts');
add_action('wp_ajax_submit_form', 'submit_form_handler');
add_action('wp_ajax_nopriv_submit_form', 'submit_form_handler');
add_shortcode('custom_form', 'custom_form_shortcode');
