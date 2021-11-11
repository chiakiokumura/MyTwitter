<?php
///////////////////////////////////////
// サーチコントローラー
///////////////////////////////////////
 
// 設定を読み込み
include_once '../config.php';
// 便利な関数を読み込み
include_once '../util.php';
 
// ツイートデータ操作モデルを読み込む
include_once '../Models/tweets.php';

// ログインチェック
$user = getUserSession();
if (!$user) {
    // ログインしていない
    header('Location: ' . HOME_URL . 'Controllers/sign-in.php');
    exit;
}

$keyword = null;
if(isset($_GET['keyword'])) {
    $keyword = $_GET['keyword'];
}

$view_user = $user;
$view_keyword = $keyword;

$view_tweets = findTweets($user,$keyword);

include_once '../Views/search.php';