<?php
/**
 * Menu Registration
 * 
 * ナビゲーションメニューの登録を行います。
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * テーマで使用するメニューを登録
 */
function register_theme_menus()
{
    register_nav_menus(array(
        'primary' => 'ヘッダーナビゲーション',
        'footer-en' => 'フッターナビゲーション（英語）',
        'footer-ja' => 'フッターナビゲーション（日本語）',
        'hamburger-en' => 'ハンバーガーナビゲーション（英語）',
        'hamburger-ja' => 'ハンバーガーナビゲーション（日本語）',
    ));
}
add_action('init', 'register_theme_menus');
