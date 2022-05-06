<?php get_header(); ?>
<div class="container content">
    <div class="page-content">
        <div class="page-content__container">
            <main class="main">
                <header class="page-content__header">
                    <h1 class="page-content__title">
                        検索結果
                    </h1>
                </header>
                <?php if (have_posts()) : ?>
                    <p class="search-ResultNum">「<?php the_search_query(); ?>」の検索結果</p>
                    <?php while (have_posts()) : the_post(); ?>
                        <?php get_template_part('template-parts/loop', 'post'); ?>
                    <?php endwhile; ?>
                    <?php get_template_part('template-parts/parts', 'pagination'); ?>
                <?php else : ?>
                    <p class="search-NoResult">検索に一致するものは見つかりませんでした。他のキーワードで再度お試しください。</p>
                    <?php get_search_form(); ?>
                <?php endif; ?>
            </main>
        </div>
        <?php get_sidebar(); ?>
    </div>
</div>
<?php get_footer(); ?>