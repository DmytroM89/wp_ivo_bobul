<!DOCTYPE html>
<html lang="ru">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>

    <meta http-equiv="Cache-Control" content="public">
    <meta http-equiv="Cache-Control" content="no-store">
    <meta http-equiv="Cache-Control" content="max-age=34700">

    <title><?php the_title(); ?></title>

    <?php wp_enqueue_script("jquery"); ?>
    <?php wp_head(); ?>

    <style type="text/css">
        #page-preloader {
            position: fixed;
            left: 0;
            top: 0;
            right: 0;
            bottom: 0;
            width: 100vw;
            height: 100vh;
            background: #FFF;
            z-index: 100500;
        }
        #page-preloader .spinner {
            width: 62px;
            height: 78px;
            position: absolute;
            left: 50%;
            top: 50%;
            margin: -39px 0 0 -31px;
            color: #FFF;
            text-align: center;
        }
    </style>

</head>
<body>

    <div id="page-preloader">
        <span class="spinner">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/logo.png">
        </span>
    </div>

    <div class="wrapper">

        <header class="header">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12">
                        <nav class="header__nav">
                            <?php wp_nav_menu("menu=main_menu"); ?>
                        </nav>
                        <a href="<?php echo get_home_url(); ?>" title="<?php echo get_bloginfo('name'); ?>"></a>
                    </div>
                </div>
            </div>
        </header>