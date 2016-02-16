<?php

// ----- データベースと接続するためのパラメータの設定 -----

// データを保存する

?>

<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
        <title>twitter</title>
    </head>
    <body>
        <form method="post" action="">
            <textarea name="content" placeholder="New Tweet"></textarea><br>
            <input type="text" class="input-small" name="username" placeholder="Your name"><br>
            <input type="submit" class="btn" value="tweet">
        </form>
        <hr>
<?php
// データベースからデータを取得して、表示

?>
    </body>
</html>
