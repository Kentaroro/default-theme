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
        'header' => 'ヘッダーナビゲーション',
        'footer' => 'フッターナビゲーション',
        'hamburger' => 'ハンバーガーナビゲーション',
    ));
}
add_action('init', 'register_theme_menus');
