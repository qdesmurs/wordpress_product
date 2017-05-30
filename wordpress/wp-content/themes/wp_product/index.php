<?php /* Template name: Product */ ?>
<?php get_header() ?>
<main>
    <section>
    <?php


        $args = array('orderby'  => 'date',
                      'order'    => 'ASC',
                      'posts_per_page' => 12,);
        $posts = get_posts($args);

        foreach ($posts as $post) {
            setup_postdata($post);
            ?>
            <article>
            <p><?php the_content(); ?></p>
            <h5 class="price"><?php the_meta() ?></h5>
            </article>
            <?php
        }

    ?>
    </section>
</main>
<?php get_footer() ?>
