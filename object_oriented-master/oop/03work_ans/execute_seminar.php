<?php
require('seminar.php');
require('client_seminar.php');


echo "<h2>通常セミナーテスト</h2>";
echo "<BR>";

$saji = new User(); 
$saji->setName("佐治", "和弘");
$saji->setEmail("saji@email.com");

$iwasaki = new User();
$iwasaki->setName("岩崎", "拓海");
$iwasaki->setEmail("iwasaki@email.com");

$hayashi = new User(); 
$hayashi->setName("早矢仕", "玄");
$hayashi->setEmail("hayashi@email.com");

$object_seminar = new Seminar();
$object_seminar->setTitle("オブジェクト指向セミナー");

echo $object_seminar->getTitle() . '<BR>';

$object_seminar->attendAccept($iwasaki);
$object_seminar->attendAccept($saji);
$object_seminar->attendAccept($hayashi);

$object_seminar->getAttendList();
$object_seminar->cancelAccept($saji);
$object_seminar->getCancelList();
$object_seminar->getAttendList();

echo "<BR><BR><hr>";
echo "<h2>クライアントセミナーテスト</h2>";
echo "<BR>";

$client_seminar = new ClientSeminar();
$google = new Client();
$google->setName("Google");
$google->setEmail("jinji@gmail.com");
$client_seminar->setClient($google);
$client_seminar->setTitle("Google説明会");

$client_seminar->attendAccept($iwasaki);
$client_seminar->attendAccept($saji);
$client_seminar->attendAccept($hayashi);

$client_seminar->getAttendList();
$client_seminar->cancelAccept($saji);
$client_seminar->getCancelList();
$client_seminar->getAttendList();
