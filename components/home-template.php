<?php
/*
Template Name: Unik Home
*/
get_header();
?>

<?php
$header_section = get_field('header_section');
$form_section = get_field('form');

if ($header_section) {
    $header_title = $header_section['header_title'];
    $header_background_text = $header_section['header_background_text'];
    $header_location_group = $header_section['header_location'];
    $header_telephone_group = $header_section['header_telephone'];
    $header_email_group = $header_section['header_email'];


    // var_dump($header_location_group['icon']);
}



?>

<main class="page_principal">
    <section class="header_hero">
        <div class="header_hero-container">
            <div class="header_hero-intro">
                <h1 class="header_hero-intro-title"><?= $header_title ?></h1>

            </div>
            <div class="header_hero-contact">
                <div class="header_hero-contact-info">
                    <span class="material-symbols-outlined header_hero-contact-info-icon">
                        <?= $header_location_group['icon'] ?>
                    </span>
                    <p>1689 rue du Marais, suite 220, Québec, Qc, G1M0A2</p>
                </div>
                <div class="header_hero-contact-info">
                    <span class="material-symbols-outlined header_hero-contact-info-icon">
                    <?= $header_telephone_group['icon'] ?>
                    </span>
                    <p>1(418) 261-8207</p>
                </div>
                <div class="header_hero-contact-info">
                    <span class="material-symbols-outlined header_hero-contact-info-icon">
                    <?= $header_email_group['icon'] ?>
                    </span>
                    <p>Info@unikmedia.ca</p>
                </div>
            </div>
        </div>
    </section>
    <section class="formulaire_principal">
        <div class="formulaire_principal-container">
            <?php
            echo do_shortcode('[custom_form]');
            ?>
        </div>
    </section>
</main>

<?php
get_footer();
?>