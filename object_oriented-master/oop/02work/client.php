<?php
class Client {
    private $name;
    private $email;

    public function __construct() {
       $this->name = "名無し企業";
       $this->email = "client@email.com";
    }
    
    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }
}
