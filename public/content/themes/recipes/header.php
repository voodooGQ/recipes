<?php
/**
 * Header File
 *
 * @author Shane Smith <voodoogq@gmail.com>
 * @since 1.0
 */

?>
<!DOCTYPE html>
<html class="no-js" lang="en-us">
    <head>
        <!-- NOJS TOGGLE -->
        <script>(function(H){H.className=H.className.replace(/\bno-js\b/,'js')})(document.documentElement)</script>

        <!-- META DATA -->
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">

        <!--[if IE]><meta http-equiv="cleartype" content="on" /><![endif]-->

        <meta property="og:image" content="<?php echo get_template_directory_uri() ?>/assets/media/images/logo.png" />
        <meta property="og:title" content="<?php wp_title(); ?>" />

        <!-- SEO -->
        <title>
            <?php wp_title(); ?>
        </title>

        <?php wp_head(); ?>
    </head>
    <body <?php body_class('box-mobile'); ?>>
        <div class="container-site container">
            <?php get_template_part('partials/globals/site', 'header'); ?>
            <div class="site-bd container">
