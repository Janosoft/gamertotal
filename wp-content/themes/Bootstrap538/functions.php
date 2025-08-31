<?php
// Soportes del tema
add_action('after_setup_theme', function () {
    add_theme_support('post-thumbnails');
});

// Limpiar <head>
remove_action('wp_head', 'feed_links', 2);         // quita links a feeds (posts/comentarios)
remove_action('wp_head', 'feed_links_extra', 3);   // quita links a feeds extra (categorías, etc.)

// Emoji off (front y admin)
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');
remove_filter('the_content_feed', 'wp_staticize_emoji');
remove_filter('comment_text_rss', 'wp_staticize_emoji');
remove_filter('wp_mail', 'wp_staticize_emoji_for_email');

// Autor de marca en front-end (HTML y feeds), sin afectar el admin.
add_filter('the_author', function ($name) {
    return 'Gamer Total';
}, 10, 1);

// Cubre otros usos del display name (según el tema/plugins).
add_filter('get_the_author_display_name', function ($name) {
    return 'Gamer Total';
}, 10, 1);

// Por si algún plugin/tema consulta meta directamente.
add_filter('the_author_meta', function ($value, $field, $user_id) {
    return 'Gamer Total';
}, 10, 3);

/**
 * RSS: declarar correctamente el namespace de Media RSS
 * https://www.rssboard.org/media-rss
 */
add_action('rss2_ns', function () {
    echo ' xmlns:media="http://search.yahoo.com/mrss/"';
});

/**
 * RSS: insertar imagen destacada como media:content + media:thumbnail
 */
add_action('rss2_item', function () {
    global $post;
    if (!has_post_thumbnail($post->ID)) {
        return;
    }

    $thumb_id  = get_post_thumbnail_id($post->ID);
    $full_src  = wp_get_attachment_image_src($thumb_id, 'full');   // [url, w, h]
    $thumb_src = wp_get_attachment_image_src($thumb_id, 'medium'); // [url, w, h]
    $mime      = get_post_mime_type($thumb_id);

    if (is_array($full_src)) {
        printf(
            '<media:content url="%s" medium="image" type="%s" width="%d" height="%d" />' . "\n",
            esc_url($full_src[0]),
            esc_attr($mime ?: 'image/jpeg'),
            intval($full_src[1]),
            intval($full_src[2])
        );
    }

    if (is_array($thumb_src)) {
        printf(
            '<media:thumbnail url="%s" width="%d" height="%d" />' . "\n",
            esc_url($thumb_src[0]),
            intval($thumb_src[1]),
            intval($thumb_src[2])
        );
    }
});
