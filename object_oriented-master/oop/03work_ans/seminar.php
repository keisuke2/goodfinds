<?php
require('user.php');

class Seminar {
    private $title;
    private $description;
    private $date;
    private $place;
    private $attend_users;
    private $cancel_users;

    public function __construct() {
       $this->title = "無題セミナー";
       $this->description = "セミナー詳細";
       $this->date = "2015/07/15 18:00 - 19:00";
       $this->place = "SLOGANオフィス2階";
       $this->attend_users = array();
       $this->cancel_users = array();
    }

    public function setTitle($title) {
        $this->title = $title;
    }
    public function getTitle() {
        return $this->title;
    }
    public function setDescription($description) {
        $this->description = $description;
    }
    public function getDescription() {
        return $this->description;
    }
    public function setDate($date) {
        $this->date = $date;
    }
    public function getDate() {
        return $this->date;
    }
    public function setPlace($place) {
        $this->place = $place;
    }
    public function getPlace() {
        return $this->place;
    }

    public function attendAccept($user) {
        $this->attend_users[] = $user;
        $message = $this->title . "に登録しました" . "<BR>";
        $this->sendMailToUser($user->getEmail(), $message);
    }

    public function cancelAccept($cancel_user) {
        foreach ($this->attend_users as $key => $user) {
            if ($user->getEmail() == $cancel_user->getEmail()) {
                unset($this->attend_users[$key]);
                $this->cancel_users[] = $cancel_user;
                $message = $this->title . "をキャンセルしました" . "<BR>";
                $this->sendMailToUser($user->getEmail(), $message);
                return;
            }
        }
        echo $cancel_user->getName() . "が登録されていません". "<BR>";
    }

    private function sendMailToUser($email, $message) {
        echo $email . "にメッセージを送信". "<BR>";
        echo "本文 : ". $message;
        echo "<BR>";
    }

    public function getAttendList() {
        echo "<hr>";
        echo "[". $this->title ."参加者一覧]" . "<BR>";
        foreach($this->attend_users as $user) {
            echo $user->getName() . " : " . $user->getEmail() . "<BR>";
        }
        echo "<hr>";
    }

    public function getCancelList() {
        echo "<hr>";
        echo "[". $this->title ."キャンセル者一覧]" . "<BR>";
        foreach($this->cancel_users as $user) {
            echo $user->getName() . " : " . $user->getEmail() . "<BR>";
        }
        echo "<hr>";
    }

}

