<?php
/**
 * Assets Enqueue Management
 * 
 * CSS・JavaScriptファイルの読み込み管理を行います。
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * テーマで使用するCSS・JavaScriptを読み込む
 */
function enqueue_theme_assets()
{
    $theme_version = wp_get_theme()->get('Version');

    // テーマのメインCSS
    wp_enqueue_style(
        'theme-style',
        get_stylesheet_uri(),
        array(),
        $theme_version
    );

    // jQuery（WordPressに含まれているもの）
    wp_enqueue_script('jquery');

    // カスタムスクリプト
    wp_enqueue_script(
        'custom-script',
        get_template_directory_uri() . '/assets/js/main.js',
        array('jquery'),
        $theme_version,
        true
    );
}
add_action('wp_enqueue_scripts', 'enqueue_theme_assets');
