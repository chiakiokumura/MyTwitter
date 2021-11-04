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
    <title>検索画面 / Mytwitter</title>
    <meta name="discription" content="検索画面です">
</head>
<body class="home search text-center">
    <div class="container">
        <?php include_once('../Views/common/side.php'); ?>  
        <div class="main">
            <div class="main-header">
                <h1>検索</h1>
            </div>

            <!-- 検索エリア -->
            <form action="search.php" method="get">
                <div class="search-area">
                    <input type="text" class="form-control" placeholder="キーワード検索" name="keyword" value="">
                    <button type="submit" class="btn">検索</button>
                </div>
            </form>

            <!-- 仕切りエリア -->
            <div class="ditch"></div>

            <!-- つぶやき一覧エリア -->
             <?php if (empty($view_tweets)) : ?>
                <p class="p-3">ツイートがありません</p>
            <?php else : ?>
            <div class="tweet-list">
                <?php foreach ($view_tweets as $view_tweet) : ?>
                <div class="tweet">
                    <div class="user">
                        <a href="profile.php?user_id=<?php echo htmlspecialchars($view_tweet['user_id']);?>">
                            <img src="<?php echo buildImagePath($view_tweet['user_image_name'], 'user'); ?>" alt="">
                        </a>
                    </div>
                    <div class="content">
                        <div class="name">
                            <a href="profile.php?user_id=<?php echo htmlspecialchars($view_tweet['user_id']); ?>">
                                <span class="nickname"><?php echo htmlspecialchars($view_tweet['user_nickname']); ?></span>
                                <span class="user-name">@<?php echo htmlspecialchars($view_tweet['user_name']); ?> ・<?php echo convertToDayTimeAgo($view_tweet['tweet_created_at']); ?></span>
                            </a>
                        </div>
                        <p><?php echo $view_tweet['tweet_body'] ?></p>

                        <?php if (isset($view_tweet['tweet_image_name'])): ?>
                            <img src="<?php echo buildImagePath($view_tweet['tweet_image_name'], 'tweet'); ?>" alt="" class="post-image">
                        <?php endif; ?>

                        <div class="icon-list">
                                    <div class="like js-like" data-like-id="<?php echo htmlspecialchars($view_tweet['like_id']); ?>">
                                        <?php
                                        if (isset($view_tweet['like_id'])) {
                                            // いいね！している場合、青のハートを表示
                                            echo '<img src="' . HOME_URL . 'Views/img/icon-heart-twitterblue.svg" alt="">';
                                        } else {
                                            // いいね！してない場合、グレーのハートを表示
                                            echo '<img src="' . HOME_URL . 'Views/img/icon-heart.svg" alt="">';
                                        }
                                        ?>
                                    </div>
                                    <div class="like-count js-like-count"><?php echo htmlspecialchars($view_tweet['like_count']); ?></div>
                                </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <?php endif; ?>
        </div>
    </div>
    <?php include_once('../Views/common/foot.php'); ?>
</body>
</html>