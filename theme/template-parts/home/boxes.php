<section id="boxes" class="bg-primary dark:bg-stone-800 py-14 ">
    <div class="container px-8 xl:px-0">
        <?php if (have_rows('boxes', 'option')): ?>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8 md:gap-3 xl:gap-22">
                <?php while (have_rows('boxes', 'option')):
                    the_row(); ?>

                    <?php
                    $colors = ['bg-(--no1-green)', 'bg-(--no1-yellow)', 'bg-(--no1-blue)'];
                    static $post_index = 0; // Keep track of the post index
                    $color_class = $colors[$post_index % count($colors)];
                    $post_index++;
                    ?>

                    <div class="relative">
                        <?php
                        $image = get_sub_field('home_box_image'); // Get image field

                        if ($image && is_array($image) && isset($image['url'])): ?>
                            <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt'] ?? ''); ?>" />
                        <?php endif; ?>

                        <?php

                        $link = get_sub_field('home_box_link');


                        if ($link): ?>
                            <a href="<?php echo esc_url($link); ?>"
                                class="<?php echo esc_attr($color_class); ?> absolute bottom-0 left-0 w-full px-5 py-2 flex justify-between items-center text-[30px] md:text-[18px] lg:text-[30px] font-bold text-white hover:px-12  transition-all duration-300">

                                <?php the_sub_field('home_box_title'); ?>
                                <span class="material-symbols-outlined !text-[32px] ml-1 !text-white">arrow_forward</span>
                            </a>
                        <?php endif; ?>

                        <!-- end box -->

                    </div>
                    <!-- end grid -->
                <?php endwhile; ?>
            <?php endif; ?>
            </div>
            <!-- end container -->
</section>