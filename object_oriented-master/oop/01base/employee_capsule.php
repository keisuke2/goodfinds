<?php
class Employee {
    public $name;
    public $age;
    public $job;
    public $salary;

    public function __construct() {
       $this->name = "名無しさん";
       $this->age = 0;
       $this->job = "研修員";
       $this->salary = 300;
    }

    public function work() {
        echo '働いている！';
    }

    public function getName() {
        return $this->name;
    }

    public function setName($name) {
        $this->name = $name;
    }
}

$saji = new Employee();
echo $saji->getName() . "<BR>";  //名無しさん
$saji->setName("佐治");
echo $saji->getName() . "<BR>";  //佐治
