<?php

/**
 * Template Name: Contact
 * Description: Wth sidebar for a custom menu
 * @package _bless
 */

get_header();
?>
<?php custom_breadcrumbs(); ?>
<div id="page" class="contact-page py-8 lg:py-16">
    <div class="container mx-auto px-8 py-8 text-center">
        <div class="grid xl:grid-cols-12 md:gap-16 lg:gap-0">
            <div class="md:col-span-12">
                <?php
                /* Start the Loop */
                while (have_posts()) :
                    the_post();

                    get_template_part('template-parts/content/content', 'contact');


                    // If comments are open, or we have at least one comment, load
                    // the comment template.
                    if (comments_open() || get_comments_number()) {
                        comments_template();
                    }

                endwhile; // End of the loop.
                ?>


                <div class="md:grid md:grid-cols-12 md:gap-8 pb-12 justify-center md:pt-8">
                    <div class="md:col-span-6 xl:col-span-5">
                        <?php if (is_active_sidebar('sidebar-contact')) : ?>
                            <div class="bg-gray-100 px-4 py-6 rounded-2xl dark:bg-stone-900">
                                <h3 class="md:text-left">Send us a message</h3>
                                <?php dynamic_sidebar('sidebar-contact'); ?>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="md:col-span-6 xl:col-span-6 xl:col-start-7">
                        <div class="py-12 md:py-0">
                            <?php get_template_part('template-parts/layout/footer/footer', 'touch'); ?>
                        </div>
                        <div class="">
                            <?php get_template_part('template-parts/custom/custom', 'map'); ?>
                        </div>

                    </div>



                </div>
                <!-- .grid -->





            </div>
            <!-- page content -->

        </div>
        <!-- .grid -->
    </div>
    <!-- .container -->
</div>
<!-- #page -->





<?php
get_footer();
