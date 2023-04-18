<!doctype html>
<html lang="es">

<head>
  <?php the_post();
  ?>
  <title><?php the_title(); ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
  <meta name="theme-color" content="#fff" />
  <meta NAME="Description" content="<?php
                                    $string = substr(get_the_excerpt(), 0, 280);
                                    $pos1 = strrpos($string, '.');
                                    $pos2 = strrpos($string, ';');
                                    $pos3 = strrpos($string, ':');
                                    $pos4 = strrpos($string, ',');
                                    $pos5 = strrpos($string, ' ');
                                    echo substr($string, 0, ($pos1 > 160 ? $pos1 : ($pos2 > 160 ? $pos2 : ($pos3 > 160 ? $pos3 : ($pos4 > 160 ? $pos4 : $pos5))))) . ($pos1 > 160 ? '.' : ($pos2 > 160 ? '.' : ($pos3 > 160 ? '...' : ($pos4 > 160 ? '...' : '...'))));
                                    ?>" />
  <meta property="og:description" content="<?php
                                            $string = substr(get_the_excerpt(), 0, 280);
                                            $pos1 = strrpos($string, '.');
                                            $pos2 = strrpos($string, ';');
                                            $pos3 = strrpos($string, ':');
                                            $pos4 = strrpos($string, ',');
                                            $pos5 = strrpos($string, ' ');
                                            echo substr($string, 0, ($pos1 > 160 ? $pos1 : ($pos2 > 160 ? $pos2 : ($pos3 > 160 ? $pos3 : ($pos4 > 160 ? $pos4 : $pos5))))) . ($pos1 > 160 ? '.' : ($pos2 > 160 ? '.' : ($pos3 > 160 ? '...' : ($pos4 > 160 ? '...' : '...'))));
                                            ?>" />
  <meta name="twitter:description" content="<?php
                                            $string = substr(get_the_excerpt(), 0, 280);
                                            $pos1 = strrpos($string, '.');
                                            $pos2 = strrpos($string, ';');
                                            $pos3 = strrpos($string, ':');
                                            $pos4 = strrpos($string, ',');
                                            $pos5 = strrpos($string, ' ');
                                            echo substr($string, 0, ($pos1 > 160 ? $pos1 : ($pos2 > 160 ? $pos2 : ($pos3 > 160 ? $pos3 : ($pos4 > 160 ? $pos4 : $pos5))))) . ($pos1 > 160 ? '.' : ($pos2 > 160 ? '.' : ($pos3 > 160 ? '...' : ($pos4 > 160 ? '...' : '...'))));
                                            ?>" />
  <?php
  $posttags = get_the_tags();
  if ($posttags) {
    $words = "";
    foreach ($posttags as $tag) {
      $words .= $tag->name . ', ';
    }
    $words = substr($words, 0, -2); //quita la ultima coma y el ultimo espacio
    print('<meta name="keywords" content="' . $words . '"/>');
    print('<meta name="news_keywords" content="' . $words . '"/>');
  } else {
    print('<meta NAME="Keywords" content="videojuegos, noticias de videojuegos, reseñas de videojuegos, consolas de videojuegos, PC gaming, juegos online, eSports, gamers, entretenimiento, tecnología"/>');
  }
  ?>
  <meta name="author" content="Alejandro Martín Lodes" />
  <meta name="copyright" content="Alejandro Martín Lodes" />
  <meta name="robots" content="index, follow" />
  <meta name="revisit" content="1 days" />
  <meta name="googlebot" content="index, follow" />
  <meta name="robots" content="max-image-preview:large">
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
  <link rel="manifest" href="https://www.gamertotal.com.ar/manifest.json">
  <meta name="msapplication-TileColor" content="#99183D">
  <meta name="msapplication-TileImage" content="https://www.gamertotal.com.ar/ms-icon-144x144.png">
  <meta name="theme-color" content="#99183D">
  <link rel="alternate" href="https://www.gamertotal.com.ar/feed" title="RSS" type="application/rss+xml">
  <link rel="alternate" href="https://www.gamertotal.com.ar/category/analisis/feed/" title="RSS Sección Análisis" type="application/rss+xml">
  <link rel="alternate" href="https://www.gamertotal.com.ar/category/lanzamientos/feed/" title="RSS Sección Lanzamientos" type="application/rss+xml">
  <link rel="alternate" href="https://www.gamertotal.com.ar/category/ofertas/feed/" title="RSS Sección Ofertas" type="application/rss+xml">
  <link rel="alternate" href="https://www.gamertotal.com.ar/category/tecnologia/feed/" title="RSS Sección Tecnología" type="application/rss+xml">
  <link rel="alternate" href="https://www.gamertotal.com.ar/category/trucos/feed/" title="RSS Sección Trucos" type="application/rss+xml">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Libre+Franklin:wght@400;700&family=Raleway:wght@400;700&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;600;700;800&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://www.gamertotal.com.ar/wp-content/themes/Bootstrap53/style.css" samesite="none Secure">
  <?php
  wp_head();
  $nota_id = $post->ID;
  ?>
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
</head>

<body>
  <!----boton_scroll_top---->
  <a id="button_top"></a>
  <!----boton_scroll_top---->