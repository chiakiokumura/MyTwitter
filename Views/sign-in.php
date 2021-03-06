<!DOCTYPE html>
<html lang="ja">
<head>
    <?php include_once('../Views/common/head.php'); ?>
    <title>ログイン / Mytwitter</title>
    <meta name="description" content="ログイン画面です">
</head>
<body class="signup text-center">
    <main class="form-signup">
        <form action="sign-in.php" method="post">
            <img src="<?php echo HOME_URL; ?>/Views/img/hope-share3.png" alt="" class="logo-white">
            <h1>HopeShareにログイン</h1>

        <?php if(isset($view_try_login_result) && $view_try_login_result === false) : ?>
            <div class="alert alert-warning text-sm" role="alert">
                ログインに失敗しました。メールアドレス、パスワードが正しいかご確認ください。
            </div>
        <?php endif ; ?>
        
            <input type="email" class="form-control" name="email" placeholder="メールアドレス" require autofocus>
            <input type="password" class="form-control" name="password" placeholder="パスワード" require>
            <button class="w-100 btn btn-lg" type="submit">ログイン</button>
            <p class="mt-3 mb-2"><a href="sign-up.php">新規会員登録はこちら</a></p>
            <p class="mt-2 mb-3 text-muted">&copy;2021</p>
        </form>
    </main>
    <?php include_once('../Views/common/foot.php'); ?>
</body>
</html>