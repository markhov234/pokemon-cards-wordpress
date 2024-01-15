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
    wp_enqueue_script('main-script', get_template_directory_uri() . '/dist/js/bundle.js', array('jquery'), '1.0.0', true);

    // Define your script inline and pass data directly
    echo '<script type="text/javascript">';
    echo 'var my_ajax_object = {';
    echo '  ajax_url: "' . admin_url('admin-ajax.php') . '",';
    echo '  is_home: ' . json_encode(is_front_page()) . ',';
    echo '  is_set_details: ' . json_encode(is_page_template('set-details.php') && isset($_GET['id']));
    echo '};';
    echo '</script>';
    // Enqueue the script
    wp_enqueue_script('main-script');
}
add_action('wp_enqueue_scripts', 'enqueue_scripts');




function theme_setup()
{
    register_nav_menus(
        array(
            'primary_menu' => esc_html__('Primary Menu', 'pokemon_cards'),
            'footer_menu'  => esc_html__('Footer Menu', 'pokemon_cards'),
        )
    );
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
    $search_term = isset($_POST['search_term']) ? sanitize_text_field($_POST['search_term']) : '';

    // var_dump($search_term);
    // Now you can use $search_term to filter your results

    $sets_response = make_pokemon_api_request('sets');
    $sets_data = array();

    if (!empty($sets_response) && !empty($sets_response['data'])) {
        foreach ($sets_response['data'] as $set) {
            // Example: Only include sets that match the search term
            if (stripos($set['series'], $search_term) !== false) {
                $sets_data[] = array(
                    'id' => $set['id'],
                    'name' => $set['name'],
                    'imageUrl' => $set['images']['symbol'],
                    'series' => $set['series'],
                );
            }
        }
    }

    return $sets_data;
}






add_action('init', 'allow_cors');
// add_action('wp_ajax_get_set_names', 'get_all_set_names');
// add_action('wp_ajax_nopriv_get_set_names', 'get_all_set_names');
add_action('wp_enqueue_scripts', 'enqueue_styles');
add_action('wp_enqueue_scripts', 'enqueue_scripts');
add_action('after_setup_theme', 'theme_setup');
// add_shortcode('custom_form', 'custom_form_shortcode');
add_action('wp_ajax_my_trigger_ajax_all_sets_name', 'ajax_get_all_sets_name');
add_action('wp_ajax_nopriv_my_trigger_ajax_all_sets_name', 'ajax_get_all_sets_name');

// Example AJAX handler
add_action('wp_ajax_fetch_paginated_cards', 'fetch_paginated_cards');
add_action('wp_ajax_nopriv_fetch_paginated_cards', 'fetch_paginated_cards');

function fetch_paginated_cards()
{
    $page = isset($_POST['page']) ? sanitize_text_field($_POST['page']) : 1;
    $set_id = isset($_POST['set_id']) ? sanitize_text_field($_POST['set_id']) : '';

    // var_dump($set_id);

    // Call the make_pokemon_api_request function with pagination
    $setCards = make_pokemon_api_request('cards', ['q' => 'set.id:' . $set_id, 'page' => $page, 'pageSize' => 10]);

    // Return the paginated cards as JSON
    wp_send_json($setCards);
}


function ajax_get_all_sets_name()
{
    $sets_data = get_all_set_names();

    // Do something with the data
    wp_send_json_success($sets_data);
    // Don't forget to stop execution afterward
    wp_die();
}
