 <article id="post-item-<?php the_ID(); ?>" class="post-wrapper md:rounded-tr-none md:rounded-bl-2xl">
     <div class="entry-thumbnail">
         <?php _bless_post_thumbnail(); ?>
     </div>
     <div class="entry-content px-4 py-9 dark:bg-stone-900 md:rounded-tr-none ">
         <header class="entry-header md:px-4 xl:px-0 pb-3">
             <div class="entry-meta pb-4 ">
                 <?php /* _bless_entry_meta(); */ ?>
                 <?php _bless_categories(); ?>
                 <?php _bless_tags(); ?>
                 <?php _bless_posted_by(); ?>
             </div>
             <!-- .entry-meta -->

             <?php
                if (is_sticky() && is_home() && !is_paged()) {
                    printf('<span">%s</span>', esc_html_x('Featured', 'post', '_bless'));
                }
                if (is_singular()):
                    the_title(sprintf('<h2 class="post-title default-transition"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>');
                else:
                    the_title(sprintf('<h2 class="post-title default-transition"><a href="%s" rel="bookmark">', esc_url(get_permalink())), '</a></h2>');
                endif;
                ?>


         </header>
         <!-- .entry-header -->

         <div <?php _bless_content_class('entry-content pb-4 '); ?>>
             <?php echo get_the_excerpt();
                wp_link_pages(
                    array(
                        'before' => '<div>' . __('Pages:', '_bless'),
                        'after' => '</div>',
                    )
                ); ?>
         </div>
         <!-- .entry-content -->
         <footer class="entry-footer">
             <div class="entry-meta">
                 <?php _bless_entry_footer(); ?>
             </div>
         </footer>
         <!-- .entry-footer -->
     </div>
 </article>