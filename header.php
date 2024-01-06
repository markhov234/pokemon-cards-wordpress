<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php wp_title('|', true, 'right'); ?></title>
    <?php wp_head(); ?>

    <!-- Include your custom styles -->
    <!-- <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/dist/css/styles.css"> -->

    <!-- Include your custom script -->
    <script src="<?php echo get_template_directory_uri(); ?>/dist/js/bundle.js" defer></script>
</head>

<body>

    <nav id="menu_principal-nav" class="menu-principal-nav">

        <?php
        wp_nav_menu(
            array(
                'theme_location' => 'primary_menu',
                'menu_class'     => 'menu-principal-ul',
                'menu_id'     => 'menu-principal-ul',
            )
        );
        ?>
    </nav>

    <?php
    wp_body_open();
    ?>