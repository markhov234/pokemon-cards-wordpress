<?php
/*
Template Name: Services
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
        </div>
    </section>
    <section class="project_example">
        <div>
            <h2 class="project_example-title">Exemple de projet</h2>
            <p class="project_example-subtitle">Voici des example de css/js/html pour des futures projets ou simplement pour des petits defis front-end.</p>
        </div>
        <div class="project_example-projects">
            <h3 class="project_example-projects-title">
                Hover Effect-Cards css/js/html
            </h3>
            <div class="project_example-projects-container">
                <div class="project_example-projects_cards">

                    <div class="project_example-projects_cards-card">
                        <div class="project_example-projects_cards-card-border"></div>
                        <div class="project_example-projects_cards-card-content"></div>
                    </div>
                    <div class="project_example-projects_cards-card">
                        <div class="project_example-projects_cards-card-border"></div>
                        <div class="project_example-projects_cards-card-content"></div>
                    </div>
                    <div class="project_example-projects_cards-card">
                        <div class="project_example-projects_cards-card-border"></div>

                        <div class="project_example-projects_cards-card-content"></div>
                    </div>
                    <div class="project_example-projects_cards-card">
                        <div class="project_example-projects_cards-card-border"></div>

                        <div class="project_example-projects_cards-card-content"></div>

                    </div>
                    <div class="project_example-projects_cards-card">
                        <div class="project_example-projects_cards-card-border"></div>

                        <div class="project_example-projects_cards-card-content"></div>

                    </div>
                    <div class="project_example-projects_cards-card">
                        <div class="project_example-projects_cards-card-border"></div>
                        <div class="project_example-projects_cards-card-content"></div>

                    </div>
                </div>
                <div></div>
                <div></div>
            </div>

        </div>

    </section>
</main>

<?php
get_footer();
?>