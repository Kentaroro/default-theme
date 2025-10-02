<?php
/**
 * Theme Support Configuration
 * 
 * テーマがサポートする機能を定義します。
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * テーマの基本設定とサポート機能の有効化
 */
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
