<?php
/**
 * File Upload Security
 * 
 * ファイルアップロードのセキュリティを強化します。
 */

if (!defined('ABSPATH')) {
    exit;
}

/**
 * アップロード可能なファイル形式を制限
 * 
 * @param array $file アップロードファイル情報
 * @return array 検証後のファイル情報
 */
function restrict_file_uploads($file)
{
    // 許可するファイル拡張子
    $allowed_types = array(
        'jpg',
        'jpeg',
        'png',
        'gif',
        'pdf',
        'doc',
        'docx',
        'xls',
        'xlsx',
        'ppt',
        'pptx',
        'xml',
        'txt'
    );

    $file_ext = pathinfo($file['name'], PATHINFO_EXTENSION);

    if (!in_array(strtolower($file_ext), $allowed_types)) {
        $file['error'] = 'このファイル形式はアップロードできません。';
    }

    return $file;
}
add_filter('wp_handle_upload_prefilter', 'restrict_file_uploads');
