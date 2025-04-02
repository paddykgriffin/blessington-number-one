<?php

/**
 * Template Name: Two Column
 * @package _bless
 */

get_header();

// Function to get the top-level parent page slug
function get_top_parent_slug($post)
{
    if ($post->post_parent) {
        $ancestors = get_post_ancestors($post->ID);
        $root = count($ancestors) - 1;
        $parent = get_post($ancestors[$root]);
        return $parent->post_name;
    }
    return $post->post_name;
}

$slug = get_top_parent_slug(get_post());

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
                <?php get_template_part('template-parts/custom/custom', 'polices'); ?>
                <?php get_template_part('template-parts/custom/custom', 'staff'); ?>
            </div>
            <!-- .left-col -->

            <aside class="lg:col-start-10 md:col-span-4 lg:col-span-3 pt-8 sidebar" role="complementary" aria-label="<?php esc_attr_e('Sidebar', '_tw'); ?>">
                <?php
                // Load different sidebar based on top-level parent slug
                if ($slug == 'about') {
                    get_sidebar('about'); // sidebar-about.php
                } elseif ($slug == 'parents') {
                    get_sidebar('parents'); // sidebar-parents.php
                } else {
                    get_sidebar(); // Default sidebar.php
                    get_template_part('sidebar', 'about');
                }
                ?>
            </aside>
            <!-- .sidebar -->
        </div>
        <!-- .grid -->
    </div>
    <!-- .container -->
</div>
<!-- #page -->

<?php
get_footer();
