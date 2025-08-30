<?php

remove_action('wp_head', 'rsd_link');
remove_action('wp_head', 'rest_output_link_wp_head', 10);
remove_action('wp_head', 'wp_resource_hints', 2);
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');
add_filter('emoji_svg_url', '__return_false');

/**
 * Remove author display name
 * @param $display_name
 * @return string
 */
function my_remove_author_display_name($display_name)
{
    if (! is_admin()) {
        return '';
    }
    return $display_name;
}
add_filter('the_author', 'my_remove_author_display_name');

if (function_exists('add_theme_support')) add_theme_support('post-thumbnails');

// Add namespace for media:image element used below
add_action('rss2_ns', function () {
    echo 'xmlns:media="https://www.gamertotal.com.ar/feed"';
});

// insert the image object into the RSS item (see MB-191)
add_action('rss2_item', function () {
    global $post;
    if (has_post_thumbnail($post->ID)) {
        $thumbnail_ID = get_post_thumbnail_id($post->ID);
        $thumbnail = wp_get_attachment_image_src($thumbnail_ID, 'medium');
        if (is_array($thumbnail)) {
            echo '<media>' . $thumbnail[0] . '</media>';
        }
    }
});
