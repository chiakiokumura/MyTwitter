<?php
///////////////////////////////////////
// いいね！データを処理
///////////////////////////////////////

/**
 * いいね！を作成
 * 
 * @param $data
 * @return int|false
 */

 function createLike(array $data)
 {
    // DB接続
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    // 接続エラーがある場合->処理停止
    if ($mysqli->connect_errno) {
        echo 'MySQLの接続に失敗しました。: ' . $mysql->connect_error . "\n";
        exit;
    }

    $query = 'INSERT INTO likes (user_id, tweet_id) VALUES (?,?)';
    $statement = $mysqli->prepare($query);

    $statement->bind_param('ii', $data['user_id'], $data['tweet_id']);

    if($statement->execute()) {
        $response = $mysqli->insert_id;
    }else{
        $response = false;
        echo 'エラーメッセージ: ' . $mysqli->error . "\n";
    }

    $statement->close();
    $mysqli->close();

    return $response;
 }

 /**
  * いいね！を取り消し
  * @param array $data
  * @return bool
  */

  function deleteLike(array $data)
  {
    // DB接続
    $mysqli = new mysqli(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
    // 接続エラーがある場合->処理停止
    if ($mysqli->connect_errno) {
        echo 'MySQLの接続に失敗しました。: '. $mysql->connect_error . "\n";
        exit;
    }

    $query = 'UPDATE likes SET status = "delated" WHERE id = ? AND user_id=?';
    $statement = $mysqli->prepare($query);

    $statement->bind_param('ii', $data['like_id'], $data['user_id']);

    $response = $statement->execute();

    if ($response === false) {
        echo 'エラーメッセージ: ' . $mysqli->error . "\n";
    }

    $statement->close();
    $mysqli->close();

    return $response;
  }