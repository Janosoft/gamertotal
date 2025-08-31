<?php include_once("header_single.php"); ?>
<?php include_once('menu.php'); ?>

<!-- single -->
<article class="container single_nota" itemscope itemtype="http://schema.org/BlogPosting">
    <div class="row mt-0 mt-2">
        <div class="col-lg-12">

            <div class="row">
                <div class="col" style="text-align: center;">
                    <h1 itemprop="headline" class="fs-2 fw-bold"><?php the_title() ?></h1>
                </div>
            </div>

            <div class="row etiquetas mb-2" style="display: flex; text-transform: uppercase;">
                <div class="col text-center">
                    <?php
                    $posttags = get_the_tags();
                    $etiquetas = "";
                    if (!empty($posttags)) {
                    ?>
                        <p class="pt-1 pb-1 mb-0">
                            <i class="bi bi-bookmark-fill" style="margin-right: 10px; color:white;" aria-hidden="true"></i>
                            <?php
                            foreach ($posttags as $tag) {
                                $etiquetas .= '<a href="' . esc_attr(get_tag_link($tag->term_id)) . '" class="text-reset text-decoration-none fw-normal">' . mb_strtoupper($tag->name)  . '</a>' . ' - ';
                            }
                            $etiquetas = substr($etiquetas, 0, -2); //quita la ultima coma y el ultimo espacio
                            print($etiquetas);
                            ?>
                            <i class="bi bi-bookmark-fill" style="margin-left: 10px; color:white;" aria-hidden="true"></i>
                        </p>
                    <?php
                    }
                    ?>
                </div>
            </div>

            <div class="row">
                <div class="col fs-6 fs-md-5 lh-lg">
                    <?php the_content(); ?>
                </div>
            </div>

            <div class="row redes my-2">
                <div class="col" style="text-align: end;">
                    <?php edit_post_link(__('<i class="bi bi-pencil-square"></i>', ''), '', ''); ?>
                    <a target="_blank" href="https://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>&t=<?php the_title(); ?>"><i class="bi bi-facebook"></i></a>
                    <a target="_blank" href="https://twitter.com/intent/tweet?text=<?php the_title(); ?> : <?php the_permalink(); ?>"><i class="bi bi-twitter-x"></i></a>
                    <a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>"><i class="bi bi-linkedin"></i></a>
                </div>
            </div>

            <div class="row align-items-center my-2">
                <div class="col-auto">
                    <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" rel="author" itemprop="author" target="_self">
                        <img src="https://www.gamertotal.com.ar/img/<?php
                                                                    switch (get_the_author_meta('ID')) {
                                                                        case 1:
                                                                            print('usr_GamerTotal.jpg');
                                                                            break;
                                                                        case 2:
                                                                            print('usr_AlejandroLodes.jpg');
                                                                            break;
                                                                        default:
                                                                            print('usr_GamerTotal.jpg');
                                                                            break;
                                                                    }
                                                                    ?>" alt="<?php print(get_the_author()); ?>" class="author" style="border: solid 2px #B64D54; max-height: 70px; border-radius: 50%!important;" />
                    </a>
                </div>
                <div class="col ml-2">
                    <a href="<?php echo esc_url(get_author_posts_url(get_the_author_meta('ID'))); ?>" rel="author" target="_self" class="author">
                        <p class="m-0" style="border-top: solid 2px #B64D54;">
                            Por: <strong><?php print(get_the_author()); ?></strong> • <time itemprop="datePublished" datetime="<?php print(get_the_date('c')); ?>">Publicado el: <strong><?php print(get_the_date()); ?></strong></time>
                        </p>
                    </a>
                </div>
            </div>

        </div>
    </div>
</article>

<section class="container my-3">
    <div class="row g-3">
        <?php
        $query = new WP_Query(array('posts_per_page' => 3, 'offset' => 0, 'category__in' => 1, 'post__not_in' => array($post->ID)));
        while ($query->have_posts()) : $query->the_post();
            /* Categorías */
            $categories = '';
            $post_categories = get_the_category();
            if (! empty($post_categories)) {
                $categories_names = array();
                foreach ($post_categories as $category) {
                    if (strpos($category->name, '-') !== 0) {
                        $categories_names[] = $category->name;
                    }
                }
                $categories = implode(', ', $categories_names);
            }
            /* END : Categorías */
            /* Etiquetas */
            $tags = '';
            $post_tags = get_the_tags();
            if (! empty($post_tags)) {
                $tag_names = array();
                foreach ($post_tags as $tag) {
                    $tag_names[] = $tag->name;
                }
                $tags = implode(', ', $tag_names);
            }
            $alt_text = !empty($tags) ? $tags : get_the_title();
            /* END : Etiquetas */
            /* Otros Contenidos */
            $content = get_post_field('post_content', get_the_ID());
            $word_count = str_word_count(strip_tags($content));
            $reading_time = ceil($word_count / 200);
            $time_required = 'PT' . $reading_time . 'M';
            /* END : Otros Contenidos */
        ?>
            <!-- Noticia -->
            <div class="col-lg-4 d-flex">
                <article class="card w-100 border-0 h-100 position-relative" style="background: linear-gradient(to right, rgba(125, 19, 119, 0.2), rgba(16, 17, 38, 0.5));" itemscope itemtype="https://schema.org/NewsArticle">
                    <div class="ratio ratio-16x9 img-container">
                        <div itemprop="image" itemscope itemtype="https://schema.org/ImageObject">
                            <div class="img-skeleton w-100 h-100 position-absolute"></div>
                            <img
                                data-src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'medium')); ?>"
                                alt="<?php echo esc_attr($alt_text); ?>"
                                loading="lazy"
                                decoding="async"
                                fetchpriority="low"
                                class="card-img-top w-100 h-100 object-fit-cover object-center lazy-img rounded-1">
                            <meta itemprop="url" content="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>">
                        </div>
                    </div>
                    <div class="card-body">
                        <h2 class="card-title fs-6 text-center text-lg-start" itemprop="headline">
                            <a href="<?php the_permalink(); ?>"
                                aria-label="Leer Noticia: <?php the_title(); ?>"
                                itemprop="url"
                                class="stretched-link text-reset text-decoration-none">
                                <?php the_title(); ?>
                            </a>
                        </h2>
                    </div>
                    <meta itemprop="name" content="<?php the_title(); ?>">
                    <meta itemprop="author" content="Gamer Total">
                    <meta itemprop="datePublished" content="<?php echo get_the_date('c'); ?>">
                    <meta itemprop="dateModified" content="<?php echo get_the_modified_date('c'); ?>">
                    <meta itemprop="inLanguage" content="es-AR">
                    <meta itemprop="locationCreated" content="Chubut, Argentina">
                    <meta itemprop="mainEntityOfPage" content="<?php the_permalink(); ?>">
                    <div itemprop="publisher" itemscope="" itemtype="https://schema.org/Organization">
                        <meta itemprop="name" content="Gamer Total">
                        <div itemprop="logo" itemscope="" itemtype="https://schema.org/ImageObject">
                            <meta itemprop="url" content="<?php echo get_template_directory_uri(); ?>/imagenes/logo.png">
                            <meta itemprop="width" content="480">
                            <meta itemprop="height" content="480">
                        </div>
                    </div>
                    <meta itemprop="genre" content="<?php echo esc_attr(strip_tags($categories)); ?>">
                    <meta itemprop="keywords" content="<?php echo esc_attr(strip_tags($tags)); ?>">
                    <meta itemprop="timeRequired" content="<?php echo esc_attr($time_required); ?>">
                    <meta itemprop="wordCount" content="<?php echo esc_attr($word_count); ?>">
                </article>
            </div>
            <!-- END: Noticia -->
        <?php
        endwhile;
        wp_reset_postdata();
        ?>
    </div>
</section>

<?php include_once("footer.php"); ?>