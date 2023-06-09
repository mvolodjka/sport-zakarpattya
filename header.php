<!DOCTYPE html>

<html class="zaksport" <?php language_attributes(); ?>>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="profile" href="https://gmpg.org/xfn/11">
    <link rel="icon" href="<?php echo get_template_directory_uri();?>/images/ico.svg" type="image/svg">
    <title><?php bloginfo( 'name' ); ?></title>
    <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

    <header id="header" class="header">


    </header><!-- #site-header -->

    <nav class="nav-main">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col-md-3 logo-header"><a href="<?php echo get_home_url();?>"><img
                            src="<?php echo get_template_directory_uri(); ?>/images/Sport_Zakarpattia_logo.svg"></a>
                </div>

                <div class="col-md-8"><?php wp_nav_menu('main_nav'); ?></div>

            </div>
    </nav>

    <div class="container d-flex">
        <main id="site-content">
            <section class="section">