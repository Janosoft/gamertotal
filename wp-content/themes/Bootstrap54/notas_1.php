<!-- notas_1 -->
<div class="container">
    <div class="row align-items-center noticias mb-4">

        <?php
        $query = new WP_Query(array('showposts' => 1, 'offset' => 0, 'category__in' => 1));
        while ($query->have_posts()) : $query->the_post();
        ?>

            <div class="col-lg-7 mb-4 mb-lg-0">
                <a href="<?php the_permalink(); ?>" alt="<?php the_title_attribute(); ?>">
                    <article itemscope itemtype="http://schema.org/BlogPosting">
                        <?php the_post_thumbnail('medium_large', ['title' => get_the_title(),'alt' => implode(', ', array_map(function($tag) { return $tag->name; }, get_the_tags())), 'loading' => 'eager', 'class' => 'img-fluid rounded-top-4 border border-white border-2 border-bottom-0 border-end-0']); ?>
                        <div class="rounded-bottom-4 border border-white border-2 border-top-0 border-bottom-0 border-end-0" style="background-color: rgba(0, 0, 26, 0.5)">
                            <h2 itemprop="headline" class="m-0 p-4 text-center"><?php the_title_attribute(); ?></h2>
                        </div>
                        <link itemprop="url" href="<?php the_permalink(); ?>">
                    </article>
                </a>
            </div>

        <?php endwhile; ?>

        <div class="col-lg-5">
            <div class="border border-2 p-3" style="border-color: rgba(228, 76, 91, 0.2) !important;">
                <?php
                $query = new WP_Query(array('showposts' => 3, 'offset' => 1, 'category__in' => 1));
                while ($query->have_posts()) : $query->the_post();
                ?>
                    <div class="mb-3" style="border-color: #E44C5B!important; border-width: 2px!important; border-style: solid; background: linear-gradient(to right, rgba(125, 19, 119, 0.5), rgba(16, 17, 38, 0.5));">
                        <article itemscope itemtype="http://schema.org/BlogPosting">
                            <a href="<?php the_permalink(); ?>" alt="<?php the_title_attribute(); ?>">
                                <div class="row">
                                    <div class="col-lg">
                                        <?php the_post_thumbnail('medium_large', ['title' => get_the_title(),'alt' => implode(', ', array_map(function($tag) { return $tag->name; }, get_the_tags())), 'loading' => 'eager', 'class' => 'img-fluid']); ?>
                                    </div>
                                    <div class="col-lg">
                                        <div class="d-flex align-items-center" style="height: 100%;">
                                            <h3 itemprop="headline"><?php the_title_attribute(); ?></h3>
                                        </div>
                                    </div>
                                    <link itemprop="url" href="<?php the_permalink(); ?>">
                                </div>
                            </a>
                        </article>
                    </div>
                <?php endwhile; ?>
            </div>
        </div>
    </div>
</div>