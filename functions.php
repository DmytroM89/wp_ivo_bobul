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

// Thumnail
add_theme_support('post-thumbnails');
add_image_size('case-thumb', 500, 500, true);
add_image_size('cat-thumb', 270, 400, true);
add_image_size('prod-thumb', 500, 330, true);
add_image_size('gallery-thumb', 1200, 400, true);
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
function custom_posts_per_page($query)
{
    if (is_category(11)) {
        $query->set('posts_per_page', 16);
    } elseif (is_category(7)) {
        $query->set('posts_per_page', 16);
    }
}

add_action('pre_get_posts', 'custom_posts_per_page');


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
    if (is_home() || is_page(2) || is_page(11)) {
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