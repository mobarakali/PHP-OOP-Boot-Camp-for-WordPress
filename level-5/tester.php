<?php
class Tester {
    private $bugCount = 0; // This is personal count
    public static $totalGlobalBugs = 0; // All bugs shared by Whole Team

    public function foundBug(){
        // 1. Increse your personal count
        $this->bugCount++;

        // 2. Increase count of Whole Team
        self::$totalGlobalBugs++;
    }

    public function showMyBugs(){
        return "I found: {$this->bugCount} bugs";
    }
}

$mobarak = new Tester();
$sirlouen = new Tester();

$mobarak->foundBug();
$sirlouen->foundBug();
$mobarak->foundBug();

echo $mobarak->showMyBugs(); // Output 2
echo "\n";
// অথবা আরও clearly
echo "Where the Whole Team has found: " . Tester::$totalGlobalBugs ;