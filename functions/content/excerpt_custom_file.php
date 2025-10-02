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
 * @param int $length デフォルトの文字数
 * @return int カスタマイズ後の文字数
 */
function custom_excerpt_length($length)
{
    return 120; // 文字数を指定
}
add_filter('excerpt_length', 'custom_excerpt_length');

/**
 * 抜粋の省略記号をカスタマイズ
 * 
 * @param string $more デフォルトの省略記号
 * @return string カスタマイズ後の省略記号
 */
function custom_excerpt_more($more)
{
    return '...';
}
add_filter('excerpt_more', 'custom_excerpt_more');
