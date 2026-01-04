<?php
class Member{
    public $username;
    public $role;
    // 1. The constructor: Runs immediately on new Member
    public function __construct($u,$r)
    {
        //2. $this: Assigning the incoming data to "this" object's properties
        $this-> username = $u;
        $this->role = $r;

        echo "Profile Create for: {$this->username} \n";
    }

    public function get_status(){
        return "{$this->username} is a {$this->role}";
    }
}

$user1 = new Member("Mobarak", "Tester");

echo $user1->get_status();