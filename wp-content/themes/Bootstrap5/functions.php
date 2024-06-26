<?php

add_theme_support('post-thumbnails');
add_theme_support('responsive-embeds');
remove_action( 'wp_head', 'feed_links', 2 ); // Quita feeds en post y comentarios
remove_action('wp_head', 'feed_links_extra', 3 ); // Quita feeds en categorias
// Todo el código relacionado con emojis
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('admin_print_scripts', 'print_emoji_detection_script');
remove_action('wp_print_styles', 'print_emoji_styles');
remove_action('admin_print_styles', 'print_emoji_styles');
remove_filter('the_content_feed', 'wp_staticize_emoji');
remove_filter('comment_text_rss', 'wp_staticize_emoji');
remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
// Función específica para deshabilitar emojis en editor Gutenberg
add_filter('tiny_mce_plugins', 'disable_emojicons_tinymce');
function fb_opengraph()
{
    global $post;
    if (is_single()) {
        if (has_post_thumbnail($post->ID)) {
            $img_src = esc_url(get_the_post_thumbnail_url($post->ID, 'full'));
        } else {
            $img_src = get_stylesheet_directory_uri() . '/images/opengraph_image.jpg';
        }
        $string = substr(get_the_excerpt($post->ID), 0, 280);
        $pos1 = strrpos($string, '.');
        $pos2 = strrpos($string, ';');
        $pos3 = strrpos($string, ':');
        $pos4 = strrpos($string, ',');
        $pos5 = strrpos($string, ' ');
        $excerpt= substr($string, 0, ($pos1 > 160 ? $pos1 : ($pos2 > 160 ? $pos2 : ($pos3 > 160 ? $pos3 : ($pos4 > 160 ? $pos4 : $pos5))))) . ($pos1 > 160 ? '.' : ($pos2 > 160 ? '.' : ($pos3 > 160 ? '...' : ($pos4 > 160 ? '...' : '...'))));
        if (empty($excerpt)) $excerpt = get_bloginfo('description');

?>
        <meta property="og:title" content="<?php echo the_title(); ?>">
        <meta property="og:description" content="<?php echo $excerpt; ?>">
        <meta property="og:type" content="article">
        <meta property="og:url" content="<?php echo the_permalink(); ?>">
        <meta property="og:site_name" content="<?php echo get_bloginfo(); ?>">
        <meta property="og:image" content="<?php echo $img_src; ?>">
        
        <meta name="twitter:card" content="summary_large_image" />
        <meta name="twitter:url" content="<?php echo the_permalink(); ?>">
        <meta name="twitter:title" content="<?php echo the_title(); ?>">
        <meta name="twitter:description" content="<?php echo $excerpt; ?>">
        <meta name="twitter:image:src" content="<?php echo $img_src; ?>">
        <meta name="twitter:site" content="21organic" />
<?php
    } else {
        return;
    }
}
add_action('wp_head', 'fb_opengraph', 5);
