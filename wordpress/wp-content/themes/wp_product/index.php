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
            <h1><?php the_title(); ?></h1>
            <p><?php the_content(); ?></p>
            <h5 class="price"><?php the_meta() ?></h5>
            </article>
            <?php
        }

    ?>
    </section>

            <?php
        if (isset($_POST["mail"])) {
            echo "<p> yolo </p>";
            $wpdb->insert(
            'wp_email',
            array(
                'email' =>  $_POST["mail"],
                'name' => $_POST["name"]
            )
        );
        }
            echo '<form class="formail" action="" method="post">';
            echo '<input type="text" name="name" value="" placeholder="veuillez entrer vos noms">';
            echo '<input type="email" name="mail" value="" placeholder="veuillez entrer votre mail">';
            echo '<input type="submit" name="form" value="envoyer">';
            echo '</form>';
         ?>

</main>
<?php get_footer() ?>
