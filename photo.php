<?php

/*
Template name: Photo
*/

get_header(); ?>

<?php if (have_posts()) while (have_posts()) : the_post(); ?>

    <section class="p-photo">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h1 class="page-title"><?php the_title(); ?></h1>
                    <?php if ( have_rows('photo') ) : ?>
                        <div class="p-photo__list row">
                            <?php while ( have_rows('photo') ) : the_row(); ?>
                                <div class="col-xs-6 col-md-4 p-photo__item">
                                    <a href="<?php echo wp_get_attachment_image_url(get_sub_field('image'), 'full'); ?>">
                                        <?php echo wp_get_attachment_image(get_sub_field('image'), 'photo-thumb'); ?>
                                    </a>
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