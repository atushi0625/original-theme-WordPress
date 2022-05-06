<?php get_header(); ?>

<main class="main">
     <div class="container">
          <?php
          if (have_posts()) {
               while (have_posts()) {
                    the_post();
                    the_content();
               }
          }
          ?>
          <section class="news">
               <h2 class="section-title">News &amp; Topics<span>お知らせ</span></h2>
               <div class="news__container">
                    <div class="col-lg-10">
                         <?php
                         $neko_args       = array(
                              'post_type'      => 'post',
                              'posts_per_page' => 3,
                         );
                         $neko_news_query = new WP_Query($neko_args);
                         if ($neko_news_query->have_posts()) :
                         ?>
                              <?php
                              while ($neko_news_query->have_posts()) :
                                   $neko_news_query->the_post();
                              ?>
                                   <?php get_template_part('template-parts/loop', 'post'); ?>
                              <?php
                              endwhile;
                              wp_reset_postdata();
                              ?>
                         <?php endif; ?>
                    </div>
               </div>
               <div class="btn">
                    <a href="<?php echo esc_url(home_url('news')); ?>"><span>View More</span></a>
               </div>
          </section>
          <section class="hairstyle">
               <div class="hairstyle__container">
                    <h2 class="section-title">Hairstyles<span>ヘアスタイル</span></h2>
                    <div class="hairstyle__lists">
                         <?php
                         $neko_args             = array(
                              'post_type'      => 'hairstyles',
                              'posts_per_page' => 4,
                         );
                         $neko_hairstyles_query = new WP_Query($neko_args);
                         if ($neko_hairstyles_query->have_posts()) :
                         ?>
                              <?php
                              while ($neko_hairstyles_query->have_posts()) :
                                   $neko_hairstyles_query->the_post();
                              ?>
                                   <div class="hairstyle__list">
                                        <div id="post-<?php the_ID(); ?>" <?php post_class('module-Style_Item'); ?>>
                                             <a href="<?php the_permalink(); ?>" class="hairstyle__link" title="<?php the_title(); ?>">
                                                  <figure class="hairstyle__img">
                                                       <!-- 現在の投稿もしくは固定ページにアイキャッチ画像が登録されているかチェックする -->
                                                       <?php if (has_post_thumbnail()) : ?>
                                                            <!-- 投稿または固定ページのアイキャッチ画像を出力する（ループ内で使用する） -->
                                                            <?php the_post_thumbnail('page_eyecatch'); ?>
                                                       <?php else : ?>
                                                            <img src="<?php echo esc_url(get_template_directory_uri()); ?>/assets/img/dummy-image_lg.png" alt="" width="400" height="400" load="lazy">
                                                       <?php endif; ?>
                                                  </figure>
                                             </a>
                                        </div>
                                   </div>
                              <?php
                              endwhile;
                              wp_reset_postdata();
                              ?>
                         <?php endif; ?>

                    </div>
                    <div class="btn">
                         <a href="<?php echo esc_url(home_url('hairstyles')); ?>"><span>View More</span></a>
                    </div>
               </div>
          </section>

          <section class="shop-information">
               <div class="shop-information__container">
                    <h2 class="section-title">Shop Information<span>店舗案内</span></h2>
                    <dl class="shop-information__detail">
                         <div class="shop-information-list">
                              <dt>住所</dt>
                              <dd>〒000-0000 □□県〇〇市△△区☆☆町000</dd>
                         </div>
                         <div class="shop-information-list">
                              <dt>Tel</dt>
                              <dd>000-000-0000</dd>
                         </div>
                         <div class="shop-information-list">
                              <dt>営業時間</dt>
                              <dd>平日 10:00〜19:00 / 土・日 9:00〜19:00</dd>
                         </div>
                         <div class="shop-information-list">
                              <dt>休業日</dt>
                              <dd>毎週月曜・第2 &amp; 第4火曜日</dd>
                         </div>
                    </dl>
                    <div class="btn">
                         <a href=""><span>オンライン予約</span></a>
                    </div>
               </div>
          </section>


     </div>
</main>
<?php get_footer(); ?>