<?php

// ----- データベースと接続するためのパラメータの設定 -----
$dbname = 'twitter'; // ここにはデータベースの名前をいれる
$host = 'localhost'; // データベースのあるドメインを指定
$user = 'root'; // データベースに接続するユーザー名
$password = 'root'; // データベースに接続するユーザーのパスワード

// ----- データベースとの接続 -----
$link = mysql_connect($host, $user, $password); //mysqlの接続情報を返す
$db = mysql_select_db($dbname, $link); // データベースへの接続可否を返す

$sql = 'SET NAMES utf8'; // 文字コード設定のクエリ定義
mysql_query($sql, $link); // クエリの発行(SQL文の実行)

$login_user = $_COOKIE['twitter_username'];

// ----- ログアウト -----
if (!empty($_POST['logout'])) {
    setcookie('twitter_username', '', time() - 60*60);
    $login_user = '';
}

// ----- ログイン -----
if (!empty($_POST['login_user']) && !empty($_POST['login_pass'])) {
    $sql = "SELECT COUNT(*) AS count FROM users WHERE username = '{$_POST['login_user']}' AND password = '{$_POST['login_pass']}';";
    $result = mysql_query($sql, $link);
    $row = mysql_fetch_assoc($result);
    if ($row['count'] > 0) {
        setcookie('twitter_username', $_POST['login_user'], time() + 60*60*24*30);
        $login_user = $_POST['login_user'];
    }
}

// ----- tweets 投稿 -----
if (!empty($_POST['username']) && !empty($_POST['content'])) {
    $sql = "INSERT INTO tweets (`username`, `content`, `created`) VALUES ('{$_POST['username']}', '{$_POST['content']}', NOW());";
    $result = mysql_query($sql, $link); // SQL文の実行結果を$resultに格納
}

// ----- tweetsをデータベースから読み込み -----
// クエリの発行(SQL文の実行)
$sql = "SELECT * FROM tweets WHERE `username` = '{$login_user}' OR `username` IN (SELECT followed_name FROM follows WHERE follower_name = '{$login_user}') ORDER BY created DESC;";
$result = mysql_query($sql, $link);

// 実行結果の行数を取得
while ($row = mysql_fetch_assoc($result)) {
    $tweets[] = $row;
}
// $tweetsの中身を確認したい場合は下のコメントを'外す
// var_dump($tweets);

?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>twitter</title>
    </head>
    <body>
<?php if (!empty($login_user)): ?>
        <form class="form-inline" method="post" action="">
            <div>
                <?php echo $login_user; ?> さん
                <input type="hidden" name="logout" value="logout">
                <input type="submit" class="btn" value="logout">
            </div>
        </form>
    	  <form class="form-inline" method="post" action="">
            <div class="tweet-contents">
                <textarea class="tweet" name="content" placeholder="Compose New Tweet"></textarea>
            </div>
            <div class="tweet-username">
                <input type="hidden" class="input-small" name="username" placeholder="Your name" value=<?php echo $login_user; ?>>
            </div>
            <div class="tweet-btn">
                <input type="submit" class="btn" value="tweet">
            </div>
        </form>
        <hr>
<?php
    for ($i = 0; $i < count($tweets); $i++) {
		    echo "{$tweets[$i]['username']}<br>";
		    echo "{$tweets[$i]['content']}<br>";
		    echo "{$tweets[$i]['created']}<br>";
		    echo "<hr>";
    }
?>

<?php else: ?>
        <form class="form-inline" method="post" action="">
            <div class="tweet-username">
                <input type="text" class="input-small" name="login_user" placeholder="Your name">
            </div>
            <div class="tweet-password">
                <input type="password" class="input-small" name="login_pass" placeholder="Your password">
            </div>
            <div class="tweet-btn">
                <input type="submit" class="btn" value="login">
            </div>
        </form>
<?php endif; ?>
    </body>
</html>
