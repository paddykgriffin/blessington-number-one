<section class="bg-(--no1-grey) py-6 dark:bg-[#121212]" id="admissions">
    <div class="container">
        <div class="flex items-center justify-center gap-4">
            <h3 class="text-[42px] font-light"> <?php
            $text = get_field('admissions_text', 'option');
            echo wrap_last_word($text, "font-semibold"); ?></h3>
            <a href="<?php the_field('admissions_link', 'option'); ?>"
                class="btn"><?php the_field('admissions_button_text', 'option'); ?></a>
        </div>
    </div>
</section>