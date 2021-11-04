<?php //設定関連を読み込む
include_once('../config.php');
//便利な関数読み込む
include_once('../util.php');
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<?php include_once('../Views/common/head.php'); ?>

    <title>会員登録 / Mytwitter</title>
    <meta name="discription" content="会員登録画面です">
</head>
<body class="signup text-center">
    <main class="form-signup">
        <form action="sign-up.php" method="post">
            <img src="<?php echo HOME_URL; ?>Views/img/logo-white.svg" alt="" class="logo-white">
            <h1>アカウント作成</h1>
            <input type="text" class="form-control" name="nickname" placeholder="ニックネーム" maxlength="128" required autofocus>
            <input type="text" class="form-control" name="name" placeholder="ユーザー名" maxlength="128" required>
            <input type="email" class="form-control" name="email" placeholder="メールアドレス" maxlength="254" required>
            <input type="password" class="form-control" name="password" placeholder="パスワード" minlength="4" required>
            <button class="w-100 btn btn-lg" type="submit">登録する</button>
            <p class="mt-3 mb-2"><a href="sign-in.php">ログインはこちら</a></p>
            <p class="mt-2 mb-3 text-muted">&copy;2021</p>
        </form>
    </main>
    <?php include_once('../Views/common/foot.php'); ?>
</body>
</html>