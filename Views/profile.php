<?php 
//設定関連を読み込む
include_once('../config.php');
//便利な関数読み込む
include_once('../util.php');

/////////////////////////////////////////
//ツイート一覧
/////////////////////////////////////////
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

?>
<!DOCTYPE html>
<html lang="ja">
<head>
    <?php include_once('../Views/common/head.php'); ?>
</head>
<body class="home profile text-center">
    <div class="container">
        <?php include_once('../Views/common/side.php'); ?>
        
        <div class="main">
            <div class="main-header">
                <h1>chaki</h1>
            </div>
            <!-- プロフィールエリア -->
            <div class="profile-area">
                <div class="top">
                    <div class="user"><img src="<?php echo HOME_URL; ?>Views/img_uploaded/user/sample-person.jpg" alt=""></div>

                    <?php if(isset($_GET['user_id'])) : ?>
                        <!-- 相手のページ -->
                        <?php if(isset($_GET['case'])) : ?>
                            <button class="btn btn-sm btn-reverse">フォローを外す</button>
                            <?php else : ?>
                        <button class="btn btn-sm btn-reverse">フォローする</button>
                        <?php endif ; ?>
                        <?php else : ?>
                            <!-- 自分のページ -->
                    <button class="btn btn-reverse btn-sm" data-bs-toggle="modal" data-bs-target="#js-modal">プロフィール編集</button>
                    <?php endif; ?>
                </div>
                    
                <div class="modal fade" id="js-modal" dabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <form action="profile.php" method="post" enctype="multipart/form-data">
                                <div class="modal-header">
                                    <h5 class="modal-title">プロフィールを編集</h5>
                                    <button class="btn-close" type="button" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <div class="user">
                                        <img src="<?php echo HOME_URL; ?>Views/img_uploaded/user/sample-person.jpg" alt="">
                                    </div>
                                    <div class="mb-3">
                                        <label for="" class="mb-1">プロフィール写真</label>
                                        <input type="file" class="form-control form-control-sm" name="image">
                                    </div>
                                        <input type="text" class="form-control mb-4" value="chaki" name="nickname" placeholder="ニックネーム" maxlength="128" required>
                                        <input type="text" class="form-control mb-4" value="chaki" name="name" placeholder="ユーザー名" maxlength="50" required>
                                        <input type="email" class="form-control mb-4" value="chaki@example.com" name="email" placeholder="メールアドレス" maxlength="254" required>
                                        <input type="password" class="form-control mb-4" value="" name="password" placeholder="パスワードを変更する場合ご入力ください" minlength="4" maxlength="128">
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-reverse" data-bs-dismiss="modal">キャンセル</button>
                                    <button class="btn" type="submit">保存する</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                
                <div class="name">chaki</div>
                <div class="text-muted">@chaki</div>

                <div class="follow-follower">
                    <div class="follow-count">1</div>
                    <div class="follow-text">フォロー中</div>
                    <div class="follw-count">1</div>
                    <div class="follow-text">フォロワー</div>
                </div>
            </div>

            <!-- 仕切りエリア -->
            <div class="ditch"></div>

            <!-- Todo:つぶやき一覧エリア -->
             
        </div>
    </div>
    <?php include_once('../Views/common/foot.php'); ?>
</body>
</html>