<?php
class Task{
    // This is the container for our Task Logic

    // Addig Properties
    public $title; //The name of the Task
    public $isCompleted = false; // Task Status

    // Adding Methods
    public function markAsCompleted(){
        $this->isCompleted = true;
    }
}


// The Object (the instances)
$myTask = new Task(); // We just 'initiated' the Class

var_dump($myTask);