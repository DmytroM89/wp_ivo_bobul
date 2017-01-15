<?php

/*
Template name: Biography
*/

get_header(); ?>

<?php if (have_posts()) while (have_posts()) : the_post(); ?>

    <section class="p-biography">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h1 class="page-title"><?php the_title(); ?></h1>
                    <div class="content">
                        <?php the_content(); ?>
                    </div>
                </div>
            </div>
        </div>
    </section>

<?php endwhile; ?>

<?php get_footer(); ?>