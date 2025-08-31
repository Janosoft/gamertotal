<!-- Header Single -->
<!DOCTYPE html>
<html lang="es-AR" data-bs-theme="dark">

<head>
    <?php
    the_post();
    /* Descripcion */
    $string = substr(get_the_excerpt(), 0, 280);
    $pos1 = strrpos($string, '.');
    $pos2 = strrpos($string, ';');
    $pos3 = strrpos($string, ':');
    $pos4 = strrpos($string, ',');
    $pos5 = strrpos($string, ' ');
    $descripcion = esc_attr(substr($string, 0, ($pos1 > 160 ? $pos1 : ($pos2 > 160 ? $pos2 : ($pos3 > 160 ? $pos3 : ($pos4 > 160 ? $pos4 : $pos5))))) . ($pos1 > 160 ? '.' : ($pos2 > 160 ? '.' : ($pos3 > 160 ? '...' : ($pos4 > 160 ? '...' : '...')))));
    /* END : Descripcion */
    /* Categorías */
    $categoria = 'Noticias';
    $categories = get_the_category();
    if (! empty($categories)) {
        foreach ($categories as $category) {
            if (strpos($category->name, '-') !== 0) {
                $categoria = $category->name;
                break;
            }
        }
    }
    /* END : Categorías */
    /* Etiquetas */
    $tags = 'videojuegos, noticias de videojuegos, reseñas de videojuegos, consolas de videojuegos, PC gaming, juegos online, eSports, gamers, entretenimiento, tecnología';
    $post_tags = get_the_tags();
    if (! empty($post_tags)) {
        $tag_names = array();
        foreach ($post_tags as $tag) {
            $tag_names[] = $tag->name;
        }
        $tags = implode(', ', $tag_names);
    }
    $keywords_array = !empty($tags) ? array_map('trim', explode(',', $tags)) : ['Gamer Total'];
    $about_array = array();
    foreach ($keywords_array as $keyword) {
        $about_array[] = array(
            "@type" => "Thing",
            "name" => $keyword
        );
    }
    /* END : Etiquetas */
    /* Imagen */
    if (has_post_thumbnail()) {
        $img_src = esc_url(get_the_post_thumbnail_url(get_the_ID(), 'full'));
    } else {
        $img_src = esc_url(get_template_directory_uri() . '/imagenes/opengraph_image.jpg');
    }
    /* END : Imagen */
    /* Otros */
    $content = get_post_field('post_content', get_the_ID());
    $word_count = str_word_count(strip_tags($content));
    $reading_time = ceil($word_count / 200); // promedio humano: 200 palabras por minuto
    $time_required = 'PT' . $reading_time . 'M';
    /* END: Otros */
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title><?php echo esc_html(get_the_title()) . ' | Gamer Total'; ?></title>
    <!-- Metas -->
    <meta http-equiv="Content-Language" content="es-AR">
    <meta name="description" content="<?php echo $descripcion; ?>">
    <meta name="keywords" content="<?php echo esc_attr($tags); ?>">
    <meta property="article:published_time" content="<?php echo get_the_date('c'); ?>" />
    <meta property="article:modified_time" content="<?php echo get_the_modified_date('c'); ?>" />
    <!-- Open Graph -->
    <meta property="og:description" content="<?php echo $descripcion; ?>" />
    <meta property="og:title" content="<?php echo esc_attr(get_the_title()); ?>">
    <meta property="og:locale" content="es_AR" />
    <meta property="og:site_name" content="Gamer Total" />
    <meta property="og:type" content="article">
    <meta property="og:url" content="<?php echo esc_url(get_permalink()); ?>">
    <meta property="og:image" content="<?php echo $img_src; ?>">
    <!-- END : Open Graph -->
    <!-- Twitter -->
    <meta name="twitter:description" content="<?php echo $descripcion; ?>" />
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?php echo esc_attr(get_the_title()); ?>">
    <meta name="twitter:image" content="<?php echo $img_src; ?>">
    <!-- END : Twitter -->
    <meta name="author" content="Alejandro Martín Lodes" />
    <meta name="copyright" content="Alejandro Martín Lodes" />
    <meta name="robots" content="index, follow, max-image-preview:large">
    <meta name="revisit" content="1 days" />
    <meta name="googlebot" content="index, follow" />
    <link rel="canonical" href="<?php echo esc_url(get_permalink()); ?>">
    <link rel="apple-touch-icon" sizes="57x57" href="https://www.gamertotal.com.ar/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="https://www.gamertotal.com.ar/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="https://www.gamertotal.com.ar/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="https://www.gamertotal.com.ar/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="https://www.gamertotal.com.ar/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="https://www.gamertotal.com.ar/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="https://www.gamertotal.com.ar/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="https://www.gamertotal.com.ar/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="https://www.gamertotal.com.ar/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="https://www.gamertotal.com.ar/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="https://www.gamertotal.com.ar/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="https://www.gamertotal.com.ar/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="https://www.gamertotal.com.ar/favicon-16x16.png">
    <link rel="mask-icon" href="<?php echo get_template_directory_uri(); ?>/imagenes/logo.png" color="#DE595E">
    <link rel="manifest" href="https://www.gamertotal.com.ar/manifest.json">
    <meta name="msapplication-TileColor" content="#DE595E">
    <meta name="msapplication-TileImage" content="https://www.gamertotal.com.ar/ms-icon-144x144.png">
    <meta name="theme-color" content="#DE595E">
    <!-- Noticia Hoy JSON-LD -->
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "NewsArticle",
            "headline": "<?php echo esc_attr(get_the_title()); ?>",
            "description": "<?php echo $descripcion; ?>",
            "image": {
                "@type": "ImageObject",
                "url": "<?php echo $img_src; ?>"
            },
            "author": {
                "@type": "Person",
                "name": "Redacción Gamer Total",
                "url": "https://www.gamertotal.com.ar/author/alejandrolodes/"
            },
            "publisher": {
                "@type": "Organization",
                "name": "Gamer Total",
                "logo": {
                    "@type": "ImageObject",
                    "url": "<?php echo get_template_directory_uri(); ?>/imagenes/opengraph_image.jpg"
                }
            },
            "datePublished": "<?php echo get_the_date('c'); ?>",
            "dateModified": "<?php echo get_the_modified_date('c'); ?>",
            "mainEntityOfPage": {
                "@type": "WebPage",
                "@id": "<?php echo esc_url(get_permalink()); ?>"
            },
            "url": "<?php echo esc_url(get_permalink()); ?>",
            "articleSection": "<? echo $categoria; ?>",
            "keywords": <?php echo json_encode($keywords_array, JSON_UNESCAPED_UNICODE); ?>,
            "wordCount": <?php echo (int) $word_count; ?>,
            "timeRequired": "<?php echo esc_attr($time_required); ?>",
            "inLanguage": "es-AR",
            "locationCreated": {
                "@type": "Place",
                "name": "Puerto Madryn, Chubut, Argentina"
            },
            "about": <?php echo json_encode($about_array, JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT); ?>
        }
    </script>
    <!-- END : Noticia Hoy JSON-LD -->
    <!-- Gamer Total JSON-LD -->
    <script type="application/ld+json">
        {
            "@context": "https://schema.org",
            "@type": "Organization",
            "name": "Gamer Total",
            "url": "https://www.gamertotal.com.ar",
            "logo": "<?php echo get_template_directory_uri(); ?>/imagenes/opengraph_image.jpg"
        }
    </script>
    <!-- END: Gamer Total JSON-LD -->
    <!-- END : Metas -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/style.css">
    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-BJFVFPCDEB"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());
        gtag('config', 'G-BJFVFPCDEB');
    </script>
    <!-- END : Google tag (gtag.js) -->
    <!-- WordPress Head -->
    <?php wp_head();
    $nota_id = $post->ID; ?>
    <!-- END : WordPress Head -->
</head>

<body style="background-image: url('<?php echo get_template_directory_uri(); ?>/imagenes/back.webp'); background-repeat: repeat-y; background-size: contain;">
    <!-- Botón TOP -->
    <a id="button_top"></a>
    <!-- END : Botón TOP -->
    <!-- END : Header Single -->