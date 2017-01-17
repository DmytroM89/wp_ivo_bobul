<?php get_header(); ?>


<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>

    <section class="p-single">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h1 class="page-title"><?php the_title(); ?></h1>
                    <?php if (in_category(5)) : ?>
                        <div class="row p-songs__album">
                            <div class="col-xs-12 col-md-4">
                                <?php if (has_post_thumbnail()) {
                                    the_post_thumbnail('song-thumb');
                                } else {
                                    echo '<img src="' . get_template_directory_uri() . '/assets/images/default-photo--song.jpg" alt="" >';
                                } ?>
                            </div>
                            <div class="col-xs-12 col-md-8">
                                <?php if ( have_rows('songs') ) : ?>
                                    <div class="p-songs__playlist">
                                        <?php while ( have_rows('songs') ) : the_row(); ?>
                                            <div class="p-songs__audio">
                                                <div class="row">
                                                    <div class="col-xs-12 col-md-5">
                                                        <?php the_sub_field('title'); ?>
                                                    </div>
                                                    <div class="col-xs-12 col-md-7">
                                                        <audio controls>
                                                            <source src="<?php the_sub_field('audio'); ?>" type="audio/mpeg">
                                                        </audio>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endwhile; ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    <?php else : ?>
                        <div class="content">
                            <?php the_content(); ?>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </section>

<?php endwhile; ?>

<?php get_footer(); ?>