<?php include_once('header.php'); ?>
<?php include_once('menu.php'); ?>
<?php include_once('menu_celular_inside.php'); ?>

<!-- archive -->
<div class="container mt-4">
    <div class="row mt-5 p-5">
        <div class="col-lg">
            <form name="advanced-search-form" method="get" action="https://www.gamertotal.com.ar/" autocomplete="off">
                <div class="input-group">
                    <input type="text" class="form-control" name="s" id="s" placeholder="Palabras Claves">
                    <div class="input-group-append">
                        <button class="btn btn-warning" style="background-color: #DE595E; border-color: #B64D54;" type="submit"><i class="bi bi-search" aria-hidden="true"></i></button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <?php if (have_posts()) : ?>
        <?php
        $cant = 0;
        while (have_posts()) : the_post(); ?>
            <?php $cant++; ?>

            <article class="row mb-4 pb-2 noticias" itemscope itemtype="http://schema.org/BlogPosting">
                <div class="col-lg-4">
                    <a href="<?php the_permalink() ?>" alt="<?php the_title_attribute(); ?>">
                        <div class="img-container">
                            <?php the_post_thumbnail('medium', ['alt' => esc_attr(($tags = get_the_tags()) ? implode(', ', array_map(function($tag) { return $tag->name; }, $tags)) : get_the_title()), 'loading' => (($cant < 10) ? 'eager' : 'lazy'), 'decoding' => 'async', 'fetchpriority' => 'high', 'class' => 'img-fluid']); ?>
                        </div>
                    </a>
                </div>
                <div class="col-lg-8">
                    <a class="titulo Franklin700" href="<?php the_permalink(); ?>" alt="<?php the_title_attribute(); ?>">
                        <h2 itemprop="headline">
                            <?php the_title(); ?>
                        </h2>
                    </a>
                    <span style="color: #B64D54; font-weight: 500;"><?php echo get_the_date(); ?></span> <?php print get_the_excerpt(); ?>
                    <link itemprop="url" href="<?php the_permalink(); ?>">
                </div>
            </article>

        <?php endwhile; ?>
    <?php else : ?>
        <div class="row">
            <div class="col-lg">
                <img src="/wp-content/themes/Bootstrap53/images/nohay.jpg" alt="No se encontraron resultados" cache-control="max-age=31536000" decoding="async" />
            </div>
        </div>
        <div class="row">
            <div class="col-lg">
                <p>Lo sentimos, pero no hay resultados con tus criterios de busqueda. Por favor, intentelo de nuevo con algunas palabras claves diferentes.</p>
            </div>
        </div>
    <?php endif; ?>

</div>

<?php include_once('footer.php'); ?>