<?php
require('seminar.php');
require('client_seminar.php');


echo "<h2>通常セミナーテスト</h2>";
echo "<BR>";

// ユーザの作成
$saji = new User(); 
$saji->setName("佐治", "和弘");
$saji->setEmail("saji@email.com");

$iwasaki = new User();
$iwasaki->setName("岩崎", "拓海");
$iwasaki->setEmail("iwasaki@email.com");

$hayashi = new User(); 
$hayashi->setName("早矢仕", "玄");
$hayashi->setEmail("hayashi@email.com");

