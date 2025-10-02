<?php
/**
 * WordPress Security Enhancements
 * 
 * WordPressのセキュリティを強化するための設定を行います。
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * WordPressバージョン情報を非表示
 * セキュリティ強化のため、ヘッダーからバージョン情報を削除
 */
remove_action('wp_head', 'wp_generator');

/**
 * フロントエンドで管理バーを非表示
 * 必要に応じてこの設定を変更してください
 */
add_filter('show_admin_bar', '__return_false');
