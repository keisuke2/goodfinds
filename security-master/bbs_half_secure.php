<?php

// ----- データベースと接続するためのパラメータの設定 -----
$dbname = 'security_seminar'; // ここにはデータベースの名前をいれる
$host = 'localhost'; // データベースのあるドメインを指定
$user = 'root'; // データベースに接続するユーザー名
$password = 'root'; // データベースに接続するユーザーのパスワード

function h($string) {
	return htmlspecialchars($string, ENT_QUOTES);
}

// データベース接続部分
$link = mysql_connect($host, $user, $password);
mysql_select_db($dbname, $link);
mysql_query('SET NAMES utf8', $link); // MySQL4.0以下ならコメントアウト

	// CSRF攻撃をリファラーでブロックする
	$myURL = 'http://localhost:8888/security/bbs_half_secure.php';
	if (strncmp($_SERVER['HTTP_REFERER'], $myURL, strlen($myURL))) {
		unset($_POST);
	}

	// 投稿処理
	if (!empty($_POST["dopost"]) && !empty($_POST["name"])) {

		// パスワードが指定されていなければ、クッキーのパスワードで上書きする
		if (empty($_POST["pass"]) && !empty($_COOKIE["pass"])) {
			$_POST["pass"] = $_COOKIE["pass"];
		}

		// 名前とパスワードの一致確認
		$sql = "SELECT COUNT(*) FROM posts WHERE name='".$_POST["name"]."' AND pass<>'".$_POST["pass"]."'";
		$rs = mysql_query($sql, $link);
		if (mysql_result($rs, 0, 0)) {
			// 同じ名前で、パスワードの異なるレコードがあれば受付拒否
			header("Location: http://".$_SERVER['HTTP_HOST'].$_SERVER['SCRIPT_NAME'].'?message='.urlencode('その名前はすでに使われています'));
			exit;
		}

		// 投稿内容のデータベースへの書込み
		$sql = "INSERT INTO posts SET name='".mysql_real_escape_string($_POST["name"])."', title='".mysql_real_escape_string($_POST["title"])."', content='".mysql_real_escape_string($_POST["content"])."', pass='".mysql_real_escape_string($_POST["pass"])."', postdate=NOW()";
		mysql_query($sql, $link);

		// 次回の投稿・管理用に、クッキーに名前とパスワードを保存する
		setcookie('name', $_POST["name"], time()+60*60*24*30);
		setcookie('pass', $_POST["pass"], time()+60*60*24*30);

		// 投稿したらリダイレクト
		header("Location: http://".$_SERVER['HTTP_HOST'].$_SERVER['SCRIPT_NAME'].'?message='.urlencode('登録しました'));
		exit;
	}

	// メッセージ削除処理
	if (!empty($_POST['delete'])) {

		// パスワードが指定されていなければ、クッキーのパスワードで上書きする
		if (empty($_POST["pass"]) && !empty($_COOKIE["pass"])) {
			$_POST["pass"] = $_COOKIE["pass"];
		}

		// idとパスワードの一致をもって、削除する
		$sql = "DELETE FROM posts WHERE id=".intval($_POST["id"])." AND pass='".mysql_real_escape_string($_POST["pass"])."' LIMIT 1";
		mysql_query($sql, $link);
		$message = mysql_affected_rows() ? "削除しました" : "パスワードが違います";

		// 削除したらリダイレクト
		header("Location: http://".$_SERVER['HTTP_HOST'].$_SERVER['SCRIPT_NAME']."?message=".urlencode($message));
		exit;
	}


	// キャラクターセットの指定
	header("Content-Type: text/html; charset=UTF-8");

	// HTML開始部
	echo '<html><head><meta http-equiv="content-type" content="text/html; charset=UTF-8" /><title>掲示板</title></head><body>';

	// メッセージがあれば表示
	if (!empty($_GET['message'])) {
		echo '<p style="color:red;">'.h($_GET['message']).'</p>';
	}

	// フォーム描画処理
	echo '<form action="'.$_SERVER['PHP_SELF'].'" method="post">';
	echo '名前: <input type="text" name="name" value="'.$_COOKIE['name'].'" /><br />';
	echo '題名: <input type="text" name="title" /><br />';
	echo '内容: <br /><textarea name="content" rows="4" cols="40"></textarea><br />';
	echo 'パスワード: <input type="password" name="pass" size="8" value="" /><br /><br />';
	echo '<input type="submit" name="dopost" value="投稿" />';
	echo '<input type="reset" value="リセット" />';
	echo '</form>';
	echo '<hr />';

	// 過去の投稿表示部分 （最新順に10件のみ表示）
	$sql = "SELECT * FROM posts ORDER BY postdate DESC LIMIT 10";
	$result = mysql_query($sql, $link);
	if ( $result ) {
		while ($row = mysql_fetch_array($result, MYSQL_ASSOC)) {
			echo '<p>';
			echo 'No.'.h($row['id']).'<br />';
			echo '題名:'.h($row['title']).'<br />';
			echo '名前:'.h($row['name']).'<br />';
			echo '日時:'.h($row['postdate']).'<br />';
			echo '<blockquote>'.nl2br(h($row['content'])).'</blockquote>';
			echo '</p><hr />';
		}
	}

	// 削除用
	echo '<form action="'.$_SERVER['PHP_SELF'].'" method="post">';
	echo '記事No.<input type="text" name="id" size="4" /> ';
	echo 'パスワード<input type="password" name="pass" size="8" value="" />';
	echo '<input type="submit" name="delete" value="記事削除" />';
	echo '</form>';

	// HTML終了部
	echo '</body></html>';

?>
