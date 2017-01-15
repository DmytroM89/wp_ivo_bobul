<?php

/*
Template name: Video
*/

get_header(); ?>

<?php if (have_posts()) while (have_posts()) : the_post(); ?>

    <section class="p-video">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h1 class="page-title"><?php the_title(); ?></h1>
                    <?php if ( have_rows('video') ) : ?>
                        <div class="p-video__list row">
                            <?php while ( have_rows('video') ) : the_row(); ?>
                                <div class="m-video__col">
                                    <div class="p-video__iframe">
                                        <?php the_sub_field('code'); ?>
                                    </div>
                                    <h2 class="p-video__title"><?php the_sub_field('title'); ?></h2>
                                </div>
                            <?php endwhile; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

<?php endwhile; ?>

<?php get_footer(); ?>