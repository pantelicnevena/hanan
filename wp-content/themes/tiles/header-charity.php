<?php
/**
 * Created by PhpStorm.
 * User: enco
 * Date: 7/27/15
 * Time: 4:09 PM
 */

?>
<!DOCTYPE html>
<html class="no-js" <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width, initial-scale = 1.0, maximum-scale=2.0, user-scalable=yes" />
    <!--  BOOTSTRAP  -->
    <link rel="icon" href="http://adoralevin.com/wp-content/uploads/2015/05/logo_original_white_circle.ico" type="image/x-icon" />

    <link rel="shortcut icon" href="http://adoralevin.com/wp-content/uploads/2015/05/logo_original_white_circle.ico" type="image/x-icon" />
    <title>
        <?php wp_title('|',true,'right'); ?>
    </title>
    <?php wp_head(); ?>

    <link href="http://fonts.googleapis.com/css?family=Lobster" rel="stylesheet" type="text/css">
    <link href="http://fonts.googleapis.com/css?family=Cabin" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

</head>


<body <?php body_class(); ?> style="border-collapse:collapse; display : table;">
<div class="mdl-layout mdl-js-layout mdl-layout--overlay-drawer-button">
    <main class="mdl-layout__content">
        <div class="cover-image-shop ">
            <h1 class="shop-title"><a href="<?php echo esc_url( home_url( '/shop' ) );?>"  class="mdl-color-text--teal-A200 ">Adora Levin's e-store</a></h1>
        </div>
        <header class="mdl-layout__header mdl-layout__header--scroll">

            <div class="mdl-layout__header-row mdl-color--teal-700">


                <div class="mdl-layout-spacer"></div>

                <nav class="mdl-navigation">
                    <a class="mdl-navigation__link" href="<?php echo esc_url( home_url( '/' ) );?>">
                        <img class="image-icon" src="<?php echo get_bloginfo('template_directory'); ?>/images/logo_original_white_circle.png" alt="">
                        Home
                    </a>
                    <a class="mdl-navigation__link" href="<?php echo esc_url( home_url( '/shop' ) );?>">
                        <i class="fa fa-shopping-cart fa-lg"></i> Shop
                    </a>
                    <a class="mdl-navigation__link" href="">
                        <img class="image-icon" src="<?php echo get_bloginfo('template_directory'); ?>/images/vinyl-logo.png" alt="">
                        Opposites
                    </a>
                    <a class="mdl-navigation__link" href=""> Charity</a>
                </nav>
            </div>

        </header>

