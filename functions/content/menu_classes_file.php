<?php
/**
 * Menu CSS Classes Customization
 * 
 * ナビゲーションメニューのCSSクラスをカスタマイズします。
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * wp_nav_menuのli要素にカスタムクラスを追加
 * 
 * @param array $classes CSSクラスの配列
 * @param object $item メニューアイテム
 * @param object $args メニューの引数
 * @return array カスタマイズ後のクラス配列
 */
function add_additional_class_on_li($classes, $item, $args)
{
    if (isset($args->add_li_class)) {
        $classes['class'] = $args->add_li_class;
    }
    return $classes;
}
add_filter('nav_menu_css_class', 'add_additional_class_on_li', 1, 3);

/**
 * wp_nav_menuのa要素にカスタムクラスを追加
 * 
 * @param array $classes CSSクラスの配列
 * @param object $item メニューアイテム
 * @param object $args メニューの引数
 * @return array カスタマイズ後のクラス配列
 */
function add_additional_class_on_a($classes, $item, $args)
{
    if (isset($args->add_a_class)) {
        $classes['class'] = $args->add_a_class;
    }
    return $classes;
}
add_filter('nav_menu_link_attributes', 'add_additional_class_on_a', 1, 3);
