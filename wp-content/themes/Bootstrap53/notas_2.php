<!-- notas_2 -->
<div class="container">
    <div class="row noticias">

        <?php
        $query = new WP_Query(array('showposts' => 3, 'offset' => 2, 'category__in' => 1));
        while ($query->have_posts()) : $query->the_post();
        ?>

            <div class="col-lg mb-2">
                <a href="<?php the_permalink(); ?>" alt="<?php the_title_attribute(); ?>">
                    <article itemscope itemtype="http://schema.org/BlogPosting">
                        <?php the_post_thumbnail('full', ['alt' => get_the_title(), 'loading' => 'eager', 'class' => 'img-fluid']); ?>
                        <h1 itemprop="headline"><?php the_title_attribute(); ?></h1>
                        <link itemprop="url" href="<?php the_permalink(); ?>">
                    </article>
                </a>
            </div>

        <?php endwhile; ?>
    </div>
</div>