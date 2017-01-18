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
            background: #000;
            z-index: 100500;
        }

        #page-preloader .spinner {
            width: 300px;
            height: 156px;
            position: absolute;
            left: 50%;
            top: 50%;
            margin: -78px 0 0 -150px;
            color: #FFF;
            text-align: center;
        }
    </style>

</head>
<body>

<div id="page-preloader">
        <span class="spinner">
            <img src="<?php echo get_template_directory_uri(); ?>/assets/img/home-logo.png">
        </span>
</div>

<div class="wrapper<?php echo getPageClass(getPageId()); ?>">

    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 m-nav">
                    <?php wp_nav_menu("menu=main_menu"); ?>
                    <a href="#" class="m-nav__icon">
                        <svg viewBox="0 0 36 30">
                            <rect width="36" height="6" fill="#fff"/>
                            <rect y="24" width="36" height="6" fill="#fff"/>
                            <rect y="12" width="36" height="6" fill="#fff"/>
                        </svg>
                        <svg viewBox="0 0 36 30">
                            <polygon fill="#fff" points="32.8,4.4 28.6,0.2 18,10.8 7.4,0.2 3.2,4.4 13.8,15 3.2,25.6 7.4,29.8 18,19.2 28.6,29.8 32.8,25.6 22.2,15 "/>
                        </svg>
                    </a>
                </div>
                <?php if (getPageId() != 2) : ?>
                    <div class="col-xs-12">
                        <a class="e-logo" href="<?php echo get_home_url(); ?>"
                           title="<?php echo get_bloginfo('name'); ?>"></a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </header>