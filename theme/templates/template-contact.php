<?php

/**
 * Template Name: Contact Template 
 * Description: Wth sidebar for a custom menu
 * @package _bless
 */

get_header();
?>

<div id="page" class="contact-page py-8 lg:py-16">

    <div class="container mx-auto px-4 py-8">


        <div class="max-w-content mx-auto text-center">
            <?php
            /* Start the Loop */
            while (have_posts()) :
                the_post();

                get_template_part('template-parts/content/content', 'page');


                // If comments are open, or we have at least one comment, load
                // the comment template.
                if (comments_open() || get_comments_number()) {
                    comments_template();
                }

            endwhile; // End of the loop.
            ?>

            <div class="bg-(--no1-light-grey) grid grid-cols-2 items-start p-8 dark:bg-stone-800 md:mt-12">
                <?php if (is_active_sidebar('sidebar-contact')) : ?>
                    <aside class="" role="complementary" aria-label="<?php esc_attr_e('Footer', '_tw'); ?>">
                        <?php dynamic_sidebar('sidebar-contact'); ?>
                    </aside>
                <?php endif; ?>

                <?php get_template_part('template-parts/layout/footer', 'touch'); ?>

            </div>

        </div>



    </div>
</div>



</div>


<?php
get_footer();
