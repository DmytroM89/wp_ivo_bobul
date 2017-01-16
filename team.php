<?php

/*
Template name: Team
*/

get_header(); ?>

<?php if (have_posts()) while (have_posts()) : the_post(); ?>

    <section class="p-team">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h1 class="page-title"><?php the_title(); ?></h1>
                    <?php if ( have_rows('team') ) : ?>
                        <div class="p-team__list">
                            <?php while ( have_rows('team') ) : the_row(); ?>
                                <div class="p-team__col">
                                    <a class="p-team__img" href="<?php the_permalink(); ?>">
                                        <?php
                                        $image = get_sub_field('photo');
                                        $size = 'team-thumb';
                                        if( $image ) {
                                            echo wp_get_attachment_image( $image, $size );
                                        } else {
                                            echo '<img src="' . get_template_directory_uri() . '/assets/images/default_avatar.jpg" alt="" >';
                                        }
                                        ?>
                                    </a>
                                    <h3 class="p-team__title"><?php the_sub_field('name'); ?></h3>
                                    <p class="p-team__post"><?php the_sub_field('post'); ?></p>
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