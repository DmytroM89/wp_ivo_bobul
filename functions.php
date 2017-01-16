<?php

remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'wlwmanifest_link');
remove_action('wp_head', 'wp_generator');

add_filter('show_admin_bar', '__return_false');
add_theme_support('post-thumbnails');


// Add menu
if (function_exists('add_theme_support')) {
    add_theme_support('menus');
}


// Add widget
function my_widgets_init()
{
    register_sidebar(array(
        'name' => 'Форма орбратной связи',
        'id' => 'callback',
        'before_widget' => '',
        'after_widget' => '',
        'before_title' => '',
        'after_title' => '',
    ));
}

add_action('widgets_init', 'my_widgets_init');


// Delete anchor
function no_more_jumping($post)
{
    return '<a href="' . get_permalink($post->ID) . '" class="more-link">' . 'Подробнее' . '</a>';
}

add_filter('the_content_more_link', 'no_more_jumping');

// Thumbnail
add_theme_support('post-thumbnails');
add_image_size('team-thumb', 500, 500, true);
add_image_size('song-thumb', 500, 500, true);
add_image_size('photo-thumb', 500, 500, true);
add_image_size('news-thumb', 500, 400, true);
add_filter('image_size_names_choose', 'my_custom_sizes');
function my_custom_sizes($sizes)
{
    return array_merge($sizes, array(
        'diplom-size' => __('Дипломы'),
    ));
}


// Post Gallery
add_filter('use_default_gallery_style', '__return_false');  // delete style
add_filter('the_content', 'remove_br_gallery', 11, 2);     // delete BR
function remove_br_gallery($output)
{
    return preg_replace('/\<br[^\>]*\>/', '', $output);
}


// Post per page
//function custom_posts_per_page($query)
//{
//    if (is_category(11)) {
//        $query->set('posts_per_page', 16);
//    } elseif (is_category(7)) {
//        $query->set('posts_per_page', 16);
//    }
//}

//add_action('pre_get_posts', 'custom_posts_per_page');


// Style
function my_theme_enqueue_style()
{
    wp_enqueue_style('grid', get_template_directory_uri() . '/assets/css/grid.css');
//    wp_enqueue_style('slick', get_template_directory_uri() . '/bower_components/slick-carousel/slick/slick.css');
    wp_enqueue_style('magnific', get_template_directory_uri() . '/bower_components/magnific-popup/dist/magnific-popup.css');
    wp_enqueue_style('style', get_template_directory_uri() . '/assets/css/style.css');
}

add_action('wp_enqueue_scripts', 'my_theme_enqueue_style');


// Scripts
function my_theme_add_scripts()
{
    if ( is_page(9) ) {
        wp_enqueue_script('google-map', 'https://maps.googleapis.com/maps/api/js?key=AIzaSyC7nl04gTQl-ZBg0gjus9KGEEOKiczTW7o&callback=initMap', '', '', true);
    }
//    wp_enqueue_script('slick', get_template_directory_uri() . '/bower_components/slick-carousel/slick/slick.min.js', '', '', true);
    wp_enqueue_script('magnific', get_template_directory_uri() . '/bower_components/magnific-popup/dist/jquery.magnific-popup.min.js', '', '', true);
    wp_enqueue_script('scripts', get_template_directory_uri() . '/assets/js/scripts.min.js', '', '', true);
}

add_action('wp_enqueue_scripts', 'my_theme_add_scripts');


// Categories level
function getCurrentCatId()
{
    return get_query_var('cat');
}

function getCurrentCat()
{
    return get_category(getCurrentCatId());
}

function hasCatChildCategories()
{
    $child = get_categories(['parent' => getCurrentCatId()]);
    if (count($child) != 0) return true;
    return false;
}

/**
 * Returns ID of top-level parent category, or current category if you are viewing a top-level
 *
 * @param  string $catid Category ID to be checked
 * @return  string    $catParent  ID of top-level parent category
 */
function pa_category_top_parent_id($catid = NULL)
{
    if (!$catid) $catid = getCurrentCatId();
    while ($catid) {
        $cat = get_category($catid); // get the object for the catid
        $catid = $cat->category_parent; // assign parent ID (if exists) to $catid
        // the while loop will continue whilst there is a $catid
        // when there is no longer a parent $catid will be NULL so we can assign our $catParent
        $catParent = $cat->cat_ID;
    }
    return $catParent;
}


// Text cropping
function textCropping($text, $size, $showEllipsis = true)
{
    $ellipsis = '';
    if ($showEllipsis) $ellipsis = "...";
    if (strlen($text) > $size) return mb_substr($text, 0, $size) . $ellipsis;
    return $text;
}

// Mime types
function my_upload_mimes() {
    $mime_types = array(
        'mp3|m4a|m4b' => 'audio/mpeg'
    );
    return $mime_types;
}
add_filter( 'upload_mimes', 'my_upload_mimes' );


// Pages
$biography = get_post(7);
$schedule  = get_post(43);

// Schedule Sort Array
function getScheduleSortArray($array)
{
    if (count($array)) {
        $data = [];
        foreach ($array as $item) {
            $date = $item['date'];
            $date = new DateTime($date);
            $item['date'] = $date->format('d.m.Y');
            switch ($date->format('m')) {
                case '01' :
                    $data['01'][] = $item;
                    break;
                case '02' :
                    $data['02'][] = $item;
                    break;
                case '03' :
                    $data['03'][] = $item;
                    break;
                case '04' :
                    $data['04'][] = $item;
                    break;
                case '05' :
                    $data['05'][] = $item;
                    break;
                case '06' :
                    $data['06'][] = $item;
                    break;
                case '07' :
                    $data['07'][] = $item;
                    break;
                case '08' :
                    $data['08'][] = $item;
                    break;
                case '09' :
                    $data['09'][] = $item;
                    break;
                case '10' :
                    $data['11'][] = $item;
                    break;
                case '11' :
                    $data['11'][] = $item;
                    break;
                case '12' :
                    $data['12'][] = $item;
                    break;
            }
        }
        return $data;
    }
    return false;
}
function getMonthName($monthNum)
{
    $months = array(
        '01' => 'Січень' ,
        '02' => 'Лютий' ,
        '03' => 'Березень' ,
        '04' => 'Квітень' ,
        '05' => 'Травень' ,
        '06' => 'ЧервеньИюнь' ,
        '07' => 'Липень' ,
        '08' => 'Серпень' ,
        '09' => 'Вересень' ,
        '10' => 'Жовтень' ,
        '11' => 'Листопад' ,
        '12' => 'Грудень'
    );
    return $months[$monthNum];
}

function getPageClass($id)
{
    $homeId = 2;
    $videoId = 24;
    $teamId = 13;
    $contactsId = 9;
    $photoId = 11;
    $biographyId = 7;
    $scheduleId = 43;

    if ( $homeId == $id ) {
        return '--home';
    } if ( $scheduleId == $id ) {
        return '--schedule';
    } if ( $videoId == $id ) {
        return '--video';
    } if ( $teamId == $id ) {
        return '--team';
    }
}

function getPageId()
{
//    $page_object = get_queried_object();
    $page_id = get_queried_object_id();
    return $page_id;
}

function getYoutubeVideoId($url)
{
    parse_str( parse_url( $url, PHP_URL_QUERY ), $my_array_of_vars );
    return $my_array_of_vars['v'];
}