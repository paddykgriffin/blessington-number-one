<div class="bg-primary py-12">
    <div class="container grid gap-4 grid-cols-12">

        <div class="col-span-3 ">
            <h3 class="text-tertiary text-[24px] font-semibold pb-4">Quick links</h3>
            <div class="grid grid-cols-2 gap-4">
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
                                'menu_item_class' => 'text-white',
                            )
                        );
                        ?>
                    </nav>
                <?php endif; ?>
            </div>
        </div>

        <div class="col-span-6 text-center mx-auto">
            <?php if (is_active_sidebar('sidebar-1')): ?>
                <?php dynamic_sidebar('sidebar-1'); ?>
            <?php endif; ?>
        </div>

        <div class="col-span-3">


            <h3 class="text-tertiary text-[24px] font-semibold pb-4">Get in touch</h3>

            <div class="flex text-white font-light">
                <span class="material-symbols-outlined pr-4">&#xe8b5;</span>
                <?php the_field('contact_address', 'option'); ?>
            </div>

            <div class="flex text-white font-light">
                <span class="material-symbols-outlined  pr-4">&#xe8b5;</span>
                <?php the_field('contact_phone_number', 'option'); ?>
            </div>

            <div class="flex text-white font-light">
                <span class="material-symbols-outlined  pr-4">&#xe8b5;</span>
                <a href="mailto: <?php the_field('contact_email', 'option'); ?>"
                    class="hover:text-tertiary transition-all duration-300">
                    <?php the_field('contact_email', 'option'); ?></a>
            </div>

            <div class="flex text-white font-light">
                <span class="material-symbols-outlined  pr-4">&#xe8b5;</span>
                <?php the_field('contact_working_hours', 'option'); ?>
            </div>
        </div>

    </div>
</div>