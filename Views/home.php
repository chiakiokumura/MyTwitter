<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="../Views/img/logo-twitterblue.svg">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <!-- 自作CSS -->
    <link rel="stylesheet" href="../Views/css/style.css">
    <title>ホーム画面 / Mytwitter</title>
    <meta name="discription" content="ホーム画面です">
</head>
<body class="home">
    <div class="container">
        <div class="side">
            <div class="side-inner">
                <ul class="nav flex-column">
                    <li class="nav-item"><a href="home.php" class="nav-link"><img src="../Views/img/logo-twitterblue.svg" alt="サイトロゴ画像" class="icon"></a></li>
                    <li class="nav-item"><a href="home.php" class="nav-link"><img src="../Views/img/icon-home.svg" alt=""></a></li>
                    <li class="nav-item"><a href="search.php" class="nav-link"><img src="../Views/img/icon-search.svg" alt=""></a></li>
                    <li class="nav-item"><a href="noteftcation.php" class="nav-link"><img src="../Views/img/icon-notification.svg" alt=""></a></li>
                    <li class="nav-item"><a href="profile.php" class="nav-link"><img src="../Views/img/icon-profile.svg" alt=""></a></li>
                    <li class="nav-item"><a href="post.php" class="nav-link"><img src="../Views/img/icon-post-tweet-twitterblue.svg" alt="" class="post-tweet"></a></li>
                    <li class="nav-item my-icon"><img src="../Views/img_uploaded/user/sample-person.jpg" alt=""></li>
                </ul>
            </div>
        </div>
        
        <div class="main">
            <div class="main-header">
                <h1>HOME</h1>
            </div>
            <!-- つぶやき投稿エリア -->
            <div class="tweet-post">
                <div class="my-icon">
                    <img src="../Views/img_uploaded/user/sample-person.jpg" alt="プロフィール画像">
                </div>
                <div class="input-area">
                    <form action="post.php" action="post" enctype="multipart/form-data">
                        <textarea name="body" placeholder="どうしたの？" max-length="140"></textarea>
                        <div class="bottom-aera">
                            <div class="mb-0">
                                <input type="file" name="image" class="form-control form-control-sm">
                                <button class="btn" type="submit">つぶやく</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- 仕切りエリア -->
            <div class="ditch"></div>
            <!-- つぶやき一覧エリア -->
            <div class="tweet-list">
                <div class="tweet">
                    <div class="user">
                        <a href="profile.php?user_id=1">
                            <img src="../Views/img_uploaded/user/sample-person.jpg" alt="プロフィール画像">
                        </a>
                    </div>
                    <div class="content">
                        <div class="name">
                            <a href="profile.php?user_id=1">
                                <span class="nickname">chaki</span>
                                <span class="user-name">@chaki ・2日前</span>
                            </a>
                        </div>
                        <p>効果がありました！</p>
                        <div class="icon-list">
                            <div class="like">
                                <img src="../Views/img/icon-heart.svg" alt="">
                            </div>
                            <div class="like-count">0</div>
                        </div>
                    </div>
                </div>
                <div class="tweet">
                    <div class="user">
                        <a href="profile.php?user_id=2">
                            <img src="../Views/img/icon-default-user.svg" alt="プロフィール画像">
                        </a>
                    </div>
                    <div class="content">
                        <div class="name">
                            <a href="profile.php?user_id=2">
                                <span class="nickname">haru</span>
                                <span class="user-name">@haru ・3日前</span>
                            </a>
                        </div>
                        <p>新しい治療始めました！</p>
                        <img src="../Views/img_uploaded/tweet/sample-post.jpg" alt="" class="post-img">
                        <div class="icon-list">
                            <div class="like">
                                <img src="../Views/img/icon-heart-twitterblue.svg" alt="">
                            </div>
                            <div class="like-count">1</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>