<?php
class Tool{
    public $name = "Hammer";

    public function __construct($new_name)
    {
        $name = $new_name;        
    }
}

$myTool = new Tool("Saw");
echo $myTool->name; // Hammer not Saw