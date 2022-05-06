<!-- 全投稿表示するインデックスページ -->
<?php get_header(); ?>
<div class="container content">
     <div class="page-content">
          <div class="page-content__container">
               <main class="main">
                    <header class="page-content__header">
                         <h1 class="page-content__title">
                              <!-- the_title()タグはループ内で使うというルールがあるが、
                              ここはループの外なのでsingle_post_title()を使う -->
                              <?php single_post_title(); ?>
                         </h1>
                    </header>

                    <!-- 投稿した記事が全部出てくる -->
                    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                              <?php get_template_part('template-parts/loop', 'post'); ?>
                    <?php endwhile;
                    endif; ?>
                    <!-- ページネーション　1 ２　次 -->
                    <?php get_template_part('template-parts/parts', 'pagination'); ?>
               </main>
          </div>
          <?php get_sidebar(); ?>
     </div>
</div>
<?php get_footer(); ?>