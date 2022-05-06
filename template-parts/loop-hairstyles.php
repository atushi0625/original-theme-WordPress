<div class="hairstyle__list">
     <article id="post-<?php the_ID(); ?>" <?php post_class('module-Style_Item'); ?>>
          <a href="<?php the_permalink(); ?>" class="hairstyle__item-link">
               <figure class="hairstyle__img">
                    <?php if (has_post_thumbnail()) : ?>
                         <?php the_post_thumbnail('page_eyecatch'); ?>
                    <?php else : ?>
                         <img src="<?php echo esc_url(get_template_directory_uri()); ?>/dist/img/dummy-image.webp" alt="ハサミのダミー画像" width="400" height="400" load="lazy">
                    <?php endif; ?>
               </figure>
               <h2 class="hairstyle__item-title"><?php the_title(); ?></h2>
               <?php the_excerpt(); ?>
          </a>
     </article>
</div>