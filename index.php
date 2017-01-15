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
                <div class="m-schedule">
                    <?php if ( have_rows('schedule', $schedule->ID) ) : ?>
                        <div class="m-schedule__list row">
                            <div class="col-xs-12 col-md-6">
                                <?php
                                $count = 0;
                                while ( have_rows('schedule', $schedule->ID) ) : the_row(); ?>
                                    <?php
                                    $count++;
                                    $date = get_sub_field('date');
                                    $date = new DateTime($date);
                                    ?>
                                    <p>
                                        <span><?php echo $date->format('d.m.Y'); ?></span>
                                        -
                                        <span><?php the_sub_field('city'); ?></span>
                                        -
                                        <span><?php the_sub_field('place'); ?></span>
                                    </p>
                                    <?php if ($count == 3) echo "</div><div class='col-xs-12 col-md-6'>"; ?>
                                    <?php if ($count == 6) break; ?>
                                <?php endwhile; ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php get_footer(); ?>