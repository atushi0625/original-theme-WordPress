<!-- 個別投稿記事ページ -->
<?php get_header(); ?>
<div class="container content">
    <div class="page-content">
        <div class="page-content__container">
            <main class="main">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <header class="page-content__header">
                                <h1 class="page-content__title">
                                    <?php the_title(); ?>
                                </h1>
                                <div class="content-meta">
                                    <!-- 現在開いているカテゴリータグ名を表示 -->
                                    <?php the_category(','); ?>
                                    <!-- 投稿した日付を表示 -->
                                    <?php
                                    $post_year = get_the_date('Y');
                                    $post_month = get_the_date('m');
                                    ?>

                                    <a href="<?php echo get_month_link($post_year, $post_month); ?>" class="content-meta__date">
                                        <time datetime="<?php echo get_the_date('Y-m-d'); ?>"><?php echo get_the_date(); ?></time>
                                    </a>
                                </div>
                            </header>
                            <div class="page-content__body">
                                <?php if (has_post_thumbnail()) : ?>
                                    <div class="page-content__eyecatch">
                                        <?php the_post_thumbnail('page_eyecatch'); ?>
                                    </div>
                                <?php endif; ?>
                                <?php the_content(); ?>
                            </div>
                            <footer class="content-footer">
                                <!-- タグを表示する -->
                                <?php the_tags('<ul class="content-footer__tags" aria-label="タグ"><li>', '</li><li>', '</li></ul>'); ?>

                                <!-- ページネーション　前後の記事を表示 -->
                                <nav class="content-nav" aria-label="前後の記事">
                                    <div class="content-nav_prev">
                                        <?php previous_post_link('&lt; %link'); ?>
                                    </div>
                                    <div class="content-nav_next">
                                        <?php next_post_link('%link &gt;'); ?>
                                    </div>
                                </nav>
                            </footer>
                        </article>
                <?php endwhile;
                endif; ?>
            </main>
        </div>
        <?php get_sidebar(); ?>
    </div>
</div>
<?php get_footer(); ?>