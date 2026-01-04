<?php
class Student{
    public $name;
    public $grade;

    // Construcxtor: Runs immediately on 'new Student'
    public function __construct($n, $g)
    {
       // throw new \Exception('Not implemented');
       $this->name = $n; //এই ক্লাসের name-কে সেট করে $n দিয়ে
       $this->grade = $g; // এই ক্লাসের grade-কে সেট করে $g দিয়ে
       echo "New student admitted: {$this->name}\n";
    }
    public function showInfo(){
        return "Name of the Student: {$this->name}, class: {$this->grade}";
    }
}

// এখন দেখুন, এক লাইনেই সব কাজ শেষ!

$student1 = new Student('Mobarak', "Core Test Team");
$student2 = new Student("SirLouen", "Core Lead");

echo $student1->showInfo();
echo "\n";
echo $student2->showInfo();

