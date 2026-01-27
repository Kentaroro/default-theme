<?php

/**
 * Excerpt Customization
 * 
 * 投稿の抜粋（excerpt）のカスタマイズを行います。
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * 抜粋文字数のカスタマイズ
 * 
 */
function custom_excerpt_length($length)
{
    return 120; // 文字数を指定
}
add_filter('excerpt_length', 'custom_excerpt_length');

/**
 * 抜粋の省略記号をカスタマイズ
 * 
 */
function custom_excerpt_more($more)
{
    return '...';
}
add_filter('excerpt_more', 'custom_excerpt_more');
