<?php
class Car{
    public $model;

    public function __construct($m)
    {
        //throw new \Exception('Not implemented');
        // $model = $m; // এই লাইনটিতে একটি ভুল আছে
        $this->model = $m; // This is corrected code
    }

    public function getModel(){
        return $this->model;
    }
}

$myCar = new Car("Toyota");
echo $myCar->getModel();