<?php get_header(); ?>
<div class="container content">
    <div class="page-content">
        <div class="page-content__container">
            <main class="main">
                <article>
                    <header class="page-content__header">
                        <h1 class="page-content__title">
                            ページが見つかりません
                        </h1>
                    </header>
                    <div class="page-content__body">
                        <p>お探しのページは、移動もしくは削除された可能性があります。<br>
                            サイト内検索、もしくは<a href="<?php echo esc_url(home_url()); ?>">トップページ</a>よりお探しください。</p>
                        <?php get_search_form(); ?>
                    </div>
                </article>
            </main>
        </div>
        <?php get_sidebar(); ?>
    </div>
</div>
<?php get_footer(); ?>