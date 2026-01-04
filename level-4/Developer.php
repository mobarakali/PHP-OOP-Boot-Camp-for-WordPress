<?php
class Developer{
    public $name;
}


class Tester extends Developer{
    private $bugCount = 0;

    public function foundBug(){
        $this->bugCount = $this->bugCount+1;
    }

    public function showBugCount(){
        return $this->bugCount;
    }
}