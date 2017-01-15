<?php

/*
Template name: Contacts
*/

get_header(); ?>

<?php if (have_posts()) while (have_posts()) : the_post(); ?>

    <section class="p-contacts">
        <div class="container">
            <div class="row">
                <div class="col-xs-12">
                    <h1 class="page-title"><?php the_title(); ?></h1>
                </div>
                <div class="col-xs-12 col-md-6">
                    <div class="p-contacts__info--address">
                        <h3>Адреса:</h3>
                        <?php the_field('address') ?>
                    </div>
                    <div class="p-contacts__info--phone">
                        <h3>Телефон:</h3>
                        <?php the_field('phone') ?>
                    </div>
                    <div class="p-contacts__info--schedule">
                        <h3>Графік роботи:</h3>
                        <?php the_field('schedule') ?>
                    </div>
                    <div class="p-contacts__info--email">
                        <h3>E-mail:</h3>
                        <?php the_field('email') ?>
                    </div>
                </div>
                <div class="col-xs-12 col-md-6">
                    <div id="map" class="c-contacts__map"></div>
                    <script type="text/javascript">
                        // Google map
                        function initMap() {
                            var map = new google.maps.Map(document.getElementById('map'), {
                                zoom: 15,
                                center: {lat: 49.467767, lng: 32.016969},
                                scrollwheel: false
                            });
                            var marker = new google.maps.Marker({
                                position: {lat: 49.467767, lng: 32.016969},
                                map: map,
                                // icon: image
                            });
                        }
                    </script>
                </div>
            </div>
        </div>
    </section>

<?php endwhile; ?>

<?php get_footer(); ?>