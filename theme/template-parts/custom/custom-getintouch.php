<?php

/**
 * Template part for displaying the footer content
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package _bless
 */

?>
<div class="get-in-touch">
    <h3 class="text-tertiary text-[24px] font-semibold pb-4 dark:text-primary">Get in touch</h3>
    <div class="get-in-touch-items">
        <div class="get-in-touch-line">
            <span class="material-symbols-outlined get-in-touch-icon">location_on</span>
            <p class="!leading-[1.2] md:!leading-[1.3]"><?php the_field('contact_address', 'option'); ?></p>
        </div>
        <div class="get-in-touch-line">
            <span class="material-symbols-outlined get-in-touch-icon">call</span>
            <p><?php $field_value = get_field('contact_phone_number', 'option'); // Replace with your actual field name

                if ($field_value) {
                    echo '(045) ' . esc_html($field_value);
                } ?></p>
        </div>
        <div class="get-in-touch-line">
            <span class="material-symbols-outlined get-in-touch-icon">mail</span>
            <a href="mailto: <?php the_field('contact_email', 'option'); ?>"
                class="hover:text-tertiary transition-all duration-300">
                <?php the_field('contact_email', 'option'); ?></a>
        </div>
        <div class="get-in-touch-line pb-0">
            <span class="material-symbols-outlined get-in-touch-icon">schedule</span>
            <p> <?php the_field('contact_working_hours', 'option'); ?></p>
        </div>
    </div>
</div>