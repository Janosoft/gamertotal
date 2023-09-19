<!-- notas_4 -->
<div class="container">
    <div class="row noticias">

        <?php
        $query = new WP_Query(array('showposts' => 3, 'offset' => 10, 'category__in' => 1));
        while ($query->have_posts()) : $query->the_post();
        ?>

            <div class="col-lg mb-2">
                <a href="<?php the_permalink(); ?>" alt="<?php the_title_attribute(); ?>">
                    <article itemscope itemtype="http://schema.org/BlogPosting">
                        <?php the_post_thumbnail('medium_large', ['title' => get_the_title(),'alt' => implode(', ', array_map(function($tag) { return $tag->name; }, get_the_tags())), 'loading' => 'lazy', 'decoding' => 'async', 'class' => 'img-fluid rounded-top-4']); ?>
                        <div class="rounded-bottom-4 " style="background-image: linear-gradient(to bottom, rgba(0, 0, 26, 0.5), rgba(0, 0, 26, 0.3), rgba(0, 0, 26, 0.1));">
                            <h3 itemprop="headline" class="m-0 p-4"><?php the_title_attribute(); ?></h3>
                        </div>
                        <link itemprop="url" href="<?php the_permalink(); ?>">
                    </article>
                </a>
            </div>

        <?php endwhile; ?>
    </div>
</div>