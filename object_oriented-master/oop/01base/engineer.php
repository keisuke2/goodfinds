<?php
require('employee_complete.php');

class Engineer extends Employee
{
    private $skill_level = 0;

    public function setSkillLevel($level) {
        $this->skill_level = $level;
    }

    public function getSkillLevel() {
        return $this->skill_level;
    }

    public function work() {
        echo 'プログラムを書いています';
    }
}

$iwasaki = new Engineer();
$iwasaki->setName("岩崎", "拓海");
echo $iwasaki->getName(); //岩崎 拓海
echo "<BR>";

$saji = new Employee();

$iwasaki->work(); // プログラムを書いています
echo "<BR>";
$saji->work(); // 働いている！
