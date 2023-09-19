<?php include_once('header.php'); ?>
<?php include_once('menu.php'); ?>

<!-- archive -->
<div class="container mt-4">

    <div class="row">
        <div class="col">
            <div style="border-bottom: 2px solid #B64D54;">
                <div class="rectangulo"></div>
            </div>
            <h1 class="Franklin700 separador"><?php echo single_cat_title(); ?></h1>
        </div>
    </div>

    <?php
    $cant = 0;
    while (have_posts()) : the_post(); ?>
        <?php $cant++; ?>
        <article class="row mb-4 pb-2 noticias" itemscope itemtype="http://schema.org/BlogPosting">
            <div class="col-lg-4">
                <a href="<?php the_permalink() ?>" alt="<?php the_title_attribute(); ?>">
                    <?php the_post_thumbnail('medium_large', ['alt' => get_the_title(), 'loading' => (($cant < 5) ? 'eager' : 'lazy'), 'class' => 'img-fluid']); ?>
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
        </article>
    <?php endwhile; ?>
</div>

<?php include_once('footer.php'); ?>