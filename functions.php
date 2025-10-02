<?php

/**
 * Theme Functions - Main Entry Point
 * このファイルは各機能モジュールを読み込むエントリーポイントです。
 */

// セキュリティ: 直接アクセスを防ぐ
if (!defined('ABSPATH')) {
    exit;
}

/**
 * 機能モジュールの読み込み
 */

// コア機能
require_once get_template_directory() . '/functions/setup/theme-support.php';      // テーマサポート設定
require_once get_template_directory() . '/functions/setup/menu-registration.php';  // メニュー登録
require_once get_template_directory() . '/functions/setup/post-types.php';         // カスタム投稿タイプ

// アセット管理
require_once get_template_directory() . '/functions/assets/enqueue-scripts.php';   // CSS/JS読み込み

// セキュリティ
require_once get_template_directory() . '/functions/security/wp-security.php';     // セキュリティ設定
require_once get_template_directory() . '/functions/security/file-upload.php';     // ファイルアップロード制限

// コンテンツカスタマイズ
require_once get_template_directory() . '/functions/content/excerpt-custom.php';   // 抜粋カスタマイズ
require_once get_template_directory() . '/functions/content/menu-classes.php';     // メニュークラス追加

// ユーティリティ・コンポーネント
require_once get_template_directory() . '/functions/utility.php';                  // 共通ユーティリティ