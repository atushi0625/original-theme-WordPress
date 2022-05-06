<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
     <meta charset="<?php bloginfo('charset'); ?>">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta name="description" content="<?php bloginfo('description'); ?>">
     <link href="<?php echo esc_url(get_template_directory_uri()); ?>/dist/css/style.css" rel="stylesheet" media="all">
     <?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
     <?php wp_body_open(); ?>
     <div class="content-Wrap">
          <header role="banner" class="header">
               <h1 class="header__sitename">
                    <a href="<?php echo esc_url(home_url()); ?>" class="header__sitename-link">
                         <img src="<?php echo esc_url(get_template_directory_uri()); ?>/dist/img/header-logo-2.webp" alt="<?php bloginfo('name'); ?>">
                    </a>
                    <span class="header__tagline"><?php bloginfo('description'); ?></span>
               </h1>
               <nav class="header-nav">
                    <button type="button" class="hamburger" aria-controls="global-Nav" aria-expanded="false" aria-label="メニュー開閉">
                         <span class="hamburger_bar"></span>
                    </button>
                    <div class="header-nav__inner" id="global-Nav" aria-hidden="true">
                         <?php
                         wp_nav_menu(
                              array(
                                   'theme_location' => 'main-menu',
                                   'menu_class' => 'header-nav__items',
                                   'container' => false,
                              )
                         );
                         ?>
                         <?php get_search_form(); ?>
                    </div>
               </nav>
          </header>
          <?php if (!is_front_page()) : ?>
               <?php if (function_exists('bcn_display')) : ?>
                    <nav class="breadCrumb" typeof="BreadcrumbList" vocab="http://schema.org/" aria-label="現在のページ">
                         <?php bcn_display(); ?>
                    </nav>
               <?php endif; ?>
          <?php endif; ?>