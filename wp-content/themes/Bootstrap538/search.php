<?php include_once("header.php"); ?>
<?php include_once('menu.php'); ?>

<!-- Search -->
<section class="container mb-3">
    <div class="row g-3 mb-3 align-items-center">
        <div class="col-lg">
            <!-- Búsqueda -->
            <form name="advanced-search-form" method="get" action="https://www.gamertotal.com.ar/" autocomplete="off">
                <div class="input-group">
                    <input type="text" class="form-control" name="s" id="s" placeholder="Palabras Claves">
                    <div class="input-group-append">
                        <button class="btn" style="background-color: #B64D54; color: #fff" type="submit"><i class="bi bi-search" aria-hidden="true"></i></button>
                    </div>
                </div>
            </form>
            <!-- END: Búsqueda -->
        </div>
    </div>
    <div class="row">
        <div class="col">
            <?php if (have_posts()) : ?>
                <div class="vstack gap-3 border-2 p-3" style="border-color: rgba(228, 76, 91, 0.2); border-style: solid;">
                    <?php
                    while (have_posts()) : the_post();
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
                        <article class="card border-2 position-relative" style="border-color: rgba(228, 76, 91, 0.2); background: linear-gradient(to right, rgba(125, 19, 119, 0.5), rgba(16, 17, 38, 0.5));" itemscope itemtype="https://schema.org/NewsArticle">
                            <div class="row g-0">
                                <div class="col-lg">
                                    <div class="ratio ratio-16x9 img-container">
                                        <div class="img-skeleton w-100 h-100 position-absolute"></div>
                                        <img
                                            data-src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'large')); ?>"
                                            alt="<?php echo esc_attr($alt_text); ?>"
                                            loading="lazy"
                                            decoding="async"
                                            fetchpriority="low"
                                            class="card-img-top w-100 h-100 object-fit-cover object-center lazy-img rounded-1"
                                            itemprop="image">
                                        <meta itemprop="url" content="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'medium'); ?>">
                                    </div>
                                </div>
                                <div class="col-lg">
                                    <div class="card-body">
                                        <h2 class="card-title text-center text-lg-start fw-bold fs-5" itemprop="headline">
                                            <a href="<?php the_permalink(); ?>"
                                                aria-label="Leer Noticia: <?php the_title(); ?>"
                                                itemprop="url"
                                                class="stretched-link text-reset text-decoration-none">
                                                <?php the_title(); ?>
                                            </a>
                                        </h2>
                                        <p class="card-text" style="text-align: justify;"><span style="color: #B64D54; font-weight: 500;"><?php echo get_the_date(); ?></span> <?php print get_the_excerpt(); ?></p>
                                    </div>
                                </div>
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
                        <!-- END: Noticia -->
                    <?php
                    endwhile;
                    wp_reset_postdata();
                    ?>
                </div>
            <?php else : ?>
                <div class="row">
                    <div class="col-lg">
                        <img src="<?php echo get_template_directory_uri(); ?>/imagenes/nohay.jpg" alt="No se encontraron resultados" cache-control="max-age=259200" decoding="async" />
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg">
                        <p>Lo sentimos, pero no hay resultados con tus criterios de busqueda. Por favor, intentelo de nuevo con algunas palabras claves diferentes.</p>
                    </div>
                </div>
            <?php endif; ?>
        </div>

    </div>


    <div class="container mt-4">
        <div class="row mt-5 p-5">
            <div class="col-lg">

            </div>
        </div>


        <?php
        $cant = 0;

        ?>
        <?php $cant++; ?>

        <article class="row mb-4 pb-2 noticias" itemscope itemtype="http://schema.org/BlogPosting">
            <div class="col-lg-4">
                <a href="<?php the_permalink() ?>" alt="<?php the_title_attribute(); ?>">
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
                </a>
            </div>
            <div class="col-lg-8">
                <a class="titulo Franklin700" href="<?php the_permalink(); ?>" alt="<?php the_title_attribute(); ?>">
                    <h2 itemprop="headline">
                        <?php the_title(); ?>
                    </h2>
                </a>
                <span style="color: #F39424; font-weight: 500;"><?php echo get_the_date(); ?></span> <?php print get_the_excerpt(); ?>
                <link itemprop="url" href="<?php the_permalink(); ?>">
            </div>
        </article>


    </div>
    <!-- END: Search -->

    <?php include_once('footer.php'); ?>