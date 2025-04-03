<section id="admissions" class="bg-(--no1-grey) py-8 md:py-6 dark:bg-black">
    <div class="container px-8 md:px-0">
        <div class="flex items-center justify-center gap-4 flex-col md:flex-row">
            <h3 class="text-[28px] md:text-[42px] font-light dark:text-white"> <?php
                                                                                $text = get_field('admissions_text', 'option');
                                                                                echo wrap_last_word($text, "font-semibold"); ?></h3>
            <a href="<?php the_field('admissions_link', 'option'); ?>"
                class="btn default-transition"><?php the_field('admissions_button_text', 'option'); ?></a>
        </div>
    </div>
</section>