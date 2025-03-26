<div class="bg-primary py-12">
    <div class="container grid gap-4 grid-cols-12 items-center">

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
                            )
                        );
                        ?>
                    </nav>
                <?php endif; ?>
            </div>
        </div>

        <div class="col-span-6 text-center mx-auto">
            <!-- <?php if (is_active_sidebar('sidebar-1')): ?>
                <?php dynamic_sidebar('sidebar-1'); ?>
            <?php endif; ?> -->
            <img src="<?php bloginfo('template_directory'); ?>/img/logo.png" alt="<?php bloginfo('name'); ?>" />
					
        </div>

        <div class="col-span-3">
            <?php get_template_part('template-parts/layout/footer', 'touch'); ?>
        </div>
    </div>
</div>