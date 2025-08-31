<!-- Noticias_1 -->
<div class="container">
    <div class="row g-3 align-items-stretch">
        <!-- Central 1 -->
        <div class="col-lg-7">
            <?php
            $query = new WP_Query(array('posts_per_page' => 1, 'offset' => 0, 'category__in' => 1));
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
                <article class="card border-0" itemscope itemtype="https://schema.org/NewsArticle">
                    <a href="<?php the_permalink(); ?>" aria-label="Leer Noticia: <?php the_title(); ?>" itemprop="url">
                        <div class="ratio ratio-16x9 img-container">
                            <div class="img-skeleton w-100 h-100 position-absolute"></div>
                            <img
                                data-src="<?php echo esc_url(get_the_post_thumbnail_url(get_the_ID(), 'large')); ?>"
                                alt="<?php echo esc_attr($alt_text); ?>"
                                loading="eager"
                                decoding="async"
                                fetchpriority="high"
                                class="card-img-top w-100 h-100 object-fit-cover object-center lazy-img rounded-1"
                                itemprop="image">
                            <meta itemprop="url" content="<?php echo get_the_post_thumbnail_url(get_the_ID(), 'large'); ?>">
                        </div>
                        <div class="card-body px-0">
                            <h2 class="fs-2" itemprop="headline"><?php the_title(); ?></h2>
                        </div>
                    </a>
                    <meta itemprop="name" content="<?php the_title(); ?>">
                    <meta itemprop="author" content="Gamer Total">
                    <meta itemprop="datePublished" content="<?php echo get_the_date('c'); ?>">
                    <meta itemprop="dateModified" content="<?php echo get_the_modified_date('c'); ?>">
                    <meta itemprop="inLanguage" content="es-AR">
                    <meta itemprop="locationCreated" content="Chubut, Argentina">
                    <meta itemprop="mainEntityOfPage" content="<?php the_permalink(); ?>">
                    <div itemprop="publisher" itemscope="" itemtype="https://schema.org/Organization">
                        <meta itemprop="name" content="El Diario">
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
            <?php
            endwhile;
            wp_reset_postdata();
            ?>
        </div>
        <!-- END: Central 1 -->

        <!-- Columna derecha -->
        <div class="col-lg-5">
            <div class="vstack gap-3 h-100">
                <article class="card border-0">
                    <a href="#" class="ratio ratio-16x9 card-img-top">
                        <img src="https://www.gamertotal.com.ar/wp-content/uploads/2025/06/Nintendo-Switch-2-744x419.jpg" alt="Título noticia 1" loading="lazy">
                    </a>
                    <div class="card-body">
                        <h2 class="h6 card-title">Noticia 1</h2>
                    </div>
                </article>

                <article class="card border-0">
                    <a href="#" class="ratio ratio-16x9 card-img-top">
                        <img src="https://www.gamertotal.com.ar/wp-content/uploads/2025/06/Nintendo-Switch-2-744x419.jpg" alt="Título noticia 2" loading="lazy">
                    </a>
                    <div class="card-body">
                        <h2 class="h6 card-title">Noticia 2</h2>
                    </div>
                </article>

                <article class="card border-0">
                    <a href="#" class="ratio ratio-16x9 card-img-top">
                        <img src="https://www.gamertotal.com.ar/wp-content/uploads/2025/06/Nintendo-Switch-2-744x419.jpg" alt="Título noticia 3" loading="lazy">
                    </a>
                    <div class="card-body">
                        <h2 class="h6 card-title">Noticia 3</h2>
                    </div>
                </article>
            </div>
        </div>
        <!-- END: Columna derecha -->
    </div>
</div>
<!-- END: Noticias_1 -->