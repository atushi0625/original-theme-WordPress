<!-- ヘアスタイルページの個別ページ -->

<?php get_header(); ?>
<div class="container content">
    <div class="page-content">
        <div class="page-content__container">
            <main class="main">
                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>

                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <header class="page-content__header">
                                <h1 class="page-content__title">
                                    <span class="page-content__subtitle">ヘアスタイルカタログ</span>
                                    <?php the_title(); ?>
                                </h1>
                                <div class="content-meta">
                                    <?php the_terms(get_the_ID(), 'hairstyletype'); ?>
                                </div>
                            </header>
                            <div class="page-content__body">
                                <?php if (has_post_thumbnail()) : ?>
                                    <figure class="hairStyle-Img">
                                        <?php the_post_thumbnail('page_eyecatch'); ?>
                                    </figure>
                                <?php endif; ?>
                                <div class="hairStyle-Description">
                                    <?php the_content(); ?>
                                </div>
                            </div>
                            <footer class="content-footer">
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
        <?php get_sidebar('hairstyles'); ?>
    </div>
</div>
<?php get_footer(); ?>