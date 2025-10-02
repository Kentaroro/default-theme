<?php
/**
 * Utility Functions
 * 
 * サイト全体で使用する共通ユーティリティ関数を定義します。
 * 
 * ファイルパス: functions/utility.php
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * JSONデータを取得（トップページ用）
 * 
 * @param string $json_path JSONファイルのパス
 * @return array|null デコードされたJSONデータ
 */
function get_json_data($json_path)
{
    $json_path = get_template_directory() . '/assets/data/' . $json_path;
    $json_data = file_get_contents($json_path);
    return json_decode($json_data, true);
}

/**
 * ページの言語とフォントを取得
 * 
 * @return array 言語コード（lgng）とフォントクラス（font）の連想配列
 */
function get_page_lang_and_font()
{
    $lgng = 'en';
    $font = 'font-ubuntu';
    
    if ((is_page() || is_single() || is_archive()) && strpos($_SERVER['REQUEST_URI'], '/ja/') !== false) {
        $lgng = 'ja';
        $font = 'font-sans';
    }
    
    return ['lgng' => $lgng, 'font' => $font];
}
