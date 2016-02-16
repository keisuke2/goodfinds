<?php
// データベースと接続するためのパラメータの設定 -------------------------------------------
$dbname = 'twitter'; // データベース名
$host = 'localhost'; // ホスト名
$user = 'root'; // 接続ユーザー名
$password = 'root'; // 接続ユーザーのパスワード

// データベースとの接続 -------------------------------------------
// MySQLへの接続
$link = mysql_connect($host, $user, $password);

// データベースの選択
$db = mysql_select_db($dbname, $link);

// 文字コードの設定
$sql = 'SET NAMES utf8';
$result = mysql_query($sql, $link);


// tweet投稿 -------------------------------------------
if (!empty($_POST['username']) && !empty($_POST['content'])) {
    $sql = "INSERT INTO tweets (`username`, `content`, `created`) VALUES ('{$_POST['username']}', '{$_POST['content']}', NOW());";
    $result = mysql_query($sql, $link);
}

// tweetの読み込み -------------------------------------------
// クエリの送信
$sql = 'SELECT * FROM tweets ORDER BY created DESC;';
$result = mysql_query($sql, $link);

// 結果セットの行数を取得
while ($row = mysql_fetch_assoc($result)) {
    $tweets[] = $row;
}
?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css" />
        <link rel="stylesheet" type="text/css" href="./css/common.css" />

        <title>niita</title>
        <style type="text/css">
            body {
              padding-top: 60px;
              padding-bottom: 40px;
            }
            .sidebar-nav {
              padding: 9px 0;
            }
        </style>
        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
          <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->
    </head>
    <body>
        <!-- header -->
        <div class="navbar navbar-fixed-top">
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"></a>
                    <a class="brand" href="#">Twitter</a>
                    <div class="btn-group pull-right">
                        <a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
                            <i class="icon-user"></i> logout
                            <span class="caret"></span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <!-- header -->

        <!-- container -->
        <div class="container">
            <div class="row">

                <!-- side column -->
                <div class="span3">
                    <div class="well sidebar-nav">
                        <div class="tweet-user">
                        <a href="#" class="nav blc clearfix" data-nav="profile">
                                <div class="content">
                                  <div class="account-group js-mini-current-user" data-user-id="98527015" data-screen-name="kobashi">
                                  <img class="avatar size32" style="width: 70px;" src="./img/kobashi.jpg" alt="torii" data-user-id="1">
                                    <b class="fullname">Takanori kobashi</b>
                                    <span class="metadata">View my profile page</span>
                                  </div>
                                </div>
                            </a>
                            <form class="form-inline" method="post" action="">
                                <div class="tweet-contents">
                                    <textarea class="tweet" name="content" placeholder="Compose New Tweet"></textarea>
                                </div>
                                <div class="tweet-username">
                                    <input type="text" class="input-small" name="username" placeholder="Your name">
                                </div>
                                <div class="tweet-btn">
                                    <input type="submit" class="btn" value="tweet">
                                </div>
                            </form>
                        </div>
                    </div><!--/.well -->
                </div><!--/span-->
                <!-- side column -->

                <!-- main column-->
                <div class="span7 well">
                    <div>
                        <h2>みんなのTweet</h2>
                    </div>
                    <hr>
                    <div id="feed">
                        <?php for ($i = 0; $i < count($tweets); $i++): ?>
                        <div class="row">
                            <div class="span1">
                            <a href="#"><img src="./img/<?php echo $tweets[$i]['username']; ?>.jpg" style="width: 50px;"></a>
                            </div>
                            <div class="span5">
                            <h5>Tweet ID.<?php echo $tweets[$i]['id'];?></h5>
                                <h5>@<?php echo $tweets[$i]['username']; ?></h5>
                                <span><?php echo $tweets[$i]['created']; ?></span>
                                <p><?php echo $tweets[$i]['content']; ?></p>
                            </div>
                        </div>
                        <hr>
                        <?php endfor; ?>
                    </div>
                </div><!--/span-->
            </div><!--/row-->

            <hr>

            <footer>
                <p>&copy; SLOGAN, Inc. <?php echo date('Y')?></p>
            </footer>

        </div><!--/.fluid-container-->
        <!-- container -->

        <!-- Le javascript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
    </body>
</html>
