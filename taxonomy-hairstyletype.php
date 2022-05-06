<?php get_header(); ?>
<div class="container content">
    <main class="main">
        <header class="page-content__header hairstyles-header">
            <h1 class="page-content__title">
                <span class="page-content__subtitle">ヘアスタイルカタログ</span>
                <?php single_term_title(); ?>
            </h1>
        </header>
        <div class="hairstyle__lists">
            <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
                    <?php get_template_part('template-parts/loop', 'hairstyles'); ?>
            <?php endwhile;
            endif; ?>
        </div>
        <?php get_template_part('template-parts/parts', 'pagination'); ?>
    </main>
</div>
<?php get_footer(); ?>