<?php

/*
Template name: Schedule
*/

get_header(); ?>

<?php if (have_posts()) while (have_posts()) : the_post(); ?>

    <section class="p-schedule">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-md-7">
                    <h1 class="page-title"><?php the_title(); ?></h1>
                    <?php if ( have_rows('schedule') ) : ?>
                        <div class="p-schedule__list row">
                            <?php foreach (getScheduleSortArray(get_field_object('schedule')['value']) as $k=>$month) : ?>
                                <div class="p-schedule__month col-xs-12 col-md-6">
                                    <h3 class="p-schedule__title"><?php echo getMonthName($k); ?></h3>
                                    <?php foreach ($month as $event) : ?>
                                        <p>
                                            <span><?php echo $event['date']; ?></span>
                                            -
                                            <span><?php echo $event['city']; ?></span>
                                            -
                                            <span><?php echo $event['place']; ?></span>
                                        </p>
                                    <?php endforeach; ?>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

<?php endwhile; ?>

<?php get_footer(); ?>