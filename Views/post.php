<?php 
//設定関連を読み込む
include_once('../config.php');
//便利な関数読み込む
include_once('../util.php');
?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <?php include_once('../Views/common/head.php'); ?>
    <title>つぶやき画面 / Mytwitter</title>
    <meta name="discription" content="つぶやき画面です">
</head>
<body class="home">
    <div class="container">
        <?php include_once('../Views/common/side.php'); ?>  
        <div class="main">
            <div class="main-header">
                <h1>つぶやく</h1>
            </div>
            <!-- つぶやき投稿エリア -->
            <div class="tweet-post">
                <div class="my-icon">
                    <img src="<?php echo HOME_URL;?>Views/img_uploaded/user/sample-person.jpg" alt="プロフィール画像">
                </div>
                <div class="input-area">
                    <form action="post.php" action="post" enctype="multipart/form-data">
                        <textarea name="body" placeholder="どうしたの？" max-length="140"></textarea>
                        <div class="bottom-aera">
                            <div class="mb-0">
                                <input type="file" name="image" class="form-control form-control-sm">
                            </div>
                            <button class="btn" type="submit">つぶやく</button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- 仕切りエリア -->
            <div class="ditch"></div>

            
        </div>
    </div>
    <?php include_once('../Views/common/foot.php'); ?>
</body>
</html>