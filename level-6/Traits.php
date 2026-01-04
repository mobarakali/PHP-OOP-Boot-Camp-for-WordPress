<?php
trait Logger{
    public function log($message){
        echo "Logging message: $message \n";
    }
}

class User{
    use Logger;  // This class now has all property and methods from Logger Class
}

class Product{
    use Logger;  // This class now has all property and methods from Logger Class
}

$mobarak = new User();
$pen = new Product();

echo $mobarak->log("I am a Person!");
echo $mobarak->log("It's a Product!");