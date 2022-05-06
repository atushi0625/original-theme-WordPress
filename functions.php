<?php function original_theme_setup()
{
     add_theme_support('title-tag');
     add_theme_support('post-thumbnails'); //アイキャッチ画像有効化
     add_theme_support('custom-logo');
     add_theme_support('custom-header');
     add_theme_support('html5', array('search-form')); //検索フォームマークアップをHTML5に対応
     add_image_size('page_eyecatch', 1100, 610, true); //固定ページのアイキャッチ画像サイズ
     add_image_size('archive_thumbnail', 200, 150, true); //アーカイブページのアイキャッチ画像サイズ
     register_nav_menus(array(
          'main-menu' => 'メインメニュー',
          'footer-menu' => 'フッターメニュー'
     ));
}
add_action('after_setup_theme', 'original_theme_setup');

function original_enqueue_scripts()
{
     wp_enqueue_script('jquery');
     wp_enqueue_script(
          'original_theme_common',
          get_template_directory_uri() . '/dist/js/bundle.js',
          array(),
          '1.0.0',
          true
     );
     wp_enqueue_style(
          'googlefonts',
          'https://fonts.googleapis.com/css2?family=EB+Garamond:wght@400;500;600&family=Noto+Sans+JP:wght@300;400;500&display=swap',
          array(),
          '1.0.0'
     );

     wp_enqueue_style(
          'original_theme_styles',
          get_template_directory_uri() . '/dist/css/style.css',
          array(),
          '1.0.0'
     );
     wp_enqueue_style(
          'reset_css',
          'https://cdn.jsdelivr.net/npm/destyle.css@1.0.15/destyle.css',
          array(),
          '1.0.0'
     );
}
add_action('wp_enqueue_scripts', 'original_enqueue_scripts');

function original_widgets_init()
{
     //ここにウィジェットエリアの設定を追加
     register_sidebar(
          array(
               'name' => 'サイドバー',
               'id' => 'sidebar-widget-area', //is_active_sidebarとdynamic_sidebarの引数になる
               'description' => '投稿・固定ページのサイドバー',
               'before_widget' => '<div id="%1$s" class="%2$s">', //block-番号のIDとwidget_blockというclass名が入る
               'after_widget' => '</div>',
          )
     );
     //複数のウィジェットエリアを登録する
     register_sidebars(
          4, //ウィジェットエリア数指定
          array(
               'name' => 'フッター %d', //％dで連番を出力　「フッター１、フッター２、フッター３」
               'id' => 'footer-widget-area',
               'description' => 'フッターのサイドバー',
               'before_widget' => '<div id="%1$s" class="%2$s">',
               'after_widget' => '</div>',
          )
     );
}
add_action('widgets_init', 'original_widgets_init');

function original_block_setup()
{
     add_theme_support('wp-block-styles');
     add_theme_support('responsive-embeds');
     add_theme_support('align-wide');
     add_theme_support(
          //カラーパレット
          'editor-color-palette',
          array(
               array(
                    'name' => 'スカイブルー',
                    'slug' => 'skyblue',
                    'color' => '#00A1C6',
               ),
               array(
                    'name' => 'ライトスカイブルー',
                    'slug' => 'light-skyblue',
                    'color' => '#ecf5f7',
               ),
               array(
                    'name' => 'ライトグレー',
                    'slug' => 'light-gray',
                    'color' => '#f7f6f5',
               ),
               array(
                    'name' => 'グレー',
                    'slug' => 'gray',
                    'color' => '#767268',
               ),
               array(
                    'name' => 'ダークグレー',
                    'slug' => 'dark-gray',
                    'color' => '#43413B',
               ),
          )
     );
     //フォントサイズ
     add_theme_support(
          'editor-font-sizes',
          array(
               array(
                    'name' => '極小',
                    'size' => 14,
                    'slug' => 'x-smail',
               ),
               array(
                    'name' => '小',
                    'size' => 16,
                    'slug' => 'small',
               ),
               array(
                    'name' => '標準',
                    'size' => 18,
                    'slug' => 'normal',
               ),
               array(
                    'name' => '大',
                    'size' => 24,
                    'slug' => 'large',
               ),
               array(
                    'name' => '特大',
                    'size' => 36,
                    'slug' => 'huge',
               ),
          )
     );
     //ブロックエディター側にもスタイルを適用させる
     add_theme_support('editor-styles');
     add_editor_style('dist/css/style.css');
     add_editor_style('https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@500&display=swap');
}
add_action('after_setup_theme', 'original_block_setup');

function original_block_style_setup()
{
     register_block_style(
          'core/button',
          array(
               'name' => 'arrow',
               'label' => '矢印付き',
          )
     );
     register_block_style(
          'core/button',
          array(
               'name' => 'fixed',
               'label' => '幅固定',
          )
     );
}
add_action('after_setup_theme', 'original_block_style_setup');
