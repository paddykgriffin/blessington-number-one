<section id="hero" class="h-[90dvh] md:h-[55dvh] xl:h-[90dvh] grid relative">
    <div class="container text-center grid col-start-1 row-start-1 items-end z-20 px-8 lg:px-0">
        <h2 class="text-4xl lg:text-6xl xl:text-7xl 2xl:text-8xl text-white dark:text-white font-mono font-bold drop-shadow-xl"><?php the_field('hero_title', 'option'); ?></h2>
        <?php if (have_rows('boxes', 'option')): ?>
            <div class="grid text-center  items-center justify-center flex-col md:flex-none md:grid-flow-col gap-6">
                <?php while (have_rows('buttons', 'option')):
                    the_row(); ?>
                    <?php
                    $colors = ['bg-secondary text-white hover:bg-primary ', 'bg-white text-primary hover:bg-secondary   hover:text-white '];
                    static $post_index = 0; // Keep track of the post index
                    $color_class = $colors[$post_index % count($colors)];
                    $post_index++;
                    ?>
                    <?php
                    $link = get_sub_field('button_url');
                    if ($link): ?>
                        <a href="<?php echo esc_url($link); ?>"
                            class="<?php echo esc_attr($color_class); ?> btn max-w-[300px] ">
                            <?php the_sub_field('button_text'); ?>
                        </a>
                    <?php endif; ?>
                <?php endwhile; ?>
            </div>
        <?php endif; ?>
        <div class=" pb-14 flex flex-col">
            <p class="text-xs font-medium text-white pb-3">Scroll Down</p>
            <span class="material-symbols-outlined text-white !text-[40px] animate-bounce duration-500">
                mouse
            </span>
        </div>
    </div>
    <div class="bg-gray-800/75 w-full h-full z-10 absolute top-0 left-0"></div>
    <video autoplay muted loop class="w-full absolute object-cover top-0 left-0 z-0 h-full">
        <source src="<?php the_field('hero_video_link', 'option'); ?>" type="<?php echo esc_attr($video['mime_type']); ?>">
        Your browser does not support the video tag.
    </video>


</section>