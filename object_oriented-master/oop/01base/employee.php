<?php
class Employee {
    public $name;
    public $age;
    public $job;
    public $salary;

    public function work() {
        echo '働いている！';
    }
}

$saji = new Employee(); 
// Employeeクラスのインスタンスを生成

$saji->work(); 
//インスタンスからメソッドを呼び出す
