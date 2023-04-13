<?php include_once("header_single.php"); ?>
<?php include_once('menu.php'); ?>
<?php include_once('menu_celular_inside.php'); ?>
<?php include_once('etiquetas_single.php'); ?>

<!-- single -->
<article class="container single_nota" itemscope itemtype="http://schema.org/BlogPosting">
    <div class="row mt-0 mt-2">
        <div class="col-lg-12">

            <div class="row">
                <div class="col" style="text-align: center;">
                    <h1 class="Franklin700 titulos_notas" itemprop="headline"><?php the_title() ?></h1>
                </div>
            </div>

            <div class="row redes">
                <div class="col mb-2" style="text-align: end;">
                    <?php edit_post_link(__('<i class="fa-solid fa-pen-to-square"></i>', ''), '', ''); ?>
                    <a target="_blank" href="https://www.facebook.com/sharer.php?u=<?php the_permalink(); ?>&t=<?php the_title(); ?>"><i class="fa-brands fa-facebook-f"></i></a>
                    <a target="_blank" href="https://twitter.com/intent/tweet?text=<?php the_title(); ?> : <?php the_permalink(); ?>"><i class="fa-brands fa-twitter"></i></a>
                    <a target="_blank" href="https://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>"><i class="fa-brands fa-linkedin"></i></a>
                </div>
            </div>

            <div class="row texto_single raleway400 vista_noticia">
                <div class="col">
                    <?php the_content(); ?>
                </div>
            </div>

        </div>
    </div>
</article>

<section class="container">
    <hr class="mb-4">
    <div class="row noticias mt-2">

        <?php
        $query = new WP_Query(array('showposts' => 3, 'category__in' => 1, 'post__not_in' => array($post->ID)));
        while ($query->have_posts()) : $query->the_post();
        ?>

            <div class="col-lg mb-2">
                <a href="<?php the_permalink(); ?>" alt="<?php the_title_attribute(); ?>">
                    <article itemscope itemtype="http://schema.org/BlogPosting">
                        <?php the_post_thumbnail('full', ['alt' => get_the_title(), 'loading' => 'lazy', 'class' => 'img-fluid']); ?>
                        <h2 itemprop="headline"><?php the_title_attribute(); ?></h2>
                        <link itemprop="url" href="<?php the_permalink(); ?>">
                    </article>
                </a>
            </div>

        <?php endwhile; ?>

    </div>
</section>

<?php include_once("footer.php"); ?>