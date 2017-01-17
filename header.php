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
            width: 476px;
            height: 250px;
            position: absolute;
            left: 50%;
            top: 50%;
            margin: -125px 0 0 -238px;
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
                        <svg version="1.1"
                             xmlns="http://www.w3.org/2000/svg" 
                             x="0px" y="0px" width="20px" height="16px" viewBox="0 0 20 16" style="enable-background:new 0 0 20 16;" xml:space="preserve">
                            <g id="icons_1_">
                                <g id="menu_1_">
                                    <path fill="#fff" d="M18,6H2C0.9,6,0,6.9,0,8s0.9,2,2,2h16c1.1,0,2-0.9,2-2S19.1,6,18,6z"/>
                                    <path fill="#fff" d="M2,4h12c1.1,0,2-0.9,2-2s-0.9-2-2-2H2C0.9,0,0,0.9,0,2S0.9,4,2,4z"/>
                                    <path fill="#fff" d="M14,12H2c-1.1,0-2,0.9-2,2s0.9,2,2,2h12c1.1,0,2-0.9,2-2S15.1,12,14,12z"/>
                                </g>
                            </g>
                        </svg>
                    </a>
                </div>
                <?php if (getPageId() != 2) : ?>
                <div class="col-xs-12">
                    <a class="e-logo" href="<?php echo get_home_url(); ?>" title="<?php echo get_bloginfo('name'); ?>"></a>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </header>