<?php
class Employee {
    private $first_name;
    private $last_name;
    private $age;
    private $job;
    private $salary;

    public function __construct() {
       $this->last_name = "名無し";
       $this->first_name = "さん";
       $this->age = 0;
       $this->job = "研修員";
       $this->salary = 300;
    }

    public function work() {
        echo '働いている！';
    }
    
    public function getName() {
        return $this->last_name . " " . $this->first_name;
    }

    public function setName($last_name, $first_name) {
        $this->last_name = $last_name;
        $this->first_name = $first_name;
    }
}
