<!-- 投稿アーカイブページ -->
<?php get_header(); ?>
<div class="container content">
    <div class="page-content">
        <div class="page-content__container">
            <main class="main">
                <header class="page-content__header">
                    <h1 class="page-content__title">
                        <?php if (is_month()) : ?>
                            <?php echo get_the_date('Y年n月'); ?>
                        <?php else : ?>
                            <?php single_term_title(); ?>
                        <?php endif; ?>
                    </h1>
                </header>

                <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                        <?php get_template_part('template-parts/loop', 'post'); ?>
                <?php endwhile;
                endif; ?>
                <?php get_template_part('template-parts/parts', 'pagination'); ?>
            </main>
        </div>
        <?php get_sidebar(); ?>
    </div>
</div>
<?php get_footer(); ?>