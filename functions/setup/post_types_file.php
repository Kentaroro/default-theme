<?php
/**
 * Custom Post Types Registration
 * 
 * カスタム投稿タイプの登録を行います。
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * カスタム投稿タイプを登録
 */
function create_post_type()
{
    // お知らせ【英語】
    register_post_type(
        'news-en',
        array(
            'label' => 'お知らせ【英語】',
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
            'rewrite' => array(
                'slug' => 'news',
                'with_front' => false,
            ),
        )
    );

    // お知らせ【日本語】
    register_post_type(
        'news-ja',
        array(
            'label' => 'お知らせ【日本】',
            'public' => true,
            'has_archive' => true,
            'show_in_rest' => true,
            'menu_position' => 6,
            'supports' => array(
                'title',
                'editor',
                'thumbnail',
                'revisions',
            ),
            'rewrite' => array(
                'slug' => 'ja/news',
                'with_front' => false,
            ),
        )
    );
}
add_action('init', 'create_post_type');

/**
 * カスタム投稿タイプの表示件数を変更
 * 必要に応じてコメントアウトを解除してください
 */
/*
function custom_posts_per_page($query)
{
    if (!is_admin() && $query->is_main_query()) {
        if (is_post_type_archive('news-en') || is_post_type_archive('news-ja')) {
            $query->set('posts_per_page', 2);
        }
    }
}
add_action('pre_get_posts', 'custom_posts_per_page');
*/
