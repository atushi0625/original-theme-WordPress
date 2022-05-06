<!-- 固定ページを表示するテンプレート        -->
<?php get_header(); ?>

<div class="container content">
    <div class="page-content">
        <div class="page-content__container">
            <main class="main">
                <?php if (have_posts()) : ?>
                    <?php
                    while (have_posts()) :
                        the_post();
                    ?>
                        <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                            <header class="page-content__header">
                                <h1 class="page-content__title">
                                    <?php the_title(); ?>
                                </h1>
                            </header>
                            <div class="page-content__body">
                                <div class="page-content__eyecatch">
                                    <?php the_post_thumbnail('page_eyecatch'); ?>
                                </div>
                                <?php the_content(); ?>
                            </div>
                        </article>
                    <?php endwhile; ?>
                <?php endif; ?>
            </main>
        </div>
        <?php get_sidebar(); ?>
    </div>
</div>
<?php get_footer(); ?>