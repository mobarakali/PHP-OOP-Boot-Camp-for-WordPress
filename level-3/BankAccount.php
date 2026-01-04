<?php
class BankAccount{
    private $balance = 0; // someone form outsiede can not change the value

    public function deposit($ammount){
        if($ammount>0){
            $this->balance += $ammount;
            return "Money added to balance";
        }
    }

    public function getBalance(){
        return "Your current balance: $" . $this->balance; 
    }
}

$myAccount = new BankAccount();
$myAccount->deposit(500);

// এটি কাজ করবে না এবং Error দিবে:
// echo $myAccount->balance;

// সঠিক নিয়ম:
echo $myAccount->getBalance();