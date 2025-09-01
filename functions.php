<?php
// セキュリティ: 直接アクセスを防ぐ
if (!defined('ABSPATH')) {
    exit;
}

// テーマサポートの有効化
function theme_setup()
{
    // タイトルタグのサポート
    add_theme_support('title-tag');

    // アイキャッチ画像のサポート
    add_theme_support('post-thumbnails');

    // HTMLの自動整形
    add_theme_support('html5', array(
        'comment-list',
        'comment-form',
        'search-form',
        'gallery',
        'caption',
        'style',
        'script'
    ));

    // RSS フィードリンクのサポート
    add_theme_support('automatic-feed-links');

    // カスタムロゴのサポート
    add_theme_support('custom-logo');

    // レスポンシブ埋め込みのサポート
    add_theme_support('responsive-embeds');
}
add_action('after_setup_theme', 'theme_setup');

// CSS・JavaScriptの読み込み
function enqueue_theme_assets()
{
    // テーマのCSS
    wp_enqueue_style(
        'theme-style',
        get_stylesheet_uri(),
        array(),
        wp_get_theme()->get('Version')
    );

    // swiper.css
    wp_enqueue_style(
        'swiper-style',
        'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css',
        array(),
        wp_get_theme()->get('Version')
    );

    // jQuery（WordPressに含まれているもの）
    wp_enqueue_script('jquery');

    // gsap.js
    wp_enqueue_script(
        'gsap-script',
        'https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/gsap.min.js',
        array('jquery'),
        wp_get_theme()->get('Version'),
        true
    );
    wp_enqueue_script(
        'gsap-scrolltrigger-script',
        'https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/ScrollTrigger.min.js',
        array('jquery'),
        wp_get_theme()->get('Version'),
        true
    );
    wp_enqueue_script(
        'gsap-splittext-script',
        'https://cdn.jsdelivr.net/npm/gsap@3.13.0/dist/SplitText.min.js',
        array('jquery'),
        wp_get_theme()->get('Version'),
        true
    );

    // Swiper.js
    wp_enqueue_script(
        'swiper-script',
        'https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js',
        array('jquery'),
        wp_get_theme()->get('Version'),
        true
    );

    // カスタムスクリプト
    wp_enqueue_script(
        'custom-script',
        get_template_directory_uri() . '/assets/js/main.js',
        array('jquery'),
        wp_get_theme()->get('Version'),
        true
    );
}
add_action('wp_enqueue_scripts', 'enqueue_theme_assets');

// セキュリティ強化: WordPress バージョン情報を非表示
remove_action('wp_head', 'wp_generator');

// 管理バーのカスタマイズ（フロントエンドで非表示にする場合）
add_filter('show_admin_bar', '__return_false');

// メニューのサポート
function register_theme_menus()
{
    register_nav_menus(array(
        'primary' => 'ヘッダーナビゲーション',
        'footer' => 'フッターナビゲーション',
        'hamburger' => 'ハンバーガーナビゲーション',
    ));
}
add_action('init', 'register_theme_menus');

// wp_nav_menuのliにclass追加
function add_additional_class_on_li($classes, $item, $args)
{
    if (isset($args->add_li_class)) {
        $classes['class'] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

// wp_nav_menuのaにclass追加
function add_additional_class_on_a($classes, $item, $args)
{
    if (isset($args->add_li_class)) {
        $classes['class'] = $args->add_a_class;
    }
    return $classes;
}
add_filter('nav_menu_link_attributes', 'add_additional_class_on_a', 1, 3);



// 投稿の抜粋文字数をカスタマイズ
function custom_excerpt_length($length)
{
    return 100; // 文字数を指定
}
add_filter('excerpt_length', 'custom_excerpt_length');

// 抜粋の省略記号をカスタマイズ
function custom_excerpt_more($more)
{
    return '...';
}
add_filter('excerpt_more', 'custom_excerpt_more');

// ページネーション機能
function theme_pagination()
{
    global $wp_query;

    $big = 999999999;

    $paginate_links = paginate_links(array(
        'base' => str_replace($big, '%#%', esc_url(get_pagenum_link($big))),
        'format' => '?paged=%#%',
        'current' => max(1, get_query_var('paged')),
        'total' => $wp_query->max_num_pages,
        'prev_text' => '&laquo; 前へ',
        'next_text' => '次へ &raquo;',
        'mid_size' => 2,
        'end_size' => 1,
    ));

    if ($paginate_links) {
        echo '<nav class="pagination">' . $paginate_links . '</nav>';
    }
}

// ファイルアップロードのセキュリティ強化
function restrict_file_uploads($file)
{
    $allowed_types = array('jpg', 'jpeg', 'png', 'gif', 'pdf', 'doc', 'docx');
    $file_ext = pathinfo($file['name'], PATHINFO_EXTENSION);

    if (!in_array(strtolower($file_ext), $allowed_types)) {
        $file['error'] = 'このファイル形式はアップロードできません。';
    }

    return $file;
}
add_filter('wp_handle_upload_prefilter', 'restrict_file_uploads');

//  カスタム投稿タイプを追加 
function create_post_type()
{
    register_post_type(
        'news',
        array(
            'label' => 'お知らせ',
            'public' => true,
            'has_archive' => true,
            'show_in_rest' => true,
            'menu_position' => 5,
            'supports' => array(
                'title',
                'editor',
                'thumbnail',
                'revisions',
            ),
        )
    );

    register_taxonomy(
        'news-cat',
        'news',
        array(
            'label' => 'お知らせのカテゴリー',
            'hierarchical' => true,
            'public' => true,
            'show_in_rest' => true,
        )
    );

    register_taxonomy(
        'news-tag',
        'news',
        array(
            'label' => 'お知らせのタグ',
            'hierarchical' => false,
            'public' => true,
            'show_in_rest' => true,
            'update_count_callback' => '_update_post_term_count',
        )
    );
}
add_action('init', 'create_post_type');

// 記事の自動整形を無効化
/* remove_filter('the_content', 'wpautop'); */
