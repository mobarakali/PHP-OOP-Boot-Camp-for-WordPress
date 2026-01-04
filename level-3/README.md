# **Level 3: Visibility (Access Modifiers)**

এবার শিখবো OOP-এর অন্যতম গুরুত্বপূর্ণ অংশ— **Visibility**। অর্থাৎ, ক্লাসের ভেতরের তথ্য কে দেখতে পারবে আর কে পারবে না। এটি ৩ প্রকার:

১. **`public`**: যে কেউ এটি দেখতে বা পরিবর্তন করতে পারে। (যেমন: খোলা রাস্তা)
২. **`private`**: শুধুমাত্র ওই ক্লাসের ভেতরের ফাংশনগুলো এটি ব্যবহার করতে পারে। বাইরে থেকে কেউ হাত দিতে পারবে না। (যেমন: আপনার পার্সোনাল লকার)
৩. **`protected`**: নিজের ক্লাস এবং যারা তাকে 'Inherit' (উত্তরাধিকার) করবে তারা ব্যবহার করতে পারবে।

#### **কেন এটি দরকার? (The Tester's Perspective)**

মনে করুন, একটি টিকিটে ইউজার প্রোফাইলের ইমেইল সেভ করা হচ্ছে। আমরা চাই না যে কেউ সরাসরি `$user->email = "wrong-email"` লিখে ডাটা নষ্ট করুক। আমরা চাই একটি ফাংশনের মাধ্যমে চেক করে ডাটা সেভ করতে।

#### **উদাহরণ:**

```php
<?php

class BankAccount {
    private $balance = 0; // বাইরে থেকে কেউ সরাসরি টাকা কমাতে/বাড়াতে পারবে না

    public function deposit($amount) {
        if($amount > 0) {
            $this->balance += $amount;
            return "টাকা জমা হয়েছে।";
        }
    }

    public function getBalance() {
        return "আপনার বর্তমান ব্যালেন্স: " . $this->balance . " টাকা।";
    }
}

$myAccount = new BankAccount();
$myAccount->deposit(500);

// এটি কাজ করবে না এবং Error দিবে:
// echo $myAccount->balance; 

// সঠিক নিয়ম:
echo $myAccount->getBalance(); 

```
