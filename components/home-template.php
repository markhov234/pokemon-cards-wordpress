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


    // var_dump(get_template_directory_uri() .'/dist/images/'. $header_location_group['icon'].'.svg');
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
                    <span class="header_hero-contact-info-icon"><img src="<?php echo get_template_directory_uri() . '/dist/images/' . $header_location_group['icon'] . '.svg' ?>" /></span>
                    <div class="header_hero-contact-info-container">
                        <p><?php echo $header_location_group['adresse'] ?></p>
                        <span class="header_hero-contact-info-link">
                            <a href="<?php echo $header_location_group['adresse_link']['url'] ?>"><?php echo $header_location_group['adresse_link']['title'] ?><img src="<?php echo get_template_directory_uri() . '/dist/images/arrow.svg' ?>"></a>
                        </span>
                    </div>
                </div>
                <div class="header_hero-contact-info">
                    <span class="header_hero-contact-info-icon"><img src="<?php echo get_template_directory_uri() . '/dist/images/' . $header_telephone_group['icon'] . '.svg' ?>"></span>
                    <p>1(418) 261-8207</p>
                </div>
                <div class="header_hero-contact-info">
                    <span class="header_hero-contact-info-icon"><img src="<?php echo get_template_directory_uri() . '/dist/images/' . $header_email_group['icon'] . '.svg' ?>"></span>
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