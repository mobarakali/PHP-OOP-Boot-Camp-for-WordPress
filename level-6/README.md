# **Level 6: Interfaces, Abstract Classes, and Traits**।

---

## ১. Abstract Classes (অ্যাবস্ট্রাক্ট ক্লাস)

**বাংলায় ধারণা:**
সহজ কথায়, Abstract Class হলো একটি "অসম্পূর্ণ" ক্লাস। এটি এমন একটি ব্লুপ্রিন্ট যা থেকে সরাসরি কোনো অবজেক্ট তৈরি করা যায় না (অর্থাৎ `new` কিওয়ার্ড দিয়ে এটা কল করা যায় না)। এর মূল কাজ হলো অন্য ক্লাসের জন্য একটি সাধারণ কাঠামো (Structure) তৈরি করে দেওয়া।

* **উদাহরণ:** ধরুন একটি ক্লাস আছে `Animal` নামে। পৃথিবীতে শুধু 'Animal' বলতে কিছু নেই, আছে 'Dog' বা 'Cat'। তাই `Animal` ক্লাসটি হবে Abstract, যা কিছু নিয়ম ঠিক করে দেবে যে সব প্রাণীরই `eat()` ফাংশন থাকতে হবে।

**English Concept:**
An **Abstract Class** is a "template" that cannot be instantiated on its own (you cannot use `new`). It exists only to be extended by other classes. It allows you to define some methods while forcing the child classes to define others.

```php
abstract class Animal {
    // Regular method
    public function breathe() {
        return "Breathing...";
    }

    // Abstract method (Child must define this)
    abstract public function makeSound();
}

class Dog extends Animal {
    public function makeSound() {
        return "Woof!";
    }
}

```

---

### ২. Interfaces (ইন্টারফেস)

**বাংলায় ধারণা:**
ইন্টারফেস হলো একটি "চুক্তি" (Contract)। এটি শুধু বলে দেয় একটি ক্লাসে **কী কী** ফাংশন থাকতে হবে, কিন্তু ফাংশনগুলো **কিভাবে** কাজ করবে তা বলে দেয় না। যখন কোনো ক্লাস একটি ইন্টারফেস ব্যবহার (implement) করে, তখন সে বাধ্য থাকে ওই ইন্টারফেসের সব ফাংশনগুলো নিজের মধ্যে রাখতে।

* **পার্থক্য:** Abstract class-এ কিছু কোড লেখা থাকতে পারে, কিন্তু Interface-এ কোনো ফাংশনের ভেতরে কোনো কোড থাকে না, শুধু নাম থাকে।

**English Concept:**
An **Interface** is a contract. It defines **what** methods a class must have, but not **how** they should be implemented. Any class that `implements` an interface MUST provide the body for all its methods.

```php
interface Plugin {
    public function activate();
    public function deactivate();
}

class MySitetool implements Plugin {
    public function activate() {
        return "Plugin activated!";
    }
    public function deactivate() {
        return "Plugin stopped!";
    }
}

```

---

### ৩. Traits (ট্রেইটস)

**বাংলায় ধারণা:**
PHP-তে একটি ক্লাস কেবল একটি মাত্র ক্লাসকে `extends` করতে পারে। কিন্তু অনেক সময় আমাদের একাধিক ক্লাসের বৈশিষ্ট্য এক জায়গায় দরকার হয়। এই সমস্যার সমাধান হলো **Trait**। এটি কোড শেয়ার করার একটি উপায়। আপনি একটি Trait বানিয়ে সেটি অনেকগুলো ক্লাসে ব্যবহার করতে পারেন।

* **উদাহরণ:** ধরুন আপনার কাছে একটি কোড আছে যা দিয়ে লগ (Log) জেনারেট করা যায়। আপনি এই কোডটি `User` ক্লাসেও চান আবার `Order` ক্লাসেও চান। তখন আপনি একটি `Logger` Trait বানিয়ে দুই জায়গাতেই ব্যবহার করতে পারেন।

**English Concept:**
PHP only allows a class to inherit from one single parent class (single inheritance). **Traits** are used to solve this by allowing you to create groups of methods that can be reused in multiple independent classes.

```php
trait Logger {
    public function log($message) {
        echo "Logging message: $message";
    }
}

class User {
    use Logger; // This class now has the log() method
}

class Product {
    use Logger; // This class also has it
}

```

---

### **Summary (বাংলা ও ইংরেজি)**

| Feature | Description (বাংলা) | Description (English) |
| --- | --- | --- |
| **Abstract Class** | আংশিক ব্লুপ্রিন্ট, সরাসরি অবজেক্ট হয় না। | Partial blueprint, cannot be instantiated. |
| **Interface** | কাজের তালিকা বা চুক্তি, যা মানা বাধ্যতামূলক। | A strict contract of methods to implement. |
| **Trait** | বিভিন্ন ক্লাসে কোড শেয়ার করার সহজ উপায়। | A way to reuse code in multiple classes. |

---

### **আপনার জন্য ছোট একটি পরীক্ষা (Test Task):**

আমি নিচে ৩টি সিনারিও দিচ্ছি। আপনি আমাকে বলবেন কোনটির জন্য আপনি **Abstract Class**, **Interface** বা **Trait** ব্যবহার করবেন:

১. আপনি চান আপনার সব "Payment Gateway" (যেমন: PayPal, Stripe) ক্লাসে অবশ্যই একটি `pay()` ফাংশন থাকুক। (এটি একটি চুক্তি) <!-- - Interface-->
২. আপনার এমন কিছু কোড আছে যা দিয়ে ডাটাবেজে কানেক্ট করা যায়, এবং আপনি এই কোডটি অনেকগুলো আলাদা আলাদা ক্লাসে ব্যবহার করতে চান। <!-- Trait-->
৩. আপনি একটি বেস ক্লাস বানাতে চান যা থেকে অন্য সব ক্লাস তৈরি হবে, কিন্তু ওই বেস ক্লাসটিকে সরাসরি কেউ কল করতে পারবে না। <!-- Abstract Class -->

**এই উত্তরগুলো দিন, তারপর আমরা সরাসরি WordPress Core ফাইলের আসল কোড দেখা শুরু করবো!**
