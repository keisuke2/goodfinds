<?php
require('client.php');

class ClientSeminar extends Seminar {
    private $client;

    public function setClient($client) {
        $this->client = $client;
    }
    public function getClient() {
        return $this->client;
    }

    public function attendAccept($user) {
        parent::attendAccept($user);
        $message = $this->getTitle() . "に登録しました" . "<BR>";
        $this->sendMailToClient($this->client->getEmail(), $user->getName(), $message);
    }

    public function cancelAccept($user) {
        parent::cancelAccept($user);
        $message = $this->getTitle() . "をキャンセルしました" . "<BR>";
        $this->sendMailToClient($this->client->getEmail(), $user->getName(), $message);
    }

    private function sendMailToClient($client_email, $user_name, $message) {
        echo $client_email . "にメッセージを送信". "<BR>";
        echo "本文 :  ". $user_name . "さんが" . $message;
        echo "<BR>";
    }

}

