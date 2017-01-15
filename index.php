<?php

/*
Template name: Home
*/

get_header(); ?>

<section class="p-home">
    <div class="container">
        <div class="row">
            <div class="col-xs-6">

            </div>
            <div class="col-xs-6">
                <a href="<?php echo get_home_url(); ?>" class="p-home__logo"></a>
                <div class="m-biography">
                    <h3 class="m-biography__title"><?php echo $biography->post_title; ?></h3>
                    <div class="m-biography__content">
                        <?php the_field('intro', $biography->ID); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>