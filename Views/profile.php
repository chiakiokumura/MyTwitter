<?php 
//エラー表示
ini_set('display_errors', 1);
//日本時間設定
date_default_timezone_set('Asia/Tokyo');
//URLディレクトリ設定
define('HOME_URL', '/mytwitter/');
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
/////////////////////////////////////////
//便利な関数
/////////////////////////////////////////
/**
 * 画像ファイル名から画像のURLを生成する
 * 
 * @param string $name 画像ファイル名
 * @param string $type user | tweet 
 * @return string
 */
function buildImagePath(string $name = null, string $type)
{
   if ($type === 'user' && !isset($name)){
       return HOME_URL . 'Views/img/icon-default-user.svg';
   } 
   return HOME_URL . 'Views/img_uploaded/' . $type . '/' . htmlspecialchars($name);
}
/**
 * 指定した日時からどれだけ経過したかを取得
 * 
 * @param string $datetime 日時
 * @return string
 */
function convertToDayTimeAgo(string $datetime)
{
    $unix = strtotime($datetime);
    $now = time();
    $diff_sec = $now - $unix;

    if ($diff_sec < 60){
        $time = $diff_sec;
        $unit = '秒前';
    }elseif($diff_sec < 3600){
            $time = $diff_sec/60;
            $unit = '分前';
        }elseif($diff_sec < 86400){
            $time = $diff_sec/3600;
            $unit = '時間前';
        }elseif($diff_sec < 2764800){
            $time = $diff_sec/86400;
            $unit = '日前';
        }else{
            if (date('Y') !== date('Y', $unix)){
                $time = date('Y年n月j日', $unix);
            }else{
                $time = date('n月j日', $unix);
            }
            return $time;
        }
        return(int)$time.$unit;
    }

?>
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
    <!-- JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous" defer></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous" defer></script>
    <!-- いいね！js -->
    <script src="../Views/js/like.js" defer></script>

    <title>プロフィール / Mytwitter</title>
    <meta name="discription" content="プロフィールです">
</head>
<body class="home profile text-center">
    <div class="container">
        <div class="side">
            <div class="side-inner">
                <ul class="nav flex-column">
                    <li class="nav-item"><a href="home.php" class="nav-link"><img src="<?php echo HOME_URL;?>Views/img/logo-twitterblue.svg" alt="サイトロゴ画像" class="icon"></a></li>
                    <li class="nav-item"><a href="home.php" class="nav-link"><img src="<?php echo HOME_URL;?>Views/img/icon-home.svg" alt=""></a></li>
                    <li class="nav-item"><a href="search.php" class="nav-link"><img src="<?php echo HOME_URL;?>Views/img/icon-search.svg" alt=""></a></li>
                    <li class="nav-item"><a href="noteftcation.php" class="nav-link"><img src="<?php echo HOME_URL;?>Views/img/icon-notification.svg" alt=""></a></li>
                    <li class="nav-item"><a href="profile.php" class="nav-link"><img src="<?php echo HOME_URL;?>Views/img/icon-profile.svg" alt=""></a></li>
                    <li class="nav-item"><a href="post.php" class="nav-link"><img src="<?php echo HOME_URL;?>Views/img/icon-post-tweet-twitterblue.svg" alt="" class="post-tweet"></a></li>
                    <li class="nav-item my-icon"><img src="<?php echo HOME_URL;?>Views/img_uploaded/user/sample-person.jpg" alt="" class="js-popover"
                    data-bs-container="body" data-bs-toggle="popover" data-bs-placement="right" data-bs-html="true" data-bs-content="<a href='profile.php'>プロフィール</a><br><a href='sign-out.php'>ログアウト</a>"
                    ></li>
                </ul>
            </div>
        </div>
        
        <div class="main">
            <div class="main-header">
                <h1>chaki</h1>
            </div>
            <!-- プロフィールエリア -->
            <div class="profile-area">
                <div class="top">
                    <div class="user"><img src="../Views/img_uploaded/user/sample-person.jpg" alt=""></div>

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
                                        <img src="../Views/img_uploaded/user/sample-person.jpg" alt="">
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
    <script>
        document.addEventListener('DOMContentLoaded', function(){
            $('.js-popover').popover();
        }, false);
    </script>
</body>
</html>