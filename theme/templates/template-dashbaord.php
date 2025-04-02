<?php

/**
 * Template Name: Dashboard

 * @package _bless
 */

get_header('dashboard');
?>

<div id="page" class="p-8 min-h-[400px]">

    <?php
    /* Start the Loop */
    while (have_posts()) :
        the_post();

        get_template_part('template-parts/dashboard/content', 'dashboard');


        // If comments are open, or we have at least one comment, load
        // the comment template.
        if (comments_open() || get_comments_number()) {
            comments_template();
        }

    endwhile; // End of the loop.
    ?>

</div>