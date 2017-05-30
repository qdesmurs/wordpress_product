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
            <?php if ( has_post_thumbnail() ) {
                the_post_thumbnail();
            }  ?>
            <article>
            <h1><?php the_title(); ?></h1>
            <p><?php the_content(); ?></p>


            <h5><?php echo get_post_meta($post->ID ,'Date', true ); ?></h5>

            <?php
            if (isset($_POST["mail"])) {
                $wpdb->insert(
                    'wp_email',
                    array(
                        'email' =>  $_POST["mail"],
                        'name' => $_POST["name"],
                        'type' => $_POST["type"]
                    )
                );
                ?>
                <h6><?php echo get_post_meta($post->ID ,'Confirmation', true ); ?></h6>
                <?php
            }
            echo '<form class="formail" action="" method="post">';
            echo '<input type="text" name="name" value="" placeholder="veuillez entrer vos noms">';
            echo '<input type="email" name="mail" value="" placeholder="veuillez entrer votre mail">';
            echo '<input class="radio" type="radio" name="type" value="html">Html';
            echo '<input class="radio" type="radio" name="type" value="text">Text';
            echo '<input class="beerbutton" type="submit" name="form" value="envoyer">';
            echo '</form>';
            ?>
            </article>
            <?php
        }

    ?>
    </section>


</main>
<?php get_footer() ?>
