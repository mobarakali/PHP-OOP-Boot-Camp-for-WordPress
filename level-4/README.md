
# Level 4: Inheritance (উত্তরাধিকার)

এটি হলো একটি ক্লাসের বৈশিষ্ট্য অন্য ক্লাসে কপি করা। `extends` কীওয়ার্ড ব্যবহার করে এটি করা হয়।

**কেন এটি শিখবেন?**
WordPress-এর সব "Widget" বা "Block" তৈরি হয় একটি মেইন ক্লাসকে `extends` করে।

## উদাহরণ

```php
<?php

class Member {
    public $name;
    
    public function login() {
        return "{$this->name} লগ-ইন করেছেন।";
    }
}

// Admin ক্লাস Member ক্লাসের সবকিছু পাবে
class Admin extends Member {
    public function deleteUser() {
        return "ইউজার ডিলিট করা হয়েছে।";
    }
}

$boss = new Admin();
$boss->name = "Mobarak";
echo $boss->login(); // Member ক্লাস থেকে পেয়েছে
echo "\n";
echo $boss->deleteUser(); // নিজের স্পেশাল পাওয়ার

```

---

### **আপনার জন্য Level 3 ও 4 টাস্ক:**

মনে করুন আপনি একটি **Test Team** সফটওয়্যার বানাচ্ছেন। আপনার কাছে একটি মেইন ক্লাস আছে `Developer` নামে।

১. একটি ক্লাস বানান `Tester` নামে যা `Developer` ক্লাসকে **Extend** করবে।
২. `Tester` ক্লাসে একটি **Private** প্রপার্টি রাখুন যার নাম `$bugCount` (শুরুতে মান থাকবে ০)।
৩. একটি **Public** ফাংশন বানান `foundBug()` যা কল করলে `$bugCount` ১ করে বাড়বে।
৪. একটি ফাংশন বানান যা দিয়ে বর্তমান `$bugCount` দেখা যাবে।

**এই কোডটি লিখে আমাকে দেখান।** ভুল হলে কোনো সমস্যা নেই, আমি ঠিক করে দেবো। এর মাধ্যমেই আপনি রিয়েল কোডিং শিখবেন!
