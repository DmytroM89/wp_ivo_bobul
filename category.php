<?php get_header(); ?>

<?php if (have_posts()) : ?>

    <section class="p-category">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h1 class="page-title"><?php wp_title(''); ?></h1>
                </div>
            </div>
            <?php if (is_category(4)) : ?>
                <div class="p-news row">
                    <?php while (have_posts()) : the_post(); ?>
                        <div class="col-xs-12 col-md-6">
                            <div class="p-news__item">
                                <div class="row">
                                    <div class="col-xs-12 col-md-4">
                                        <div class="p-news__image--desktop">
                                            <a href="<?php the_permalink(); ?>" class="p-news__img">
                                                <?php if (has_post_thumbnail()) {
                                                    the_post_thumbnail('news-thumb');
                                                } else {
                                                    echo '<img src="' . get_template_directory_uri() . '/assets/images/default-photo--news.jpg" alt="" >';
                                                } ?>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="col-xs-12 col-md-8">
                                        <h3 class="p-news__title"><a href="<?php the_permalink(); ?>"><?php echo textCropping(get_the_title(), 50); ?></a></h3>
                                        <div class="p-news__image--mobile"></div>
                                        <div class="p-news__intro"><?php echo textCropping(get_the_content(''), 150); ?></div>
                                        <p class="p-news__more"><a href="<?php the_permalink(); ?>" class="">Детальніше</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endwhile; ?>
                    <div class="col-xs-12">
                        <?php //// Пагинация
                        //                global $wp_query;
                        //                $big = 999999999;
                        //                echo paginate_links(array(
                        //                    'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
                        //                    'format' => '?paged=%#%',
                        //                    'current' => max(1, get_query_var('paged')),
                        //                    'type' => 'list',
                        //                    'prev_text' => __('« Сюда'),
                        //                    'next_text' => __('Туда »'),
                        //                    'total' => $wp_query->max_num_pages
                        //                ));
                        //                ?>
                    </div>
                </div>
            <?php elseif (is_category(5)) : ?>
                <div class="p-songs row">
                    <?php while (have_posts()) : the_post(); ?>
                        <div class="p-songs__col">
                            <a href="<?php the_permalink(); ?>" class="p-songs__image">
                                <?php if (has_post_thumbnail()) {
                                    the_post_thumbnail('song-thumb');
                                } else {
                                    echo '<img src="' . get_template_directory_uri() . '/assets/images/default-photo--song.jpg" alt="" >';
                                } ?>
                            </a>
                            <h2 class="p-songs__name"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>
                        </div>
                    <?php endwhile; ?>
                </div>
            <?php endif; ?>
        </div>
    </section>

<?php endif; ?>

<?php get_footer(); ?>