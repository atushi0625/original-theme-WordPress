<article id="post-<?php the_ID(); ?>" <?php post_class('article-item'); ?>>
     <a href="<?php the_permalink(); ?>" class="article-item__link">
          <div class="article-item__img">
               <?php if (has_post_thumbnail()) : ?>
                    <?php the_post_thumbnail('archive_thumbnail'); ?>
               <?php else : ?>
                    <img src="<?php echo esc_url(get_template_directory_uri()); ?>/dist/img/dummy-image.webp" alt="" width="200" height="150" load="lazy">
               <?php endif; ?>
          </div>
          <div class="article-item__body">
               <h2 class="article-item__title"><?php the_title(); ?></h2>
               <p class="article-item__text"><?php echo esc_html(get_the_excerpt()); ?></p>
               <ul class="article-item__meta">
                    <?php
                    $category_list = get_the_category();
                    if ($category_list) :
                    ?>
                         <li class="article-item__category">
                              <?php echo esc_html($category_list[0]->name); ?>
                         </li>
                    <?php endif; ?>
                    <li class="article-item__date"><time datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php echo get_the_date(); ?></time></li>
               </ul>
          </div>
     </a>
</article>