<?php
////////////////////////
//サインアウトコントローラー
////////////////////////

//設定の読み込み
include_once '../config.php';
//便利な関数の読み込み
include_once '../util.php';

//ユーザー情報をセッション削除
deleteUserSession();

//ログイン画面に遷移
header('Location: ' . HOME_URL . 'Controllers/sign-in.php');
exit;