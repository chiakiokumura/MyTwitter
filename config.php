<?php
//エラー表示
ini_set('display_errors', 1);
//日本時間設定
date_default_timezone_set('Asia/Tokyo');
//URLディレクトリ設定
define('HOME_URL', '/mytwitter/');
//データベースの接続情報
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'mytwitter');

?>