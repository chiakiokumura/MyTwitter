<?php
////////////////////////
//ホームコントローラー
////////////////////////

//設定の読み込み
include_once '../config.php';
//便利な関数の読み込み
include_once '../util.php';

//ログインチェック
$user = getUserSession();
if(!$user) {
    //ログインしていない
    header('Location: ' . HOME_URL . 'Controllers/sign-in.php');
    exit;
}

//表示用の変数
$view_user = $user;

//ツイート一覧
$view_tweets = [
    [
        'user_id' => 1,
        'user_name' => 'chaki',
        'user_nickname' => 'chaki',
        'user_image_name' => 'sample-person.jpg',
        'tweet_body' => '効果がありました！',
        'tweet_image_name' => null,
        'tweet_created_at' => '2020-3-15 14:00:00',
        'like_id' => null,
        'like_count' => 0,
    ],
    [
        'user_id' => 2,
        'user_name' => 'haru',
        'user_nickname' => 'haru',
        'user_image_name' => null,
        'tweet_body' => '新しい治療を始めました！',
        'tweet_image_name' => 'sample-post.jpg',
        'tweet_created_at' => '2021-11-2 14:00:00',
        'like_id' => 1,
        'like_count' => 3,
    ]
];


//画面表示
include_once '../Views/home.php';