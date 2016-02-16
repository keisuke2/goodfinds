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

}

$saji = new Employee(); // __construct() が呼び出される
echo $saji->job . "<BR>";  // 研修員
echo $saji->name . "<BR>"; // 名無しさん

$saji->job = "エンジニア";
$saji->name = "佐治";

echo $saji->job . "<BR>"; // エンジニア
echo $saji->name . "<BR>"; // 佐治
