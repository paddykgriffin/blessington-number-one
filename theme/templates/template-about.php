<?php

/**
 * Template Name: About Template 
 * Description: Wth sidebar for a custom menu
 * @package _bless
 */

get_header();
?>
<?php custom_breadcrumbs(); ?>
<div id="page" class="content-page py-8 lg:py-16">



    <div class="container mx-auto px-8 py-8">

        <div class="grid md:grid-cols-12 md:gap-16 lg:gap-0">
            <div class="md:col-span-8">
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

                <?php if (have_rows('school_polices',)): ?>
                    <ul class="policy-list list-disc pl-4">
                        <?php while (have_rows('school_polices',)):
                            the_row(); ?>

                            <?php $link = get_sub_field('policy_url');

                            if ($link): ?>
                                <li class="py-2">
                                    <a href="<?php echo esc_url($link); ?>"
                                        class="<?php echo esc_attr($color_class); ?> text-primary dark:text-primary hover:text-(--no1-green) dark:hover:text-(--no1-yellow) transition-all duration-300" target="_blank">

                                        <?php the_sub_field('policy_name'); ?>

                                    </a>
                                </li>
                            <?php endif; ?>

                        <?php endwhile; ?>
                    </ul>
                <?php endif; ?>


                <?php if (have_rows('staff_members',)): ?>
                    <div class="grid max-w-[24rem] py-6">
                        <?php while (have_rows('staff_members',)):
                            the_row(); ?>
                            <div class="grid grid-cols-2 items-center py-2">

                                <h4 class="font-semibold text-xl text-secondary">
                                    <?php the_sub_field('class_teacher'); ?>:

                                </h4>
                                <div>

                                    <?php the_sub_field('teacher_name'); ?>
                                </div>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php endif; ?>
            </div>

            <?php if (is_active_sidebar('sidebar-about')) : ?>
                <aside class="md:col-start-10 md:col-span-3 pt-8" role="complementary" aria-label="<?php esc_attr_e('Footer', '_tw'); ?>">
                    <?php dynamic_sidebar('sidebar-about'); ?>
                </aside>
            <?php endif; ?>
        </div>
    </div>



</div>


<?php
get_footer();
