<?php

function enqueue_styles() {
    wp_enqueue_style('main-style', get_template_directory_uri() . '/dist/css/styles.css', array(), '1.0.0', 'all');
}

function enqueue_scripts() {
    wp_enqueue_script('main-script', get_template_directory_uri() . '/dist/js/bundle.js', array('jquery'), '1.0.0', true);
    wp_localize_script('main-script', 'unik_mah_js', array('ajax_url' => admin_url('admin-ajax.php')));
    
}


function theme_setup() {
    register_nav_menus(
        array(
            'primary_menu' => esc_html__('Primary Menu', 'your-theme-textdomain'),
            'footer_menu'  => esc_html__('Footer Menu', 'your-theme-textdomain'),
        )
    );
}

function enqueue_custom_fonts() {
    wp_enqueue_style('Ubuntu', 'https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap');
    wp_enqueue_style('location', 'https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@24,400,0,0');
}

function submit_form_handler() {
    // Handle form submission here
    // Example: Return a JSON response
    $response = array('success' => true, 'message' => 'Form submitted successfully');
    wp_send_json($response);
}

function custom_form_shortcode() {
    ob_start(); ?>
    <form id="formulaire_principal" action="/submit-form" method="post">
        <h2 class="formulaire_principal-title">Vous avez un nouveau projet?</h2>
        <p class="formulaire_principal-subtitle">Fournissez-nous plus de détails sur votre projet, nous avons hâte de vous épauler dans sa conception !</p>
            <!-- Input fields -->
            <div class="formulaire_principal-input">
                <label for="name"></label>
                <input placeholder="nom complet" type="text" id="name" name="name" required>
                <p class="formulaire_principal-input-err">Ce champs doit êtres rempli</p>
            </div>
            <!-- Input fields -->
            <div class="formulaire_principal-input">
                <label for="name_enterprise"></label>
                <input placeholder="Nom d'entreprise" type="text" id="name_enterp" name="name_enterprise" required>
                <p class="formulaire_principal-input-err">Ce champs doit êtres rempli</p>
            </div>
            <div class="formulaire_principal-input">
                <label for="email"></label>
                <input placeholder="info@gmail.com" type="email" id="email" name="email" required>
                <p class="formulaire_principal-input-err">Votre courriel est invalide. (ex: info@gmail.com)</p>
            </div>
            <!-- Input fields -->
            <div class="formulaire_principal-input">
                <label for="telephone"></label>
                <input placeholder="Téléphone" type="text" id="telephone" name="telephone" required>
                <p class="formulaire_principal-input-err">Ce champs doit êtres rempli</p>
            </div>
            <!-- Submit button -->
            <button class="formulaire_principal-btn" id="submit-btn" type="submit">Envoyer <span class="material-symbols-outlined ">
                arrow_forward
            </span></button>
    </form>
    <?php
    return ob_get_clean();
}
// Hook to handle AJAX requests for the 'submit_form' action
add_action('wp_ajax_submit_form', 'handle_submit_form');
add_action('wp_ajax_nopriv_submit_form', 'handle_submit_form'); // For non-logged-in users

function handle_submit_form() {
    // Perform your server-side logic here.

    // Example: Get the form data sent via AJAX.
    $name = sanitize_text_field($_POST['name']);
    $email = sanitize_email($_POST['email']);

    // Example: Perform some action with the form data.
    // For illustration purposes, we're just echoing back the data.
    $response = array(
        'name' => $name,
        'email' => $email,
        'message' => 'Form submitted successfully!',
    );

    // Send the JSON response back to the JavaScript.
    wp_send_json_success($response);

    // Make sure to exit after sending the JSON response.
    wp_die();
}


add_action('wp_enqueue_scripts', 'enqueue_styles');
add_action('wp_enqueue_scripts', 'enqueue_scripts');
add_action('after_setup_theme', 'theme_setup');
add_action('wp_enqueue_scripts', 'enqueue_custom_fonts');
add_action('wp_ajax_submit_form', 'submit_form_handler');
add_action('wp_ajax_nopriv_submit_form', 'submit_form_handler');
add_shortcode('custom_form', 'custom_form_shortcode');

?>
