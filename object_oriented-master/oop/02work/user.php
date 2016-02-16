<?php
class User {
    private $first_name;
    private $last_name;
    private $email;

    public function __construct() {
       $this->last_name = "名無し";
       $this->first_name = "さん";
       $this->email = "empty@email.com";
    }
    
    public function getName() {
        return $this->last_name . " " . $this->first_name;
    }

    public function setName($last_name, $first_name) {
        $this->last_name = $last_name;
        $this->first_name = $first_name;
    }

    public function getEmail() {
        return $this->email;
    }

    public function setEmail($email) {
        $this->email = $email;
    }
}
