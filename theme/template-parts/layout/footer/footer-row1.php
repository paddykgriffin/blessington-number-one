<div class="bg-primary dark:bg-stone-900 py-8 md:py-12">
    <div class="container grid gap-6 lg:gap-4 md:grid-cols-12 items-center px-8 xl:px-0">

        <div class="md:col-span-5 lg:col-span-4 xl:col-span-3 order-1 ">
            <h3 class="text-tertiary text-[24px] font-semibold pb-4 dark:text-primary">Quick links</h3>
            <div class="grid grid-cols-2 lg:gap-4 pb-8 lg:pb-0">
                <?php if (has_nav_menu('menu-2')): ?>
                    <nav aria-label="<?php esc_attr_e('Footer Col 1 Menu', '_bless'); ?>" class="text-white">
                        <?php
                        wp_nav_menu(
                            array(
                                'theme_location' => 'menu-2',
                                'menu_class' => 'footer-menu',
                                'depth' => 1,
                            )
                        );
                        ?>
                    </nav>
                <?php endif; ?>
                <?php if (has_nav_menu('menu-3')): ?>
                    <nav aria-label="<?php esc_attr_e('Footer Col 2 Menu', '_bless'); ?>" class="text-white">
                        <?php
                        wp_nav_menu(
                            array(
                                'theme_location' => 'menu-3',
                                'menu_class' => 'footer-menu',
                                'depth' => 1,
                            )
                        );
                        ?>
                    </nav>
                <?php endif; ?>
            </div>
        </div>

        <div class="md:col-span-2 lg:col-span-4 xl:col-span-6 text-center mx-auto order-3 md:order-2">
            <img src="<?php bloginfo('template_directory'); ?>/img/logo.png" alt="<?php bloginfo('name'); ?>" class="w-28 md:w-36 lg:w-auto" />
        </div>

        <div class="md:col-span-5 lg:col-span-4 xl:col-span-3 order-2 md:order-3">
            <div class="pb-8 md:pb-0 md:pl-8 lg:pl-0 ">
                <?php get_template_part('template-parts/custom/custom', 'getintouch'); ?>
            </div>
        </div>
    </div>
</div>